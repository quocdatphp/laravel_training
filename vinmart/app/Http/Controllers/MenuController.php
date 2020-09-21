<?php

namespace App\Http\Controllers;

use App\components\MenuRecursive;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Menu;

class MenuController extends Controller
{
	private $menuRecursive;
	private $menu;
	public function __construct(MenuRecursive $menuRecursive, Menu $menu)
	{
		$this->menuRecursive = $menuRecursive;
		$this->menu = $menu;
	}
	public function index()
	{
		$menus = $this->menu->paginate(10);
		return view('managerial.menus.index', compact('menus'));
	}

	public function create()
	{
		$optionSelect = $this->menuRecursive->MenuRecursiveAdd();
		return view('managerial.menus.add', compact('optionSelect'));
	}

	public function store(Request $request)
	{
		$this->menu->create([
			'name' => $request->name,
			'parent_id' => $request->parent_id,
			'slug' =>Str::slug($request->name)
		]);
		return redirect()->route('menus.index');
	}

	public function edit($id, Request $request)
	{
		$menuFollowIdEdit = $this->menu->find($id);
		$optionSelect = $this->menuRecursive->MenuRecursiveEdit($menuFollowIdEdit->parent_id);
		return view('managerial.menus.edit', compact('optionSelect', 'menuFollowIdEdit'));
	}

	public function update($id, Request $request)
	{
		$this->menu->find($id)->update([
			'name' => $request->name,
			'parent_id' => $request->parent_id,
			'slug' => Str::slug($request->name)
		]);
		return redirect()->route('menus.index');
	}

	public function delete($id)
	{
		$this->menu->find($id)->delete();
		return redirect()->route('menus.index');
	}
}
