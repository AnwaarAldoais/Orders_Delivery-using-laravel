
<table class="table table-nowrap">
    <thead>
    <tr>
        <th scope="col">Category_ID</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    @foreach($categories as $category)
        <tbody>
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td> <img src="/uploads/category/{{$category->img}}" style="width:120px;height: 100px;"></td>
            <td><button><a href="/editCategory/{{$category->id}}">edit</a></button></td>
            <td> <form method="Post" action="/deleteCategory/{{$category->id}}">
                @method('DELETE')
                @csrf
                <div class="filed">
                    <div class="control">
                        <button  type="submit" class="button is-link">Delete</button>
                    </div>
                </div>
                </form></td>
        </tr>
        </tbody>
    @endforeach
</table>
