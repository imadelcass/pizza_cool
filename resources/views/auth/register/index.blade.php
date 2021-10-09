<x-layout>
    <section class="register container">
        <form action="{{route('register')}}" method="POST">
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
                <label class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" 
                value="{{old('email')}}">
                @error('email')
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
                <label class="form-label">Confirmed Password</label>
                <input name="password_confirmation" type="password" class="form-control">
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="form-text">
                You already have an account ? <a href="{{route('login')}}">Sign in</a>
            </div>
        </form>
    </section>
</x-layout>