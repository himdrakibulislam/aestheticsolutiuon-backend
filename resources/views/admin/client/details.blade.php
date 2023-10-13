@extends('layouts.admin')
@section('title','Client Details')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Client</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th><span class="text-info">{{$client->name}}</span></th>            
                </tr>
                <tr>
                  <th>Email</th>
                  <th><span class="text-info">{{$client->email}}</span></th>            
                </tr>
                <tr>
                  <th>Service Type</th>
                  <th><span class="text-info">{{$client->service_type}}</span></th>            
                </tr>
                <tr>
                  <th>Budget</th>
                  <th><span class="text-info">
                    BDT  {{$client->budget}} </span></th>            
                </tr>
                <tr>
                  <th>Estimated time</th>
                  <th><span class="text-info">
                      {{$client->es_time}} </span></th>            
                </tr>
                </thead>
              </table>

              <div class="my-2 mx-2 text-justify">
                {{$client->description}}
              </div>

              <button class="btn btn-danger w-50"
            data-toggle="modal" data-target="#deleteClient"
            >Detele</button>



            <div class="modal fade" id="deleteClient" tabindex="-1" role="dialog" aria-labelledby="deleteClientTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      Do you want to delete this Client Request ? 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    <form action="{{url('admin/client/delete/'.$client->id)}}" method="POST">
                      @csrf
                      @method('Delete')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
         
</script>
@endpush