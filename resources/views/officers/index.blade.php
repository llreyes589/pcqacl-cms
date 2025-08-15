@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

<h4>PCQACL Officers</h4>
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new officer</h4>
                <div class="form-group">
                  <label for="year_id">Year</label>
                  <select class="form-control" name="year_id" id="year_id">
                    @foreach ($years as $y)
                    
                    <option value="{{ $y->id }}">{{ $y->year }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text"
                    class="form-control" name="name" id="name" aria-describedby="nameId" placeholder="Enter name here">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md col-sm-12">
        <table class="table" id="officers-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Year</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($officers as $officer)
                
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $officer->name }}</td>
                    <td>{{ $officer->position }}</td>
                    <td>{{ $officer->year->year }}</td>
                    <td>{{ $officer->created_at }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('javascript')
<script>
    $(function(){
        $('#officers-table').dataTable();
    })
</script>
@endsection