  <!-- nav -->
  <div class="nav">
    <!-- Header -->
    <nav>
     <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header" style="width:150px;padding:10px;">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <center><a href="{{url('/')}}"><img src="{{url('images/logo.png')}}" width="80px"></a></center>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-color:#2196f3;z-index:9999;"> -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php 
          $language_id = Session::get('applangId');
          if(!$language_id) $language_id = CONFIG_LANGUAGE;
          $top_menu = Helpers::getMenus($language_id,3);
        ?>
        <ul class="nav navbar-nav" style="color:#fff;">
          @foreach($top_menu as $menu)
            <li><a href="{{url('')}}/{{$menu['p_menu_link']}}?menuCode={{$menu['menu_code']}}"><i class="fa {{$menu['fa_icon']}}"></i> {{$menu['parent_menu_name']}}</a></li>
          @endforeach
        </ul>
      
        <ul class="nav navbar-nav navbar-right">
          

          <li role="presentation" class="dropdown">
            <a style="padding:9px 18px;" href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i style="font-size:20px;" class="fa fa-bell"></i>
              <span class="badge bg-red"><?php echo Helpers::getNumNotification();?></span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
              <?php echo Helpers::getLayoutNotification();?>
              <!-- notification_data -->
            </ul>
          </li>

          <li class="">
           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <img src="{{url('/images/uploads/user')}}/{{Auth::user()->photo}}" alt="">{{Auth::user()->username}}
             <span class=" fa fa-angle-down"></span>
           </a>
           <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
             <li><a href="{{url('admin/users')}}/{{Auth::user()->id}}"> {!! trans('common.profile') !!}</a>
             </li>
             <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i> {!! trans('common.logout') !!}</a>
             </li>
           </ul>
          </li>

          <li class="">
           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <i class="fa fa-wa fa-flag"></i> Languages
             <span class=" fa fa-angle-down"></span>
           </a>
           <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <?php $getLanguages = Helpers::getLanguage();?>
            @foreach($getLanguages as $getLang)
              <li><a href="{{url('lang')}}/{{$getLang->id}}"><img src="{{url('images/uploads/flag')}}/{{$getLang->image}}" width="15px"> {{$getLang->name}}</a>
              </li>
            @endforeach
           </ul>
          </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </div>

  <!-- #header -->
  <style type="text/css">
    .grid-flight-log{border-right:1px solid #f4f4f4;float:left;padding:4px;}
    ul.grid-flight-log{padding:0px;margin:0px;list-style: none;width:100%;}
    ul.grid-flight-log li{float: left;}
    ul.grid-flight-log li{display: block;padding:10px;border-right:1px dotted #eee;height: 70px;color:#f4f4f4;font-size:15px;}
    .scrollable-menu {
      height: auto;
      max-height: 50px;
      overflow-x: hidden;
    }
  </style>
  
  <!-- schedule -->
  @if(!empty($_GET['id']) && $_GET['id']==1)
    @include('admin.schedule_monitor.common.flight_real_time')
  @endif

<script>
  // setInterval(function(){
  //   $('ul#menu1').load('{{url("admin/notification")}}'+getMenucode()+'');
  // },4000)
</script>