@extends('moshaver.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row" style="width:100%">
                    <div class="col-md-4 pt-2 pr-4">لیست کابران   </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4" style="text-align: left;">
                        <a href="/moshaver/addfile_get">
                            <button class="btn btn-danger pr-5 pl-5">افزودن کاربر جدید</button>
                        </a>  
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-4 mt-4  pr-2 pl-2">
                            <div class="user_box p-1">
                            <a href="/moshaver/edituser/{{$user->id}}">
                                <p class="pt-3 pr-2"> 
                                    @if($user->kind_type == 'sell')
                                        بودجه : {{$user->price}}
                                    @else
                                        رهن {{$user->rent_annual}} میلیون تومان
                                        <br>
                                        اجاره {{$user->rent_month}} میلیون تومان

                                    @endif
                                </p>

                                
                                    @if($user->kind_type == 'sell')
                                        <div class="user_box_kind_type">
                                            <p class="user_box_kind_type_p">خریدار</p>
                                        </div>
                                    @else
                                        <div class="user_box_kind_type_r">
                                            <p class="user_box_kind_type_p">اجاره</p>
                                        </div>

                                    @endif
                                
                                
                                <div>
                                    <p class="pr-2">متراژ : {{$user->area}}</p>
                                </div>
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection