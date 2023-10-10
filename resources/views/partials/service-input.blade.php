<input type="text" name="service[]" data-required="true" value="{{ old('service') }}" class="form-control serviceText">
@error('service')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
       