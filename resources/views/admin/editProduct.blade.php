@extends("admin.main")
@section('main-cotainer')
    

    <div class="container">
        <form action="{{ route('adminproductupdate' , ['id'=> $product->product_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    placeholder="Enter your Product Name"
                    aria-describedby="helpId"
                    value="{{$product->name}}"
                />
                <span class="text-danger">@error('name')
                    {{$message}}
                @enderror</span>
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input
                    type="text"
                    name="Description"
                    id="Description"
                    class="form-control"
                    placeholder="Enter your Product Description"
                    aria-describedby="helpId"
                    value="{{ $product->Description}}"
                />
                <span class="text-danger">@error('Description')
                    {{$message}}
                @enderror</span>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input
                    type="number"
                    name="price"
                    id="price"
                    class="form-control"
                    placeholder="Enter your Product price In $"
                    aria-describedby="helpId"
                    value="{{$product->price }}"
                />
                <span class="text-danger">@error('price')
                    {{$message}}
                @enderror</span>
            </div>
            <img src="{{asset('storage/'. $product->image)}}" alt="">
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                    class="form-control"
                    placeholder="Enter your Product image"
                    aria-describedby="helpId"
                />
                <span class="text-danger">@error('image')
                    {{$message}}
                @enderror</span>
            </div>
            <button class="btn btn-primary">Add product</button>
        </form>
    </div>
    @endsection
      
