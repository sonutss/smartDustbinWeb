<div class="br-logo"><a href="dashboard.php"><span>[</span>Dustbin <i></i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="{{ url('dashboard') }}" class="br-menu-link {{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">Dashboard</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('pickup') }}" class="br-menu-link {{ (\Request::route()->getName() == 'pickup') ? 'active' : '' }} {{ (\Request::route()->getName() == 'pickup-create') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Daily Pickup</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('warehouse-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'warehouse-list') ? 'active' : '' }} {{ (\Request::route()->getName() == 'add-warehouse') ? 'active' : '' }} {{ (\Request::route()->getName() == 'edit-warehouse') ? 'active' : '' }}" class="br-menu-link">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Warehouse List</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('vehicle-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'vehicle-list') ? 'active' : '' }} {{ (\Request::route()->getName() == 'add-vehicle') ? 'active' : '' }} {{ (\Request::route()->getName() == 'view-vehicle') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-car tx-24"></i>
                    <span class="menu-item-label">Vehicle List</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('driver-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'driver-list') ? 'active' : '' }} {{ (\Request::route()->getName() == 'add-driver') ? 'active' : '' }} {{ (\Request::route()->getName() == 'edit-driver') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-contact-outline tx-24"></i>
                    <span class="menu-item-label">Driver List</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('driver-vehicle-mapping') }}" class="br-menu-link {{ (\Request::route()->getName() == 'driver-vehicle-mapping') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
                    <span class="menu-item-label">Vehicle Driver Mapping</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('warehouse-vehicle-mapping') }}" class="br-menu-link {{ (\Request::route()->getName() == 'warehouse-vehicle-mapping') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
                    <span class="menu-item-label">Warehouse Vehicle Mapping</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('dustbin-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'dustbin-list') ? 'active' : '' }} {{ (\Request::route()->getName() == 'add-dustbin') ? 'active' : '' }} {{ (\Request::route()->getName() == 'edit-dustbin') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-trash-outline tx-24"></i>
                    <span class="menu-item-label">Dustbin List</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('dustbin-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'getDataDustbin') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-trash-outline tx-24"></i>
                    <span class="menu-item-label">Arnido Data Demo</span>
                </a>
            </li>
            <!-- <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Cards &amp; Widgets</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="card-dashboard.html" class="sub-link">Dashboard</a></li>
                    <li class="sub-item"><a href="card-social.html" class="sub-link">Blog &amp; Social Media</a></li>
                    <li class="sub-item"><a href="card-listing.html" class="sub-link">Shop &amp; Listing</a></li>
                </ul>
            </li>             -->
        </ul>
        <br>
    </div>
    <div class="br-header">
        <div class="br-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
            <div class="input-group hidden-xs-down wd-170 transition">
                <input id="searchbox" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
          </span>
            </div>
        </div>
        <div class="br-header-right">
            <nav class="nav">
                <div class="dropdown">
                    <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                        <i class="icon ion-ios-email-outline tx-24"></i>
                        <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header">
                        <div class="dropdown-menu-label">
                            <label>Messages</label>
                            <a href="#">+ Add New Message</a>
                        </div>
                        <div class="media-list">
                            <a href="#" class="media-list-link">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img3.jpg') }}" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Donna Seay</p>
                                            <span>2 minutes ago</span>
                                        </div>
                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img4.jpg') }}" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Samantha Francis</p>
                                            <span>3 hours ago</span>
                                        </div>
                                        <p>My entire soul, like these sweet mornings of spring.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img7.jpg') }}" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Robert Walker</p>
                                            <span>5 hours ago</span>
                                        </div>
                                        <p>I should be incapable of drawing a single stroke at the present moment...</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img5.jpg') }}" alt="">
                                    <div class="media-body">
                                        <div>
                                            <p>Larry Smith</p>
                                            <span>Yesterday</span>
                                        </div>
                                        <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-footer">
                                <a href="#"><i class="fas fa-angle-down"></i> Show All Messages</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                        <i class="icon ion-ios-bell-outline tx-24"></i>
                        <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header">
                        <div class="dropdown-menu-label">
                            <label>Notifications</label>
                            <a href="#">Mark All as Read</a>
                        </div>
                        <div class="media-list">
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img8.jpg') }}" alt="">
                                    <div class="media-body">
                                        <p class="noti-text"><strong>Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                        <span>October 03, 2017 8:45am</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img9.jpg') }}" alt="">
                                    <div class="media-body">
                                        <p class="noti-text"><strong>Mellisa Brown</strong> appreciated your work <strong>The Social Network</strong></p>
                                        <span>October 02, 2017 12:44am</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img10.jpg') }}" alt="">
                                    <div class="media-body">
                                        <p class="noti-text">20+ new items added are for sale in your <strong>Sale Group</strong></p>
                                        <span>October 01, 2017 10:20pm</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="media-list-link read">
                                <div class="media">
                                    <img src="{{ url('public/frontend/img/img5.jpg') }}" alt="">
                                    <div class="media-body">
                                        <p class="noti-text"><strong>Julius Erving</strong> wants to connect with you on your conversation with <strong>Ronnie Mara</strong></p>
                                        <span>October 01, 2017 6:08pm</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-footer">
                                <a href="#"><i class="fas fa-angle-down"></i> Show All Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name hidden-md-down">Katherine</span>
                        <img src="{{ url('public/frontend/img/img1.jpg') }}" class="wd-32 rounded-circle" alt="">
                        <span class="square-10 bg-success"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-250">
                        <div class="tx-center">
                            <a href="#"><img src="{{ url('public/frontend/img/img1.jpg') }}" class="wd-80 rounded-circle" alt=""></a>
                            <h6 class="logged-fullname">Katherine P. Lumaad</h6>
                            <p>youremail@domain.com</p>
                        </div>
                        <hr>
                        <div class="tx-center">
                            <span class="profile-earning-label">Earnings After Taxes</span>
                            <h3 class="profile-earning-amount">$13,230 <i class="icon ion-ios-arrow-thin-up tx-success"></i></h3>
                            <span class="profile-earning-text">Based on list price.</span>
                        </div>
                        <hr>
                        <ul class="list-unstyled user-profile-nav">
                            <li><a href="#"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                            <li><a href="#"><i class="icon ion-ios-gear"></i> Settings</a></li>
                            <li><a href="#"><i class="icon ion-ios-download"></i> Downloads</a></li>
                            <li><a href="#"><i class="icon ion-ios-star"></i> Favorites</a></li>
                            <li><a href="#"><i class="icon ion-ios-folder"></i> Collections</a></li>
                            <li><a href="{{ url('logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
    
        </div>
</div>