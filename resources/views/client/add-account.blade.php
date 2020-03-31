@extends('client.base')

@section('title','Account')

@section('body-id','account')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">synchronize a new bank account</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- formulaire -->
            <div class="col-xl-4 col-md-4 mb-4">
                <h2 class="h5 mb-0 text-center border-0 border-bottom-danger">Bank Account Info</h2>
                <div class="p-5">
                    <form class="card-form">
                        <div class="form-group">
                            <label class="" for="">Name of bank</label>
                            <input class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label class="" for="">IBAN</label>
                            <input class="form-control" type="text">
                        </div>

                        <div class="form-group">
                            <label class="" for="">SWIFT/BIC</label>
                            <input class="form-control" type="text">
                        </div>

                        <div>
                            <a href="" class="btn btn-warning btn-block add-card">Add Account</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Confirmation -->
            <div class="col-xl-4 col-md-4 mb-4">
                <h2 class="h5 mb-0 text-center border-0 border-bottom-warning">Validation code</h2>
                <div class="p-5">

                    <form class="card-form">
                        <div class="alert alert-info">
                            <p class="text-justify validation-message">
                                Pour confirmer votre identité, vous devez entrer le code de validation envoyé par Email.
                            </p>
                        </div>

                        <div class="form-group">
                            <label class="" for="">Enter the code we email you</label>
                            <input class="form-control" type="email">
                        </div>

                        <div>
                            <a href="" class="btn btn-success btn-block add-card">Validate
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Message -->
            <div class="col-xl-4 col-md-4 mb-4">
                <h2 class="h5 mb-0 text-center border-0 border-bottom-info">Confirmation</h2>
                <div class="p-5">
                    <p class="alert alert-success text-justify">
                        La demande d'ajout de votre carte est en cours... Vous recevrez un message.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
<script src="{{asset('assets/js/add-account.js')}}"></script>
@endsection
