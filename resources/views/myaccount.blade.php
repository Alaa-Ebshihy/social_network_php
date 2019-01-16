@extends('layouts.master')

@section('title')
    @lang('fields.welcome_title')
@endsection

@section('left_header')
    @lang('fields.welcome_user', ['name' => $user->first_name])
@endsection

@section('middle_header')
    @include('includes.middle-header')
@endsection

@section('right_header')
        <form class="form-inline" action="{{ route('logout') }}" method="get">
            <button class="btn btn-primary" type="submit">@lang('fields.logout')</button>
        </form>
@endsection

@section('content')
    @include('includes.message-block')
    <div class="row">
        <div class="col-md-6">
            <h3>@lang('fields.account_details')</h3>
            <form action="{{ route('updateaccount') }}" method="post">
                <div class="form-group">
                    <label for="email">@lang('fields.email')</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ $user->email }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="first_name">@lang('fields.first_name')</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                </div>
                 <div class="form-group">
                    <label for="last_name">@lang('fields.last_name')</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}">
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="user_name">@lang('fields.user_name')</label>
                    <input class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}" type="text" name="user_name" id="user_name" value="{{ $user->user_name }}">
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
                <button type="submit" class="btn btn-primary">@lang('fields.save')</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection