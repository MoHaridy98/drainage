<div class="navbar-bg">
</div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <ul class="navbar-nav navbar-left">
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">
                    * </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-left pullDown">
                <div class="dropdown-header">
                    اشعارات
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">John
                                Deo</span>
                            <span class="time messege-text">Please check your mail !!</span>
                            <span class="time">2 Min Ago</span>
                        </span>
                    </a>
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span> <span class="time messege-text">Request for leave
                                application</span>
                            <span class="time">5 Min Ago</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">عرض الكل <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> --}}
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                    class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-left pullDown">
                <div class="dropdown-title"> {{ Auth::user()->name }} : مرحبا</div>
                <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                    الإعدادات
                </a>
                <div class="dropdown-divider"></div>

                <div>
                    <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i>
                        {{ __('تسجيل خروج') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
    </ul>

    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar"
                    class="nav-link nav-link-lg
                            collapse-btn">
                    <i data-feather="align-justify"></i></a>
            </li>

        </ul>
    </div>

</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}" style="letter-spacing: initial"> <img alt="image" src="assets/img/logo.png"
                    class="header-logo" />
                <span class="logo-name">متابعة المشاريع</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">القائمة الرئيسية</li>
            <li class="dropdown active">
                <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i data-feather="monitor"></i></a>
            </li>
            <li class="menu-header"></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span>الهيئة العامة للصرف</span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('sewage') }}"> اضافة مشروع</a></li>
                    <li><a class="nav-link" href="{{ route('sewage.list') }}"> كل المشاريع</a></li>
                </ul>
            </li>
            <li class="menu-header"></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span>مدرية المساحة</span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="{{ route('space') }}">مراجعة مشروع</a></li> --}}
                    <li><a class="nav-link" href="{{ route('space.list') }}"> كل المشاريع</a></li>
                </ul>
            </li>
            <li class="menu-header"></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span>مدرية الزراعــة</span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('agr.list') }}">جمعيات زراعية</a></li>
                    <li><a class="nav-link" href="{{ route('agr.farmer') }}">مزارعين</a></li>
                </ul>
            </li>
            <li class="menu-header"></li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span> الضرائـب العقاريــة</span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="{{ route('taxes') }}">اضافة مستحق </a></li> --}}
                    <li><a class="nav-link" href="{{ route('taxes.list') }}"> كل المستحقات</a></li>
                </ul>
            </li>
            <li class="menu-header"></li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span> تقارير المشرعات</span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">

                    @if (auth()->user()->hasRole('super_admin'))
                        @can('report')
                            <li><a class="nav-link" href="{{ route('report') }}">تقرير مفصل</a></li>
                        @endcan
                        @can('all-report')
                            <li><a class="nav-link" href="{{ route('all.report_project') }}">تقرير مجمع</a></li>
                        @endcan
                        @endif
                </ul>
            </li>
            <li class="menu-header"></li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span>الإعدادات</span>
                    <i data-feather="briefcase"></i></a>
                <ul class="dropdown-menu">
                    
                    <li><a class="nav-link" href="{{ route('Users') }}">  مستخدميين</a></li>

                    <li><a class="nav-link" href="{{ route('Roles') }}">اضافة اذونات</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
