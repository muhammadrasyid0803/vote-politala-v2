<script>
    $(document).ready(function() {

        // Data JSON dari controller
        var vote = <?= $vote_data ?>;
        var TahunCoblos = [];
        var TotalSuara = [];
        var SuaraSah = [];
        var SuaraTidakSah = [];
        for (i = 0; i < vote.length; i++) {
            TahunCoblos[i] = vote[i]['tahun'];
            TotalSuara[i] = parseInt(vote[i]['total']);
            SuaraSah[i] = parseInt(vote[i]['mencoblos']);
            SuaraTidakSah[i] = parseInt(vote[i]['belum_mencoblos']);
        }

        // Script Highchart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Statistik Pencoblos'
            },
            subtitle: {
                text: 'Politeknik Negeri Tanah Laut'
            },
            xAxis: {
                categories: TahunCoblos,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Banyak Mahasiswa'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} orang</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Total Suara',
                data: TotalSuara

            }, {
                name: 'Telah Memilih',
                data: SuaraSah

            }, {
                name: 'Belum Memilih',
                data: SuaraTidakSah

            }]
        });
    });
</script>

</body>

</html>