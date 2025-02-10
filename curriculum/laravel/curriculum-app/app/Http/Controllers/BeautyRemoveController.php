<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeautyService;

class BeautyRemoveController extends Controller
{
    public function getForm() {
        if (!session()->has('member_id')) {
            return redirect('/login');
        }
        $userId = session('member_id');
        $rows = BeautyService::where('user_id', $userId)->get();
        // dd($row);
        return view('beautyRemove', compact('rows'));
    }

    public function remove($id) {
        BeautyService::where('id', $id)->delete();
        return redirect()->back();
    }
}

