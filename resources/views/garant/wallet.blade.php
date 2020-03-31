@extends('garant.base')

@section('title','Account')

@section('body-id','dashboard')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wallet</h1>
            <a href="/loan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-history fa-sm text-white-50"></i> Loan offer</a>
        </div>

        <!--  Content Row -->
        <div class="row">
            <!-- Infos -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Owner : <span class="text-body wallet-owner">Nom Prénom</span></div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Address : <span class="text-body wallet-address">numero nom_rue, nom_ville, code_postal,Pays</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOLDE -->
            <div class="col-xl-3 col-md-3 mb-4">
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

            <!-- Débit -->
            <div class="col-xl-3 col-md-3 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Loan</div>
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

        <!--  Content Row -->
        <div class="row">
            <div class="card shadow col-lg mb-lg-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-lg-left">Last loan offer</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>On</th>
                                <th>Identification</th>
                                <th>Type of operation</th>
                                <th>Amount</th>
                                <th>More</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>$320,800</td>
                                <td><button class="alert-danger">Voir</button></td>
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
