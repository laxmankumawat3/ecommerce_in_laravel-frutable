@extends("admin.main")
@section('main-cotainer')
    

    <div class="container tex-center">
        <h2>Edit Product Detail</h2>
        <form action="{{ url('/admin/addproduct') }}" method="POST" enctype="multipart/form-data">
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
                    value="{{ old('name') }}"
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
                    value="{{ old('Description') }}"
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
                    value="{{ old('price') }}"
                />
                <span class="text-danger">@error('price')
                    {{$message}}
                @enderror</span>
            </div>
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
            <button class="btn btn-primary">Edit Product</button>
        </form>
    </div>
    @endsection
      
