<hr>
<h6 class="card-title">{{ __('Platform details') }}</h6>
<div class="mb-3">
    <label for="label" class="form-label">{{ __('Label') }}</label>
    <input type="text" data-required="true" class="form-control @error('label') is-invalid @enderror" id="label"
        name="label" placeholder="{{ __('Label') }}" value="{{ $service->platform->label }}">
    @error('label')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="labelAr" class="form-label">{{ __('Arabic Label') }}</label>
    <input type="text" data-required="true" class="form-control @error('labelAr') is-invalid @enderror" id="labelAr"
        name="labelAr" placeholder="{{ __('Arabic Label') }}" value="{{ $service->platform->labelAr }}">
    @error('labelAr')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="link" class="form-label">{{ __('Link') }}</label>
    <input type="text" data-required="true" class="form-control @error('link') is-invalid @enderror" id="link"
        name="link" placeholder="{{ __('Link') }}" value="{{ $service->platform->link }}">
    @error('link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="data" class="form-label">{{ __('Data') }}</label>
    <div id="data-fields">
        @php
            $previousKeys = [];
        @endphp
        @foreach(json_decode($service->platform->data, true) as $key => $data_value)
            
            @include('partials.data-field-edit', ['key' => $key, 'data_key' => $data_value])
            @php
                $previousKeys[] = $key;
            @endphp
        @endforeach
    </div>
    <button type="button" class="btn btn-primary btn-sm mt-2 float-end btn-add-data">{{ __('Add Data') }}</button>
</div>