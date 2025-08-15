@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
<!-- Table -->
    <div class="card mt-4 shadow-sm">
      <div class="card-header bg-white">
        <h5 class="mb-0">Bulletins</h5>
        <a href="{{ route('bulletins.create') }}" class="btn btn-primary btn-sm">Create new</a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Featured Photo</th>
              <th>Is Published</th>
              <th>Date Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bulletins as $bulletin)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $bulletin->title }}</td>
                    <td><img src="{{ asset('storage/'.$bulletin->featured_photo) }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="100" alt=""></td>
                    <td><span class="badge {{ $bulletin->is_published === 1 ? 'bg-success' : 'bg-danger' }}">@if($bulletin->is_published === 1) Yes @else No @endif</span></td>
                    <td>{{ $bulletin->created_at }}</td>
                    <td nowrap>
                      <form action="{{ route('bulletins.publish', $bulletin->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <a href="{{ route('bulletins.edit', $bulletin->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-secondary btn-sm">
                          @if($bulletin->is_published)
                          Unpublish
                          @else
                          Publish
                          @endif
                        </button>
                      </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
