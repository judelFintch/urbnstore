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
                        @include('livewire.admin.partials.homeDashboard.header')
                        <div class="nk-block">
                            <div class="row g-gs">
                                @livewire('admin.components.dashboard.total-sales')
                                @livewire('admin.components.dashboard.average-order')
                                @livewire('admin.components.dashboard.orders-customers')
                                
                                <div class="col-xxl-8">
                                    @include('livewire.admin.partials.admin-dashboard.recent-orders')
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    @include('livewire.admin.partials.admin-dashboard.top-product')
                                </div><!-- .col -->

                                @livewire('admin.components.dashboard.store-statistics')
                                @livewire('admin.components.dashboard.traffic-sources')
                                @livewire('admin.components.dashboard.store-visitors')
                            </div><!-- .row -->
                        </div><!-- .nk-block -->
                    </div>
                </div>
            </div>
        </div>
        {{-- Footer --}}
    </div>
</div>
