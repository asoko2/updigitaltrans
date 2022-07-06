<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('admin.kontak-kami');
    }

    public function getContactJSON(Request $request)
    {
        $contact = DB::table('kontak_kami');

        if ($request->search) {
            $search = $request->search;
            $contact->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%${search}%")
                    ->orWhere('phone', 'LIKE', "%${search}%")
                    ->orWhere('description', 'LIKE', "%${search}%")
                    ->orWhere('address', 'LIKE', "%${search}%");
            });
            // ->orderBy('id', 'asc');
        }

        $contact->orderBy('id', 'asc');

        if ($request->perPage == 0) {
            return $contact->get();
        } else {
            return $contact->paginate($request->perPage, ['*'], 'page', $request->page);
        }
    }
}