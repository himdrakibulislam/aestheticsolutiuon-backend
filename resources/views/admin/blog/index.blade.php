@extends('layouts.admin')
@section('title','All Blogs')
@section('content')
<section class="content-wrapper">
    <div class="content">
        <hr>
            <div class="d-flex justify-content-between"> 
                <h4 class="">Blogs</h4>

                <a href="{{url('admin/create-post')}}"
                class="btn btn-info"
                >
                <i class="fas fa-plus"></i>
                Create Post</a>
            </div>
            <hr>
       
        
        @if ($blogs->count() < 1 )
        <h3 class="text-center mt-4 font-italic" >No Blog Post </h3>
        @else
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="blogdatatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Options</th>
               
                </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $row)
                    <tr>
                     
                        <td>
                            {{$row->id}}
                        </td>
                        <td>
                          <a href="{{url('admin/post/'.$row->id)}}" class="">
                          <u>{{$row->title}}</u>
                          </a>
                        </td>
                        <td>
                          <a href="{{asset('admin/post/'.$row->id.'/edit')}}" class="m-2">
                            <i class="fas fa-pen"></i>
                          </a>
                        
                        
                        </td>
                        
                       
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Options</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
        @endif
    </div>
  </section>
@endsection

@push('scripts')
    <script>
      $(function () {
    $("#blogdatatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy"]
    }).buttons().container().appendTo('#blogdatatable_wrapper .col-md-6:eq(0)');
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