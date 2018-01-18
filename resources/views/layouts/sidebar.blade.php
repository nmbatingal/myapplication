<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
    <ul class="nav pmd-sidebar-nav">
        
        <!-- User info -->
        <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
                <div class="media-left">
                    <span class="avatar-list-img40x40">
                        <img src="{{ asset('propeller/themes/images/user-icon.png') }}" alt="New User">
                    </span>
                </div>
                <div class="media-body media-middle">{{ Auth::user()->firstname }}</div>
                <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('home') }}">Return to Homepage</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li><!-- End user info -->

        <li> 
            <a class="pmd-ripple-effect" href="{{ url('/hrmis') }}"> 
                <i class="media-left media-middle">
                    <svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18" xml:space="preserve">
                        <g>
                            <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
                                 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
                        </g>
                    </svg>
                </i>
                <span class="media-body">Dashboard</span>
            </a> 
        </li>
        
        <li class="dropdown pmd-dropdown"> 
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">  
                <i class="media-left media-middle">
                    <div class="material-icons md-light md-24">trending_up</div>
                </i> 
                <span class="media-body">My Performance</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
            <ul class="dropdown-menu">
                <li><a href="" class="">Individual Performance</a></li>
                <li><a href="">Office Performance</a></li>
            </ul>
        </li>

        <!-- <li class="dropdown pmd-dropdown"> 
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">  
                <i class="material-icons media-left pmd-sm">swap_calls</i> 
                <span class="media-body">Third Party Elements</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
            <ul class="dropdown-menu">
                <li><a href="custom-scroll.html">Custom Scrollbar</a></li>
                <li><a href="datetimepicker.html">Datetimepicker</a></li>
                <li><a href="range-slider.html">Range Slider</a></li>
                <li><a href="select2.html">Select2</a></li>
            </ul>
        </li>
        
        <li class="dropdown pmd-dropdown"> 
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">  
                <i class="media-left media-middle">
                    <svg version="1.1" x="0px" y="0px" width="14.187px" height="18px" viewBox="0 0 14.187 18" enable-background="new 0 0 14.187 18" xml:space="preserve">
                        <path fill="#C9C8C8" d="M0,0v18h14.187V0H0z M3.121,3.293h2.023v4.767H3.121V3.293z M11.211,14.764H2.948v-2.022h8.263V14.764
                            L11.211,14.764z M11.211,11.585H2.948V9.563h8.263V11.585L11.211,11.585z M11.211,8.407H7.455V6.385h3.756V8.407z M11.211,5.229
                            H7.455V3.207h3.756V5.229z"/>
                    </svg>
                </i>
                <span class="media-body">Form</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
            <ul class="dropdown-menu">
                <li><a href="form-element.html">Form Elements</a></li>
                <li><a href="form.html">Form Examples</a></li>
            </ul>
        </li>
        <li class="dropdown pmd-dropdown"> 
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">  
                <i class="media-left media-middle">
                    <svg version="1.1" x="0px" y="0px" width="18px" height="12.706px" viewBox="0 0 18 12.706" enable-background="new 0 0 18 12.706" xml:space="preserve">
                        <path fill="#C9C8C8" d="M0,0v12.706h18V0H0z M12.706,4.235v3.176H9.108V4.235H12.706z M8.049,4.235v3.176h-6.99V4.235H8.049z
                             M1.059,8.47h6.99v3.177h-6.99V8.47z M9.108,11.647V8.47h3.599v3.177H9.108z M13.766,11.647V8.47h3.176v3.177H13.766z M16.942,7.412
                            h-3.176V4.235h3.176V7.412L16.942,7.412z"/>
                    </svg>
                </i> 
                <span class="media-body">Table</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
            <ul class="dropdown-menu">
                <li><a href="table.html">Normal Table</a></li>
                <li><a href="data-table.html">Data Table</a></li>
                <li><a href="table-with-expand-collapse.html">Table with Expand/Collapse</a></li>
            </ul>
        </li>

        <li class="dropdown pmd-dropdown"> 
            <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">  
                <i class="media-left media-middle">
                <svg x="0px" y="0px" width="18px" height="18px" viewBox="288.64 337.535 18 18" enable-background="new 288.64 337.535 18 18" xml:space="preserve">
                    <title>022-layout view</title>
                    <desc>Created with Sketch.</desc>
                    <g>
                        <g>
                            <path fill="#C9C8C8" d="M298.765,353.285v-2.25h3.375v-3.375h2.25v5.625H298.765z M290.89,347.66h2.25v3.375h3.375v2.25h-5.625
                                V347.66z M296.515,339.785v2.25h-3.375v3.375h-2.25v-5.625H296.515z M295.39,348.785h4.5v-4.5h-4.5V348.785z M304.39,345.41h-2.25
                                v-3.375h-3.375v-2.25h5.625V345.41z M288.64,355.535h18v-18h-18V355.535z"/>
                        </g>
                    </g>
                    <text transform="matrix(1 0 0 1 -0.0154 1202.2578)" font-family="'HelveticaNeue-Bold'" font-size="186.0251">Created by Richard Wearn</text>
                    <text transform="matrix(1 0 0 1 -0.0154 1388.2891)" font-family="'HelveticaNeue-Bold'" font-size="186.0251">from the Noun Project</text>
                </svg></i> 
                <span class="media-body">Pages</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
            <ul class="dropdown-menu">
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="404.html">404</a></li>
                <li><a href="blank.html">Blank</a></li>
                <li><a href="profile.html">Profile</a></li>
            </ul>
        </li>
        <li> 
            <a class="pmd-ripple-effect" href="inbox.html"> 
                <i class="media-left media-middle">
                <svg version="1.1" x="0px" y="0px" width="18px" height="12.479px" viewBox="288.64 363.118 18 12.479" enable-background="new 288.64 363.118 18 12.479" xml:space="preserve">
                    <g transform="translate(641.29613,1096.2351)">
                        <path fill="#C9C8C8" d="M-352.656-726.466v-5.828l4.484,4.484c2.467,2.466,4.499,4.484,4.516,4.484s2.049-2.018,4.516-4.484
                            l4.484-4.484v5.828v5.828h-9h-9V-726.466z M-347.854-728.929l-4.188-4.188h8.385h8.386l-4.188,4.188
                            c-2.304,2.303-4.192,4.188-4.198,4.188S-345.551-726.626-347.854-728.929z"/>
                    </g>
                </svg></i> 
                <span class="media-body">Inbox</span>
            </a> 
        </li>
        <li> 
            <a class="pmd-ripple-effect" href="notifications.html"> 
                <i class="media-left media-middle">
                <svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
                    <g>
                        <g>
                            <path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
                                 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
                                c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
                        </g>
                    </g>
                </svg></i> 
                <span class="media-body">Notifications</span>
            </a> 
        </li> -->
        
    </ul>
</aside>
<!-- End Left sidebar -->