<!DOCTYPE html>
<html lang="en">

<head>
  <title>Savebooks - Login</title>

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

<body class="app app-login p-0">
  <div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
      <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">
          <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{url('assets/images/app-logo.svg')}}" alt="logo"></a></div>
          <h2 class="auth-heading text-center mb-5">Entrar no Savebooks</h2>

          @if ($error)
          <div class="alert alert-danger">{{$error}}</div>
          @endif


          <div class="auth-form-container text-start">
            <form class="auth-form login-form" method="POST">
              @csrf
              <div class="email mb-3">
                <label class="sr-only" for="signin-email">Email</label>
                <input id="signin-email" name="email" type="email" class="form-control signin-email" placeholder="Seu email" required="required">
              </div><!--//form-group-->
              <div class="password mb-3">
                <label class="sr-only" for="signin-password">Password</label>
                <input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Sua senha" required="required">
              
              </div><!--//form-group-->
              <div class="text-center">
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Entrar</button>
              </div>
            </form>

            <div class="auth-option text-center pt-5">Ainda não tem conta? Sign up <a class="text-link" href="{{url('/admin/register')}}">Cadastre-se</a>.</div>
          </div><!--//auth-form-container-->

        </div><!--//auth-body-->

   
      </div><!--//flex-column-->
    </div><!--//auth-main-col-->
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
      <div class="auth-background-holder">
      </div>
     
      
    </div><!--//auth-background-col-->

  </div><!--//row-->


</body>

</html>