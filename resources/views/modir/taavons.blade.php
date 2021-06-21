@extends('modir.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12" style="text-align: left">
                        <div style="position: absolute; left: 15px; top: 10px">
                            <button class="btn btn-primary" onclick='modir_taavon_file()'>تعاون فایل</button>
                            <button class="btn btn-danger" onclick='modir_taavon_user()'>تعاون مشتری</button>
                            <button class="btn btn-success" onclick='modir_taavon_both()'>هر دو</button>
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
                            <th>مشاور صاحب</th>
                            <th>مشاور درخواست دهنده</th>
                            <th data-field="kind">نوع درخواست</th>
                            <th>فایل</th>
                            <th>مشتری</th>
                            <th>درصد</th>
                            <th>زمان تعاون</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($taavons as $taavon)

                            <div style="display: none">
                                {{$kind = $taavon['kind']}}
                                

                            </div>
                        
                            <tr>
                                <td>{{App\Models\User::find($taavon['taavon_id'])->name}}</td>
                                <td>{{App\Models\User::find($taavon['moshaver_id'])->name}}</td>
                                <td>
                                    {{($kind == 0 ? 'درخواست فایل' : 'درخواست مشتری')}} 
                                </td>
                                <td>{{App\Models\File::find($taavon['file_id'])->name}}</td>
                                <td>{{App\Models\User::find($taavon['client_id'])->name}}</td>
                                <td>{{$taavon['percentage']}}</td>
                                <td>{{$taavon['updated_at']}}</td>
                            </tr>
                            
                        @endforeach

                        
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


@endsection