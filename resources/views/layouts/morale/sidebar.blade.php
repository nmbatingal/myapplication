<div class="col-md-3 left_col menu_fixed hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('morale.index') }}" class="site_title"><i class="fa fa-paw"></i> <span>Morale Survey</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset(Auth::user()->__img) }}" width="48" height="48" alt="User" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->firstname }}&nbsp;{{ Auth::user()->lastname }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side main_menu">
            <div class="menu_section active">
                <h3>MENU</h3>
                <ul class="nav side-menu">
                    
						<li><a href="{{ route('morale.index') }}"><i class="fa fa-th-large"></i> Dashboard</a></li>
					
                    <li><a href="{{ route('morale.semestral') }}"><i class="fa fa-pencil"></i> Conduct Survey</a></li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>MyApplication</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('home') }}"><i class="fa fa-arrow-left"></i> Return to Main</a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <!-- <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form> -->
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>