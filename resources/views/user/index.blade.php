<x-layout>
    <x-container>
        {{-- Display liked pizza --}}
        <div class="profile_liked_pizza">
            @if (auth()->user()->username == $user->username)
                <h1>You like :</h1>
            @else
                <h1>{{$user->username}} like :</h1>
            @endif
            <div class="row liked_pizza">
                @foreach ($user->likes as $like)
                <div class="col-12 col-sm-6 col-md-3 card mb-2 p-1">
                    <x-pizza-card :pizza="$like->pizza"/>
                </div>
                @endforeach
            </div>
        </div>
    </x-container>
</x-layout>