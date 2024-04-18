@extends('admin.main');
@section('main-cotainer')

<div class="container">
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
                        <a href=" {{route('adminproductedit', ['id' => $data->product_id])}}" class="btn btn-success">Update</a>
                        <a href="{{ route('trash', ['id' => $data->product_id]) }}" class="btn btn-danger">Trash</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
 
