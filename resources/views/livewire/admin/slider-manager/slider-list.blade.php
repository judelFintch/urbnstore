<div>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed nk-header-fluid is-light">
                    <div class="container-fluid">
                        @include('livewire.admin.partials.header')
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @include('livewire.admin.slider-manager.partials.header-tab')
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner position-relative card-tools-toggle">
                                                @include('livewire.admin.slider-manager.partials.filter-tab')
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <div class="nk-tb-list nk-tb-ulist">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div
                                                                class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="select-all">
                                                                <label class="custom-control-label"
                                                                    for="select-all"></label>
                                                            </div>
                                                        </div>

                                                        <div class="nk-tb-col">
                                                            <span class="sub-text">Nom</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="sub-text">Légende</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="sub-text">Lien</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="sub-text">Image</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-xxl">
                                                            <span class="sub-text">Date de création</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="sub-text">Statut</span>
                                                        </div>
                                                        <div class="nk-tb-col text-end">
                                                            <span class="sub-text">Actions</span>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->

                                                    @foreach ($sliders as $slider)
                                                    @php
                                                        $images = json_decode($slider->image, true) ?? []; // Decode JSON into an array
                                                    @endphp
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-col-check">
                                                            <div
                                                                class="custom-control custom-control-sm custom-checkbox notext">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="slider-{{ $slider->id }}">
                                                                <label class="custom-control-label"
                                                                    for="slider-{{ $slider->id }}"></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <a href="#">
                                                                <div class="user-card">
                                                                    <div class="user-avatar xs bg-primary">
                                                                        <img src="{{ Storage::url($slider->image) }}"
                                                                            alt="Image du slider {{ $slider->name }}">
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">{{ $slider->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="sub-text">{{ $slider->caption }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="sub-text">{{ $slider->link }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md">
                                                            <span class="sub-text">{{ $slider->link }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-xxl">
                                                            <span
                                                                class="sub-text">{{ $slider->created_at->format('d M Y, h:i a') }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="tb-status text-success">Active</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-col-tools">
                                                            <ul class="nk-tb-actions gx-1">
                                                                <li class="nk-tb-action-hidden">
                                                                    <a href="#" class="btn btn-trigger btn-icon"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Détails">
                                                                        <em class="icon ni ni-eye-fill"></em>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-tb-action-hidden">
                                                                    <a href="#" class="btn btn-trigger btn-icon"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Modifier">
                                                                        <em class="icon ni ni-edit-fill"></em>
                                                                    </a>
                                                                </li>
                                                                <li class="nk-tb-action-hidden">
                                                                    <a href="#" class="btn btn-trigger btn-icon"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Supprimer">
                                                                        <em class="icon ni ni-trash-fill"></em>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <div class="dropdown">
                                                                        <a href="#"
                                                                            class="dropdown-toggle btn btn-icon btn-trigger"
                                                                            data-bs-toggle="dropdown">
                                                                            <em class="icon ni ni-more-h"></em>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a href="#"><em
                                                                                            class="icon ni ni-eye"></em><span>Voir
                                                                                            les détails</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#"><em
                                                                                            class="icon ni ni-edit"></em><span>Modifier</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#"><em
                                                                                            class="icon ni ni-trash"></em><span>Supprimer</span></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach


                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="nk-block-between-md g-3">
                                                    <div class="g">
                                                        <ul
                                                            class="pagination justify-content-center justify-content-md-start">
                                                            <li class="page-item"><a class="page-link" href="#">Prev</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">Next</a>
                                                            </li>
                                                        </ul><!-- .pagination -->
                                                    </div>
                                                    <div class="g">
                                                        <div
                                                            class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                            <div>Page</div>
                                                            <div>
                                                                <select class="form-select js-select2" data-search="on"
                                                                    data-dropdown="xs center">
                                                                    <option value="page-1">1</option>
                                                                    <option value="page-2">2</option>


                                                                </select>
                                                            </div>
                                                            <div>OF 102</div>
                                                        </div>
                                                    </div><!-- .pagination-goto -->
                                                </div><!-- .nk-block-between -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
</div>