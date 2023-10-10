<div class="mb-3">
    <label for="platform" class="form-label">{{ __('Platform') }}</label>
    <select data-required="true" class="form-control" name="platform_id">
        <option value="" disabled selected>{{ __('Choose a platform') }}</option>
        @foreach(App\Platform::all() as $platform)
            <option value="{{ $platform->id }}">
                @if(App::getLocale() == "ar")

                    {{ $platform->labelAr }}  
                @else 
                    {{ $platform->label }}

                @endif
                
            </option>
        @endforeach
        <option value="new_platform">{{ __('Add New Platform') }}</option>
    </select>
</div>