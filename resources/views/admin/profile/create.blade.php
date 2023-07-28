@extends('layouts.profile')

@section('title', 'プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                <form method="POST" action="{{ route('admin.profile.create') }}">
                    
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
	                    <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
	                    <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="checkbox" class="form-control" name="gender">
                        </div>
                    </div>
                    <div class="form-group row">
	                    <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby">
                        </div>
                    </div>
                    <div class="form-group row">
	                    <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction"></textarea> 
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-light" value="決定">
                </form>
            </div>
        </div>
    </div>
@endsection