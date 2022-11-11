<?php

namespace App\Http\Controllers;

use App\Notifications\Tasks;
use Illuminate\Http\Request;
use App\Models\GroupService;
use App\Models\Status;
use App\Models\Dokumentasi;
use App\Models\Service;
use App\Models\Platform;
use App\Models\Business;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.task.main', [
            "title"         => "Permintaan",
            "dokumentasi"   => Dokumentasi::all(),
            "status"        => Status::all(),
            "groupservice"  => GroupService::all(),
            "service"       => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.task.create', [
            "business"      => Business::all(),
            "groupservice"  => GroupService::all(),
            "status"        => Status::all(),
            "service"       => Service::all(),
            "platform"      => Platform::all()
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
        // @dd($request);

        $validatedData = $request->validate([
            "layanan_id"        => 'required',
            "bisnis_id"         => 'required',
            "gruplayanan_id"    => 'required',
            "status_id"         => 'required',
            "platform_id"       => 'required',
            "lampiran"          => 'required|file|mimes:pdf,jpg,jpeg|max:1024',
            "tanggal"           => 'required|date',
            // "tanggal_eksekusi_op"  => 'date',
            // "tanggal_eksekusi_qa"  => 'date',
            "nomor"             => 'required',
            "perihal"           => 'required|max:255',
            "deskripsi"         => 'required|max:255'
        ]);

        if($request->file('lampiran')){
            $validatedData['lampiran'] = $request->file('lampiran')->store('lampiran-nde');
        }

        Dokumentasi::create($validatedData);

        return redirect('/dashboard/task')->with('success', 'New item has been added !');

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
    public function edit(Dokumentasi $dokumentasi, $id)
    {
        $dokumentasi = $dokumentasi->findOrFail(Crypt::decrypt($id));

        return view('dashboard.task.edit', [
            "dokumentasi"   => $dokumentasi,
            "status"        => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Dokumentasi $dokumentasi, Request $request, $id)
    {
        $rules  = [
            "tanggal_eksekusi_op" => 'date',
            "tanggal_eksekusi_qa" => 'date',
        ];

        $validatedData = $request->validate($rules);

        $dokumentasi = $dokumentasi->where('id', $id)->update($validatedData);

        return redirect('/dashboard/task/')->with('success', 'Item has been updated !');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function getService(GroupService $groupservice)
    // {
    //     return $groupservice->service()->select('id', 'nama')->get();
    // }

}
