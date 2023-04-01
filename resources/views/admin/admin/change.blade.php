@extends('layouts.admin')
@section('title','Change Password')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{url('admin/dashboard/admin/change-password')}}"
        method="POST">
            <div class="my-3">
                <input type="password"
                class="form-control @error('old_password') is-invalid @enderror" 
                name="old_password" placeholder="Old Password">
                @error('old_password')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="my-3">
                <input type="password"
                class="form-control @error('new_password') is-invalid @enderror" 
                name="new_password" placeholder="New Password">
                @error('new_password')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="my-3">
                <input type="password"
                class="form-control @error('new_password_confirmation') is-invalid @enderror" 
                name="new_password_confirmation" placeholder="New Password Confirmation">
                @error('new_password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-outline-success float-right">Change Password</button>
            </div>
    </form>
    </div>
    <div class="col-md-3"></div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('custom-script')
    <script>
     
    </script>
@endpush