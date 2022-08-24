@extends('admin.partials.master')

@section('page-title')
  <title>Ticket List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Ticket</h5>

    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Movie Name</th>
            <th>User Name</th>
            <th>Price</th>
            <th>Time</th>
            <th>Date</th>
            <th>Branch</th>
            <th>Ticket Number</th>
            <th>Method</th>
            <th>TNX</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($tickets as $key => $ticket)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $ticket->movie_name }}</td>
            <td>{{ $ticket->user_name }}</td>
            <td>{{ $ticket->price }}</td>
            <td>{{ $ticket->show_time }}</td>
            <td>{{ $ticket->show_date }}</td>
            <td>{{ $ticket->branch }}</td>
            <td>{{ $ticket->ticket_number }}</td>
            <td>{{ $ticket->method }}</td>
            <td>{{ $ticket->tnx_id }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection