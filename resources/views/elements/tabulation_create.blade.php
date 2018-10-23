<div class="row">
  <div class="col-md-7">
      <table class="table">
        <tbody>
          @foreach ($tabulations as $t)
          <tr>
            <td style="border-top: none;border-bottom: 1px solid #dee2e6;">{{$t['name']}}</td>
            <td style="border-top: none;border-bottom: 1px solid #dee2e6;">{{$t['numeral']}} {{$t['identity']}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</div>