<?php

namespace App\Http\Controllers;

use App\CbpList;
use Illuminate\Http\Request;
use App\Http\Requests\CbpFormRequest;


class CbpListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cbpList = CbpList::where('status','0')->get();        
        return view('cbpList.index', compact('cbpList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CbpFormRequest $request)
    {
        
        $validatedData = $request->validated();
        
        CbpList::create($validatedData);

        return redirect('/cbplist')->with('success',"CBP List Created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CbpList  $cbpList
     * @return \Illuminate\Http\Response
     */
    public function show(CbpList $cbpList)
    {
        $cbpList->delete();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CbpList  $cbpList
     * @return \Illuminate\Http\Response
     */
    public function edit(CbpList $cbpList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CbpList  $cbpList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CbpList $cbpList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CbpList  $cbpList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cbpList = CbpList::find($id);
        $cbpList->status = "1";
        $cbpList->save();
        return redirect('/cbplist')->with('success', 'CBP List is successfully deleted');
    }
}