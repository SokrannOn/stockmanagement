<section class="sidebar" xmlns="http://www.w3.org/1999/html">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/photo/{{Auth::user()->photo}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{!! Auth::user()->username !!}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
<<<<<<< HEAD

        {{--Menu Admininstrator--}}
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
        {{--End menu administrator--}}


        {{--stockmanagement--}}
        <li class="treeview">
            <a href="#"><i class="fa fa-line-chart"></i> <span>Stock Management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu stockmangement--}}
                <li class="treeview"><a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Stock in <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('stock.create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Import products</a></li><li class="treeview">
                        {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                        {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
                    </ul>
                </li>
            </ul>
        </li>
        {{--end stockmanagement--}}

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













































        <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">4</span>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            </ul>
        </li>
        <li>
            <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">new</small>
                </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
            </ul>
        </li>
        <li>
            <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span>
            </a>
        </li>
        <li>
            <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">12</small>
                  <small class="label pull-right bg-green">16</small>
                  <small class="label pull-right bg-red">5</small>
                </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
            </ul>
        </li>
=======
        @php
            $user = \App\User::find(\Illuminate\Support\Facades\Auth::id());
        @endphp
        @foreach ($user->modules as $m)
            @include("admin.nav".".".$m->module)
        @endforeach

>>>>>>> 07696811e7b0315e1b8ad3bdf2f60897a33ae3a6

        {{--<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>--}}
        {{--<li class="header">LABELS</li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
    </ul>
</section>