<div class="mb-3" id="userSelectWrapper">
    <label for="user" class="form-label">{{ __('Platform') }}</label>
    <select class="form-control @error('platform') is-invalid @enderror" id="platform"
        name="platform">
        <option value="" disabled selected>{{ __('Choose platform type') }}</option>
        <option value="Web">Web</option>
        <option value="Mobile">Mobile</option>
    </select>
    @error('platform')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>