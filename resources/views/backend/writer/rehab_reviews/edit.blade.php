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
@section('title', 'Update Rehab Review')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Rehab Update</p>
                        <a href="{{ route(Request::segment(1) . '.rehab-review-lists.index') }}"
                            class="btn btn-primary btn-sm ms-auto">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @include('partial.formerror')
                        {!! Form::model($rehabreviewdata, [
                        'route' => [Request::segment(1) . '.rehab-review-lists.update', $rehabreviewdata->id],
                        'method' => 'PATCH',
                        'files' => true,
                        ]) !!}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name" class="form-control-label"> Name * </label>
                                {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control',
                                'required']) !!}
                                @if ($errors->has('name'))
                                <span class="text-danger alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone" class="form-control-label">Phone * </label>
                                {!! Form::tel('phone', null, ['id' => 'phone', 'class' => 'form-control']) !!}
                                @if ($errors->has('phone'))
                                <span class="text-danger alert">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email" class="form-control-label">Email *</label>
                                {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control']) !!}
                                @if ($errors->has('email'))
                                <span class="text-danger alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="rating" class="form-control-label">Rating *</label>
                                {!! Form::number('rating', null, ['id' => 'rating', 'class' => 'form-control','min'=>1, 'max'=>5,'readonly']) !!}
                                @if ($errors->has('rating'))
                                <span class="text-danger alert">{{ $errors->first('rating') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="review_title" class="form-control-label"> Review Title * </label>
                                {!! Form::text('review_title', null, ['id' => 'review_title', 'class' => 'form-control',
                                'required']) !!}
                                @if ($errors->has('review_title'))
                                <span class="text-danger alert">{{ $errors->first('review_title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="comment" class="form-control-label"> Review Comment * </label>
                                {!! Form::textarea('comment', null, ['id' => 'comment', 'class' => 'form-control','placeholder'=>'Your Review Comment','required']) !!}
                            
                                @if ($errors->has('comment'))
                                <span class="text-danger alert">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-control-label">Status *</label>
                                {!! Form::select('status',[1=>'Publish',0=>'Pending'], null, ['id' => 'status', 'class' => 'form-control select2']) !!}
                                @if ($errors->has('status'))
                                    <span class="text-danger alert">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                            <button type="submit" name="deletereview" class="btn btn-danger btn-sm ms-auto">Delete</button>
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

<script>
    $('.select2').select2();
   
</script>

@endpush