<div class="form-group mb-2">
    <label for="{{ $label_for }}">{{$label}}</label>
    <input type="file" class="form-control-file @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>            
    @enderror
</div>