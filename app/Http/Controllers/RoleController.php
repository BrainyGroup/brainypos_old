<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating role details');

        // Validate the request...
        $this->validate(request(),[
            'name' => 'required',
            'group' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'category' => 'required',
            'description' => 'required',
            'size' => 'required',
            'package_unit' => 'required',
            'unit' => 'required',
            'package_quantity' => 'required',
            'photo' => 'required'
          ]);

        // Create new role instance

        Log::info('insert role deatils to the database');

        $role = new Role;

        $role->name = $request->name;
        $role->group = $request->group;
        $role->brand = $request->brand;
        $role->type = $request->type;
        $role->category = $request->category;
        $role->description = $request->description;
        $role->size = $request->size;
        $role->package_unit = $request->package_unit;
        $role->unit = $request->unit;
        $role->package_quantity = $request->package_quantity;
        $role->photo = $request->photo;

       if ($role->save()){
        Log::info('Role details were inserted to the database successfully');
       }else{
        Log::critical('Role details were inserted to the database successfully');
       }

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
