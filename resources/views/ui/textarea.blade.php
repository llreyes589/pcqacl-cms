<div class="form-group mb-2">
    <label for="{{ $label_for }}">{{ $label }}</label>
    <textarea class="form-control @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}" rows="3" placeholder="{{ $placeholder }}" >{{ $value }}</textarea>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>            
    @enderror
</div>