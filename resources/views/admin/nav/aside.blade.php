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
        @php
            $user = \App\User::find(\Illuminate\Support\Facades\Auth::id());
        @endphp
        @foreach ($user->modules as $m)
            @include("admin.nav".".".$m->module)
        @endforeach


        {{--<li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>--}}
        {{--<li class="header">LABELS</li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
        {{--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
    </ul>
</section>