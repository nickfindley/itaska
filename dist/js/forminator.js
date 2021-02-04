// (function($){
// 	$(function(){
// 		if (typeof ($.fn.forminatorLoader) === 'undefined') {
// 			// nothing to do here
// 		} else {
// 			let _selects = $('.forminator-select');
// 			if( _selects.length ){
// 				_selects.each(function(){
// 					FUI.select( $(this) );
// 				});
// 			}
// 			// support ajax form
// 			$(document).on('after.load.forminator', function(e, _form_id){
// 				let _form = $('#forminator-module-'+ _form_id),
// 						_selects = _form.find('.forminator-select');

// 				if( _selects.length ){
// 					_selects.each(function(){
// 						FUI.select( $(this) );
// 					});
// 				}
// 			});
// 		}
// 	});
// })(window.jQuery)

jQuery(function($){

    $('.post-load').click(function() {

        var postid = $(this).attr('data-postid');
		alert( 'postid: ' + postid);

        $.post(ajax_object.ajaxurl, {
            action: 'my_load_ajax_content',            
            postid: postid
        }, function(data) {
            var $response   =   $(this).serializeArray;
            var postdata    =   $response.filter('#postdata').html();
            $('.post-here').html(postdata);
        });

    })

});