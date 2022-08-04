@extends('admin.partials.master')

@section('page-title')
  <title>Movie</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Movie</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Category_name</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Booking_Status</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($movies as $key => $movie)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $movie->name }}</td>
            <td>{{ $movie->photo }}</td>
            <td>{{ $movie->category_name}}</td>
            <td>{{ $movie->description }}</td>
            <td>{{ $movie->duration }}</td>
            <td>{{ $movie->booking_Status}}</td>
            <td>
              <a class="btn btn-danger" href="{{route('admin.movie.delete',$movie->id)}}" 
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