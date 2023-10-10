<div class="mb-3">
    <label for="label" class="form-label">{{ __('Label') }}</label>
    <input type="text" data-required="true" class="form-control @error('label') is-invalid @enderror" id="label"
        name="label" placeholder="{{ __('Label') }}" value="{{ $service->label }}">
    @error('label')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="labelAr" class="form-label">{{ __('Arabic Label') }}</label>
    <input type="text" data-required="true" class="form-control @error('labelAr') is-invalid @enderror" id="labelAr"
        name="labelAr" placeholder="{{ __('Arabic Label') }}" value="{{ $service->labelAr }}">
    @error('labelAr')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">{{ __('Description') }}</label>
    <textarea  data-required="true" class="form-control @error('description') is-invalid @enderror" id="description"
        name="description" placeholder="{{ __('description') }}" value="{{ $service->description }}">{{ $service->description }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
