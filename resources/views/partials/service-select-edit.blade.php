<select data-required="true" class="form-control @error('service') is-invalid @enderror serviceSelectWrapper"
    name="service[]">
    <option value="" disabled selected>{{ __('Choose service') }}</option>
    @foreach(App\Service::all() as $service)
    <option value="{{ $service->id }}" {{ $item->service->id == $service->id ? 'selected' : '' }}>
        @if($service->type == 1)
            {{ $service->platform->label }} -- Platform

        @else
            {{ $service->label }}
        @endif
    </option>
    @endforeach
</select>
@error('service')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
