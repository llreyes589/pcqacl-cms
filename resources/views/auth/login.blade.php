@extends('layouts.public')

@section('content')
<div class="card login-card shadow-sm border-0">
    <div class="card-body p-4">
      <h4 class="text-center mb-4">PCQACL CMS</h4>
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
    <div class="card-footer text-center py-3 bg-white">
    </div>
  </div>
@endsection
