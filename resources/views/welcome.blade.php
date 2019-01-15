@extends('layouts.master')

@section('title')
    @lang('fields.welcome_title')
@endsection

@section('left_header')
    @lang('fields.welcome_header')
@endsection

@section('content')
    @include('includes.message-block')

    <div class="row">
        <div class="col-md-6">
            <h3>@lang('fields.signup')</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">@lang('fields.email')</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="first_name">@lang('fields.first_name')</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                </div>
                 <div class="form-group">
                    <label for="last_name">@lang('fields.last_name')</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ Request::old('last_name') }}">
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="user_name">@lang('fields.user_name')</label>
                    <input class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}" type="text" name="user_name" id="user_name" value="{{ Request::old('user_name') }}">
                    @if($errors->has('user_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">@lang('fields.password')</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">@lang('fields.submit')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>@lang('fields.signin')</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="signin_email">@lang('fields.email')</label>
                    <input class="form-control {{ $errors->has('signin_email') ? 'is-invalid' : '' }}" type="text" name="signin_email" id="signin_email" value="{{ Request::old('signin_email') }}">
                    @if($errors->has('signin_email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('signin_email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="signin_password">@lang('fields.password')</label>
                    <input class="form-control {{ $errors->has('signin_password') ? 'is-invalid' : '' }}" type="password" name="signin_password" id="signin_password" value="{{ Request::old('signin_password') }}">
                    @if($errors->has('signin_password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('signin_password') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">@lang('fields.submit')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>

    </div>
@endsection