@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Update Contact Page</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="video-link">Phone 1</label>
                        <input name="phone_1" id="video-link" type="text" class="form-control"
                            value="{{ @$contact->phone_1 }}">
                    </div>
                    <div class="form-group">
                        <label for="video-link">Phone 2</label>
                        <input name="phone_2" id="video-link" type="text" class="form-control"
                            value="{{ @$contact->phone_2 }}">
                    </div>
                    <div class="form-group">
                        <label for="video-link">Email 1</label>
                        <input name="email_1" id="video-link" type="text" class="form-control"
                            value="{{ @$contact->email_1 }}">
                    </div>
                    <div class="form-group">
                        <label for="video-link">Email 2</label>
                        <input name="email_2" id="video-link" type="text"
                            class="form-control"value="{{ @$contact->email_2 }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Address</label>
                        <textarea name="address" id="long" type="text" class="form-control">{{ @$contact->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="video-link">Address Map Link</label>
                        <input name="map_address_link" id="video-link" type="text" class="form-control"
                            value="{{ @$contact->map_address_link }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
