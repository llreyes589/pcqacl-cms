@extends('layouts.app')

@section('content')
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
                    <td><img src="{{ $bulletin->featured_photo }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></td>
                    <td><span class="badge bg-success">{{ $bulletin->created_at }}</span></td>
                    <td><button type="button" class="btn btn-primary btn-sm">Edit</button></td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection
