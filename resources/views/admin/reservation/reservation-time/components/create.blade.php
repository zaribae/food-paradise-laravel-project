@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Reservation Time</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Create New Reservation Time</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reservation-time.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Start Time</label>
                        <input name="start_time" id="title" type="text" class="form-control timepicker">
                    </div>
                    <div class="form-group">
                        <label for="title">Finish</label>
                        <input name="end_time" id="title" type="text" class="form-control timepicker">
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
