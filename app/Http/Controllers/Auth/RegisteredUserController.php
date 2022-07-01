<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function setFileName($file)
    {
        $oriName = $file->getClientOriginalName();
        $date = date_timestamp_get(date_create());
        return $date . '_' . $oriName;
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
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
                'is_admin' => '2',
                'color' => $request->input('warna_kendaraan'),
                'phone_number' => $request->input('no_hp'),
                'sim_number' => $request->input('no_sim'),
                'ktp_number' => $request->input('no_ktp'),
                'stnk_number' => $request->input('no_stnk'),
                'photo_ktp' => $ktpPath,
                'photo_user' => $fotoPath,
                'photo_sim' => $simPath,
                'photo_stnk' => $stnkPath,
            ]);
        } catch (\Throwable $th) {
            return redirect('/register-updriver')->with('error', $th->getMessage());
        }

        return redirect('/register-updriver')->with('sukses', 'Sukses mendaftar akun. Silahkan tunggu konfirmasi.');
    }

    public function storeMerchant(Request $request)
    {
        // dd($request);
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

        try {
            $user = User::create([
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            Merchant::create([
                'user_id' => $user->id,
                'role' => ($request->input('tipe_merchant') == 1) ? 'food' : 'mart',
                'merchant_name' => $request->input('nama'),
                'address' => $request->input('alamat'),
                'description' => $request->input('detail'),
                'open_time' => $request->input('jam_buka'),
                'close_time' => $request->input('jam_tutup'),
                'phone_number' => $request->input('no_hp'),
                'is_admin' => '3',
                'nik_number' => $request->input('no_ktp'),
                'gallery_merchant' => $request->input('service'),
                'address_merchant' => $request->input('lokasi'),
                'photo_ktp' => $ktpPath,
                'photo_user' => $fotoPath,
                'photo_usaha' => $usahaPath,
            ]);
        } catch (\Throwable $th) {
            return redirect('/register-upmerchant')->with('error', $th->getMessage());
        }

        return redirect('/register-upmerchant')->with('sukses', 'Sukses mendaftar akun. Silahkan tunggu konfirmasi.');
    }
}