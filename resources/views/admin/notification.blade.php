@extends('layouts.admin')
@section('title','Notifications')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid row p-2">
      
            <div class="col-md-2"></div>
            <div class="col-md-8">
              @if ($notifications->count() > 0)
              <h3 class="d-inline"> <span class="text-green">{{$notifications->count()}}</span> Notifications</h3>
      
             
              
              @if ($notifications->count() > 0)
              <a href="{{route('clear.notification')}}" class="float-right "><u>Clear All Notification</u></a>
              @endif 
              <div class="dropdown-divider"></div>
      
              <div class="mt-2">
                @foreach ($notifications as $notification)
                
                <div class="border rounded my-2 py-3 px-2">
                 
                  <h4 class=""> <i class="fas fa-bell mr-2"></i>    
                    {{$notification->data['notification']}}</h4>
      
                 
                </div>
                
                @endforeach
              </div>
              @else 
              <h2 class="text-center font-weight-bold my-4">No Notifications</h2>
              @endif
            </div>
            <div class="col-md-2"></div>
               
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