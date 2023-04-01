@extends('layouts.admin')
@section('title','Edit Location')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-5">
            <form action="{{url('admin/update-shop-info/'.$shop_info->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="my-1">
                  <label for="name">Shop Name</label>
                  <input type="text"
                  placeholder="Shop Name"
                  value="{{$shop_info->shop_name}}"
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
                  value="{{$shop_info->shipping_charge}}"
                  class="form-control @error('shipping_charge') is-invalid @enderror"
                  name="shipping_charge" required>
                  @error('shipping_charge')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>


                <div class="my-1">
                  <label for="name">Shop Address </label>
                  
                  <textarea 
                  name="shop_location"
                  id="summernote" 
                  
                  cols="30" rows="5"  required>
                 {{$shop_info->shop_location}} 
                </textarea>


                  @error('shop_location')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>


              <div class="my-3 float-right">
                <button 
                class="btn btn-outline-success"
                type="submit">Update Shop Info..</button>
              </div>
               </form>
          
        </div>
        <div class="col-md-2">

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