<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset(Auth::user()->__img) }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname }}&nbsp;{{ Auth::user()->lastname }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route( 'profile.edit', ['id' => Auth::user()->id ]) }}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">  <i class="material-icons">input</i>Log Out
                            </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->

        <!-- Menu -->
        <div class="menu left-nav">
            <ul class="list left-sidebar-nav">
                <li class="header">PSBRS MENU</li>
                <li class="{{ Request::is('psbrs') ? 'active' : '' }}">
                    <a href="{{ route('psbrs.index') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('psbrs/lineup/selection') ? 'active' : '' }} {{ Request::is('psbrs/lineup/*') ? 'active' : '' }}">
                    <a href="{{ route('selection.index') }}">
                        <i class="material-icons">people</i>
                        <span>Lineup of Applicants</span>
                    </a>
                </li>

                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="material-icons">arrow_back</i>
                        <span>Return</span>
                    </a>
                </li>           
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>