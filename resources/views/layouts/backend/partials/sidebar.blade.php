<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            @can('isAdmin')
                <li class="treeview {{ Request::is('admin/user*') ? 'active' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="fa fa-arrows"></i>
                        <span>User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/user/admin') ? 'active' : '' }}">
                            <a href="{{ route('admin') }}"><i class="fa fa-image"></i> <span>Admin</span></a>
                        </li>
                        <li class="{{ Request::is('admin/user/seller') ? 'active' : '' }}">
                            <a href="{{ route('seller') }}"><i class="fa fa-image"></i> <span>Seller</span></a>
                        </li>
                        <li class="{{ Request::is('admin/user/editor') ? 'active' : '' }}">
                            <a href="{{ route('editor') }}"><i class="fa fa-image"></i> <span>Editor</span></a>
                        </li>
                        <li class="{{ Request::is('admin/user/customer') ? 'active' : '' }}">
                            <a href="{{ route('customer') }}"><i class="fa fa-image"></i> <span>Customer</span></a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('isEditor')
                <li class="treeview {{ Request::is('admin/car*') ? 'active' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="fa fa-arrows"></i>
                        <span>Car</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/car/brand') ? 'active' : '' }}">
                            <a href="{{ route('brand') }}"><i class="fa fa-image"></i> <span>Brand</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car/model') ? 'active' : '' }}">
                            <a href="{{ route('model') }}"><i class="fa fa-image"></i> <span>Model</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car/bodyStyle') ? 'active' : '' }}">
                            <a href="{{ route('bodyStyle') }}"><i class="fa fa-image"></i> <span>Body Style</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car/color') ? 'active' : '' }}">
                            <a href="{{ route('color') }}"><i class="fa fa-image"></i> <span>Car Color</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car*') ? 'active' : '' }}">
                            <a href="{{ route('car') }}"><i class="fa fa-image"></i> <span>Car</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car/faq') ? 'active' : '' }}">
                            <a href="{{ route('faq') }}"><i class="fa fa-image"></i> <span>FAQ</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car/price-calculator') ? 'active' : '' }}">
                            <a href="{{ route('price-calculator') }}"><i class="fa fa-image"></i> <span>Price Calculator</span></a>
                        </li>
                        <li class="{{ Request::is('admin/car/gallery') ? 'active' : '' }}">
                            <a href="{{ route('gallery') }}"><i class="fa fa-image"></i> <span>Gallery</span></a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('isAdmin')
                <li class="{{ Request::is('admin/contact-us') ? 'active' : '' }}">
                    <a href="{{ route('contact-us') }}"><i class="fa fa-image"></i> <span>Contact Us List</span></a>
                </li>
                <li class="{{ Request::is('admin/inquiry') ? 'active' : '' }}">
                    <a href="{{ route('admin.inquiry') }}"><i class="fa fa-image"></i> <span>Inquiry List</span></a>
                </li>
                <li class="{{ Request::is('admin/order-list') ? 'active' : '' }}">
                    <a href="{{ route('admin.order-list') }}"><i class="fa fa-image"></i> <span>Order List</span></a>
                </li>
                <li class="{{ Request::is('admin/payment-list') ? 'active' : '' }}">
                    <a href="{{ route('admin.payment-list') }}"><i class="fa fa-image"></i> <span>Payment List</span></a>
                </li>
            @endcan


            <!-- Seller Sidebar -->    
            @can('isSeller')
                <li class="treeview {{ Request::is('admin/seller/car*') ? 'active' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="fa fa-arrows"></i>
                        <span>Seller Cars</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/seller/car*') ? 'active' : '' }}">
                            <a href="{{ route('seller.car') }}"><i class="fa fa-image"></i> <span>Car</span></a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/seller/inquiry') ? 'active' : '' }}">
                    <a href="{{ route('seller.inquiry') }}"><i class="fa fa-image"></i> <span>Seller Inquiry List</span></a>
                </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
