@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 ">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="#">Home</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$projects}}</h3>
                <p>Projects</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('admin/projects')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$categories}}</h3> 

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{url('admin/categories')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$clients}}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('admin/clients')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div id="contract" data-contract="{{$contractChart}}">
          <canvas id="contractChart"></canvas>
        </div>
        <!-- Small boxes (Stat box) -->

        
        <!-- /.row -->
        
        <!-- Main row -->
        <a href="{{route('optimize.clear')}}" class="btn btn-dark my-2 ">Clear Server Cache</a>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@push('custom-scripts')
<script>
   function getMonthName(monthNumber) {
        const date = new Date();
        date.setMonth(monthNumber - 1); // Subtract 1 since month numbers are zero-based in JavaScript

        const options = { month: 'long' };
        return date.toLocaleString('en-US', options);
      }
      
  const ctx = document.getElementById('contractChart');
  const subscriptionChart = document.getElementById('contract').getAttribute('data-contract');
  const Contractdata = JSON.parse(subscriptionChart);

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: Contractdata.map(row => getMonthName(row.month)),
      datasets: [
        {
            label: 'Contract by month',
            data: Contractdata.map(row => row.total),
            borderWidth: 1
          }  
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   
@endpush
