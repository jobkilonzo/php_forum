<div class="card-header">
  <div class="d-flex justify-content-between">
    <div class="">
      <img width="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($discussion->author->email)}}" alt="">
      <strong class="ml-2">{{$discussion->author->name}}</strong>
    </div>
    <div class="">
      <a href="{{route('discussions.show', $discussion->slug)}}" class="btn btn-success btn-sm">View</a>
    </div>
  </div>

</div>
