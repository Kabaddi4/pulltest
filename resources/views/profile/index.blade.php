@extends('layouts.front')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="name">
                                    氏名：{{ Str::limit($post->name), 100 }}
                                </div>
                                <div class="gender">
                                    性別：{{ Str::limit($post->gender), 50 }}
                                </div>
                                <div class="hobby">
                                    趣味：{{ Str::limit($post->hobby), 100 }}
                                </div>
                                <div class="introduction">
                                   自己紹介： {{ Str::limit($post->introduction), 300 }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@section('content')
@endsection