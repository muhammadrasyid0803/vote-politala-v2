<script>
      $(document).ready(function() {
          var vote = <?= $vote_paslon ?>;
          var NoUrut = [];
          var TotalSuara = [];
          var no = 0;
          for (i = 0; i < vote.length; i++) {
              no = no + 1;
              NoUrut[i] = "0" + (no);
              TotalSuara[i] = parseInt(vote[i]['jumlah_pemilih']);
          }
          Highcharts.chart('container', {
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