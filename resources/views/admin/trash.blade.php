@extends('admin.main');
@section('main-cotainer')

<div class="container">
    <h1>Trash Proudct List</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as  $data)
                <tr>
                    <td>
                        <img src="{{asset('storage/'. $data->image)}}" alt="image" style="max-width: 47px; padding: 4px; background: #0000001c; border-radius: 50%;" />
                    </td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->Description }}</td>
                    <td>${{ $data->price }}/kg</td>
                    <td>
                        <a href=" {{route('adminproductrestore', ['id' => $data->product_id])}}" class="btn btn-success">Restore</a>
                        <a href="{{ route('adminproductdelete', ['id' => $data->product_id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
 
