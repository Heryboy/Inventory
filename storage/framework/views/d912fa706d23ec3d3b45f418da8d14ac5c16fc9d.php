  <!-- ########### responsive-menu -->
  <header>
    <nav id='cssmenu'>
    <!-- <div class="logo"><a href="index.html">Responsive </a></div>
    <div id="head-mobile"></div>
    <div class="button"></div> -->
    <?php 
      $language_id = Session::get('applangId');
      if(!$language_id) $language_id = CONFIG_LANGUAGE;
      $top_menu = Helpers::getMenus($language_id,3);
    ?>
    <ul class="nav navbar-nav">
      <?php
        $language_id = Session::get('applangId');
        if(!$language_id) $language_id = CONFIG_LANGUAGE;
        $admin_menu = Helpers::getMenus($language_id,1);
      ?>
       <?php foreach($admin_menu as $parent_menu): ?>
        <?php if(!empty($parent_menu['children_menu'])): ?>
          <li class="">
           <a href="javascript:;" class="-user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <i class="fa <?php echo e($parent_menu['fa_icon']); ?>"></i> <?php echo e($parent_menu['parent_menu_name']); ?>

             <?php /* <span class=" fa fa-angle-down"></span> */ ?>
           </a>
           <ul class="-dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <?php foreach($parent_menu['children_menu'] as $child_menu): ?>
              <li><a href="<?php echo e(url('/')); ?>/<?php echo e($child_menu['c_menu_link']); ?>"> <?php echo $child_menu['child_menu_name']; ?></a>
              </li>
            <?php endforeach; ?>
           </ul>
          </li>
        <?php else: ?>
          <li class=""><a href="<?php echo e(url('/')); ?>/<?php echo e($parent_menu['p_menu_link']); ?>"><i class="fa <?php echo $parent_menu['fa_icon'];?>"></i> <?php echo $parent_menu['parent_menu_name'];?></a></li>
        <?php endif; ?>
       <?php endforeach; ?>

       <li class="">
        <a href="javascript:;" class="-user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa <?php echo e($parent_menu['fa_icon']); ?>"></i> All
        <?php /* <span class=" fa fa-angle-down"></span> */ ?>
        </a>
        <ul class="-dropdown-menu animated fadeInDown pull-right" id="subul">
          <?php foreach($top_menu as $parent_menu): ?>
            <?php if(!empty($parent_menu['children_menu'])): ?>
              <li class="sub_group_li">
               <a href="javascript:;" class="-user-profile -dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <i class="fa <?php echo e($parent_menu['fa_icon']); ?>"></i> <?php echo e($parent_menu['parent_menu_name']); ?>

                 <?php /* <span class="pull-right"><i class="fa fa-angle-right"></i></span> */ ?>
               </a>
                 <ul class="sub_ulover">
                  <?php foreach($parent_menu['children_menu'] as $child_menu): ?>
                    <li class="sublist_hover"><a href="<?php echo e(url('/')); ?>/<?php echo e($child_menu['c_menu_link']); ?>"> <?php echo $child_menu['child_menu_name']; ?></a>
                    </li>
                  <?php endforeach; ?>
                 </ul>
              </li>
            <?php else: ?>
              <li><a href="<?php echo e(url('/')); ?>/<?php echo e($parent_menu['p_menu_link']); ?>"><i class="fa <?php echo $parent_menu['fa_icon'];?>"></i> <?php echo $parent_menu['parent_menu_name'];?></a></li>
            <?php endif; ?>
           <?php endforeach; ?>
        </ul>
      </li>
        
     <!--  <li class="pull-left">
       <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         <img width="20px" src="<?php echo e(url('/images/uploads/user')); ?>/<?php echo e(Auth::user()->photo); ?>" alt=""><?php echo e(Auth::user()->username); ?>

         <span class=" fa fa-angle-down"></span>
       </a>
       <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
         <li><a href="<?php echo e(url('admin/users')); ?>/<?php echo e(Auth::user()->id); ?>"> <?php echo trans('common.profile'); ?></a>
         </li>
         <li><a href="<?php echo e(url('auth/logout')); ?>"><i class="fa fa-sign-out pull-right"></i> <?php echo trans('common.logout'); ?></a>
         </li>
       </ul>
      </li> -->
    <!-- </span> -->

      <!-- <li class='active'><a href='#'>HOME</a></li>
      <li><a href='#'>ABOUT</a></li>
      <li><a href='#'>PRODUCTS</a>
         <ul>
            <li><a href='#'>Product 1</a>
               <ul>
                  <li><a href='#'>Sub Product</a></li>
                  <li><a href='#'>Sub Product</a></li>
               </ul>
            </li>
            <li><a href='#'>Product 2</a>
               <ul>
                  <li><a href='#'>Sub Product</a></li>
                  <li><a href='#'>Sub Product</a></li>
               </ul>
            </li>
         </ul>
      </li>
      <li><a href='#'>BIO</a></li>
      <li><a href='#'>VIDEO</a></li>
      <li><a href='#'>GALLERY</a></li>
      <li><a href='#'>CONTACT</a></li> -->
    </ul>


    <ul class="nav navbar-nav navbar-right">
      
      <!--<li role="presentation" class="dropdown">
        <a href="javascript:;" class="-dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-bell"></i>
          <span class="badge bg-red"><?php //echo Helpers::getNumNotification();?></span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
          <?php //echo Helpers::getLayoutNotification();?>
        </ul>
      </li>-->

      <li>
        <a target="_blank" href="http://localhost:4200"><i></i> <span class="glyphicon glyphicon-basket" aria-hidden="true"></span> POS Screen</a>
      </li>

      <li class="">
       <a href="javascript:;" class="-user-profile -dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
         <i class="fa fa-wa fa-flag"></i> Languages
         <?php /* <span class=" fa fa-angle-down"></span> */ ?>
       </a>
       <ul class="dropdown-menu dropdown-usermenu animated fadeInDown">
        <?php $getLanguages = Helpers::getLanguage();?>
        <?php foreach($getLanguages as $getLang): ?>
          <li><a href="<?php echo e(url('lang')); ?>/<?php echo e($getLang->id); ?>"><img src="<?php echo e(url('images/uploads/flag')); ?>/<?php echo e($getLang->image); ?>" width="15px"> <?php echo e($getLang->name); ?></a>
          </li>
        <?php endforeach; ?>
       </ul>
      </li>
      
      <li>
        <a href="<?php echo e(url('auth/logout')); ?>"><i></i> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
      </li>
    </ul>
      
    </nav>

  </header>

  <!-- <section style='padding-top:20px;font:bold  44px arial;color:#68D800;'>
   Responsive CSS3 Menu <br />Dropdown + Submenus <br />
    Width Toggle Animation
  </section> -->

  <script type="text/javascript">
    (function($) {
      $.fn.menumaker = function(options) {  
       var cssmenu = $(this), settings = $.extend({
         format: "dropdown",
         sticky: false
       }, options);
       return this.each(function() {
         $(this).find(".button").on('click', function(){
           $(this).toggleClass('menu-opened');
           var mainmenu = $(this).next('ul');
           if (mainmenu.hasClass('open')) { 
             mainmenu.slideToggle().removeClass('open');
           }
           else {
             mainmenu.slideToggle().addClass('open');
             if (settings.format === "dropdown") {
               mainmenu.find('ul').show();
             }
           }
         });
         cssmenu.find('li ul').parent().addClass('has-sub');
      multiTg = function() {
           cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
           cssmenu.find('.submenu-button').on('click', function() {
             $(this).toggleClass('submenu-opened');
             if ($(this).siblings('ul').hasClass('open')) {
               $(this).siblings('ul').removeClass('open').slideToggle();
             }
             else {
               $(this).siblings('ul').addClass('open').slideToggle();
             }
           });
         };
         if (settings.format === 'multitoggle') multiTg();
         else cssmenu.addClass('dropdown');
         if (settings.sticky === true) cssmenu.css('position', 'fixed');
      resizeFix = function() {
        var mediasize = 700;
           if ($( window ).width() > mediasize) {
             cssmenu.find('ul').show();
           }
           if ($(window).width() <= mediasize) {
             cssmenu.find('ul').hide().removeClass('open');
           }
         };
         resizeFix();
         return $(window).on('resize', resizeFix);
       });
        };
      })(jQuery);

      (function($){
      $(document).ready(function(){
      $("#cssmenu").menumaker({
         format: "multitoggle"
      });
      });
      })(jQuery);
  </script>

  <style type="text/css">
    *{margin:0;padding:0;text-decoration:none}
    /*body{background:#1479B8;}*/
    header{position:relative;background:#1479B8;z-index: 99;}
    .logo{position:relative;z-index:123;padding:10px;font:18px verdana;color:#6DDB07;float:left;width:15%}
    .logo a{color:#6DDB07;}
    nav{position:relative;margin:0 auto;}
    #cssmenu,#cssmenu ul,#cssmenu ul li,#cssmenu ul li a,#cssmenu #head-mobile{border:0;list-style:none;line-height:1;display:block;position:relative;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
    #cssmenu:after,#cssmenu > ul:after{content:"\e114";display:block;clear:both;visibility:hidden;line-height:0;height:0}
    #cssmenu #head-mobile{display:none}
    #cssmenu{background:#1479B8}
    #cssmenu > ul > li{float:left}
    #cssmenu > ul > li > a{padding:17px 12px;font-size:12px;letter-spacing:1px;text-decoration:none;color:#ffffff;font-weight:700;}
    #cssmenu > ul > li:hover > a,#cssmenu ul li.active a{color:#fff}
    #cssmenu > ul > li:hover,#cssmenu ul li.active:hover,#cssmenu ul li.active,#cssmenu ul li.has-sub.active:hover{background:#2b98dc !important;-webkit-transition:background .3s ease;-ms-transition:background .3s ease;transition:background .3s ease;}
    #cssmenu > ul > li.has-sub > a{padding-right:30px}
    #cssmenu > ul > li.has-sub > a:after{position:absolute;top:22px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
    #cssmenu > ul > li.has-sub > a:before{position:absolute;top:19px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
    #cssmenu > ul > li.has-sub:hover > a:before{top:23px;height:0}
    #cssmenu ul ul{position:absolute;left:-9999px}
    #cssmenu ul ul li{height:0;-webkit-transition:all .25s ease;-ms-transition:all .25s ease;background:#289ae0;transition:all .25s ease}
    #cssmenu ul ul li{height:0;-webkit-transition:all .25s ease;-ms-transition:all .25s ease;background:#289ae0;transition:all .25s ease}
    #cssmenu ul ul li:hover{}
    #cssmenu li:hover > ul{left:auto}
    #cssmenu li:hover > ul > li{height:35px;}
    #cssmenu ul ul ul{margin-left:100%;top:0}
    #cssmenu ul ul li a{border-bottom:1px solid rgba(150,150,150,0.15);padding:11px 15px;width:220px;font-size:12px;text-decoration:none;color:#fff;font-weight:400;}
    #cssmenu ul ul li:last-child > a,#cssmenu ul ul li.last-item > a{border-bottom:0}
    /*hover #####*/
    #cssmenu ul ul li:hover > a,#cssmenu ul ul li a:hover{color:#fff;background-color:#1479B8;}
    #cssmenu ul ul li.has-sub > a:after{position:absolute;top:16px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
    #cssmenu ul ul li.has-sub > a:before{position:absolute;top:13px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
    #cssmenu ul ul > li.has-sub:hover > a:before{top:17px;height:0}
    #cssmenu ul ul li.has-sub:hover,#cssmenu ul li.has-sub ul li.has-sub ul li:hover{background:#363636;}
    #cssmenu ul ul ul li.active a{border-left:1px solid #333}
    #cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active> a{border-top:1px solid #333}

    @media  screen and (max-width:700px){
    .logo{position:absolute;top:0;left: 0;width:100%;height:46px;text-align:center;padding:10px 0 0 0 ;float:none}
    .logo2{display:none}
    nav{width:100%;}
    #cssmenu{width:100%}
    #cssmenu ul{width:100%;display:none}
    #cssmenu ul li{width:100%;border-top:1px solid #444}
    #cssmenu ul li:hover{background:#363636;}
    #cssmenu ul ul li,#cssmenu li:hover > ul > li{height:auto}
    #cssmenu ul li a,#cssmenu ul ul li a{width:100%;border-bottom:0}
    #cssmenu > ul > li{float:none}
    #cssmenu ul ul li a{padding-left:25px}
    #cssmenu ul ul li{background:#333!important;}
    #cssmenu ul ul li:hover{background:#363636!important}
    #cssmenu ul ul ul li a{padding-left:35px}
    #cssmenu ul ul li a{color:#ddd;background:none}
    #cssmenu ul ul li:hover > a,#cssmenu ul ul li.active > a{color:#fff}
    #cssmenu ul ul,#cssmenu ul ul ul{position:relative;left:0;width:100%;margin:0;text-align:left}
    #cssmenu > ul > li.has-sub > a:after,#cssmenu > ul > li.has-sub > a:before,#cssmenu ul ul > li.has-sub > a:after,#cssmenu ul ul > li.has-sub > a:before{display:none}
    #cssmenu #head-mobile{display:block;padding:23px;color:#ddd;font-size:12px;font-weight:700}
    .button{width:55px;height:46px;position:absolute;right:0;top:0;cursor:pointer;z-index: 12399994;}
    .button:after{position:absolute;top:22px;right:20px;display:block;height:4px;width:20px;border-top:2px solid #dddddd;border-bottom:2px solid #dddddd;content:''}
    .button:before{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;position:absolute;top:16px;right:20px;display:block;height:2px;width:20px;background:#ddd;content:''}
    .button.menu-opened:after{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;top:23px;border:0;height:2px;width:19px;background:#fff;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}
    .button.menu-opened:before{top:23px;background:#fff;width:19px;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg)}
    #cssmenu .submenu-button{position:absolute;z-index:99;right:0;top:0;display:block;border-left:1px solid #444;height:46px;width:46px;cursor:pointer}
    #cssmenu .submenu-button.submenu-opened{background:#262626}
    #cssmenu ul ul .submenu-button{height:34px;width:34px}
    #cssmenu .submenu-button:after{position:absolute;top:22px;right:19px;width:8px;height:2px;display:block;background:#ddd;content:''}
    #cssmenu ul ul .submenu-button:after{top:15px;right:13px}
    #cssmenu .submenu-button.submenu-opened:after{background:#fff}
    #cssmenu .submenu-button:before{position:absolute;top:19px;right:22px;display:block;width:2px;height:8px;background:#ddd;content:''}
    #cssmenu ul ul .submenu-button:before{top:12px;right:16px}
    #cssmenu .submenu-button.submenu-opened:before{display:none}
    #cssmenu ul ul ul li.active a{border-left:none}
    #cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active > a{border-top:none}
    }
  </style>

  <!-- nav -->
  <div class="nav" style="display: none;">
    <!-- Header -->
    <nav>
     <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header hidden-lg">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <center><a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('images/logo.png')); ?>" width="80px"></a></center>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php 
          $language_id = Session::get('applangId');
          if(!$language_id) $language_id = CONFIG_LANGUAGE;
          $top_menu = Helpers::getMenus($language_id,3);
        ?>
        <ul class="nav navbar-nav">
          <?php
            $language_id = Session::get('applangId');
            if(!$language_id) $language_id = CONFIG_LANGUAGE;
            $admin_menu = Helpers::getMenus($language_id,1);
          ?>

           <?php foreach($admin_menu as $parent_menu): ?>
            <?php if(!empty($parent_menu['children_menu'])): ?>
              <li class="">
               <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <i class="fa <?php echo e($parent_menu['fa_icon']); ?>"></i> <?php echo e($parent_menu['parent_menu_name']); ?>

                 <span class=" fa fa-angle-down"></span>
               </a>
               <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                <?php foreach($parent_menu['children_menu'] as $child_menu): ?>
                  <li><a href="<?php echo e(url('/')); ?>/<?php echo e($child_menu['c_menu_link']); ?>"> <?php echo $child_menu['child_menu_name']; ?></a>
                  </li>
                <?php endforeach; ?>
               </ul>
              </li>
            <?php else: ?>
              <li><a href="<?php echo e(url('/')); ?>/<?php echo e($parent_menu['p_menu_link']); ?>"><i class="fa <?php echo $parent_menu['fa_icon'];?>"></i> <?php echo $parent_menu['parent_menu_name'];?></a></li>
            <?php endif; ?>
           <?php endforeach; ?>

          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa <?php echo e($parent_menu['fa_icon']); ?>"></i> All
            <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu animated fadeInDown pull-right" id="subul">
              <?php foreach($top_menu as $parent_menu): ?>
                <?php if(!empty($parent_menu['children_menu'])): ?>
                  <li class="sub_group_li">
                   <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <i class="fa <?php echo e($parent_menu['fa_icon']); ?>"></i> <?php echo e($parent_menu['parent_menu_name']); ?>

                     <span class=" fa fa-angle-right"></span>
                   </a>
                     <ul class="sub_ulover">
                      <?php foreach($parent_menu['children_menu'] as $child_menu): ?>
                        <li class="sublist_hover"><a href="<?php echo e(url('/')); ?>/<?php echo e($child_menu['c_menu_link']); ?>"> <?php echo $child_menu['child_menu_name']; ?></a>
                        </li>
                      <?php endforeach; ?>
                     </ul>
                  </li>
                <?php else: ?>
                  <li><a href="<?php echo e(url('/')); ?>/<?php echo e($parent_menu['p_menu_link']); ?>"><i class="fa <?php echo $parent_menu['fa_icon'];?>"></i> <?php echo $parent_menu['parent_menu_name'];?></a></li>
                <?php endif; ?>
               <?php endforeach; ?>
            </ul>
          </li>
          <!-- <?php foreach($top_menu as $menu): ?>
            <li><a href="<?php echo e(url('')); ?>/<?php echo e($menu['p_menu_link']); ?>"><i class="fa <?php echo e($menu['fa_icon']); ?>"></i> <?php echo e($menu['parent_menu_name']); ?></a></li>
          <?php endforeach; ?> -->
        </ul>

        <style type="text/css">
          /*ul#subul{position: absolute;padding: 0;}
          ul.sub_ulover{display: none;position: absolute;padding: 0;margin:0;}
          ul.dropdown-menu li.sub_group_li:hover ul.sub_ulover{
            display: block;
            position: absolute;
            left:100%;
            background: #fff;
            margin-top: 0;
            border: 1px solid #D9DEE4;
            -webkit-box-shadow: none;
          }*/
        </style>

        <ul class="nav navbar-nav navbar-right">
          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell"></i>
              <span class="badge bg-red"><?php echo Helpers::getNumNotification();?></span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
              <?php echo Helpers::getLayoutNotification();?>
              <!-- notification_data -->
            </ul>
          </li>

          <li class="">
           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <i class="fa fa-wa fa-flag"></i> Languages
             <span class=" fa fa-angle-down"></span>
           </a>
           <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
            <?php $getLanguages = Helpers::getLanguage();?>
            <?php foreach($getLanguages as $getLang): ?>
              <li><a href="<?php echo e(url('lang')); ?>/<?php echo e($getLang->id); ?>"><img src="<?php echo e(url('images/uploads/flag')); ?>/<?php echo e($getLang->image); ?>" width="15px"> <?php echo e($getLang->name); ?></a>
              </li>
            <?php endforeach; ?>
           </ul>
          </li>
          
          <li class="">
           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <img src="<?php echo e(url('/images/uploads/user')); ?>/<?php echo e(Auth::user()->photo); ?>" alt=""><?php echo e(Auth::user()->username); ?>

             <span class=" fa fa-angle-down"></span>
           </a>
           <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
             <li><a href="<?php echo e(url('admin/users')); ?>/<?php echo e(Auth::user()->id); ?>"> <?php echo trans('common.profile'); ?></a>
             </li>
             <li><a href="<?php echo e(url('auth/logout')); ?>"><i class="fa fa-sign-out pull-right"></i> <?php echo trans('common.logout'); ?></a>
             </li>
           </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
  </div>