<div class="col-md-12">
    <div class="form-group">
        <label for="email" class="form-control-label">Email * </label>
        {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required']) !!}
        @if ($errors->has('email'))
            <span class="text-danger alert">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="status" class="form-control-label">Status *</label>
        {!! Form::select('status',[1=>'Active',0=>'In-Active'], null, ['id' => 'status', 'class' => 'form-control select2']) !!}
        @if ($errors->has('status'))
            <span class="text-danger alert">{{ $errors->first('status') }}</span>
        @endif
    </div>

</div>
