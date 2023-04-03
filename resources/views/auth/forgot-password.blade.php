{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu a sua senha? Não há problema. Informe-nos apenas sobre o seu endereço de e-mail e lhe iremos enviar por e-mail um link de restauração da sua palavra-passe que lhe permitirá escolher uma nova senha.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Link de restauração da sua senha') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ELITE ACADÉMICO | Recuprar Senha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout3" data-bg-image="img/figure/bg3-l.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 fxt-none-991">
                    <div class="fxt-header">
                        <div class="fxt-transformY-50 fxt-transition-delay-1">
                            <a href="{{ route('login') }}" class="fxt-logo"><img src="img/elitedit.png" width="100px"
                                    alt="Logo"></a>
                        </div>
                        <div class="fxt-transformY-50 fxt-transition-delay-2">
                            <h1>ELITE ACADÉMICO</h1>
                        </div>
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <p>Esqueceu a sua senha? Não há problema. Informe-nos apenas sobre o seu endereço de e-mail
                                e lhe iremos enviar por e-mail um link de restauração da sua palavra-passe que lhe
                                permitirá escolher uma nova senha.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-form">
                            <h2>Esqueceu a senha</h2>
                            <div class="texto">Para recuperar sua senha</div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger role">
                                        <div class="display">
                                            <strong> {{ $error }}</strong>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="input-label">Informe o seu Email </label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ old('email') }}" placeholder="estudante@eleiteclda.com">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Envie-me um e-mail</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="js/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/forgot-password-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 09:31:42 GMT -->

</html>
