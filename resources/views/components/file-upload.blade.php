<div class="col-12">
    <div class="form-group">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
        <div class="form-control-wrap">
            <input
                type="file"
                class="form-control"
                id="{{ $id }}"
                wire:model="{{ $wireModel }}"
                @if ($multiple) multiple @endif
            >
            <span class="text-danger">
                @error($wireModel) {{ $message }} @enderror
            </span>
        </div>
    </div>
</div>
