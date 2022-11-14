<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.service.main', [
            "service" => Service::all(),
            "groupservice" => GroupService::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create', [
            "groupservice" => GroupService::all()
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
        $validatedData = $request->validate([
            "gruplayanan_id"    => 'required',
            "nama"              => 'required|max:255',
            "deskripsi"         => 'required|max:255'
        ]);

        Service::create($validatedData);

        return redirect('/dashboard/layanan')->with('success', 'Data baru sukses ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, $id)
    {
        $service = $service->findOrFail(Crypt::decrypt($id));

        return view('dashboard.service.edit', [
            "service"       => $service,
            "groupservice"  => GroupService::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Service $service, Request $request, $id)
    {
        $rules  = [
            "nama"              => 'required|max:255',
            "deskripsi"         => 'required|max:255',
            "gruplayanan_id"    => 'required'
        ];

        $validatedData = $request->validate($rules);

        $service = $service->where('id', $id)->update($validatedData);

        return redirect('/dashboard/layanan/')->with('success', 'Item has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        $service = $service->destroy(Crypt::decrypt($id));

        return redirect('/dashboard/layanan/')->with('success', 'Item has been deleted !');
    }
}
