        <!-- Title Grafik -->
        <h1 class="h5 text-gray-900 mb-2 text-center"><b>Grafik Pencoblosan / Tahun</b></h1>
        <hr class="mb-4" style="width:80%; margin:0 auto">

        <!-- Deskripsi pada grafik -->
        <figure class="highcharts-figure mb-5">
            <div id="container1"></div>
            <p class="highcharts-description text-center">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis excepturi iusto ut optio neque dolore vel minus quia consequatur ea consequuntur provident, accusamus nobis esse. Tempore officiis nihil iure accusantium.
            </p>
        </figure>

        <!-- Title Grafik -->
        <h1 class="h5 text-gray-900 mb-2 text-center"><b>Perolehan Suara Paslon</b></h1>
        <hr class="mb-4" style="width:80%; margin:0 auto">

        <!-- Grafik Statistik Paslon -->
        <div class="total-suara" style="width: 70%; margin:0 auto;">
            <figure class="highcharts-figure">
                <div id="container2"></div>
                <p class="highcharts-description text-center">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis excepturi iusto ut optio neque dolore vel minus quia consequatur ea consequuntur provident, accusamus nobis esse. Tempore officiis nihil iure accusantium.
                </p>
            </figure>
        </div>

        <script>
            $(document).ready(function() {

                // Data JSON dari controller untuk grafik 1
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

                // Script Highchart untuk  grafik 1
                Highcharts.chart('container1', {
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

                // Data JSON dari controller untuk grafik 2
                var vote = <?= $vote_paslon ?>;
                var NoUrut = [];
                var TotalSuara = [];
                var no = 0;
                for (i = 0; i < vote.length; i++) {
                    no = no + 1;
                    NoUrut[i] = "0" + (no);
                    TotalSuara[i] = parseInt(vote[i]['jumlah_pemilih']);
                }

                // Script Highchart untuk  grafik 2
                Highcharts.chart('container2', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Statistik Perolehan Suara Paslon'
                    },
                    subtitle: {
                        text: 'Politeknik Negeri Tanah Laut'
                    },
                    xAxis: {
                        categories: NoUrut,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Banyak Suara'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">Paslon Nomor Urut : {point.key}</span><table>',
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
                        name: 'Perolehan Suara',
                        data: TotalSuara,
                    }]
                });

            });
        </script>