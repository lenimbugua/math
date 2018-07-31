@if(Auth::guard('web')->check())
	<p class="text-success">
		you are logged in as a <strong>	USER</strong>
	</p>
@else
	<p class="text-danger">
		you are logged out as a <strong>	USER</strong>
	</p>
@endif
@if(Auth::guard('admin')->check())
	<p class="text-success">
		you are logged in as a <strong>	ADMIN</strong>
	</p>
@else
	<p class="text-danger">
		you are logged out as a <strong>	ADMIN</strong>
	</p>
@endif