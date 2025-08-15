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
        @include('ui.textfield', 
          [
            'label_for' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'name' => 'title',
            'placeholder' => 'Enter title here',
            'value' =>  isset($bulletin->id) ? $bulletin->title : old('title')
          ]
        )

        @include('ui.textarea', 
          [
            'label_for' => 'content',
            'label' => 'Content',
            'name' => 'content',
            'placeholder' => 'Enter content here',
            'value' => isset($bulletin->id) ? $bulletin->content : old('content')
          ]
        )
          
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

          @include('ui.file_upload', 
            [
              'label_for' => 'featured_photo',
              'label' => 'Feature Photo',
              'name'=> 'featured_photo',
              'value' => old('featured_photo'),
              'placeholder' => ''
            ]
          )
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
