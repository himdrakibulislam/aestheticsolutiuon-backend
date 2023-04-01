@extends('layouts.admin')
@section('title','Order-detail')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
   
    <section class="content">
     
        <div class="card m-3 p-3" >
          <div class="d-flex">
            <a href="{{url('admin/invoice-pdf/'.$details->id)}}" class="btn btn-success mr-4"><i class="fas fa-download"></i> <small>Download Invoice PDF</small> </a>

            <a 
            target="_blank"
            href="{{url('admin/order/'.$details->id)}}" class="btn btn-secondary"><i class="fas fa-file-invoice mr-2"></i>Invoice</a>

          </div>
          <div class="row mt-3">
            
            <div class="col-md-6">
                <h5><b>Order Number : </b> #{{$details->order_number}}</h5>
                <table class="table table-responsive mt-3 w-100">
                    <thead>
                      <tr>
                        <th scope="col">ITEM</th>
                        <th>QTY/SIZE</th>
                        <th>PRICE</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($details->orderItems as $item)
                      <tr>
                        <td scope="row">
                            <img width="50"
                            class="d-inline"
                             src="{{asset($item->product->productImages[0]->image)}}" alt="">
                           <p class="d-inline">{!! substr($item->product->name,0,25) !!}</p>  
                        </td>
                        <td scope="row">{{$item->quantity}}
                          <p>@if ($item->size)
                            Size : {{$item->size}}
                          @endif</p>
                        </td>
                        <td scope="row">&#2547; {{$item->product->selling_price}}</td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>

                  <hr>
                  {{-- <div class="d-flex justify-content-between mx-3">
                    <p><b>Subtotal</b></p>
                    <p>&#2547;  {{$details->total}}</p>
                  </div>
                  <div class="d-flex justify-content-between mx-3">
                    <p><b>Delivery Charge</b></p>
                    <p>&#2547;  100</p>
                  </div> --}}
                  <div class="d-flex justify-content-between mx-3">
                    <p><b>Total</b></p>
                    <p>&#2547;  {{$details->total}}</p>
                  </div>
                  <h6 class="border border-success p-2 "><b>Payment : </b>{{$details->payment_type}}</h6>
            </div>
            <div class="col-md-6">
                <h5><b>Address/Info</b> </h5>
                <span><b>Name  : </b>{{$details->name}}</span>
                <br>
                <span><b>Contact  : </b>{{$details->phone}}</span>
                <p> 
                    <span>{{$details->address}}</span>
                    <br>
                    <span> 
                        <span><b>Sub district : </b></span>  
                        {{$details->sub_district}},</span>
                    <br>
                    <span> <span><b> District : </b></span>   {{$details->district}},</span>
                    
                    <span> <span><b>Division : </b></span>  {{$details->division}}</span>
                   </p>


                   <form action="{{url('admin/order-status/'.$details->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <select name="order_status" 
                   class="form-control"
                   id="">
                  
                    <option value="0" 
                    @if ($details->order_status ===0 )
                        selected
                    @endif
                    >Confirmed
                    </option>

                    <option value="1"
                    @if ($details->order_status ===1 )
                    selected
                    @endif
                    >Processing</option>
                    <option value="2"
                    @if ($details->order_status ===2 )
                    selected
                    @endif
                    >Delivered</option>
                   </select>
                   <button 
                   class="btn btn-secondary w-50 btn-sm my-2 float-right"
                   >Update</button>
                   </form>


            </div>
            
        </div>
        <button type="button" class="mt-5 w-50 btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteOrder">
           Delete
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                 Do you wanna delete this order ? 
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">No</button>

                    <form action="{{url('admin/delete-order/'.$details->id)}}" class="mb-5" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="mt-5  btn btn-outline-danger btn-sm">Yes</button> 
                           
                </form>
               
            </div>
            </div>
        </div>
        <form action="{{url('admin/delete-order/'.$details->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="mt-5 w-50 btn btn-outline-danger btn-sm">Delete</button>    
        </form>
          </div>
        
          
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

