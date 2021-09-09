<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectActivity;
use App\ProjectApplicant;
// use Ramsey\Uuid\Uuid;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Project::with(['project_applicants'])->get(); 

        return view('pages.projects.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create($id)
    // {
    //     return view('pages.roles.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(RoleRequest $request)
    // {
    //     $data = $request->all();

    //     $id = Uuid::uuid1()->toString();

    //     Role::create($data);
    //     return redirect()->route('roles.index');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Project::with(['project_activities','project_applicants'])->findOrFail($id);

        return view('pages.projects.detail',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $item = Role::findOrFail($id);

    //     return view('pages.roles.edit',[
    //         'item' => $item
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(RoleRequest $request, $id)
    // {
    //     $data = $request->all();

    //     $item = Role::findOrFail($id);
        
    //     $item->update($data);

    //     return redirect()->route('roles.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $item =  Role::findOrFail($id);
    //     $item->delete();

    //     return redirect()->route('roles.index');
    // }
}
