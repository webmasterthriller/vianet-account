@extends('admin.base')

@section('title','Admin')

@section('body-id','operation')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
            <a href="/garant/new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> New garant</a>
        </div>

        <!--Content Row-->
        <div class="row">
            <div class="card shadow col-lg mb-lg-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-lg-left">Garant</h6>
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2011/04/25</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>$320,800</td>
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
