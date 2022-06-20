
<h1>Add Meal</h1>

<form enctype="multipart/form-data" method="post" action="/storeMeal">
    {{ csrf_field() }}

    <div class="form-group">
        <!-- Label   -->
        <label>
            Category
        </label>
        <select class="textWidth form-control" name="catID" type="text">
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
        <input type="text" class="form-control form-control-rounded" placeholder="name" name="name">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Description
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" placeholder="description" name="description">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Price
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" placeholder="price" name="price">
    </div>

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
