<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("Common.head")
<body class="h-full ">

@include("admin.layout.Partials.header")

@include("admin.layout.Partials.sidebar")


<div class="p-4 sm:ml-64   h-full bg-white">
    <div class="p-4 mt-10 h-full bg-white">
        @include("Common.message")
        @yield("content")
    </div>
</div>

@include("admin.layout.Partials.footer")
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@section("scripts")
@show
</body>
</html>
