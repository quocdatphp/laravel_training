<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shopping cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container-product">
		<div class="container">
			<div class="col-12">
				<a href="{{route('showCart')}}" title="" class="btn btn-primary mb-4">Xem sản phẩm</a>
			</div>
			<div class="row d-flex justify-content-between">
				@foreach($products as $product)
					<div class="card" style="width: 24.5%">
						<img class="card-img-top" src="{{$product->image_path}}" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">{{$product->name}}</h5>
							<p class="card-text">{{number_format($product->price)}} VND</p>
							<p class="card-text">{{$product->description}}</p>
							<a href="" data-url="{{route('addToCart', ['id' => $product->id])}}" class="btn btn-primary add_cart">Mua ngay</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function addTocart(event){
			event.preventDefault();
			let urlCart = $(this).data('url');
			$.ajax({
				type: "GET",
				url: urlCart,
				dataType: 'json',
				success: function (data) {
					if (data.code === 200) {
						alert("Thêm vào giỏ hàng thành công");
					}
				},
				error: function (){

				}
			});
		}
		$(function(){
			$('.add_cart').on("click", addTocart);
		});
	</script>
</body>
</html>