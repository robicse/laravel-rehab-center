@extends('backend.layouts.master')
@section('title', 'Create Rehab Center')
@push('css')
<link href="{{ asset('backend/assets/select2/css/select2.min.css') }}" rel="stylesheet" />
<style>.select2-selection__choice{
    background-color: var(--bs-gray-200);
    border: none !important;
    font-size: 12px;
    font-size: 0.85rem !important;
  }</style>
@endpush
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Rehab Center Create</p>
                            <a href="{{ route(Request::segment(1) . '.rehab-lists.index') }}"
                                class="btn btn-primary btn-sm ms-auto">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @include('partial.formerror')
                            {!! Form::open(['route' => Request::segment(1) . '.rehab-lists.store', 'method' => 'POST', 'files' => true]) !!}
                            @include('backend.common.rehab_centers.form')
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Submit</button>
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


  </script>

@endpush
