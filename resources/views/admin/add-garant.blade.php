@extends('admin.base')

@section('title','Admin')

@section('body-id','garant')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create new garant</h1>
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
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
