@if(Session::has('alert-danger'))
<div class="alert alert-danger" style="background-color: #fff; text-align: center" role="alert">
	{{ Session::get('alert-danger') }}
</div>
@endif

@if(Session::has('alert-info'))
<div class="alert alert-info" style="background-color: #fff; text-align: center" role="alert">
	{{ Session::get('alert-info') }}
</div>
@endif

@if(Session::has('alert-success'))
<div class="alert alert-success" style="background-color: #fff; text-align: center" role="alert">
	{{ Session::get('alert-success') }}
</div>
@endif