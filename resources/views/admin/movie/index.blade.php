@extends('admin.partials.master')

@section('page-title')
  <title>Movie</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">All Movie</h5>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive text-nowrap">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Category_Name</th>
            <th>Price</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($movies as $key => $movie)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $movie->name }}</td>
            <td><img src="/storage/{{ $movie->photo }}" alt="" height="70" width="70"></td>
            <td>{{ $movie->category_name}}</td>
            <td>{{ $movie->price }}</td>
            <td>{{ $movie->duration }}</td>
            <td>
              @if ($movie->booking_status > 0)
                  <strong class="badge bg-success">{{ $movie->booking_status }} Available</strong>
              @else
              <strong class="badge bg-danger">Unavailabe</strong>
              @endif
            </td>
            <td>
              <a class="btn btn-primary btn-sm" href="{{route('admin.movie.edit', $movie->id)}}" ><i class="fas fa-edit"></i> Edit</a>
              <a class="btn btn-danger btn-sm" href="{{route('admin.movie.delete',$movie->id)}}" 
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