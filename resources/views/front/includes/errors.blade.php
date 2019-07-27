@if(Session('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
@if(Session('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif