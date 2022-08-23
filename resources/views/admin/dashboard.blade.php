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
                    src="{{ asset('backend/img/icons/unicons/movie.png') }}"
                    alt="chart success"
                    class="rounded"
                  />
                </div>
              </div>
              <span class="fw-semibold d-block mb-1 text-dark" >Movies</span>
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
                    src="{{ asset('backend/img/icons/unicons/customers.png') }}"
                    alt="Credit Card"
                    class="rounded"
                  />
                </div>
              </div>
              <span class="text-dark"> Total Customers</span>
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
                  <img src="{{ asset('backend/img/icons/unicons/ticket.png') }}" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1 text-dark">Total Ticket Sell</span>
              <h3 class="card-title text-nowrap mb-2 text-dark">{{ $total_sell }}</h3>
              
            </div>
          </div>
        </div>

        <div class="col-6 mb-4">
          <div class="card side">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="{{ asset('backend/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                </div>
              </div>
              <span class="d-block mb-1 text-dark">Total Amount</span>
              <h3 class="card-title text-nowrap mb-2 text-dark">{{ $total_amount }} TK</h3>
              
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection

