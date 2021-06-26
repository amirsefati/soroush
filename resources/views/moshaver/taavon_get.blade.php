@extends('moshaver.master')
@section('content')

<table class="table table-light" style="direction: rtl;text-align:right">
    <thead class="thead-light">
        <tr>
            <th>نوع درخواست</th>
            <th>مشاور </th>
            <th>درخواست</th>
            <th>درصد خواست شده</th>
            <th>زمان تعاون</th>
            <th>عملیات</th>
            <th>وضعیت</th>
        </tr>
    </thead>
    <tbody>
        @foreach($taavons as $taavon)
            @if($taavon->taavon_id == Auth::user()->id)
                <tr>
                    <td>
                        @if($taavon->kind == '0')
                            <span class="badge badge-primary">درخواست فایل</span>
                        @else
                                <span class="badge badge-warning">درخواست کاربر</span>
                        @endif
                    </td>
                    <td>{{App\Models\User::find($taavon->moshaver_id)->name}}</td>
                    <td>
                        @if($taavon->kind == '0')
                            <a href="/moshaver/fileinfo/{{$taavon->file_id}}">
                                فایل شماره {{$taavon->file_id}}
                            </a>
                        @else
                        <a href="/moshaver/show_user/{{$taavon->client_id}}">
                            <span class="badge badge-warning">{{App\Models\User::find($taavon->client_id)->name}}</span>
                            </a>
                        @endif
                    </td>
                    <td>در حال تکمیل</td>
                    <td>{{$taavon->updated_at}}</td>
                    <td> 
                        <a href="/moshaver/verfiy_taavon/{{$taavon->id}}/2">
                            <button class="btn btn-success">قبول</button>
                        </a>

                        <a href="/moshaver/verfiy_taavon/{{$taavon->id}}/1">
                            <button class="btn btn-danger">رد</button>
                        </a>
                    
                    </td>
                    <td>
                        @if($taavon->verify == '0') 
                            <span class="badge badge-primary">در انتظار </span>
                        @elseif($taavon->verify == '1')
                            <span class="badge badge-danger">رد شده</span>
                        @elseif($taavon->verify == '2')
                            <span class="badge badge-success">قبول</span>
                        @endif
                    </td>
                </tr>
            @else
                <tr>
                    <td>
                        @if($taavon->kind == '0')
                            <span class="badge badge-primary"> درخواست فایل از طرف من </span>
                        @else
                                <span class="badge badge-warning">درخواست کاربر از طرف من</span>
                        @endif
                    </td>
                    <td>{{App\Models\User::find($taavon->taavon_id)->name}}</td>
                    <td>
                        @if($taavon->verify == 2)
                            @if($taavon->kind == '0')
                                <a href="/moshaver/fileinfo/{{$taavon->file_id}}">
                                    فایل شماره {{$taavon->file_id}}
                                </a>
                            @else
                                <a href="/moshaver/show_user/{{$taavon->client_id}}">
                                <span class="badge badge-warning">{{App\Models\User::find($taavon->client_id)->name}}</span>
                                </a>
                            @endif
                        @else

                            <span>****</span>
                        @endif
                    </td>
                    <td>در حال تکمیل</td>
                    <td>{{$taavon->updated_at}}</td>
                    <td> 
                        -
                    </td>
                    <td>
                        @if($taavon->verify == '0') 
                            <span class="badge badge-primary">در انتظار </span>
                        @elseif($taavon->verify == '1')
                            <span class="badge badge-danger">رد شده</span>
                        @elseif($taavon->verify == '2')
                            <span class="badge badge-success">قبول</span>
                        @endif
                    </td>
                </tr>
            @endif
        
        @endforeach
    </tbody>
    <tfoot>
        
    </tfoot>
</table>


@endsection