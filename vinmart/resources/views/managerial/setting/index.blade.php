@extends("layouts.admin")

@section('title')
	<title>Danh sách social media</title>
@endsection

@section('js')
	<script src="{{asset('vendors/sweetAlert2/sweetalert2@9.js')}}"></script>
	<script src="{{asset('adminProduct/main.js')}}" type="text/javascript" charset="utf-8"></script>
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
												<a href="#">Danh sách social media</a>
											</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
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
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Thêm Settings
							</button>
							<div class="dropdown-menu">
								<li><a class="dropdown-item" href="{{route('settings.create') . '?type=Text'}}">Text</a></li>
								<li><a class="dropdown-item" href="{{route('settings.create') . '?type=Textarea'}}">Textarea</a></li>
							</div>
						</div>
						<div class="row m-t-30">
							<div class="col-md-12">
								<!-- DATA TABLE-->
								<div class="table-responsive m-b-40">
									<table class="table table-borderless table-data3">
										<thead>
											<tr>
												<th>STT</th>
												<th>Config key</th>
												<th>Config value</th>
												<th>Thao tác</th>
											</tr> 
										</thead>
										<tbody>
											@foreach($settings as $settingItem)
											<tr class="tr-shadow">
												<td>{{$settingItem->id}}</td>
												<td class="desc">{{($settingItem->config_key)}}</td>
												<td class="desc">{{$settingItem->config_value}}</td>
												<td>
													<div class="table-data-feature">
														<a href="{{route('settings.edit', ['id' =>$settingItem->id]) . '?type=' . $settingItem->type}}" class="item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
															<i class="zmdi zmdi-edit"></i>
														</a>
														<a href="#" class="item action__delete" data-toggle="tooltip" data-url="{{ route('settings.delete', ['id'=>$settingItem->id]) }}" data-placement="top" title="Xoá">
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
									{{$settings->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('partial.footer')
@endsection