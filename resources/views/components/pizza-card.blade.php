    <a href="/pizzas/{{$pizza->slug}}">
        <img src="/dinner.png" class="card-img-top">
    </a>
    <div class="card-body">

        <h5 class="card-title">
            <a href="/pizzas/{{$pizza->slug}}">
                {{$pizza->name}}
            </a>
        </h5>
        <p class="card-text">{{$pizza->text}}</p>
        {{-- <a href="/pizzas/{{$pizza->slug}}" class="btn btn-primary">plus</a> --}}
    </div>
    <div class="likes">
        @auth
            @if (!$pizza->likedBy(auth()->user()))
            {{-- if the user not like the pizza show like icon --}}
            <form action="{{route('pizzas.likes',[$pizza->id])}}" method="post">
                @csrf
                <button type="submit" class="like">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                </button>
            </form>
            @else
            {{-- if the user lake the pizza show dislike icon --}}
            <form action="{{route('pizzas.likes',[$pizza->id])}}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="dislike">
                    <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                </button>
            </form>
            @endif
        @endauth
        <div>
            {{$pizza->likes->count()}}
            {{Str::plural('like' , $pizza->likes->count())}}
        </div>
    </div>
