@extends('admin.partials.master')

@section('page-title')
    <title>Movies Edit</title>
@endsection

@section('page-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="card-body  mt-3">

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
                <form action="{{ route('admin.movie.update', $movie->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class='bx bx-category'></i></span>
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
                  ><i class='bx bx-category'></i></span>
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
                  ><i class='bx bx-category'></i></span>
                                <select class="form-select" name="category_name" aria-label="Default select example">
                                    <option selected>Select Genre</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->name }}"
                                                @if($item->name == $movie->category_name) selected @endif>{{ $item->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Branch</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class='bx bx-category'></i></span>
                                <select class="form-select" name="branch_name" aria-label="Default select example">
                                    <option selected>Select Branch</option>
                                    @foreach ($branches as $item)
                                        <option value="{{ $item->name }}" {{ $item->name == $movie->branch_name ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Movies
                            Description</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class='bx bx-category'></i></span>

                                <textarea name="description" class="form-control">{{ $movie->description }}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Price</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                  ><i class='bx bx-category'></i></span>
                                <input
                                        type="number"
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
                  ><i class='bx bx-category'></i></span>
                                <input
                                        type="number"
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
                  ><i class='bx bx-category'></i></span>
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
                    <div class="row text-end mb-2">
                        <div class="col-sm-12">
                            <a href="javascript:void(0)" class="btn btn-primary add_new_date"><i class="bx bx-plus"></i>Add
                                New Date</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="date_tbody">
                                @foreach ($movie->movieDates as $item)
                                    <tr>
                                        <td>
                                            <input style="margin-top: 65px" type="date" name="date[]"
                                                   class="form-control date" value="{{ $item->date }}">
                                        </td>
                                        <td>
                                            <table>
                                                <tbody class="time_tbody">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-end"><a href="javascript:void(0)"
                                                                            class="btn btn-primary add_time_row"><i
                                                                    class="bx bx-plus"></i></a></td>
                                                </tr>
                                                @foreach ($item->movieTimes as $time)
                                                    <tr>
                                                        <td width="10%">
                                                            <label>Start Time</label>
                                                            <input type="time" name="start_time[{{ $item->date }}][]"
                                                                   class="form-control start_time" value="{{ $time->start_time }}">
                                                        </td>
                                                        <td width="10%">
                                                            <label>End Time</label>
                                                            <input type="time" name="end_time[{{ $item->date }}][]"
                                                                   class="form-control end_time" value="{{ $time->end_time }}">
                                                        </td>
                                                        <td width="10%">
                                                            <div style="margin-top: 23px;">
                                                                <a href="javascript:void(0)"
                                                                   class="btn btn-danger remove_time_row"><i
                                                                            class="bx bx-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-danger remove_row"><i
                                                        class="bx bx-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
    <div class="modal">
        <table>
            <tr class="tr_append">
                <td>
                    <input style="margin-top: 65px" type="date" name="date[]" class="form-control date">
                </td>
                <td>
                    <table>
                        <tbody class="time_tbody">
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-end"><a href="javascript:void(0)" class="btn btn-primary add_time_row"><i
                                            class="bx bx-plus"></i></a></td>
                        </tr>
                        <tr>
                            <td width="10%">
                                <label style="margin-top: 10px">Start Time</label>
                                <input type="time" name="start_time[]" class="form-control mr-1 start_time">
                            </td>
                            <td width="10%">
                                <label style="margin-top: 10px">End Time</label>
                                <input type="time" name="end_time[]" class="form-control end_time">
                            </td>
                            <td width="10%">
                                <div style="margin-top: 30px;">
                                    <a href="javascript:void(0)" class="btn btn-danger remove_time_row"><i
                                                class="bx bx-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-primary remove_row"><i class="bx bx-trash"></i></a>
                </td>
            </tr>
            <tr class="time_row">
                <td width="10%">
                    <label style="margin-top: 10px">Start Time</label>
                    <input type="time" name="start_time[]" class="form-control start_time">
                </td>
                <td width="10%">
                    <label style="margin-top: 10px">End Time</label>
                    <input type="time" name="end_time[]" class="form-control end_time">
                </td>
                <td width="10%">
                    <div style="margin-top: 30px;">
                        <a href="javascript:void(0)" class="btn btn-danger remove_time_row"><i class="bx bx-trash"></i></a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@endsection
@push('js')

    <script>
        $(document).ready(function () {
            $(document).on('click', '.add_new_date', function () {
                $('.modal .tr_append').clone().appendTo('.date_tbody');
            });
            $(document).on('click', '.remove_row', function () {
                $(this).closest('tr').remove();
            });
            $(document).on('click', '.add_time_row', function () {
                let val = $(this).closest('.date_tbody').find('.date').val();
                let selector = $(this).closest('tr').find('.time_tbody');
                assignValue(selector, val)
                $('.modal .time_row').clone().appendTo($(this).closest('tbody'));
            });
            $(document).on('click', '.remove_time_row', function () {
                $(this).closest('tr').remove();
            });
            $(document).on('change', '.date', function () {
                let selector = $(this).closest('tr').find('.time_tbody');
                let val = $(this).val();
                assignValue(selector, val)
            });
        });

        function assignValue(selector, val) {
            selector.find('.start_time').each(function () {
                $(this).attr('name', 'start_time[' + val + '][]');
            });
            selector.find('.end_time').each(function () {
                $(this).attr('name', 'end_time[' + val + '][]');
            });
        }
    </script>
@endpush