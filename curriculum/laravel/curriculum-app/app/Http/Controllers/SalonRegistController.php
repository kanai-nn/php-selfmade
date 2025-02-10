<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalonArea;
use App\Models\Salon;

class SalonRegistController extends Controller
{
    public function salonRegistShow() {
        if (!session()->has('member_id')) {
            return redirect('/login');
        }
        $areas = SalonArea::all();
        return view('salonRegistShow', compact('areas'));
    }

    public function salonRegistConfirm(Request $request) {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:255',
            'area' => 'required',
            'type' => 'required',
            'data' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
    
            // ユニークなファイル名を作成
            $imageName = time() . '_' . $image->getClientOriginalName();
    
            // storage/app/public/salon_images に保存
            $filePath = $image->storeAs('public/salon_images', $imageName);
    
            // パスをデータベースに保存する形式に変換
            $publicPath = str_replace('public/', 'storage/', $filePath);

            $areaName = salonArea::find($request->area)->area;
            return view('salonRegistConfirm', compact('request', 'areaName', 'publicPath'));
        }

    }

    public function salonRegist(Request $request) {
        Salon::create([
            'name' => $request->input('name'),
            'area_id' => $request->input('area'),
            'type' => $request->input('type'),
            'data' => $request->input('data'),
            'img' => $request->input('path'),
        ]);

        return view('salonRegistComplete');
    }

    public function salonRegistComplete() {
        return view('salonRegistComplete');
    }

    public function salonInfo() {
        $salons = Salon::all();
        return view('salonInfo', compact('salons'));
    }

    public function salonRemove($id) {
        Salon::where('id', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $salon = Salon::findOrFail($id);
        return view('salonEdit', compact('salon'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'area_id' => 'required|numeric',
            'type' => 'required|max:255',
            'data' => 'required',
        ]);

        $salon = Salon::findOrFail($id);
        $salon->name = $request->input('name');
        $salon->area_id = $request->input('area_id');
        $salon->type = $request->input('type');
        $salon->data = $request->input('data');
        $salon->save();

        return redirect()->route('salonInfo')->with('success', 'サロン情報が更新されました！');
    }
}


