@extends('layouts.morale.app')

@section('title')
@endsection

@section('page-title')
@endsection

@section('styles')
<style>
    table.tile_info td:first-child {
        width: 75% !important;
    }

    i.text-warning {
        color: #ff9e05;
    }
</style>
@endsection

@section('content')
<!-- <div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
          <div class="count">179</div>
          <h3>New Sign ups</h3>
          <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-comments-o"></i></div>
          <div class="count">179</div>
          <h3>New Sign ups</h3>
          <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
          <div class="count">179</div>
          <h3>New Sign ups</h3>
          <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-check-square-o"></i></div>
          <div class="count">179</div>
          <h3>New Sign ups</h3>
          <p>Lorem ipsum psdea itgum rixt.</p>
        </div>
    </div>
</div> -->

@hasanyrole(['Admin', 'unit head'])
<section class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Overall Index (OI)<small> Morale Survey</small></h2>
                <div class="filter">
                    <div class="pull-right">
                        <select class="form-control">
                            <option value="">-- Please select a semester --</option>
                            @if( !$semester->isEmpty() )
                                @foreach($semester as $sem)
                                    <option selected value="{{ $sem['id'] }}">{{ $sem->from['month']}} - {{ $sem->to['month']}}, {{ $sem['year'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <canvas id="oiChart"></canvas>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2><b>OI%</b> Legend</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <table class="tile_info">
                            <tbody>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square green"></i>Very positive and favorable </p>
                                    </td>
                                    <td>76 - 100%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square blue"></i>Positive and favorable </p>
                                    </td>
                                    <td>51 - 75%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square text-warning"></i>Negative and unfavorable </p>
                                    </td>
                                    <td>26 - 50%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square red"></i>Very negative and unfavorable </p>
                                    </td>
                                    <td>0 - 25%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Overall Index (OI)<small>Morale Survey Per Question</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <canvas id="perQuestionOIChart"></canvas>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2><b>OI%</b> Legend</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <table class="tile_info">
                            <tbody>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square green"></i>Very positive and favorable </p>
                                    </td>
                                    <td>76 - 100%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square blue"></i>Positive and favorable </p>
                                    </td>
                                    <td>51 - 75%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square text-warning"></i>Negative and unfavorable </p>
                                    </td>
                                    <td>26 - 50%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><i class="fa fa-square red"></i>Very negative and unfavorable </p>
                                    </td>
                                    <td>0 - 25%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endhasanyrole

@endsection

@section('scripts')
<!-- Chart.js -->
<script src="{{ asset('bower/chart.js/dist/Chart.min.js') }}"></script>
<!-- Chart.js plugin -->
<script src="{{ asset('bower/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
<script src="{{ asset('bower/chartjs-plugin-annotation/chartjs-plugin-annotation.min.js') }}"></script>
<script>
var randomColorPlugin = {

    // We affect the `beforeUpdate` event
    beforeUpdate: function(chart) {
        var backgroundColor = [];
        var data = chart.config.data.datasets[0].data;

        $.each(data, function(n, currentElem) {

            if ( currentElem > 75 ) {
                var color = "#3cba9f"; // green
            } else if ( currentElem > 50 ) {
                var color = "#3e95cd"; // blue
            } else if ( currentElem > 25 ) {
                var color = "#ff9e05"; // orange
            } else {
                var color = "#c45850"; // red
            }

            backgroundColor.push(color);
        });
        
        // We update the chart bars color properties
        chart.config.data.datasets[0].backgroundColor = backgroundColor;
    }
};

Chart.pluginService.register(randomColorPlugin);

var arrayDivOi     = {!! json_encode($div_oi) !!};
var myChart = new Chart($('#oiChart'), {
    type: 'bar',
    data: {
        labels: ["Overall Index", "ORD", "FAS", "FOD", "TSS"],
        datasets: [{
            label: 'OI%',
            data: arrayDivOi,
            datalabels: {
                align: 'end',
                anchor: 'end',
                offset: 1
            },
        }]
    },
    options: {
        // tooltips: false,
        scaleShowGridLines : true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    max: 100
                }
            }],
            xAxes: [{
                categoryPercentage: 1,
                barPercentage: 0.6
            }]
        },
        legend: { display: false },
        title: {
            display: true,
            text: 'Overall Index (OI) based on Conducted Morale Survey '
        },
        annotation: {
            annotations: [{
                drawTime: 'afterDraw', // overrides annotation.drawTime if set
                id: 'a-line-1', // optional
                type: 'line',
                mode: 'horizontal',
                scaleID: 'y-axis-0',
                value: '25',
                borderColor: 'red',
                borderWidth: 1,   
                borderDash: [2, 2],    
                label: {
                    // Background color of label, default below
                    backgroundColor: '#c45850',
                    // Font family of text, inherits from global
                    fontFamily: "sans-serif",
                    // Font size of text, inherits from global
                    fontSize: 12,
                    // Font style of text, default below
                    fontStyle: "bold",
                    // Font color of text, default below
                    fontColor: "#fff",
                    // Anchor position of label on line, can be one of: top, bottom, left, right, center. Default below.
                    position: "center",
                    // Adjustment along y-axis (top-bottom) of label relative to above number (can be negative)
                    // For vertical lines positioned top or bottom, negative values move
                    // the label toward the edge, and positive values toward the center.
                    yAdjust: -15,
                    // Whether the label is enabled and should be displayed
                    enabled: true,
                    // Text to display in label - default is null
                    content: "Critical"
                },
            }]
        },
        plugins: {
            datalabels: {
                backgroundColor: function(context) {
                    return context.dataset.backgroundColor;
                },
                formatter: function(value, context) {
                    if ( value > 0 ) {
                        return value + '%';
                    } else {
                        return 0 + '%';
                    }
                },
                borderRadius: 4,
                color: 'white',
                font: {
                    weight: 'bold'
                },
            }
        },
    }
});

/*** QUESTIONS ***/
var arrayQuestions  = {!! json_encode($question_oi) !!};
var $question_labels = [];
var $questions       = [];
var $answers          = [];

$.each(arrayQuestions, function (n, currentElem) {
    $question_labels.push(++n);
    $questions.push(currentElem.question);
    $answers.push(currentElem.answer)
});

var myBarChart = new Chart($('#perQuestionOIChart'), {
    type: 'bar',
    data: {
        labels: $question_labels,
        datasets: [{
            label: 'OI%',
            data: $answers,
            backgroundColor: ["#8e5ea2"],
            datalabels: {
                align: 'end',
                anchor: 'end',
                offset: 1
            },
        }]
    },
    options: {
        // tooltips: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    max: 100
                }
            }],
            xAxes: [{
                categoryPercentage: 1,
                barPercentage: 0.9
            }]
        },
        legend: { display: false },
        title: {
            display: true,
            text: 'Overall Index (OI) based on Questions Answered'
        },
        annotation: {
            annotations: [{
                drawTime: 'afterDraw', // overrides annotation.drawTime if set
                id: 'a-line-1', // optional
                type: 'line',
                mode: 'horizontal',
                scaleID: 'y-axis-0',
                value: '25',
                borderColor: 'red',
                borderWidth: 1,   
                borderDash: [2, 2],    
                label: {
                    // Background color of label, default below
                    backgroundColor: '#c45850',
                    // Font family of text, inherits from global
                    fontFamily: "sans-serif",
                    // Font size of text, inherits from global
                    fontSize: 12,
                    // Font style of text, default below
                    fontStyle: "bold",
                    // Font color of text, default below
                    fontColor: "#fff",
                    // Anchor position of label on line, can be one of: top, bottom, left, right, center. Default below.
                    position: "center",
                    // Adjustment along y-axis (top-bottom) of label relative to above number (can be negative)
                    // For vertical lines positioned top or bottom, negative values move
                    // the label toward the edge, and positive values toward the center.
                    yAdjust: -15,
                    // Whether the label is enabled and should be displayed
                    enabled: false,
                    // Text to display in label - default is null
                    content: "Critical"
                },
                // Fires when the user clicks this annotation on the chart
                // (be sure to enable the event in the events array below).
                onClick: function(e) {
                    // `this` is bound to the annotation element
                }
            }]
        },
        plugins: {
            datalabels: {
                backgroundColor: function(context) {
                    return context.dataset.backgroundColor;
                },
                formatter: function(value, context) {
                    if ( value > 0 ) {
                        return value + '%';
                    } else {
                        return 0 + '%';
                    }
                },
                borderRadius: 4,
                color: 'white',
                font: {
                    weight: 'bold'
                },
            }
        },
    }
});
</script>
@endsection