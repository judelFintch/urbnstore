<!-- main @s -->
<div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap ">
        <!-- main header @s -->
        @include('livewire.admin.partials.header')
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Panel {{ config('app.name') }}</h3>
                                    <div class="nk-block-des text-soft">
                                        <p>Welcome {{ Auth::User()->name }}.</p>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                            data-bs-toggle="dropdown"><em
                                                                class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span
                                                                    class="d-none d-md-inline">Last</span> 30
                                                                Days</span><em
                                                                class="dd-indc icon ni ni-chevron-right"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><span>Last 30 Days</span></a>
                                                                </li>
                                                                <li><a href="#"><span>Last 6 Months</span></a>
                                                                </li>
                                                                <li><a href="#"><span>Last 1 Years</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nk-block-tools-opt"><a href="#"
                                                        class="btn btn-primary"><em
                                                            class="icon ni ni-reports"></em><span>Reports</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->

                        
                        <div class="nk-block">
                            <div class="row g-gs">
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card is-dark h-100">
                                        <div class="nk-ecwg nk-ecwg1">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Total Sales</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <a href="#" class="link">View Report</a>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="amount">$0</div>
                                                    <div class="info"><strong>$ 0</strong> in last month
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <h6 class="sub-title">This week so far</h6>
                                                    <div class="data-group">
                                                        <div class="amount">$0</div>
                                                        <div class="info text-end"><span
                                                                class="change up text-danger"><em
                                                                    class="icon ni ni-arrow-long-up"></em>4.63%</span><br><span>vs.
                                                                last week</span></div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="nk-ecwg1-ck">
                                                <canvas class="ecommerce-line-chart-s1" id="totalSales"></canvas>
                                            </div>
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card h-100">
                                        <div class="nk-ecwg nk-ecwg2">
                                            <div class="card-inner">
                                                <div class="card-title-group mt-n1">
                                                    <div class="card-title">
                                                        <h6 class="title">Averarge order</h6>
                                                    </div>
                                                    <div class="card-tools me-n1">
                                                        <div class="dropdown">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                                data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#" class="active"><span>15
                                                                                Days</span></a></li>
                                                                    <li><a href="#"><span>30 Days</span></a>
                                                                    </li>
                                                                    <li><a href="#"><span>3 Months</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="data-group">
                                                        <div class="amount">$ 0</div>
                                                        <div class="info text-end"><span
                                                                class="change up text-danger"><em
                                                                    class="icon ni ni-arrow-long-up"></em>0
                                                                %</span><br><span>vs.
                                                                last week</span></div>
                                                    </div>
                                                </div>
                                                <h6 class="sub-title">Orders over time</h6>
                                            </div><!-- .card-inner -->
                                            <div class="nk-ecwg2-ck">
                                                <canvas class="ecommerce-bar-chart-s1" id="averargeOrder"></canvas>
                                            </div>
                                        </div><!-- .nk-ecwg -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-xxl-4">
                                    <div class="row g-gs">
                                        <div class="col-xxl-12 col-md-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg3">
                                                    <div class="card-inner pb-0">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Orders</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">0</div>
                                                                <div class="info text-end"><span
                                                                        class="change up text-danger"><em
                                                                            class="icon ni ni-arrow-long-up"></em>4.63%</span><br><span>vs.
                                                                        last week</span></div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    <div class="nk-ecwg3-ck">
                                                        <canvas class="ecommerce-line-chart-s1"
                                                            id="totalOrders"></canvas>
                                                    </div>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-12 col-md-6">
                                            <div class="card">
                                                <div class="nk-ecwg nk-ecwg3">
                                                    <div class="card-inner pb-0">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Customers</h6>
                                                            </div>
                                                        </div>
                                                        <div class="data">
                                                            <div class="data-group">
                                                                <div class="amount">0</div>
                                                                <div class="info text-end"><span
                                                                        class="change up text-danger"><em
                                                                            class="icon ni ni-arrow-long-up"></em>0
                                                                        %</span><br><span>vs.
                                                                        last week</span></div>
                                                            </div>
                                                        </div>
                                                    </div><!-- .card-inner -->
                                                    <div class="nk-ecwg3-ck">
                                                        <canvas class="ecommerce-line-chart-s1"
                                                            id="totalCustomers"></canvas>
                                                    </div>
                                                </div><!-- .nk-ecwg -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .col -->
                                <div class="col-xxl-8">
                                    @include('livewire.admin.partials.admin-dashboard.recent-orders')
                                </div>
                                <div class="col-xxl-4 col-md-6">

                                    @include('livewire.admin.partials.admin-dashboard.top-product')
                                </div><!-- .col -->


                                <div class="col-xxl-3 col-md-6">
                                    <div class="card h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-2">
                                                <div class="card-title">
                                                    <h6 class="title">Store Statistics</h6>
                                                </div>
                                            </div>
                                            <ul class="nk-store-statistics">
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Orders</div>
                                                        <div class="count">0</div>
                                                    </div>
                                                    <em class="icon bg-primary-dim ni ni-bag"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Customers</div>
                                                        <div class="count">0</div>
                                                    </div>
                                                    <em class="icon bg-info-dim ni ni-users"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Products</div>
                                                        <div class="count">674</div>
                                                    </div>
                                                    <em class="icon bg-pink-dim ni ni-box"></em>
                                                </li>
                                                <li class="item">
                                                    <div class="info">
                                                        <div class="title">Categories</div>
                                                        <div class="count">68</div>
                                                    </div>
                                                    <em class="icon bg-purple-dim ni ni-server"></em>
                                                </li>
                                            </ul>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-xxl-5 col-lg-6">
                                    <div class="card card-full overflow-hidden">
                                        <div class="nk-ecwg nk-ecwg4 h-100">
                                            <div class="card-inner flex-grow-1">
                                                <div class="card-title-group mb-4">
                                                    <div class="card-title">
                                                        <h6 class="title">Traffic Sources</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <div class="dropdown">
                                                            <a href="#"
                                                                class="dropdown-toggle link link-light link-sm dropdown-indicator"
                                                                data-bs-toggle="dropdown">30 Days</a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>15 Days</span></a>
                                                                    </li>
                                                                    <li><a href="#" class="active"><span>30
                                                                                Days</span></a></li>
                                                                    <li><a href="#"><span>3 Months</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="data-group">
                                                    <div class="nk-ecwg4-ck">
                                                        <canvas class="ecommerce-doughnut-s1"
                                                            id="trafficSources"></canvas>
                                                    </div>
                                                    <ul class="nk-ecwg4-legends">
                                                        <li>
                                                            <div class="title">
                                                                <span class="dot dot-lg sq" data-bg="#0fac81"></span>
                                                                <span>Organic Search</span>
                                                            </div>
                                                            <div class="amount amount-xs">4,305</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">
                                                                <span class="dot dot-lg sq" data-bg="#e85347"></span>
                                                                <span>Social Media</span>
                                                            </div>
                                                            <div class="amount amount-xs">859</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">
                                                                <span class="dot dot-lg sq" data-bg="#ffa9ce"></span>
                                                                <span>Referrals</span>
                                                            </div>
                                                            <div class="amount amount-xs">482</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">
                                                                <span class="dot dot-lg sq" data-bg="#f9db7b"></span>
                                                                <span>Others</span>
                                                            </div>
                                                            <div class="amount amount-xs">138</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner card-inner-md bg-light">
                                                <div class="card-note">
                                                    <em class="icon ni ni-info-fill"></em>
                                                    <span>Traffic channels have beed generating the most traffics
                                                        over past
                                                        days.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .col -->
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="card h-100">
                                        <div class="nk-ecwg nk-ecwg5">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start pb-3 g-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Store Visitors</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help" data-bs-toggle="tooltip"
                                                            data-bs-placement="left" title="Users of this month"></em>
                                                    </div>
                                                </div>
                                                <div class="data-group">
                                                    <div class="data">
                                                        <div class="title">Monthly</div>
                                                        <div class="amount amount-sm">9.28K</div>
                                                        <div class="change up"><em
                                                                class="icon ni ni-arrow-long-up"></em>4.63%
                                                        </div>
                                                    </div>
                                                    <div class="data">
                                                        <div class="title">Weekly</div>
                                                        <div class="amount amount-sm">2.69K</div>
                                                        <div class="change down"><em
                                                                class="icon ni ni-arrow-long-down"></em>1.92%</div>
                                                    </div>
                                                    <div class="data">
                                                        <div class="title">Daily (Avg)</div>
                                                        <div class="amount amount-sm">0.94K</div>
                                                        <div class="change up"><em
                                                                class="icon ni ni-arrow-long-up"></em>3.45%
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-ecwg5-ck">
                                                    <canvas class="ecommerce-line-chart-s4"
                                                        id="storeVisitors"></canvas>
                                                </div>
                                                <div class="chart-label-group">
                                                    <div class="chart-label">01 Jul, 2020</div>
                                                    <div class="chart-label">30 Jul, 2020</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .card -->
                                </div>
                            </div><!-- .row -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
        {{-- Footer --}}
    </div>
</div>
