@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>
        <div class="card card-primary col-lg-12 p-3">
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
                                <a class="nav-link" id="logo-setting-tab" data-toggle="tab" href="#logo-setting"
                                    role="tab" aria-controls="logo-setting" aria-selected="false">Site Logo
                                    Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="appearance-setting-tab" data-toggle="tab" href="#appearance-setting"
                                    role="tab" aria-controls="appearance-setting" aria-selected="false">Appearance
                                    Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#pusher-settings"
                                    role="tab" aria-controls="pusher-settings" aria-selected="false">Pusher Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="mail-settings-tab" data-toggle="tab" href="#mail-settings"
                                    role="tab" aria-controls="mail-settings" aria-selected="false">Mail Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="seo-settings-tab" data-toggle="tab" href="#seo-settings"
                                    role="tab" aria-controls="seo-settings" aria-selected="false">SEO Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            {{-- General Setting Section --}}
                            @include('admin.setting.section.general-setting')

                            {{-- Logo Setting Section --}}
                            @include('admin.setting.section.logo-setting')

                            {{-- Appearance Setting Section --}}
                            @include('admin.setting.section.appearance-setting')

                            {{-- Pusher Setting Section --}}
                            @include('admin.setting.section.pusher-setting')

                            {{-- Pusher Setting Section --}}
                            @include('admin.setting.section.mail-settings')

                            {{-- SEO Setting Section --}}
                            @include('admin.setting.section.seo-settings')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
