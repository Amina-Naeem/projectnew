@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Wish</title>
    <link href="{{ asset('/customeAuth/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('/customeAuth/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">

                            <!-- Main Heading-->
                            <h1 class="h4 text-gray-900 mb-4">@lang('home.addaWish')</h1>
                        </div>
                        @if(Session::has('wish_created'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('wish_created')}}
                            </div>
                        @endif
                        <form method="POST" action="{{route('wish.create')}}">
                            @csrf
                            <div class="form-group row text-gray-900">
                                <div class="col-sm-12 mb-3 mb-sm-0">

                                    <!--get ID-->
                                    <label for="id">@lang('home.wish')@lang('home.id')</label>
                                    <input  id="id" type="number" name="id" required class="form-control form-control-user @error ('id') border border-red-500 @enderror" placeholder="@lang('home.wish')@lang('home.id')">
                                    @error ('id')
                                    <div class="alert-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-gray-900">

                                <!--get wish-->
                                <label for="wish">@lang('home.wish')</label>
                                <input id="wish" required type="text" class="form-control form-control-user @error ('wish') border border-red-500 @enderror" name="wish" rows="3"  placeholder="@lang('home.makenewWish')"></input>
                                @error ('wish')
                                <div class="alert-message">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group row text-gray-900">
                                <div class="col-sm-12 mb-3 mb-sm-0">

                                    <!--get fulfilled-->
                                    <label for="fulfilled">@lang('home.fulfilled')</label>
                                    <input id="fulfilled" type="text" class="form-control form-control-user @error ('fulfilled') border border-red-500 @enderror" required name="fulfilled" placeholder="@lang('home.yes')/@lang('home.nope')/@lang('home.other')">
                                    @error ('fulfilled')
                                    <div class="alert-message">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-primary btn-user btn-block ">
                                @lang('home.addaWish')
                            </button>
                            <div class="p-2 form-group row">
                                <hr>
                                <a href="/wishes" class="btn btn-success p-1">@lang('home.back')</a>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
@endsection
