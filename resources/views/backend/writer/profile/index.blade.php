@extends('backend.layouts.writer')
@section('title', 'Rehab Review List')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Profile Information</h5>
                                <p class="text-sm mb-0">
                                    
                                </p>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <a href="{{ url(Request::segment(1) .'/writer-profile/'.(encrypt(Auth::id()).'/edit/')) }}"
                                    class="btn bg-gradient-primary btn-sm mb-0">Update Profile</a>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-flush" id="products-list">
                                
                                <tbody>
                                    <tr>
                                        <td> <b>Name </b>:  {{Auth::user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Phone </b>:  {{Auth::user()->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Email </b>:  {{Auth::user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>UserName </b>:  {{Auth::user()->username}}</td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   
