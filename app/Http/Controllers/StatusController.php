<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.status.main', [
            "status"    => Status::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.status.create');
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
            "deskripsi" => 'required|max:255'
        ]);

        Status::create($validatedData);

        return redirect('/dashboard/status')->with('success', 'New item has been added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status, $id)
    {
        $status = $status->findOrFail(Crypt::decrypt($id));

        return view('dashboard.status.edit', [
            "status" => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status, $id)
    {
        $rules  = [
            "deskripsi" => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        $status = $status->where('id', $id)->update($validatedData);

        return redirect('/dashboard/status/')->with('success', 'Item has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status, $id)
    {
        $status = $status->destroy($id);

        return redirect('/dashboard/status/')->with('success', 'Item has been deleted !');
    }
}
