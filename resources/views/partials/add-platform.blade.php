<hr>
<h6 class="card-title">{{ __('Platform details') }}</h6>
<div class="mb-3">
    <label for="label" class="form-label">{{ __('Label') }}</label>
    <input type="text" data-required="true" class="form-control @error('label') is-invalid @enderror" id="label"
        name="label" placeholder="{{ __('Label') }}" value="{{ old('label') }}">
    @error('label')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="labelAr" class="form-label">{{ __('Arabic Label') }}</label>
    <input type="text" data-required="true" class="form-control @error('labelAr') is-invalid @enderror" id="labelAr"
        name="labelAr" placeholder="{{ __('Arabic Label') }}" value="{{ old('labelAr') }}">
    @error('labelAr')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="link" class="form-label">{{ __('Link') }}</label>
    <input type="text" data-required="true" class="form-control @error('link') is-invalid @enderror" id="link"
        name="link" placeholder="{{ __('Link') }}" value="{{ old('link') }}">
    @error('link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3" id="data-fields">
    <label for="data" class="form-label">{{ __('Data') }}</label>
    @forelse (old('data_key', []) as $key => $data_key)
        @include('partials.data-field', ['key' => $key, 'data_key' => $data_key])
    @empty
        @include('partials.data-field', ['key' => 0, 'data_key' => null])
    @endforelse
</div>