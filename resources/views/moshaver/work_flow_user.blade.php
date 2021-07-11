@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <p>روند اقدامات بر روی مشتری 
            <a href="/moshaver/show_user/{{$user_id}}">
                <strong>{{App\Models\User::find($user_id)->name}}</strong>
            </a>
        </p>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                <a href="/moshaver/show_user/{{$user_id}}">
                    <strong>{{App\Models\User::find($user_id)->name}}</strong>
                </a>
                </div>
                <div class="card-body">
                    
                    
                    <div class="row">
                    <div class="col-md-12">
                        @foreach($works as $work)  
                            <div style="display: none;">
                                {{$f = App\Models\File::find($work->file_id)}}  
                            </div>
                            <div id="accordion_{{$f->id}}">
                                <div class="card">
                                    <div class="card-header" id="headingOne_{{$f->id}}">
                                        <button class="btn btn-link w-100" data-toggle="collapse" data-target="#collapseOne_{{$f->id}}" aria-expanded="true" aria-controls="collapseOne_{{$f->id}}">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    فایل شماره {{$f->id}}
                                                </div>
                                                <div class="col-md-4">
                                                    تاریخ شروع روند : {{implode("/",\Morilog\Jalali\CalendarUtils::toJalali(explode("-",$f->created_at)[0],explode("-",$f->created_at)[1],explode(" ",explode("-",$f->created_at)[2])[0]))}}
                                                </div>
                                                <div class="col-md-4">
                                                    آخرین وضعیت : 
                                                    <span> 
                                                        @if($work->etc1 == null)
                                                            <strong>نشان دادن فایل</strong>
                                                        @elseif($work->etc1 == 1)
                                                            <strong>بازدید از ملک</strong>
                                                        @elseif($work->etc1 == 2)
                                                            <strong>برگذاری جلسه</strong>
                                                        @elseif($work->etc1 == 3)
                                                            <strong>بستن قرارداد</strong>
                                                        @endif
                                                    </span>

                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div id="collapseOne_{{$f->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_{{$f->id}}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-2">
                                                    <div class="work_flow_user_step {{$work->etc1 == null ? 'greenstep' : ''}}" data-toggle="modal" data-target="#work_flow_user_step1" onclick="workflowuserclicked('{{$work->id}}')">
                                                        1
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="work_flow_user_step {{$work->etc1 == 1 ? 'greenstep' : ''}}"  data-toggle="modal" data-target="#work_flow_user_step2" onclick="workflowuserclicked2('{{$work->id}}')">
                                                        2
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="work_flow_user_step {{$work->etc1 == 2 ? 'greenstep' : ''}}"  data-toggle="modal" data-target="#work_flow_user_step3" onclick="workflowuserclicked3('{{$work->id}}')">
                                                        3
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="work_flow_user_step {{$work->etc1 == 3 ? 'greenstep' : ''}}"  data-toggle="modal" data-target="#work_flow_user_step4" onclick="workflowuserclicked4('{{$work->id}}')">
                                                        4
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    </div>
                </div>
            </div>

       
    </div>
</div>


@endsection