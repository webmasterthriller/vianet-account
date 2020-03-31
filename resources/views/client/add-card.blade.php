@extends('client.base')

@section('title','Card')

@section('body-id','account')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">synchronize a new card</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- formulaire -->
            <div class="col-xl-4 col-md-4 mb-4">
                <h2 class="h5 mb-0 text-center border-0 border-bottom-danger">Card info</h2>
                <div class="p-5">
                    <form class="card-form">
                        <div class="form-group">
                            <label class="" for="">Card Number</label>
                            <input class="form-control" type="text" placeholder="Ex : 1234 1234 1234 1234">
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-4">
                                <div class="form-group">
                                    <label class="" for="">Exp/date</label>
                                    <input class="form-control" type="text" placeholder="Ex : 01/2020">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-4">
                                <div class="form-group">
                                    <label class="" for="">CVV</label>
                                    <input class="form-control" type="password" placeholder="Ex : 123">
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="" class="btn btn-primary btn-block add-card">Done
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Confirmation -->
            <div class="col-xl-4 col-md-4 mb-4">
                <h2 class="h5 mb-0 text-center border-0 border-bottom-warning">Security code</h2>
                <div class="p-5">

                    <form class="card-form">
                        <div class="form-group">
                            <label class="" for="">Enter the code we email you</label>
                            <input class="form-control" type="text">
                        </div>

                        <div>
                            <a href="" class="btn btn-primary btn-block add-card">Validate
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Message -->
            <div class="col-xl-4 col-md-4 mb-4">
                <h2 class="h5 mb-0 text-center border-0 border-bottom-info">Confirmation</h2>
                <div class="p-5">
                    <p class="text-justify">
                        La demande d'ajout de votre carte est en cours... Vous recevrez un message.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
    <script src="{{asset('assets/js/add-card.js')}}"></script>
@endsection
