@extends('admin.partials.master')

@section('page-title')
  <title>User</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y" id="printableArea">
  <div class="card">
    <h5 class="card-header">All User</h5>
    {{-- search --}}
    <form action="">
      <input type="search" name="search" id="" placeholder="Search by user name" value="{{ $search }}">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>

    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($users as $key => $user)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
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