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

                            <button class="btn btn-primary" data-toggle="modal" data-target="#add_ann">افزودن اعلامیه</button>

                        </div>
                    </div>
                </div>
                
                <table
                data-toggle="table"
                data-search="true"
                data-show-columns="true"
                id='ann_info_modal'>
                    <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>زمان انتشار</th>
                            <th>اطلاعات کامل</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($anns as $ann)
                        
                            <tr>
                                <td>{{$ann->title}}</td>
                                <td>{{$ann->created_at}}</td>
                                <td> <span data-toggle="modal" data-target="#ann_info_modal" onclick="ann_info_modal({{$ann}})"><img src="/img/info_tablighat.svg"></span> </td>
                            </tr>
                            
                        @endforeach

                        
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

@endsection