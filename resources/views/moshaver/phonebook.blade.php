@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <button class="btn btn-success mt-1" type="button"  data-toggle="modal" data-target="#phonebook"> افزودن کاربر </button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="جست جو کاربر">

        <table id="myTable">
        <tr class="header">
            <th style="width:20%;">نام</th>
            <th style="width:20%;">شماره تلفن</th>
            <th style="width:40%;">نوع تقاضا</th>
            <th style="width:20%;">افزودن نقش</th>

        </tr>
        
        @foreach($users as $user)
            <tr>
            <td><a href="/moshaver/show_user/{{$user->id}}">{{$user->name}}</a></td>
                <td>{{$user->phone}}</td>
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

                        <span class="badge badge-pill badge-danger">{{$user->label}}</span>
                      
                </td>
                <td>    
                    <form action="/moshaver/add_role" method="POST">
                        @csrf
                        <input type="text" name="userid" value="{{$user->id}}" hidden>
                        <select name="type" id="" required>
                            <option value="">انتخاب کنید</option>

                            @if($user->etc1 != 1)
                                <option value="etc1">خریدار</option>
                            @endif

                            @if($user->etc2 != 1)
                                <option value="etc2">فروشنده</option>
                            @endif

                            @if($user->etc3 != 1)
                                <option value="etc3">مستاجر</option>
                            @endif

                            @if($user->etc4 != 1)
                                <option value="etc4">موجر</option>
                            @endif

                            @if($user->label != 'نگهبان')
                                <option value="نگهبان">نگهبان</option>
                            @endif

                            @if($user->label != 'مدیرفروش')
                                <option value="مدیرفروش">مدیرفروش</option>
                            @endif

                            @if($user->label != 'سازنده')
                                <option value="سازنده">سازنده</option>
                            @endif

                            @if($user->label != 'نگهبان')
                                <option value="label_negahban">نگهبان</option>
                            @endif

                            @if($user->label != 'مالک')
                                <option value="مالک">مالک</option>
                            @endif
                        </select>

                        <button class="btn btn-success">افزودن</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    
    </div>
</div>
@endsection