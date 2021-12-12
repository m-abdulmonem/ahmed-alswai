<?php

use MRDEVELOPER\Models\Users;
use MRDEVELOPER\Vendor\session;

$user = Users::where(Users::getKey(),(session::get("MR_DEVELOPER") or (session::get("MR_DEVELOPER_ADMIN"))));

?>
<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="/ma-admin" class="logo"><i class="icon-magnet icon-c-logo"></i><span>MA-Admin</span></a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                <ul class="nav navbar-nav hidden-xs">
                    <li><a href="#" class="waves-effect waves-light">Files</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>

                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>


                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown top-menu-item-xs">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-product-hunt"></i> <span class="badge badge-xs badge-danger">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                            <li class="notifi-title"><span class="label label-default pull-right">New 3</span>الطلبات</li>
                            <li class="list-group slimscroll-noti notification-list">
                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left p-r-10">
                                            <em class="fa fa-diamond noti-primary"></em>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left p-r-10">
                                            <em class="fa fa-cog noti-warning"></em>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">New settings</h5>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left p-r-10">
                                            <em class="fa fa-bell-o noti-custom"></em>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">Updates</h5>
                                            <p class="m-0">
                                                <small>There are <span class="text-primary font-600">2</span> new updates available</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left p-r-10">
                                            <em class="fa fa-user-plus noti-pink"></em>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">New user registered</h5>
                                            <p class="m-0">
                                                <small>You have 10 unread messages</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left p-r-10">
                                            <em class="fa fa-diamond noti-primary"></em>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left p-r-10">
                                            <em class="fa fa-cog noti-warning"></em>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">New settings</h5>
                                            <p class="m-0">
                                                <small>There are new settings available</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="list-group-item text-right">
                                    <small class="font-600">See all notifications</small>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                    </li>
                    <li class="dropdown top-menu-item-xs">
                        <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo $user[Users::getColumn(7)] ?>" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <li><a href="/ma-admin/users/edit/<?php echo session::get('MR_DEVELOPER_ADMIN_ID')  ?>"><i class="fa fa-user m-r-10 text-custom"></i> الملف الشخصى</a></li>
                            <li><a href="/ma-admin/settings"><i class="fa fa-wrench m-r-10 text-custom"></i> الاعدادت</a></li>
                            <li><a href="javascript:void(0) " class="lock"><i class="fa fa-lock m-r-10 text-custom"></i> قفل الشاشة</a></li>
                            <li class="divider"></li>
                            <li><a href="/" target="_blank"><i class="fa fa-external-link-square m-r-10 text-custom"></i> الصفحة الرئيسية </a></li>
                            <li><a href="/auth/logout"><i class="fa fa-power-off m-r-10 text-danger"></i> تسجيل خرورج</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">روابط</li>
                <li><a href="/ma-admin"><i class="fa fa-tachometer"></i> لوحة التحكم</a></li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> المستخدمون </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/ma-admin/users">كل المستخدمين</a></li>
                        <li><a href="/ma-admin/users/add">إضافة مستخدم</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-files-o "></i> <span> الفئات </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/ma-admin/alphabet">كل الفئات</a></li>
                        <li><a href="/ma-admin/alphabet/add">إضافة فئة جديده</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-files-o "></i> <span> الدليل </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/ma-admin/guide">كل الأماكن</a></li>
                        <li><a href="/ma-admin/guide/add">إضافة مكان جديد</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-files-o "></i> <span> الصفحات </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/ma-admin/pages">كل الصفحات</a></li>
                        <li><a href="/ma-admin/pages/add">إضافة صفحة</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cogs "></i> <span> الإعدادات </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="/ma-admin/settings"> إعدادات الموقع </a></li>
                        <li><a href="/ma-admin/settings/sliders">معلومات الاتصال</a></li>
                        <li><a href="/ma-admin/settings/social-media">مواقع التواصل الإجتماعى</a></li>
                        <li><a href="/ma-admin/settings/mail">البريد الإلكترونى</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">