<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Http\Requests\MonHocRequest;
use GuzzleHttp\Promise\Create;

class MonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $monhocs = MonHoc::when(!empty($request->TenMH), function ($q) use ($request){
           $q->where('TenMH', $request->TenMH);
        })
        ->get();
        return view('monhoc.index', compact('monhocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('monhoc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MonHocRequest $request)
    {
        //
        // MonHoc::create($request->validated());
        $monhocs = new MonHoc();
        $monhocs->MaMH = $request->MaMH;
        $monhocs->TenMH = $request->TenMH;
        $monhocs->SoTC = $request->SoTC;
        $monhocs->save();

        return redirect()->route('monhocs.index')->with('success','Them mon hoc thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($MaMH)
    {
        //
        $monhocs = MonHoc::findOrFail($MaMH);
        return view('monhoc.edit',compact('monhocs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MonHocRequest $request, $MaMH)
    {
        //
        $monhocs = MonHoc::findOrFail($MaMH);
        $monhocs->update($request->validated());
        return redirect()->route('monhocs.index')->with('success', 'Cap nhat mon hoc thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($MaMH)
    {
        //
        $monhocs = MonHoc::findOrFail($MaMH);
        $monhocs->delete();
        return redirect()->route('monhocs.index')->with('success','Xoa mon hoc thanh cong');

    }
}
