@extends("layouts.admin")

@section('title')
	<title>Thêm Permission</title>
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
											<li class="list-inline-item">Thêm Permission</li>
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
									<strong>Thêm </strong> Permission
								</div>
								<div class="card-body card-block">
									<form action="{{route('permissions.store')}}" method="post">
										@csrf
										<div class="row form-group">
											<div class="col col-md-3">
												<label for="hf-password" class=" form-control-label">Chọn tên module</label>
											</div>
											<div class="col-12 col-md-9">
												<select name="module_parent" class="form-control">
                                                    <option value="">Chọn tên module</option>
                                                    @foreach (config('permissions.table_module') as $moduleItem)
                                                         <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                                    @endforeach
												</select>
											</div>
                                        </div>
                                        <div class="row form-group">
                                            @foreach (config('permissions.module_children') as $moduleItemChildren)
                                                <div class="col-3 mt-4">
                                                    <label for=""><input type="checkbox" name="module_children[]" value="{{ $moduleItemChildren }}"> {{ $moduleItemChildren }} </label>
                                                </div>
                                            @endforeach
                                        </div>
										<div class="card-footer">
											<button type="submit" class="btn btn-primary btn-sm">
												<i class="fa fa-dot-circle-o"></i> Lưu lại
											</button>
											<button type="reset" class="btn btn-danger btn-sm">
												<i class="fa fa-ban"></i> Reset
											</button>
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
