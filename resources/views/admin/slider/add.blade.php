@extends('layouts.admin')
@section('title','Add-Slider')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content row">

   <div class="container">
   <div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <span>
            Add Slider
            </span>
            <a href="{{url('admin/sliders')}}" class="btn btn-outline-secondary btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
        <form action="{{url('admin/store-slider')}}" method="POST"
        enctype="multipart/form-data">
            @csrf
            <div class="row">

                <!----image----->
            <div class="col-md-6 mb-6">
                <label for="image">Image</label>
                <input type="file"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                onchange="loadFile(event)"
                required>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
           
            <div class="col-md-12 text-center my-3">
                <img id="preview" width="200px">
            </div>


            <!---Title----->
            <div class="col-md-6 mb-6">
                <label for="name">Title</label>
                <input type="text"
                placeholder="Title"
                class="form-control @error('title') is-invalid @enderror"
                name="title" >
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-6">
                <label for="name">Slider URL</label>
                <input type="text"
                placeholder="Slider URL"
                class="form-control @error('url') is-invalid @enderror"
                name="url" >
                @error('url')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!---slug----->
            


            <!----description----->
            <div class="col-md-12 mb-6">
                <label for="description">Description</label>
                <textarea name="description"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Description" cols="15" rows="5" 
                 
                ></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>


            

           


        </div>
        <div class="float-right">
            <button
            type="submit"
             class="btn btn-outline-success btn-sm my-4">Add Slider</button>
        </div>
        </form>
        </div>
    </div>
  </div>    
 </div>    
</div>
    </section>

@endsection