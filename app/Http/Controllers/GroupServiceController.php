<?php

namespace App\Http\Controllers;

use App\Models\GroupService;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GroupServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gruplayanan.main', [
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
        return view('dashboard.gruplayanan.create');
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
            "bisnis_id" => 'unrequired',
            "deskripsi" => 'required|max:255'
        ]);

        GroupService::create($validatedData);

        return redirect('/dashboard/gruplayanan')->with('success', 'Data baru sukses ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupService  $groupService
     * @return \Illuminate\Http\Response
     */
    public function show(GroupService $groupService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupService  $groupService
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupService $groupService, $id)
    {
        $groupService = $groupService->findOrFail(Crypt::decrypt($id));

        return view('dashboard.gruplayanan.edit', [
            "groupservice"  => $groupService,
            "business"      => Business::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupService  $groupService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupService $groupService, $id)
    {
        $rules  = [
            'deskripsi' => 'required|max:255',
            'bisnis_id' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $groupService = $groupService->where('id', $id)->update($validatedData);

        return redirect('/dashboard/gruplayanan/')->with('success', 'Data sukses diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupService  $groupService
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupService $groupservice, $id)
    {
        // $groupservice = $groupservice->destroy(Crypt::decrypt($id));

        // return redirect('/dashboard/gruplayanan/')->with('danger', 'Data dihapus !');
        
        //----//

        $groupservice = GroupService::find(Crypt::decrypt($id));

        if ($groupservice->service()->exists())
        {
            abort('Resource cannot be deleted due to existence of related resources.');
        }

        $groupservice->delete();

        return redirect('/dashboard/gruplayanan/')->with('danger', 'Data dihapus !');

    }
}
