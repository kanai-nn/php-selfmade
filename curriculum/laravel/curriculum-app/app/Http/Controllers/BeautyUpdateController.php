<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeautyService;

class BeautyUpdateController extends Controller
{
    public function updateCycle(Request $request, $id)
    {

        $validated = $request->validate([
            'cycle' => 'required|numeric'
        ]);

      
        $beautyService = BeautyService::findOrFail($id);
        $beautyService->cycle = $validated['cycle'];
        $beautyService->save();

        return redirect()->back()->with('success', '周期が更新されました');
    }
}