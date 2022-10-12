@extends('admin.partials.master')

@section('page-title')
  <title>Branch</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Branch</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Branch Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($branches as $key => $branch)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $branch->name }}</td>
            <td>
              <a class="btn btn-primary " href="{{route('admin.branch.edit', $branch->id)}}" ><i class="fas fa-edit"></i> Edit</a>
              <a class="btn btn-danger" href="{{route('admin.branch.delete',$branch->id)}}" 
                onclick="return confirm ('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection