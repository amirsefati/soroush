@extends('moshaver.master')

@section('content')

<div class="row">
    <div class="col-md-12">
    
        <div class="row p-2">
            <div class="col-md-6 p-4">
                <div class="row index_box">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <p class="index_box_work_p">فایل ها </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                @foreach($works as $file)
                                    <div style="display: none;">
                                        {{$f = App\Models\File::find($file->file_id)}}
                                        {{$u = App\Models\User::find($file->client_id)}}
                                    </div>
                                    @if($file->type == 1)
                                        <span>⚫</span>
                                        <span><a href="/moshaver/fileinfo/{{$f->id}}">{{$f->name}}</a></span> -
                                        <span>{{App\Models\User::find($f->userid_file)->name}} {{App\Models\User::find($f->userid_file)->phone}}</span> -
                                        <span>
                                            <a href="/moshaver/work_flow_file/{{$f->id}}">
                                                🔥
                                            </a>
                                        </span>
                                        <span>📞</span>
                                    @endif
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-4">
                <div class="row index_box">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <p class="index_box_work_p"> مشتری ها </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            @foreach($works as $file)
                                    <div style="display: none;">
                                        {{$f = App\Models\File::find($file->file_id)}}
                                        {{$u = App\Models\User::find($file->client_id)}}
                                    </div>
                                    @if($file->type == 0)
                                        <span>⚫</span>
                                        <span><a href="/moshaver/show_user/{{$u->id}}">{{$u->name}}</a></span> -
                                        <span>  {{$u->phone}}</span> -
                                        <span>
                                            <a href="/moshaver/work_flow_user/{{$f->id}}">
                                                🔥
                                            </a>
                                        </span>
                                        <span>📞</span>
                                    @endif
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              
            </div>

        </div>
    </div>
</div>


@endsection