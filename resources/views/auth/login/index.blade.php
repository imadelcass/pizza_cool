<x-layout>
    <section class="register container">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" type="text" class="form-control" value="{{old('username')}}">
                @error('username')
                <div class="form-text error">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control">
                @error('password')
                <div class="form-text error">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label class="">
                    @section('name')
                        
                    @endsection
                </label>
            </div> --}}
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="form-text">
                You don't have an account ? <a href="{{route('register')}}">Sign up</a>
            </div>
        </form>
    </section>
</x-layout>