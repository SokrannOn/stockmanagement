<li class="treeview">
    <a href="#"><i class="fa fa-lock"></i> <span>Administrator</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
    <ul class="treeview-menu">
        {{--Menu user--}}
        <li class="treeview"><a href="#"><i class="fa fa-industry fa-fw"></i> Supplier <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="{{route('supplier.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add new</a></li><li class="treeview">
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
            </ul>
        </li>
        {{--Menu user--}}
        <li class="treeview"><a href="#"><i class="fa fa-user fa-fw"></i> User <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="{{URL::to('/admin/user')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add User</a></li><li class="treeview">
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
            </ul>
        </li>

        {{--Roles--}}
        <li class="treeview"><a href="#"><i class="fa fa-address-book-o fa-fw"></i> Roles <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="{{url('/role/view')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
            </ul>

        </li>
        <li class="treeview"><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li><a href="{{url('/admin/position/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
            </ul>

        </li>

        {{--end Roles--}}


        {{--End menu user--}}
        <li class="treeview"><a href="#"><i class="fa fa-address-book-o fa-fw"></i> Testing <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu Province--}}
                <li class="treeview"><a href="#"><i class="fa fa-map-marker fa-fw"></i> Provinces <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View</a></li><li class="treeview">
                    </ul>
                </li>

                {{--End menu Province--}}

                {{--Menu Distric--}}
                <li class="treeview"><a href="#"><i class="fa fa-map-pin fa-fw"></i> Districts <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                    </ul>
                </li>
                {{--End menu Distric--}}

                {{--Menu Commune--}}
                <li class="treeview"><a href="#"><i class="fa fa-map-o fa-fw"></i> Communes <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                    </ul>
                </li>
                {{--End menu Commune--}}

                {{--Menu Village--}}
                <li class="treeview"><a href="#"><i class="fa fa-home fa-fw"></i> Villages <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                    </ul>
                </li>
                {{--End menu Village--}}


                {{--Menu Set Value--}}
                <li class="treeview"><a href="#"><i class="fa fa-sliders fa-fw"></i> Set-Values <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                        <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                    </ul>
                </li>
            </ul>

        </li>
        <li class="treeview"><a href="#"><i class="fa fa-product-hunt fa-fw"></i> Product <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu Province--}}
                <li class="treeview"><a href="#"><i class="fa fa-tags fa-fw"></i> Category <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>
                </li>

                {{--End menu Province--}}

                {{--Menu Distric--}}
                <li class="treeview"><a href="#"><i class="fa fa-product-hunt fa-fw"></i> Prodcut List <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/productlist/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>
                </li>
                {{--End menu Distric--}}

            </ul>

        </li>
        {{--End product--}}
        {{--Start customer--}}

        <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Customer <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu Province--}}
                <li class="treeview"><a href="#"><i class="fa fa-address-card-o fa-fw"></i> Channel <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/channel/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>
                </li>

                {{--End menu Province--}}

                {{--Menu Distric--}}
                <li class="treeview"><a href="#"><i class="fa fa-users fa-fw"></i> Customer List <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/customer/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>
                </li>
                {{--End menu Distric--}}

            </ul>

        </li>
        {{--end customer--}}
        {{--Start setvlaue--}}

        <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Set Value <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu pricelist--}}
                <li class="treeview"><a href="#"><i class="fa fa-address-card-o fa-fw"></i> Pricelist <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/pricelist/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>
                </li>
                {{--End menu pricelist--}}

            </ul>

        </li>
        {{--end setvlaue--}}
    </ul>
</li>