@extends('main')

@section('title','| View Posts')
@section('stylesheet')
    {!! Html::style('assets/plugins/flot/examples/examples.css') !!}
@endsection
@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categories Chart
                    </div>

                    <div class="panel-body">

                        <div class="demo-container">
                            <div id="placeholder" class="demo-placeholder"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    {!! Html::script('assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js') !!}
    {!! Html::script('assets/plugins/flot/jquery.flot.js') !!}
    {!! Html::script('assets/plugins/flot/jquery.flot.resize.js') !!}
    {!! Html::script('assets/plugins/flot/jquery.flot.categories.js') !!}
    {!! Html::script('assets/plugins/flot/jquery.flot.errorbars.js') !!}
    {!! Html::script('assets/plugins/flot/jquery.flot.navigate.js') !!}
    {!! Html::script('assets/plugins/flot/jquery.flot.stack.js') !!}
    {!! Html::script('assets/js/bar_chart.js') !!}
@endsection