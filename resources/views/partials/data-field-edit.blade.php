

@php
    $data = (isset($service)) ?  json_decode($service->platform->data, true) : json_decode($platform->data, true);
    $keys = array_keys($data);
    $firstKey = $keys[0];
    $allKeys = [
        "students" => (!in_array('students', $previousKeys) ) ? "students" : null,
        "parents" => (!in_array('parents', $previousKeys) ) ? "parents" : null,
        "teachers" => (!in_array('teachers', $previousKeys) ) ? "teachers" : null,
        "agents" => (!in_array('agents', $previousKeys) ) ? "agents" : null,
        "buscordinators" => (!in_array('buscordinators', $previousKeys) ) ? "bus Coordinators" : null,
        "drivers" => (!in_array('drivers', $previousKeys) ) ? "drivers" : null,
        "storage" => (!in_array('storage', $previousKeys) ) ? "storage" : null,
    ];

@endphp
<div class="input-group @if($key != $firstKey) mt-3 @endif">

    @if(Auth::user()->isTopAdmin())
        <select data-required="true" class="form-control data-key" name="data_key[]">
            <option value="" selected disabled>Choose a key</option>
            @foreach($allKeys as $index => $value)
                @if($value != null)
                    <option value="{{ $index }}" @if($key == $index) selected @endif >{{ __($value) }}</option>
                @endif
            @endforeach
            
        </select>
        <input type="text" data-required="true" class="form-control data-value" name="data_value[]" placeholder="{{ __('Value') }}" value="{{ $data_value }}">
    @else 
        @foreach($allKeys as $index => $value)
            @if($value != null && $key == $index)
                <input type="text" data-required="true" class="form-control data-value" value="{{ $value }}" readonly>
            @endif
        @endforeach
        <input type="text" data-required="true" class="form-control data-value" value="{{ $data_value }}" readonly>

    @endif
    @if(Auth::user()->isTopAdmin())
    
    <button type="button" class="btn btn-danger btn-remove-data">-</button>
    @endif

</div>
