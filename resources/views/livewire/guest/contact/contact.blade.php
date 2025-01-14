<div>
    <!-- Titre de la page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            {{ $contact['title'] }}
        </h2>
    </section>

    <!-- Contenu de la page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                     <form wire:submit.prevent="submit">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            {{ $contact['subtitle'] }}
                        </h4>

                        <!-- Email -->
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" 
                                   type="email" 
                                   wire:model="email" 
                                   placeholder="Your Email Address">
                            <img class="how-pos4 pointer-none" src="{{ asset('images/icons/icon-email.png') }}" alt="ICON">
                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Message -->
                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" 
                                      wire:model="msg" 
                                      placeholder="How Can We Help?"></textarea>
                            @error('msg') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>

                    @if (session()->has('success'))
                        <div class="alert alert-success mt-4">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Adresse
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                {{ $contact['address'] }}
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Parlons
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                {{ $contact['phone'] }}
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Support de vente
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                {{ $contact['email'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Carte -->
    <div class="map">
        <div class="size-303" id="google_map" 
            data-map-x="{{ $contact['map']['x'] }}" 
            data-map-y="{{ $contact['map']['y'] }}" 
            data-pin="{{ asset($contact['map']['pin']) }}" 
            data-scrollwheel="{{ $contact['map']['scrollwheel'] ? '1' : '0' }}" 
            data-draggable="{{ $contact['map']['draggable'] ? '1' : '0' }}" 
            data-zoom="{{ $contact['map']['zoom'] }}">
        </div>
    </div>
</div>
