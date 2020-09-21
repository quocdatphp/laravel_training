<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\components\Recursive;

class CategoryController extends Controller
{
	private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function create()
	{
		$htmlOption = $this->getCategory($parentId = '');
		return view('managerial.category.add', compact('htmlOption'));
	}

	public function index()
	{
		$categories = $this->category->latest()->paginate(7);
		return view('managerial.category.index', compact('categories'));
	}

	public function store(Request $request)
	{
		$this->category->create([
			'name' => $request->name,
			'parent_id' => $request->parent_id,
			'slug' => Str::slug($request->name)
		]);

		return redirect()->route('categories.index');
	}

	public function getCategory($parentId)
	{
		$data = $this->category->all();
		$recursive = new Recursive($data);
		$htmlOption = $recursive->categoryRecursive($parentId);
		return $htmlOption;
	}

	public function edit($id)
	{
		$category = $this->category->find($id);
		$htmlOption = $this->getCategory($category->parent_id);

		return view('managerial.category.edit', compact('category', 'htmlOption'));
	}

	public function update($id, Request $request)
	{
		$this->category->create([
			'name' => $request->name,
			'parent_id' => $request->parent_id,
			'slug' => Str::slug($request->name)
		]);

		return redirect()->route('categories.index');
	}

	public function delete($id)
	{
		$this->category->find($id)->delete();
		return redirect()->route('categories.index');

	}
}
