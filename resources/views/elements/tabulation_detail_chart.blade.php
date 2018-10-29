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
<table class="table">
    <tbody>
        @for($i=0;$i < count($query);$i++)
            @php $query1 = Tabulations_detail::where([['tabulations_id','=',$query[$i]->id]])->get(); @endphp
            <tr>
            @for($j=0;$j < count($query1);$j++)
                @if($i == 0)
                    @php $datasets['name'][$j] = $query1[$j]->name; @endphp                     
                    <td>{{$query1[$j]->name}}</td>
                @else
                    @if($j == 0)                                         
                        @php $datasets['label'][$i] = $query1[$j]->name; @endphp                                    
                        <td>{{$query1[$j]->name}}</td>
                    @else
                        <td>{{$query1[$j]->numeral}}</td>                    
                    @endif
                @endif
            @endfor
            </tr>
        @endfor
        @php
        $datasets = json_encode($datasets);
        //echo $datasets;
        @endphp                    
    </tbody>
</table>

@push('scripts')
<script>

    var dataset_source = jQuery.parseJSON ('@php echo $datasets @endphp');
    var dataset_name   = dataset_source['name']
    var dataset_label  = dataset_source['label']
    //   var dataset_data   = dataset_source['data']
    console.log(dataset_label);  

  var densityCanvas = document.getElementById("chart_x_{{$id}}");
  if(densityCanvas){
    densityCanvas.height = 150;

    Chart.defaults.global.defaultFontFamily = "Lato";
    Chart.defaults.global.defaultFontSize = 18;

    var densityData = {
      label: 'Density of Planet (kg/m3)',
      data: [5427, 5243, 5514, 3933, 1326, 687, 1271, 1638],
      backgroundColor: 'rgba(0, 99, 132, 0.6)',
      borderWidth: 0,
      yAxisID: "y-axis-density"
    };

    var gravityData = {
      label: 'Gravity of Planet (m/s2)',
      data: [3400, 8.9, 9.8, 3.7, 23.1, 9.0, 8.7, 11.0],
      backgroundColor: 'rgba(99, 132, 0, 0.6)',
      borderWidth: 0,
      yAxisID: "y-axis-gravity"
    };

    var planetData = {
      labels: dataset_label,
      datasets: [densityData, gravityData]
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

</script>
@endpush
@endif
</div>
