@extends('client.base')

@section('title','Account')

@section('body-id','dashboard')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Account</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Infos -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Owner : <span class="text-body account-owner">Nom Prénom</span></div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Account number : <span class="text-body account-number">22522236</span></div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Address : <span class="text-body account-address">numero nom_rue, nom_ville, code_postal,Pays</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOLDE -->
            <div class="col-xl-2 col-md-2 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Balance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 account-balance">40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- En attente -->
            <div class="col-xl-2 col-md-2 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 account-pending">215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Débit -->
            <div class="col-xl-2 col-md-2 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Unpaid</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 account-unpaid">-215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Bank Account</h1>
            <a href="/new/account" class="d-none d-sm-inline-block btn btn-sm btn-outline-warning shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Bank Account</a>
        </div>

        <!--Content Row-->
        <div class="row">
            <div class="card shadow col-lg mb-lg-4 border-bottom-warning">
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>IBAN</th>
                                <th>SWIFT/BIC</th>
                                <th>Account Currency</th>
                                <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>TigerBank</td>
                                <td>FR01252255565656565656</td>
                                <td>SOGEBJBJ</td>
                                <td>Euro</td>
                                <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Debit Card</h1>
            <a href="/new/card" class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Card</a>
        </div>

        <!--Content Row-->
        <div class="row">
            <div class="card shadow col-lg mb-lg-4 border-bottom-success">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Types of card</th>
                                <th>Card Number</th>
                                <th>Exp.Date</th>
                                <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Visa</td>
                                <td>1234 1234 1234 1234</td>
                                <td>10/2020</td>
                                <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
@section('js')
    <script src="{{asset('assets/js/synthesis.js')}}"></script>
@endsection
