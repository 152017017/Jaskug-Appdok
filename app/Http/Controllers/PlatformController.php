<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.platform.main', [
            "platform" => Platform::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.platform.create');
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
            'deskripsi' => 'required|max:255'

        ]);

        Platform::create($validatedData);

        return redirect('/dashboard/platform')->with('success', 'New item has been added !');
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
    public function edit(Platform $platform, $id)
    {
        $platform = $platform->findOrFail(Crypt::decrypt($id));

        return view('dashboard.platform.edit', [
            'item' => $platform
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Platform $platform, $id)
    {
        $rules  = [
            'deskripsi' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        $platform = $platform->where('id', $id)->update($validatedData);

        return redirect('/dashboard/platform/')->with('success', 'Item has been updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform, $id)
    {
        $platform = $platform->destroy($id);

        return redirect('/dashboard/platform/')->with('success', 'Item has been deleted !');

    }
}
