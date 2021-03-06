@extends('layouts.app')

@section('content')
@if(count($errors)>0)
  <ul class="list-group mb-2">
    @foreach($errors->all() as $error)
    <li class="list-group-item text-danger">
      {{$error}}
    </li>
    @endforeach
  </ul>
  @endif

<div class="card">
    <div class="card-header">Add Discussion</div>

    <div class="card-body">
      <form class="" action="{{route('discussions.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" value="" class="form-control" >
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <input id="content" type="hidden" name="content">
          <trix-editor input="content"></trix-editor>
        </div>
        <div class="form-group">
          <label for="channel">Channel</label>
          <select name="channel" id="channel" class="form-control">
            @foreach($channels as $channel)
            <option value="{{$channel->id}}">{{$channel->name}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-success">Create Discussion</button>
      </form>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" type="text/javascript">

</script>
@endsection
