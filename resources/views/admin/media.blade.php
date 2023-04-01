@extends('layouts.admin')
@section('title','media')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content mt-3">
        <h3>Category Images</h3>
        <div class="row">
            
        @foreach ($categoryImages as $image)
        <div class="col-md-3">
            <img src="{{asset($image->image)}}" class="w-75" alt="">
        </div>
        @endforeach
        </div>

        <h3>Product Images</h3>
       <div class="row">
        @foreach ($productImages as $image)
        <div class="col-md-3">
            <img src="{{asset($image->image)}}" class="w-75" alt="">
        </div>
        @endforeach
       </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection