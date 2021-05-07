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
                @if($taavon->kind == '0')
                    <span class="badge badge-primary">درخواست فایل</span>
                @else
                        <span class="badge badge-warning">درخواست کاربر</span>
                @endif
            </td>
            <td>{{App\Models\User::find($taavon->moshaver_id)->name}}</td>
            <td>
                @if($taavon->kind == '0')
                    <a href="/moshaver/fileinfo/{{$taavon->id}}">
                        فایل شماره {{$taavon->id}}
                    </a>
                @else
                        <span class="badge badge-warning">درخواست کاربر</span>
                @endif
            </td>
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
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
        </tr>
    </tfoot>
</table>


@endsection