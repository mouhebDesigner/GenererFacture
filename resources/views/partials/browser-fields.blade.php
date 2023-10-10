<div class="mb-3" id="browserFieldsWrapper">
    <div id="platformFields">
        <div class="mb-3">
            <label for="browserType" class="form-label">{{ __('Browser Type') }}</label>
            <input type="text" class="form-control @error('browserType') is-invalid @enderror" id="browserType" name="browserType" placeholder="{{ __('Browser Type') }}" value="{{ old('browserType') }}">
            @error('browserType')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="browserVersion" class="form-label">{{ __('Browser Version') }}</label>
            <input type="text" class="form-control @error('browserVersion') is-invalid @enderror" id="browserVersion" name="browserVersion" placeholder="{{ __('Browser Version') }}" value="{{ old('browserVersion') }}">
            @error('browserVersion')
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