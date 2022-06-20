
<h1>Discount Meal</h1>

<form enctype="multipart/form-data" method="post" action="/postDiscountMeal/{{$meal->id}}">
   {{ csrf_field() }}

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
            Price
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" value="{{$meal->price}}" name="price">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Start Date
        </label>
        <!-- Input -->
        <input type="date" name="startDate" ><br>
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            End Date
        </label>
        <!-- Input -->
        <input type="date" name="endDate"><br>
    </div>

    <button class="btn btn-lg btn-block btn-primary mb-3">
        Send
    </button>
</form>
