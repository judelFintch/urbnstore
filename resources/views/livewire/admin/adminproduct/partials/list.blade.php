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
                            $images = json_decode($product->details->image_url, true ?? ''); // Decode JSON into an array
                        @endphp
                        <tr>
                            <td class="nk-tb-col tb-col-sm">
                                <div class="user-card">
                                    <span class="tb-product">
                                        @if (count($images) > 0)
                                            <img src="{{ url($images[0]) }}" alt="{{ $product->title }}"
                                                class="thumb tb-product-img">
                                        @else
                                            <img src="{{ asset('path/to/default-image.jpg') }}" alt="No image"
                                                class="thumb tb-product-img">
                                        @endif
                                        <span class="title">{{ $product->title }}</span>
                                    </span>
                                </div>
                            </td>

                            <td>
                                <div class="nk-tb-col tb-col-md">
                                    <div class="asterisk tb-asterisk">
                                        <a href="#"><em class="asterisk-off icon ni ni-star"></em><em
                                                class="asterisk-on icon ni ni-star-fill"></em></a>
                                    </div>
                                </div>
                            </td>
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
                                                <li>
                                                    <a wire.click.prevent="edit('{{ $product->id}}')" href="#"><em class="icon ni ni-edit"></em><span>Edit  Product</span></a>
                                                </li>
                                                <li><a href="{{ route('admin.products.details', $product->id) }}"><em
                                                            class="icon ni ni-eye"></em><span>View
                                                            Product</span></a></li>
                                                <li><a href="#"><em
                                                            class="icon ni ni-activity-round"></em><span>Product
                                                            Orders</span></a></li>
                                                <li><a wire:click.prevent="confirmDeleteProduct({{ $product->id }})" href=""><em
                                                            class="icon ni ni-trash"></em><span>Remove
                                                            Product</span></a></li>
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
        <x-delete-confirmation :productToDelete="$product->id" />


        <!-- /. a mettre dans un composant?/ -->
    </div><!-- .card-preview -->
</div> <!-- nk-block -->
