<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddSettingRequest;
use App\Setting;
use App\Traits\DeleteModelTrait;

class SettingAdminController extends Controller
{
	use DeleteModelTrait;
	private $setting;

	public function __construct(Setting $setting)
	{
		$this->setting = $setting;
	}

	public function index()
	{
		$settings = $this->setting->latest()->paginate(8);
		return view('managerial.setting.index', compact('settings'));
	}

	public function create()
	{
		return view('managerial.setting.add');
	}

	public function store(AddSettingRequest $request)
	{
		$this->setting->create([
			'config_key' => $request->config_key,
			'config_value' => $request->config_value,
			'type' => $request->type
		]);
		return redirect()->route('settings.index');
	}

	public function edit($id)
	{
		$setting = $this->setting->find($id);
		return view('managerial.setting.edit', compact('setting'));
	}

	public function update(Request $request, $id)
	{
		$this->setting->find($id)->update([
			'config_key' => $request->config_key,
			'config_value' => $request->config_value
		]);
		return redirect()->route('settings.index');
	}

	public function delete($id)
	{
		return $this->deleteModelTrait($id, $this->setting);
	}
}
