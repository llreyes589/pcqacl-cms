<div class="form-group">
    <label for="{{ $label_for }}">{{ $label }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $name }}">
    @foreach ($items as $item)
    
    <option value="{{ $item->id }}">{{ $item->label }}</option>
    @endforeach
    </select>
</div>