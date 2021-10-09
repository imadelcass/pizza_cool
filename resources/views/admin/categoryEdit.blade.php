<x-layout>
     <div class="row">
                <div class="col-12 category">
                    <form method="POST" action="{{route('admin')}}" enctype="multipart/form-data" class="card">
                        @csrf
                        <input type="file" id="upload_img" class="upload_img" name="upload_img">
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <label for="upload_img" class="img_label">
                            <img src="{{asset('img')}}/{{$category->img}}" alt="pizza">
                        </label>
                        @error('upload_img')
                        {{$message}}
                        @enderror
                        <input name="title" type="text" class="input_name" value="{{$category->name}}">
                        <div class="">
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="btns">
                            <button type="submit" name="submit" value="remove" class="remove">
                                remove
                            </button>
                            <button type="submit" name="submit" value="save" class="save">
                                save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
</x-layout>