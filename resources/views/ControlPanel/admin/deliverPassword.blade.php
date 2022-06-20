
<h1>Change Password</h1>

<form enctype="multipart/form-data" method="post" action="/postDeliverPassword/{{$user->id}}">
     {{ csrf_field() }}

    <div class="form-group">
        <!-- Label   -->
        <label>
            New Password
        </label>
        <!-- Input -->
        <input type="text" class="form-control form-control-rounded"  name="password" >
    </div>

    <button  type="submit"  class="btn btn-lg btn-block btn-primary mb-3">
        Send
    </button>
</form>
