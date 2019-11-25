@extends('pos.shared.layout') 
@section('content')	

	{{-- <div class="row"> --}}
	<div class="col-sm-7">
		<div class="row">
			<div class="item_list">
				<div id="content">
					<div class="filters demo1">
						<div class="filter">

							<span class="col-sm-12">
								<a href="#" class="initChange" data-id="city" rel="city">City</a>
								<a href="#" class="initChange" data-id="cars" rel="cars">Cars</a>
								<a href="#" class="initChange" data-id="other" rel="other">Other</a>
								<!-- <a href="#" class="initChange" data-id="all" rel="all">All</a> -->
								<a href="#" class="initChange" data-id="hello" rel="hello">Helo</a>
								<!-- <a href="#" class="initChange" data-id="data" rel="data">data</a> -->
							</span>
						</div>

						<div class="sub-category col-sm-2">
							<ul class="subcat-list">
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
								<li><a href="">Toilet</a></li>
							</ul>
							<div class="clearfix"></div>
						</div>

						<div class="container-filter col-sm-10">
							<ul>
								<li class="data">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="data">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="hello">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="helo">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="cars">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="city">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="cars">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="cars">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="city">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="cars">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="other">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
								<li class="city">
									<a href="#"><img src="{{url('images/img/p1.jpg')}}" width="100%" alt="" /></a>
								</li>
							</ul>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>

	{{-- cart-status --}}
	<section class="cart-status">
		<div class="row">
			<div class="pull-left">
				<a class="btn btn-app">
		          <span class="badge bg-red">211</span>
		          <i class="fa fa-shopping-cart"></i> Carts
		        </a>

		        <a class="btn btn-app">
		          <span class="badge bg-blue">211</span>
		          <i class="fa fa-calculator"></i> Order#
		        </a>
		     </div>

		     <div class="pull-right">
		     	<h2 class="total_sale">Total Sale: $ 192.22</h2>
		     </div>
	        <div class="clearfix"></div>
		</div>
		
	</section>

	<div class="col-sm-2">
		<section class="pos_function">
			<center>
		        <a class="btn btn-app">
		          <i class="fa fa-edit"></i> Edit
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-play"></i> Play
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-pause"></i> Pause
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-save"></i> Save
		        </a>
		        <a class="btn btn-app">
		          
		          <i class="fa fa-bullhorn"></i> Notifications
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-repeat"></i> Repeat
		        </a>
		        <a class="btn btn-app">
		          <span class="badge bg-green">211</span>
		          <i class="fa fa-users"></i> Users
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-inbox"></i> Orders
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-envelope"></i> Inbox
		        </a>
		        <a class="btn btn-app">
		          <span class="badge bg-blue">102</span>
		          <i class="fa fa-heart-o"></i> Likes
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-edit"></i> Edit
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-play"></i> Play
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-pause"></i> Pause
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-save"></i> Save
		        </a>
		        <a class="btn btn-app">
		          
		          <i class="fa fa-bullhorn"></i> Notifications
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-repeat"></i> Repeat
		        </a>
		        <a class="btn btn-app">
		          <span class="badge bg-green">211</span>
		          <i class="fa fa-users"></i> Users
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-inbox"></i> Orders
		        </a>
		        <a class="btn btn-app">
		          <i class="fa fa-envelope"></i> Inbox
		        </a>
		        <a class="btn btn-app">
		          <span class="badge bg-blue">102</span>
		          <i class="fa fa-heart-o"></i> Likes
		        </a>
		    </center>
		</section>
	</div>

	<div class="col-sm-3">
		<div class="row">
			{{-- sidebard --}}
			<div class="pos_sidebar">
				<input type="text" class="form-control" style="height: 50px;" placeholder="Search barcode,name,brand" />
				<div class="pos_innner">
					<section class="pos_item_list">
						<table>
							<tr class="row-th">
								<div class="item_inner">
									<th class="item_name">Name</th>
									<th class="item_qty">Qty</th>
									<th class="item_price">Sub Total</th>
								</div>
							</tr>
							<tbody>
								
								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet PlateToilet PlateToilet PlateToilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>

								<tr>
									<td class="item_name">Toilet Plate</td>
									<td class="item_qty">
										x 15 &nbsp;&nbsp;&nbsp;
										<input value="+" class="btn-cal" type="button" name="increase"/>
										<input value="-" class="btn-cal" type="button" name="decrease"/>
									</td>
									<td class="item_price">$ 12.00</td>
								</tr>
							</tbody>
						</table>
					</section>
					<section class="total">
						<span class="lbl_total" class="pull-left">Total </span> <span class="pull-right lbl_total_price">12,00.00 $</span>
						<div class="clearfix"></div>
					</section>
				</div>
				<section class="number_cal">
					<a class="btn-pay btn-group btn-num" href="">
						Pay
					</a>
					<a class="btn-clear btn-group btn-num" href="">
						Clear
					</a>
					<a class="btn-discount btn-group btn-num" href="">
						Discount
					</a>

					<a class="btn-group btn-num" href="">
						7
					</a>
					<a class="btn-group btn-num" href="">
						8
					</a>
					<a class="btn-group btn-num" href="">
						9
					</a>
					<a class="btn-group btn-num" href="">
						4
					</a>
					<a class="btn-group btn-num" href="">
						5
					</a>
					<a class="btn-group btn-num" href="">
						6
					</a>
					<a class="btn-group btn-num" href="">
						1
					</a>
					<a class="btn-group btn-num" href="">
						2
					</a>
					<a class="btn-group btn-num" href="">
						3
					</a>
					<a class="btn-group btn-num" href="">
						0
					</a>
					<a class="btn-group btn-num" href="">
						00
					</a>
					<a class="btn-group btn-num" href="">
						.
					</a>
				</section>
			</div>
		</div>
	</div>
	{{-- </div> --}}

	<script type="text/javascript">
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
	</script>
@endsection