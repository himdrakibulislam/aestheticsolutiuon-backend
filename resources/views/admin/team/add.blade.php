@extends('layouts.admin')
@section('title','Add Team Member')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
          <div class="d-flex justify-content-between mx-2 my-2">
            <h5>Add Team Member</h5>
            <a href="{{url('admin/team')}}">Back</a>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-warning">
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
            </div>
           @endif

           <form action="{{url('admin/create-team')}}" enctype="multipart/form-data" method="POST">
            @csrf

            <img id="preview" >
            <input type="file" 
            name="profile" 
            onchange="loadFile(event)"
            class="form-control my-2 "
            required
            >

            <input 
            type="text" 
            name="name" 
            value="{{old('name')}}" 
            class="form-control my-2"
            placeholder="Name"
            required
            >
            <input 
            type="text" 
            name="designation" 
            value="{{old('name')}}" 
            class="form-control my-2"
            placeholder="Designation"
            required
            >

            <textarea class="my-2" name="biodata" id="biodata" cols="30" rows="10"></textarea>

            <input 
            type="tel" 
            name="phone" 
            class="form-control"
            placeholder="Contact Number"
            >

            <h6 class="my-2">Attach Social Platform</h6>

            <input 
            type="url" 
            name="facebook" 
            class="form-control my-2"
            placeholder="Facebook"
            >
            <input 
            type="url" 
            name="instagram" 
            class="form-control my-2"
            placeholder="Instagram"
            >
            <input 
            type="url" 
            name="phone" 
            class="form-control my-2"
            placeholder="linkedin"
            >
            <button class="btn btn-success btn-sm my-2 ">Create</button>
           </form>

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
  $('#biodata').summernote({
    placeholder : 'Bio Data'
  }); 
  });

</script>
@endpush

