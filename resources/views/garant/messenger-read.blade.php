@extends('garant.base')

@section('title','Account')

@section('body-id','dashboard')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My messages </h1>
            <a href="/garant/message/new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-envelope fa-sm text-white-50"></i> Reply</a>
        </div>

        <div class="row">
            <div class="card shadow col-lg mb-lg-4">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="h3 text-dark">
                                Message de votre professeur BARENGER Frédéric
                            </h3>
                        </div>

                        <div class="col-md-4 text-right">
                            <span class="mailbox-read-time pull-right"><i class="fa fa-calendar fa-xs"></i> 28 février 2019</span>
                        </div>
                    </div>
                    <hr>
                    <div class="mailbox-read-message">
                        <div>
                            <p>Bonjour,</p>

                            <p>Je n'ai pas réussi à vous contacter les numéros que vous avez laissé ne fonctionne pas</p>

                            <p>Cordialement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
