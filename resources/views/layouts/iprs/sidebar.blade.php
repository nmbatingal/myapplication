<div class="col-md-3 left_col menu_fixed hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Laravel 5</span></a>
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
          <div class="menu_section">
            <h3>IPRS MENU</h3>
            <ul class="nav side-menu">
                <li><a href="{{ route('iprs.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('iprs.indexTwo') }}"><i class="fa fa-bar-chart"></i> Rating</a></li>

                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="form.html">General Form</a></li>
                        <li><a href="form_advanced.html">Advanced Components</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
                        <li><a href="form_wizards.html">Form Wizard</a></li>
                        <li><a href="form_upload.html">Form Upload</a></li>
                        <li><a href="form_buttons.html">Form Buttons</a></li>
                    </ul>
                </li>

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