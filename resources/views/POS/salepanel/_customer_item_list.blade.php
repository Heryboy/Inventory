<div class="row">
	<div class="item_list">
		<div id="_content">
			<div class="filters demo1">
				<div class="filter">
					<span class="col-sm-12">
						<div class="cat-list">
							@foreach($ItemCategory as $row)
								<a onclick="initFilterByCategory({{$row->id}});" href="javascript:void(0);" class="initChange @if($cid==$row->id) active @endif" data-id="{{$row->id}}" rel="{{$row->id}}">{{$row->item_category_name}}</a>
							@endforeach
						</div>
					</span>
				</div>

				<div class="sub-category col-sm-2">
					<ul class="subcat-list">
						@foreach($ItemSubCategory as $row)
							<li><a class="subactive @if($scat==$row->id) active @endif" onclick="initFilterBySubCategory({{$row->id}});" href="javascript:void(0);">{{$row->name}}</a></li>
						@endforeach
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="container-filter col-sm-10">
					<div class="order_item_list">
						@foreach($Items as $row)
							<div class="col-sm-3">
								<a @if($order_id=='') data-toggle="modal" data-target=".new-order-modal" @else onclick="initAddCart('{{$row->name}}','{{$row->id}}','{{$row->retail}}','{{$row->default_unit}}');" class="initAddCart" @endif data-name="{{$row->name}}" data-price="{{$row->retail}}" data-defaultunit="{{$row->default_unit}}" data-id="{{$row->id}}" href="javascript:void(0);">
									<center>
										<div class="_row">
											<img style="height:185px" class="img-responsive" src="{{url('images/uploads/products')}}/{{$row->image}}"/>
											<div style="padding:10px 0;">
												<span class="pull-left">{{$row->name}}</span>
												<span class="pull-right">{{Helpers::FormatCurrentcy($row->retail)}}</span>
												<div class="clearfix"></div>
											</div>
										</div>
									</center>
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
</div>

<style type="text/css">
	.filters .sub-category li a.active {
	    background-color: #7c4318;
	    color: #fff;
	    padding: 10px;
	}
</style>