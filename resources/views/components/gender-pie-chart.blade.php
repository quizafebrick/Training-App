{{-- * GOOGLE CHARTS * --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // * LOAD THE VISUALIZATION API AND THE CORECHART PACKAGE. * //
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // * SET A CALLBACK TO RUN WHEN THE GOOGLE VISUALIZATION API IS LOADED. * //
    google.charts.setOnLoadCallback(drawGenderChart);

    function drawGenderChart() {
        // * CREATE THE DATA TABLE. * //
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Gender');
        data.addColumn('number', 'Count');
        data.addRows([
            ['Male', {{ $countMale }}],
            ['Female', {{ $countFemale }}]
        ]);

        // ** SET CHART OPTIONS * //
        var options = {
            'title': 'Gender Distribution',
            'is3D': true,
        };

        // * INSTANTIATE AND DRAW THE CHART, PASSING IN SOME OPTIONS. * //
        var chart = new google.visualization.PieChart(document.getElementById('gender_pie_chart'));
        chart.draw(data, options);
    }
</script>
