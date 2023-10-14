@extends('layouts.admin')
@section('title','App Info')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-5">
          
          @if ($app_info->count() < 1 )
          <div class="my-5 text-center">
            <p class=" fw-bold"> No App Info........</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shopInfo">
              Add App Info.....
            </button>
          </div>
              @else
              <div class="my-3 table-responsive">
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
                <form action="{{url('admin/update-app-info/'.$app_info[0]->id)}}" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="my-1">
                    <label for="name">App Name</label>
                    <input type="text"
                    placeholder="Shop Name"
                    value="{{$app_info[0]->name}}"
                    class="form-control "
                    name="name" required>
                   
                  </div>

                  <div class="my-1">
                    <label for="name">Currency</label>
                    <input type="text"
                    placeholder="Shop Name"
                    value="{{$app_info[0]->currency}}"
                    class="form-control "
                    name="currency">
                   
                  </div>

                  <div class="my-1">
                    <label for="name">Facebook URL</label>
                    <input type="url"
                    placeholder="Facebook URL"
                    value="{{$app_info[0]->facebook}}"
                    class="form-control "
                    name="facebook">
                   
                  </div>

                  <div class="my-1">
                    <label for="name">LinkedIn URL</label>
                    <input type="url"
                    placeholder="Linkedin URL"
                    value="{{$app_info[0]->linkedin}}"
                    class="form-control "
                    name="linkedin">
                  </div>

                  <div class="my-1">
                    <label for="name">Twitter URL</label>
                    <input type="url"
                    placeholder="Twitter URL"
                    value="{{$app_info[0]->twitter}}"
                    class="form-control "
                    name="twitter">
                  </div>

                  <div class="my-1">
                    <label for="name">Mail </label>
                    <input type="email"
                    placeholder="Mail"
                    value="{{$app_info[0]->mail}}"
                    class="form-control "
                    name="mail">
                  </div>

                  <label for="meta_title" class="d-block">Meta Title</label>
                  <input type="text" 
                  class="form-control"
                  name="meta_title"
                  value="{{$app_info[0]->meta_title}}"
                  placeholder="Meta Title"
                  >
                  <label for="meta_title" class="d-block">Meta Description</label>
                  
                  <textarea 
                  cols="10" rows="5"
                  class="form-control"
                  name="meta_description"
                  placeholder="Meta Description"
                  >
                  {{$app_info[0]->meta_description}}
      
                  </textarea>
      
      
                  <label for="meta_title" class="d-block">Meta Keywords</label>
                  <input type="text" 
                  class="form-control"
                  name="meta_keywords"
                  value="{{$app_info[0]->meta_keywords}}"
                  placeholder="Meta Keywords"
                  >
  
  
                <div class="my-3 float-right">
                  <button 
                  class="btn btn-outline-success"
                  type="submit">Update App Info..</button>
                </div>
                 </form>
            
              </div>
          @endif
          
        </div>
        <div class="col-md-2">

          <div class="modal fade" id="shopInfo" tabindex="-1" role="dialog" aria-labelledby="shopInfoTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add App Information</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <form action="{{url('admin/store-app-info')}}" method="POST">
                  @csrf
                  <div class="my-1">
                    <label for="name">App Name</label>
                    <input type="text"
                    placeholder="App Name"
                    class="form-control @error('shop_name') is-invalid @enderror"
                    name="name" required>
                    @error('shop_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                  <div class="my-1">
                    <label for="name">Currency </label>
                    <input type="text"
                    placeholder="Currency"
                    class="form-control @error('shipping_charge') is-invalid @enderror"
                    name="currency" required>
                    @error('shipping_charge')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                  


                <div class="my-3 float-right">
                  <button 
                  class="btn btn-outline-success"
                  type="submit">Add App Info..</button>
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