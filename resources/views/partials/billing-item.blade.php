<tr>
    <td>
        <div class="mb-3">
            <select data-required="true" class="form-control serviceType" name="serviceType[]">
                <option value="" disabled selected>{{ __('Choose service/other') }}</option>
                <option value="service">{{ __('Service') }}</option>
                <option value="other">{{ __('Other') }}</option>
            </select>
        </div>
        <div class="serviceInput">

        </div>
    </td>
    <td>
        <input type="number" pattern="^[0-9]+$" step="0.1" name="price[]" data-required="true" class="form-control price-input">
    </td>
    <td>
        <input type="number" pattern="^[0-9]+$" name="quantity[]" data-required="true" class="form-control quantity-input">
    </td>
    <td>
        <input type="text" readonly name="total[]" data-required="true" class="form-control total-input">
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-remove-item">{{ __('Remove') }}</button>
    </td>
</tr>