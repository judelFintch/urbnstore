<!-- Banner -->
<div class="sec-banner bg0">
    <div class="flex-w flex-c-m">
        @foreach ($banners as $banner)
            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{Storage::url($banner->photo) ?? 'default_image.jpg' }}" alt="IMG-BANNER">

                    <a href="{{ route('home.shop', ['id' => $banner->id, 'slug' => $banner->slug]) }}"
                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                {{ $banner->name }}
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                {{ $banner->description }}
                            </span>
                        </div>
                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                {{ $banner->link }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach



    </div>
</div>