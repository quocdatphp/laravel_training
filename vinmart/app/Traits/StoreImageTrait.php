<?php

	namespace App\Traits;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;

	trait StoreImageTrait{
	public function storageTraitUpload($request, $fieldName, $folderName)
	{
		if ($request->hasFile($fieldName)) {
			$file = $request->$fieldName;
			$fileNameOrigin = $file->getClientOriginalName();
			$fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
			$filepath = $request->file($fieldName)->storeAs('public/'.$folderName. '/' .auth()->id(), $fileNameHash);
			// Lấy user đang login vào hệ thống
			$dataUploadTrait = [
				'file_name' => $fileNameOrigin,
				'file_path' => Storage::url($filepath)
			];
			return $dataUploadTrait;
		}
		return null;
	}

	public function storageTraitUploadMultiple($file, $folderName)
		{
			$fileNameOrigin = $file->getClientOriginalName();
			$fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
			$filepath = $file->storeAs('public/'.$folderName. '/' .auth()->id(), $fileNameHash);
			// Lấy user đang login vào hệ thống
			$dataUploadTrait = [
				'file_name' => $fileNameOrigin,
				'file_path' => Storage::url($filepath)
			];
			return $dataUploadTrait;
		}
	}
 ?>
