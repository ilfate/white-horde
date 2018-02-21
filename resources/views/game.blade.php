@extends('layouts.game')

@section('content')
    <script>
        var BACKEND_TRIBE = {!!  $tribe  !!};
    </script>
    <div id="react-root"></div>

@endsection
