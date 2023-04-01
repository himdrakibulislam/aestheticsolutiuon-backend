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
            href="{{url('admin/add-product')}}">
                <i class="fas fa-plus"></i>
                Add Product  
            </a>


           
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Visibility</th>
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($products as $row)
               <tr>
                <td> {!!  substr($row->name,0,25) !!}...</td>
                <td>{{$row->category->name}}</td>
                <td>{{$row->brands->name}}</td>
               
                <td>
                   <p><b>Selling Price 	&#2547;</b>{{$row->selling_price}}</p>
                  
                   <p><b>Original Price 	&#2547;</b>{{$row->original_price}}</p>
                </td>
                <td>{{$row->quantity}} PCS</td>

                {{-- <td>
                   @foreach ($row->productImages as $image)
                       <img src="{{asset($image->image)}}" alt="image" width="30px">
                   @endforeach
                </td> --}}
                <td>
                    @if ($row->status ===1)
                    <i class="fas fa-eye-slash"></i>
                    @else
                    <i class="fas fa-eye"></i> 
                @endif
                </td>
                
              
                <td>
                    
                        <a class="nav-link float-right" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                         
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                         
                    

                          
                          <a href="{{url('admin/product/view/'.$row->id)}}" class="btn btn-success d-block mb-2">
                            <i class="fas fa-info"></i> Details
                          </a>
                          
                          <a href="{{url('admin/product/'.$row->id.'/edit')}}" class="btn btn-secondary d-block mb-2">
                            <i class="fas fa-pen"></i>  Edit
                          </a>                          
                          </div>
                     
                </td>
               </tr>
                 
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Quantity</th>
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