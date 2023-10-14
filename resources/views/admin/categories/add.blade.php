@extends('layouts.admin')
@section('title','Add-Category')

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
            Add Category
            </span>
            <a href="{{url('admin/categories')}}" class="btn btn-outline-secondary btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-warning">
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
            </div>
        @endif
        <form action="{{url('admin/category')}}" method="POST"
        enctype="multipart/form-data">
            @csrf
            <div class="row">

            <!---name----->
            <div class="col-md-12 mb-6">
                <label for="name">Name</label>
                <input type="text"
                placeholder="Category Name"
                class="form-control @error('name') is-invalid @enderror"
                name="name" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            

          
            
            <!----status----->
            <div class="col-md-6 mb-6 mt-3">
                <label for="status">Visibility</label>
                <input type="checkbox"
                name="status">
               
            </div>
            <div class="col-md-12 text-center my-3">
                <img id="preview" width="200px">
            </div>

            {{-- <p class="mt-3 fw-bold">SEO Tags</p> --}}
             <!----status----->
             {{-- <div class="col-md-12 mb-6">
                <label for="metatitle">Meta Title</label>
                <input type="text" name="meta_title"
                placeholder="Meta Title"
                class="form-control @error('meta_title') is-invalid @enderror"
                required
                >
                @error('meta_title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

              <!----meta keywords----->
              <div class="col-md-12 mb-6">
                <label for="description">Meta Keyword</label>
                <textarea name="meta_keyword"
                class="form-control @error('meta_keyword') is-invalid @enderror"
                placeholder="Meta Keyword" cols="10" rows="5"
                required
                ></textarea>
                @error('meta_keyword')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            
             <!----meta description----->
             <div class="col-md-12 mb-6">
                <label for="description">Meta Description</label>
                <textarea name="meta_description"
                class="form-control @error('meta_description') is-invalid @enderror"
                placeholder="Meta Description" cols="15" rows="5"
                required
                >
               </textarea>
              @error('meta_description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}



        </div>
        <div class="float-right">
            <button
            type="submit"
             class="btn btn-outline-success btn-sm my-4">Submit</button>
        </div>
        </form>
        </div>
    </div>
  </div>    
 </div>    
</div>
    </section>

@endsection