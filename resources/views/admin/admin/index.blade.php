@extends('layouts.admin')
@section('title','Admins')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admins</h3>
              

                <button type="button" class="float-right btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                  <i class="fas fa-plus"></i>
                  Add Admin
                </button>


                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                          <strong>E-mail</strong>  must be unique.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form 
                        action="{{url('admin/dashboard/add-admin')}}"
                        method="POST">
                        <div class="my-2">
                          <input type="text"
                           id="name"
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                           required>


                           @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>


                        <div class="my-2">
                          <input 
                          id="email"
                          type="email"
                          name="email" 
                          class="form-control @error('email') is-invalid @enderror" placeholder="E-mail"
                          required>

                          @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        

                        </div>
                        <div class="mt-2 mb-4 mr-3">
                          <button
                          type="submit"
                          class="float-right btn btn-success" id="addAdmin">
                            Add Admin
                          </button>
                        </div>
                        </form>
                      </div>
                     
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($admins as $row)
               <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                
              </td>
                <td><a href="{{asset('admin/dashboard/admin/'.$row->id)}}" id="admin">Details</a></td>
               </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                
                  <th>Email</th>
                 
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