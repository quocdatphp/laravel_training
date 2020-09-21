@extends("layouts.admin")

@section('title')
	<title>Thêm social media</title>
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
											<li class="list-inline-item">Thêm social media</li>
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
									<strong>Thêm </strong> socical media &nbsp;
								</div>
								<div class="card-body card-block">
									<form action="{{route('settings.store') . '?type=' . request()->type}}" method="post">
										@csrf
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Config_key</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="text" id="hf-email" name="config_key" placeholder="Nhập config_key" class="form-control @error('config_key') is-invalid @enderror">
												@error('config_key')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										@if(request()->type === 'Text')
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="hf-email" class="form-control-label">config_value</label>
												</div>
												<div class="col-12 col-md-9">
													<input type="text" id="hf-email" name="config_value" placeholder="Nhập config_value" class="form-control @error('config_value') is-invalid @enderror">
												@error('config_value')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
												</div>
											</div>
											@elseif(request()->type === 'Textarea')
											<div class="row form-group">
												<div class="col col-md-3">
													<label for="hf-email" class=" form-control-label">Config_value</label>
												</div>
												<div class="col-12 col-md-9">
													<textarea name="config_value" placeholder="Nhập config_value" class="form-control @error('config_value') is-invalid @enderror" rows="10"></textarea>
													@error('config_value')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
												</div>
											</div>
										@endif
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Lưu lại
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
											<a href="{{route('settings.index')}}" type="reset" class="btn btn-success btn-sm">
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