@extends('layouts.app')

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

<h4>PCQACL Board of Trustees</h4>
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    @if(isset($board->id))
                    Update
                    @else
                    Add new 
                    @endif
                    BOT</h4>
                <form action="{{ isset($board->id) ? route('bot.update', $board->id) : route('bot.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($board->id))
                    @method('PUT')
                    @endif
                    @include('ui.select', ['label_for' => 'year_id', 'label' => 'Year', 'name' => 'year_id', 'items' => $years])
                    
                    @include('ui.textfield', ['label_for' => "name", 'label' => "name", 'type' => 'text', 'name' => 'name', 'placeholder' => 'Enter name here', 'value' => isset($board->id) ? $board->name : old('name')])

                    @include('ui.textfield', ['label_for' => 'order','label' => "order", 'type' => 'text', 'name' => 'order', 'placeholder' => 'Enter order here', 'value' => isset($board->id) ? $board->order :  old('order')])
                    
                    @include('ui.file_upload', ['label_for' => 'display_file', 'label' => 'Display File', 'name' => 'display_file', 'placeholder' => 'Select for upload', 'value' => isset($board->id) ? $board->display_file :  old('display_file')])
                    <hr>
                    @if(isset($board->id))
                    <a href="{{ route('bot.index') }}" class="btn btn-danger btn-sm">
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
        <table class="table" id="bot-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Order</th>
                    <th>Year</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bot as $board)
                
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td>{{ $board->name }}</td>
                    <td>{{ $board->order }}</td>
                    <td>{{ $board->year->year }}</td>
                    <td>{{ $board->created_at }}</td>
                    <td>
                        <a href="{{ route('bot.edit', $board->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
        $('#bot-table').dataTable();
    })
</script>
@endsection