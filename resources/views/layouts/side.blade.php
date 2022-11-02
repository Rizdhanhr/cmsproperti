<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('template')}}/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Session::get('LoggedUser') }}
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a  href="{{url('admin-dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{url('admin-properti')}}">
                                    <span class="sub-item">Properti</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin-kategori')}}">
                                    <span class="sub-item">Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#base1">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base1">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ url('admin-slider') }}">
                                    <span class="sub-item">Slider</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">   
                    <a data-toggle="collapse" href="#base3">
                        <i class="fas fa-info"></i>
                        <p>About Us</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base3">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ url('admin-about') }}">
                                    <span class="sub-item">About Us</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin-team') }}">
                                    <span class="sub-item">Meet Our Team</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="">
                        <i class="fa fa-address-book"></i>
                        <p>Contact</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>