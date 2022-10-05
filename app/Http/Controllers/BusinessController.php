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
        $list = Business::all();
        return view('dashboard.bisnis.main', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bisnis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'required|max:255',
            'pemilik' => 'required|max:255'

        ]);

        Business::create($validatedData);

        return redirect('/dashboard/bisnis')->with('success', 'New item has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business, $id)
    {
        $business = $business->findOrFail($id);

        return view('dashboard.bisnis.edit', [
            'item' => $business
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business, $id)
    {
        $rules  = [
            'deskripsi' => 'required|max:255',
            'pemilik' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        $business = $business->where('id', $id)->update($validatedData);

        return redirect('/dashboard/bisnis/')->with('success', 'Item has been updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business, $id)
    {
        $business = $business->destroy($id);

        return redirect('/dashboard/bisnis/')->with('success', 'Item has been deleted !');

    }
}
