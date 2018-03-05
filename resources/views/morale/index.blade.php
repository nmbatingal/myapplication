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
                            @if( $semester > 0)
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
                    <canvas id="myBarChart"></canvas>
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
var myChart = new Chart($('#oiChart'), {
    type: 'bar',
    data: {
        labels: ["Overall Index", "ORD", "FAS", "FOD", "TSS"],
        datasets: [{
            label: 'OI%',
            data: [ 
                '{{ $overall_index }}',
                /*'{{ $div_oi[0] }}'*/ 0,
                /*'{{ $div_oi[1] }}'*/ 0,
                /*'{{ $div_oi[2] }}'*/ 0,
                /*'{{ $div_oi[3] }}'*/ 0
            ],
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
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
                borderWidth: 2,           
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

/*** QUESTIONS ***/
var myBarChart = new Chart($('#myBarChart'), {
    type: 'bar',
    data: {
        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18"],
        datasets: [{
            label: 'OI%',
            data: [ 
                /*{{ $question_oi[0]['answer'] }} ||*/ 0,
                /*{{ $question_oi[1]['answer'] }} ||*/ 0,
                /*{{ $question_oi[2]['answer'] }} ||*/ 0,
                /*{{ $question_oi[3]['answer'] }} ||*/ 0,
                /*{{ $question_oi[4]['answer'] }} ||*/ 0,
                /*{{ $question_oi[5]['answer'] }} ||*/ 0,
                /*{{ $question_oi[6]['answer'] }} ||*/ 0,
                /*{{ $question_oi[7]['answer'] }} ||*/ 0,
                /*{{ $question_oi[8]['answer'] }} ||*/ 0,
                /*{{ $question_oi[9]['answer'] }} ||*/ 0,
                /*{{ $question_oi[10]['answer'] }} ||*/ 0,
                /*{{ $question_oi[11]['answer'] }} ||*/ 0,
                /*{{ $question_oi[12]['answer'] }} ||*/ 0,
                /*{{ $question_oi[13]['answer'] }} ||*/ 0,
                /*{{ $question_oi[14]['answer'] }} ||*/ 0,
                /*{{ $question_oi[15]['answer'] }} ||*/ 0,
                /*{{ $question_oi[16]['answer'] }} ||*/ 0,
                /*{{ $question_oi[17]['answer'] }} ||*/ 0
            ],
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
                borderWidth: 2,           
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