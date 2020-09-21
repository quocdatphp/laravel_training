@extends("layouts.admin")

@section('title')
	<title>Danh mục sản phẩm</title>
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
												<a href="#">Danh mục sản phẩm</a>
											</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
											{{-- <li class="list-inline-item">Dashboard</li> --}}
										</ul>
									</div>
									@can('category-add')
										<a href="{{route('categories.create')}}" class="au-btn au-btn-icon au-btn--green">
										<i class="zmdi zmdi-plus"></i>Thêm danh mục</a>
									@endcan
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
												<th>Tên danh mục</th>
												<th>Thao tác</th>
											</tr> 
										</thead>
										<tbody>
											@foreach($categories as $category)
											<tr class="tr-shadow">
												<td>{{$category->id}}</td>
												<td class="desc">{{$category->name}}</td>
												<td>
													<div class="table-data-feature">
														@can('category-edit')
															<a href="{{route('categories.edit', ['id' => $category->id] )}}" class="item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
															<i class="zmdi zmdi-edit"></i>
														</a>
														@endcan

														@can('category-delete')
															<a href="{{route('categories.delete', ['id' => $category->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Xoá">
															<i class="zmdi zmdi-delete"></i>
														</a>
														@endcan
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
									{{ $categories->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('partial.footer')
@endsection