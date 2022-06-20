<h1>Manage Delivers</h1>
<table class="table table-nowrap">
    <thead>
    <tr>
        <th scope="col">Delivery_ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    @foreach($users as $user)
        <tbody>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td><button><a href="/getDeliverPassword/{{$user->id}}">Change The Password</a></button></td>
            <td><button><a href="/editDeliver/{{$user->id}}">edit</a></button></td>
            <td>
                <form method="Post" action="/deleteDeliver/{{$user->id}}">
                    @method('DELETE')
                    @csrf
                    <div class="filed">
                        <div class="control">
                            <button  type="submit" class="button is-link">Delete</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        </tbody>
    @endforeach
</table>
