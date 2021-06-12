@extends('modir.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
            
            <div class="row">
                @foreach($files as $file)
                    <div class="col-md-4 p-2" >
                        <div class="row p-9 m-0" style="border:1px solid black">
                            <div class="col-md-12">
                            <br>
                                <p>نام مشاور : {{App\Models\User::find($file->userid_moshaver)->name}}</p>
                                <p>نام مالک فایل : {{App\Models\User::find($file->userid_file)->name}}</p>
                                <p>شماره تلفن مالک فایل : {{App\Models\User::find($file->userid_file)->phone}}</p>
                                <div style="text-align: center;">
                                <button data-toggle="modal" data-target="#show_file_verify" onclick="show_verify_file_details('{{$file->id}}','{{$file->userid_file}}','{{$file->userid_moshaver}}')" class="btn btn-success">جزئیات فایل</button>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            </div>
        </div>
    
    </div>
</div>


@endsection