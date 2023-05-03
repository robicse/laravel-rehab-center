
@extends('layouts.app')
@push('css')
    

<style>

  
    .search-result-categories>li>a {
        color: #b6b6b6;
        font-weight: 400
    }
    
    .search-result-categories>li>a:hover {
        background-color: #ddd;
        color: #555
    }
    
    .search-result-categories>li>a>.glyphicon {
        margin-right: 5px
    }
    
    .search-result-categories>li>a>.badge {
        float: right
    }
    
    .search-results-count {
        margin-top: 10px
    }
    
    .search-result-item {
        padding: 20px;
        background-color: #fff;
        border-radius: 4px
    }
    
    .search-result-item:after,
    .search-result-item:before {
        content: " ";
        display: table
    }
    
    .search-result-item:after {
        clear: both
    }
    
    .search-result-item .image-link {
        display: block;
        overflow: hidden;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px
    }
    
    @media (min-width:768px) {
        .search-result-item .image-link {
            display: inline-block;
            margin: -20px 0 -20px -20px;
            float: left;
            width: 200px
        }
    }
    
    @media (max-width:767px) {
        .search-result-item .image-link {
            max-height: 200px
        }
    }
    
    .search-result-item .image {
        max-width: 100%
    }
    
    .search-result-item .info {
        margin-top: 2px;
        font-size: 12px;
        color: #999
    }
    
    .search-result-item .description {
        font-size: 13px
    }
    
    .search-result-item+.search-result-item {
        margin-top: 20px
    }
    
    @media (min-width:768px) {
        .search-result-item-body {
            margin-left: 200px
        }
    }
    
    .search-result-item-heading {
        font-weight: 400
    }
    
    .search-result-item-heading>a {
        color: #555
    }
    
    @media (min-width:768px) {
        .search-result-item-heading {
            margin: 0
        }
    }
    </style>
    
@endpush
@section('content')

 
    <!--============================= FIND PLACES =============================-->
    <section class="main-block">
        
        <div class="container">
            <nav aria-label="breadcrumb" style="font-size:12px">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Rehab Center</a></li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Rehab Center Search Result </h3>
                    </div>
                </div>
            </div>
            <div class="container">
               
                <div class="row ng-scope">
                    
                    <div class="col-md-12 col-md-pull-3">
                        <p class="search-results-count">About {{@$searchresult->total()}}   results</p>
                        @forelse ($searchresult as $result)
                            
                       
                        <section class="search-result-item border  rounded">
                            <a class="image-link" href="{{url('rehab-center',@$result->slug)}}"><img class="img-fluid" src="{{Storage::url($result->image)}}" style="width:300px; height:200px">
                            </a>
                            <div class="search-result-item-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="search-result-item-heading "><a href="{{url('rehab-center',@$result->slug)}}">{{@$result->rehab_name}}</a></h4>
                                        <p class="info">{{@$result->country_name}}, {{@$result->state_name}} {{@$result->zip_code}}</p>
                                        <p class="description">{{@$result->short_description}}  <br> <b> Address: {{@$result->address}}</b> </p>
                                    </div>
                                    <div class="col-md-3 text-align-center">
                                        <p class="value3 mt-sm"><a href="tel:+{{@$result->phone_number}}"> {{@$result->phone_number}}</a></p>
                                        <p class="fs-mini text-muted"><a class="btn btn-primary btn-success btn-sm" href="mailto:{{@$result->email_address}}">Send Email</a></p><a class="btn btn-primary btn-info btn-sm" href="{{url('rehab-center',@$result->slug)}}">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @empty
                        <h5>No Search  Data Found</h5>
                        @endforelse
                 
                        <div class="mt-2">
                            {{$searchresult->onEachSide(1)->links()}}
                        </div>
                    </div>
                </div>
                
            </div>
   
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Recent Listing Rehab Center </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ asset('storage/files/1/2023/10.jpg')}}" />
                                        <figcaption>
                                            <h5> Landmark Recovery</h5>
                                            <p>50 Review</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ asset('storage/files/1/2023/4.jpg')}}" />
                                        <figcaption>
                                            <h5>Promises Austin</h5>
                                            <p>10 Review</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ asset('storage/files/1/2023/7.jpg')}}" />
                                        <figcaption>
                                            <h5>Sunflower Wellness</h5>
                                            <p>0 Review</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ asset('storage/files/1/2023/1_JS199972397.jpg')}}" />
                                        <figcaption>
                                            <h5>Recovery Unplugged</h5>
                                            <p>50 Review</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ asset('storage/files/1/2023/8.jpg')}}" />
                                        <figcaption>
                                            <h5>Ambrosia </h5>
                                            <p>20 Review</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row find-img-align">
                        <div class="col-md-12">
                            <div class="find-place-img_wrap">
                                <div class="grid">
                                    <figure class="effect-ruby">
                                        <img src="{{ asset('storage/files/1/2023/5.jpg')}}" />
                                        <figcaption>
                                            <h5>Treatment Cente</h5>
                                            <p>20 Review</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            {{-- <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
            --}}


        </div>
    </section>
    
@endsection
