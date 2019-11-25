<!DOCTYPE html>
<html>
    <head>
        <title>Inventory Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{url('html_window/css/metro.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('html_window/css/metro_mobile.css')}}" media="screen and (max-height: 500px), screen and (orientation:portrait)" />
        <link rel="stylesheet" type="text/css" href="{{url("html_window/css/demo.css")}}" />
        <script type="text/javascript" src="{{url("html_window/js/jquery.js")}}"></script>
        <script type="text/javascript" src="{{url("html_window/js/metro.js")}}"></script>
        <script type="text/javascript" src="{{url("html_window/js/demo.js")}}"></script>
        <script type="text/javascript" type="text/javascript" src="{{url('js/kg_custom.js')}}"></script>
        <!-- Computed in PHP based on your settings -->
        <style>
            #widget_scroll_container {
                width: 2160px;
            }
            div.widget_container {
                width: 1200px;
            }
            div.widget_container.half {
                width: 400px;
            }
            @media screen and (max-height: 680px) {
                #widget_scroll_container {
                    width: 1660px;
                }
                div.widget_container {
                    width: 900px;
                }
                div.widget_container.half {
                    width: 300px;
                }
            }
        </style>
    </head>
    <body>
        <div id="widget_scroll_container">
            <div class="widget_container full" data-num="0">
                <div class="widget widget4x2 widget_orange widget_link animation unloaded" data-url="" data-link="{{url('dashboard')}}" data-theme="orange" data-name="Metro_UI">
                    <div class="widget_content">
                        <div class="main" style="background-image:url('{{url('html_window/images/gallary/logo.png')}}');">
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="widget widget4x2 widget_orange animation unloaded" data-url="http://www.melonhtml5.com/metro_ui.php" data-theme="orange" data-name="Metro_UI">
                    <div class="widget_content">
                        <div class="main" style="background-image:url('{{url('html_window/images/gallary/logo.png')}}');">
                            <span>Stock Management</span>
                        </div>
                    </div>
                </div> -->
                <div class="widget widget4x2 widget_red widget_link animation unloaded" style="background-color:#3E3F3A;" data-url="" data-theme="red" data-name="userback" data-link="{{url("pos/salepanel/dashboard")}}">
                    <div class="widget_content">
                        <div class="main" style="background-color:#3E3F3A;background-image:url('{{url('html_window/images/gallary/widget_userback.png')}}');">
                            <span>POS Sale Panel</span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_darkblue animation unloaded" data-url="{{url("admin/stock_mgr/actual_stock")}}" data-theme="darkblue" data-name="Inventory Count">
                    <div class="widget_content">
                        <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_contact.png')}}');">
                            <span>Configuration</span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_red animation unloaded" data-url="{{url("admin/stock_mgr/actual_stock")}}" data-theme="red" data-name="InventoryCount">
                    <div class="widget_content">
                        <a href="{{url("admin/stock_mgr/actual_stock")}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_royal_preloader.png')}}');">
                                <span>Inventory Count</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget4x2 widget_darkgreen animation unloaded" data--link="{{url("dashboard")}}" data-theme="darkgreen" data-name="Dashboard">
                    <div class="widget_content">
                        <a href="{{url('dashboard')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_admin7.png')}}');">
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_darkred animation unloaded" data-url="{{url('admin/tool_mgr/backup_list')}}" data-theme="darkred" data-name="admin/tool_mgr/backup_list">
                    <div class="widget_content">
                        <a href="{{url('admin/tool_mgr/backup_list')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_editable.png')}}');">
                                <span>Tools</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_green animation unloaded" data-url="{{url('admin/audi_trail')}}" data-theme="green" data-name="{{url('admin/audi_trail')}}">
                    <div class="widget_content">
                        <a href="{{url('admin/audi_trail')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_metro_gallery.png')}}');">
                                <span>Audit Trails</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_blue animation unloaded" data-url="{{url('admin/supplier_mgr/supplier')}}" data-theme="blue" data-name="{{url('admin/supplier_mgr/supplier')}}">
                    <div class="widget_content">
                        <a href="{{url('admin/supplier_mgr/supplier')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_sliding_menu.png')}}');">
                                <span>Suppliers</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_darkblue animation unloaded" data-url="{{url('admin/quotation')}}" data-theme="darkblue" data-name="{{url('admin/quotation')}}">
                    <div class="widget_content">
                        <a href="{{url('admin/quotation')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_timeline.png')}}');">
                                <span>Quotations</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_blue animation unloaded" data-url="{{url('admin/item_mgr/item_base_store')}}" data-theme="blue" data-name="admin/item_mgr/item_base_store">
                    <div class="widget_content">
                        <a href="{{url('admin/item_mgr/item_base_store')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_gallery.png')}}');">
                                <span>Item Base Store</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_red animation unloaded" data-url="http://www.melonhtml5.com/grid_slider.php" data-theme="red" data-name="grid_slider">
                    <div class="widget_content">
                        <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_chart.png')}}');">
                            <span>Reports</span>
                        </div>
                    </div>
                </div>
                <div class="widget widget4x2 widget_darkblue animation unloaded" data-url="http://www.melonhtml5.com/royal_tab.php" data-theme="darkblue" data-name="royal_tab">
                    <div class="widget_content">
                        <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_tab.png')}}');">
                            <span>Sale Management</span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_darkred animation unloaded" data-url="{{url('admin/users')}}" data-theme="darkred" data-name="admin/users">
                    <div class="widget_content">
                        <a href="{{url('admin/users')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_editable.png')}}');">
                                <span>Users Management</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget1x1 widget_ widget_link animation unloaded" style="background-color:#3B5B99;" data-url="" data-theme="" data-name="Facebook" data-link="http://facebook.com/MelonHTML5">
                    <div class="widget_content">
                        <div class="main" style="background-color:#3B5B99;background-image:url('{{url('html_window/images/gallary/facebook.png')}}');">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget1x1 widget_ widget_link animation unloaded" style="background-color:#00ACED;" data-url="" data-theme="" data-name="Twitter" data-link="http://twitter.com/MelonHTML5">
                    <div class="widget_content">
                        <div class="main" style="background-color:#00ACED;background-image:url('{{url('html_window/images/gallary/twitter_w.png')}}');">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget1x1 widget_ widget_link animation unloaded" style="background-color:#232323;" data-url="" data-theme="" data-name="CodeCanyon" data-link="http://codecanyon.net/user/MelonHTML5">
                    <div class="widget_content">
                        <div class="main" style="background-color:#232323;background-image:url('{{url('html_window/images/gallary/codecanyon2.png')}}');">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget1x1 widget_yellow animation unloaded" data-url="" data-theme="yellow" data-name="Share">
                    <div class="widget_content">
                        <div class="main">
                            <span><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.melonhtml5.com&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=161905873924694" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
                              <div><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.melonhtml5.com" data-hashtags="MelonHTML5"></a></div></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget_container half" data-num="1">
                <div class="widget widget2x2 widget_darkred animation unloaded" data-url="{{url('admin/sale_mgr/return')}}" data-theme="darkred" data-name="{{url('admin/sale_mgr/return')}}">
                    <div class="widget_content">
                        <a href="{{url('admin/sale_mgr/return')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_slider.png')}}');">
                                <span>Returnings</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_darkblue animation unloaded" data-url="admin/stock_mgr/adjustment_stock" data-theme="darkblue" data-name="admin/stock_mgr/adjustment_stock">
                    <div class="widget_content">
                        <a href="{{url('admin/stock_mgr/adjustment_stock')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_timeline.png')}}');">
                                <span>Adjustment Stocks</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="widget widget2x2 widget_red animation unloaded" data-url="http://www.melonhtml5.com/royal_preloader_wp.php" data-theme="red" data-name="royal_preloader_wp">
                    <div class="widget_content">
                        <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_royal_preloader.png')}}');">
                            <span>Auditrials</span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_orange widget_link animation unloaded" data-url="" data-theme="orange" data-name="{{url('admin/customer_mgr/customer')}}" data-link="{{url('admin/customer_mgr/customer')}}">
                    <div class="widget_content">
                        <a href="{{url('admin/customer_mgr/customer')}}">
                            <div class="main" style="background-image:url('{{url('html_window/images/gallary/widget_github.png')}}');">
                                <span>Customers</span>
                            </div>
                        </a>
                    </div>
                </div>
               <!--  <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://inventory.localhost:81/admin/dashboard" data-theme="grey" data-name="tile_00035">
                    <div class="widget_content">
                        <div class="main">
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="widget widget2x2 widget_grey animation unloaded" style="background-color:#3E3F3A;" data-url="" data-theme="red" data-name="userback" data-link="{{url('admin/dashboard')}}">
                    <div class="widget_content">
                        <div class="main" style="background-color:#3E3F3A;background-image:url('{{url('html_window/images/gallary/logo.png')}}');">
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div> -->

                <div class="widget widget2x2 widget_grey animation unloaded" style="background-color:#3E3F3A;" data-theme="red" data-name="userback" data-link="{{url('admin/dashboard')}}">
                    <div class="widget_content">
                        <div class="main" style="background-color:#3E3F3A;background-image:url('{{url('html_window/images/gallary/logo.png')}}');">
                            <span>Dashboard</span>
                        </div>
                    </div>
                </div>

                <div class="widget widget2x2 widget_grey animation unloaded" data-theme="grey" data-name="Logout">
                    <a href="{{url('auth/logout')}}">
                        <div class="widget_content">
                            <div class="main">
                                <span>Logout</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="widget_container half" data-num="2">
                <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://www.melonhtml5.com/blank.php" data-theme="grey" data-name="tile_00023">
                    <div class="widget_content">
                        <div class="main">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://www.melonhtml5.com/blank.php" data-theme="grey" data-name="tile_00023">
                    <div class="widget_content">
                        <div class="main">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://www.melonhtml5.com/blank.php" data-theme="grey" data-name="tile_00024">
                    <div class="widget_content">
                        <div class="main">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://www.melonhtml5.com/blank.php" data-theme="grey" data-name="tile_00025">
                    <div class="widget_content">
                        <div class="main">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://www.melonhtml5.com/blank.php" data-theme="grey" data-name="tile_00026">
                    <div class="widget_content">
                        <div class="main">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="widget widget2x2 widget_grey animation unloaded" data-url="http://www.melonhtml5.com/blank.php" data-theme="grey" data-name="tile_00027">
                    <div class="widget_content">
                        <div class="main">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="widget_preview">
            <div id="widget_sidebar">
                <div>
                    <div class="cancel"><span>Close</span></div>
                    <div class="refresh"><span>Refresh</span></div>
                    <div class="download"><span>Download</span></div>
                    <div class="back"><span>Back</span></div>
                    <div class="next"><span>Next</span></div>
                </div>
            </div>
        </div>
        <script>
            // !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        </script>
        <script>
            // var Userback = window.Userback || {};

            // (function(id) {
            //     if (document.getElementById(id)) {return;}
            //     var s = document.createElement('script');
            //     s.id = id;
            //     s.src = '//app.userback.io/widget.js';
            //     document.getElementsByTagName('head')[0].appendChild(s);
            // })('userback-sdk');

            // Userback.access_token = '1|8|IjXmeq4nrQRoPlmr84Tm7x2dDZUdpW08fYuuoyRQpIef3AHcFB';
        </script>
    </body>
</html>