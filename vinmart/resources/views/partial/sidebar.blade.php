<aside class="menu-sidebar2">
			<div class="logo">
				<a href="#">
					<img src="{{asset('Adminlte/images/icon/logo.png')}}" alt="Cool Admin" />
				</a>
			</div>
			<div class="menu-sidebar2__content js-scrollbar1">
				<div class="account2">
					<div class="image img-cir img-120">
						<img src="{{asset('Adminlte/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
					</div>
					<h4 class="name">Quốc Đạt PHP</h4>
					<a href="#">Đăng xuất</a>
				</div>
				<nav class="navbar-sidebar2">
					<ul class="list-unstyled navbar__list">
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('categories.index')}}">
								<i class="fa fa-list-alt"></i>Danh mục sản phẩm
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('menus.index')}}">
								<i class="fas fa-tachometer-alt"></i>Danh sách menu
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('product.index')}}">
								<i class="fas fa-tachometer-alt"></i>Sản Phẩm
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('slider.index')}}">
								<i class="fas fa-tachometer-alt"></i>Quản lí slider
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('settings.index')}}">
								<i class="fas fa-tachometer-alt"></i>Settings
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('users.index')}}">
								<i class="fas fa-tachometer-alt"></i>Danh sách nhân viên
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
						<li class="active has-sub">
							<a class="js-arrow" href="{{route('roles.index')}}">
								<i class="fas fa-tachometer-alt"></i>Danh sách vai trò (roles)
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
                        </li>
                        <li class="active has-sub">
							<a class="js-arrow" href="{{ route('permissions.create') }}">
								<i class="fas fa-tachometer-alt"></i>Tạo dữ liệu bảng Permission
								<span class="arrow">
									<i class="fas fa-angle-down"></i>
								</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
