<x-layout>
    <section class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <x-pizza-card :pizza="$pizza"/>
            </div>
            <div class="col-12 col-md-8">
                <h3 class="mb-3">Comments</h3>
                <div class="comments_display">
                    {{-- {{$comment->user_id == auth()->user()->id ? 'alert' : 'alert-primary'}} --}}
                    @foreach ($comments as $comment)
                    <div class="comment_display">
                        <div class="comment_upper">
                            <div class="user">
                                <div class="user_photo">
                                    <a href="/profile/{{$comment->user->username}}">
                                        <img src="{{asset('dinner.png')}}">
                                    </a>
                                </div>
                                <div class="user_name">
                                    <a href="/profile/{{$comment->user->username}}">
                                        {{$comment->user->username}}
                                    </a>
                                </div>
                                <div class="comment_body">
                                    {{$comment->body}}
                                </div>
                            </div>
                            <div class="created_at">
                                {{$comment->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="comment_config">
                            <div class="del_rep_trans">
                                @can('destroy', $comment)
                                    <form action="{{route('comment.delete', $comment)}}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit">Delete</button>
                                    </form>
                                @endcan
                                <form action="#" method="post">
                                    @csrf
                                    <button type="submit">Replay</button>
                                </form>
                            </div>
                            {{-- <div class="star">*</div> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="comment_write">
                    <form action="{{route('pizzas.comments', $pizza)}}" method="post">
                        @csrf
                        <input type="text" name="body" placeholder="Write your comment here."
                        class="border @error('body') border-danger @enderror">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                    <small class="text-danger">
                        @error('body')
                            {{$message}}
                        @enderror
                    </small>

                </div>
            </div>
        </div>
    </section>
</x-layout>