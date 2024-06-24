<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        {{-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png"
                            alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png"
                            alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png"
                            alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger text-white mr-3">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div>
        </div> --}}
    </form>
    <ul class="navbar-nav navbar-right">
        @php
            $notifications = \App\Models\OrderPlacedNotification::where('seen', 0)->latest()->take(6)->get();
            $unseenMessages = \App\Models\Livechat::where(['receiver_id' => auth()->user()->id, 'seen' => 0])->count();
        @endphp
        @if (auth()->user()->id === 1)
            <li class="dropdown dropdown-list-toggle"><a href="{{ route('admin.livechat.index') }}"
                    data-toggle="dropdown"
                    class="nav-link nav-link-lg message-notification {{ $unseenMessages > 0 ? 'beep' : '' }}"><i
                        class="far fa-envelope"></i></a>
                {{-- <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Kusnaedi</b>
                            <p>Hello, Bro!</p>
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Dedik Sugiharto</b>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Agung Ardiansyah</b>
                            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Ardian Rahardiansyah</b>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                            <div class="time">16 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                            <b>Alfa Zulkarnain</b>
                            <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div> --}}
            </li>
        @endif
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg notification-beep {{ count($notifications) > 0 ? 'beep' : '' }}"><i
                    class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="{{ route('admin.clear-notification') }}">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons realtime-notification">
                    @foreach ($notifications as $notification)
                        <a href="{{ route('admin.orders.show', $notification->order_id) }}" class="dropdown-item">
                            <div class="dropdown-item-icon bg-info text-white">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                {{ $notification->message }}
                                <div class="time">{{ date('h:i A | d-F-Y', strtotime($notification->created_at)) }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ route('admin.orders.index') }}">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(auth()->user()->image) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('admin.setting.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href=""
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                        class="fas fa-fire"></i>Dashboard</a>
            </li>
            <li class="menu-header">Features</li>

            <li
                class="dropdown {{ setSidebarActive([
                    'admin.slider.*',
                    'admin.benefit.*',
                    'admin.daily-offer.*',
                    'admin.menu-slider.*',
                    'admin.chef.*',
                    'admin.app-download.*',
                    'admin.testimonials.*',
                    'admin.counter.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-home"></i>
                    <span>Homepage Content</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>
                    <li class="{{ setSidebarActive(['admin.benefit.*']) }}"><a class="nav-link"
                            href="{{ route('admin.benefit.index') }}">Benefit of Choosing Us</a></li>
                    <li class="{{ setSidebarActive(['admin.daily-offer.*']) }}"><a class="nav-link"
                            href="{{ route('admin.daily-offer.index') }}">Daily Offer</a></li>
                    <li class="{{ setSidebarActive(['admin.menu-slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.menu-slider.index') }}">Menu Slider</a></li>
                    <li class="{{ setSidebarActive(['admin.chef.*']) }}"><a class="nav-link"
                            href="{{ route('admin.chef.index') }}">Chef</a></li>
                    <li class="{{ setSidebarActive(['admin.app-download.*']) }}"><a class="nav-link"
                            href="{{ route('admin.app-download') }}">App Download</a></li>
                    <li class="{{ setSidebarActive(['admin.testimonials.*']) }}"><a class="nav-link"
                            href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                    <li class="{{ setSidebarActive(['admin.counter.*']) }}"><a class="nav-link"
                            href="{{ route('admin.counter.index') }}">Counter</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setSidebarActive(['admin.product.*', 'admin.product-category.*', 'admin.product-review.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-utensils"></i>
                    <span>Manage Restaurant</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.product.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product.index') }}">Products</a></li>
                    <li class="{{ setSidebarActive(['admin.product-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product-category.index') }}">Product Categories</a>
                    <li class="{{ setSidebarActive(['admin.product-review.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product-review.index') }}">Product Reviews</a>
                    </li>
                </ul>
            </li>
            <li
                class="dropdown {{ setSidebarActive(['admin.coupon.*', 'admin.delivery-area.*', 'admin.payment-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-briefcase"></i>
                    <span>Manage Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.coupon.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupon.index') }}">Coupons</a></li>
                    <li class="{{ setSidebarActive(['admin.delivery-area.*']) }}"><a class="nav-link"
                            href="{{ route('admin.delivery-area.index') }}">Delivery Area</a>
                    <li class="{{ setSidebarActive(['admin.payment-settings.*']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-settings.index') }}">Payment Gateways</a>
                    </li>
            </li>
        </ul>
        <li
            class="dropdown {{ setSidebarActive(['admin.blog-category.*', 'admin.blogs.*', 'admin.blog.comments.*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i>
                <span>Blog</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.blog-category.*']) }}"><a class="nav-link"
                        href="{{ route('admin.blog-category.index') }}">Categories</a></li>
                <li class="{{ setSidebarActive(['admin.blogs.*']) }}"><a class="nav-link"
                        href="{{ route('admin.blogs.index') }}">All Blogs</a>
                <li class="{{ setSidebarActive(['admin.blog.comments.*']) }}"><a class="nav-link"
                        href="{{ route('admin.blog.comments.index') }}">Comments</a>
                </li>
            </ul>
        </li>
        <li
            class="dropdown {{ setSidebarActive(['admin.orders.*', 'admin.pending-orders.*', 'admin.in-process-orders.*', 'admin.delivered-orders.*', 'admin.declined-orders.*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-truck"></i>
                <span>Orders</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.orders.*']) }}"><a class="nav-link"
                        href="{{ route('admin.orders.index') }}">All Orders</a></li>
                <li class="{{ setSidebarActive(['admin.pending-orders.*']) }}"><a class="nav-link"
                        href="{{ route('admin.pending-orders.index') }}">Pending Orders</a>
                <li class="{{ setSidebarActive(['admin.in-process-orders.*']) }}"><a class="nav-link"
                        href="{{ route('admin.in-process-orders.index') }}">In Process Orders</a>
                <li class="{{ setSidebarActive(['admin.delivered-orders.*']) }}"><a class="nav-link"
                        href="{{ route('admin.delivered-orders.index') }}">Delivered Orders</a>
                <li class="{{ setSidebarActive(['admin.declined-orders.*']) }}"><a class="nav-link"
                        href="{{ route('admin.declined-orders.index') }}">Declined Orders</a>
                </li>
            </ul>
        </li>
        <li
            class="dropdown {{ setSidebarActive(['admin.about.index', 'admin.privacy-policy.index', 'admin.terms-condition.index', 'admin.contact.index']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Pages</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.about.index']) }}"><a class="nav-link"
                        href="{{ route('admin.about.index') }}">About</a></li>
                <li class="{{ setSidebarActive(['admin.privacy-policy.index']) }}"><a class="nav-link"
                        href="{{ route('admin.privacy-policy.index') }}">Privacy & Policy</a></li>
                <li class="{{ setSidebarActive(['admin.terms-condition.index']) }}"><a class="nav-link"
                        href="{{ route('admin.terms-condition.index') }}">Terms & Condition</a></li>
                <li class="{{ setSidebarActive(['admin.contact.index']) }}"><a class="nav-link"
                        href="{{ route('admin.contact.index') }}">Contacts</a></li>
            </ul>
        </li>
        <li class="dropdown {{ setSidebarActive(['admin.reservation.index', 'admin.reservation-time.*']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="far fa-address-book"></i>
                <span>Manage Reservation</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.reservation.index']) }}"><a class="nav-link"
                        href="{{ route('admin.reservation.index') }}">Reservation</a></li>
                <li class="{{ setSidebarActive(['admin.reservation-time.*']) }}"><a class="nav-link"
                        href="{{ route('admin.reservation-time.index') }}">Reservation Times</a></li>
            </ul>
        </li>
        @if (auth()->user()->id === 1)
            <li class="{{ setSidebarActive(['admin.livechat.index']) }}"><a class="nav-link"
                    href="{{ route('admin.livechat.index') }}"><i class="fas fa-headset"></i>
                    <span>Livechat</span></a></li>
        @endif
        <li class="{{ setSidebarActive(['admin.news-letter.index']) }}"><a class="nav-link"
                href="{{ route('admin.news-letter.index') }}"><i class="fas fa-newspaper"></i>
                <span>Newsletter</span></a></li>

        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link"
                href="{{ route('admin.social-link.index') }}"><i class="fas fa-share-alt"></i>
                <span>Social Links</span></a></li>

        <li class="{{ setSidebarActive(['admin.menu-builder.index']) }}"><a class="nav-link"
                href="{{ route('admin.menu-builder.index') }}"><i class="fas fa-bars"></i>
                <span>Menu Builder</span></a></li>
        <li class="{{ setSidebarActive(['admin.footer-info.index']) }}"><a class="nav-link"
                href="{{ route('admin.footer-info.index') }}"><i class="fas fa-window-minimize"></i>
                <span>Footer Info</span></a></li>
        <li class="{{ setSidebarActive(['admin.admin-management.*']) }}"><a class="nav-link"
                href="{{ route('admin.admin-management.index') }}"><i class="fas fa-users-cog"></i>
                <span>Admin Management</span></a></li>
        <li class="{{ setSidebarActive(['admin.setting.index']) }}"><a class="nav-link"
                href="{{ route('admin.setting.index') }}"><i class="fas fa-wrench"></i>
                <span>Settings</span></a></li>
        <li class="{{ setSidebarActive(['admin.reset-database.index*']) }}><a class="nav-link"
            href="{{ route('admin.reset-database.index') }}"><i class="fas fa-recycle"></i>
            <span>Reset Database</span></a>
        </li>

    </aside>
</div>
