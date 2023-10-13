@extends('layouts.admin')
@section('title','Edit Team Member')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
          <div class="d-flex justify-content-between mx-2 my-2">
            <h5>Edit Team Member</h5>
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

           <form action="{{url('admin/team/update/'.$team->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="text-center mb-2">
              <img id="preview" width="150" 
              height="150"
              class="rounded-circle object-fit-fill border rounded" src="{{asset($team->profile)}}">
            </div>

            <input type="file" 
            name="profile" 
            onchange="loadFile(event)"
            class="form-control my-2 "
            
            >

            <input 
            type="text" 
            name="name" 
            value="{{$team->name}}" 
            class="form-control my-2"
            placeholder="Name"
            required
            >
            <input 
            type="text" 
            name="designation" 
            value="{{$team->designation}}" 
            class="form-control my-2"
            placeholder="Designation"
            required
            >

            <textarea class="my-2" name="biodata" id="biodata" cols="30" rows="10">{{$team->biodata}}</textarea>

            <input 
            type="tel" 
            name="phone"
            value="{{$team->phone}}"
            class="form-control"
            placeholder="Contact Number"
            >

            <h6 class="my-2">Attach Social Platform</h6>

            <input 
            type="url" 
            name="facebook" 
            value="{{$team->facebook}}"
            class="form-control my-2"
            placeholder="Facebook"
            >
            <input 
            type="url" 
            name="instagram"
            value="{{$team->instagram}}" 
            class="form-control my-2"
            placeholder="Instagram"
            >
            <input 
            type="url" 
            name="linkedin"
            value="{{$team->linkedin}}"
            class="form-control my-2"
            placeholder="Linkedin"
            >
            <button class="btn btn-success btn-sm my-2 ">Update</button>
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

