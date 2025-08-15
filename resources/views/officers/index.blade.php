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
                <form action="{{ route('officers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('ui.select', ['label_for' => 'year_id', 'label' => 'Year', 'name' => 'year_id', 'items' => $years])
                    
                    @include('ui.textfield', ['label_for' => "name", 'label' => "name", 'type' => 'text', 'name' => 'name', 'placeholder' => 'Enter name here', 'value' => old('name')])

                    @include('ui.textfield', ['label_for' => 'position','label' => "position", 'type' => 'text', 'name' => 'position', 'placeholder' => 'Enter position here', 'value' => old('position')])
                    
                    @include('ui.file_upload', ['label_for' => 'display_file', 'label' => 'Display File', 'name' => 'display_file', 'placeholder' => 'Select for upload', 'value' => old('display_file')])
                    <hr>
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </form>
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