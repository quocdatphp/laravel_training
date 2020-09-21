<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\components\Recursive;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Tag;
use App\ProductTag;
use App\Traits\StoreImageTrait;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductAddRequest;
use Illuminate\Support\Facades\Log;
use Exception;


class AdminProductController extends Controller
{
	use StoreImageTrait, DeleteModelTrait;
	private $category;
	private $product;
	private $productImage;
	private $tag;
	private $productTag;
	public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
	{
		$this->category = $category;
		$this->product = $product;
		$this->productImage = $productImage;
		$this->tag = $tag;
		$this->productTag = $productTag;
	}

	public function index()
	{
		$products = $this->product->latest()->paginate(8);
		return view('managerial.product.index', compact('products'));
	}

	public function create()
	{
		$htmlOption = $this->getCategory($parentId = '');
		return view('managerial.product.add', compact('htmlOption'));
	}

	public function getCategory($parentId)
	{
		$data = $this->category->all();
		$recursive = new Recursive($data);
		$htmlOption = $recursive->categoryRecursive($parentId);
		return $htmlOption;
	}

	public function store(ProductAddRequest $request)
	{
		try {
			DB::beginTransaction();
			$dataProductCreate = [
				'name' => $request->name,
				'price' => $request->price,
				'content' => $request->content,
				'user_id' => auth()->user()->id,
				'category_id' => $request->category_id
			];
			$dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
			if (!empty($dataUploadFeatureImage)) {
				$dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
				$dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
			}
			$product = $this->product->create($dataProductCreate);

			// insert data to product_images
			if ($request->hasFile('image_path')) {
				foreach ($request->image_path as $fileItem) {
					$dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
					$product->images()->create([
						'image_path' => $dataProductImageDetail['file_path'],
						'image_name' => $dataProductImageDetail['file_name']
					]);
				}
			}

			// Insert tags for product
			if (!empty($request->tags)) {

				foreach ($request->tags as $tagItem) {
					// Insert to tags
					$tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
					$tagIds[] = $tagInstance->id;
				}
			}

			$product->tags()->attach($tagIds);
			DB::commit();
			return redirect()->route('product.index');

		} catch (Exception $exception){
			DB::rollBack();
			Log::error('message' . $exception->getMessage() . '----Line' . $exception->getLine());
		}
	}

	public function edit($id)
	{
        $product = $this->product->find($id);
		$htmlOption = $this->getCategory($product->category_id);
		return view('managerial.product.edit', compact('htmlOption', 'product'));
	}

	public function update(Request $request, $id)
	{
		try {
			DB::beginTransaction();
			$dataProductUpdate = [
				'name' => $request->name,
				'price' => $request->price,
				'content' => $request->content,
				'user_id' => auth()->user()->id,
				'category_id' => $request->category_id
			];
			$dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
			if (!empty($dataUploadFeatureImage)) {
				$dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
				$dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
			}
			$this->product->find($id)->update($dataProductUpdate);
			$product = $this->product->find($id);

			// update data to product_images
			if ($request->hasFile('image_path')) {
				$this->productImage->where('product_id', $id)->delete();
				foreach ($request->image_path as $fileItem) {
					$dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
					$product->images()->create([
						'image_path' => $dataProductImageDetail['file_path'],
						'image_name' => $dataProductImageDetail['file_name']
					]);
				}
			}

			// Insert tags for product
			if (!empty($request->tags)) {

				foreach ($request->tags as $tagItem) {
					// Insert to tags
					$tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
					$tagIds[] = $tagInstance->id;
				}
			}

			$product->tags()->sync($tagIds);
			DB::commit();
			return redirect()->route('product.index');

		} catch (Exception $exception){
			DB::rollBack();
			Log::error('message' . $exception->getMessage() . '----Line' . $exception->getLine());
		}
	}

	public function delete($id)
	{
		return $this->deleteModelTrait($id, $this->product);
	}
}
