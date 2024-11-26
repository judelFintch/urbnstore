<div>
    @include('livewire.admin.partials.sidebar')
    @include('livewire.admin.partials.header')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    @include('livewire.admin.adminproduct.partials.header')
                    @include('livewire.admin.adminproduct.partials.list')
                    @include('livewire.admin.adminproduct.partials.create')
                </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.partials.footer')
</div>
