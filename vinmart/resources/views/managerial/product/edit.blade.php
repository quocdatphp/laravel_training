@extends("layouts.admin")

@section('title')
	<title>Thêm sản phẩm</title>
@endsection

{{-- @section('css')
	<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
@endsection --}}

<!-- BREADCRUMB-->
@section('content')
			<section class="au-breadcrumb m-t-75">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="au-breadcrumb-content">
									<div class="au-breadcrumb-left">
										<span class="au-breadcrumb-span">You are here:</span>
										<ul class="list-unstyled list-inline au-breadcrumb__list">
											<li class="list-inline-item active">
												<a href="#">Trang chủ</a>
											</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
											<li class="list-inline-item">Thêm sản phẩm</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END BREADCRUMB-->

			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<strong>Thêm </strong> sản phẩm
								</div>
								<div class="card-body card-block">
									<form action="{{route('product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row form-group mb-4">
											<div class="col col-md-2">
												<label class="form-control-label">Tên sản phẩm</label>
											</div>
											<div class="col-12 col-md-4">
												<input type="text" name="name" placeholder="Nhập tên sản phẩm" class="form-control" value="{{$product->name}}">
												{{-- <span class="help-block">Please enter your email</span> --}}
											</div>
											<div class="col col-md-2">
												<label class="form-control-label">Giá sản phẩm</label>
											</div>
											<div class="col-12 col-md-4">
												<input type="text" name="price" placeholder="Nhập giá sản phẩm" class="form-control" value="{{$product->price}}">
												{{-- <span class="help-block">Please enter your email</span> --}}
											</div>
										</div>
										<div class="row form-group mb-4">
											<div class="col col-md-2">
												<label class="form-control-label">Hình ảnh đại diện</label>
											</div>
											<div class="col-12 col-md-4">
												<input type="file" name="feature_image_path" class="form-control-file">
												<div class="col-12">
													<div class="row pt-3">
														<img src="{{$product->feature_image_path}}" alt="">
													</div>
												</div>
											</div>
											<div class="col col-md-2">
												<label class="form-control-label">Hình ảnh chi tiết</label>
											</div>
											<div class="col-12 col-md-4">
												<input type="file" name="image_path[]" class="form-control-file" multiple>
												<div class="col-12">
													<div class="row">
														@foreach($product->productImage as $productImageItem)
															<div class="pt-2" style="width: 30%; padding-right: 10px">
																<img src="{{$productImageItem->image_path}}" alt="">
															</div>
														@endforeach
													</div>
												</div>
											</div>
										</div>
										<div class="row form-group mb-4">
											<div class="col col-md-2">
												<label class="form-control-label"> Nhập tags sản phẩm</label>
											</div>
											<div class="col-12 col-md-4">
												<select class="form-control tags_select_choose" multiple="multiple" name="tags[]">
													@foreach($product->tags as $tagItem)
														<option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
													@endforeach

												</select>
											</div>
											<div class="col col-md-2">
												<label class="form-control-label">Danh mục cha</label>
											</div>
											<div class="col-12 col-md-4">
												<select name="category_id" class="form-control select2_init">
													<option value="">Chọn danh mục</option>
													{!! $htmlOption !!}
												</select>
											</div>
										</div>
										<div class="no-gutters form-group mb-4">
											<div class="col col-md-2">
												<label class=" form-control-label">Nội dung sản phẩm</label>
											</div>
											<div class="col-12 col-md-12">
												<textarea name="content" rows="15" class="form-control tinymce_editor_init" 
												>{{$product->content}}</textarea>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Lưu lại
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
											<a href="{{route('product.index')}}" class="btn btn-success btn-sm">
												<i class="fa fa-ban"></i> Quay về
											</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('partial.footer')
@endsection

@section('js')
	<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{asset('adminProduct/add/add.js')}}" type="text/javascript" charset="utf-8"></script>
@endsection
