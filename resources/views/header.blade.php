<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Permit | GBI Sukawarna</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>

    <script type="text/javascript">
      var base_url = "{{ URL::to('/') }}";
    </script>

    <!--end::Web font -->
    <!--begin::Base Styles -->
    <!-- <link href="../../../assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" /> -->

    <link href="https://fonts.googleapis.com/css?family=Barlow:400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="{{asset('css/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- <link href="../../../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" /> -->
    <link href="{{asset('css/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!-- <link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css" /> -->

    <!--end::Base Styles -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <style type="text/css">
        body {
            height: auto;
        }

        body, .form-control {
            font-family: "Barlow", Times, serif !important;
        }

        .m-login.m-login--5 .m-login__wrapper-2 {
            padding-top: 3%;
        }

        .m-login.m-login--5 {
            padding-bottom: 60px !important;
        }

        .m-footer {
            margin-left: 0px !important;
        }

        #submit-btn {
            background-color: #F36E23;
            border-color: #F36E23;
            font-family: "Barlow";
            font-weight: 600;
            padding: 0.7rem 2rem;
            border-radius: 0.7rem;
        }

        .m-login.m-login--5 .m-login__wrapper-2 .m-login__contanier .m-login__form .m-form__group .form-control {
            border-bottom: 2px solid #453939;
            padding: 1.1rem 0;
        }

        .form-control:focus {
            border-color: #F36E23 !important;
        }

        .m-login__form .form-control:focus::-webkit-input-placeholder {
            color: #F36E23 !important;
        }

        .m-login__form .form-control:focus:-moz-placeholder {
            color: #F36E23 !important;
        }

        /* Firefox > 19 */
        .m-login__form .form-control:focus::-moz-placeholder {
            color: #F36E23 !important;
        }

        /* Internet Explorer 10 */
        .m-login__form .form-control:focus:-ms-input-placeholder {
            color: #F36E23 !important;
        }

        ::placeholder {
            text-transform: uppercase;
        }

        .name-dropdown {
            text-align: center;
        }

        .name-dropdown-content{
            padding: 10px;
        }

        .name-dropdown-content:hover {
            background-color: #F4D03F;
        }

        .hide {
            display: none !important;
        }

        .lds-facebook {
          display: inline-block;
          position: relative;
          width: 80px;
          height: 80px;
          margin-left: 10%;
        }
        .lds-facebook div {
          display: inline-block;
          position: absolute;
          left: 8px;
          width: 8px;
          background: #F36E23;
          animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }
        .lds-facebook div:nth-child(1) {
          left: 4px;
          animation-delay: -0.24s;
        }
        .lds-facebook div:nth-child(2) {
          left: 16px;
          animation-delay: -0.12s;
        }
        .lds-facebook div:nth-child(3) {
          left: 28px;
          animation-delay: 0;
        }
        @keyframes lds-facebook {
          0% {
            top: 8px;
            height: 64px;
          }
          50%, 100% {
            top: 24px;
            height: 32px;
          }
        }


    </style>
</head>