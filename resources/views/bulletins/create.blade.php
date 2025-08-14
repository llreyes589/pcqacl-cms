@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Create New Bulletin</h4>
  <form  action="{{ route('bulletins.store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <fieldset>
          <div class="form-group mb-2 mb-2">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleId" placeholder="Enter title here" required value="{{ old('title') }}">
            @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>            
            @enderror
          </div>
          <div class="form-group mb-2">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3" placeholder="Enter content here" required >{{ old('content') }}</textarea>
            @error('content')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>            
            @enderror
          </div>
          <div class="form-group mb-2">
            <label for="category_id">Category</label>
            <select class="form-control" name="category_id" id="category_id" required  value="{{ old('category_id') }}">
              <option value="Strategic Planning">Strategic Planning</option>
              <option value="Annual Report">Annual Report</option>
              <option value="Education">Education</option>
              <option value="Clinical Updates">Clinical Updates</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <label for="featured_photo">Feature Photo</label>
            <input type="file" class="form-control-file @error('featured_photo') is-invalid @enderror" name="featured_photo" id="featured_photo" placeholder="featured_photo" aria-describedby="featured_photo_id" required  value="{{ old('featured_photo') }}">
            @error('featured_photo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>            
            @enderror
          </div>

          <a href="{{ route('bulletins.index') }}" class="btn btn-danger">Cancel</a>
          <button type="submit" class="btn btn-primary">Submit</button>
      </fieldset>
  </form>
</div>
@endsection
