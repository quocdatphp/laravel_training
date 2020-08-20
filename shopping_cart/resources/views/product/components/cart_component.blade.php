<div class="cart" data-url = "{{route('deleteCart')}}">
		<div class="container">
				<table class="table table-bordered update_cart_url" data-url = "{{route('updateCart')}}">
					<thead>
					<tr >
						<th scope="col">STT</th>
						<th scope="col">Tên</th>
						<th scope="col">Ảnh sản phẩm</th>
						<th scope="col">Giá</th>
						<th scope="col">Số lượng</th>
						<th scope="col">Tổng tiền</th>
						<th scope="col">Thao tác</th>
					</tr>
					</thead>
					<tbody>
						@php
							$total = 0;
						@endphp

						@foreach($carts as $id => $cartItem)
						@php
							$total += $cartItem['price'] * $cartItem['quantity'];
						@endphp
							<tr>
								<th scope="row">{{$id}}</th>
								<td>{{$cartItem['name']}}</td>
								<td><img src="{{$cartItem['image']}}" style="width: 20%" alt=""></td>
								<td>{{number_format($cartItem['price'])}} <sup>đ</sup></td>
								<td>
									<input type="number" class="updateQty" min="1" value="{{$cartItem['quantity']}}">
								</td>
								<td>{{number_format($cartItem['price'] * $cartItem['quantity'])}} <sup>đ</sup></td>
								<td colspan="2">
									<a href="" data-id="{{$id}}" class="btn btn-primary cart_update" title="">Cập nhật</a>
									<a href="" data-id="{{$id}}" class="btn btn-danger cart_delete" title="">Xoá</a>
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
				<div class="col-7">Thành tiền: {{number_format($total)}} <sup>đ</sup></div>
			</div>
		</div>