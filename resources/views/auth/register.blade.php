@extends('welcome')
@section('title')
Register
@endsection

@section('content')
<style>
	body {
		background: #f0f2f5;
	}

	.register-card {
		max-width: 450px;
		margin: 60px auto;
		background: #fff;
		padding: 30px;
		border-radius: 1rem;
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	}

	.register-header {
		text-align: center;
		font-weight: bold;
		color: #0d6efd;
		margin-bottom: 20px;
	}

	.register-footer {
		text-align: center;
		margin-top: 20px;
		font-size: 0.9rem;
	}
</style>

<div class="register-card">
	<h3 class="register-header">
		<i class="fa-solid fa-user-plus me-2"></i>Register Akun
	</h3>

	@if(Session::has('pesan'))
	<div class="alert alert-success">
		{{ Session::get('pesan') }}
	</div>
	@endif

	<form action="{{ url('register') }}" method="post">
		@csrf
		<div class="mb-3">
			<label for="name" class="form-label fw-semibold">Username</label>
			<input value="{{ old('name') }}" type="text" name="name" id="name"
				class="form-control @error('name') is-invalid @enderror"
				placeholder="Masukkan nama lengkap...">
			@error('name')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="password" class="form-label fw-semibold">Password</label>
			<input type="password" name="password" id="password"
				class="form-control @error('password') is-invalid @enderror"
				placeholder="Masukkan password...">
			@error('password')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="mb-3">
			<label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
			<input type="password" name="password_confirmation" id="password_confirmation"
				class="form-control @error('password') is-invalid @enderror"
				placeholder="Ulangi password...">
			@error('password')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
		</div>

		<div class="d-grid gap-2">
			<button type="submit" class="btn btn-primary rounded-pill">
				<i class="fa-solid fa-check me-1"></i>Daftar
			</button>
			<button type="reset" class="btn btn-outline-secondary rounded-pill">
				<i class="fa-solid fa-rotate-left me-1"></i>Reset
			</button>
		</div>
	</form>

	<div class="register-footer">
		Sudah punya akun? <a href="{{ url('login') }}"><strong>Login di sini</strong></a>
	</div>
</div>
@endsection
