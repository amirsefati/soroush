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
                            <button class="btn btn-success" onclick='buyer_phonebook()'>خریدار</button>
                            <button class="btn btn-info" onclick='seller_phonebook()'>فروشنده</button>
                            <button class="btn btn-warning" onclick='renter_phonebook()'>مستأجر</button>
                            <button class="btn btn-dark" onclick='landlord_phonebook()'>موجر</button>
                            <button class="btn btn-primary" onclick='all_users_phonebook()'>همه</button>
                        </div>
                    </div>
                </div>
                
                <table
                data-toggle="table"
                data-search="true"
                data-show-columns="true"
                id='phonebook_table'>
                    <thead>
                        <tr>
                            <th>نام</th>
                            <th>شماره تلفن</th>
                            <th data-field="kind">نوع درخواست</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($users as $user)
                        
                            <tr>
                                <td><a href="/monshi/show_user/{{$user->id}}">{{$user->name}}</a></td>
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