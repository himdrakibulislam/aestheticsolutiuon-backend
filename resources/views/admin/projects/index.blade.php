@extends('layouts.admin')
@section('title','Products')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Products</h3>
              

            <a
            class="float-right" 
            href="{{url('admin/add-project')}}">
                <i class="fas fa-plus"></i>
                Add Project  
            </a>


           
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Location</th>
                  <th>Sector</th>
                 
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($projects as $row)
               <tr>
                <td> {!!  substr($row->location,0,25) !!}...</td>
                <td>{{$row->sector}}</td>
            
               
              
                
              
                <td>
                    
                        <a class="nav-link float-right" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                         
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                         
                    

                          
                          <a href="{{url('admin/project/view/'.$row->id)}}" class="btn btn-success d-block mb-2">
                            <i class="fas fa-info"></i> Details
                          </a>
                          
                          <a href="{{url('admin/project/'.$row->id.'/edit')}}" class="btn btn-secondary d-block mb-2">
                            <i class="fas fa-pen"></i>  Edit
                          </a>                          
                          </div>
                     
                </td>
               </tr>
                 
               @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Location</th>
                    <th>Sector</th>
                   
                    
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