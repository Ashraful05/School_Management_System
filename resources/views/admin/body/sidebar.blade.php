{{--@php--}}
{{--    $prefix = Request::route()->getPrefix();--}}
{{--    $route = Route::current()->getName();--}}
{{--@endphp--}}

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('/') }}admin/images/logo-dark.png" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ Request::is('dashboard')?'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ Request::is('user/view')||Request::is('user/add')?'active':'' }} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('user/view')?'active':'' }}"><a href="{{ route('user_view') }}"><i class="ti-more"></i>View User</a></li>
                    <li class="{{ Request::is('user/add')?'active':'' }}"><a href="{{ route('user_add') }}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>

            <li class="treeview  {{ Request::is('user/profile/*')?'active':'' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('user/profile/view')?'active':'' }}"><a href="{{ route('view_profile') }}"><i class="ti-more"></i>View Profile</a></li>
                    <li class="{{ Request::is('user/change/*')?'active':'' }}"><a href="{{ route('change_password') }}"><i class="ti-more"></i>Change Password</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>SetUp Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('student/class')?'active':'' }}"><a href="{{ route('class.index') }}"><i class="ti-more"></i>Student Class</a></li>
                    <li class="{{ Request::is('student/year')?'active':'' }}"><a href="{{ route('year.index') }}"><i class="ti-more"></i>Student Year</a></li>
                    <li class="{{ Request::is('student/group')?'active':'' }}"><a href="{{ route('group.index') }}"><i class="ti-more"></i>Student Group</a></li>
                    <li class="{{ Request::is('student/shift')?'active':'' }}"><a href="{{ route('shift.index') }}"><i class="ti-more"></i>Student Shift</a></li>
                    <li class="{{ Request::is('student/feeCategory')?'active':'' }}"><a href="{{ route('feeCategory.index') }}"><i class="ti-more"></i>Student Fee Category</a></li>
                    <li class="{{ Request::is('student/feeCategoryAmount')?'active':'' }}"><a href="{{ route('feeCategoryAmount.index') }}"><i class="ti-more"></i>Student Fee Amount</a></li>
                </ul>
            </li>


            <li>
                <a href="{{ route('admin.logout') }}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
