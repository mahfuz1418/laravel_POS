<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="{{ route('pos.create') }}" class="waves-effect"><i class="fa-brands fa-slack"></i><span class="text-danger"><b>POS</b>  </span></a>
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

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-hand-holding-dollar"></i><span> Salary (EMP) </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
                        <li><a href="{{ route('salary.data') }}">Salary Data</a></li>
                        <li><a href="{{ route('all.advance') }}">All Advance</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-list"></i><span> Category </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.category') }}">Add Category</a></li>
                        <li><a href="{{ route('all.category') }}">All Categories</a></li>
                    </ul>
                </li>
                
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-brands fa-product-hunt"></i><span> Product </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('product.create') }}">Add Product</a></li>
                        <li><a href="{{ route('product.index') }}">All Products</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-money-bill-wave"></i><span> Expense </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('expense.create') }}">Add Expense</a></li>
                        <li><a href="{{ route('expense.index') }}">Today Expense</a></li>
                        <li><a href="{{ route('monthly.expense') }}">Monthly Expense</a></li>
                        <li><a href="{{ route('yearly.expense') }}">Yearly Expense</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-clipboard"></i><span> Order </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('pending.order') }}">Pending Orders </a></li>
                        <li><a href="{{ route('approved.order') }}">Approved Order </a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-regular fa-file"></i><span> Sales Report </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('sales.report') }}">Today Sales Report</a></li>
                        <li><a href="{{ route('all.sales.report') }}">All Sales Report</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-hand"></i><span> Attendence </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('attendence.create') }}">Take Attendence</a></li>
                        <li><a href="{{ route('attendence.index') }}">All Attendence</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa-solid fa-gear"></i><span> Settings </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('setting.create') }}">Add Company Data</a></li>
                        <li><a href="{{ route('setting.index') }}">View Company Data</a></li>
                    </ul>
                </li>

                
                

               

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>