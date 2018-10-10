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