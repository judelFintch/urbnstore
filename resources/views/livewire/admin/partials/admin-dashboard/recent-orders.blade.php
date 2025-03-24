<div class="card card-full">
    <div class="card-inner">
        <div class="card-title-group">
            <div class="card-title">
                <h6 class="title">Recent Orders</h6>
            </div>
        </div>
    </div>
    <div class="nk-tb-list mt-n2">
        <div class="nk-tb-item nk-tb-head">
            <div class="nk-tb-col"><span>Order No.</span></div>
            <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
            <div class="nk-tb-col tb-col-md"><span>Date</span></div>
            <div class="nk-tb-col"><span>Amount</span></div>
            <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span>
            </div>
        </div>

        @foreach ($lastOrders as $order)
            <div class="nk-tb-item">
                <div class="nk-tb-col">
                    <span class="tb-lead">
                        <a href="#">#{{ $order->id }}</a>
                    </span>
                </div>

                <div class="nk-tb-col tb-col-sm">
                    <div class="user-card">
                        <div class="user-avatar sm bg-purple-dim">
                            <span>
                                {{ strtoupper(substr($order->name ?? '??', 0, 1)) }}
                                {{ strtoupper(substr($order->name ?? '??', strpos($order->name ?? '', ' ') + 1, 1)) }}
                            </span>

                        </div>
                        <div class="user-name">
                            <span class="tb-lead">{{ $order->name ?? 'Client inconnu' }}</span>
                        </div>
                    </div>
                </div>

                <div class="nk-tb-col tb-col-md">
                    <span class="tb-sub">{{ $order->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="nk-tb-col">
                    <span class="tb-sub tb-amount">
                        <span>USD</span></span>
                </div>

                <div class="nk-tb-col">
                    @php
                        $status = strtolower($order->status);
                        $badgeClass = match ($status) {
                            'paid' => 'bg-success',
                            'canceled' => 'bg-danger',
                            'due' => 'bg-warning',
                            default => 'bg-secondary',
                        };
                    @endphp
                    <span class="badge badge-dot badge-dot-xs {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div><!-- .card -->
