<section class="categories mt-5 mb-5 container">
    @foreach ($categories as $category)
    <div class="category {{ isset($activeCat) && $category->name == $activeCat->name ? 'category_active' : ''}}
        ">
        <h3>
            <a href="/categories/{{$category->name}}">{{$category->name}}</a>
        </h3>
    </div>
    @endforeach

</section>