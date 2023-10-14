@extends('layouts.admin')
@section('title','Categories')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categories</h3>
              

            <a
            class="float-right" 
            href="{{url('admin/add-category')}}">
                <i class="fas fa-plus"></i>
                Add Category  
            </a>


           
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                 
                  
                  <th>Visibility</th>
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($categories as $row)
               <tr>
                <td>{{$row->name}}</td>
               
                
                <td>@if ($row->status ===1)
                    <i class="fas fa-eye-slash"></i>
                    @else
                    <i class="fas fa-eye"></i> 
                @endif
                   
                    </td>
              </td>
                <td>
                    
                        <a class="nav-link float-right" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                         
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                         
                    

                          
                          <a href="{{url('admin/category/'.$row->id.'/edit')}}" class="btn btn-secondary w-100">
                            Edit
                          </a>


                          <div class="dropdown-divider"></div>
                          <form action="{{url('admin/category/delete/'.$row->id)}}" method="POST">
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
                
                  <th>Visibility</th>
                 
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