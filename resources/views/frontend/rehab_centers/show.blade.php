@extends('layouts.app')
@push('css')
<link href="{{ asset('lightbox/css/lightbox.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link as='font' crossorigin=''
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/webfonts/fa-solid-900.woff2' rel='preload'
    type='font/woff2' />
<link as='font' crossorigin=''
    href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/webfonts/fa-brands-400.woff2' rel='preload'
    type='font/woff2' />
<style>
    @media (min-width:320px)  { 
        .dsm{
            margin-top: 50px;
        }
     }
        .blod-info {
            display: flex
        }
        .blod-info li {
            padding-right: 20px;
            list-style: none;
            color: #aaa;
            display: flex;
            align-items: center
        }
        .blod-info li svg {
            margin-right: 5px
        }
        .blod-info li a {
            color: #aaa
        }
        .blod-info li a:hover {
            color: #00f
        }
        #social-links {
            display: inline-block
        }
        #social-links ul {
            margin-bottom: 0 !important;
            padding-left: 0 !important;
            margin-right: 10px
        }
        #social-links ul li {
            list-style: none
        }
        #social-links ul li a span {
            font-size: 22px;
            color: #0d6efd
        }
        .cke_editable {
            font-size: 16px;
            line-height: 1.6;
            word-wrap: break-word
        }
        blockquote {
            font-style: italic;
            font-family: Georgia, Times, "Times New Roman", serif;
            padding: 2px 0;
            border-style: solid;
            border-color: #ccc;
            border-width: 0
        }
        .cke_contents_ltr blockquote {
            padding-left: 20px;
            padding-right: 8px;
            border-left-width: 5px
        }
        .cke_contents_rtl blockquote {
            padding-left: 8px;
            padding-right: 20px;
            border-right-width: 5px
        }
        a {
            color: #0782c1
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400 !important;
            line-height: 1.2 !important
        }
        hr {
            border: 0;
            border-top: 1px solid #ccc
        }
        img.right {
            border: 1px solid #ccc;
            float: right;
            margin-left: 15px;
            padding: 5px
        }
        img.left {
            border: 1px solid #ccc;
            float: left;
            margin-right: 15px;
            padding: 5px
        }
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            -moz-tab-size: 4;
            tab-size: 4
        }
        .marker {
            background-color: #ff0 !important
        }
        span[lang] {
            font-style: italic
        }
        figure {
            text-align: center;
            border: solid 1px #ccc;
            border-radius: 2px;
            background: rgba(0, 0, 0, .05);
            padding: 10px;
            margin: 10px 20px;
            display: inline-block
        }
        figure>figcaption {
            text-align: center;
            display: block
        }
    .c-rating>label {
        color: #dad9dc;
        float: right;
        margin-bottom: 0;
    }

    .c-rating>label:before {
        margin: 0 2px;
        content: '\f005';
        /* You should use \ and not /*/
        font-family: "Font Awesome 5 Free";
        /* This is the correct font-family*/
        font-style: normal;
        font-weight: normal;
        font-size: 25px;
        display: inline-block;
    }

    .c-rating>input {
        display: none;
    }

    .c-rating>input:checked~label,
    .c-rating:not(:checked)>label:hover,
    .c-rating:not(:checked)>label:hover~label {
        color: #9500ff;
    }

    .c-rating>input:checked+label:hover,
    .c-rating>input:checked~label:hover,
    .c-rating>label:hover~input:checked~label,
    .c-rating>input:checked~label:hover~label {
        color: #ffcc00;
    }
</style>


@endpush
@section('content')

<!--============================= RESERVE A SEAT =============================-->
<section class="main-block" style="padding-bottom:5px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p><span></span></p>
                <h5 class="dsm">{{@$rehabDetails->rehab_name}}</h5>
                <p class="reserve-description">{{@$rehabDetails->address}}</p>
            </div>
            <div class="col-md-6">
                <div class="reserve-seat-block">
                    <div class="reserve-rating">
                        <span>{{@$rehabDetails->rating}}</span>
                    </div>
                    <div class="review-btn">
                        <a href="#review" class="btn btn-outline-danger">WRITE A REVIEW</a>
                        <span>{{count(@$rehabDetails->rehabreview)}} reviews</span>
                    </div>
                    <div class="reserve-btn">
                        <div class="featured-btn-wrap">
                            <a href="mailto:{{@$rehabDetails->email_address}}" class="btn btn-danger">Sent Email</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//END RESERVE A SEAT -->
<!--============================= BOOKING DETAILS =============================-->
<section class="light-bg booking-details_wrap">
    <div class="container-fluid">
        @include('partial.laravelmessage')
        <div class="row">
         
            <div class="col-md-8">
                <div class="booking-checkbox_wrap">

                    <!-- Images -->

                    <ul>
                        <li style="list-style: none">
                            <a data-lightbox="roadtrip" href="{{Storage::url($rehabDetails->image)}}">
                                <img src="{{Storage::url($rehabDetails->image)}}" alt="{{$rehabDetails->rehab_name}}"
                                    class="img-fluid w-100" data-lightbox="roadtrip" />
                            </a>
                        </li>
                        @foreach (@$rehabDetails->rehabslider as $imgslider)
                        <li style="list-style: none; display: inline-block">
                            <a data-lightbox="roadtrip" href="{{Storage::url($imgslider->slider_image)}}">
                                <img style="width:80px;height:80px; margin-top:10px"
                                    src="{{Storage::url($imgslider->slider_image)}}" alt="slider image"
                                    class="demo-gallery" id="demo-test-gallery" />
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="booking-checkbox cke_editable">
                        {!! @$rehabDetails->description !!}
                        <hr>
                    </div>
                    <h5 class="text-center mb-2">Facility</h5>
                    <div class="row">
                        @php
                        $facilities=json_decode(@$rehabDetails->facilities)
                        @endphp
                        @foreach ($facilities as $facility)
                        <div class="col-md-4">
                            <label class="custom-checkbox">
                                <span class="ti-check-box"></span>
                                <span class="custom-control-description">{{@$facility}}</span>
                            </label>
                        </div>
                        @endforeach
                    </div> 
                    <hr>
                    <h6 class="text-center mb-2">Insurance Accept</h6>
                    <div class="row">
                        @php
                        $insuranceaccepts=json_decode(@$rehabDetails->insurance_accepts)
                        @endphp
                        @foreach ($insuranceaccepts as $insurance)
                        <div class="col-md-4">
                            <label class="custom-checkbox">
                                <span class="ti-check-box"></span>
                                <span class="custom-control-description">{{@$insurance}}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="booking-checkbox_wrap mt-4">

                    <h5>{{count(@$rehabDetails->rehabreview)}} Reviews</h5>
                    <hr>
                    @foreach (@$rehabDetails->rehabreview as $review)
                    <div class="customer-review_wrap">

                        <div class="customer-img">
                            <img src="https://ui-avatars.com/api/?name={{@$review->name}}" style="max-width:200px"
                                class="img-fluid" alt="{{@$review->name}}">
                            <p>{{Str::words(@$review->name, 1,' ')}}</p>
                            <span>{{(@$review->rate)}} Reviews</span>
                        </div>
                        <div class="customer-content-wrap">
                            <div class="customer-content">
                                <div class="customer-review">
                                    <h6>{{(@$review->review_title)}} </h6>
                                    @for ($i = 0; $i < round($review->rating); $i++)
                                        <span></span>
                                        @endfor
                                        @for ($i = 0; $i <5-(round($review->rating)); $i++)
                                            <span class="round-icon-blank"></span>
                                            @endfor

                                            <p>Reviewed {{ @$review->created_at->diffForHumans()}} </p>
                                </div>
                                <div class="customer-rating">{{(@$review->rating)}} </div>
                            </div>
                            <p class="customer-text"></p>
                            {{(@$review->comment)}}
                        </div>

                    </div>
                    <hr>
                    @endforeach
                    <div id="review">

                        @include('partial.formerror')
                        {!! Form::open(['route' =>'rehab-review-store', 'method' => 'POST']) !!}

                        <input type="hidden" name="rehab_id" value="{{ @$rehabDetails->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="c-gray-light">Your Name *</label>

                                    <input type="text" name="name" value="{{ @Auth::user()->name }}"
                                        class="form-control" required>
                                        
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="c-gray-light">Phone *</label>
                                    <input type="tel" name="phone" value="{{ @Auth::user()->phone }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class=" c-gray-light">Email *</label>
                                    <input type="email" name="email" value="{{ @Auth::user()->email }}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class=" c-gray-light">Rating *</label> <br>
                                    <div class="c-rating clearfix d-inline-block">
                                        <input type="radio" id="star5" name="rating" value="5" required />
                                        <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                        <input type="radio" checked id="star4" name="rating" value="4" required />
                                        <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                        <input type="radio" id="star3" name="rating" value="3" required />
                                        <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                        <input type="radio" id="star2" name="rating" value="2" required />
                                        <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                        <input type="radio" id="star1" name="rating" value="1" required />
                                        <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class=" c-gray-light">Review Title *</label>
                                    {!! Form::text('review_title', null, ['id' => 'review_title', 'class' =>
                                    'form-control','required']) !!}
                                </div>
                                <span class="text-danger alert">{{ $errors->first('review_title') }}</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                {!! Form::textarea('comment', null, ['id' => 'comment', 'class' =>
                                'form-control','placeholder'=>'Your Review Comment','required']) !!}
                            </div>
                            <span class="text-danger alert">{{ $errors->first('comment') }}</span>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success  btn-circle mt-4">
                                {{ ('Send Review') }}
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 responsive-wrap">
                <div class="contact-info">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21604863.487111375!2d-117.0296683466655!3d35.683661403073174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e1!3m2!1sen!2sbd!4v1682854705280!5m2!1sen!2sbd"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <div class="address">
                        <span class="icon-location-pin"></span>
                        <p> {{@$rehabDetails->country_name}} <br> {{Helper::findStateName(@$rehabDetails->state_name)}},
                            {{@$rehabDetails->zip_code}}<br> {{@$rehabDetails->address}} </p>
                    </div>
                    <div class="address">
                        <span class="icon-screen-smartphone"></span>
                        <p> {{@$rehabDetails->phone_number}}</p>
                    </div>
                    <div class="address">
                        <span class="icon-link"></span>
                        <p>{{@$rehabDetails->website}}</p>
                    </div>

                    <a href="tel:{{@$result->phone_number}}" class="btn btn-outline-danger btn-contact">Call Now</a>
                </div>
                <div class="follow">
                    <div class="follow-img">
                        <img src="https://img.freepik.com/free-vector/social-media-infographic_1057-1077.jpg"
                            style="max-height:70px" class="img-fluid" alt="social">
                        <h6>Social Link</h6>
                        <span>{{Helper::findStateName(@$rehabDetails->state_name)}}</span>
                    </div>
                    <ul class="social-counts">
                        <li>
                            <h6><a href="{{@$rehabDetails->facebook}}" target="_blank" rel="noopener noreferrer"><span
                                        class="ti-facebook"></span></a></h6>
                            <span></span>
                        </li>
                        <li>
                            <h6><a href="{{@$rehabDetails->twitter}}" target="_blank" rel="noopener noreferrer"><span
                                        class="ti-twitter-alt"></span></a></h6>
                            <span></span>
                        </li>
                        <li>
                            <h6><a href="{{@$rehabDetails->youtube}}" target="_blank" rel="noopener noreferrer"><span
                                        class="ti-youtube"></span></a></h6>
                            <span></span>
                        </li>
                        <li>
                            <h6><a href="{{@$rehabDetails->pinterest}}" target="_blank" rel="noopener noreferrer"><span
                                        class="ti-pinterest"></span></a></h6>
                            <span></span>
                        </li>

                    </ul>

                </div>
                 
                @foreach ($otherRehab as $rehab)
                <div class="row find-img-align">
                    <div class="col-md-12">
                        <div class="find-place-img_wrap">
                            <div class="grid">
                                <a href="{{url('rehab-center',@$rehab->slug)}}"  rel="noopener noreferrer">
                                <figure class="effect-ruby">
                                    <img src="{{Storage::url(@$rehab->image)}}" />
                                    <figcaption>
                                        <h5>{{@$rehab->rehab_name}}</h5>
                                        <p>@for ($i = 0; $i < round($rehab->rating); $i++)
                                            <span class="icon-star text-warning"></span>
                                            @endfor </p>
                                    </figcaption>
                                </figure>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!--//END BOOKING DETAILS -->

@endsection
@push('js')
<script src="{{ asset('lightbox/js/lightbox.js') }}"></script> 
<script>
     lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                });
    $(document).ready(function () {
        $(".cke_editable img").each(function(i) {
                $(this).addClass("img-fluid");
                   
            });

    });
</script>


@endpush