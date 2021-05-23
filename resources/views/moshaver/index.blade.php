@extends('moshaver.master')

@section('content')

<div class="row">
    <div class="col-md-12 p-4">
        <div class="row index_box">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 p-3">
                    <p class="index_box_work_p"> گزارش </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
    
        <div class="row">
            <div class="col-md-6 p-4">
                <div class="row index_box">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <p class="index_box_work_p"> روند اقدام روی فایل ها  </p>
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
                                        <span>{{App\Models\User::find($f->userid_file)->name}} </span> -
                                        <span>
                                            <a href="/moshaver/work_flow_file/{{$f->id}}">
                                                روند اقدام
                                            </a>
                                        </span>
                                        <span><a href="tel::{{App\Models\User::find($f->userid_file)->phone}}"><img src="/img/phone-call.svg" style="width:20px;" alt=""></a></span>

                                    @endif
                                    <br>    
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
                                <p class="index_box_work_p"> روند اقدام روی مشتریان </p>
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
                                        <span>
                                            <a href="/moshaver/work_flow_user/{{$u->id}}">
                                                روند اقدام
                                            </a>
                                        </span>
                                        <span><a href="tel::{{$u->phone}}"><img src="/img/phone-call.svg" style="width:20px;" alt=""></a></span>
                                    @endif
                                    <br>
                                @endforeach
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

              
            </div>

        </div>
</div>


<div class="row">
    <div class="col-md-6 p-4">
        <div class="row index_box">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 p-3">
                    <p class="index_box_work_p"> فایل ها </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach($files as $file)
                                <li>
                                    <span>{{$file->name}}</span>
                                    <span>{{App\Models\User::find($file->userid_file)->name}}</span>
                                    <span><a href="tel::{{App\Models\User::find($file->userid_file)->phone}}"><img src="/img/phone-call.svg" style="width:20px;" alt=""></a></span>
                                </li>
                            @endforeach
                        </ul>
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
                    <p class="index_box_work_p">  مشتریان </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach($clients as $client)
                                <li>
                                    <span>{{$client->name}}</span>
                                    <span><a href="tel::{{$client->phone}}"><img src="/img/phone-call.svg" style="width:20px;" alt=""></a></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-6 p-4">
        <div class="row index_box">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 p-3">
                    <p class="index_box_work_p">  اقدامات امروز </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach($actions as $action)
                                <li>
                                <span>
                                    @if($action->kind == 1)
                                        بازدید ملک  
                                    @elseif($action->kind == 2)
                                        نشست قرارداد    
                                    @elseif($action->kind == 3)
                                        کارشناسی ملک    
                                    @elseif($action->kind == 4)
                                        یادآوری تماس
                                    @elseif($action->kind == 5)
                                        سایر یادآوری ها 
                                    @endif
                                </span>
                                </li>
                            @endforeach
                        </ul>
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
                    <p class="index_box_work_p">  تعاون </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach($taavons as $taavon)
                                <li><span>{{App\Models\User::find($taavon->taavon_id)->name}} -</span>
                                <span>
                                @if($taavon->kind == 0)
                                    درخواست مشتری -
                                    {{App\Models\User::find($taavon->client_id)->name}}
                                @else
                                    درخواست فایل - 
                                    {{App\Models\File::find($taavon->file_id)->name}}
                                @endif
                                </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection