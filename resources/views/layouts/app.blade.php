<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
          <link href="{{asset("assets/css/toastr.css")}}" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
</head>

<body>


<div class="container mt-5">
    @yield("content")
</div>


<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/tether.min.js")}}"></script><!-- Tether for Bootstrap -->
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/toastr.min.js")}}"></script>
@yield("js")

</body>

</html>
