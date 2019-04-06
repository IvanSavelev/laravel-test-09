@extends('admin.admin')
@section('content_basis')
<div class="o-page">
    <div class="o-page__sidebar js-page-sidebar">
        <aside class="c-sidebar">
            <div class="c-sidebar__brand">
                <a href="#"><img src="/_admin/img/logo.svg" alt="Neat"></a>
            </div>

            <!-- Scrollable -->
            <div class="c-sidebar__body">
                <span class="c-sidebar__title">Dashboards</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="{{ route ('admin.product.list')}}">
                            <i class="c-sidebar__icon feather icon-home"></i>Dashboard 1
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="dashboard02.html">
                            <i class="c-sidebar__icon feather icon-bar-chart-2"></i>Dashboard 2
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link is-active" href="dashboard03.html">
                            <i class="c-sidebar__icon feather icon-pie-chart"></i>Dashboard 3
                        </a>
                    </li>
                </ul>

                <span class="c-sidebar__title">General</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="pipeline.html">
                            <i class="c-sidebar__icon feather icon-move"></i>Pipeline
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="calendar.html">
                            <i class="c-sidebar__icon feather icon-calendar"></i>Calendar
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="members.html">
                            <i class="c-sidebar__icon feather icon-users"></i>Members
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="invoice.html">
                            <i class="c-sidebar__icon feather icon-file-text"></i>Single Invoice
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="user-profile.html">
                            <i class="c-sidebar__icon feather icon-user"></i>User
                        </a>

                        <!-- Always visible submenu -->
                        <ul class="c-sidebar__list">
                            <li><a class="c-sidebar__link" href="index.html">Onboard</a></li>
                            <li><a class="c-sidebar__link" href="account-settings.html">Account Settings</a></li>
                            <li><a class="c-sidebar__link" href="signup.html">Sign Up</a></li>
                            <li><a class="c-sidebar__link" href="signin.html">Sign In</a></li>
                            <li><a class="c-sidebar__link" href="reset-password.html">Reset Password</a></li>
                            <li><a class="c-sidebar__link" href="forgot-password.html">Forgot Password</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="pricing.html">
                            <i class="c-sidebar__icon feather icon-tag"></i>Pricing
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="faq.html">
                            <i class="c-sidebar__icon feather icon-info"></i>FAQ
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="404.html">
                            <i class="c-sidebar__icon feather icon-anchor"></i>404
                        </a>
                    </li>

                    <li class="c-sidebar__item has-submenu">
                        <a class="c-sidebar__link" data-toggle="collapse" href="#sidebar-submenu" aria-expanded="false" aria-controls="sidebar-submenu">
                            <i class="c-sidebar__icon feather icon-hash"></i>Sub Menu
                        </a>

                        <div>
                            <ul class="c-sidebar__list collapse" id="sidebar-submenu">
                                <li><a class="c-sidebar__link" href="#">Submenu link</a></li>
                                <li><a class="c-sidebar__link" href="#">Submenu link</a></li>
                                <li><a class="c-sidebar__link" href="#">Submenu link</a></li>
                            </ul>
                        </div>

                    </li>
                </ul>

                <span class="c-sidebar__title">Neat</span>
                <ul class="c-sidebar__list">
                    <li>
                        <a class="c-sidebar__link" href="ui-kit.html">
                            <i class="c-sidebar__icon feather icon-layers"></i>UI Kit
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="https://zawiastudio.com/neat/docs/">
                            <i class="c-sidebar__icon feather icon-book"></i>Documentation
                        </a>
                    </li>
                    <li>
                        <a class="c-sidebar__link" href="https://zawiastudio.com/neat/changelog/">
                            <i class="c-sidebar__icon feather icon-anchor"></i>Changelog
                        </a>
                    </li>
                </ul>
            </div>


            <a class="c-sidebar__footer" href="#">
                Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
            </a>
        </aside>
    </div>

    <main class="o-page__content">
        <header class="c-navbar u-mb-medium">
            <button class="c-sidebar-toggle js-sidebar-toggle">
                <i class="feather icon-align-left"></i>
            </button>

            <h2 class="c-navbar__title">My Dashboard</h2>

            <div class="c-dropdown dropdown u-mr-small">
                <div class="c-notification dropdown-toggle" id="dropdownMenuToggle1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <i class="c-notification__icon feather icon-message-circle"></i>
                </div>

                <div class="c-dropdown__menu c-dropdown__menu--large has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuToggle1">

              <span class="c-dropdown__menu-header">
                Mentions
              </span>
                    <a class="c-dropdown__item dropdown-item" href="#">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                    </span>
                            </div>

                            <div class="o-media__body">
                                <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                            </div>
                        </div>
                    </a>

                    <a class="c-dropdown__item dropdown-item" href="#">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                    </span>
                            </div>

                            <div class="o-media__body">
                                <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                            </div>
                        </div>
                    </a>

                    <a class="c-dropdown__item dropdown-item" href="#">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                    </span>
                            </div>

                            <div class="o-media__body">
                                <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                            </div>
                        </div>
                    </a>

                    <a class="c-dropdown__menu-footer">
                        All Mentions
                    </a>
                </div>
            </div>

            <div class="c-dropdown dropdown u-mr-medium">
                <div class="c-notification has-indicator dropdown-toggle" id="dropdownMenuToggle2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <i class="c-notification__icon feather icon-bell"></i>
                </div>

                <div class="c-dropdown__menu c-dropdown__menu--large has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuToggle2">

              <span class="c-dropdown__menu-header">
                Notifications
              </span>
                    <a class="c-dropdown__item dropdown-item" href="#">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                                <span class="c-icon c-icon--info c-icon--xsmall"><i class="feather icon-globe"></i></span>
                            </div>

                            <div class="o-media__body">
                                <p>We've updated the Stripe Services agreement and its supporting terms. Your continueduse of Stripe's services.</p>
                            </div>
                        </div>
                    </a>

                    <a class="c-dropdown__item dropdown-item" href="#">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                                <span class="c-icon c-icon--danger c-icon--xsmall"><i class="feather icon-x"></i></span>
                            </div>

                            <div class="o-media__body">
                                <p>We've updated the Stripe Services agreement and its supporting terms. Your continueduse of Stripe's services.</p>
                            </div>
                        </div>
                    </a>

                    <a class="c-dropdown__item dropdown-item" href="#">
                        <div class="o-media">
                            <div class="o-media__img u-mr-xsmall">
                                <span class="c-icon c-icon--success c-icon--xsmall"><i class="feather icon-anchor"></i></span>
                            </div>

                            <div class="o-media__body">
                                <p>We've updated the Stripe Services agreement and its supporting terms. Your continueduse of Stripe's services.</p>
                            </div>
                        </div>
                    </a>

                    <a class="c-dropdown__menu-footer">
                        All Notifications
                    </a>
                </div>
            </div>

            <div class="c-dropdown dropdown">
                <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                </div>

                <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
                    <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
                    <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Log out</a>
                </div>
            </div>
            <input type="hidden" name="object_id" id="object_id" value="@yield('object_id')">
            <input type="hidden" name="object_type" id="object_type" value="@yield('object_type')">
        </header>

        <div class="container">
            @yield('content')
        </div>
    </main>
</div>
@endsection

@section('script_down')
@yield('script_down')
@endsection