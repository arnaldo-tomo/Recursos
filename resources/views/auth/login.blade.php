{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembre-se de mim') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a sua senha?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
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
    <title>ELITE ACADÉMICO</title>
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
                            <p>
                                Bem-vindo aos Serviços Online ao Estudante da Universidade EliteTec Moçambique!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 fxt-bg-color">
                    <div class="fxt-content">

                        <div class="fxt-form">
                            <div>

                                <h1>Entrar</h1>
                                <div class="texto">Informe as suas credencias para ter o acesso.</div>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger role">
                                        <div class="display">
                                            <strong> {{ $error }}</strong>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="input-label">Email do Utilizador</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ old('email') }}" placeholder="estudante@eleiteclda.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="input-label">Senha do Utilizador</label>
                                    <input id="password" type="password" class="form-control"
                                        value="{{ old('password') }}" name="password" placeholder="********">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="fxt-checkbox-area">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">Mantenha-me conectado</label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="switcher-text">Esqueci a minha
                                            Senha</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Entrar</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
