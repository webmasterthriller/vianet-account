@extends('client.base')

@section('title','Account')

@section('body-id','dashboard')

@section('base-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">New message</h1>
            <a href="/messenger" class="d-none d-sm-inline-block btn btn-sm btn-outline-dark shadow-sm"> Cancel</a>
        </div>

        <!--Content Row-->
        <div class="row">
            <div class="card shadow col-lg mb-lg-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-lg-left">Send a new message</h6>
                </div>
                <div class="card-body">
                    <form class="message-form">
                        <fieldset>
                            <legend>Message content</legend>
                            <div class="form-group row">
                                <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subject">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" height="100px"></textarea>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Attachment</legend>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                </div>
                            </div>
                        </fieldset>

                        <div>
                            <a href="" class="btn btn-success btn-block send-message">Send</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('js')
    <script src="{{asset('assets/js/new-message.js')}}"></script>
@endsection
