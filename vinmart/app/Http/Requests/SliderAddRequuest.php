<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequuest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		 return [
			'name' => 'required|unique:sliders|max:255',
			'description' => 'required',
			'image_path' => 'required',
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Chưa nhập tên slider',
			'name.unique' => 'Tên slider không được quá 50 kí tự',
			'description.required' => 'Chưa nhập mô tả slider',
			'image_path.required' => 'Chưa chọn slider',
		];
	}
}
