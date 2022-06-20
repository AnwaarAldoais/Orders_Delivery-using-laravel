
<h1>Add Deliver</h1>

<form  method="post" action="/storeDeliver">
    {{ csrf_field() }}


    <div class="form-group">
        <!-- Label   -->
        <label>
            Name
        </label>
        <!-- Input -->
        <input type="text" class="form-control form-control-rounded" name="name">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Password
        </label>
        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="password">

    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Phone
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="phone">
    </div>

    <div class="form-group">
        <!-- Label   -->
        <label>
            Email
        </label>

        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="email">
    </div>



    <button class="btn btn-lg btn-block btn-primary mb-3">
        Send
    </button>
</form>
