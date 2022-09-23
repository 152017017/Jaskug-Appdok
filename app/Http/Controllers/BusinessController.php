<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bisnis.main', [
            'list' => Business::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bisnis.create', [
            'list' => Business::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'deskripsi' =>'required|max:255',
            'pemilik' => 'required|max:255'            
        ]);

        Business::create($validateData);

        return redirect('/dashboard/bisnis')->with('success', 'New item has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('dashboard.bisnis.edit', [
            'item' => $business
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $rules  = [
            'deskripsi' => 'required|max:255',
            'pemilik' => 'required|max:255'
        ];

        $validateData = $request->validate($rules);

        Business::where('id', $business->id)->update($validateData);

        return redirect('/dashboard/bisnis')->with('success', 'Item has been updated !')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        Business::destroy($business->id);

        return redirect('/dashboard/bisnis')->with('success', 'Item has been deleted !')->withInput();

        @dd();
    }
}
