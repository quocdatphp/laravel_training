@extends("layouts.admin")

@section('title')
	<title>Chỉnh sửa vai trò</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('adminProduct/slider/add.css')}}" />
@endsection

@section('js')
	<script type="text/javascript" src="{{asset('adminProduct/role/add.js')}}"></script>
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
									<a href="#">Trang chủ</a>
								</li>
								<li class="list-inline-item seprate">
									<span>/</span>
								</li>
								<li class="list-inline-item">Chỉnh sửa vai trò</li>
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
					<div class="card-header"><strong>Chỉnh sửa </strong> vai trò</div>
					<div class="card-body card-block">
						<form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="hf-email" class="form-control-label">Tên vai trò</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="text" id="hf-email" name="name" placeholder="Tên slider" class="form-control" value="{{$role->name}}" />
								</div>
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="hf-email" class="form-control-label">Mô tả vai trò</label>
								</div>
								<div class="col-12 col-md-9">
									<textarea name="display_name" class="form-control" rows="7">{{$role->display_name}}</textarea>
								</div>
                            </div>
                            <div class="col-12">
                                <div class="card-body text-dark">
                                    <input type="checkbox" class = "check_all" />
                                    &emsp13; Chọn tất cả
                                </div>
                            </div>
							@foreach($permissionsParent as $permissionsParentItem)
							<div class="card border-success mb-3">
								<div class="card-header bg-transparent border-success"><input type="checkbox" id="{{ $permissionsParentItem['id'] }}" class="checkbox-partial" />&emsp; Module {{$permissionsParentItem->name}}</div>
								<div class="row">
									@foreach($permissionsParentItem->permissionsChildren as $permissionsChildrentItem)
									<div class="col-3">
										<div class="card-body text-dark">
											<input type="checkbox" name="permission_id[]"
                                            class = "children_{{ $permissionsChildrentItem['parent_id'] }} checkbox_children"
                                            {{ $permissionChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
											value="{{$permissionsChildrentItem->id}}"
											 />&nbsp; {{$permissionsChildrentItem->name}}
										</div>
									</div>
									@endforeach
                                </div>
							</div>
							@endforeach
							<div class="card-footer">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Lưu lại</button>
								<button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
								<a href="{{route('roles.index')}}" class="btn btn-success btn-sm"> <i class="fa fa-ban"></i> Quay về </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('partial.footer') @endsection
