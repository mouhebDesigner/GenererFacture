<input type="text" name="service[]" data-required="true" value="{{  $item->label }}" class="form-control serviceText">
@error('service')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
       