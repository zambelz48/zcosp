/**
 * Unicorn Admin Template
 * Diablo9983 -> diablo9983@gmail.com
**/
$(document).ready(function(){
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
            required:{
				required:true
			},
			username:{
				required:true
			},
            site_name:{
                required:true    
            },
            email:{
				required:true,
				email:true
			},
            date:{
				required:true,
				date:true
			},
			url:{
				url:true
			},
            min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
            number:{
				required:true,
				number:true
			},
            password:{
				required:true,
				minlength:6,
				maxlength:20
			},
			re_password:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#password"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});
