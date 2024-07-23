<script src="<?= base_url() ?>templates/kamr/js/dashboard/dashboard-1.js"></script>
<script src="<?= base_url() ?>templates/kamr/vendor/apexchart/apexchart.js"></script>
<script src="<?= base_url() ?>templates/kamr/vendor/peity/jquery.peity.min.js"></script>
<script src="<?= base_url() ?>templates/kamr/vendor/chart.js/Chart.bundle.min.js"></script>

<?php 
// $maps = json_encode(get_maps_detail());
$maps = "";
?>


<script>
    var pieChart1 = function() {
        var options = {
            series: [66, 129, 20],
            chart: {
                type: 'donut',
                height: 250,
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 0,
            },
            // colors: ['var(--primary)', 'var(--primary-dark)', 'var(--secondary)'],
            legend: {
                position: 'bottom',
                show: false
            },
            responsive: [{
                    breakpoint: 1601,
                    options: {
                        chart: {
                            height: 200,
                        },
                    }
                },
                {
                    breakpoint: 1024,
                    options: {
                        chart: {
                            height: 200,
                        },
                    }
                }
            ]
        }

        var chart = new ApexCharts(document.querySelector("#pieChart1"), options);
        chart.render();
    };


    /* Function ============ */
	pieChart1();
</script>
