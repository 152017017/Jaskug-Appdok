<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
            "business" => Business::all()
        ]);
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
            "deskripsi" => 'required|min:1|max:255',
            "pemilik"   => 'required|min:1|max:255'
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
        // $id = Crypt::decrypt($encrypt);

        $business = $business->findOrFail($id);

        return view('dashboard.bisnis.edit', [
            "business" => $business
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
            "deskripsi" => 'required|min:1|max:255',
            "pemilik"   => 'required|min:1|max:255'
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
