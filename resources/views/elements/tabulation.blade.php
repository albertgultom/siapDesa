<style>
  .label_td
  {
    border-top: none!important;border-bottom: 1px solid #dee2e6;
  }
</style>
@php
use App\Tabulations_detail;
$xx = 0;
$flag_comparative = 0;
@endphp
<div class="row">
  <div class="col-md-7">
      <table class="table">
        <tbody>
          @foreach ($tabulations as $t)
            @php $flag_comparative = $t['comparative']@endphp
            @if ($t['comparative'] <= 1)
              <tr>
                <td class="label_td">{{$t['name']}}</td>
                <td class="label_td">{{$t['numeral']}} {{$t['identity']}}</td>
              </tr>
            @elseif ($t['comparative'] > 1)
              @php 
                $query = Tabulations_detail::where([['tabulations_id','=',$t['id']]])->get();
              @endphp
              @if(count($query)== 0)
              @else
                @if($xx == 0)
                <tr>
                  @for($i=0;$i<=$t['comparative'];$i++)
                    <td class="label_td">{{$query[$i]->name}}</td>
                  @endfor
                </tr>
                @else
                <tr>
                  @for($i=0;$i<=$t['comparative'];$i++)
                    @if($i == 0)
                    <td class="label_td">{{$query[$i]->name}}</td>
                    @else
                    <td class="label_td">{{$query[$i]->numeral}}</td>
                    @endif                    
                  @endfor
                </tr>                
                @endif
              @endif
            @endif
            @php $xx++; @endphp
          @endforeach
        </tbody>
      </table>
  </div>
  <div class="col-md-5">
    @if($flag_comparative == 0)
    <canvas id="chart{{$id}}"></canvas>
    @endif
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