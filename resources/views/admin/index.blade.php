<x-layout>
    <section class="admin__section container">
        <section class="categories">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-12 col-sm-6">
                            <div class="card">
                                <img src="img/{{$category->img}}" alt="pizza">
                                <h3>{{$category->name}}</h3>
                                <a class="edit" href="/admin/category/{{$category->id}}">Edit</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 col-sm-6">
                        <form method="POST" action="{{route('admin')}}" enctype="multipart/form-data" class="card">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <input type="file" id="upload_img" class="upload_img" name="upload_img">
                            <label for="upload_img" class="img_label">
                                <img src="dinner.png" alt="pizza">
                            </label>
                            @error('upload_img')
                            {{$message}}
                            @enderror
                            <input name="title" type="text" value="{{old('title')}}"
                            class="input_name" placeholder="Enter name">
                            <div class="">
                                @error('title')
                                {{$message}}
                                @enderror
                            </div>
                                <button type="submit" name="submit" value="create" class="create">
                                    Add new category
                                </button>
                        </form>
                    </div>
                </div>
        </section>
    </section>
</x-layout>