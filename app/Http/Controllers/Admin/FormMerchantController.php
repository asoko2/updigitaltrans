<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;


class FormMerchantController extends Controller
{
    public function index()
    {
        return view('admin.form-merchant');
    }

    public function getMerchantJSON(Request $request)
    {
        $merchant = DB::table('merchants')
            ->join('users', 'merchants.user_id', '=', 'users.id')
            ->select('merchants.*', 'users.name', 'users.email', 'is_admin');

        if ($request->search) {
            $search = $request->search;
            $merchant->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%${search}%")
                    ->orWhere('merchant_name', 'LIKE', "%${search}%")
                    ->orWhere('email', 'LIKE', "%${search}%")
                    ->orWhere('address_merchant', 'LIKE', "%${search}%")
                    ->orWhere('description', 'LIKE', "%${search}%")
                    ->orWhere('gallery_merchant', 'LIKE', "%${search}%");
            });
            // ->orderBy('id', 'asc');
        }

        $merchant->orderBy('status', 'asc')
            ->orderBy('id', 'asc');

        if ($request->perPage == 0) {
            return $merchant->get();
        } else {
            return $merchant->paginate($request->perPage, ['*'], 'page', $request->page);
        }
    }

    public function show($id)
    {
        $merchant =  DB::table('merchants')
            ->join('users', 'merchants.user_id', '=', 'users.id')
            ->select('merchants.*', 'users.name', 'users.email', 'is_admin')
            ->where('merchants.id', '=', $id)
            ->first();
        $ktp_url = Storage::url($merchant->photo_ktp);
        $usaha_url = Storage::url($merchant->photo_usaha);
        $user_url = Storage::url($merchant->photo_user);

        return response()->json([
            'merchant' => $merchant,
            'photo_ktp' => $ktp_url,
            'photo_usaha' => $usaha_url,
            'photo_user' => $user_url,
        ]);
    }

    public function verif(Request $req)
    {
        $merchant = Merchant::find($req->id);
        $merchant->status = $req->input('status');
        $merchant->update();
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
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_ktp' => ['required', 'unique:merchants,nik_number'],
            'fotoFile' => ['required', 'file'],
            'ktpFile' => ['required', 'file'],
            'usahaFile' => ['required', 'file'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $ktpNewName = $this->setFileName($request->file('ktpFile'));
        $fotoNewName = $this->setFileName($request->file('fotoFile'));
        $usahaNewName = $this->setFileName($request->file('usahaFile'));

        $ktpPath = $request->file('ktpFile')->storeAs('public/files', $ktpNewName);
        $fotoPath = $request->file('fotoFile')->storeAs('public/files', $fotoNewName);
        $usahaPath = $request->file('usahaFile')->storeAs('public/files', $usahaNewName);

        $user = User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Merchant::create([
            'user_id' => $user->id,
            'role' => ($request->input('tipe_merchant') == 1) ? 'food' : 'mart',
            'merchant_name' => $request->input('nama'),
            'address' => $request->input('alamat_rumah'),
            'description' => $request->input('detail'),
            'open_time' => $request->input('jam_buka'),
            'close_time' => $request->input('jam_tutup'),
            'nik_number' => $request->input('no_ktp'),
            'gallery_merchant' => $request->input('service'),
            'address_merchant' => $request->input('lokasi'),
            'photo_ktp' => $ktpPath,
            'photo_user' => $fotoPath,
            'photo_usaha' => $usahaPath,
        ]);
    }
}
