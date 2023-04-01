@extends('layouts.admin')
@section('title','Users')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($users as $user)
               <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if ($user->email_verified_at)
                    <small class="badge bg-success">Verified</small>
                    @else
                    <small class="badge bg-secondary">Not Verified</small>
                @endif
                @if ($user->status === 0)
                    <small class="badge bg-success">Active</small>
                    @else
                     <small class="badge bg-danger">Suspended</small>
                @endif
              </td>
                <td><a href="{{url('admin/user/'.$user->id)}}">Details</a></td>
               </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('custom-scripts')
    <script>
         $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
@endpush