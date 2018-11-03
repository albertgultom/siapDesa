<style>
  .label_td
  {
    border-top: none!important;border-bottom: 1px solid #dee2e6;
  }
</style>
@php
use App\Tabulations_detail;
$xx               = 0;
$flag_comparative = 0;
$query            = '';
$datasets[] = '';
@endphp

  <div class="col-md-7">
      <table class="table">
        <tbody>
          @foreach ($tabulations as $t)
            @php $flag_comparative = $t['comparative']@endphp
            <input type="hidden" id="hdn_comparative_{{$id}}" value="{{$t['comparative']}}">            
            @if ($t['comparative'] <= 1)
            @elseif ($t['comparative'] > 1)
              @php 
                $query = Tabulations_detail::where([['tabulations_id','=',$t['id']]])->get();
              @endphp
              @if(count($query)== 0)
              @else
                @if($xx == 0)
                  @for($i=0;$i<=$t['comparative'];$i++)
                    @php
                      if($i != 0)
                      {
                        $datasets['name'][$i-1] = $query[$i]->name; 
                      }
                    @endphp                                      
                  @endfor
                @else
                  @for($i=0;$i<=$t['comparative'];$i++)
                    @if($i == 0)
                    @else
                    @php
                        $datasets['data'][$i-1] = array($query[$i]->numeral); 
                    @endphp                                                          
                    @endif                    
                  @endfor
                @endif
              @endif
            @endif
            @php $xx++; @endphp
          @endforeach
          @php
            $datasets = json_encode($datasets);
            //echo $datasets;            
          @endphp
        </tbody>
      </table>
  </div>

  @if($flag_comparative == 0)
  <div class="col-md-12">    
    <canvas id="chart{{$id}}"></canvas>
  </div>
  @endif

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


var flag_comparative = $("#hdn_comparative_{{$id}}").val();
if (flag_comparative > 1) {
  // var dataset_source = jQuery.parseJSON ('@php echo $datasets @endphp');
  // var dataset_name   = dataset_source['name']
  // var dataset_data   = dataset_source['data']
  // console.log(dataset_data);      
}
</script>
@endpush