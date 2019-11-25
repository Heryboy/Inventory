<!-- sidebar menu -->
<div class="left_col scroll-view">
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">   
    <div class="menu_section">
     <div class="clearfix"></div>
     <div class="lbl-cat">
      <h3 class="lbl-focus active">Inventory Reports</h3>
    </div>
    <ul class="nav side-menu">

      <!-- <li class="active">
        <a><i class="fa fa-file"></i> Revenue Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
          <li>
            <a href="{{url('admin/report/sale_detail')}}"><i class="fa fa-file"></i> Sale Detail</a>
          </li>
          <li>
            <a href="{{url('admin/report/sale_summary')}}"><i class="fa fa-file"></i> Sale Summary</a>
          </li>
        </ul>
      </li> -->

      <li>
        <a><i class="fa fa-file"></i> Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
          <li>
            <a href="{{url('admin/report/summary_report')}}"><i class="fa fa-file"></i> Summary Reports</a>
          </li>
          <li>
            <a href="{{url('admin/report/inventory_on_hand')}}"><i class="fa fa-file"></i> Inventory On Hands</a>
          </li>
          <li>
            <a href="{{url('admin/report/item_information')}}"><i class="fa fa-file"></i> Item Information</a>
          </li>
          <li>
            <a href="{{url('admin/report/sales_item')}}"><i class="fa fa-file"></i> Whole Sales Item</a>
          </li>
          <li>
            <a href="{{url('admin/report/sales_pos_item')}}"><i class="fa fa-file"></i> POS Sales Item</a>
          </li>
          <li>
            <a href="{{url('admin/report/sales_pos_receipt')}}"><i class="fa fa-file"></i> POS Receipts</a>
          </li>
          <li>
            <a href="{{url('admin/report/sales_pos_by_drawer')}}"><i class="fa fa-file"></i> POS Sale By Drawer</a>
          </li>
          <li>
            <a href="{{url('admin/report/drawer_transaction')}}"><i class="fa fa-file"></i> Drawer Transaction</a>
          </li>
          <li>
            <a href="{{url('admin/report/purchase_order_by_supplier')}}"><i class="fa fa-file"></i> Purchase Order By Suppliers</a>
          </li>
          <li>
            <a href="{{url('admin/report/transfer_item')}}"><i class="fa fa-file"></i> Transfer Item</a>
          </li>
          <li>
            <a href="{{url('admin/report/return_item')}}"><i class="fa fa-file"></i> Return Item</a>
          </li>
        </ul>
      </li>

      <!-- <li>
        <a><i class="fa fa-file"></i> Purchased Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
          <li>
            <a href="{{url('admin/report/purchased_order')}}"><i class="fa fa-file"></i> Purchased Order</a>
          </li>
        </ul>
      </li>


      <li>
        <a><i class="fa fa-file"></i> Return Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
          <li>
            <a href="{{url('admin/report/transfer_in')}}"><i class="fa fa-file"></i> Return Products</a>
          </li>
        </ul>
      </li>

      <li>
        <a><i class="fa fa-file"></i> Transfer Reports <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: block;">
          <li>
            <a href="{{url('admin/report/purchased_order')}}"><i class="fa fa-file"></i> Transfer In</a>
          </li>
        </ul>
      </li> -->

   </ul>
    
   </div>
  </div>
  <!-- /sidebar menu -->

  <div id="contextMenuOption"></div>

  <script type="text/javascript">
    $(document).on("contextmenu", "#contextMenuOption", function(e){
      alert("testing");
      // var fsm_id = $(this).data("value");
      // var fsm_id_val = $("#fsm_id").val(fsm_id);
      // // show option settings
      // // $('#show_option_settings').show();
      // $('#arrow-up-right-click'+fsm_id+'').show(); 
      // $('#flight_pax_main_UTC_right_click'+fsm_id+'').show();

      // $('#flight_pax_main_UTC'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);
      // $('#arrow-up'+fsm_id+'').hide();//toggle("slide", { direction: "top" }, 100);
      return false;
    });
  </script>

  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
   <a href="{{url('admin/config/configuration')}}" data-toggle="tooltip" data-placement="top" title="Settings">
     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="User">
     <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
   </a>
   <a href="#" data-toggle="tooltip" data-placement="top" title="Notification">
     <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
   </a>
   <a href="{{url('auth/logout')}}" data-toggle="tooltip" data-placement="top" title="Logout">
     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
   </a>
  </div>
  <!-- /menu footer buttons -->
</div><!-- /sidebar menu -->


  
