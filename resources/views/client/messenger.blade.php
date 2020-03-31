@extends('client.base')

@section('title','Account')

@section('body-id','dashboard')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My messages </h1>
            <a href="/messenger/new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-envelope fa-sm text-white-50"></i> New Message</a>
        </div>

        <table>
            <tbody>

                <tr>
                    <!--Content Row-->
                    <div class="row">
                        <div class="card shadow col-lg mb-lg-4">
                            <a href="/messenger/read/0001" class="btn">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-1 col-lg-2 col-xs-1  text-center support-statut">
                                            <img class="img-fluid" src="{{asset('assets/img/inbox-new.png')}}">
                                        </div>

                                        <div class="col-md-9 col-lg-8 col-xs-9">
                                            <h4 class="card-title"> Préparation aux épreuves de français - CAP et BTS</h4>

                                            <div class="card-description">
                                                <small>read more...</small>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-lg-2 col-xs-1 text-center support-statut">
                                            <i class="fa fa-calendar"></i>
                                            <span class="pull-right"> 26 février 2020</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </tr>

                <tr>
                    <!--Content Row-->
                    <div class="row">
                        <div class="card shadow col-lg mb-lg-4 alert-dark">
                            <a href="/messenger/read/0001" class="btn">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-1 col-lg-2 col-xs-1  text-center support-statut">
                                            <img class="img-fluid" src="{{asset('assets/img/inbox-new.png')}}">
                                        </div>

                                        <div class="col-md-9 col-lg-8 col-xs-9">
                                            <h4 class="card-title"> Préparation aux épreuves de français - CAP et BTS</h4>

                                            <div class="card-description">
                                                <small>read more...</small>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-lg-2 col-xs-1 text-center support-statut">
                                            <i class="fa fa-calendar"></i>
                                            <span class="pull-right"> 26 février 2020</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </tr>

            </tbody>
        </table>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
    <script src="{{asset('assets/js/messenger.js')}}"></script>
@endsection
