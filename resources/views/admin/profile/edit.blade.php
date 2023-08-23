@extends('layouts.profile')

@section('title', 'プロフィールの編集')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ route('admin.profile.update') }}" method="post" 
                enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" 
                            value="{{ $form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
	                    <label class="col-md-2">性別</label>
                        <div class="col-md-1">
                            <input type="checkbox" class="form-control" name="gender" 
                            value="{{ $form->gender }}">男性
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="form-control" name="gender" 
                            value="{{ $form->gender }}">女性
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" 
                            value="{{ $form->hobby }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction">
                            {{ $form->introduction }}</textarea> 
                        </div>
                    </div>

                    <div class="form-group "></div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                        @if ($form->histories != NULL)
                            @foreach ($form->histories as $profilehistory)
                                <li class="list-group-item">{{ $profilehistory->edited_at }}</li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection