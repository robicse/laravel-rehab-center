<div class="row">
    <div class="col-md-12 form-group">
        <label for="rehab_name" class="form-control-label">rehab Name * </label>
        {!! Form::text('rehab_name', null, ['id' => 'rehab_name', 'class' => 'form-control', 'required']) !!}
        @if ($errors->has('rehab_name'))
            <span class="text-danger alert">{{ $errors->first('rehab_name') }}</span>
        @endif
    </div>
    <div class="col-md-4 form-group">
        <label for="country_name" class="form-control-label">Select Country * </label>
        {!! Form::select('country_name', Helper::getCountryName(), null, ['id' => 'country_name', 'class' => 'form-control select2', 'required','readonly']) !!}
        @if ($errors->has('country_name'))
            <span class="text-danger alert">{{ $errors->first('country_name') }}</span>
        @endif
    </div>
    <div class="col-md-4 form-group">
        <label for="state_name" class="form-control-label">Select State * </label>
        {!! Form::select('state_name',Helper::getStateName(), null, ['id' => 'state_name', 'class' => 'form-control select2', 'required','placeholder'=>'Select One']) !!}
        @if ($errors->has('state_name'))
            <span class="text-danger alert">{{ $errors->first('state_name') }}</span>
        @endif
    </div>
    <div class="col-md-4 form-group">
        <label for="zip_code" class="form-control-label">Select Zip Code * </label>
        {!! Form::select('zip_code',[], null, ['id' => 'zip_code', 'class' => 'form-control zipselect2', 'required']) !!}
        @if ($errors->has('zip_code'))
            <span class="text-danger alert">{{ $errors->first('zip_code') }}</span>
        @endif
    </div>
    <div class="col-md-4 form-group">
        <label for="phone_number" class="form-control-label">Phone Number * </label>
        {!! Form::tel('phone_number', null, ['id' => 'phone_number', 'class' => 'form-control','required']) !!}
        @if ($errors->has('phone_number'))
            <span class="text-danger alert">{{ $errors->first('phone_number') }}</span>
        @endif
    </div>
    <div class="col-md-4 form-group">
        <label for="fax_number" class="form-control-label">Fax Number  </label>
        {!! Form::tel('fax_number', null, ['id' => 'fax_number', 'class' => 'form-control']) !!}
        @if ($errors->has('fax_number'))
            <span class="text-danger alert">{{ $errors->first('fax_number') }}</span>
        @endif
    </div>
    <div class="col-md-4 form-group">
        <label for="email_address" class="form-control-label">Email Address * </label>
        {!! Form::email('email_address', null, ['id' => 'email_address', 'class' => 'form-control','required']) !!}
        @if ($errors->has('email_address'))
            <span class="text-danger alert">{{ $errors->first('email_address') }}</span>
        @endif
    </div>
    <div class="col-md-6 form-group">
        <label for="map_lat" class="form-control-label">Googole Map Lat * </label>
        {!! Form::email('map_lat', null, ['id' => 'map_lat', 'class' => 'form-control','required']) !!}
        @if ($errors->has('map_lat'))
            <span class="text-danger alert">{{ $errors->first('map_lat') }}</span>
        @endif
    </div>
    <div class="col-md-6 form-group">
        <label for="map_lng" class="form-control-label">Googole Map Lng * </label>
        {!! Form::email('map_lng', null, ['id' => 'map_lng', 'class' => 'form-control','required']) !!}
        @if ($errors->has('map_lng'))
            <span class="text-danger alert">{{ $errors->first('map_lng') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="facilities" class="form-control-label">Select Facilities * </label>
        {!! Form::select('facilities[]',['Detox Services'=>'Detox Services','Residential Treatment'=>'Residential Treatment','Dual-Diagnosis Treatment'=>'Dual-Diagnosis Treatment','Intensive Outpatient Services'=>'Intensive Outpatient Services','Telehealth'=>'Telehealth','Other'=>'Other'], null, ['id' => 'facilities', 'class' => 'form-control select2','multiple','required']) !!}
        @if ($errors->has('facilities'))
            <span class="text-danger alert">{{ $errors->first('facilities') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="facebook" class="form-control-label">Facebook Link  </label>
        {!! Form::text('facebook', null, ['id' => 'facebook', 'class' => 'form-control']) !!}
        @if ($errors->has('facebook'))
            <span class="text-danger alert">{{ $errors->first('facebook') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="youtube" class="form-control-label">Youtube Link  </label>
        {!! Form::text('youtube', null, ['id' => 'youtube', 'class' => 'form-control']) !!}
        @if ($errors->has('youtube'))
            <span class="text-danger alert">{{ $errors->first('youtube') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="twitter" class="form-control-label">Twitter Link  </label>
        {!! Form::text('twitter', null, ['id' => 'twitter', 'class' => 'form-control']) !!}
        @if ($errors->has('twitter'))
            <span class="text-danger alert">{{ $errors->first('twitter') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="pinterest" class="form-control-label">Pinterest Link  </label>
        {!! Form::text('pinterest', null, ['id' => 'pinterest', 'class' => 'form-control']) !!}
        @if ($errors->has('pinterest'))
            <span class="text-danger alert">{{ $errors->first('pinterest') }}</span>
        @endif
    </div>
    
    <div class="form-group">
        <label for="website" class="form-control-label">Website Link  </label>
        {!! Form::text('website', null, ['id' => 'website', 'class' => 'form-control']) !!}
        @if ($errors->has('website'))
            <span class="text-danger alert">{{ $errors->first('website') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="insurance_accepts" class="form-control-label">Type Insurance Accepted Name And Press Enter *  [EX:Private Insurance ]  </label>
        {!! Form::select('insurance_accepts[]',[], null, ['id' => 'insurance_accepted', 'class' => 'form-control zipselect2','multiple']) !!}
        @if ($errors->has('insurance_accepted'))
            <span class="text-danger alert">{{ $errors->first('insurance_accepted') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="youtube" class="form-control-label">youtube Link  </label>
        {!! Form::text('youtube', null, ['id' => 'youtube', 'class' => 'form-control']) !!}
        @if ($errors->has('youtube'))
            <span class="text-danger alert">{{ $errors->first('youtube') }}</span>
        @endif
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
        <label for="keyword" class="form-control-label">Keyword </label>
        {!! Form::text('keyword', null, ['id' => 'keyword', 'class' => 'form-control']) !!}
        @if ($errors->has('keyword'))
            <span class="text-danger alert">{{ $errors->first('keyword') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="category" class="form-control-label">Category * </label>
        {!! Form::select('category',[], null, ['id' => 'category', 'class' => 'form-control','placeholder'=>'Select One']) !!}
        @if ($errors->has('category'))
            <span class="text-danger alert">{{ $errors->first('category') }}</span>
        @endif
    </div>
   
    <div class="form-group">
        <label for="short_description" class="form-control-label">Short Description * </label>
        {!! Form::text('short_description', null, ['id' => 'short_description', 'class' => 'form-control', 'required']) !!}
        @if ($errors->has('short_description'))
            <span class="text-danger alert">{{ $errors->first('short_description') }}</span>
        @endif
    </div>
    <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Image *
          </a>
        </span>
        {!! Form::text('image', null, ['id' => 'thumbnail', 'class' => 'form-control', 'required','readonly']) !!}
        @if ($errors->has('image'))
        <span class="text-danger alert">{{ $errors->first('image') }}</span>
      @endif
    <img id="holder" style="margin-top:15px;max-height:100px;">
    </div>


    <div class="form-group">
        <label for="long_description" class="form-control-label">Long Description * </label>
        {!! Form::textarea('long_description', null, [
            'id' => 'long_description',
            'class' => 'form-control',
            'required',
            'rows' => 2,
        ]) !!}
        @if ($errors->has('long_description'))
            <span class="text-danger alert">{{ $errors->first('long_description') }}</span>
        @endif
    </div>
</div>
