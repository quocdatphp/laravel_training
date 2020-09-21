@extends("layouts.admin")

@section('title')
	<title>Thêm user</title>
@endsection

@section('js')
	<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
	<script>
		$('.select2-init').select2({
			'placeholder': 'Chọn vai trò'
		})
	</script>
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
											<li class="list-inline-item">Thêm user</li>
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
									<strong>Thêm </strong> user
								</div>
								<div class="card-body card-block">
									<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Tên user</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="text" id="hf-email" name="name" placeholder="Tên user" class="form-control" value="{{old('name')}}">
											</div>
										</div>
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Email</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="text" id="hf-email" name="email" placeholder="Nhập email" class="form-control" value="{{old('email')}}">
											</div>
										</div>
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Password</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="password" id="hf-email" name="password" placeholder="Password" class="form-control">
											</div>
										</div>
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Chọn vai trò</label>
											</div>
											<div class="col-12 col-md-9">
												<select name="role_id[]" class="form-control select2-init" multiple>
													@foreach($roles as $roleItem)
														<option value="{{$roleItem->id}}">{{$roleItem->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Lưu lại
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
											<a href="{{route('users.index')}}" class="btn btn-success btn-sm">
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