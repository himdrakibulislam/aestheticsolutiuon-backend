@extends('layouts.admin')
@section('title','Brands')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Brands</h3>
            
           
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fas fa-plus"></i>
               Add Brand
              </button>


              <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{url('admin/add-brand')}}" method="POST">
        <div class="my-2">
            <input type="text"
            placeholder="Brand Name"
            class="form-control @error('name') is-invalid @enderror"
            name="name" required>

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6 mb-6 mt-3">
            <label for="status">Visibility</label>
            <input type="checkbox"
            name="status">
           
        </div>
        <div class="my-2">
            <button type="submit"
            class="btn btn-success float-right"
            > <i class="fas fa-plus mr-1"></i>Add Brand</button>
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
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($brands as $row)
               <tr>
                <td>{{$row->name}}</td>
               
                
              
                <td>
                    
                        <a class="nav-link float-right" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                         
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                         
                          
                          
                          

                          <div class="dropdown-divider"></div>
                          <a href="{{url('admin/edit-brand/'.$row->id)}}" class="btn btn-secondary w-100">
                            Edit
                          </a>


                          <div class="dropdown-divider"></div>
                          <form action="{{url('admin/delete-brand/'.$row->id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger btn-sm w-100">Delete</button>
                         </form>
                          
                          
                          </div>
                     
                </td>
               </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
             
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