<div class="btn-group">
<h1>Categories</h1>
@foreach($categories as $category)
    <h1><a href="/mealsShow/{{$category->id}}">{{$category->name}}</h1>
@endforeach
</div>
<div class="btn-group">
    <h1>Offers</h1>
    @foreach($offers as $offer)
        <p><a href="/mealDiscount/{{$offer->meal_id}}">{{$offer->name}}{{$offer->price}}</p>
    @endforeach
</div>
