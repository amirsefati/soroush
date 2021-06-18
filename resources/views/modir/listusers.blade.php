@extends('modir.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        .<div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12" style="text-align: left">
                        <div style="position: absolute; left: 15px; top: 10px">
                            <button class="btn btn-primary" onclick='only_moshaver_table()'>مشاور</button>
                            <button class="btn btn-danger" onclick='only_monshi_table()'>منشی</button>
                            <button class="btn btn-success" onclick='both_table()'>هر دو</button>
                        </div>
                    </div>
                </div>

                <table
                data-toggle="table"
                data-search="true"
                data-show-columns="true"
                id='instagram_table'>
                    <thead>
                        <tr>
                            <th> نام مشتری </th>
                            <th> وارد کننده </th>
                            <th data-field="status"> اطلاعات واردکننده </th>
                            <th> نوع قرارداد </th>
                            <th> متراژ </th>
                            <th> نوع ملک </th>
                            <th> قیمت </th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($users as $user)

                            <div style="display: none;">
                                {{$moshaver = App\Models\User::find($user->userid_inter)}}
                            </div>
                        
                        
                            <tr>
                                <td><a href="/modir/client/{{$user->id}}">{{$user->name}}</a></td>
                                <td>{{$user->level == 1 ? 'مشاور' : 'منشی'}}</td>
                                <td><a href="/modir/client/{{$moshaver->id}}">{{$moshaver->name}}</a></td>
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
                                <td>{{$user->area}}</td>
                                <td>{{$user->type}}</td>
                                <td>
                                    <span class="price_comma">{{$user->price}}</span>
                                    <span class="price_comma">{{$user->rent_annual}}</span>
                                    <span class="price_comma">{{$user->rent_month}}</span>
                                </td>
                               
                            </tr>
                            
                        @endforeach

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection