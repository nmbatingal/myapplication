<section class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="col-sm-12 col-xs-12">
                    <canvas id="perQuestionOIChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

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
            text: '{{ $div }}' + ' (OI%) based on Questions Answered',
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