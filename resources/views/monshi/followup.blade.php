@extends('monshi.master')
@section('content')


            <div class="row">
                <div class="col-md-12">
                            <div class="row">

                            <input type="text" id="myInput" onkeyup="myFunction2()" placeholder="جست جو کاربر">

                    @foreach($users as $user)
                        <div class="col-md-4 mt-4  pr-2 pl-2">
                            <div class="user_box p-1">
                            <span data-toggle="modal" data-target="#mm1" onclick="followup_data('{{$user->id}}')">
                                <p class="pr-2 pt-3" style="font-size: 12px;margin-bottom:5px;">مشتری : {{$user->name}}</p>

                                <p class="pr-2" style="margin-bottom:5px;"> 
                                    @if($user->kind_type == 'sell')
                                        بودجه : {{$user->price}} میلیون تومان
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
                            </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
</div>


@endsection