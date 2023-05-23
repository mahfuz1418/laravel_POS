<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-users"></i><span> Employees </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
                        <li><a href="{{ route('all.employee') }}">All Employee</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-users-rectangle"></i><span> Customers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.customer') }}">Add Customer</a></li>
                        <li><a href="{{ route('all.customer') }}">All Customer</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-people-group"></i><span> Suppliers </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.supplier') }}">Add Supplier</a></li>
                        <li><a href="{{ route('all.supplier') }}">All Supplier</a></li>
                    </ul>
                </li>

               

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>