@extends('layouts.app')

@section('content')

<div class="card">
  @include('partials.discussion-header')
  <div class="card-body">
    <div class="text-center">
      <strong>{{ $discussion->title }}</strong>
    </div>
    <hr>
   {!! $discussion->content!!}
   @if($discussion->bestReply)
   <div class="card bg-success my-5" style="color:#fff;">
     <div class="card-header">
       <div class="d-flex justify-content-between">
         <div class="">
         <strong>Best Reply</strong>
         </div>
         <div class="">
           <img width="40px" height="40px" style="border-radius:50%;" src="{{Gravatar::src($discussion->bestReply->owner->email)}}" alt="">
           <strong>
             {{$discussion->bestReply->owner->name}}
           </strong>
         </div>
       </div>
     </div>
     <div class="card-body">
       {!!$discussion->bestReply->content!!}
     </div>
   </div>
   @endif
  </div>

  </div>
@foreach($discussion->replies()->paginate(3) as $reply)
<div class="card my-5">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <div class="">
      @auth
        @if(auth()->user()->id == $discussion->user_id)
        <form class="" action="{{route('discussions.best-reply', ['discussion'=> $discussion->slug, 'reply'=> $reply->id])}}" method="post">
          @csrf
          <button class="btn btn-sm btn-info" type="submit">Mark as best reply</button>

        </form>
        @endif
      @endauth
      </div>
      <div class="">
        <img width="40px" height="40px" style="border-radius:50%;" src="{{Gravatar::src($reply->owner->email)}}" alt="">
        <span>{{$reply->owner->name}}</span>
      </div>

    </div>
  </div>
  <div class="card-body">
    {!! $reply->content !!}

  </div>
</div>
@endforeach

{{$discussion->replies()->paginate(3)->links()}}

<div class="card my-5">
  <div class="card-header">
    Add a reply
  </div>
  <div class="card-body">
    @auth
    <form class="" action="{{route('replies.store', $discussion->slug)}}" method="post">
      @csrf

      <input type="hidden" name="content" id="content" value="">
      <trix-editor input="content"></trix-editor>
      <button type="submit" class="btn btn-sm my-2 btn-success">Add reply</button>
    </form>
    @else
    <a href="{{route('login')}}" class="btn btn-info">Sign in to add reply</a>
    @endauth
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
