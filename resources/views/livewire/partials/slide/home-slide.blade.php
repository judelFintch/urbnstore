<div>
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                <!-- Génération dynamique des slides -->
                @foreach ($sliders as $slider)
                    <div class="item-slick1 bg-overlay1"
                        style="background-image: url('{{ Storage::url($slider->image) }}');"
                        data-thumb="{{ Storage::url($slider->image) }}" data-caption="{{ $slider->caption }}">

                        <div class="container h-full">
                            <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                                <!-- Caption -->
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-202 txt-center cl0 respon2">
                                        {{ $slider->caption }}
                                    </span>
                                </div>

                                <!-- Title -->
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                        {{ $slider->name }}
                                    </h2>
                                </div>

                                <!-- Button -->
                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{ $slider->link }}"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                        {{ $slider->link }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="wrap-slick1-dots p-lr-10"></div>
        </div>
    </section>
</div>