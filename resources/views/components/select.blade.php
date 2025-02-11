<div class="col-md-6">
    <div class="form-group">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
        <div class="form-control-wrap">
            <select class="form-control" id="{{ $id }}" wire:model.defer="{{ $wireModel }}">
                <!-- Placeholder -->
                @if ($placeholder)
                    <option value="">{{ $placeholder }}</option>
                @endif

                <!-- Options -->
                @foreach ($options as $option)
                    <option value="{{ $option[$optionValue] }}">
                        {{ $option[$optionLabel] }}
                    </option>
                @endforeach
            </select>

            <!-- Message d'erreur -->
            <span class="text-danger">
                @error($wireModel) {{ $message }} @enderror
            </span>
        </div>
    </div>
</div>
