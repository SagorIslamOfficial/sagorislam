<div>
	{{--Flash Message Show--}}
	@if (session('success'))
		<div class="alert alert-success text-primary">
			{{ session('success') }}
		</div>
	@endif
	@if (session('danger'))
		<div class="alert alert-danger">
			{{ session('danger') }}
		</div>
	@endif
</div>
