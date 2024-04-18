@extends("frontend.main")
@section("main-conatainer")

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>

{{-- sweet alert --}}
        @if(session()->has('success'))
        @php
           $message =  session()->get('success')
        @endphp
          <script>
        document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
        title: "success",
        text: "{{$message}}",
        icon: "success"
      });
        });
              </script>
        @endif



        @if (count($product) > 0)
        <!-- Single Page Header End -->
        @if (session()->has('error'))
        <div class="alert alert-danger">
            <strong>Error:</strong> {{ session()->get('error') }}
        </div>

        @endif
       
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            {{-- show all product here --}}
                            @php
                                $totalprice = 0;
                            @endphp
                            
                            @foreach ($product as $data)
                            @php
                                $totalprice += $data->product_price;
                            @endphp
                             <tr>
                                 <th scope="row">
                                     <div class="d-flex align-items-center">
                                         <img src="{{asset('storage/'. $data->product_image)}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                     </div>
                                 </th>
                                 <td>
                                     <p class="mb-0 mt-4">{{$data->product_name}}</p>
                                 </td>
                                 <td>
                                     <p class="mb-0 mt-4">{{$data->product_price}}$</p>
                                 </td>
                                 <td>
                                     <div class="input-group quantity mt-4" style="width: 100px;">
                                         <div class="input-group-btn">
                                             <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                             <i class="fa fa-minus"></i>
                                             </button>
                                         </div>
                                         <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                         <div class="input-group-btn">
                                             <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                 <i class="fa fa-plus"></i>
                                             </button>
                                         </div>
                                     </div>
                                 </td>
                                 <td>
                                     <p class="mb-0 mt-4">{{$data->product_price}} $</p>
                                 </td>
                                 <td>
                                     <a href="{{route('productremovecart' , ['id' => $data->Product_id])}}" class="btn btn-md rounded-circle bg-light border mt-4" >
                                         <i class="fa fa-times text-danger"></i>
                                     </a>
                                 </td>
                             
                             </tr>
                             @endforeach
                           
                       
                            
                            {{-- <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="img/vegetable-item-5.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">Potatoes</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="img/vegetable-item-2.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">Awesome Brocoli</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">2.99 $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">$96.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">${{$totalprice}}</p>
                            </div>
                            <div class="card-body text-center">
                                <form action="/payment" method="POST" >
                                   @csrf
                                   <script src="https://checkout.razorpay.com/v1/checkout.js"
                                      data-key="rzp_test_gKQ1xeklq1IhG3"
                                      data-amount="{{$totalprice * 100}} " 
                                      data-currency="INR"
                                      data-buttontext="Pay {{$totalprice}} INR"
                                      data-name="Frutable"
                                      data-description="Rozerpay"
                                      data-image="https://media.istockphoto.com/id/1304522945/photo/many-different-berries-in-the-form-of-a-frame-on-a-white-background.jpg?s=1024x1024&w=is&k=20&c=qReN-34cabAxGrw9lcu_XbRFQNppfvzZVLq_IwbqNLY="
                                      data-prefill.name="{{$data->product_name}}"
                                      data-prefill.email="email"
                                      data-theme.color="#012652">
                                     </script>
                                <button type="submit" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                                </form>
                                {{-- <form id="paymentForm" action="/payment" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                    <input type="hidden" name="amount" value="{{$totalprice}}">
                                    <input type="hidden" name="currency" value="INR">
                                    <input type="hidden" name="name" value="Frutable">
                                    <input type="hidden" name="description" value="Rozerpay">
                                    <input type="hidden" name="image" value="https://media.istockphoto.com/id/1304522945/photo/many-different-berries-in-the-form-of-a-frame-on-a-white-background.jpg?s=1024x1024&w=is&k=20&c=qReN-34cabAxGrw9lcu_XbRFQNppfvzZVLq_IwbqNLY=">
                                    <input type="hidden" name="prefill[name]" value="{{$data->product_name}}">
                                    <input type="hidden" name="prefill[email]" value="email">
                                    <input type="hidden" name="theme[color]" value="#012652">
                                    <button id="proceedCheckoutBtn" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                                </form>
                                
                                <script>
                                    document.getElementById('proceedCheckoutBtn').onclick = function(){
                                        var form = document.getElementById('paymentForm');
                                        var options = {
                                            key: 'rzp_test_gKQ1xeklq1IhG3',
                                            amount: form.amount.value,
                                            currency: form.currency.value,
                                            name: form.name.value,
                                            description: form.description.value,
                                            image: form.image.value,
                                            prefill: {
                                                name: form['prefill[name]'].value,
                                                email: form['prefill[email]'].value
                                            },
                                            theme: {
                                                color: form['theme[color]'].value
                                            },
                                            handler: function(response){
                                                // Handle the success response here if needed
                                                console.log(response);
                                            }
                                        };
                                        var rzp1 = new Razorpay(options);
                                        rzp1.open();
                                    };
                                </script> --}}
                                
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center m-2 p-2 border-danger ">
             Your cart is Empty please add more product 
        </div>
       @endif
        <!-- Cart Page End -->


        <!-- Footer Start -->
      @endsection