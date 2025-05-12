<?php

namespace App\Http\Controllers;

use App\Models\LOP;
use Illuminate\Http\Request;
use App\Http\Requests\LOPRequest;
use App\Models\SVien;

class LOPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lops = LOP::all();
        return view('lop.index',compact('lops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $lops = LOP::all();
        return view('lop.create',compact('lops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LOPRequest $request)
    {
        //
        // $lops = new LOP();
        // $lops->TenLop = $request->TenLop;
        // $lops->save();

        LOP::create($request->validated());
        return redirect()->route('lops.index')->with('success', 'Thêm lớp thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show($MaLop)
    {
        //
        $lops = LOP::where('MaLop', $MaLop)->first();
        $sinhviens = $lops->sinhvien; // Lấy danh sách sinh viên của lớp
        return view('lop.show',compact('lops','sinhviens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($MaLop)
    {
        //
        $lops = LOP::where('MaLop', $MaLop)->first();
        return view('lop.edit', compact('lops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LOPRequest $request, $MaLop)
    {
        //
        $lops = LOP::findOrFail($MaLop);
        //$lops = LOP::where('MaLop', $MaLop)->firstOrFail();
        $lops->update($request->validated());
        $lops->save();

        SVien::where("MaLop",$MaLop)->update(['TenLop'=> $request->TenLop]);

        return redirect()->route('lops.index')->with('success', 'Cập nhật lớp thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($MaLop)
    {
        //
        LOP::where('MaLop', $MaLop)->delete();
        return redirect()->route('lops.index')->with('success', 'Xóa lớp thành công!');
    }
}
