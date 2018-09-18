<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AI</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 300%;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
                <!-- <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a> 
            -->
            @endauth
        </div>
        @endif

        @if(!$user)
        <div class="content">
            <div class="title m-b-md">
                Hi {{ $name }}, I will like to know you more?
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('user') }}">
                    @csrf

                    <div class="col-md-6">
                        <input id="name" type="hidden" name="name" value="{{ $name }}" required autofocus>
                    </div>

                    <div class="form-group row">
                        <label for="dob" class="col-sm-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                        <div class="col-md-6">
                            <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>

                            @if ($errors->has('dob'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cob" class="col-sm-4 col-form-label text-md-right">{{ __('Place of Birth') }}</label>

                        <div class="col-md-6">
                            <input id="cob" type="text" class="form-control{{ $errors->has('cob') ? ' is-invalid' : '' }}" name="cob" value="{{ old('cob') }}" required autofocus>

                            @if ($errors->has('cob'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cob') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary links">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @else 

        <div class="content">
            <div class="title m-b-md">
                Hi {{ $user->name }}, welcome back
            </div>

            <div class="card-body">
                <p>You are {{ date_diff(date_create(date('Y-m-d')), date_create($user->dob))->y }} years old and you are from {{ $user->cob }}</p>
            </div>
        </div>

        @endif
    </div>
</body>
</html>
