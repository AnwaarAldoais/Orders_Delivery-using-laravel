
<h1>Add Category</h1>

<form enctype="multipart/form-data" method="post" action="/storeCategory">
    {{ csrf_field() }}

    <div class="form-group">
        <!-- Label   -->
        <label>
            Name
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" placeholder="name" name="name">
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
