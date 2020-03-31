@extends('admin.base')

@section('title','Account')

@section('body-id','operation')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Initiate a new transfer</h1>
            <a href="/transaction/all" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-history fa-sm text-white-50"></i> History</a>
        </div>

        <!--Content Row-->
        <div class="row">
            <div class="card shadow col-lg mb-lg-4">
                <div class="card-body">
                    <form class="">
                        <div class="row">
                            <div class="col-lg">
                                <fieldset>
                                    <legend>Beneficiary data</legend>
                                    <div class="form-group">
                                        <label>IBAN</label>
                                        <select class="form-control account-iban">
                                            <option value="">---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>SWIFT/BIC</label>
                                        <input class="form-control bank-swift">
                                    </div>
                                </fieldset>
                                <a href="" class="btn btn-outline-danger btn-block cancel-transaction">Cancel</a>
                            </div>
                            <div class="col-lg">
                                <fieldset>
                                    <legend>transfer data</legend>
                                    <div class="form-group">
                                        <label>Type of Transfer</label>
                                        <select class="form-control account-iban">
                                            <option value="">Normal</option>
                                            <option value="">Quick</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input class="form-control transfer-amount">
                                    </div>
                                </fieldset>
                                <a href="" class="btn btn-outline-success btn-block make-transaction">Proceed</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="py-2 alert alert-info text-center text-danger">La transaction s'est bien déroulée.</div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
