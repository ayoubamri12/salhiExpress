
    <div class="sidebar">
        <div class="menu-btn">
            <i class="ph-bold ph-caret-left"></i>
        </div>
        <div class="head">
            <div class="user-img">
                <img src="{{ asset('/assets/images/aloo-salhi-logo-new.png') }}" alt="" />
            </div>
            <div class="user-details">
                <p class="title">Salhi<span style="color: orange;">Express</span></p>
                <p class="name">
                    {{ auth()->user()->deliverymen->firtsName . ' ' . auth()->user()->deliverymen->lastName }}</p>
            </div>
        </div>
        <div class="nav">
            <div class="menu">
                <p class="title">Main</p>
                <ul>
                    <li class="{{ request()->routeIs('delivery.show') ? 'active' : '' }}">
                        <a href="{{ route('delivery.show') }}">
                            <i class="icon ph-bold ph-house-simple"></i>
                            <span class="text">Accueil</span>
                        </a>
                    </li>          
                    <li  class="{{ request()->is('delivery/parcels/*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="icon fa-solid fa-box"></i>
                            <span class="text">Colis</span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{ request()->is('delivery/parcels/delivred') ? 'active' : '' }}">
                                <a class="{{ request()->routeIs('parcels.delivred') ? 'active' : '' }}" href="{{route("parcels.delivred")}}">
                                    <span class="text">Marqué Livré</span>
                                </a>
                            </li>
                            <li  class="{{ request()->is('delivery/parcels/other') ? 'active' : '' }}">
                                <a href="{{route("parcels.other")}}">
                                    <span class="text">Autres</span>
                                </a>
                            </li>
                            <li  class="{{ request()->is('delivery/parcels/delayed') ? 'active' : '' }}">
                                <a href="{{route("parcels.delayed")}}">
                                    <span class="text">Reporté</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('parcel.scan') ? 'active' : '' }}">
                        <a href="{{ route('parcel.scan') }}">
                            <i class="fa-solid fa-qrcode"></i>
                            <span class="text">QR Code</span>
                        </a>
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
