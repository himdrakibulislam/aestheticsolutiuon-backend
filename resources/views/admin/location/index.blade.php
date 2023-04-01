@extends('layouts.admin')
@section('title','Location')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-5">
          @if ($shop_info->count() < 1 )
            <div class="my-5 text-center">
              <p class=" fw-bold"> No Shop Info........</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopInfo">
                Add Shop Info.....
              </button>
            </div>
              @else
              <div class="my-3 table-responsive">
                <table class="table"> 
                  <thead>
                    <tr>
                      <th>Shop Name</th>
                      <th>Shiping Charge </th>
                      <th>Shop Location </th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($shop_info as $info)
                    <tr>
                    <td>  {{$info->shop_name}}</td>
                    <td> <b>BDT</b> {{$info->shipping_charge}}</td>
                    <td> {!!$info->shop_location!!} 
                     <a href="{{'address-edit/'.$info->id}}" class="float-right btn btn-secondary btn-sm">Edit </button>
                    </td>
                    </tr>
                   @endforeach
                    
                      
                    </tr>
                  </tbody>
                </table>
               
              </div>
          @endif
          
        </div>
        <div class="col-md-2">

          <div class="modal fade" id="shopInfo" tabindex="-1" role="dialog" aria-labelledby="shopInfoTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Shop Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form action="{{url('admin/store-shop-info')}}" method="POST">
                  @csrf
                  <div class="my-1">
                    <label for="name">Shop Name</label>
                    <input type="text"
                    placeholder="Shop Name"
                    class="form-control @error('shop_name') is-invalid @enderror"
                    name="shop_name" required>
                    @error('shop_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                  <div class="my-1">
                    <label for="name">Shipping Charge </label>
                    <input type="number"
                    placeholder="Shipping Charge"
                    class="form-control @error('shipping_charge') is-invalid @enderror"
                    name="shipping_charge" required>
                    @error('shipping_charge')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                  <div class="my-1">
                    <label for="name">Shop Address </label>
                    
                    <textarea name="shop_location" id="summernote" cols="30" rows="5"  required></textarea>


                    @error('shop_location')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="my-3 float-right">
                  <button 
                  class="btn btn-outline-success"
                  type="submit">Add Shop Info..</button>
                </div>
                 </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('custom-scripts')
    <script>
        // summernote
        $(document).ready(function() {
        $('#summernote').summernote(); 
        });
    </script>
@endpush