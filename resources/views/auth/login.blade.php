@extends('welcome')
@section('title')
Login
@endsection

@section('content')
<style>
	body {
		background: #f2f4f6;
	}

	.login-card {
		width: 100%;
		max-width: 400px;
		border: none;
		border-radius: 1rem;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
		background-color: #ffffff;
	}

	.login-header {
		background-color: #0d6efd;
		color: white;
		border-top-left-radius: 1rem;
		border-top-right-radius: 1rem;
		padding: 20px;
		text-align: center;
		font-weight: bold;
	}

	.login-footer {
		text-align: center;
		padding: 15px;
		font-size: 0.9rem;
	}
</style>

<div class="d-flex justify-content-center align-items-center vh-100">
	<div class="login-card shadow">
		<div class="login-header">
			<i class="fa-solid fa-right-to-bracket me-2"></i>Login
		</div>
		<div class="card-body px-4 pt-4 pb-2">
			<form action="" method="post">
				@csrf
				<div class="mb-3">
					<label for="name" class="form-label fw-semibold">Username</label>
					<input type="text" required name="name" id="name"
						class="form-control @error('name') is-invalid @enderror"
						placeholder="Masukkan username...">
					@error('name')
					<div class="invalid-feedback">
						Username tidak ditemukan.
					</div>
					@enderror
				</div>

				<div class="mb-3">
					<label for="password" class="form-label fw-semibold">Password</label>
					<input type="password" required name="password" id="password"
						class="form-control @error('password') is-invalid @enderror"
						placeholder="Masukkan password...">
					@error('password')
					<div class="invalid-feedback">
						Password salah.
					</div>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary w-100 rounded-pill">
					<i class="fa-solid fa-unlock me-1"></i> Login
				</button>
			</form>
		</div>

		<div class="login-footer">
			Belum punya akun? <a href="{{ url('register') }}">Daftar di sini</a>
		</div>
	</div>
</div>
@endsection
