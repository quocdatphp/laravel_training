@extends("layouts.admin")

@section('title')
	<title>Danh sách vai trò</title>
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
												<a href="#">Danh sách vai trò</a>
											</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
										</ul>
									</div>
									<a href="{{route('roles.create')}}" class="au-btn au-btn-icon au-btn--green">
										<i class="zmdi zmdi-plus"></i>Thêm vai trò</a>
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
												<th>Mới nhất</th>
												<th>Tên vai trò</th>
												<th>Mô tả vai trò</th>
												<th>Thao tác</th>
											</tr>
										</thead>
										<tbody>
											@foreach($roles as $roleItem)
												<tr class="tr-shadow">
													<td>{{$roleItem->id}}</td>
													<td>{{$roleItem->name}}</td>
													<td>{{$roleItem->display_name}}</td>
													<td>
														<div class="table-data-feature">
															<a href="{{ route('roles.edit', ['id' => $roleItem->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
																<i class="zmdi zmdi-edit"></i>
															</a>
															<a href="#" data-url="" class="item action__delete" data-toggle="tooltip" data-placement="top" title="Xoá">
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
									{{ $roles->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('partial.footer')
@endsection
