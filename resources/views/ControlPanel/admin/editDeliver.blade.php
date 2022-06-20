
<h1>Add Category</h1>

<form enctype="multipart/form-data" method="post" action="/updateDeliver/{{$deliver->id}}">
    @method('PATCH')
    {{ csrf_field() }}

    <div class="form-group">
        <!-- Label   -->
        <label>
            Name
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="name" value="{{$deliver->name}}">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Email
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="email" value="{{$deliver->email}}">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Phone
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="phone" value="{{$deliver->phone}}">
    </div>

    <button  type="submit"  class="btn btn-lg btn-block btn-primary mb-3">
        Send
    </button>
</form>
