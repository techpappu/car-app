<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview {{ Request::is('user*') ? 'active' : '' }}">
                <a href="javascript:void(0);">
                    <i class="fa fa-arrows"></i>
                    <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('user/admin') ? 'active' : '' }}">
                        <a href="{{ route('admin') }}"><i class="fa fa-image"></i> <span>Admin</span></a>
                    </li>
                    <li class="{{ Request::is('user/editor') ? 'active' : '' }}">
                        <a href="{{ route('editor') }}"><i class="fa fa-image"></i> <span>Editor</span></a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ Request::is('car*') ? 'active' : '' }}">
                <a href="javascript:void(0);">
                    <i class="fa fa-arrows"></i>
                    <span>Car</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('car/brand') ? 'active' : '' }}">
                        <a href="{{ route('brand') }}"><i class="fa fa-image"></i> <span>Brand</span></a>
                    </li>
                    <li class="{{ Request::is('car/model') ? 'active' : '' }}">
                        <a href="{{ route('model') }}"><i class="fa fa-image"></i> <span>Model</span></a>
                    </li>
                    <li class="{{ Request::is('car/bodyStyle') ? 'active' : '' }}">
                        <a href="{{ route('bodyStyle') }}"><i class="fa fa-image"></i> <span>Body Style</span></a>
                    </li>
                    <li class="{{ Request::is('car/color') ? 'active' : '' }}">
                        <a href="{{ route('color') }}"><i class="fa fa-image"></i> <span>Car Color</span></a>
                    </li>
                    <li class="{{ Request::is('car') ? 'active' : '' }}">
                        <a href="{{ route('car') }}"><i class="fa fa-image"></i> <span>Car</span></a>
                    </li>
                    <li class="{{ Request::is('car') ? 'active' : '' }}">
                        <a href="{{ route('faq') }}"><i class="fa fa-image"></i> <span>FAQ</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
