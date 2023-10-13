@extends('layouts.admin')
@section('title', $team->name)

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->
    <div class="modal fade" id="deleteteam" tabindex="-1" role="dialog" aria-labelledby="deleteteamTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">
                Delete Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             Do you want to delete this member?
           
             <div class="modal-footer">
             <button type="button" class="btn btn-dark btn-sm w-25" data-dismiss="modal">No</button>
             <form action="{{url('admin/team/'.$team->id.'/delete')}}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm w-100">
             
                Yes</button>
             </form> 
             </div>
            </div>
            
          </div>
        </div>
      </div>
    <!-- Main content -->
    <section class="content">
  
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Team Member Profile</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
        
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-3">
        
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="{{asset($team->profile)}}"
                               alt="User profile picture">
                        </div>
        
                        <h3 class="profile-username text-center">{{$team->name}}</h3>
        
                        <p class="text-muted text-center">{{$team->designation}}</p>
        
                       
                    
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
        
                    <!-- About Me Box -->
                 
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-9">
                    <div class="card">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Information</a></li>
                          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Biodata</a></li>
                        
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="active tab-pane" id="activity">
                            <!-- Post -->
                           <table class="table">
                            <thead>
                               @if ($team->phone)
                               <tr>
                                <th class="col">Contact Number</th>
                                <th class="col">{{$team->phone}}</th>
                            </tr>
                               @endif
                                @if ($team->facebook)
                                <tr>
                                    <th class="col">Facebook</th>
                                    <th class="col">
                                        <a 
                                        href="{{$team->facebook}}"
                                        target="_blank"
                                        >{{$team->facebook}}
                                    </a>
                                    </th>
                                </tr>
                                @endif
                                @if ($team->instagram)
                                <tr>
                                    <th class="col">Instagram</th>
                                    <th class="col">
                                        <a 
                                        href="{{$team->instagram}}"
                                        target="_blank"
                                        >{{$team->instagram}}
                                    </a>
                                    </th>
                                </tr>
                                @endif
                                @if ($team->linkedin)
                                <tr>
                                    <th class="col">Linkedin</th>
                                    <th class="col">
                                        <a 
                                        href="{{$team->linkedin}}"
                                        target="_blank"
                                        >{{$team->linkedin}}
                                    </a>
                                    </th>
                                </tr>
                                @endif
                            </thead>
                           </table>
                            <!-- /.post -->
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                           {!! $team->biodata !!}
                          </div>
                          <!-- /.tab-pane -->
        
                        
                          <!-- /.tab-pane -->
                        </div>
                        <button type="button" class="float-right btn btn-danger  btn-sm ml-2 " data-toggle="modal" data-target="#deleteteam">
                            <i class="fas fa-trash"></i> Delete 
                          </button>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


