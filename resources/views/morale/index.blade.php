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
<div class="row top_tiles">
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
</div>

<section class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Overall Index (OI)<small> Morale Survey</small></h2>
                <div class="filter">
                    <div class="pull-right">
                        <select class="form-control">
                            <option>1</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <canvas id="myChart"></canvas>
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
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="{{ asset('bower/chart.js/dist/Chart.min.js') }}"></script>
<!-- Chart.js plugin -->
<script src="{{ asset('bower/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
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

var myChart = new Chart($('#myChart'), {
    type: 'bar',
    data: {
        labels: ["Overall Index", "ORD", "FAS", "FOD", "TSS"],
        datasets: [{
            label: 'OI%',
            data: [ 
                "{{ number_format(App\Models\Morale\MoraleSurveyRatings::overallIndex( $semester['id'] ), '2', '.', '') }}",
                "{{ number_format(App\Models\Morale\MoraleSurveyRatings::overallDivisionIndex( $semester['id'], App\Offices::divId('ORD')->first()['id'] ), 2, '.', '') }}",
                "{{ number_format(App\Models\Morale\MoraleSurveyRatings::overallDivisionIndex( $semester['id'], App\Offices::divId('FAS')->first()['id'] ), 2, '.', '') }}",
                "{{ number_format(App\Models\Morale\MoraleSurveyRatings::overallDivisionIndex( $semester['id'], App\Offices::divId('FOD')->first()['id'] ), 2, '.', '') }}",
                "{{ number_format(App\Models\Morale\MoraleSurveyRatings::overallDivisionIndex( $semester['id'], App\Offices::divId('TSS')->first()['id'] ), 2, '.', '') }}"
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
        scales: {
            xAxes: [{
                categoryPercentage: 1,
                barPercentage: 0.6
            }]
        },
        legend: { display: false },
        title: {
            display: true,
            text: 'Overall Index (OI) based on Conducted Morale Survey'
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