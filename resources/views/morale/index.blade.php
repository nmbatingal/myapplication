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

<div id="modal-question-per-div" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <h4>Text in a modal</h4>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
        var borderColor = [];
        var data = chart.config.data.datasets[0].data;

        $.each(data, function(n, currentElem) {

            if ( currentElem > 75 ) {
                var color  = "rgba(60, 185, 158, 0.55)"; // green
                var border = "#3cb99e"; // green
            } else if ( currentElem > 50 ) {
                var color  = "rgba(62, 149, 205, 0.55)"; // blue
                var border = "#3c95cd"; // blue
            } else if ( currentElem > 25 ) {
                var color  = "rgba(255, 158, 5, 0.55)"; // orange
                var border = "#ff9f05"; // orange
            } else {
                var color  = "rgba(255, 36, 20, 0.55)"; // red
                var border = "#ff2414"; // red
            }

            backgroundColor.push(color);
            borderColor.push(border);
        });
        
        // We update the chart bars color properties
        chart.config.data.datasets[0].backgroundColor = backgroundColor;
        chart.config.data.datasets[0].borderColor     = borderColor;
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
            borderWidth: 1,
            data: arrayDivOi,
            datalabels: {
                align: 'center',
                anchor: 'center',
            },
        }],
    },
    options: {
        onClick: function(c,i) {
            e = i[0];

            if (e) {

                console.log(e._index);
                var x_value = this.data.labels[e._index];
                var y_value = this.data.datasets[0].data[e._index];
                console.log(x_value);
                console.log(y_value);

                $.get( "{!! url('morale/showOiPerQuestion/"+x_value+"') !!}", function( data ) {

                    $( "#modal-question-per-div" ).modal('show');

                    $( ".modal-title" ).html(x_value + ' OI% per Question');
                    $( ".modal-body" ).html(data);
                });
            }
        },
        tooltips: {
            enabled: true,
            mode: 'label',
            position: 'average',
            callbacks: {
                label: function(tooltipItem) {
                    return tooltipItem.yLabel + "%";
                }
            }
        },
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
                barPercentage: 0.6,
            }]
        },
        legend: { display: false },
        title: {
            display: true,
            text: 'Overall Index (OI) based on Conducted Morale Survey ',
            position: 'bottom'
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
                    backgroundColor: 'rgba(229, 23, 16, 0.50)',
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
                backgroundColor: false,
                borderColor: false,
                /*backgroundColor: function(context) {
                    return context.dataset.backgroundColor;
                },
                borderColor: function(context) {
                    return context.dataset.borderColor;
                },
                borderWidth: 1,*/
                formatter: function(value, context) {
                    if ( value > 0 ) {
                        return value + '%';
                    } else {
                        return 0 + '%';
                    }
                },
                borderRadius: 4,
                color: 'black',
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
            borderWidth: 1,
            data: $answers,
            backgroundColor: ["#8e5ea2"],
            datalabels: {
                align: 'center',
                anchor: 'center',
            },
        }]
    },
    options: {
        tooltips: {
            enabled: true,
            mode: 'label',
            position: 'average',
            callbacks: {
                title: function(tooltipItem) {
                    return "Question " + tooltipItem[0].xLabel + ": " + tooltipItem[0].yLabel + "%";
                },
                label: function(tooltipItem) {
                    return $questions[tooltipItem.index];
                }
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
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
            text: 'Overall Index (OI) based on Questions Answered',
            position: 'bottom'
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
                    backgroundColor: 'rgba(229, 23, 16, 0.50)',
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
                // Fires when the user clicks this annotation on the chart
                // (be sure to enable the event in the events array below).
                onClick: function(e) {
                    // `this` is bound to the annotation element
                }
            }]
        },
        plugins: {
            datalabels: {
                backgroundColor: false,
                borderColor: false,
                /*backgroundColor: function(context) {
                    return context.dataset.backgroundColor;
                },
                borderColor: function(context) {
                    return context.dataset.borderColor;
                },
                borderWidth: 1,*/
                formatter: function(value, context) {
                    if ( value > 0 ) {
                        return value + '%';
                    } else {
                        return 0 + '%';
                    }
                },
                borderRadius: 4,
                color: 'black',
                font: {
                    weight: 'bold'
                },
            }
        },
    }
});
</script>
@endsection