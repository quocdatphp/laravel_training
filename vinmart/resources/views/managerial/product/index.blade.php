@extends("layouts.admin")

@section('title')
	<title>Danh sách sản phẩm</title>
@endsection

@section('js')
	<script src="{{asset('vendors/sweetAlert2/sweetalert2@9.js')}}"></script>
	<script src="{{asset('adminProduct/main.js')}}"></script>
@endsection

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
												<a href="#">Danh sách sản phẩm</a>
											</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
										</ul>
									</div>
									<a href="{{route('product.create')}}" class="au-btn au-btn-icon au-btn--green">
										<i class="zmdi zmdi-plus"></i>Thêm sản phẩm</a>
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
						<div class="row m-t-30">
							<div class="col-md-12">
								<!-- DATA TABLE-->
								<div class="table-responsive m-b-40">
									<table class="table table-borderless table-data3">
										<thead>
											<tr>
												<th>STT</th>
												<th>Tên sản phẩm</th>
												<th>Giá sản phẩm</th>
												<th>Hình ảnh sản phẩm</th>
												<th>Danh mục sản phẩm</th>
												<th>Thao tác</th>
											</tr>
										</thead>
										<tbody>
											@foreach($products as $productItem)
												<tr class="tr-shadow">
													<td>{{$productItem->id}}</td>
													<td>{{$productItem->name}}</td>
													<td>{{number_format($productItem->price, 2, ",", ".")}}</td>
													<td>
														<img src="{{$productItem->feature_image_path}}" alt="" class="img--150"></td>
													<td>{{optional($productItem->category)->name}}</td>
													<td>
														<div class="table-data-feature">
															<a href="{{route('product.edit', ['id' => $productItem->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
																<i class="zmdi zmdi-edit"></i>
															</a>
															<a href="#" class="item action__delete" data-url="{{route('product.delete', ['id' => $productItem->id])}}" data-toggle="tooltip" data-placement="top" title="Xoá">
																<i class="zmdi zmdi-delete"></i>
															</a>
														</div>
													</td>
												</tr>
												<tr class="spacer"></tr>
											@endforeach
										</tbody>
									</table>
								</div>
								<!-- END DATA TABLE-->
								<div class="col-12">
									{{$products->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('partial.footer')
@endsection
