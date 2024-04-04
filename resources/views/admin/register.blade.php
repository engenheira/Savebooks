<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title> Savebooks</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Platafrma de cadastro de livros">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="{{url('assets/plugins/fontawesome/js/all.min.js')}}"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="{{url('assets/css/portal.css')}}">

</head>

<body class="app app-signup p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{url('assets/images/app-logo.svg')}}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Cadastre-se no Savebooks</h2>
					@if ($error)
					<div class="alert alert-danger">{{$error}}</div>
					@endif
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" method="POST">
							@csrf
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Nome</label>
								<input id="signup-name" name="name" type="text" class="form-control signup-name" placeholder="Nome completo" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="Email" required="required">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Senha</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
						

							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Cadastrar-se</button>
							</div>
						</form><!--//auth-form-->

						<div class="auth-option text-center pt-5">Já tem uma conta? <a class="text-link" href="{{url('admin/login')}}">Faça o Login </a></div>
					</div><!--//auth-form-container-->



				</div><!--//auth-body-->

			</div><!--//flex-column-->
		</div><!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				
			</div><!--//auth-background-overlay-->
		</div><!--//auth-background-col-->

	</div><!--//row-->


</body>

</html>