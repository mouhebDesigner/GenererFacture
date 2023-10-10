<div class="input-group @if($key > 0) mt-3 @endif">
    <select data-required="true" class="form-control data-key" name="data_key[]">
        <option value="" selected disabled>Choose a key</option>
        <option value="students" @if($data_key == "students") selected @endif >{{ __('students') }}</option>
        <option value="parents" @if($data_key == "parents") selected @endif >{{ __('parents') }}</option>
        <option value="teachers" @if($data_key == "teachers") selected @endif >{{ __('teachers') }}</option>
        <option value="agents" @if($data_key == "agents") selected @endif >{{ __('agents') }}</option>
        <option value="buscordinators" @if($data_key == "buscordinators") selected @endif >{{ __('bus Coordinators') }}</option>
        <option value="drivers" @if($data_key == "drivers") selected @endif >{{ __('drivers') }}</option>
        <option value="storage" @if($data_key == "storage") selected @endif >{{ __('storage') }}</option>
    </select>
    <input type="text" data-required="true" class="form-control data-value" name="data_value[]" placeholder="{{ __('Value') }}" value="{{ old('data_value.'.$key) }}">
    @if($key == 0)
        <button type="button" class="btn btn-success btn-add-data">+</button>
    @else 
        <button type="button" class="btn btn-danger btn-remove-data">-</button>
    @endif
</div>
