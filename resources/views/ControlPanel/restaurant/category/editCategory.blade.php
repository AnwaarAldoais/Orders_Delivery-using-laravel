
<h1>Add Category</h1>

<form enctype="multipart/form-data" method="post" action="/updateCategory/{{$category->id}}">
    @method('PATCH')
    {{ csrf_field() }}

    <div class="form-group">
        <!-- Label   -->
        <label>
            Name
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="name" value="{{$category->name}}">
    </div>

    <img src="/uploads/category/{{$category->img}}">

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
