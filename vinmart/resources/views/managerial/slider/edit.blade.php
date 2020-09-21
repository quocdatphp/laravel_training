@extends("layouts.admin")

@section('title')
	<title>Chỉnh sửa slider</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('adminProduct/slider/add.css')}}"/>
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
											<li class="list-inline-item">Chỉnh sửa slider</li>
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
									<strong>Chỉnh sửa </strong> menu
								</div>
								<div class="card-body card-block">
									<form action="{{route('slider.update', ['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Tên slider</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="text" id="hf-email" name="name" placeholder="Tên slider" class="form-control @error('name') is-invalid @enderror" value="{{$slider->name}}">
												@error('name')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class="form-control-label">Mô tả slider</label>
											</div>
											<div class="col-12 col-md-9">
												<textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="7">{{$slider->description}}</textarea>
												@error('description')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Hình ảnh slider</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="file" id="hf-email" name="image_path" class="form-control @error('image_path') is-invalid @enderror">
												@error('image_path')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
												<div class="col-4">
													<div class="row mt-2">
														<img src="{{$slider->image_path}}" alt="">
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Lưu lại
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
											<a href="{{route('slider.index')}}" class="btn btn-success btn-sm">
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