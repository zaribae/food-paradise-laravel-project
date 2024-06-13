@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Socials Link</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>Edit Social Link</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-link.update', @$socialLink->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="icon">Socials Icon</label>
                        <br>
                        <button data-icon="{{ @$socialLink->icon }}" class="btn btn-primary" role="iconpicker"
                            name="icon" id="icon"></button>
                    </div>
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input name="name" id="title" type="text" value="{{ @$socialLink->name }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Link</label>
                        <input name="link" id="title" type="text" value="{{ @$socialLink->link }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="select">Status</label>
                        <select name="status" class="form-control" id="select">
                            <option @selected(@$socialLink->status === 1) value="1">Active</option>
                            <option @selected(@$socialLink->status === 0) value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
