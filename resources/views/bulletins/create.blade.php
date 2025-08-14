@extends('layouts.app')

@section('content')
<div class="container">
  <h4>@if(isset($bulletin->id))Update @else Create New @endif Bulletin</h4>
  <form  action="{{ isset($bulletin->id) ? route('bulletins.update', $bulletin->id) : route('bulletins.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if(isset($bulletin->id))
    @method('PUT')
    @endif
      <fieldset>
          <div class="form-group mb-2 mb-2">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleId" placeholder="Enter title here" required value="{{ isset($bulletin->id) ? $bulletin->title : old('title') }}">
            @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>            
            @enderror
          </div>
          <div class="form-group mb-2">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3" placeholder="Enter content here" required >{{ isset($bulletin->id) ? $bulletin->content : old('content') }}</textarea>
            @error('content')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>            
            @enderror
          </div>
          <div class="form-group mb-2">
            <label for="category_id">Category</label>
            
            <select class="form-control" name="category_id" id="category_id" required  value="{{ isset($bulletin->id) ? $bulletin->category_id : old('category_id') }}">
              @php
                $categories = [
                  'Strategic Planning',
                  'Annual Report',
                  'Education',
                  'Clinical Updates'
                ];
              @endphp
              @foreach($categories as $category)
              <option value="{{ $category }}" @if(isset($bulletin->id)) @if($category === $bulletin->category_id) selected @endif @endif>{{ $category }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-5">
            <label for="featured_photo">Feature Photo</label>
            <br>
            <input type="file" class="form-control-file @error('featured_photo') is-invalid @enderror" name="featured_photo" id="featured_photo" placeholder="featured_photo" aria-describedby="featured_photo_id"  value="{{ old('featured_photo') }}">
            @error('featured_photo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>            
            @enderror

            @if(isset($bulletin->id))
                <img src="{{ asset('storage/'.$bulletin->featured_photo) }}" width="100" class="img-fluid" alt="">
            @endif
          </div>
          <hr>
          <a href="{{ route('bulletins.index') }}" class="btn btn-danger">Cancel</a>
          <button type="submit" class="btn btn-primary">Submit</button>
      </fieldset>
  </form>
</div>
@endsection
