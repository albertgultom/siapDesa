@php
use App\Tabulation;
use App\Tabulations_detail;
$datasets[] = '';
@endphp
<div class="col-md-5">
<canvas id="chart_x_{{$id}}"></canvas>
@if($tabulations[0]['comparative'] > 1)
@php
$query = Tabulation::where([['criteria_id','=',$tabulations[0]['criteria_id']]])->get();
@endphp

    @for($i=0;$i < count($query);$i++)
        @php $query1 = Tabulations_detail::where([['tabulations_id','=',$query[$i]->id]])->get(); @endphp
        @for($j=0;$j < count($query1);$j++)
            @if($i == 0)
                @if($j != 0 )
                @php $datasets['name'][$j-1] = $query1[$j]->name; @endphp                                         
                @endif
            @else
                @if($j == 0)                                         
                    @php $datasets['label'][$i-1] = $query1[$j]->name; @endphp                                    
                @else
                @php 
                  $datasets['value'][$j-1][$i-1] = array('x'=>'-','y'=>$query1[$j]->numeral); 
                  @endphp                                                        
                @endif
            @endif
        @endfor
    @endfor
    @php
    $datasets = json_encode($datasets);
    //echo $datasets;
    @endphp                    

@push('scripts')
<script>
  
    var dataset_source = jQuery.parseJSON ('@php echo $datasets @endphp');
    var dataset_name   = dataset_source['name'];
    var dataset_label  = dataset_source['label'];
    var dataset_value  = dataset_source['value'];
    var densityCanvas  = document.getElementById("chart_x_{{$id}}");

//-------------------------------------------- Bar chart ------------------------------------------
  if(densityCanvas){
    densityCanvas.height = 150;
    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;
    var datasets_json = [];
    var autocolor     = [];
    for (let x = 0; x < dataset_name.length; x++) {
        var back = ["#ff0000","blue","gray"];
        var rand = back[Math.floor(Math.random() * back.length)];      
        autocolor[x] = rand;
        datasets_json[x] = {
            label: dataset_name[x],
            data: dataset_value[x],
            backgroundColor: ''+autocolor+'',
            borderWidth: 0,
            yAxisID: "y-axis-gravity"
        };
    }
  
    var planetData = {
      labels: dataset_label,
      datasets: datasets_json
    };

    var chartOptions = {
      scales: {
        xAxes: [{
          barPercentage: 1,
          categoryPercentage: 0.6
        }],
        yAxes: [{
          id: "y-axis-density"
        }, {
          id: "y-axis-gravity"
        }]
      }
    };

    var barChart = new Chart(densityCanvas, {
      type: 'bar',
      data: planetData,
      options: chartOptions
    });
  }    
//-------------------------------------------- Bar chart ------------------------------------------


</script>
@endpush
@endif
</div>
