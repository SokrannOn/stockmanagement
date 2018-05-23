{{--stockmanagement--}}
<li class="treeview">
    <a href="#"><i class="fa fa-line-chart"></i> <span>Purchase Order</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        {{--Menu stockmangement--}}
        <li class="treeview"><a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Purchase Order <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="{{route('purchaseorder.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Create</a></li><li class="treeview">
                <li><a href="{{route('purchaseorder.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; View</a></li><li class="treeview">
            </ul>
        </li>
    </ul>
</li>
{{--end stockmanagement--}}