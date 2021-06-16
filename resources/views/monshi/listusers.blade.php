@extends('monshi.master')
@section('content')

                        <a href="/monshi/adduser">
                            <button class="btn pr-5 pl-5" style="background:#1D3461;color:white">افزودن مشتری</button>
                        </a>  
            <div class="row">
                <div class="col-md-12">
                            <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-4 mt-4  pr-2 pl-2">
                            <div class="user_box p-1">
                            <a href="/monshi/show_user/{{$user->id}}">
                                <p class="pr-2 pt-3" style="font-size: 12px;margin-bottom:5px;">مشتری : {{$user->name}}</p>

                                <p class="pr-2" style="margin-bottom:5px;"> 
                                    @if($user->kind_type == 'sell')
                                        بودجه : <span class="price_comma">{{$user->price}} </span>   تومان
                                    @else
                                        رهن <span class="price_comma">{{$user->rent_annual}} </span>   تومان
                                        <br>
                                        اجاره <span class="price_comma">{{$user->rent_month}}</span>    تومان

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


@endsection