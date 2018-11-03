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
                <td class="label_td">
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
                </td>
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
</div>

