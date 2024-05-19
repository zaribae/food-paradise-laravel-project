@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <div class="card card-primary col-lg-9">
            <div class="card-header">
                <h4>All Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="general-setting-tab" data-toggle="tab"
                                    href="#general-setting" role="tab" aria-controls="general-setting"
                                    aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                    aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                    aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade active show" id="general-setting" role="tabpanel"
                                aria-labelledby="general-setting-tab">
                                <div class="card-header">
                                    <h5>General Settings</h5>
                                </div>
                                <div class="card-body border">
                                    <form action="{{ route('admin.setting.general-setting.update') }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="site-name">Site Name</label>
                                            <input type="text" name="site_name" class="form-control" id="site-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="default-currency">Default Currency</label>
                                            <select name="site_default_currency" id="default-currency"
                                                class="select2 form-control">
                                                <option value="idr">Indonesia Rupiah (IDR)</option>
                                                <option value="usd">America Dollar (USD)</option>
                                                <option value="eur">Euro (EUR)</option>
                                                <option value="gbp">Poundsterling (GBP)</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="currency-icon">Currency Icon</label>
                                                    <input name="site_currency_icon" type="text" class="form-control"
                                                        id="currency-icon">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="default-currency">Currency Icon Position</label>
                                                    <select name="site_currency_icon_position" id=""
                                                        class="select2 form-control">
                                                        <option value="right">Right</option>
                                                        <option value="left">Left</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est
                                lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin
                                quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis
                                neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec
                                hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                            </div>
                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula
                                massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem
                                interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam
                                malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut
                                ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
