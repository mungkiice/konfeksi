<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
    	$vendors = Vendor::where('valid', 1)->get();
    	return view('vendors', compact('vendors'));
    }

    public function show($vendorId)
    {
    	$vendor = Vendor::find($vendorId);
    	return view('vendor', compact('vendor'));
    }

    public function listvendor()
    {
        $users = User::where('role', 'Vendor')->get();
        return view('admin.vendors', compact('users'));
    }

    public function destroy($vendorId)
    {
        $vendor = Vendor::find($vendorId);
        if ($vendor != null) {
            $vendor->user->delete();
            $vendor->delete();
        }
        return back()->with('flash', 'vendor berhasil dihapus');
    }

    public function validation($vendorId)
    {
        $vendor = Vendor::find($vendorId);

        if ($vendor != null) {
            $vendor->update([
                'valid' => true
            ]);
        }
        return back()->with('flash', 'vendor berhasil divalidasi');
    }
}
