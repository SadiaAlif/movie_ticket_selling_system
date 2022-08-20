@extends('user.partials.master')

@section('page-title')
  <title>Ticket List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card" id="printableArea">
    <h5 class="card-header">All Ticket</h5>

    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Movie Name</th>
            <th>Price</th>
            <th>Time</th>
            <th>Date</th>
            <th>Ticket Number</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($tickets as $key => $ticket)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $ticket->movie_name }}</td>
            <td>{{ $ticket->price }}</td>
            <td>{{ $ticket->show_time }}</td>
            <td>{{ $ticket->show_date }}</td>
            <td>{{ $ticket->ticket_number }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <button type="button" class="btn btn-success m-3" onclick="printDiv('printableArea')">Download Invoice</button>
</div>
@endsection