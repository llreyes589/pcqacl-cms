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
                    <td><span class="badge bg-success">{{ $bulletin->created_at }}</span></td>
                    <td><a href="{{ route('bulletins.edit', $bulletin->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
