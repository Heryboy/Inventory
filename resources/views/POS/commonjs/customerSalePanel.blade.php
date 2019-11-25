<script type="text/javascript">
	$(window).load(function(){
		$("input[name='barcode_txt']").focus();
		$.clear();
	});

	// clear discount
	$(".btnClear").click(function(){
		$.clear();
	});

	$("#keyupfunction").keypress(function(e){
		var order_id = $("input[name='order_id']").val();
		var currency_sign = $("input[name='currency_sign']").val();
		if(order_id!=0){
			if(e.which==13){
				var barcode = $('input[name="barcode_txt"]').val();
				if(barcode.length>1){
					setTimeout(function(){
						var dataString = {"_token": "{{ csrf_token() }}","order_id":order_id,"barcode":barcode};
						$.ajax({  
							type: "POST",  
							url: "{{url("pos/salepanel/POSCusBarcodeScanner")}}",  
							data: dataString,
							dataType: 'json',
							beforeSend: function() 
							{
								// toastr.info("Loading ...");
							},  
							success: function(response)
							{
								if(response.success==1){
									toastr.success("Found Barcode No ="+barcode+"");
									$('input[name="barcode_txt"]').val("");

									if(response.success==1){
										$.getDisplayHTMLVal(response);
										toastr.success("Item added to list.");
										var html_content='';
										html_content +='<tr id="attribute-item'+response.id+'">';
											html_content +='<td class="item_name">'+response.item_name+'</td>';
											html_content +='<td class="item_price">'+formatCurrency(response.item_price,'$')+'</td>';
											html_content += '<td class="item_qty"><span>x <span class="item-qty">1</span> </span><button value="+" class="btn btn-xs btn-primary" type="button" onclick="initIncreasePrice('+response.id+');" name="increase"><i class="fa fa-wa fa-plus"></i></button><button value="-" class="btn btn-xs btn-primary" type="button" onclick="initDecreasePrice('+response.id+');" name="decrease"><i class="fa fa-wa fa-minus"></i></button></td>';
											html_content +='<td class="item_sub_total"><span class="sub_total_item">'+formatCurrency(response.item_price,currency_sign)+'</span> <span class="pull-right"><a class="btn btn-xs btn-danger" onclick="initRemoveItem('+response.id+');" href="javascript:void(0);"><i class="fa fa-wa fa-minus"></i></a></span></td>';
										html_content +='</tr>';
										$("#pos-item-data").append(html_content);
									}
								}else{
									toastr.warning("Not found Barcode No ="+barcode+"");
								}										}
						}).fail(function(error_response) 
						{
							toastr.warning("Problem occur while you are trying to request this product!");
							// setTimeout("vpb_remove_added_video();", 1000);
						});
						return false;
						// $('input[name="barcode_txt"]').val("");		
					},100);
						
				}
			}
		}else{
			if(e.which==13){
				toastr.warning("Please, add new order!");
				$(".new-order-modal").modal('show');
			}
		}
	});

	
	$.clear = function(){
		$("#amountNum").val('');
		$("#amount_price_total").val('');
		$("#amount_percentage_discount").val('');
		$("#amount_change_tmp").val('');
		$("#debitPay").val('');
		$("span#amount_dolar").html('$ 0.00');
		$("span#amount_reil").html('R 0.00');
		$("span#amount_change_d").html('$ 0.00');
		$("span#amount_change_r").html('R 0.00');
		$("#ExchangeAmount").val('');
		$("span#exchange_dolar").html('');
		$("span#exchange_reil").html('');
	}
	// initPrintPreview
	$("#initPrintPreview,#initPrintPreview2").click(function(){
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_id":order_id};
		var sub_total=0;
		var discount=0;
		var total=0;
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/getAllItems")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Loading ...");
			},  
			success: function(response)
			{
				sub_total=formatCurrency(''+response['sub_total']+'',''+response['currency_sign']+'');
				discount=response['discount'];
				total=formatCurrency(''+response['total']+'',''+response['currency_sign']+'');
				
				$("span#checkInDate").html(response['check_in_date']);
				$("span#checkOutDate").html(response['check_out_date']);
				$("span#p_amount_sub_total").html(sub_total);
				$("span#p_discount_total").html(discount);
				$("span#p_amount_total").html(total);
				$("span#customer_name").html(response['customer']);

				var html='';
				if(response['data'].length>0){
					$.each(response.data, function(label, data){
						var class_html='';
						if(data['is_cancel']==1){
							class_html='line-cross';
						}else{
							class_html='';
						}
						html +='<tr class="'+class_html+'">';
							html +='<td>'+data['name']+'</td>';
							html +='<td>'+data['unit_price']+'</td>';
							html +='<td>'+data['qty']+'</td>';
							html +='<td>'+data['price']+'</td>';
						html +='</tr>';
					});
				}else{
					html='';
				}
				$("tbody#table-item-row").html(html);
				$('.modal-printview-invoice').modal('show');
				// $.getDisplayHTMLVal(response);
				// $('#attribute-item'+order_detail_id+' span.item-qty').html(response.qty);
				// $('#attribute-item'+order_detail_id+' span.sub_total_item').html(formatCurrency(response.price,'$'));
				// toastr.success("Item has been decreased.");
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to decrease item!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	});
	// initRemoveItem
	function initRemoveItem(order_detail_id){
		$('#attribute-item'+order_detail_id+'').addClass("cancell-item");
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_detail_id":order_detail_id,"order_id":order_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/cancelItem")}}",  
			data: dataString,
			dataType: 'json',
			// beforeSend: function() 
			// {
			// 	toastr.info("Loading ...");
			// },  
			success: function(response)
			{
				$("span#amount_sub_total").html(formatCurrency(response.sub_total,response.currency_sign));
				$("span#amount_total").html(formatCurrency(response.total,response.currency_sign));
				$("span#discount_total").html(response.discount);
				$('.modal-discount').modal('hide');
				toastr.success("Item has been cancelled.");
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to cancel item!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	}
	// Refresh
	$("#initRefresh").click(function(){
		toastr.info("Refreshing...");
		window.location.reload(true);
	});
	// initVoidOrder
	$("#initVoidOrder").click(function(){
		var order_id = $("input[name='order_id']").val();
		var flag_check = 1;
		var dataString = {"_token": "{{ csrf_token() }}","order_id":order_id,"flag_check":flag_check};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/VoidOrder")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Loading ...");
			},  
			success: function(response)
			{
				window.location.href="{{url('pos/salepanel/customer_salepanel')}}";
				toastr.success("Order# "+order_id+" has been voided.");
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to void order!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	});
	// initGenerateOrder
	$("#initGenerateOrder").click(function(){
		// customer default = 1 general customer
		// if flag check =1 means customer order by themselve not cashier order
		var flag_check = 1;
		var customer_id = 1;
		var dataString = {"_token": "{{ csrf_token() }}","customer_id":customer_id,"flag_check":flag_check};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/GenerateOrder")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info	("Loading ...");
			},  
			success: function(response)
			{
				window.location.href="{{url('pos/salepanel/customer_salepanel')}}?order_id="+response;
				toastr.success("New order has been generated.");
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to place new order!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	});
	// initCancelAllItem
	$("#initCancelAllItem").click(function(){
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_id":order_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/cancelAllItem")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Processing ...");
			},  
			success: function(response)
			{
				toastr.success("All items have been cancelled.");
				window.location.reload(true);
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to process payment!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	});
	// Increase Price
	function initIncreasePrice(order_detail_id){
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_detail_id":order_detail_id,"order_id":order_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/IcreaseItemPrice")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Loading ...");
			},  
			success: function(response)
			{
				$.getDisplayHTMLVal(response);
				$('#attribute-item'+order_detail_id+' span.item-qty').html(response.qty);
				$('#attribute-item'+order_detail_id+' span.sub_total_item').html(formatCurrency(response.price,'$'));
				// toastr.success("Item has been increased.");
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to add more item!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	}
	// Decrease Price
	function initDecreasePrice(order_detail_id){
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","order_detail_id":order_detail_id,"order_id":order_id};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/DecreaseItemPrice")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Loading ...");
			},  
			success: function(response)
			{
				$.getDisplayHTMLVal(response);
				$('#attribute-item'+order_detail_id+' span.item-qty').html(response.qty);
				$('#attribute-item'+order_detail_id+' span.sub_total_item').html(formatCurrency(response.price,'$'));
				// toastr.success("Item has been decreased.");
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to decrease item!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	}
	// order product
	function initAddCart(name,id,retail,default_unit){
		var order_id = $("input[name='order_id']").val();
		var currency_sign = $("input[name='currency_sign']").val();
		var attributeItem = "{{$attributeItem}}";
		if(order_id!=0){
			// var item_id = $(this).data('id');
			// var item_name = $(this).data('name');
			// var item_price = $(this).data('price');
			var item_id = id;
			var item_name = name;
			var item_price = retail;

			var customer_id = $("select[name='customer_id']").val();
			var dataString = {"_token": "{{ csrf_token() }}",'item_id':item_id,'customer_id':customer_id,'order_id':order_id,'item_price':item_price,'default_unit':default_unit};
			$.ajax({  
				type: "POST",  
				url: "{{url("/pos/salepanel/POSCusOrder")}}",  
				data: dataString,
				cache:true,
      			dataType:"json",
				// beforeSend: function() 
				// {
				// 	$("#previewed_video").html($("#v_loading_btn").val());
				// 	//return false;
				// },  
				success: function(response)
				{
					// alert(response['id']);
					// initRemoveItem('',response.id);
					// $('#attribute-item'+attributeID+'').addClass("cancell-item");
					if(response.success==1){
						$.getDisplayHTMLVal(response);
						toastr.success("Item added to list.");
						var html_content='';
						html_content +='<tr id="attribute-item'+response.id+'">';
							html_content +='<td class="item_name">'+item_name+'</td>';
							html_content +='<td class="item_price">'+formatCurrency(item_price,'$')+'</td>';
							html_content += '<td class="item_qty"><span>x <span class="item-qty">1</span> </span><button value="+" class="btn btn-xs btn-primary" type="button" onclick="initIncreasePrice('+response.id+');" name="increase"><i class="fa fa-wa fa-plus"></i></button><button value="-" class="btn btn-xs btn-primary" type="button" onclick="initDecreasePrice('+response.id+');" name="decrease"><i class="fa fa-wa fa-minus"></i></button></td>';
							html_content +='<td class="item_sub_total"><span class="sub_total_item">'+formatCurrency(item_price,currency_sign)+'</span> <span class="pull-right"><a class="btn btn-xs btn-danger" onclick="initRemoveItem('+response.id+');" href="javascript:void(0);"><i class="fa fa-wa fa-minus"></i></a></span></td>';
						html_content +='</tr>';
						$("#pos-item-data").append(html_content);
					}
				}
			}).fail(function(error_response) 
			{
				toastr.warning("System has problem please, contact administrator!");
				// setTimeout("vpb_remove_added_video();", 1000);
			});
		}else{
			toastr.warning("Please, add new order!");
		}
	}
	// 
	$.getDisplayHTMLVal = function(response){
		$("span#amount_sub_total").html(formatCurrency(response.sub_total,response.currency_sign));
		$("span#amount_total").html(formatCurrency(response.total,response.currency_sign));
		$("span#discount_total").html(response.discount);
		$("#amount_total_hidden").val(response.total);
	}
	// 
	$.libary = function(){
		$('.filters.demo1').filters();

		$('.filters.demo2').filters({
			css3: {
				init: false
			},
			move: {
				easing: 'easeOutBack',
				duration: 400
			},
			fade: {
				duration: [400, 400]
			}
		});
		
		$('.filters.demo3').filters({
			move: {
				init: false
			},
			css3: {
				init: false
			},
			fade: {
				opacity: [.1, 1]
			}
		});
		
		$('.filters.demo4').filters({
			css3: {
				transform: {
					scale: '0',
					rotate: '-90deg',
					skew: '45deg'
				}
			}
		});
	}
	
	$(".initChange").click(function(){
		var id = $(this).data('id');
		var html='<a href="#" data-id="data" rel="data">hello he</a>';
		$(".hellohei").html(html);
		$.libary();
	});

	
	function initFilterByCategory(catID){
		var dataString = {"_token": "{{ csrf_token() }}","catID":catID};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/getSubCat")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Loading ...");
			},  
			success: function(response)
			{
				console.log(response);
				var html='';
				if(response['data'].length>0){
					$.each(response.data, function(label, data){
						html+='<li>';
							html+='<a class="subactive" onclick="initFilterBySubCategory('+data['id']+');" href="javascript:void(0);">';
							html+=data['name'];
							html+='</a>';
							html+='</li>';
						html+='</li>';
					});
				}

				$(".subcat-list").html(html);
				$.eventSubactive();
				// window.location.reload(true);
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to request data from server!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	}

	$('.subactive').click(function(){
		$(".subactive").removeClass('active');
		$(this).toggleClass('active');
	});

	$.eventSubactive = function(){
		$('.subactive').click(function(){
			$(".subactive").removeClass('active');
			$(this).toggleClass('active');
		});
	}

	function initFilterBySubCategory(SubCatID){
		var order_id = $("input[name='order_id']").val();
		var dataString = {"_token": "{{ csrf_token() }}","SubCatID":SubCatID};
		$.ajax({  
			type: "POST",  
			url: "{{url("/pos/salepanel/getItemBySub")}}",  
			data: dataString,
			dataType: 'json',
			beforeSend: function() 
			{
				toastr.info("Loading ...");
			},  
			success: function(response)
			{
				var html='';
				if(response['data'].length>0){
					$.each(response.data, function(label, data){
						html+='<div class="col-sm-3">';
							if(order_id==0){
								html+='<a data-toggle="modal" data-target=".new-order-modal" data-name="'+data['name']+'" data-defaultunit="'+data['default_unit']+'" data-price="'+data['retail']+'" data-id="'+data['id']+'" href="javascript:void(0);">';
							}else{
								html+='<a class="initAddCart" onclick="initAddCart(\''+data['name']+'\','+data['id']+','+data['retail']+','+data['default_unit']+');" data-name="'+data['name']+'" data-price="'+data['retail']+'" data-id="'+data['id']+'" href="javascript:void(0);">';
							}
							
								html+='<center>';
									html+='<div class="_row">';
										html+='<img class="img-responsive" src="{{url("images/uploads/products")}}/'+data['image']+'"/>';
										html+='<div style="padding:10px 0;">';
											html+='<span class="pull-left">'+data['name']+'</span>';
											html+='<span class="pull-right">'+formatCurrency(data["retail"],'$')+'</span>';
											html+='<div class="clearfix"></div>';
										html+='</div>';
									html+='</div>';
								html+='</center>';
							html+='</a>';
						html+='</div>';
					});
				}else{
					html='';
				}
				$("div.order_item_list").html(html);
				// window.location.reload(true);
			}
		}).fail(function(error_response) 
		{
			toastr.warning("Problem occur while you are trying to request data from server!");
			// setTimeout("vpb_remove_added_video();", 1000);
		});
	}
</script>