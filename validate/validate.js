$(document).ready(function(){
	$("$form1").validate({
		rules:{
			email: "required",
			password : {required: true, minlength:8}
		},
		messages:{
			email: {required:'Email harus di isi'}
		}
	})
})