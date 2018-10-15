@extends ('layouts.pustaka')

@section('pustaka')
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="d-block p-2 mb-3" style="border-bottom: darksalmon solid 1pt;">
                <h6 class="text-info">{!!$query->name!!}</h6>
            </div>  
            {{-- echo {{$query->contents}}; --}}
            @foreach($query->contents as $item)

            <img src="{{asset('storage/photos/'.$item['image'])}}" class="img-fluid mx-auto d-block mb-3" >
            @endforeach
    </div>
    </div>
@endsection

       