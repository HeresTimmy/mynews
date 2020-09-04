@extends('layouts.profile')

@section('title', 'プロフィール編集')

@section('content')
     <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@edit') }}" method="post" enctype="multipart/from-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="id" value="{{ $profile_form->id }}">
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md gender-select">
                            <select name="gender">
                                <option {{ $profile_form->gender == '未選択' ? 'selected' : '' }} >未選択</option>
                                <option {{ $profile_form->gender == '男' ? 'selected' : '' }} >男</option>
                                <option {{ $profile_form->gender == '女' ? 'selected' : '' }} >女</option>
                                <option {{ $profile_form->gender == 'その他' ? 'selected' : '' }} >その他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby">{{ $profile_form->hobby }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">   
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->histories != NULL)
                                @foreach ($profile_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach   
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection