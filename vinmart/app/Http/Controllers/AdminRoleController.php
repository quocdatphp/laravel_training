<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;

class AdminRoleController extends Controller
{
	private $role;
	private $permission;
	public function __construct(Role $role, Permission $permission)
	{
		$this->role = $role;
		$this->permission = $permission;
	}

	public function index()
	{
		$roles = $this->role->paginate(10);
		return view('managerial.role.index', compact('roles'));
	}

	public function create()
	{
		$permissionsParent = $this->permission->where('parent_id', 0)->get();
		return view('managerial.role.add', compact('permissionsParent'));
	}

	public function store(Request $request)
	{
		$role = $this->role->create([
			'name' => $request->name,
			'display_name' =>$request->display_name,
		]);

		$role->permission()->attach($request->permission_id);
		return redirect()->route('roles.index');
	}

	public function edit($id)
	{
		$permissionsParent = $this->permission->where('parent_id', 0)->get();
		$role = $this->role->find($id);
		$permissionChecked = $role->permission;
		// dd($permissionChecked);
		return view('managerial.role.edit', compact('permissionsParent', 'role', 'permissionChecked'));
	}

	public function update(Request $request, $id)
	{
		$role = $this->role->find($id);
		$role->update([
			'name' => $request->name,
			'display_name' =>$request->display_name,
		]);
		$role->permission()->sync($request->permission_id);
		return redirect()->route('roles.index');
	}


}
