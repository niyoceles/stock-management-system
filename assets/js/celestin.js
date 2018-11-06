
function eMsg(params){
	alert("Error: L"+params+"+");
}//end eMsg

//login
$(document).on('submit', '#form-login', function(event) {
	event.preventDefault();
	/* Act on the event */
	var un = $('#un').val();
	var up = $('#up').val();

	$.ajax({
			url: 'data/login_user.php',
			type: 'post',
			dataType: 'json',
			data: {
				un:un,
				up:up
			},
			success: function (data) {
				console.log(data);
				if(data.logged == true){
					window.location = data.url;
				}else{
					alert(data.msg);
					$('#un').focus();
				}
			},
			error: function(){
				alert('Error: L17+');
			}
		});
});

//all item
function showAllItem()
{
	$.ajax({
			url: 'data/all_item.php',
			success: function (data) {
				$('#all-item').html(data);
			},
			error: function(){
				alert('Error: L42+');
			}
		});
}//end showAllItem
showAllItem();

$('#add-new-item').click(function(event) {
	/* Act on the event */
	$('#modal-item').find('.modal-title').text('Add New Item');
	$('#modal-item').modal('show');
	$('#submit-item').val('add');
});

$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var iName = $('#item-name').val();
	var iCode = $('#code').val();
	var iDepart = $('#depart').val();
	var iPrice = $('#item-price').val();
	var iType = $('#item-type').val();
	var description = $('#description').val();
    if($('#submit-item').val() == "add"){
    	// console.log('add ra');
	    $.ajax({
	    		url: 'data/add_item.php',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {
	    			iName:iName,
	    			iCode:iCode,
	    			iDepart:iDepart,
	    			iPrice:iPrice,
	    			iType:iType,
	    			description:description
	    		},
	    		success: function (data) {
	    			console.log(data);
	    			if(data.valid == true){
	    				$('#modal-message').find('#msg-body').text(data.msg);
	    				$('#modal-item').modal('hide');
	    				showAllItem();
	    				$('#modal-message').modal('show');
	    				$('#submit-item').val('null');
	    			}
	    		},
	    		error: function(){
	    			eMsg('70');
	    		}//
	    	});
    }//end if == "add"
});


function editModal(item_id){
	// $('#submit-item').val('add');
	$.ajax({
			url: 'data/get_item.php',
			type: 'post',
			dataType: 'json',
			data: {
				item_id:item_id
			},
			success: function (data) {
				$('#submit-item').val(data.event);
				$('#code').val(data.code);
				$('#depart').val(data.depart);
				$('#item-name').val(data.name);		
				$('#item-price').val(data.price);
				$('#item-id').val(data.id);
				$('#description').val(data.description);
				$('#item-type').val(data.type);
				$('#modal-item').find('.modal-title').text(data.title);
				$('#modal-item').modal('show');
			},
			error: function(){
				alert('Error: L56+');
			}
		});
}//end editModal

//save edit modal
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-item').val();
	var item_id = $('#item-id').val();
    var iCode = $('#code').val();
    var iDepart = $('#depart').val();
	var iName = $('#item-name').val();
	var iPrice = $('#item-price').val();
	var iType = $('#item-type').val();
	var description = $('#description').val();

	if(submit  == "edit"){
		$.ajax({
				url: 'data/edit_item.php',
				type: 'post',
				dataType: 'json',
				data: {
					item_id:item_id,
					iCode:iCode,
	    			iDepart:iDepart,
					iName:iName,
	    			iPrice:iPrice,
	    			iType:iType,
	    			description:description
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-item').modal('hide');
						showAllItem();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('127');
				}
			});
	}//end submit
});

// ///////////////////////////////////////
//all account
function showAllAccount()
{
	$.ajax({
			url: 'data/all_account.php',
			success: function (data) {
				$('#all-account').html(data);
			},
			error: function(){
				alert('Error: L42+');
			}
		});
}//end showAllAccount
showAllAccount();

$('#add-new-account').click(function(event) {
	/* Act on the event */
	$('#modal-account').find('.modal-title').text('Add New Account');
	$('#modal-account').modal('show');
	$('#submit-account').val('add');
});

$(document).on('submit', '#form-account', function(event) {
	event.preventDefault();
	/* Act on the event */
	var iUsername = $('#username').val();
	var iPassword = $('#password').val();
	var iUsertype = $('#user_type').val();
	var phone = $('#phone').val();
	var iNames = $('#names').val();
    if($('#submit-account').val() == "add"){
    	// console.log('add ra');
	    $.ajax({
	    		url: 'data/add_account.php',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {
	    			iUsername:iUsername,
	    			iPassword:iPassword,
	    			iUsertype:iUsertype,
	    			phone:phone,
	    			iNames:iNames
	    		},
	    		success: function (data) {
	    			console.log(data);
	    			if(data.valid == true){
	    				$('#modal-message').find('#msg-body').text(data.msg);
	    				$('#modal-account').modal('hide');
	    				showAllAccount();
	    				$('#modal-message').modal('show');
	    				$('#submit-account').val('null');
	    			}
	    		},
	    		error: function(){
	    			eMsg('70');
	    		}//
	    	});
    }//end if == "add"
});


function editModalAccount(user_id){
	// $('#submit-account').val('add');
	$.ajax({
			url: 'data/get_account.php',
			type: 'post',
			dataType: 'json',
			data: {
			user_id:user_id
			},
			success: function (data) {
				$('#submit-account').val(data.event);
				$('#username').val(data.username);
				$('#password').val(data.password);
				$('#user_id').val(data.user_id);
				$('#names').val(data.names);
				$('#user_type').val(data.user_type);
				$('#phone').val(data.phone);
				$('#modal-account').find('.modal-title').text(data.title);
				$('#modal-account').modal('show');
			},
			error: function(){
				alert('Error: L56+');
			}
		});
}//end editModal

//save edit modal
$(document).on('submit', '#form-account', function(event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-account').val();
	var user_id = $('#user_id').val();

	var iUsername = $('#username').val();
	var iPassword = $('#password').val();
	var iUsertype = $('#user_type').val();
	var iNames = $('#names').val();
	var phone = $('#phone').val();

	if(submit  == "edit"){
		$.ajax({
				url: 'data/edit_account.php',
				type: 'post',
				dataType: 'json',
				data: {
					user_id:user_id,
					iUsername:iUsername,
	    			iPassword:iPassword,
	    			iUsertype:iUsertype,
	    			iNames:iNames,
	    			phone:phone
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-account').modal('hide');
						showAllAccount();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('127');
				}
			});
	}//end submit
});
// /////////////////////////////////
///////////////////////////////////

function showAllType(){
	$.ajax({
			url: 'data/all_type.php',
			type: 'post',
			success: function (data) {
				$('#all-type').html(data);
			},
			error: function(){
				eMsg('152');
			}
		});
}//end showAllStockList
showAllType();

// $('#del-stock').on('click', '.selector', function(event) {
// 	event.preventDefault();
// 	/* Act on the event */
// 	// $('input[type=checkbox]:checked').each(function(index) {
//  //        //where the magic begins wahaha. ge ahak.
//  // 		console.log($(this).val())
//  //    });
//  	console.log('sad');
// });
$('#del-type').click(function(event) {
	/* Act on the event */
	var check = 0;
	 $('input[type=checkbox]:checked').each(function(index) {
		check++;        
    });
	 if(check == 0){
	 	alert('Please Select Row!');
	 }else{
	 	$('#confirm-typeitem').val('itemtypedel');
		$('#modal-confirmation').modal('show');
	}//end if check == 0
});

$('.del-typeitem').click(function(event) {
	/* Act on the event */
	if($('#confirm-typeitem').val() == "itemtypedel"){
			var finish = false;
		$('input[type=checkbox]:checked').each(function(index) {
			// console.log($(this).val());
			finish = true;
			var item_type_id = $(this).val();
			$.ajax({
					url: 'data/del_type.php',
					type: 'post',
					dataType: 'json',
					data: {
						item_type_id:item_type_id
					},
					success: function (data) {
						showAllType();
					},
					error: function(){
						eMsg('1950');
					}
				});
	    });
		if(finish == true){
			$('#modal-confirmation').modal('hide');
			$('#modal-message').find('#msg-body').text('Removess Successfully!')
			$('#modal-message').modal('show');
		}//end finish
		
	}//end if
});

$('#add-type').click(function(event) {
	/* Act on the event */
	$('#modal-type').find('.modal-title').text('New type');
	$('#modal-type').modal('show');
});



////////////////////////////


function showAllStockList(){
	$.ajax({
			url: 'data/all_stocklist.php',
			type: 'post',
			success: function (data) {
				$('#all-stocklist').html(data);
			},
			error: function(){
				eMsg('152');
			}
		});
}//end showAllStockList
showAllStockList();

// $('#del-stock').on('click', '.selector', function(event) {
// 	event.preventDefault();
// 	/* Act on the event */
// 	// $('input[type=checkbox]:checked').each(function(index) {
//  //        //where the magic begins wahaha. ge ahak.
//  // 		console.log($(this).val())
//  //    });
//  	console.log('sad');
// });
$('#del-stock').click(function(event) {
	/* Act on the event */
	var check = 0;
	 $('input[type=checkbox]:checked').each(function(index) {
		check++;        
    });
	 if(check == 0){
	 	alert('Please Select Row!');
	 }else{
	 	$('#confirm-type').val('expired');
		$('#modal-confirmation').modal('show');
	}//end if check == 0
});

$('.del-expired').click(function(event) {
	/* Act on the event */
	if($('#confirm-type').val() == "expired"){
			var finish = false;
		$('input[type=checkbox]:checked').each(function(index) {
			// console.log($(this).val());
			finish = true;
			var stock_id = $(this).val();
			$.ajax({
					url: 'data/del_expired.php',
					type: 'post',
					dataType: 'json',
					data: {
						stock_id:stock_id
					},
					success: function (data) {
						showAllStockList();
					},
					error: function(){
						eMsg('195');
					}
				});
	    });
		if(finish == true){
			$('#modal-confirmation').modal('hide');
			$('#modal-message').find('#msg-body').text('Removess Successfully!')
			$('#modal-message').modal('show');
		}//end finish
		
	}//end if
});

// /////////////////////////////////////////
$('#del-cart').click(function(event) {
	/* Act on the event */
	var check = 0;
	 $('input[type=checkbox]:checked').each(function(index) {
		check++;        
    });
	 if(check == 0){
	 	alert('Please Select The losted Item');
	 }else{
	 	$('#confirm-type').val('losted');
		$('#modal-confirmation').modal('show');
	}//end if check == 0
});

$('.del-expired').click(function(event) {
	/* Act on the event */
	if($('#confirm-type').val() == "losted"){
			var finish = false;
		$('input[type=checkbox]:checked').each(function(index) {
			// console.log($(this).val());
			finish = true;
			var cart_id = $(this).val();
			$.ajax({
					url: 'data/confirm_order.php',
					type: 'post',
					dataType: 'json',
					data: {
						cart_id:cart_id
					},
					success: function (data) {
					if(data.valid == true){
						$('#confirm-type').val(' ');
						$('#modal-confirmation').modal('hide');
						showOrder();
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-message').modal('show');
					}
					},
					error: function(){
						eMsg('199 for Losted Property');
					}
				});
	    });
		if(finish == true){
			$('#modal-confirmation').modal('hide');
			$('#modal-message').find('#msg-body').text('Removes Successfully!')
			$('#modal-message').modal('show');
		}//end finish
		
	}//end if
});

// /////////////////////////////////////

$('#add-stock').click(function(event) {
	/* Act on the event */
	$('#modal-stock').find('.modal-title').text('New Stock');
	$('#modal-stock').modal('show');
});

//form stock
var fuck = 0;
$(document).on('submit', '#form-stock', function(event) {
	event.preventDefault();
	/* Act on the event */
    var item_id = $('#item-id').val();
    var qty = $('#qty').val();
    var xDate = $('#xDate').val();
    var manu = $('#manu').val();
    var purc = $('#purc').val();
    fuck++;
    // alert(fuck);
    $.ajax({
    		url: 'data/add_fuck.php',
    		type: 'post',
    		// dataType: 'json',
    		data: {
    			item_id:item_id,
    			qty:qty,
    			xDate:xDate,
    			manu:manu,
    			purc:purc
    		},
    		success: function (data) {
    			console.log(data);
    			// console.log('stock');
    			// if(data.valid == true){
    				$('#modal-stock').modal('hide');
 		   			showAllStockList();
    				$('#modal-message').find('#msg-body').text(data.msg);
    				$('#modal-message').modal('show');
    			// }
    		},
    		error: function(){
    			eMsg('233');
    		}
    	});

});

//all expired
function showAllExpired(){
	$.ajax({
			url: 'data/all_expired.php',
			type: 'post',
			// data: {},
			success: function (data) {
				$('#all-expired').html(data);
			},
			error: function(){
				eMsg('260');
			}
		});
}//end showAllExpired
showAllExpired();

//all stock
function showAllStocks(){
	$.ajax({
			url: 'data/all_stock.php',
			type: 'post',
			success: function (data) {
				$('#all-stock').html(data);
			},
			error: function(){
				eMsg('275');
			}
		});
}//end showAllStocks
showAllStocks();

//stock report print
$('#stock-report').click(function(event) {
	/* Act on the event */
	// window.open('print.php?datePick=<?php echo $datePick; ?>','name','width=auto,height=auto');
	window.open('data/print.php','name','width=auto,height=auto');
});

function showOrder(){
	$.ajax({
			url: 'data/order.php',
			type: 'post',
			success: function (data) {
				$('#order').html(data);
			},
			error: function(){
				eMsg('297');
			}
		});
}//end showOrder
showOrder();

//add to cart
function toCart(stock_id, qty, item_id){
	$('#stock-id').val(stock_id);
	$('#item-id').val(item_id);
	$('#item-qty').val(qty);
	$('#modal-to-cart').modal('show');
}//end toCart

$(document).on('submit', '#form-toCart', function(event) {
	event.preventDefault();
	/* Act on the event */
	var stock_id = $('#stock-id').val();
	var item_id = $('#item-id').val();
	var qty = $('#item-qty').val();

	var cartDep = $('#department').val();//add to department
	var cartSom = $('#someone').val();//add to someone
	var cartQty = $('#cart-qty').val();//add to quantity
	
	var newStockQty = qty - cartQty;
	if(newStockQty < 0){
		alert('Items are more than Stock!');
	}else{
		// alert('Enough!');
		$.ajax({
				url: 'data/add_cart.php',
				type: 'post',
				data: {
					stock_id:stock_id,
					item_id:item_id,
					cqty:cartQty,
					cdep:cartDep,
					csom:cartSom,
					nqty:newStockQty
				},
				success: function (data) {
					console.log(data);
					showOrder();
					$('#modal-to-cart').modal('hide');
				},
				error:function(){
					eMsg('331');
				}
			});
	}//end if !qty
});

//del from cart
function delCart(stock_id, qty, cart_id){
	$.ajax({
			url: 'data/del_cart.php',
			type: 'post',
			data: {
				stock_id:stock_id,
				cart_id:cart_id,
				qty:qty
			},
			success: function (data) {
				console.log(data);
				showOrder();
			},
			error: function(){
				eMsg('354');
			}
		});
}//end delCart

//order form
$(document).on('submit', '#form-order', function(event) {
	event.preventDefault();
	/* Act on the event */
	var custName = $('#customer-name').val();
	var tender = $('#tendered').val();
	var totalOrder = $('#totalOrder').val();
	var change = tender - totalOrder;

	if(change < 0){
		alert('Tendered is insufficient!');
	}else{
		//good vibes
		$.ajax({
				url: 'data/add_transaction.php',
				type: 'post',
				// dataType: 'json',
				data: {
					custName:custName,
					tender:tender,
					totalOrder:totalOrder,
					change:change
				},
				success: function (data) {
					console.log(data);
				},
				error: function(){
					eMsg('385');
				}
			});
	}//end change < 0
	
});//form order


function confirm_cart(){
	$('#confirm-type').val('confirmCart');
	$('#modal-confirmation').modal('show');
}//end confirm_cart

$('#confirm-yes').click(function(event) {
	/* Act on the event */
	var choice = $('#confirm-type').val();
	if(choice == 'confirmCart'){
		$.ajax({
				url: 'data/confirm_order.php',
				type: 'post',
				dataType: 'json',
				data:{
					click:'yes'
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#confirm-type').val(' ');
						$('#modal-confirmation').modal('hide');
						showOrder();
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg(445);
				}
			});
	}
});


function showAllSales(){
	var date = $('#dailyDate').val();
	dailySales(date);
}//end showAllSales
showAllSales();

function dailySales(date){
	$.ajax({
			url: 'data/all_losts.php?date='+date,
			type: 'get',
			data: {
				date:date
			},
			success: function (data) {
				$('#all-sales').html(data);
			},
			error:function(){
				eMsg(474);
			}
		});	
}


$(document).on('change', '#dailyDate', function(event) {
	event.preventDefault();
	/* Act on the event */
	var date = $('#dailyDate').val();
	if(date == '' || date == null){
		$('#printBut').hide();
	}else{
		$('#printBut').show();
	}
	dailySales(date);

});

$('#printBut').click(function(event) {
	/* Act on the event */
	var date = $('#dailyDate').val();
	window.open('data/print-losts.php?date='+date,'name','width=600,height=400');	
});



