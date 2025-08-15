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
                <h4 class="card-title">
                    @if(isset($officer->id))
                    Update
                    @else
                    Add new 
                    @endif
                    officer</h4>
                <form action="{{ isset($officer->id) ? route('officers.update', $officer->id) : route('officers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($officer->id))
                    @method('PUT')
                    @endif
                    @include('ui.select', ['label_for' => 'year_id', 'label' => 'Year', 'name' => 'year_id', 'items' => $years])
                    
                    @include('ui.textfield', ['label_for' => "name", 'label' => "name", 'type' => 'text', 'name' => 'name', 'placeholder' => 'Enter name here', 'value' => isset($officer->id) ? $officer->name : old('name')])

                    @include('ui.textfield', ['label_for' => 'position','label' => "position", 'type' => 'text', 'name' => 'position', 'placeholder' => 'Enter position here', 'value' => isset($officer->id) ? $officer->position :  old('position')])
                    
                    @include('ui.file_upload', ['label_for' => 'display_file', 'label' => 'Display File', 'name' => 'display_file', 'placeholder' => 'Select for upload', 'value' => isset($officer->id) ? $officer->display_file :  old('display_file')])
                    <hr>
                    @if(isset($officer->id))
                    <a href="{{ route('officers.index') }}" class="btn btn-danger btn-sm">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-info btn-sm">
                        Update
                    </button>
                    @else
                    <button type="submit" class="btn btn-success btn-sm">
                        Save
                    </button>
                    @endif
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
                        <a href="{{ route('officers.edit', $officer->id) }}" class="btn btn-primary btn-sm">Edit</a>
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