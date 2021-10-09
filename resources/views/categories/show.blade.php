<x-layout>
    <x-categories :categories="$categories" :activeCat="$activeCat" />
    <div class="row">
        @foreach ($pizzas as $pizza)
        <x-pizza-card :pizza="$pizza" />
        @endforeach
    </div>
</x-layout>