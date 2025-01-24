<div>


    <h4 class="stext-301 cl0 p-b-30">Newsletter</h4>

    <form wire:submit.prevent="subscribe">
        @csrf
        <div class="wrap-input1 w-full p-b-4">
            <input class="input1 bg-none plh1 stext-107 cl7" type="email" wire:model="email" placeholder="Votre e-mail">
            <div class="focus-input1 trans-04"></div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="p-t-18">
            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                S'abonner
            </button>
        </div>
        @if (session()->has('success'))
            <div class="text-success mt-2">{{ session('success') }}</div>
        @endif
    </form>
</div>


</div>