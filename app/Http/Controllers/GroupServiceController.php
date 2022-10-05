<?php

namespace App\Http\Controllers;

use App\Models\GroupService;
use App\Models\Business;
use Illuminate\Http\Request;

class GroupServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = GroupService::all();
        return view('dashboard.gruplayanan.main', compact('list'));
        // return $list;
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
            'deskripsi' => 'required|max:255'
        ]);

        GroupService::create($validatedData);

        return redirect('/dashboard/gruplayanan')->with('success', 'New item has been added !');
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
        $groupService = $groupService->findOrFail($id);

        return view('dashboard.gruplayanan.edit', [
            'item' => $groupService
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
            'deskripsi' => 'required|max:255'
        ];

        $validatedData = $request->validate($rules);

        $groupService = $groupService->where('id', $id)->update($validatedData);

        return redirect('/dashboard/gruplayanan/')->with('success', 'Item has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupService  $groupService
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupService $groupService, $id)
    {
        $groupService = $groupService->destroy($id);

        return redirect('/dashboard/gruplayanan/')->with('success', 'Item has been deleted !');
    }
}
