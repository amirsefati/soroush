@extends('moshaver.master')
@section('content')

                        <a href="/moshaver/adduser">
                            <button class="btn pr-5 pl-5" style="background:#1D3461;color:white">افزودن مشتری</button>
                        </a>  
            <div class="row">
                <div class="col-md-12">
                            <div class="row">
                    @foreach($users as $user)
                        <div class="col-md-6 mt-4  pr-2 pl-2">
                            <div class="user_box p-1 pb-3">
                            <a href="/moshaver/show_user/{{$user->id}}">
                                <p class="pr-2 pt-3" style="font-size: 12px;margin-bottom:5px;">مشتری : {{$user->name}}</p>

                                <p class="pr-2" style="margin-bottom:5px;"> 
                                    @if($user->kind_type == 'sell')
                                        بودجه : {{$user->price}}   تومان
                                    @else
                                        رهن {{$user->rent_annual}}   تومان
                                        <br>
                                        اجاره {{$user->rent_month}}   تومان

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
                            <hr>
                            <div class="pr-2">
                                @if($user->etc1 == 1)
                                    <span class="round_listitem">خریدار</span>
                                @endif
                                @if($user->etc2 == 1)
                                    <span class="round_listitem">فروشنده</span>
                                @endif
                                @if($user->etc3 == 1)
                                    <span class="round_listitem">مستجر</span>
                                @endif
                                @if($user->etc4 == 1)
                                    <span class="round_listitem">موجر</span>
                                @endif
                            </div>
                            
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
</div>


@endsection