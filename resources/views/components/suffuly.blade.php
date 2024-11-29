<div>
    <!-- /. a mettre dans un composant?/ -->
    <div class="modal fade @if ($showSuccessModal) show @endif" tabindex="-1" id="modalAlert"
        style="@if ($showSuccessModal) display: block; @else display: none; @endif">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" wire:click="$set('showSuccessModal', false)">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Congratulations!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">
                                Product successfully created!
                            </div>
                        </div>
                        <div class="nk-modal-action">
                            <button class="btn btn-lg btn-primary" wire:click="$set('showSuccessModal', false)">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
</div>
