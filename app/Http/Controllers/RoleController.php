<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list()
    {
        $roles = Role::all();
        
        return view('role.list', compact('roles'));
    }

    public function show($id){
        $role = Role::find($id); //Select * FROM roles WHERE role_id = id;

        return view('role.show', compact('role'));
    }

    public function create(){
        return view('role.create');
    }

    public function store(Request $request)
    {
        $validated =$request->validate([
            'role'=> ['required']
        ]);

        Role::create($validated);
        
        return redirect('/roles')->with('message_success', 'Role Successfully Saved!');
    }

    
    public function edit($id){
        $role = Role::find($id);
        return view ('role.edit',  compact('role'));
    }

    public function update (Request $request, Role $role){
        $validated = $request->validate([
            'role'=> ['required']
        ]);

        $role->update($validated); 

        return redirect('/roles')-> with ('message_success', 'Role Successfully updated.');
    }

    public function delete($id){
        $role = Role::find($id);
        return view ('role.delete', compact('role'));
    }

    public function destroy(Request $request, Role $role){
        $role->delete($request);

        return redirect('/roles')-> with ('message_success', 'Role Successfully deleted.');

    }
}