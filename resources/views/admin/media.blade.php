@extends('layouts.admin')
@section('title','media')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content mt-3">
       <div class="row">
        @foreach ($productImages as $image)
        <div class="col-md-3">
            <img src="{{asset($image->image)}}" class="w-100 rounded" alt="media">
        </div>
        @endforeach
       </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection