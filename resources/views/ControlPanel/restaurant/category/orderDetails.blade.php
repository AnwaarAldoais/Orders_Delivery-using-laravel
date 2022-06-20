
<table class="table table-nowrap">
    <thead>
    <tr>
        <th scope="col">Order_ID</th>
        <th scope="col">Name</th>
        <th scope="col">Qty</th>
    </tr>
    </thead>
    @foreach($details as $detail)
        <tbody>
        <tr>
            <th scope="row">{{$detail->id}}</th>
            <td>{{$detail->name}}</td>
            <td>{{$detail->qty}}</td>
        </tr>
        </tbody>
    @endforeach
</table>
