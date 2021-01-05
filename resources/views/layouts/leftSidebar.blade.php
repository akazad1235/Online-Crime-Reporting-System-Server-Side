<div class="left-side-menu">

<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>
            
            @if(auth()->user()->is_admin == 1)
                <li >
                    <a href="javascript: void(0);">
                        <i class="fe-pocket"></i>
                        <span> Police Station </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('station.create')}}">Add Station</a>
                        </li>
                        <li>
                            <a href="{{route('station.index')}}">All Station</a>
                        </li>
                    </ul>
                </li>
            @endif
          
            @if(auth()->user()->is_admin == 1)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-pocket"></i>
                        <span>District </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('district.index')}}">All District</a>
                        </li>
                        <li>
                            <a href="{{route('district.create')}}">Add District</a>
                        </li>
                        
                    </ul>
                </li>
            @endif
            @if(auth()->user()->is_admin == 1)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-pocket"></i>
                        <span>Criminals </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    
                        <li>
                            <a href="{{route('criminals.create')}}">Add Criminals</a>
                        </li>
                        <li>
                            <a href="{{route('criminals.index')}}">Manage Criminals</a>
                        </li>
                    </ul>
                </li>
             @endif
           
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-pocket"></i>
                    <span>Complain </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                   
                    <li>
                        <a href="{{route('complain.index')}}">Complain</a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->is_admin == 1)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-pocket"></i>
                        <span>Admin </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                    
                        <li>
                            <a href="{{route('users.create')}}">Create</a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}">Manage</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(auth()->user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-pocket"></i>
                    <span>NID Card </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                
                    <li>
                        <a href="{{route('nid.index')}}">Add Natinal ID</a>
                    </li>
                </ul>
            </li>
        @endif
        @if(auth()->user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-pocket"></i>
                    <span>Feedback</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                
                    <li>
                        <a href="{{route('feedback.index')}}">Manage Feedback</a>
                    </li>
                </ul>
            </li>
        @endif

            <li class="menu-title mt-2">Blogs</li>

            @if(auth()->user()->is_admin == 1)
            <li>
                <a href="javascript: void(0);">
                    <i class="fe-pocket"></i>
                    <span>Blog </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                
                    <li>
                        <a href="{{route('users.create')}}">Add Post</a>
                    </li>
                    <li>
                        <a href="{{route('users.index')}}">Mange Post</a>
                    </li>
                </ul>
            </li>
        @endif
          

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>