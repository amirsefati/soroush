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
                            <th> نوع ملک</th>
                            <th>  مالک</th>
                            <th data-field="status">وارد کننده فایل</th>
                            <th> وارد کننده</th>
                            <th>  منطقه</th>
                            <th>متراژ </th>
                            <th> نوع قرارداد</th>
                            <th>  قیمت</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($files as $file)

                            <div style="display: none">
                                {{$user = App\Models\User::find($file->userid_file)}}
                                {{$moshaver_monshi = App\Models\User::find($file->userid_moshaver)}}

                            </div>
                        
                            <tr>
                                <td><a href="">{{$file->type}}</a></td>
                                <td><a href="">{{$user->name}}</a></td>
                                <td>{{$user->level == 1 ? 'مشاور' : 'منشی'}}</td>
                                <td>{{$moshaver_monshi->name}}</td>
                                <td>{{$file->region}}</td>
                                <td>{{$file->area}}</td>
                                <td>@if($file->kind_type == 'rent')
                                        <span>اجاره</span>
                                    @else
                                        @if(strlen($file->presell_date) > 3)
                                            <span>پیش فروش ({{$file->presell_date}})</span>
                                        @else
                                            <span> فروش</span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <span class="price_comma">{{$file->price}}</span>
                                    <span class="price_comma">{{$file->rent_annual}}</span>
                                    <span class="price_comma">{{$file->rent_month}}</span>
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