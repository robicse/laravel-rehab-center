
@extends('layouts.app')
@push('css')
    

<style>

  
    .search-rehab-categories>li>a {
        color: #b6b6b6;
        font-weight: 400
    }
    
    .search-rehab-categories>li>a:hover {
        background-color: #ddd;
        color: #555
    }
    
    .search-rehab-categories>li>a>.glyphicon {
        margin-right: 5px
    }
    
    .search-rehab-categories>li>a>.badge {
        float: right
    }
    
    .search-results-count {
        margin-top: 10px
    }
    
    .search-rehab-item {
        padding: 20px;
        background-color: #fff;
        border-radius: 4px
    }
    
    .search-rehab-item:after,
    .search-rehab-item:before {
        content: " ";
        display: table
    }
    
    .search-rehab-item:after {
        clear: both
    }
    
    .search-rehab-item .image-link {
        display: block;
        overflow: hidden;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px
    }
    
    @media (min-width:768px) {
        .search-rehab-item .image-link {
            display: inline-block;
            margin: -20px 0 -20px -20px;
            float: left;
            width: 200px
        }
    }
    
    @media (max-width:767px) {
        .search-rehab-item .image-link {
            max-height: 200px
        }
    }
    
    .search-rehab-item .image {
        max-width: 100%
    }
    
    .search-rehab-item .info {
        margin-top: 2px;
        font-size: 12px;
        color: #999
    }
    
    .search-rehab-item .description {
        font-size: 13px
    }
    
    .search-rehab-item+.search-rehab-item {
        margin-top: 20px
    }
    
    @media (min-width:768px) {
        .search-rehab-item-body {
            margin-left: 200px
        }
    }
    
    .search-rehab-item-heading {
        font-weight: 400
    }
    
    .search-rehab-item-heading>a {
        color: #555
    }
    
    @media (min-width:768px) {
        .search-rehab-item-heading {
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
                  <li class="breadcrumb-item"><a href="{{url('/rehab-center')}}">Rehab Center</a></li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>All Rehab Center List </h3>
                    </div>
                </div>
                
            </div>
            <div class="container-fluid">
                <form class="d-flex" action="{{url('/rehab-center')}}" method="get" role="search">
                    <input class="form-control" name="q" required type="search" placeholder="Search By Rehab Center Name" aria-label="Search">
                    <button class="btn btn-primary" aria-label="Left Align" type="submit"><span class="icon-arrow-right"></span>Search</button>
                </form>
                <div class="row ng-scope">
                    
                    <div class="col-md-12 col-md-pull-3">
                        <p class="search-results-count"></p>
                        @forelse ($rehabListing as $rehab)
                            
                       
                        <section class="search-rehab-item border  rounded">
                            <a class="image-link" href="{{url('rehab-center',@$rehab->slug)}}"><img class="img-fluid" src="{{Storage::url($rehab->image)}}" style="width:300px; height:200px">
                            </a>
                            <div class="search-rehab-item-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="search-rehab-item-heading "><a href="{{url('rehab-center',@$rehab->slug)}}">{{@$rehab->rehab_name}}</a></h4>
                                        <p class="info">{{@$rehab->country_name}}, {{@$rehab->state_name}} {{@$rehab->zip_code}}</p>
                                        <p class="description">{{@$rehab->short_description}}  <br> <b> Address: {{@$rehab->address}}</b> </p>
                                    </div>
                                    <div class="col-md-3 text-align-center">
                                        <p class="value3 mt-sm"><a href="tel:+{{@$rehab->phone_number}}"> {{@$rehab->phone_number}}</a></p>
                                        <p class="fs-mini text-muted"><a class="btn btn-primary btn-success btn-sm" href="mailto:{{@$rehab->email_address}}">Send Email</a></p><a class="btn btn-primary btn-info btn-sm" href="{{url('rehab-center',@$rehab->slug)}}">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @empty
                        <h5>No Search  Data Found</h5>
                        @endforelse
                 
                        <div class="mt-2">
                            {{$rehabListing->onEachSide(1)->links()}}
                        </div>
                    </div>
                </div>
                
            </div>
   
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Recent  Rehab News </h3>
                    </div>
                </div>
            </div>
            
            <div class="row">
                @foreach (Helper::frontBlog() as $blog)
                    
      
                <div class="col-md-3 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="{{url('blog',@$blog->slug)}}">
                            <img src="{{ asset(@$blog->image)}}" alt="{{Str::words(@$blog->title,8)}}" class="img-fluid img-thumbnail rounded">
                           
                            <div class="featured-title-box">
                                <h6>{{Str::words(@$blog->title,8)}} </h6>
                                <ul>
                                    <li><span class="icon-calendar"></span>
                                        {{ date('d-M-Y h:iA', strtotime(@$blog->created_at)) }}
                                    </li>
                                    
                                </ul>
                                <p>{{Str::words(@$blog->short_description,20)}}</p> 
                            </div>
                           
                        </a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    
@endsection
