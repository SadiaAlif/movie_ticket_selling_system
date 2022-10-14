@extends('admin.partials.master')

@section('page-title')
  <title>Contact List</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y" id="printableArea">
  <div class="card">
    <h5 class="card-header">All Contact</h5>
    <form action="">
      <input type="search" name="search" id="" placeholder="Search by user name" value="{{ $search }}">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($contacts as $key => $contact)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject }}</td>
            <td>{{ $contact->message }}</td>
            <td>{{ Carbon\Carbon::parse($contact->created_at)->format('d-m-Y') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <button type="button" class="float-right btncol m-3" onclick="printDiv('printableArea')">Download</button>
</div>
<script>
  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
  }
</script>
@endsection