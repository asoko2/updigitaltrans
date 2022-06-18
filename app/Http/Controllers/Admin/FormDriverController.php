<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;


class FormDriverController extends Controller
{
    public function index()
    {
        return view('admin.form-driver');
    }

    public function getDriverJSON(Request $request)
    {
        $driver = DB::table('drivers')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->select('drivers.*', 'users.name', 'users.email', 'is_admin');

        if ($request->search) {
            $search = $request->search;
            $driver->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%${search}%")
                    ->orWhere('email', 'LIKE', "%${search}%")
                    ->orWhere('address', 'LIKE', "%${search}%")
                    ->orWhere('brand', 'LIKE', "%${search}%")
                    ->orWhere('type', 'LIKE', "%${search}%");
            });
            // ->orderBy('id', 'asc');
        }

        $driver->orderBy('status', 'asc')
            ->orderBy('id', 'asc');

        if ($request->perPage == 0) {
            return $driver->get();
        } else {
            return $driver->paginate($request->perPage, ['*'], 'page', $request->page);
        }
    }

    public function show($id)
    {
        $driver =  DB::table('drivers')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->select('drivers.*', 'users.name', 'users.email', 'is_admin')
            ->where('drivers.id', '=', $id)
            ->first();
        $ktp_url = Storage::url($driver->photo_ktp);
        $sim_url = Storage::url($driver->photo_sim);
        $stnk_url = Storage::url($driver->photo_stnk);
        $user_url = Storage::url($driver->photo_user);
        return response()->json([
            'driver' => $driver,
            'photo_ktp' => $ktp_url,
            'photo_sim' => $sim_url,
            'photo_stnk' => $stnk_url,
            'photo_user' => $user_url,
        ]);
    }

    public function verif(Request $req)
    {
        $driver = Driver::find($req->id);
        $driver->status = $req->input('status');
        $driver->update();
        return response('', 200);
    }

    public function setFileName($file)
    {
        $oriName = $file->getClientOriginalName();
        $date = date_timestamp_get(date_create());
        return $date . '_' . $oriName;
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_ktp' => ['required', 'unique:drivers,ktp_number'],
            'no_kendaraan' => ['required', 'unique:drivers,vehicle_number'],
            'no_sim' => ['required', 'unique:drivers,sim_number'],
            'no_stnk' => ['required', 'unique:drivers,stnk_number'],
            'fotoFile' => ['required', 'file'],
            'ktpFile' => ['required', 'file'],
            'simFile' => ['required', 'file'],
            'stnkFile' => ['required', 'file'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $ktpNewName = $this->setFileName($request->file('ktpFile'));
        $fotoNewName = $this->setFileName($request->file('fotoFile'));
        $simNewName = $this->setFileName($request->file('simFile'));
        $stnkNewName = $this->setFileName($request->file('stnkFile'));
        // dd($ktpNewName);
        $ktpPath = $request->file('ktpFile')->storeAs('public/files', $ktpNewName);
        $fotoPath = $request->file('fotoFile')->storeAs('public/files', $fotoNewName);
        $simPath = $request->file('simFile')->storeAs('public/files', $simNewName);
        $stnkPath = $request->file('stnkFile')->storeAs('public/files', $stnkNewName);
        // dd($path);

        try {
            $user = User::create([
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            // dd($user->id);
            Driver::create([
                'user_id' => $user->id,
                'vehicle_type' => ($request->input('tipe_driver') == 1) ? 'motorcycle' : 'car',
                'vehicle_number' => $request->input('no_kendaraan'),
                'birth_date' => $request->input('tanggal_lahir'),
                'address' => $request->input('alamat'),
                'brand' => $request->input('merk'),
                'type' => $request->input('tipe_kendaraan'),
                'color' => $request->input('warna_kendaraan'),
                'sim_number' => $request->input('no_sim'),
                'ktp_number' => $request->input('no_ktp'),
                'stnk_number' => $request->input('no_stnk'),
                'photo_ktp' => $ktpPath,
                'photo_user' => $fotoPath,
                'photo_sim' => $simPath,
                'photo_stnk' => $stnkPath,
            ]);
        } catch (\Throwable $th) {
            // return redirect('/register-updriver')->with('error', $th->getMessage());
            return response('', 400)->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}