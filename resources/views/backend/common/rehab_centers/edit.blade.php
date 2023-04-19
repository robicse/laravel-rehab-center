@extends('backend.layouts.master')
@push('css')
<link href="{{ asset('backend/assets/select2/css/select2.min.css') }}" rel="stylesheet" />
<style>
    .select2-selection__choice {
        background-color: var(--bs-gray-200);
        border: none !important;
        font-size: 12px;
        font-size: 0.85rem !important;
    }
</style>
@endpush
@section('title', 'Update Rehab Center')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Rehab Update</p>
                        <a href="{{ route(Request::segment(1) . '.rehab-lists.index') }}"
                            class="btn btn-primary btn-sm ms-auto">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('partial.formerror')
                        {!! Form::model($rehabdata, [
                        'route' => [Request::segment(1) . '.rehab-lists.update', $rehabdata->id],
                        'method' => 'PATCH',
                        'files' => true,
                        ]) !!}
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="rehab_name" class="form-control-label">Rehab Name * </label>
                                {!! Form::text('rehab_name', null, ['id' => 'rehab_name', 'class' => 'form-control',
                                'required']) !!}
                                @if ($errors->has('rehab_name'))
                                <span class="text-danger alert">{{ $errors->first('rehab_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="country_name" class="form-control-label">Select Country * </label>
                                {!! Form::select('country_name', Helper::getCountryName(), null, ['id' =>
                                'country_name', 'class' => 'form-control select2', 'required']) !!}
                                @if ($errors->has('country_name'))
                                <span class="text-danger alert">{{ $errors->first('country_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="state_name" class="form-control-label">Select State * </label>
                                {!! Form::select('state_name',Helper::getStateName(), null, ['id' => 'state_name',
                                'class' => 'form-control select2', 'required','placeholder'=>'Select One']) !!}
                                @if ($errors->has('state_name'))
                                <span class="text-danger alert">{{ $errors->first('state_name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">

                                <label for="zip_code" class="form-control-label">Select Zip Code * </label>
                                {!! Form::select('zip_code',[@$rehabdata->zip_code=>@$rehabdata->zip_code],
                                @$rehabdata->zip_code, ['id' => 'zip_code', 'class' => 'form-control zipselect2',
                                'required']) !!}
                                @if ($errors->has('zip_code'))
                                <span class="text-danger alert">{{ $errors->first('zip_code') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="phone_number" class="form-control-label">Phone Number * </label>
                                {!! Form::tel('phone_number', null, ['id' => 'phone_number', 'class' =>
                                'form-control','required']) !!}
                                @if ($errors->has('phone_number'))
                                <span class="text-danger alert">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="fax_number" class="form-control-label">Fax Number </label>
                                {!! Form::tel('fax_number', null, ['id' => 'fax_number', 'class' => 'form-control']) !!}
                                @if ($errors->has('fax_number'))
                                <span class="text-danger alert">{{ $errors->first('fax_number') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="email_address" class="form-control-label">Email Address * </label>
                                {!! Form::email('email_address', null, ['id' => 'email_address', 'class' =>
                                'form-control','required']) !!}
                                @if ($errors->has('email_address'))
                                <span class="text-danger alert">{{ $errors->first('email_address') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-control-label">Full Address * </label>
                                {!! Form::textarea('address', null, ['id' => 'address', 'class' =>
                                'form-control','rows'=>2]) !!}
                                @if ($errors->has('address'))
                                <span class="text-danger alert">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="map_lat" class="form-control-label">Googole Map Lat [ <a
                                        href="https://www.google.com.bd/maps/" target="_blank">Map</a> ] </label>
                                {!! Form::text('map_lat', null, ['id' => 'map_lat', 'class' => 'form-control']) !!}
                                @if ($errors->has('map_lat'))
                                <span class="text-danger alert">{{ $errors->first('map_lat') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="map_lng" class="form-control-label">Googole Map Lng </label>
                                {!! Form::text('map_lng', null, ['id' => 'map_lng', 'class' => 'form-control']) !!}
                                @if ($errors->has('map_lng'))
                                <span class="text-danger alert">{{ $errors->first('map_lng') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="facilities" class="form-control-label">Select Facilities * </label>
                                {!! Form::select('facilities[]',['Detox Services'=>'Detox Services','Residential
                                Treatment'=>'Residential Treatment','Dual-Diagnosis Treatment'=>'Dual-Diagnosis
                                Treatment','Intensive Outpatient Services'=>'Intensive Outpatient
                                Services','Telehealth'=>'Telehealth','Other'=>'Other'],
                                json_decode(@$rehabdata['facilities'],true), ['id' => 'facilities', 'class' =>
                                'form-control select2','multiple','required']) !!}
                                @if ($errors->has('facilities'))
                                <span class="text-danger alert">{{ $errors->first('facilities') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="form-control-label">Facebook Link </label>
                                {!! Form::text('facebook', null, ['id' => 'facebook', 'class' => 'form-control']) !!}
                                @if ($errors->has('facebook'))
                                <span class="text-danger alert">{{ $errors->first('facebook') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="youtube" class="form-control-label">Youtube Link </label>
                                {!! Form::text('youtube', null, ['id' => 'youtube', 'class' => 'form-control']) !!}
                                @if ($errors->has('youtube'))
                                <span class="text-danger alert">{{ $errors->first('youtube') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="form-control-label">Twitter Link </label>
                                {!! Form::text('twitter', null, ['id' => 'twitter', 'class' => 'form-control']) !!}
                                @if ($errors->has('twitter'))
                                <span class="text-danger alert">{{ $errors->first('twitter') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="pinterest" class="form-control-label">Pinterest Link </label>
                                {!! Form::text('pinterest', null, ['id' => 'pinterest', 'class' => 'form-control']) !!}
                                @if ($errors->has('pinterest'))
                                <span class="text-danger alert">{{ $errors->first('pinterest') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="website" class="form-control-label">Website Link </label>
                                {!! Form::text('website', null, ['id' => 'website', 'class' => 'form-control']) !!}
                                @if ($errors->has('website'))
                                <span class="text-danger alert">{{ $errors->first('website') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="insurance_accepts" class="form-control-label">Type Insurance Accepted Name
                                    And Press Enter * [EX:Private Insurance ] </label>
                                {!! Form::select('insurance_accepts[]',@$insuranceAccepts,
                                json_decode(@$rehabdata['insurance_accepts'],true), ['id' => 'insurance_accepted',
                                'class' => 'form-control zipselect2','multiple']) !!}
                                @if ($errors->has('insurance_accepted'))
                                <span class="text-danger alert">{{ $errors->first('insurance_accepted') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="short_description" class="form-control-label">Short Description [Min:250
                                    Character & Min:500 Character] * </label>
                                {!! Form::textarea('short_description', null, ['id' => 'short_description', 'class' =>
                                'form-control', 'required','rows'=>2]) !!}
                                @if ($errors->has('short_description'))
                                <span class="text-danger alert">{{ $errors->first('short_description') }}</span>
                                @endif
                                You Can Write <span class="text-primary" id="chars"> </span> Characters
                            </div>
                            <div class="input-group my-2">
                                <label for="image" class="form-control-label">Upload Image (Feature Image [300px*300px]) *
                                </label> <br>
                                {!! Form::file('image', ['accept'=>".jpg,.jpeg,.png",'id' => 'image', 'class' =>
                                'form-control', 'style'=>'width:100%']) !!}

                                @if ($errors->has('image'))
                                <span class="text-danger alert">{{ $errors->first('image') }}</span>
                                @endif

                                @if($rehabdata->image==!Null)
                                <img class="img-fluid p-2" width="300px"
                                    src="{{asset(Storage::url(@$rehabdata->image))}}">
                                    
                                @endif
                               
                            </div>

                            <div class="input-group py-2">
                                <label for="slider_image" class="form-control-label">Upload Slider Image (Slider Image
                                    [300*300]) * </label> <br>
                                {!! Form::file('slider_image[]', ['accept'=>".jpg,.jpeg,.png",'id' => 'slider_image',
                                'class' => 'form-control', 'style'=>'width:100%','multiple']) !!}
                                @if ($errors->has('slider_image'))
                                <span class="text-danger alert">{{$errors->first('slider_image')}}</span>
                                @endif

                                @foreach ($rehabdata->rehabslider as $img)
                                <div class=" d-flex align-items-center justify-content-around p-2 m-2" onclick="deleteSliderImage( {{ $img->id }} );">
                                        <img src="{{asset(Storage::url(@$img->slider_image))}}" width="200px" height="100px" class="d-block">
                                        
                                        <span class="m-3 d-block bg-danger p-2 text-light text-bolder" >x</span>
                                </div>
                              
                                @endforeach

                            </div>
                            <div class="form-group">
                                <label for="meta_title" class="form-control-label">Meta Title  </label>
                                {!! Form::text('meta_title', null, ['id' => 'meta_title', 'class' => 'form-control']) !!}
                                @if ($errors->has('meta_title'))
                                    <span class="text-danger alert">{{ $errors->first('meta_title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_description" class="form-control-label">Meta Description  </label>
                                {!! Form::text('meta_description', null, ['id' => 'meta_description', 'class' => 'form-control']) !!}
                                @if ($errors->has('meta_description'))
                                    <span class="text-danger alert">{{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="json_screma" class="form-control-label">Json Screma </label>
                                {!! Form::textarea('json_screma', null, ['id' => 'json_screma', 'class' => 'form-control','rows'=>3]) !!}
                                @if ($errors->has('json_screma'))
                                    <span class="text-danger alert">{{ $errors->first('json_screma') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-control-label">Status </label>
                                {!! Form::select('status',[1=>'Publish',0=>'Pending'], null, ['id' => 'status', 'class' => 'form-control select2']) !!}
                                @if ($errors->has('status'))
                                    <span class="text-danger alert">{{ $errors->first('status') }}</span>
                                @endif

                            <div class="form-group">
                                <label for="description" class="form-control-label">Rehab Description * </label>
                                {!! Form::textarea('description', null, [
                                'id' => 'description',
                                'class' => 'form-control',
                                'required',
                                'rows' => 2,
                                ]) !!}
                                @if ($errors->has('description'))
                                <span class="text-danger alert">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<!-- CKEditor init -->
<script src="{{asset('backend/assets/select2/js/select2.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
    $('.select2').select2();
    $(".zipselect2").select2({
     tags: true,
    });
    var route_prefix = "/filemanager";
        $('textarea[name=description]').ckeditor({
          height: 300,
          filebrowserImageBrowseUrl: route_prefix + '?type=Images',
          filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: route_prefix + '?type=Files',
          filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',
            extraAllowedContent: 'a[rel]',
             extraPlugins: 'embed,autoembed,uicolor,colorbutton,colordialog,font',
            autoEmbed_widget:'customEmbed',
            format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
            
            allowedContent:true
        });

 $(document).ready(function () {
 $('#state_name').on('select2:select', function (e) {
    var value = e.params.data.id;
    $('#zip_code').empty();
$.ajax({
       type: "GET",
       url: url + '/get-zip-code/'+value,
       dataType: "JSON",
       success:function(data) {
        if(data){
                 $.each(data, function(key, value){
                      $('#zip_code').append('<option value="'+value.zip+'">' + value.zip + ' <=> ' + value.city + '</option>');

                   });
               }

           },
   });
 });

  


        });

//for metadescrioption word counrer 
(function($) {
    $.fn.extend( {
        limiter: function(limit, elem) {
            $(this).on("keyup focus", function() {
                setCount(this, elem);
            });
            function setCount(src, elem) {
                var chars = src.value.length;
                if (chars > limit) {
                    src.value = src.value.substr(0, limit);
                    chars = limit;
                }
                elem.html( limit - chars );
            }
            setCount($(this)[0], elem);
        }
    });
})(jQuery);
var elem = $("#chars");
$("#short_description").limiter(500, elem);
function deleteSliderImage(id){
    if (!confirm('Are You Sure To Delete ?')) return;

    $.ajax({
       type: "GET",
       url: url + '/slider-image-delete/'+id,
       dataType: "JSON",
       success:function(data) {
        toastr.success('Success messages');
        location.reload();

     },
   });
}

</script>

@endpush