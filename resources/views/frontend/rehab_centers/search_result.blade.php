
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
                        <p class="search-results-count">About 94 700 000  results</p>
                        <section class="search-result-item border  rounded">
                            <a class="image-link" href="#"><img class="img-fluid" src="http://rehab.staritltd-live.xyz/storage/files/1/news/Dinwiddie-center-photo-website-2.jpg" style="width:300px; height:200px">
                            </a>
                            <div class="search-result-item-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="search-result-item-heading "><a href="#">Oro House Recovery Centers</a></h4>
                                        <p class="info">New York, NY 20188</p>
                                        <p class="description">Serving the greater Las Vegas area and beyond, Desert Hope tailors patient treatment programs to each individual based on their personal history of substance use, the severity of the substance use disorder, and the presence of any co-occurring mental health disorders. In addition to offering individualized care programs.</p>
                                    </div>
                                    <div class="col-md-3 text-align-center">
                                        <p class="value3 mt-sm"><a href="tel:+4733378901">+47 333 78 901</a></p>
                                        <p class="fs-mini text-muted"><a class="btn btn-primary btn-success btn-sm" href="mailto:example@gmail.com">Send Email</a></p><a class="btn btn-primary btn-info btn-sm" href="#">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="search-result-item border  rounded">
                            <a class="image-link" href="#"><img class="img-fluid" src="http://rehab.staritltd-live.xyz/storage/files/1/news/kiss-and-hug%20-for-%20better%20-health.jpg" style="width:300px; height:200px">
                            </a>
                            <div class="search-result-item-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="search-result-item-heading"><a href="#">Best Rehab Center</a> </h4>
                                        <p class="info">New York, NY 20188</p>
                                        <p class="description">Serving the greater Las Vegas area and beyond, Desert Hope tailors patient treatment programs to each individual based on their personal history of substance use, the severity of the substance use disorder, and the presence of any co-occurring mental health disorders. In addition to offering individualized care programs.</p>
                                    </div>
                                    <div class="col-sm-3 text-align-center">
                                        <p class="fs-mini text-muted"><a href="tel:+4733378901">+47 333 78 901</a><a class="btn btn-primary btn-success btn-sm" href="mailto:example@gmail.com">Send Email</a></p><a class="btn btn-primary btn-info btn-sm" href="#">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="search-result-item border  rounded">
                            <a class="image-link" href="#"><img class="img-fluid" src="http://rehab.staritltd-live.xyz/storage/files/1/news/healthy-family.jpg" style="width:300px; height:200px">
                            </a>
                            <div class="search-result-item-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="search-result-item-heading"><a href="#">Haven Recovery Centers</a></h4>
                                        <p class="info">New York, NY 20188</p>
                                        <p class="description">Serving the greater Las Vegas area and beyond, Desert Hope tailors patient treatment programs to each individual based on their personal history of substance use, the severity of the substance use disorder, and the presence of any co-occurring mental health disorders. In addition to offering individualized care programs</p>
                                    </div>
                                    <div class="col-sm-3 text-align-center">
                                        <p class="fs-mini text-muted"><a href="tel:+4733378901">+47 333 78 901</a> <a class="btn btn-primary btn-success btn-sm" href="mailto:example@gmail.com">Send Email</a></p><a class="btn btn-primary btn-info btn-sm" href="#">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="search-result-item border  rounded">
                            <a class="image-link" href="#"><img class="img-fluid" src="https://crimages.recoverybrands.com/cache/299/listings/image-0.231896001526319430.jpg" style="width:300px; height:200px">
                            </a>
                            <div class="search-result-item-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="search-result-item-heading"><a href="#">Desert Hope Treatment</a></h4>
                                        <p class="info">Minsk, NY 20188</p>
                                        <p class="description">Serving the greater Las Vegas area and beyond, Desert Hope tailors patient treatment programs to each individual based on their personal history of substance use, the severity of the substance use disorder, and the presence of any co-occurring mental health disorders. In addition to offering individualized care programs</p>
                                    </div>
                                    <div class="col-sm-3 text-align-center">
                                        <p class="fs-mini text-muted"><a href="tel:+4733378901">+47 333 78 901</a> <a class="btn btn-primary btn-success btn-sm" href="mailto:example@gmail.com">Send Email</a></p><a class="btn btn-primary btn-info btn-sm" href="#">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="mt-2">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                              </nav>
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

            <div class="card mb-3">
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
           


        </div>
    </section>
    
@endsection
