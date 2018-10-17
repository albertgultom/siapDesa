<div class="row">
  <div class="col-md-7">
      <table class="table">
        <tbody>
          @foreach ($tabulations as $t)
          <tr>
            <td>{{$t['name']}}</td>
            <td>{{$t['numeral']}} {{$t['identity']}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="col-md-5">
    <canvas id="chart{{$id}}"></canvas>
  </div>
</div>

@push('scripts')
<script>
  var _names = [];
  var _numerals = []

  $.each(@json($tabulations), function(k,v){
    _names.push(v.name);
    _numerals.push(v.numeral);
  });

  var ctx = document.getElementById("chart{{$id}}");
  if(ctx){
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: _names,
        datasets: [{
          data: _numerals,
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      // options: {
      //   responsive: true,
      //   legend: {
      //     display: false
      //   },
      //   scales: {
      //     yAxes: [{
      //       ticks: {
      //         beginAtZero:true
      //       }
      //     }]
      //   }
      // }
    });
  }
</script>
@endpush