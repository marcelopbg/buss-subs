<?php

namespace App\Http\Controllers;

use App\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Group::paginate(15);
        return view('group.list', ['registros' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Group::create($request->all());
        $request->session()->flash('alert-success', 'Turma criada com sucesso!');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(group $group)
    {
        return view('group.create', ['registro' => $group]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, group $group)
    {
        $group->update($request->all());
        $request->session()->flash('alert-success', 'Turma editada com sucesso!');
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(group $group)
    {
        $group->delete();
        Session::flash('alert-success', 'Turma removida com sucesso!');
        return $this->index();
    }
}
