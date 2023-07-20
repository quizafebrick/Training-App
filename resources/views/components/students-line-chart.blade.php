{{-- * GOOGLE CHARTS * --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // * LOAD THE VISUALIZATION API AND THE CORECHART PACKAGE. * //
    google.charts.load('current', {
        'packages': ['corechart', 'line']
    });

    // * SET A CALLBACK TO RUN WHEN THE GOOGLE VISUALIZATION API IS LOADED. * //
    google.charts.setOnLoadCallback(drawStudentsMonthlyChart);

    function drawStudentsMonthlyChart() {
        // * CREATE THE DATA TABLE. * //
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Students');
        data.addRows([
            // * ASCENDING ORDER FOR THE MONTHS * //
            @php
                $sortedMonths = collect($months)
                    ->sortBy(function ($month) {
                        return Carbon\Carbon::createFromFormat('M-Y', $month);
                    })
                    ->values();
            @endphp
            // * ALL STUDENTS ADDED EVERY MONTH * //
            @foreach ($sortedMonths as $key => $day)
                ['{{ Carbon\Carbon::createFromFormat('M-Y', $day)->format('M-Y') }}',
                    {{ $counts[$key] }}
                ],
            @endforeach
        ]);

        // ** SET CHART OPTIONS * //
        var options = {
            'title': 'Number of Students Added Every Month',
            'legend': 'Students Added',
            'width': '100%',
            'height': '400px',
            'hAxis': {
                title: 'Month/s',
                format: 'MMM d, yyyy'
            },
            vAxis: {
                title: 'No. of Students'
            },
        };

        // * INSTANTIATE AND DRAW THE CHART, PASSING IN SOME OPTIONS. * //
        var chart = new google.visualization.LineChart(document.getElementById('students_line_chart'));
        chart.draw(data, options);
    }
</script>
