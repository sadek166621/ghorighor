
<!-- LEFT SIDEBAR -->
<!-- ========================================================= -->
<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">
                    <!--HOME-->
                    <li class="active-item"><a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                    <!--UI ELEMENTENTS-->
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>ACL Module (Admin, Operator, Student, Teacher)</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('users')}}">Add User</a></li>
                            <li><a href="{{route('manage-users')}}">Manage User</a></li>
                            <li><a href="{{route('roles')}}">Add roles</a></li>
                            <li><a href="{{route('manage-roles')}}">Manage roles</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Category Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-category')}}">Add category</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Sub Category Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('sub-category')}}">Add sub category</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-pie-chart" aria-hidden="true"></i><span>Brands</span> </a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-brand')}}">Add Brands</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-columns" aria-hidden="true"></i><span>Suppliers </span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-supplier')}}">Add Suppliers</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Products</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-product')}}">Add Products</a></li>
                            <li><a href="{{route('manage-product')}}">Manage Products</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Order</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('pending-order')}}">Pending Order</a></li>
                            <li><a href="{{route('success-order')}}">Success Order</a></li>
                            <li><a href="{{route('manage-order')}}">Manage Order</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Sells report Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('daily-sells-report')}}">Daily Sells report</a></li>
                            <li><a href="{{route('weekly-sells-report')}}">Weekly Sells report</a></li>
                            <li><a href="{{route('monthly-sells-report')}}">Monthly Sells report</a></li>
                            <li><a href="{{route('sells-report')}}">All Sells report</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Marque Slider</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('marquee')}}">Marquee</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Logo Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-logo')}}">Add Logo</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Slider Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-slider')}}">Add slider</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span>Contact Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-contact')}}">Add contact</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-table" aria-hidden="true"></i><span> Message</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('see-massage')}}">Customer Message</a></li>
                        </ul>
                    </li>
                    <li class="has-child-item close-item">
                        <a><i class="fa fa-cubes" aria-hidden="true"></i><span>Gallery Module</span></a>
                        <ul class="nav child-nav level-1">
                            <li><a href="{{route('add-gallery')}}">Add Gallery</a></li>
                        </ul>
                    </li>
                    <!--TABLES-->
                    <!--PAGES-->
                </ul>
            </nav>
        </div>
    </div>
</div>
