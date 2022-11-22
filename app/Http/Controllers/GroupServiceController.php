<?php

namespace App\Http\Controllers;

use App\Models\GroupService;
use App\Models\Business;
use Illuminate\Console\View\Components\Alert;
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

        try {
            $groupservice->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000)
            {
                // @dd($e);
                //SQLSTATE[23000]: Integrity constraint violation
                return redirect('/dashboard/gruplayanan/')->with('danger', 'Data gagal dihapus karena memiliki layanan !');
            }
        }
    
        return redirect('/dashboard/gruplayanan/')->with('sucess', 'Data sukses dihapus !');
    }

    public function select(Request $request)
    {
        $groupservice = [];

        if ($request->has('q')) {
            $search = $request->q;
            $groupservice = GroupService::select("id", "nama")
                ->Where('nama', 'LIKE', "%$search%")
                ->get();
        } else {
            $groupservice = GroupService::limit(10)->get();
        }
        return response()->json($groupservice);
    }
}
