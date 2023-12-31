<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->

        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse"
            id="horimenu-btn" data-bs-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div class="topnav">
            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle arrow-none" href="{{ route('dashboard') }}"
                                id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-home-circle icon"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-tone icon"></i>
                                <span data-key="t-elements">Users</span>
                                <div class="arrow-down"></div>
                            </a>

                            <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                aria-labelledby="topnav-uielement">
                                <div class="ps-2 p-lg-0">
                                    <div class="row g-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="{{ route('users') }}" class="dropdown-item"
                                                    data-key="t-alerts">All Users</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="{{ route('roles') }}" class="dropdown-item"
                                                    data-key="t-alerts">Roles</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="{{ route('permissions') }}" class="dropdown-item"
                                                    data-key="t-alerts">Permissions</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="{{ route('employees') }}" class="dropdown-item"
                                                    data-key="t-alerts">Employees</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="{{ route('attendances') }}" class="dropdown-item"
                                                    data-key="t-alerts">Attendance</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <a href="{{ route('designations') }}" class="dropdown-item"
                                                    data-key="t-alerts">Designations</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                role="button">
                                <i class="bx bx-customize icon"></i>
                                <span data-key="t-apps">Organization</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                <a href="{{ route('organizations') }}" class="dropdown-item" data-key="t-calendar">Organizations</a>
                                <a href="{{ route('projects') }}" class="dropdown-item" data-key="t-chat">Projects</a>
                                <a href="{{ route('vehicles') }}" class="dropdown-item" data-key="t-chat">Vahicles</a>
                                <a href="{{ route('vehicle.fuels') }}" class="dropdown-item" data-key="t-chat">Vahicle Fuel</a>
                                <a href="{{ route('vehicle.maintenance') }}" class="dropdown-item" data-key="t-chat">Vahicle Maintenance</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components"
                                role="button">
                                <i class="bx bx-layer icon"></i>
                                <span data-key="t-components">Sale & Purchase</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-components">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="{{ route('suppliers') }}">
                                        <span data-key="t-forms">Suppliers</span>
                                    </a>
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="{{ route('customers') }}">
                                        <span data-key="t-forms">Customers</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('purchases') }}">
                                        <span data-key="t-forms">Purchase Order</span>
                                    </a>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-table" role="button">
                                        <span data-key="t-tables">Tables</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                        <a href="tables-basic.html" class="dropdown-item"
                                            data-key="t-bootstrap-basic">Bootstrap Basic</a>
                                        <a href="tables-advanced.html" class="dropdown-item"
                                            data-key="t-advanced-tables">Advance Tables</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-charts" role="button">
                                        <span data-key="t-apex-charts">Apex Charts</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                        <a href="charts-line.html" class="dropdown-item" data-key="t-line">Line</a>
                                        <a href="charts-area.html" class="dropdown-item" data-key="t-area">Area</a>
                                        <a href="charts-column.html" class="dropdown-item"
                                            data-key="t-column">Column</a>
                                        <a href="charts-bar.html" class="dropdown-item" data-key="t-bar">Bar</a>
                                        <a href="charts-mixed.html" class="dropdown-item"
                                            data-key="t-mixed">Mixed</a>
                                        <a href="charts-timeline.html" class="dropdown-item"
                                            data-key="t-timeline">Timeline</a>
                                        <a href="charts-candlestick.html" class="dropdown-item"
                                            data-key="t-candlestick">Candlestick</a>
                                        <a href="charts-boxplot.html" class="dropdown-item"
                                            data-key="t-boxplot">Boxplot</a>
                                        <a href="charts-bubble.html" class="dropdown-item"
                                            data-key="t-bubble">Bubble</a>
                                        <a href="charts-scatter.html" class="dropdown-item"
                                            data-key="t-scatter">Scatter</a>
                                        <a href="charts-heatmap.html" class="dropdown-item"
                                            data-key="t-heatmap">Heatmap</a>
                                        <a href="charts-treemap.html" class="dropdown-item"
                                            data-key="t-treemap">Treemap</a>
                                        <a href="charts-pie.html" class="dropdown-item" data-key="t-pie">Pie</a>
                                        <a href="charts-radialbar.html" class="dropdown-item"
                                            data-key="t-radialbar">Radialbar</a>
                                        <a href="charts-radar.html" class="dropdown-item"
                                            data-key="t-radar">Radar</a>
                                        <a href="charts-polararea.html" class="dropdown-item"
                                            data-key="t-polararea">Polararea</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-icons" role="button">
                                        <span data-key="t-icons">Icons</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-icons">
                                        <a href="icons-unicons.html" class="dropdown-item"
                                            data-key="t-unicons">Unicons</a>
                                        <a href="icons-feathericons.html" class="dropdown-item"
                                            data-key="t-feather-icons">Feather icons</a>
                                        <a href="icons-boxicons.html" class="dropdown-item"
                                            data-key="t-boxicons">Boxicons</a>
                                        <a href="icons-materialdesign.html" class="dropdown-item"
                                            data-key="t-material-design">Material Design</a>
                                        <a href="icons-fontawesome.html" class="dropdown-item"
                                            data-key="t-font-awesome">Font Awesome 5</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-map" role="button">
                                        <span data-key="t-maps">Maps</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-map">
                                        <a href="maps-google.html" class="dropdown-item"
                                            data-key="t-google">Google</a>
                                        <a href="maps-vector.html" class="dropdown-item"
                                            data-key="t-vector">Vector</a>
                                        <a href="maps-leaflet.html" class="dropdown-item"
                                            data-key="t-leaflet">Leaflet</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more"
                                role="button">
                                <i class="bx bx-file icon"></i>
                                <span data-key="t-pages">Accounts</span>
                                <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-more">
                                <div class="dropdown">
                                    <a class="dropdown-item" href="{{ route('coa.index') }}">
                                        <span data-key="t-pricing">Chart Of Accounts</span>
                                    </a>
                                </div>

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-invoices" role="button">
                                        <span data-key="t-invoices">Invoices</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-invoices">
                                        <a href="invoices-list.html" class="dropdown-item"
                                            data-key="t-invoice-list">Invoice List</a>
                                        <a href="invoices-detail.html" class="dropdown-item"
                                            data-key="t-invoice-detail">Invoice Detail</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-timeline" role="button">
                                        <span data-key="t-timeline">Timeline</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-timeline">
                                        <a href="timeline-center.html" class="dropdown-item"
                                            data-key="t-center-view">Center View</a>
                                        <a href="timeline-left.html" class="dropdown-item"
                                            data-key="t-left-view">Left View</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-auth" role="button">
                                        <span data-key="t-authentication">Authentication</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-auth">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-auth-basic" role="button">
                                                <span data-key="t-basic">Basic</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-auth-basic">
                                                <a href="auth-signin-basic.html" class="dropdown-item"
                                                    data-key="t-signin">Sign In</a>
                                                <a href="auth-signup-basic.html" class="dropdown-item"
                                                    data-key="t-signup">Sign Up</a>
                                                <a href="auth-signout-basic.html" class="dropdown-item"
                                                    data-key="t-signout">Sign Out</a>
                                                <a href="auth-lockscreen-basic.html" class="dropdown-item"
                                                    data-key="t-lock-screen">Lock Screen</a>
                                                <a href="auth-forgotpassword-basic.html" class="dropdown-item"
                                                    data-key="t-forgot-password">Forgot Password</a>
                                                <a href="auth-resetpassword-basic.html" class="dropdown-item"
                                                    data-key="t-reset-password">Reset Password</a>
                                                <a href="auth-emailverification-basic.html" class="dropdown-item"
                                                    data-key="t-email-verification">Email Verification</a>
                                                <a href="auth-2step-basic.html" class="dropdown-item"
                                                    data-key="t-2step-verification">2-step Verification</a>
                                                <a href="auth-thankyou-basic.html" class="dropdown-item"
                                                    data-key="t-thankyou">Thank you</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-auth-cover" role="button">
                                                <span data-key="t-cover">Cover</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-auth-cover">
                                                <a href="auth-signin-cover.html" class="dropdown-item"
                                                    data-key="t-signin">Sign In</a>
                                                <a href="auth-signup-cover.html" class="dropdown-item"
                                                    data-key="t-signup">Sign Up</a>
                                                <a href="auth-signout-cover.html" class="dropdown-item"
                                                    data-key="t-signout">Sign Out</a>
                                                <a href="auth-lockscreen-cover.html" class="dropdown-item"
                                                    data-key="t-lock-screen">Lock Screen</a>
                                                <a href="auth-forgotpassword-cover.html" class="dropdown-item"
                                                    data-key="t-forgot-password">Forgot Password</a>
                                                <a href="auth-resetpassword-cover.html" class="dropdown-item"
                                                    data-key="t-reset-password">Reset Password</a>
                                                <a href="auth-emailverification-cover.html" class="dropdown-item"
                                                    data-key="t-email-verification">Email Verification</a>
                                                <a href="auth-2step-cover.html" class="dropdown-item"
                                                    data-key="t-2step-verification">2-step Verification</a>
                                                <a href="auth-thankyou-cover.html" class="dropdown-item"
                                                    data-key="t-thankyou">Thank you</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-error" role="button">
                                        <span data-key="t-error-pages">Error Pages</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-error">
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-404" role="button">
                                                <span>404</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-404">
                                                <a href="error-404-basic.html" class="dropdown-item"
                                                    data-key="t-basic">Basic</a>
                                                <a href="error-404-cover.html" class="dropdown-item"
                                                    data-key="t-cover">Cover</a>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                id="topnav-500" role="button">
                                                <span>500</span>
                                                <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-500">
                                                <a href="error-500-basic.html" class="dropdown-item"
                                                    data-key="t-basic">Basic</a>
                                                <a href="error-500-cover.html" class="dropdown-item"
                                                    data-key="t-cover">Cover</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-utility" role="button">
                                        <span data-key="t-utility">Utility</span>
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-utility">
                                        <a href="pages-starter.html" class="dropdown-item"
                                            data-key="t-starter-page">Starter Page</a>
                                        <a href="pages-profile.html" class="dropdown-item"
                                            data-key="t-profile">Profile</a>
                                        <a href="pages-maintenance.html" class="dropdown-item"
                                            data-key="t-maintenance">Maintenance</a>
                                        <a href="pages-comingsoon.html" class="dropdown-item"
                                            data-key="t-coming-soon">Coming Soon</a>
                                        <a href="pages-faqs.html" class="dropdown-item" data-key="t-faqs">FAQs</a>
                                    </div>
                                </div>

                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

    </div>

    <div class="d-flex">
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="bx bx-search icon-sm"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                <form class="p-2">
                    <div class="search-box">
                        <div class="position-relative">
                            <input type="text" class="form-control rounded bg-light border-0"
                                placeholder="Search...">
                            <i class="bx bx-search search-icon"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                <i class="bx bx-cog icon-sm"></i>
            </button>
        </div>

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item user text-start d-flex align-items-center"
                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                    <span class="user-name">{{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i></span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end pt-0">
                <a class="dropdown-item" href="#"><i
                        class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                        class="align-middle">Profile</span></a>
                <a class="dropdown-item" href="{{ route('logout') }}"><i
                        class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                        class="align-middle">Logout</span></a>
            </div>
        </div>
    </div>
</div>
