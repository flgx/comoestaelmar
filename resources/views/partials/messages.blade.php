@if(count($errors) > 0)
<div class="container">
    <div class="alert alert-danger col-md-10 col-md-offset-1">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>        
        @endforeach
        </ul>
    </div>
</div>
@endif
@if (Session::has('flash_notification.message'))
    <div class="container">
        <div class="alert col-md-10 col-md-offset-1">
			@include('flash::message')
        </div>
    </div>
@endif