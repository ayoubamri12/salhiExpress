
    
    <div class="sidebar">
        <div class="menu-btn">
            <i class="ph-bold ph-caret-left"></i>
        </div>
        <div class="head">
            <div class="user-img">
                <img src="{{ asset('/assets/images/aloo-salhi-logo-new.png') }}" alt="" />
            </div>
            <div class="user-details">
                <p class="title" >Salhi<span style="color: orange;">Express</span></p>
                <p class="name">
admin            </div>
        </div>
        <div class="nav">
            <div class="menu">
                <p class="title">Main</p>
                <ul>
                    <li class="{{ request()->routeIs('admin.show') ? 'active' : '' }}">
                        <a href="{{route("admin.show")}}">
                            <i class="icon ph-bold ph-house-simple"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li  class="{{ request()->is('admin/parcels/*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="icon fa-solid fa-box"></i>
                            <span class="text">Colis</span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li  class="{{ request()->is('admin/parcels/all') ? 'active' : '' }}">
                                <a href="{{route("admin.index")}}">
                                    <span class="text">Tout les colis</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/parcels/free_parcels') ? 'active' : '' }}">
                                <a href="{{route("admin.free_parcels")}}">
                                    <span class="text">Non expédiés</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="text">Refuse</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.show') }}">
                            <i class="icon ph-bold ph-file-text"></i>
                            <span class="text">Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-calendar-blank"></i>
                            <span class="text">Schedules</span>
                        </a>
                    </li>
                    
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu">
                <p class="title">Settings</p>
                <ul>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-gear"></i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <p class="title">Account</p>
            <ul>
                <li>
                    <a href="#">
                        <i class="icon ph-bold ph-info"></i>
                        <span class="text">Help</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="icon ph-bold ph-sign-out"></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>



