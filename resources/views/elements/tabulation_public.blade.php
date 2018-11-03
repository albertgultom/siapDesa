<style>
  .label_td
  {
    border-top: none!important;border-bottom: 1px solid #dee2e6;
  }

  .layout_row 
  {
    padding-bottom: 3%;      
  }

  .layout_row_header 
  {
    background-color: #e9ecef;
    padding: 5px 0px 5px 15px;
    margin-left: -1px!important;
    border: 1px solid #ced4da;
  }  
  
</style>
@php
use App\Tabulations_detail;
$xx = 0;
$flag_comparative = 0;
@endphp

@foreach ($tabulations as $t)
@php $flag_comparative = $t['comparative']@endphp
@if ($t['comparative'] <= 1)
    <div class="row  ml-5 layout_row">
        <div class="col-md-2 ml-5 layout_row_header">{{$t['name']}}</div>
        <div class="col-md-2 ml-5">
            @if($t['flag_decimal'] == 1)
            @php 
                echo number_format($t['numeral'],2)
            @endphp
            {{$t['identity']}}
            @elseif ($t['flag_decimal'] == 0)
            @php 
                echo number_format($t['numeral'],0)
            @endphp
            {{$t['identity']}}
            @endif
        </div>
    </div>
@elseif ($t['comparative'] > 1)
    @php 
    $query = Tabulations_detail::where([['tabulations_id','=',$t['id']]])->get();
    @endphp
    @if(count($query)== 0)
    @else
    @if($xx == 0)
    <div class="row  ml-5 layout_row">
        @for($i=0;$i<=$t['comparative'];$i++)
        <div class="col-md-2 ml-5 layout_row_header">{{$query[$i]->name}}</div>
        @endfor
    </div>
    @else
    <div class="row  ml-5 layout_row">
        @for($i=0;$i<=$t['comparative'];$i++)
        @if($i == 0)
        <div class="col-md-2">{{$query[$i]->name}}</div>
        @else
        <div class="col-md-2">{{$query[$i]->numeral}}</div>
        @endif                    
        @endfor
    </div>                
    @endif
    @endif
@endif
@php $xx++; @endphp
@endforeach
