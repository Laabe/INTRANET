<div class="sticky is-expanded" style="margin-bottom: -74px;">
    <div class="app-sidebar__overlay active" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar open ps ps--active-y">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo-dark.svg') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/logo/logo-dark.svg') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('assets/logo/logo-dark.svg') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets/logo/logo-dark.svg') }}" class="header-brand-img light-logo1" alt="logo">
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu is-expanded">
            <div class="slide-left disabled active is-expanded d-none" id="slide-left"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="side-menu open" style="margin-right: 0px; margin-left: 0px;">
                <li>
                    <h3>Menu</h3>
                </li>
                {{-- Dashboard --}}
                <li class="slide">
                    <a class="side-menu__item has-link {{ Request::routeIs('home') ? 'active' : '' }}"
                        data-bs-toggle="slide" href="{{ route('home') }}">
                        <i class="side-menu__icon icon icon-home"></i>
                        <span class="side-menu__label">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                {{-- User Management --}}
                @if (auth()->user()->can('User Management') ||
                        auth()->user()->getRoleNames()->contains('Admin'))
                    <li
                        class="slide {{ request()->routeIs('user-management.users', 'roles.*', 'permissions.*') ? ' is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('roles.*', 'permissions.*') ? ' is-expanded active' : '' }}"
                            data-bs-toggle="slide" href="#">
                            <i class="side-menu__icon icon icon-grid"></i>
                            <span class="side-menu__label">{{ __('User Management') }}</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="side-menu-label1">
                                <a href="javascript:void(0)">{{ __('>User Management') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('user-management.users') }}"
                                    class="slide-item {{ Request::routeIs('user-management.users') ? 'active' : '' }}">{{ __('Users') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('roles.index') }}"
                                    class="slide-item {{ Request::routeIs('roles.*') ? 'active' : '' }}">{{ __('Roles') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('permissions.index') }}"
                                    class="slide-item {{ Request::routeIs('permissions.*') ? 'active' : '' }}">{{ __('Permissions') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- Employees --}}
                @if (auth()->user()->can('Employee Management') ||
                        auth()->user()->getRoleNames()->contains('Admin', 'HR'))
                    <li
                    class="slide {{ request()->routeIs('users.*') ? ' is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->routeIs('users.*') ? ' is-expanded active' : '' }}"
                        data-bs-toggle="slide" href="#">
                        <i class="side-menu__icon icon icon-people"></i>
                        <span class="side-menu__label">{{ __('Employee Management') }}</span><i
                            class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">{{ __('>Employee Management') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="slide-item {{ Request::routeIs('users.index') ? 'active' : '' }}">{{ __('Employees') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('users.inject-holidays') }}"
                                class="slide-item {{ Request::routeIs('users.inject-holidays') ? 'active' : '' }}">{{ __('Holidays Injection') }}</a>
                        </li>
                    </ul
                @endif

                {{-- Team Management --}}
                @if (auth()->user()->can('Team Management') ||
                        auth()->user()->getRoleNames()->contains('Admin'))
                    <li class="slide">
                        <a class="side-menu__item has-link {{ Request::routeIs('teams.*') ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ route('teams.index') }}">
                            <i class="side-menu__icon icon icon-organization"></i>
                            <span class="side-menu__label">{{ __('Teams') }}</span>
                        </a>
                    </li>
                @endif

                {{-- Scenario Management --}}
                @if (auth()->user()->can('Scenario Management') ||
                        auth()->user()->getRoleNames()->contains('Admin'))
                    <li class="slide">
                        <a class="side-menu__item has-link {{ Request::routeIs('scenarios.*') ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ route('scenarios.index') }}">
                            <i class="side-menu__icon icon icon-equalizer"></i>
                            <span class="side-menu__label">{{ __('Scenarios') }}</span>
                        </a>
                    </li>
                @endif

                {{-- Leave requests --}}
                <li class="slide {{ request()->routeIs('leave-requests.*') ? ' is-expanded' : '' }}">
                    <a class="side-menu__item {{ request()->routeIs('leave-requests.*') ? ' is-expanded active' : '' }}"
                        data-bs-toggle="slide" href="#">
                        <i class="side-menu__icon icon icon-paper-plane"></i>
                        <span class="side-menu__label">{{ __('Leave requests') }}</span><i
                            class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a class="slide-item {{ Request::routeIs('leave-requests.my-leave-requests') ? 'active' : '' }}"
                                href="{{ route('leave-requests.my-leave-requests') }}">{{ __('My leave requests') }}
                            </a>
                        </li>
                        <li>
                            <a class="slide-item {{ Request::routeIs('leave-requests.balance-tracker') ? 'active' : '' }}"
                                href="{{ route('leave-requests.balance-tracker') }}">{{ __('Balance tracker') }}
                            </a>
                        </li>
                        @if (auth()->user()->can('Leave Request Management'))
                            <li>
                                <a class="slide-item {{ Request::routeIs('leave-requests.index') ? 'active' : '' }}"
                                    href="{{ route('leave-requests.index') }}">{{ __('Leave requests') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('leave-requests.history') ? 'active' : '' }}"
                                    href="{{ route('leave-requests.history') }}">{{ __('Leave requests History') }}
                                </a>
                            </li>
                        @endif
                        @role('WFM')
                            <li>
                                <a class="slide-item {{ Request::routeIs('leave-requests.consulte') ? 'active' : '' }}"
                                    href="{{ route('leave-requests.consulte') }}">{{ __('Leave requests WFM') }}
                                </a>
                            </li>
                        @endrole
                    </ul>
                </li>

                {{-- Settings Management --}}
                @if (auth()->user()->can('Settings Management') ||
                        auth()->user()->getRoleNames()->contains('Admin'))
                    <li
                        class="slide {{ request()->routeIs('leave-types.*', 'languages.*', 'profiles.*', 'departments.*', 'projects.*', 'recrutment-platformes.*') ? ' is-expanded' : '' }}">
                        <a class="side-menu__item {{ request()->routeIs('languages.*') ? ' is-expanded active' : '' }}"
                            data-bs-toggle="slide" href="#">
                            <i class="side-menu__icon icon icon-settings"></i>
                            <span class="side-menu__label">{{ __('Settings') }}</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li>
                                <a class="slide-item {{ Request::routeIs('profiles.*') ? 'active' : '' }}"
                                    href="{{ route('profiles.index') }}">{{ __('Profiles') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('languages.*') ? 'active' : '' }}"
                                    href="{{ route('languages.index') }}">{{ __('Languages') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('departments.*') ? 'active' : '' }}"
                                    href="{{ route('departments.index') }}">{{ __('Departments') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('projects.*') ? 'active' : '' }}"
                                    href="{{ route('projects.index') }}">{{ __('Projects') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('recrutment-platformes.*') ? 'active' : '' }}"
                                    href="{{ route('recrutment-platformes.index') }}">{{ __('Recrutment platformes') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('leave-types.*') ? 'active' : '' }}"
                                    href="{{ route('leave-types.index') }}">{{ __('Leave types') }}
                                </a>
                            </li>
                            <li>
                                <a class="slide-item {{ Request::routeIs('award-badges.*') ? 'active' : '' }}"
                                    href="{{ route('award-badges.index') }}">{{ __('Award Badges') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                {{-- End Sidebar --}}
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg>
            </div>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 748px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 635px;"></div>
        </div>
    </div>
</div>
