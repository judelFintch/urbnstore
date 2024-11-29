<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table" data-export-title="Export">
                <thead>
                    <tr>
                        <th>Name</th>
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
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td></td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->
