@extends("layouts.admin")

@section('title')
	<title>Thêm danh mục</title>
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
											<li class="list-inline-item">Thêm danh mục</li>
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
									<strong>Thêm </strong> danh mục
								</div>
								<div class="card-body card-block">
									<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-email" class=" form-control-label">Tên danh mục</label>
											</div>
											<div class="col-12 col-md-9">
												<input type="text" id="hf-email" name="name" placeholder="Tên danh mục" class="form-control">
												{{-- <span class="help-block">Please enter your email</span> --}}
											</div>
										</div>
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-password" class=" form-control-label">Danh mục cha</label>
											</div>
											<div class="col-12 col-md-9">
												<select name="parent_id" id="select" class="form-control">
													<option value="0">Chọn danh mục</option>
													{!!$htmlOption!!}
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
											<a href="{{route('categories.index')}}" type="reset" class="btn btn-success btn-sm">
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