@extends('admin.partials.master')

@section('page-title')
  <title> Admin Dashboard</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card side">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  
                  <img
                    src="{{ asset('backend/img/icons/unicons/movies.png') }}" 
                    alt="chart success"
                    class="rounded"
                  />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1 text-dark"> Movies</span>
              <h3 class="card-title mb-2 text-dark">{{ $total_movie }}</h3>
             
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card side">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  
                  <img
                    src="{{ asset('backend/img/icons/unicons/cus.png') }}"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1 text-dark"> Total Users</span>
              <h3 class="card-title text-nowrap mb-1 text-dark">{{$total_users}}</h3>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-6 mb-4">
          <div class="card side">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{ asset('backend/img/icons/unicons/Ticket.png') }}" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1 text-dark">Total Ticket Sell</span>
              <h3 class="card-title text-nowrap mb-2 text-dark">{{ $total_sell }}</h3>
              
            </div>
          </div>
        </div>

        <div class="col-6 mb-4">
          <div class="card side">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{ asset('backend/img/icons/unicons/pay.png') }}" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1 text-dark">Total Amount</span>
              <h3 class="card-title text-nowrap mb-2 text-dark">{{ $total_amount }} TK</h3>
              
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div id="chart_div" style="height: 500px;"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawStacked);

    let chart_data = @json($chart_data);

    function drawStacked() {
      var data = google.visualization.arrayToDataTable(chart_data);

      var options = {
        bars: 'vertical', // Required for Material Bar Charts.
        is3D: true,
        colors:['#6610f2'],
      };
      var chart = new google.charts.Bar(document.getElementById('chart_div'));
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
@endpush