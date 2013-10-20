/*
********================================*****************
* Shopping Cart Version 4.0 
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* All Copy Rights Reserved by Vasplus Programming Blog
*********=================================****************
*/

function z_check_out()
{
	var cartItemsTotals = $("#main_total_cart_items").val();
	$("div.shopping_cart_status").hide();
	$("div#shopping_cart_status").hide();
	$("div.checkout_user_info").show();
	$("div#checkout_user_info").show();
	$("#cartItemsTotals").val('Items Total: $'+cartItemsTotals);
	$('html, body').animate({scrollTop:0}, 'slow');
}
function z_checkout()
{
	var cartItemsTotals = $("#vpb_main_total_cart_items").val();
	$("div.shopping_cart_status").hide();
	$("div#shopping_cart_status").hide();
	$("div.checkout_user_info").show();
	$("div#checkout_user_info").show();
	$("#cartItemsTotals").val('Items Total: $'+cartItemsTotals);
	$('html, body').animate({scrollTop:0}, 'slow');
}
function z_go_back()
{
	$("div.checkout_user_info").hide();
	$("div#checkout_user_info").hide();
	$("div.shopping_cart_status").show();
	$("div#shopping_cart_status").show();
	$('html, body').animate({scrollTop:0}, 'slow');
}
function z_submitCart()
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var vpb_fullname = $("#vpb_fullname").val();
	var vpb_email = $("#vpb_email").val();
	var vpb_address = $("#vpb_address").val();
	var vpb_phone = $("#vpb_phone").val();
	
	if (vpb_fullname == "")
	{
		$("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your fullname in the specified field to proceed. Thanks..</div><br clear="all" />');
		$("#vpb_fullname").focus();
	}
	else if( vpb_email == "")
	{
		$("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your email address in its field to move on. Thanks..</div><br clear="all" />');
		$("#vpb_email").focus();
	}
	else if(reg.test(vpb_email) == false)
	{
		$("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter a valid email address to proceed. Thanks...</div><br clear="all" />');
		$("#vpb_email").focus();
	}
	else if(vpb_address == "")
	{
		$("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your home address in the specified field to proceed. Thanks...</div><br clear="all" />');
		$("#vpb_address").focus();
	}
	else if(vpb_phone == "")
	{
		$("#response_status_brought").html('<div id="vpb_shopping_cart_is_currently_empty" align="left">Please enter your phone number in its field to go. Thanks...</div><br clear="all" />');
		$("#vpb_phone").focus();
	}
	else
	{
		var dataString = "vpb_fullname=" + vpb_fullname + "&vpb_email=" + vpb_email + "&vpb_address=" + vpb_address + "&vpb_phone=" + vpb_phone + "&page=submit_cart";
		
		$.ajax({  
			type: "POST",  
			url: "vasplus_programming_blog_shopping_cart_v4.php",  
			data: dataString,
			beforeSend: function() 
			{
				$('html, body').animate({scrollTop:0}, 'slow');
				$("div.checkout_user_info").hide();
				$("div#checkout_user_info").hide();
				$("div.shopping_cart_status").show();
				$("div#shopping_cart_status").show();
				$("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
			},  
			success: function(response)
			{
				$("#response").html(response);
			}
		});
	}
}
function z_clear_cart(username)
{
	if(confirm("Are you sure that you want to completely empty your cart?"))
	{
		var dataString = "username=" + username + "&page=clear_cart";
		$.ajax({  
			type: "POST",  
			url: "vasplus_programming_blog_shopping_cart_v4.php",  
			data: dataString,
			beforeSend: function() 
			{
				$('html, body').animate({scrollTop:0}, 'slow');
				$("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
			},  
			success: function(response)
			{
				$("div.checkout_user_info").hide();
				$("div#checkout_user_info").hide();
				$("div.shopping_cart_status").show();
				$("div#shopping_cart_status").show();
				$("#response").html(response);
			}
		});
	}
	return false;
}
function z_remove_this_item(item_id)
{
	if(confirm("Are you sure that you really want to remove this item?"))
	{
		var dataString = "item_id=" + item_id + "&page=remove_this_item";
		$.ajax({  
			type: "POST",  
			url: "vasplus_programming_blog_shopping_cart_v4.php",  
			data: dataString,
			beforeSend: function() 
			{
				$('html, body').animate({scrollTop:0}, 'slow');
				$("#items_cover"+item_id).html('<br><img src="loading.gif" align="absmiddle" alt="Loading..."> Removing...');
			},  
			success: function(response)
			{
				var empty_cart = response.indexOf('empty');
				if (empty_cart != -1 ) 
				{
					$("div.checkout_user_info").hide();
					$("div#checkout_user_info").hide();
					$("div.shopping_cart_status").show();
					$("div#shopping_cart_status").show();
					$("#response").html(response);
				}
				else
				{
					$("#new_sum").val('Items Total: $'+response);
					$("#items_cover"+item_id).html('');
					$("#vpb_main_total_cart_items").val(response);
				}
			}
		});
	}
	return false;
}
function z_add_to_cart(item_name,item_price,status)
{
	$("div.checkout_user_info").hide();
	$("div#checkout_user_info").hide();
	$("div.shopping_cart_status").show();
	$("div#shopping_cart_status").show();
	
	var dataString = "item_name=" + item_name + "&item_price=" + item_price + "&page=add_to_cart";;
	$.ajax({  
		type: "POST",  
		url: "vasplus_programming_blog_shopping_cart_v4.php",  
		data: dataString,
		beforeSend: function() 
		{
			$('html, body').animate({scrollTop:0}, 'slow');
			$("#response").html('<img src="loading.gif" align="absmiddle" alt="Loading..."> Loading...<br clear="all" /><br clear="all" />');
		},  
		success: function(response)
		{
			$("#response").html(response);
		}
	});
}