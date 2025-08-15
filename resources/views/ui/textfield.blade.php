<div class="form-group">
  <label for="{{ $label_for }}" class="text-capitalize">{{ $label }}</label>
  <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" value="{{ $value }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}">
  @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>            
    @enderror
</div>