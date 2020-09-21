<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
			'name' => 'required|unique:products|max:255|min:6',
			'price' => 'required',
			'category_id' => 'required',
			'content' => 'required',
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Tên không được phép để trống',
			'name.unique' => 'Tên sản phẩm đã trùng',
			'name.max' => 'Tên không được phép quá 255 kí tự',
			'name.min' => 'Tên không được phép dưới 6 kí tự',
			'price.required' => 'Giá không được phép để trống',
			'category_id.required' => 'Danh mục không được để trống',
			'content.required' => 'Nội dung không được để trống'
		];
	}
}
