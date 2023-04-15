<div class="col-md-12">
    <div class="form-group">
        <label for="short_description" class="form-control-label">Short Description * </label>
        {!! Form::text('short_description', null, ['id' => 'short_description', 'class' => 'form-control', 'required']) !!}
        @if ($errors->has('short_description'))
            <span class="text-danger alert">{{ $errors->first('short_description') }}</span>
        @endif
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
    
    <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Image *
          </a>
        </span>
        {!! Form::text('image', null, ['id' => 'thumbnail', 'class' =>'form-control', 'required','readonly','style'=>'height:40px']) !!}
       
        @if ($errors->has('image'))
        <span class="text-danger alert">{{ $errors->first('image') }}</span>
      @endif
    <img id="holder" style="margin-top:15px;max-height:100px;">
    </div>
   

    
</div>
