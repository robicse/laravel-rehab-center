@extends('backend.layouts.master')
@section('title', 'Settings')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Setting</h5>
                            <p class="text-sm mb-0">
                                A Setting layout data.
                            </p>
                        </div>
                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route(Request::segment(1) . '.artisanCommand') }}"
                                    class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Command</a>

                                <a href="{{ route(Request::segment(1) . '.smtpIndex') }}"
                                    class="btn bg-gradient-info btn-sm mb-0">+&nbsp; SMTP </a>

                            </div>
                        </div>

                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table id="datatable-basic" class="table table-flush" id="products-list">

                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Name : {{@$settingDetail->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Title : {{@$settingDetail->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone : {{@$settingDetail->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email : {{@$settingDetail->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address : {{@$settingDetail->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Meta Description : {{@$settingDetail->meta_description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description : {{@$settingDetail->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Icon : <img src="{{ url(Storage::url(@$settingDetail->favicon)) }}"
                                                height="50" width="50">
                                             </td>
                                    
                                        <td>Logo : <img src="{{ url(Storage::url(@$settingDetail->logo)) }}" height="50"
                                                width="50">
                                             </td>

                                        <td> Admin  : <img
                                                src="{{ url(Storage::url(@$settingDetail->admin_logo)) }}" height="50"
                                                width="50">
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td></td>
                                        <td> <a class="btn btn-info btn-sm waves-effect"
                                                href="{{ route(Request::segment(1) . '.setting.edit',encrypt(@$settingDetail->id)) }}"
                                                {{@$settingDetail->description}}><i class="fa fa-edit"></i></a></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection