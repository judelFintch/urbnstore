<div class="col-md-6">
    <div class="form-group">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
        <div class="form-control-wrap">
            <input
                type="{{ $type }}"
                class="form-control"
                id="{{ $id }}"
                wire:model.defer="{{ $wireModel }}"
                value="{{ $value }}"
                @if ($step) step="{{ $step }}" @endif
            >
            <span class="text-danger">@error($wireModel) {{ $message }} @enderror</span>
        </div>
    </div>
</div>
