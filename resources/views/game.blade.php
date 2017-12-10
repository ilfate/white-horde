@extends('layouts.game')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Game</div>

                <div class="panel-body">
                    <script>
                        var BACKEND_TRIBE = {!!  $tribe  !!};
                    </script>
                    <div id="react-root"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
