<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <style>
        #header > tbody > tr > td {
            padding: 0 !important;
            border: 0 !important;
        }

        .table-bordered > thead > tr > th, 
        .table-bordered > tbody > tr > th, 
        .table-bordered > tfoot > tr > th, 
        .table-bordered > thead > tr > td, 
        .table-bordered > tbody > tr > td, 
        .table-bordered > tfoot > tr > td {
            border: 1px solid #000;
        }

        .font-body > tbody > tr > td {
            padding: 2px !important;
            font-size: 10pt !important;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <table id="header" class="table">
        <colgroup>
            <col width="10%">
            <col>
            <col width="10%">
        </colgroup>
        <tr>
            <td rowspan="3" align="center" style="vertical-align: middle"><img src="{{ asset('images/dost.png') }}" width="60"></td>
            <td align="center">Republic of the Philippines</td>
            <td rowspan="3"></td>
        </tr>
        <tr>
            <td align="center"><b>DEPARTMENT OF SCIENCE AND TECHNOLOGY</b></td>
        </tr>
        <tr>
            <td align="center">Caraga Region</td>
        </tr>
    </table>
    <!-- END HEADER -->

    <!-- TITLE -->
    <table id="header" class="table">
        <tr>
            <td align="center"><b>MORALE SURVEY REPORT</b></td>
        </tr>
    </table>
    <!-- END TITLE -->

    <!-- FIRST TABLE -->
    <table class="table table-bordered font-body">
        <colgroup>
            <col width="20%">
            <col>
        </colgroup>
        <tr>
            <td><b>Survey Period</b></td>
            <td>: {{ $semester->from['month']}} - {{ $semester->to['month']}}, {{ $semester['year'] }}</td>
        </tr>
        <tr>
            <td><b>Office</b></td>
            <td>: DOST-Caraga</td>
        </tr>
    </table>
    <!-- END FIRST TABLE -->

    <!-- OFFICES AND LEGEND TABLE -->
    <table class="font-body" width="100%">
        <tr>
            <td align="left" style="vertical-align: top">

                <table class="table-bordered font-body" width="100%">
                    <colgroup>
                        <col>
                        <col>
                    </colgroup>
                    <tr>
                        <td><b>Office/Unit/Division/Section</b></td>
                        <td><b>Overall Index (OI%)</b></td>
                    </tr>
                    @foreach ( $div_oi as $oi )
                        <tr>
                            <td>{{ $oi['office'] }}</td>
                            <td>{{ $oi['index'] > 0 ? $oi['index'] : 0 }}%</td>
                        </tr>
                    @endforeach
                </table>

            </td>

            <td align="right" style="vertical-align: top">

                <table class="table-bordered font-body" width="80%" style="border-color: #000 !important">
                    <tr>
                        <td colspan="2"><strong>Legend</strong></td>
                    </tr>
                    <tr>
                        <td>76 - 100%</td>
                        <td>Very positive and favorable</td>
                    </tr>
                    <tr>
                        <td>51 - 75%</td>
                        <td>Positive and favorable</td>
                    </tr>
                    <tr>
                        <td>26 - 50%</td>
                        <td>Negative and unfavorable</td>
                    </tr>
                    <tr>
                        <td>0 - 25%</td>
                        <td>Very Negative and unfavorable</td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
    <br>
    <!-- END OFFICES AND LEGEND TABLE -->

    <!-- QUESTION TABLE -->
    <table class="table table-bordered font-body">
        <colgroup>
            <col width="5%">
            <col>
            <col width="10%">
        </colgroup>
        <tr>
            <td colspan="2"><b>Question</b></td>
            <td align="center"><b>OI%</b></td>
        </tr>
        @foreach ( $question_oi as $i => $question )
            <tr>
                <td align="right">{{ ++$i }}</td>
                <td>{{ $question['question'] }}</td>
                <td align="center">
                    {{ $question['answer'] > 0 ? $question['answer'] : 0 }}%
                </td>
            </tr>
        @endforeach
    </table>
    <!-- END QUESTION TABLE -->

</body>
</html>