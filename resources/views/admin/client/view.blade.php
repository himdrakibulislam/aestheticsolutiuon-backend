@extends('layouts.admin')
@section('title',$user->name)

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$user->name}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <div class="text-center">
                @if (!$user->photoURL)
                <img src="{{asset('assets/img/user.png')}}" alt="user" class="border rounded-circle p-2" width="200" height="200">
                    @else
                    <img src="{{asset($user->photoURL)}}" alt="user" class="border rounded-circle p-2" width="250" height="250">
                @endif
                <br>
                @if ($user->status === 1)
                    <small class="badge bg-danger">Suspended</small>
                    
                    @else
                    <small class="badge bg-success">Active</small>
                @endif
             </div>
             <div class="text-center">
                <h3>{{$user->name}}</h3>
                <p>{{$user->email}}</p>
                
              </div>
              @if ($user->email_verified_at)
             <p class="d-inline"><b class="m-3">Verified At : </b>
              <small>{{$user->email_verified_at }}</small>
            </p>
              @else
              <p class="d-inline badge bg-secondary">Unverified</p>
              @endif

              <div class="ml-3">
                
              @foreach ($user->address as $key=>$item)
              <div class="border border-secondary m-1 p-2 rounded">
                @if ($item->default === 1)
              <span class="badge bg-success float-right">Default</span>    
              @endif
              <p><b >Address {{$key+1}}</b>: {{$item->holding}} , 
              {{$item->street_address}}  ,

              {{$item->area}},
              {{$item->sub_district}},
              {{$item->district}} 


              <br>
              <small><b>Division : </b> {{$item->division}}</small>
            <br>
            <small> <b>ZIP-CODE :</b> {{$item->zipcode}}</small>
              
              </p>
              </div>
              @endforeach

              </div>


            <form 
            action="{{url('admin/user/status/'.$user->id)}}" method="POST" class="float-right">
                @csrf
                <select name="status" 
                class="form-control"
                required>
                   
                    <option value="0" 
                    @if ($user->status === 0)
                        selected
                    @endif>Active</option>
                    <option value="1"
                     @if ($user->status === 1)
                        selected
                    @endif>Suspended</option>
                </select>
               
                <button class="btn btn-success btn-sm mt-2 float-right" type="submit">Submit</button>
            </form>
            
            </div>
            
            <button type="button" class="btn btn-outline-danger btn-sm w-25 my-4" data-toggle="modal" data-target="#deleteUser">
              Delete User
            </button>



            <div class="modal fade" id="deleteUser"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Do you wanna delete  <b>{{$user->name}}</b> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    <form action="{{asset('admin/user/delete/'.$user->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
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

@push('custom-script')
    <script>
     
    </script>
@endpush