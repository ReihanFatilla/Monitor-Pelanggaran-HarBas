<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>{{__('Register')}}</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<!-- <link rel="stylesheet" type="text/css" href="css/roboto-font.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset ('fonts/line-awesome/css/line-awesome.min.css')}}">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="{{ asset('css/register.css') }}">

</head>

<body class="form-v2">
	<div class="page-content">
		<div class="form-v2-content">
			<div class="form-left">
				<img src="{{asset ('images/harbas.png')}}" class="img-left" alt="form">
				<div class="text-1">
					<p>Web<span>Pencatatan Pelanggaran</span></p>
				</div>
				<div class="text-2">
					<p><span>SMK</span>Harapan Bangsa</p>
				</div>
			</div>

			<form class="form-detail" action="{{ route('register') }}" method="POST">
				@csrf
				<h2>Registration Form</h2>
				<div class="form-row">
					<label for="full-name">{{__('Nama Lengkap')}}</label>
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror input-text" value="{{ old('name') }}" placeholder="ex: Galang Davian Pradana" required autocomplete="name" autofocus>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-row">
					<label for="nisn">{{__('NISN')}}</label>
					<input type="number" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror input-text" value="{{ old('nisn') }}" placeholder="ex: 0069728294" required autocomplete="nisn" autofocus>
					@error('nisn')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-row">
					<label for="kelas">{{__('Kelas')}}</label>
					<select name="id_kelas" id="kelas-select" class="form-select input-text" aria-label="Default select example">
						<option selected value="">Pilih Kelas</option>
						@foreach($kelas as $kelas)
						<option value="{{$kelas->id}}">{{$kelas->nama}}</option>
						@endforeach
					</select>

					@error('kelas')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-row">
					<label for="your_email">{{ __('Your Email:') }}</label>
					<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror input-text" required autocomplete="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" value="{{ old('email') }}">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-row">
					<label for="password">{{ __('Password:') }}</label>
					<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror input-text" required autocomplete="new-password">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-row">
					<label for="comfirm-password">{{ __('Confirm Password:') }}</label>
					<input type="password" name="password_confirmation" id="confirm_password" class="form-control input-text" required autocomplete="new-password">
				</div>
				<div class="form-row-last">
					<button type="submit" class="register register-btn">{{ __('Register') }}</button>
				</div>

			</form>

		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		$(document).ready(function() {


			$('#kelas-select').change(function() {
				if ($(this).find('option:first').val() == 'Pilih Kelas') {
					$(this).find('option:first').remove();
				}
			})
		})
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
			debug: true,
			success: function(label) {
				label.attr('id', 'valid');
			},
		});
		$("#myform").validate({
			rules: {
				password: "required",
				confirm_password: {
					equalTo: "#password"
				}
			},
			messages: {
				full_name: {
					required: "Please provide an username"
				},
				your_email: {
					required: "Please provide an email"
				},
				password: {
					required: "Please provide a password"
				},
				confirm_password: {
					required: "Please provide a password",
					equalTo: "Wrong Password"
				}
			}
		});
	</script>
</body>

</html>