@extends('layouts.admin')
@section('title','Orders')

@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Orders</h3>

              <a href="{{url('admin/orders/history')}}" class="btn btn-secondary btn-sm float-right "><i class="fas fa-history"></i> Order History</a>
            </div>
            <!-- /.card-header -->
            @if (!$orders->count() <= 0)
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>OrderId </th>
                  <th>Customer  </th>
                 
                  <th>Address</th>
                  <th>Date</th>
                  <th>Total</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                
                </tr>
                </thead>
               <tbody>
               @foreach ($orders as $key=>$row)
               <tr>
                <td>{{++$key}}</td>
                <td>#{{$row->order_number}}</td>
                <td>{{$row->name}}</td>
               
                <td>
                   
                   <p> 
                    <span>{{$row->address}}</span>
                    <br>
                    <span>  {{$row->sub_district}},</span>
                    <br>
                    <span>  {{$row->district}},</span>
                    
                    <span> {{$row->division}}</span>
                                  
                   
                   </p>
                </td>
                <td>
                  {{date('d / F / Y',strtotime($row->created_at))}}
                
                </td>
                <td>
                <h5>&#2547; {{$row->total}}</h5>
                </td>
                <td>
                 @if ($row->order_status === 0 )
                     <span class="text-secondary border p-1">Pending</span>
                 @endif
                 @if ($row->order_status === 1 )
                     <span class="text-secondary border p-1">Processing</span>
                 @endif
                </td>
            
                <td>
                    
                        <a class="nav-link float-right" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v"></i>
                         
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                         
                    

                     
                          <a href="{{url('admin/order-details/'.$row->id)}}" class="btn btn-success w-100">
                            Details 
                          </a>


                          <div class="dropdown-divider"></div>
                          
                          
                          </div>
                     
                </td>
               </tr>
               @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <tr>
                    <th>#</th>
                    <th>OrderId </th>
                    <th>Customer  </th>
                   
                    <th>Address</th>
                    <th>Date</th>
                    <th>Total</th>
                    
                    <th>Status</th>
                    <th>Action</th>
                  
                  </tr>
                  
                  
                </tr>
                </tfoot>
              </table>

             
            </div>
                @else
                <h3 class="text-center my-3">No Orders</h3>
            @endif
            {{$orders->links()}}
            <!-- /.card-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

