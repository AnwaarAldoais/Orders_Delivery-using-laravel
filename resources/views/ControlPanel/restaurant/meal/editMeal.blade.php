
<h1>Add Category</h1>

<form enctype="multipart/form-data" method="post" action="/updateMeal/{{$meal->id}}">
    @method('PATCH')
    {{ csrf_field() }}

    <div class="form-group">
        <!-- Label   -->
        <label>
            Category
        </label>
        <select class="textWidth form-control" name="catID" type="text" value="{{$meal->category_id}}">
            @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Name
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" value="{{$meal->name}}" name="name">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Description
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" value="{{$meal->description}}" name="description">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Price
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" value="{{$meal->price}}" name="price">
    </div>

    <img src="/uploads/meal/{{$meal->img}}">

    <div class="form-group">
        <!-- Label -->
        <label>
            Image
        </label>

        <!-- Input -->
        <input data-preview="#preview" name="image" type="file" >
    </div>


    <button class="btn btn-lg btn-block btn-primary mb-3">
        Send
    </button>
</form>
