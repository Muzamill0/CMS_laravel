<!doctype html>
<html lang="en">
@section('title', 'Dashboard')

    @include('layout.head')

    <body data-layout="horizontal" data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
           @include('layout.top-navbar')

           <div class="collapse show dash-content" id="dashtoggle">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Welcome {{ Auth::user()->name }}</h4>

                        </div>
                    </div>
                </div>

                <!-- start dash info -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card dash-header-box shadow-none border-0">
                            <div class="card-body p-0">
                                <div class="row row-cols-xxl-6 row-cols-md-3 row-cols-1 g-0">
                                    <div class="col">
                                        <div class="mt-md-0 py-3 px-4 mx-2">
                                            <p class="text-white-50 mb-2 text-truncate">Total Users</p>
                                            <h3 class="text-white mb-0">{{ $users }}</h3>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col">
                                        <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                            <p class="text-white-50 mb-2 text-truncate">Total Vahicles</p>
                                            <h3 class="text-white mb-0">{{ $vahicles }}</h3>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col">
                                        <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                            <p class="text-white-50 mb-2 text-truncate">Lead Coversation</p>
                                            <h3 class="text-white mb-0">32.89%</h3>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col">
                                        <div class="mt-3 mt-md-0 py-3 px-4 mx-2">
                                            <p class="text-white-50 mb-2 text-truncate">Sales Forecast</p>
                                            <h3 class="text-white mb-0">75.35%</h3>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col">
                                        <div class="mt-3 mt-lg-0 py-3 px-4 mx-2">
                                            <p class="text-white-50 mb-2 text-truncate">Daily Average Income</p>
                                            <h3 class="text-white mb-0">$1,596.5</h3>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col">
                                        <div class="mt-3 mt-lg-0 py-3 px-4 mx-2">
                                            <p class="text-white-50 mb-2 text-truncate">Annual Deals</p>
                                            <h3 class="text-white mb-0">2,659</h3>
                                        </div>
                                    </div><!-- end col -->

                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end dash info -->
            </div>
        </div>

          <!-- start dash troggle-icon -->
          <div>
            <a class="dash-troggle-icon" id="dash-troggle-icon" data-bs-toggle="collapse" href="#dashtoggle" aria-expanded="true" aria-controls="dashtoggle">
                <i class="bx bx-up-arrow-alt"></i>
            </a>
        </div>


        </header>


        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center p-3">

                <h5 class="m-0 me-2">Theme Customizer</h5>

                <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            @include('layout.settings')

        </div>
    </div>

    @include('layout.script')

    </body>

</html>
