@extends('layouts.master')

@section('title')
    @lang('fields.welcome_title')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>@lang('fields.signup')</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">@lang('fields.email')</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="first_name">@lang('fields.first_name')</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                </div>
                 <div class="form-group">
                    <label for="last_name">@lang('fields.last_name')</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                </div>
                <div class="form-group">
                    <label for="user_name">@lang('fields.user_name')</label>
                    <input class="form-control" type="text" name="user_name" id="user_name" value="{{ Request::old('user_name') }}">
                </div>
                <div class="form-group">
                    <label for="password">@lang('fields.password')</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">@lang('fields.submit')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>@lang('fields.signin')</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email">@lang('fields.email')</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">@lang('fields.password')</label>
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">@lang('fields.submit')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    </div>
@endsection