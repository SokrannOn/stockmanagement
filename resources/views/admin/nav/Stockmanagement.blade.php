{{--stockmanagement--}}
<li class="treeview">
    <a href="#"><i class="fa fa-folder-o"></i> <span>Stock Management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        {{--Menu stockmangement--}}
        <li class="treeview"><a href="#"><i class="fa fa-pencil fa-fw"></i> Stock in <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                @if(\App\PermissionUser::create())
                    <li><a href="{{route('stock.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Create</a></li><li class="treeview">
                @endif
                @if(\App\PermissionUser::view())
                    <li><a href="{{route('viewStockIn')}}">&nbsp;&nbsp;&nbsp;&nbsp; View </a></li><li class="treeview">
                @endif
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
            </ul>
        </li>

        <li class="treeview"><a href="#"><i class="fa fa-pencil fa-fw"></i> Stock Out <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                @if(\App\PermissionUser::create())
                    <li><a href="{{route('stockout.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Create</a></li><li class="treeview">
                @endif
                @if(\App\PermissionUser::view())
                    <li><a href="{{route('stockout.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; View </a></li><li class="treeview">
                @endif
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
            </ul>
        </li>

    </ul>
</li>
{{--end stockmanagement--}}