@if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    </ul>
@endif
@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') == 'error'? 'danger' : 'success' }}" role="alert">
        {{Session::get('message')}}
    </div>
@endif
