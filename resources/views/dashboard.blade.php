@extends('layouts.master')

@section('title')
    @lang('fields.welcome_title')
@endsection

@section('content')
	@include('includes.message-block')

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
        	<header><h3>@lang('fields.post_header')</h3></header>
        	<form action="{{ route('createpost') }}" method="post">
        		<div class="form-group">
                    <textarea class="form-control" name="body" id="body" rows="5" placeholder="@lang('fields.post_placeholder')"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">@lang('fields.create_post_btn')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
        	</form>
       	</div>
    </section>

@endsection
