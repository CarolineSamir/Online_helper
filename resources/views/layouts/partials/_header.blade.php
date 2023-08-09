<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('public/assets')}}/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"><span style="color: red">Online</span>Helper</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">{{trans('message.products')}}</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">{{trans('message.products')}}</div>
            </a>

            <ul>

                <li> <a href={{route('product-index')}}><i class="bx bx-right-arrow-alt"></i>{{trans('message.products')}}</a>
                </li>
                <li> <a href={{ route('category-index') }}><i class="bx bx-right-arrow-alt"></i>Categories</a>
                </li>

            </ul>
        </li>
        <li class="{{Request::is('order/*') ? 'mm-active' : ''}}">
            <a href={{ route('order-index')}} aria-expanded="true">
                <div class="parent-icon"><i class="bx bx-cart"></i>
                </div>
                <div class="menu-title">Orders</div>
            </a>
        </li>
        <li class="menu-label">Business relations</li>
        <li class="{{Request::is('customer/*') ? 'mm-active' : ''}}">
            <a href={{ route('customer-index')}} aria-expanded="true">
                <div class="parent-icon"><i class="lni lni-users"></i>
                </div>
                <div class="menu-title">Customers</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="lni lni-delivery"></i>
                </div>
                <div class="menu-title">Shipping</div>
            </a>
            <ul>
                <li> <a href={{{route('company-index')}}}><i class="bx bx-right-arrow-alt"></i>Companies</a>
                </li>
                <li> <a href={{ route('company-new') }}><i class="bx bx-right-arrow-alt"></i>Add Company</a>
                </li>
                <li> <a href={{route('shipment-index')}}><i class="bx bx-right-arrow-alt"></i>Shipments</a>
                </li>
            </ul>
        </li>
        <li class="{{Request::is('country/*') ? 'mm-active' : ''}}">
            <a href={{ route('country-index')}} aria-expanded="true">
                <div class="parent-icon"><i class="lni lni-world-alt"></i>
                </div>
                <div class="menu-title">Countries</div>
            </a>
        </li>
        <li class="menu-label">financial</li>
        <li class="{{Request::is('financial/*') ? 'mm-active' : ''}}">
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="fa-solid fa-sack-dollar"></i>
                </div>
                <div class="menu-title">financials</div>
            </a>
            <ul>
                <li> <a href={{{route('revenue-index')}}}><i class="bx bx-right-arrow-alt"></i>revenue</a>
                </li>
            </ul>
        </li>

    </ul>


    <!--end navigation-->
</div>

<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>
{{--                  <li class="nav-item dropdown dropdown-large">--}}
{{--                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                          <ul class="list-group list">--}}
{{--                              <li class="list-group-item border-0">--}}
{{--                                  <a href="{{route('lang.change','en')}}">English</a>--}}
{{--                              </li>--}}
{{--                              <li class="list-group-item border-0">--}}
{{--                                  <a href="{{route('lang.change','ar')}}">Japanese</a>--}}
{{--                              </li>--}}
{{--                          </ul>--}}
{{--                      </div>--}}
{{--                  </li>--}}
                    <div style="padding: 10px; margin-bottom: 5px;">
                        <!-- Todo Enassr -->
                        @if(session()->has('lang_code') && session()->get('lang_code') == 'en')
                            <a href="{{route("change-lang" ,'ar')}}">
                                <img src="{{asset('public/syndron')}}/flags/4x3/us.svg" style="width: 25px;">
                            </a>
                        @else
                            <a href="{{route("change-lang" ,'en')}}">
                                <img src="{{asset('public/syndron')}}/flags/4x3/eg.svg" style="width: 25px;">
                            </a>
                        @endif
                    </div>
                    <li class="nav-item dropdown dropdown-large">
                        <a type="button" class="btn btn-outline-dark px-5 radius-30" href="{{route('home')}}"><i class="bx bx-home mr-1"></i>Home</a>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                    ago</span></h6>
                                            <p class="msg-info">5 new user registered</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                    ago</span></h6>
                                            <p class="msg-info">You have recived new orders</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                    ago</span></h6>
                                            <p class="msg-info">The pdf files generated</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                    ago</span></h6>
                                            <p class="msg-info">5.1 min avarage time response</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Product Approved <span
                                                    class="msg-time float-end">2 hrs ago</span></h6>
                                            <p class="msg-info">Your new product has approved</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">New customer comments recived</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">Successfully shipped your item</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                    ago</span></h6>
                                            <p class="msg-info">24 new authors joined last week</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                    ago</span></h6>
                                            <p class="msg-info">45% less alerts last 4 weeks</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                    ago</span></h6>
                                            <p class="msg-info">The standard chunk of lorem</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                    sec ago</span></h6>
                                            <p class="msg-info">Many desktop publishing packages</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                                    ago</span></h6>
                                            <p class="msg-info">Various versions have evolved over</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                    min ago</span></h6>
                                            <p class="msg-info">Making this the first true generator</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                                    ago</span></h6>
                                            <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">The passage is attributed to an unknown</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">The point of using Lorem</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">It was popularised in the 1960s</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                                    ago</span></h6>
                                            <p class="msg-info">Various versions have evolved over</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                                    ago</span></h6>
                                            <p class="msg-info">If you are going to use a passage</p>
                                        </div>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('public/assets')}}/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                                    ago</span></h6>
                                            <p class="msg-info">All the Lorem Ipsum generators</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('public/assets')}}/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0"> {{ Auth::user()->name }}</p>
                        <p class="designattion mb-0">Web Designer</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="javascript:;"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
