@extends('layouts.admin')
@section('title', 'Materials')


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Materials
                    </h3>


                    <a class="float-right" href="{{ url('admin/add-material') }}">
                        <i class="fas fa-plus"></i>
                        Add Material
                    </a>



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
                            @foreach ($materials as $row)
                                <tr>
                                    <td>
                                      
                                      <img src="{{asset($row->image)}}" alt="img"
                                      width="80"
                                      height="50"
                                      class="rounded mx-4"
                                      >
                                      {{ $row->name }}
                                    </td>
                                    

                                    <td>

                                        <a class="nav-link float-right" data-toggle="dropdown" href="#">
                                            <i class="fas fa-ellipsis-v"></i>

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                          <form action="{{url('admin/material/'.$row->id.'/delete')}}"
                                            class="my-1" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                              <i class="fas fa-trash"></i> 
                                              Delete</button>
                                           </form> 

                                            <a href="{{ url('admin/material/' . $row->id . '/edit') }}"
                                                class="btn btn-secondary d-block mb-2 btn-sm">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
