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
                            <div>
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list">
                                                    <!-- Table Head -->
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div
                                                                class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="selectAll">
                                                                <label class="custom-control-label"
                                                                    for="selectAll"></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm"><span>Id</span></div>
                                                        <div class="nk-tb-col"><span>Email</span></div>
                                                        <div class="nk-tb-col"><span>Message</span></div>
                                                        <div class="nk-tb-col"><span>Date</span></div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                                <li class="me-n1">
                                                                    <div class="dropdown">
                                                                        <a href="#"
                                                                            class="dropdown-toggle btn btn-icon btn-trigger"
                                                                            data-bs-toggle="dropdown">
                                                                            <em class="icon ni ni-more-h"></em>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="#"><em
                                                                                            class="icon ni ni-edit"></em><span>Edit
                                                                                            Selected</span></a></li>
                                                                                <li><a href="#"><em
                                                                                            class="icon ni ni-trash"></em><span>Remove
                                                                                            Selected</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- Loop through categories -->
                                                    @foreach ($messages as $message)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div
                                                                    class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="">
                                                                    <label class="custom-control-label"
                                                                        for=""></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span class="tb-lead">{{ $message->id }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-sub">{{ $message->email }}</span>
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <span class="tb-status "">
                                                                    {{ $message->message }}
                                                                </span>
                                                            </div>

                                                            <div class="nk-tb-col">
                                                                <span class="tb-status "">
                                                                    {{ $message->created_at }}
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="nk-tb-col
                                        nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                                    <li class="me-n1">
                                                                        <div class="dropdown">
                                                                            <a href="#"
                                                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                data-bs-toggle="dropdown">
                                                                                <em class="icon ni ni-more-h"></em>
                                                                            </a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href=""><em
                                                                                                class="icon ni ni-edit"></em><span>Edit
                                                                                                Category</span></a></li>
                                                                                    <li><a href="#"
                                                                                            wire:click=""><em
                                                                                                class="icon ni ni-trash"></em><span>Delete
                                                                                                Category</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                    @endforeach
                                                </div><!-- .nk-tb-list -->
                                            </div>
                                            <div class="card-inner">
                                                <div class="nk-block-between-md g-3">
                                                    <div class="g">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->

                                {{-- Close your eyes. Count to one. That is how long forever feels. --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
