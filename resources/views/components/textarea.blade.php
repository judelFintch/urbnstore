<div class="col-12">
    <div class="form-group">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
        <div class="form-control-wrap">
            <textarea
                class="form-control"
                id="{{ $id }}"
                wire:model.defer="{{ $wireModel }}"
                placeholder="{{ $placeholder }}"
            ></textarea>
            <span class="text-danger">
                @error($wireModel) {{ $message }} @enderror
            </span>
        </div>
    </div>
</div>
