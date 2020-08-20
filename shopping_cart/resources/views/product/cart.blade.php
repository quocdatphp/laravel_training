<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Xem sản phẩm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="cart_wrapper">
	@include('product.components.cart_component')
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">

		function cartUpdate(event) {
			event.preventDefault();
			let urlUpdateCart = $('.update_cart_url').data('url');
			let id = $(this).data('id');
			let quantity = $(this).parents('tr').find('input.updateQty').val();
			$.ajax({
				type: 'GET',
				url: urlUpdateCart,
				data: {id: id, quantity: quantity},
				success: function(data) {
					if (data.code === 200) {
						$('.cart_wrapper').html(data.cart_component);
						alert("Cập nhật thành công");
					}
				},
				error: function() {
					
				}
			});
		}

		function cartDelete(event) {
			event.preventDefault();
			let urlDelete = $('.cart').data('url');
			let id = $(this).data('id');
			$.ajax({
				type: 'GET',
				url: urlDelete,
				data: {id: id},
				success: function(data) {
					if (data.code === 200) {
						$('.cart_wrapper').html(data.cart_component);
						alert("Xoá thành công");
					}
				},
				error: function() {
					
				}
			});
		}

		$(function(){
			$(document).on('click', '.cart_update', cartUpdate);
			$(document).on('click', '.cart_delete', cartDelete);
		})
	</script>
</body>
</html>