<header>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <span class="navbar-brand mb-0 h1">@lang('fields.welcome_header')</span>
        <form class="form-inline" action="{{ route('logout') }}" method="get">
            <button class="btn btn-primary" type="submit">@lang('fields.logout')</button>
        </form>
    </nav>
</header>