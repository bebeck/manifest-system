<div id="container"></div>
<script type="text/javascript">
$(document).ready(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '10 Besar Pengiriman'
        },
        xAxis: {
            categories: [<?=$chart['name']?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' Kg'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: '<?=date('M')?>',
            data: [<?=$chart['kg']?>]
        }]
    });
});
</script>