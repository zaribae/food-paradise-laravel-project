@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Reservation Time</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Reservation Time</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservation-time.update', @$reservationTime->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Start Time</label>
                        <input name="start_time" id="title" type="text" value="{{ @$reservationTime->start_time }}"
                            class="form-control timepicker">
                    </div>
                    <div class="form-group">
                        <label for="title">Finish</label>
                        <input name="end_time" id="title" type="text" value="{{ @$reservationTime->end_time }}"
                            class="form-control timepicker">
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option @selected(@$reservationTime->status === 1) value="1">Active</option>
                            <option @selected(@$reservationTime->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
