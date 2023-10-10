<div class="mb-3" id="deviceFieldsWrapper">
    <div id="deviceFields">
        <div class="mb-3">
            <label for="deviceType" class="form-label">{{ __('Device Type') }}</label>
            <input type="text" class="form-control @error('deviceType') is-invalid @enderror" id="deviceType" name="deviceType" placeholder="{{ __('Device Type') }}" value="{{ old('deviceType') }}">
            @error('deviceType')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deviceReference" class="form-label">{{ __('Device Reference') }}</label>
            <input type="text" class="form-control @error('deviceReference') is-invalid @enderror" id="deviceReference" name="deviceReference" placeholder="{{ __('Device Reference') }}" value="{{ old('deviceReference') }}">
            @error('deviceReference')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="accountEmail" class="form-label">{{ __('Account email') }}</label>
        <input type="text" class="form-control @error('accountEmail') is-invalid @enderror" id="accountEmail" name="accountEmail" placeholder="{{ __('Account email') }}" value="{{ old('accountEmail') }}">
        @error('accountEmail')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="accountPassword" class="form-label">{{ __('Account password') }}</label>
        <input type="text" class="form-control @error('accountPassword') is-invalid @enderror" id="accountPassword" name="accountPassword" placeholder="{{ __('Account password') }}" value="{{ old('accountPassword') }}">
        @error('accountPassword')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>