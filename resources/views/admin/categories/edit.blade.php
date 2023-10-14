@extends('layouts.admin')
@section('title',$category->name)
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
            Edit Category
            </span>
            <a href="{{url('admin/categories')}}" class="btn btn-outline-secondary btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
        <form action="{{url('admin/category/'.$category->id)}}" method="POST"
        enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

            <!---name----->
            <div class="col-md-12 mb-6">
                <label for="name">Name</label>
                <input type="text"
                value="{{$category->name}}"
                placeholder="Name"
                class="form-control @error('name') is-invalid @enderror"
                name="name" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!---slug----->
            {{-- <div class="col-md-6 mb-6">
                <label for="slug">Slug</label>
                <input type="text"
                value="{{$category->slug}}"
                placeholder="Slug"
                class="form-control @error('slug') is-invalid @enderror"
                name="slug" required>
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}


            <!----description----->
            {{-- <div class="col-md-12 mb-6">
                <label for="description">Description</label>
                <textarea name="description"
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Description" cols="15" rows="5" 
                required 
                >
               {{$category->description}}
               </textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div> --}}


            <!----image----->
            
            
            <!----status----->
            <div class="col-md-6 mb-6 mt-3">
                <label for="status">Visibility</label>
                <input type="checkbox"
                name="status" @if ($category->status == '1')
                @checked(true)
                @else
                @endif>
               
            </div>
             <!----preview image----->
            <div class="col-md-12 text-center my-3">
                <img id="preview" class="rounded" @if ($category->image)
                    src="{{asset($category->image)}}"
                @endif width="200px">
            </div>


            {{-- <p class="mt-3 fw-bold">SEO Tags</p>
             <!----status----->
             <div class="col-md-12 mb-6">
                <label for="metatitle">Meta Title</label>
                <input type="text" name="meta_title"
                placeholder="Meta Title"
                value="{{$category->meta_title}}"
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
                >
                {{$category->meta_keyword}}</textarea>
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
                {{$category->meta_description}}
            </textarea>
            @error('meta_description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> --}}



        </div>
        <div class="float-right ">
            <button class="btn btn-outline-success btn-sm my-4 ">Submit</button>
        </div>
        </form>
        </div>
    </div>
  </div>    
 </div>    
</div>   
 </section> 
@endsection