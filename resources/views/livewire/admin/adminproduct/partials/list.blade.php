
<style type="text/css">
    .tb-product img {
        max-width: 50px; /* Limite la largeur de l'image */
        max-height: 50px; /* Limite la hauteur de l'image */
        object-fit: cover; /* Coupe l'image pour s'adapter */
        border-radius: 5px; /* Optionnel : arrondit légèrement les coins */
        margin-right: 10px; /* Ajoute un espace entre l'image et le texte */
    }
    
    </style>
    
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th><em class="tb-asterisk icon ni ni-star-round"></em></th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        @php
                            $images = json_decode($product->details->image_url, true); // Decode JSON into an array
                        @endphp
                        <tr>
                            <td class="nk-tb-col tb-col-sm">
                                <div class="user-card">
                                    <span class="tb-product">
                                        @if (count($images) > 0)
                                            <img src="{{ url($images[0]) }}" alt="{{ $product->title }}" class="thumb tb-product-img">
                                        @else
                                            <img src="{{ asset('path/to/default-image.jpg') }}" alt="No image" class="thumb tb-product-img">
                                        @endif
                                        <span class="title">{{ $product->title }}</span>
                                    </span>
                                </div>
                            </td>
                            
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick
                                                            View</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>View
                                                            Details</span></a></li>
                                                <li><a href="#"><em
                                                            class="icon ni ni-repeat"></em><span>Transaction</span></a>
                                                </li>
                                                <li><a href="#"><em
                                                            class="icon ni ni-activity-round"></em><span>Activities</span></a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#"><em
                                                            class="icon ni ni-shield-star"></em><span>Reset
                                                            Pass</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset
                                                            2FA</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend
                                                            User</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->
