<meta name="_token" content="{!! csrf_token() !!}"/>
@extends('layouts.backend')
@section('title', 'User Info')
@section('breadcrumb')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Info</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection('breadcrumb')
@section('content')
    @include('commons.alert')
    <div class="card shadow mb-4">
        <div class="card-body">
{{--            <form action="{{route('users.update')}}" id=frm_user_edit" method="POST">--}}
                {!! csrf_field() !!}
                <input type="hidden" name="_id">
                <div class="panel panel-default">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">

                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <span class="fa-5x fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-user fa-stack-1x fa-inverse"></i></span>
                                            </div>

                                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                            <p class="text-muted text-center">Full Stack Engineer</p>

                                            <div class="card-body">
                                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                                <p class="text-muted">
                                                    B.B.A from the PRINCE OF SONGKLA UNIVERSITY
                                                </p>

                                                <hr>

                                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                                <p class="text-muted">Bang na, Bangkok</p>

                                                <hr>

                                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                                <p class="text-muted">No Comment.</p>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col -->
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#userinfo" data-toggle="tab">User Info</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <!-- /.tab-pane -->
                                                <div class="active tab-pane" id="userinfo">
                                                    <form class="form-horizontal">
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane" id="settings">
                                                    @include('pages.users.components.user-setting')
                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <div class="col-xs-12 form-group" align="right">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-save" role="presentation" aria-hidden="true"></i> Submit
                        </button>
                    </div>
                </div>
{{--            </form>--}}
        </div>
    </div>
@endsection('content')
@push('styles')
    @include('pages.users.css.default')
@endpush
@include('pages.users.js.info-script')
