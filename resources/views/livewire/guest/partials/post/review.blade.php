<div>
    <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
            <div class="p-b-30 m-lr-15-sm">
                @foreach ($reviews as $review)
                    <div class="flex-w flex-t p-b-68">
                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                            <img src="{{ asset('images/icons/user.png') }}" alt="Avatar">
                        </div>
                        <div class="size-207">
                            <div class="flex-w flex-sb-m p-b-17">
                                <span class="mtext-107 cl2 p-r-20">
                                    {{ $review->name }}
                                </span>
                                <span class="fs-18 cl11">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="zmdi {{ $i <= $review->rating ? 'zmdi-star' : 'zmdi-star-outline' }}"></i>
                                    @endfor
                                </span>
                                @error('rating')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ajouter un avis -->
            <form wire:submit.prevent="submit" class="w-full">
                <h5 class="mtext-108 cl2 p-b-7">
                    Ajouter un avis
                </h5>

                <p class="stext-102 cl6">
                    Votre adresse e-mail ne sera pas publiée. *
                </p>

                <div class="flex-w flex-m p-t-50 p-b-23">
                    <span class="stext-102 cl3 m-r-16">Votre note</span>
                    <span class="wrap-rating fs-18 cl11 pointer">
                        @for ($i = 1; $i <= 5; $i++)
                            <i wire:click="$set('rating', {{ $i }})"
                                class="item-rating pointer zmdi {{ $i <= $rating ? 'zmdi-star' : 'zmdi-star-outline' }}"></i>
                        @endfor
                    </span>
                </div>

                <div class="row p-b-25">
                    <div class="col-12 p-b-5">
                        <label class="stext-102 cl3" for="review">Votre avis</label>
                        <textarea wire:model="content" class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"></textarea>
                    </div>

                    <div class="col-sm-6 p-b-5">
                        <label class="stext-102 cl3" for="name">Nom</label>
                        <input wire:model="name" class="size-111 bor8 stext-102 cl2 p-lr-20" type="text">
                    </div>

                    <div class="col-sm-6 p-b-5">
                        <label class="stext-102 cl3" for="email">E-mail</label>
                        <input wire:model="email" class="size-111 bor8 stext-102 cl2 p-lr-20" type="email">
                    </div>
                </div>

                <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                    Soumettre
                </button>
            </form>
        </div>
    </div>
</div>