@extends('layouts.app')
@push('css')
<link href="{{ asset('lightbox/css/lightbox.css') }}" rel="stylesheet" />

<style>

</style>

@endpush
@section('content')

<!--============================= RESERVE A SEAT =============================-->
<section class="main-block">
    <div class="container">
        
        <div class="row">
            <div class="col-md-6">
                <p><span></span></p>
                <h5>{{@$rehabDetails->rehab_name}}</h5>
                <p class="reserve-description">{{@$rehabDetails->address}}</p>
            </div>
            <div class="col-md-6">
                <div class="reserve-seat-block">
                    <div class="reserve-rating">
                        <span>{{@$rehabDetails->rating}}</span>
                    </div>
                    <div class="review-btn">
                        <a href="#" class="btn btn-outline-danger">WRITE A REVIEW</a>
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
    <div class="container">
        <div class="row">
            <div class="col-md-8 responsive-wrap">
                <div class="booking-checkbox_wrap">

                    <!-- Images -->

                    <ul>
                        <li style="list-style: none">
                            <a data-lightbox="roadtrip" href="{{Storage::url($rehabDetails->image)}}">
                                <img src="{{Storage::url($rehabDetails->image)}}" alt="{{$rehabDetails->rehab_name}}"
                                    class="img-fluid" data-lightbox="roadtrip" />
                            </a>
                        </li>
                        @foreach (@$rehabDetails->rehabslider as $imgslider)
                        <li style="list-style: none">
                            <a data-lightbox="roadtrip" href="{{Storage::url($imgslider->slider_image)}}">
                                <img style="width:80px;height:80px; margin-top:10px"
                                    src="{{Storage::url($imgslider->slider_image)}}" alt="slider image"
                                    class="demo-gallery" id="demo-test-gallery" />
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="booking-checkbox">
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
                </div>
                <div class="booking-checkbox_wrap mt-4">
                    <h5>{{count(@$rehabDetails->rehabreview)}} Reviews</h5>
                    <hr>
                    <div class="customer-review_wrap">
                        @foreach (@$rehabDetails->rehabreview as $review)
                        <div class="customer-img">
                            <img src="https://ui-avatars.com/api/?name={{@$review->name}}" style="max-width:200px"
                                class="img-fluid" alt="{{@$review->name}}">
                            <p>{{Str::words(@$review->name, 2)}}</p>
                            <span>{{(@$review->rate)}} Reviews</span>
                        </div>
                        <div class="customer-content-wrap">
                            <div class="customer-content">
                                <div class="customer-review">
                                    <h6>{{(@$review->review_title)}} </h6>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span class="round-icon-blank"></span>
                                    <p>Reviewed {{ \Carbon\Carbon::purch(@$review->create_at)->diffForHumans()}}   days ago</p>
                                </div>
                                <div class="customer-rating">{{(@$review->rate)}} </div>
                            </div>
                            <p class="customer-text">
                            </p>
                            {{(@$review->comment)}} 
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <form class="form-default" role="form"
                    action="{{ url('/') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id"
                        value="{{ @$rehabDetails->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""
                                    class="text-uppercase c-gray-light">{{ ('Your name') }}</label>
                                <input type="text" name="name"
                                    value="{{ @Auth::user()->name }}"
                                    class="form-control" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""
                                    class="text-uppercase c-gray-light">{{ ('Email') }}</label>
                                <input type="text" name="email"
                                    value="{{ @Auth::user()->email }}"
                                    class="form-control" required disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <i class="fa fa-star active"></i>
                            <div class="c-rating mt-1 mb-1 clearfix d-inline-block">
                                <input type="radio" id="star5" name="rating"
                                    value="5" required />
                                <label class="star" for="star5" title="Awesome"
                                    aria-hidden="true"></label>
                                <input type="radio" id="star4" name="rating"
                                    value="4" required />
                                <label class="star" for="star4" title="Great"
                                    aria-hidden="true"></label>
                                <input type="radio" id="star3" name="rating"
                                    value="3" required />
                                <label class="star" for="star3"
                                    title="Very good" aria-hidden="true"></label>
                                <input type="radio" id="star2" name="rating"
                                    value="2" required />
                                <label class="star" for="star2" title="Good"
                                    aria-hidden="true"></label>
                                <input type="radio" id="star1" name="rating"
                                    value="1" required />
                                <label class="star" for="star1" title="Bad"
                                    aria-hidden="true"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <textarea class="form-control" rows="4" name="comment" placeholder="{{ ('Your review') }}"
                                required></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit"
                            class="btn btn-styled btn-base-1 btn-circle mt-4">
                            {{ ('Send review') }}
                        </button>
                    </div>
                </form>
                </div>
            </div>
            <div class="col-md-4 responsive-wrap">
                <div class="contact-info">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21604863.487111375!2d-117.0296683466655!3d35.683661403073174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e1!3m2!1sen!2sbd!4v1682854705280!5m2!1sen!2sbd"   width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
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
            </div>
        </div>
    </div>
</section>
<!--//END BOOKING DETAILS -->

@endsection
@push('js')
<script src="{{ asset('lightbox/js/lightbox.js') }}"></script>
<script>
    $(document).ready(function () {
        lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                });

    });
</script>
{{-- <script type="text/javascript">
    function initMap() {
   const myLatLng = { lat: 23.80464450795751, lng: 90.36002005004849 };
   const map = new google.maps.Map(document.getElementById("map"), {
     zoom: 5,
     center: myLatLng,
   });

   new google.maps.Marker({
     position: myLatLng,
     map,
     title: "Hello zahidul",

   });

 }
 window.initMap = initMap;

</script>
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs_T8aLLZBFBlZ2nXxIuk0MXSZeinenl8&libraries=drawing,places&v=3.45.8&callback=initMap">
</script>
--}}

@endpush