@extends('layouts.app')

@section('content')

@foreach($discussions as $discussion)
<div class="card ">
  @include('partials.discussion-header')
  <div class="card-body mb-4">
    
    <div class="text-center">
      <strong>{{ $discussion->title }}</strong>
    </div>
  </div>
</div>

@endforeach

{{$discussions->appends(['channel' => request()->query('channel')])->Links()}}
@endsection
