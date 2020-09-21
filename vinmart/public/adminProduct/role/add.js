$(function(){
    // Chọn từng module
	$('.checkbox-partial').on('click', function() {
		let id_all = $(this).attr('id');
		$(".children_"+id_all).prop('checked', $(this).prop('checked'));
		// $(this).parents('.card').find(".checkbox-children").prop('checked', $(this).prop('checked'));
    });

// Chọn tất cả check_all
    $('.check_all').on('click', function(){
        $(this).parents().find('.checkbox_children').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox-partial').prop('checked', $(this).prop('checked'));
    });
});


