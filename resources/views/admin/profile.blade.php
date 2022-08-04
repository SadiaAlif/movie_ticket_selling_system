@extends('admin.partials.master')
@section('page-title')
  <title>Profile</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-2">
          <div class="card mb-2">
            <div class="card-body text-center">
              <img src="{{ asset('frontend/img/logos/alogo.png') }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">Admin</h5>
              <div class="d-flex justify-content-center mb-2">
               
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Admin</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">admin@gmail.com</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">02467897694</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"> Sector 12, Uttara 1230,Dhaka</p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection