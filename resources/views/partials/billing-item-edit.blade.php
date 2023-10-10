<tr>
    <td>
        
        <div class="mb-3">
            <select data-required="true" class="form-control serviceType" name="serviceType[]">
                <option value="" disabled selected>{{ __('Choose service/other') }}</option>
                <option value="service" @if($item->service) selected @endif>{{ __('Service') }}</option>
                <option value="other" @if($item->label) selected @endif>{{ __('Other') }}</option>
            </select>
        </div>
        <div class="serviceInput">
            @if($item->service_id != null)
                @include('partials.service-select-edit', $item)
            @else 
                @include('partials.service-input-edit', $item)
            @endif
        </div>
    </td>
    <td>
        <input type="number" pattern="^[0-9]+$" step="0.1" name="price[]" value="{{ $item->price }}" data-required="true" class="form-control price-input">
    </td>
    <td>
        <input type="number" pattern="^[0-9]+$" name="quantity[]" value="{{ $item->quantity }}" data-required="true" class="form-control quantity-input">
    </td>
    <td>
        <input type="text" readonly name="total[]" value="{{ $item->total }}" data-required="true" class="form-control total-input">
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-remove-item">{{ __('Remove') }}</button>
    </td>
</tr>