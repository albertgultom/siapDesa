{{-- {!!$data!!} --}}
@foreach ($data as $k)
    {{$k['name']}}<br/>
    <ul>
    @foreach ($k->criterias as $i)
        <li>{{$i['name']}}</li>
    @endforeach
    </ul>
@endforeach