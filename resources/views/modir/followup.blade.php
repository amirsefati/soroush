@extends('modir.master')
@section('content')
<br>

<br>
<div class="row">
    <div class="col-md-12">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="جست جو کاربر">

        <table id="myTable">
        <tr class="header">
            <th style="width:20%;">نام</th>
            <th style="width:10%;">شماره تلفن</th>
            <th style="width:30%;">نوع تقاضا</th>
            <th style="width:30%;">هدف</th>
            <th style="width:10%;">عملیات</th>

        </tr>
        
        @foreach($followups as $followup)
            <tr>    
                <div style="display: none;">
                    {{$user = App\Models\User::find($followup->user_id)}}
                </div>
                <td><a href="/monshi/show_user/{{$followup->user_id}}">{{$user->name}}</a></td>
                <td><a href="tel://{{$user->phone}}">{{$user->phone}}</a></td>
                <td>
                    @if($user->etc1 == 1)
                        <span class="badge badge-pill badge-success">خریدار</span>
                        @endif
                    @if($user->etc2 == 1)
                        <span class="badge badge-pill badge-info">فروشنده</span>
                        @endif
                    @if($user->etc3 == 1)
                        <span class="badge badge-pill badge-warning">مستاجر</span>
                        @endif
                    @if($user->etc4 == 1)
                        <span class="badge badge-pill badge-dark">موجر</span>
                        @endif
                </td>
                <td><span style="font-size: 11px;">{{$followup->desc}}</span></td>
                <td>
                    <img src="/img/phone-call.svg" data-toggle="modal" data-target="#followupm" onclick="followupmodal('{{$user->id}}')" style="width:20px;" alt="">
                </td>
            </tr>
        @endforeach
        </table>
    
    </div>
</div>
@endsection