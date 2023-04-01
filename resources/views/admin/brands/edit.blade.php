@extends('layouts.admin')
@section('title',$brand->name)

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{url('admin/update-brand/'.$brand->id)}}" method="POST"
        class="mt-5"
        >
        @csrf
        @method('PUT')
            <div class="my-2">
                <input type="text"
                placeholder="Brand Name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{$brand->name}}"
                name="name" required>
        
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="col-md-6 mb-6 mt-3">
                <label for="status">Visibility</label>
                <input type="checkbox"
                @if ($brand->status == 1)
                    @checked(true)
              
                @endif
                name="status">
               
              </div>
              <div class="my-2">
                <button type="submit"
                class="btn btn-success float-right"
                > <i class="fas fa-plus mr-1"></i>Update Brand</button>
             </div>
          </form>
    </div>
    <div class="col-md-3"></div>
 </section>
</div>










