@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        
        @foreach ($anns as $ann)

            <div style="display: none">
                @if ($ann->img)
                    {{$image = $ann->img}}
                @else
                    {{$image = '/img/ann_default.svg'}}
                @endif
            </div>
            

            <div class="col-md-12">
                <span class="col-md-4">
                    <img src="{{$image}}">
                </span>

                <span class="col-md-8">
                    {{$ann->title}}
                </span>
            </div>
            
        @endforeach

    </div>
</div>

@endsection