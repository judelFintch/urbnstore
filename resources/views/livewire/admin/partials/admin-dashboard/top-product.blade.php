<div class="card h-100">
    <div class="card-inner">
        <div class="card-title-group mb-2">
            <div class="card-title">
                <h6 class="title">Top products</h6>
            </div>
            <div class="card-tools">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle link link-light link-sm dropdown-indicator"
                        data-bs-toggle="dropdown">Weekly</a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><span>Daily</span></a></li>
                            <li><a href="#" class="active"><span>Weekly</span></a>
                            </li>
                            <li><a href="#"><span>Monthly</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <ul class="nk-top-products">
            @foreach ($products as $product)
                <li class="item">
                    <div class="thumb">
                        <img src="{{ $product->getFirstImageUrl() }}" alt=" {{ $product['title'] }}" loading="lazy">
                    </div>
                    <div class="info">
                        <div class="title">{{ $product->title }}</div>
                        <div class="price">$ {{ $product->price }}</div>
                    </div>
                    
                </li>
            @endforeach
        </ul>
    </div><!-- .card-inner -->
</div><!-- .card -->
