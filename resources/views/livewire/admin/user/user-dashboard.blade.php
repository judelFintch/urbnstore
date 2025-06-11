<div>
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('livewire.admin.partials.header')
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @include('livewire.admin.user.partials.header')
                            @livewire('admin.user.partials.list-user')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
