<x-layout>
    <x-search />
    <x-categories :categories="$categories" />
    <section class="dishes mt-5 container">
        <h2>Featured Dishes</h2>
        <div class="row">
            @foreach ($pizzas as $pizza)
            <div class="col-12 col-sm-6 col-md-3 card mb-2 p-1">
                <x-pizza-card :pizza="$pizza" />
            </div>
            @endforeach
        </div>
        {{$pizzas->links()}}
    </section>
</x-layout>