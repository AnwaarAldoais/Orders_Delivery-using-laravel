@foreach($meals as $meal)
    <img src="/uploads/meal/{{$meal->img}}" style="width:100px;height:100px;">
    <h1><a href="/mealDetails/{{$meal->id}}" > {{$meal->name}}</a></h1>

@endforeach
