@extends('admin.partials.master')

@section('page-title')
  <title>Movies Edit</title>
@endsection

@section('page-content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body  mt-3">
          
          <form action="{{ route('admin.movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies Name</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="name"
                    placeholder=" movies name"
                    value="{{ $movie->name }}"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies Photo</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="file"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="photo"
                    placeholder="name"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />

                  
                </div>
                <a href="/storage/{{  $movie->photo }}" target="_blank">Current photo</a>
              </div>
            </div>
            
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies Genre</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <select class="form-select" name="category_name" aria-label="Default select example">
                    <option selected>Select Genre</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->name }}" @if($item->name == $movie->category_name) selected @endif>{{ $item->name }}</option>
                    @endforeach
                    
                  </select>
                    
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies Description</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>

                  <textarea name="description" class="form-control" >{{ $movie->description }}</textarea>
                    
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Price</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="price"
                    placeholder=" movies price"
                    value="{{ $movie->price }}"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Ticket Quantity</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="booking_status"
                    placeholder="movie ticket quantity"
                    aria-label=""
                    value="{{ $movie->booking_status }}"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies Duration</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="duration"
                    placeholder=" movies duration"
                    aria-label=""
                    value="{{ $movie->duration }}"
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Show Time</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    name="show_time"
                    placeholder=" show time"
                    aria-label=""
                    aria-describedby="basic-icon-default-fullname2"
                  />
                    
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Show Date</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bx-category' ></i></span>
                    <input class="form-control" type="date" name="show_date" placeholder="Transaction ID">
                    
                </div>
              </div>
            </div>
            
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection