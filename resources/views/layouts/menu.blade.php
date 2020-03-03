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
                <a href="{{ url('pickup') }}" class="br-menu-link {{ (\Request::route()->getName() == 'pickup') ? 'active' : '' }} {{ (\Request::route()->getName() == 'pickup-create') ? 'active' : '' }} {{ (\Request::route()->getName() == 'view-details') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Daily Pickup</span>
                </a>
            </li>
           <!--  <li class="br-menu-item">
                <a href="{{ url('pickup-history') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'pickup-history') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Pickup History</span>
                </a>
            </li>
             <li class="br-menu-item">
                <a href="{{ url('dustbin-history') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'dustbin-history') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Dustbin History</span>
                </a>
            </li>
             <li class="br-menu-item">
                <a href="{{ url('avilable-history') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'avilable-history') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Avilable History</span>
                </a>
            </li> -->
           
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
                <a href="{{ url('warehouse-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'warehouse-list') ? 'active' : '' }} {{ (\Request::route()->getName() == 'add-warehouse') ? 'active' : '' }} {{ (\Request::route()->getName() == 'edit-warehouse') ? 'active' : '' }}" class="br-menu-link">
                    <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
                    <span class="menu-item-label">Warehouse List</span>
                </a>
            </li>
             <li class="br-menu-item">
                <a href="{{ url('dustbin-list') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'dustbin-list') ? 'active' : '' }} {{ (\Request::route()->getName() == 'add-dustbin') ? 'active' : '' }} {{ (\Request::route()->getName() == 'edit-dustbin') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-trash-outline tx-24"></i>
                    <span class="menu-item-label">Dustbin List</span>
                </a>
            </li>
             <!-- <li class="br-menu-item">
                <a href="{{ url('warehouse-vehicle-mapping') }}" class="br-menu-link {{ (\Request::route()->getName() == 'warehouse-vehicle-mapping') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
                    <span class="menu-item-label">Warehouse Vehicle Map.</span>
                </a>
            </li>
            <li class="br-menu-item">
                <a href="{{ url('driver-vehicle-mapping') }}" class="br-menu-link {{ (\Request::route()->getName() == 'driver-vehicle-mapping') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
                    <span class="menu-item-label">Vehicle Driver Mapping</span>
                </a>
            </li> -->
            <li class="br-menu-item">
                <a href="{{ url('warehouse-vehicle-mapping') }}" class="br-menu-link with-sub {{ (\Request::route()->getName() == 'warehouse-vehicle-mapping') ? 'active' : '' }} {{ (\Request::route()->getName() == 'driver-vehicle-mapping') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-settings  tx-20"></i>
                    <span class="menu-item-label">Mapping</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ url('warehouse-vehicle-mapping') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'warehouse-vehicle-mapping') ? 'active' : '' }}" class="sub-link"> Warehouse Vehicle</a></li>
                    <li class="sub-item"> <a href="{{ url('driver-vehicle-mapping') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'driver-vehicle-mapping') ? 'active' : '' }}" class="sub-link"> Vehicle Driver</a></li>
                   
                </ul>
            </li>
             <li class="br-menu-item">
                <a href="{{ url('pickup-history') }}" class="br-menu-link with-sub  {{ (\Request::route()->getName() == 'pickup-history') ? 'active' : '' }} {{ (\Request::route()->getName() == 'dustbin-history') ? 'active' : '' }} {{ (\Request::route()->getName() == 'avilable-history') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-list-outline  tx-20"></i>
                    <span class="menu-item-label">History</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ url('pickup-history') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'pickup-history') ? 'active' : '' }}" class="sub-link"> Pickup History</a></li>
                    <li class="sub-item"> <a href="{{ url('dustbin-history') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'dustbin-history') ? 'active' : '' }}" class="sub-link"> Dustbin History</a></li>
                    <li class="sub-item"><a href="{{ url('avilable-history') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'avilable-history') ? 'active' : '' }}" class="sub-link">Avilable History</a></li>
                </ul>
            </li>    
             
             <li class="br-menu-item">
                <a href="{{ url('getDataDustbin') }}" class="br-menu-link with-sub  {{ (\Request::route()->getName() == 'getDataDustbin') ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-analytics-outline  tx-20"></i>
                    <span class="menu-item-label">Report</span>
                </a>
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="{{ url('getDataDustbin') }}" class="br-menu-link  {{ (\Request::route()->getName() == 'getDataDustbin') ? 'active' : '' }}" class="sub-link"> Bin Level Mangement</a></li>
                </ul>
            </li>
            <!-- <li class="br-menu-item">
                <a href="" class="br-menu-link  ">
                    <i class="menu-item-icon icon ion-ios-trash-outline tx-24"></i>
                    <span class="menu-item-label">Dustbin Analytics</span>
                </a>
            </li> -->

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
            <!-- <div class="input-group hidden-xs-down wd-170 transition">
                <input id="searchbox" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
          </span>
            </div> -->
        </div>
        <div class="br-header-right">
            <nav class="nav">
                <div class="dropdown">
                  
                        <ul class="list-unstyled user-profile-nav">
                          
                            <li><a href="{{ url('logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
    
        </div>
</div>
