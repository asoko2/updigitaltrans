<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->post('email'));
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('accountToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function me(Request $request)
    {
        // return $request->user();
        $user =  $request->user();
        // return $user->id;
        if ($user->is_admin == 2) {
            $data = DB::table('users')
                ->join('drivers', 'users.id', 'drivers.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.is_admin', 'drivers.address', 'drivers.birth_date', 'drivers.brand', 'drivers.type', 'drivers.color', 'drivers.vehicle_number', 'drivers.photo_user', 'drivers.phone_number')
                ->where('users.id', '=', $user->id)
                ->first();
        } else {
            $data = DB::table('users')
                ->join('merchants', 'users.id', 'merchants.user_id')
                ->select('users.id', 'users.name', 'users.email', 'users.is_admin', 'merchants.phone_number', 'merchants.address', 'merchants.gallery_merchant', 'merchants.description', 'merchants.open_time', 'merchants.close_time', 'merchants.photo_user')
                ->where('users.id', '=', $user->id)
                ->first();
        }

        $user_url = Storage::url($data->photo_user);
        $response = [
            'name' => $data->name,
            'email' => $data->email,
            'is_admin' => $data->is_admin,
            'id' => $data->id,
            'address' => $data->address,
            'user_photo' => $user_url,
        ];
        if ($user->is_admin == 2) {
            $response['birth_date'] = $data->birth_date;
            $response['brand'] = $data->brand;
            $response['type'] = $data->type;
            $response['color'] = $data->color;
            $response['vehicle_number'] = $data->vehicle_number;
        } else {
            $response['phone_number'] = $data->phone_number;
            $response['gallery_merchant'] = $data->gallery_merchant;
            $response['description'] = $data->description;
            $response['open_time'] = $data->open_time;
            $response['close_time'] = $data->close_time;
        }
        return $response;
    }

    public function edit(Request $request)
    {
        $fields = $request->validate([
            // 'email' => ['required', Rule::unique('users', 'email')->ignore($request->id)],
            'email' => 'required',
            'birth_date' => 'nullable',
            'address' => 'nullable',
            'brand' => 'nullable',
            'name' => 'nullable',
            'type' => 'nullable',
            'color' => 'nullable',
            'vehicle_number' => 'nullable',
            'phone_number' => 'nullable',
            'gallery_merchant' => 'nullable',
            'description' => 'nullable',
            'open_time' => 'nullable',
            'close_time' => 'nullable'
        ]);

        $user = User::find($request->id);

        $user->email = $fields['email'];
        $user->name = $fields['name'];
        $user->update();

        // dd('berhasil');
        if ($user['is_admin'] == 2) {
            $driver = Driver::where('user_id', $request->id)->first();
            $driver->birth_date = $fields['birth_date'];
            $driver->address = $fields['address'];
            $driver->brand = $fields['brand'];
            $driver->type = $fields['type'];
            $driver->color = $fields['color'];
            $driver->vehicle_number = $fields['birth_date'];
            $driver->update();
        } else {
            $merchant = Merchant::where('user_id', $request->id)->first();
            $merchant->phone_number = $fields['phone_number'];
            $merchant->address = $fields['address'];
            $merchant->gallery_merchant = $fields['gallery_merchant'];
            $merchant->description = $fields['description'];
            $merchant->update();
        }

        $response = [
            'message' => 'success'
        ];

        return response($response, 200);
    }
}