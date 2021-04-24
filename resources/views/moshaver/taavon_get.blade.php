@extends('moshaver.master')
@section('content')

<table class="table table-light" style="direction: rtl;text-align:right">
    <thead class="thead-light">
        <tr>
            <th>نوع درخواست</th>
            <th>مشاوره </th>
            <th>درخواست</th>
            <th>عملیات</th>
            <th>وضعیت</th>

        </tr>
    </thead>
    <tbody>
        @foreach($taavons as $taavon)
        <tr>
            <td>
                @if($taavon->getfile == "getfile")
                    <span class="badge badge-primary">درخواست فایل</span>
                @else
                        <span class="badge badge-warning">درخواست کاربر</span>
                @endif
            </td>
            <td>{{App\Models\User::find($taavon->moshaver_id)->name}}</td>
            <td>@if($user = App\Models\User::find($taavon->client_id)->name)
                    <a href="/moshaver/edituser/{{$taavon->moshaver_id}}">
                        {{$user}}
                    </a>
                @else
                    <a href="/moshaver/editfile/{{$taavon->file_id}}">
                        {{App\Models\File::find($taavon->file_id)->name}}
                    </a>
                @endif
            </td>
            <td>
                <a style="color:red" href="/moshaver/taavon_verify/{{$taavon->id}}/0">رد</a> - 
                <a style="color:green" href="/moshaver/taavon_verify/{{$taavon->id}}/1">قبول</a>
            </td>
            <td>{{$taavon->verify == '0' ? 'رد شده' : 'تایید شده'}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
        </tr>
    </tfoot>
</table>


@endsection