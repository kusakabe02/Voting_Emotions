@extends('layouts.app')
  @section('content')
  <!--modalモーダルウィンドウ-->
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">ユーザ情報ページ</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-11 col-md-offset-1">
        <div class="user-table">
          <div class="form-group">
          <div class="input-group">ユーザ名：</div>        <div class="user-group_name">{{$auth->name}}</div><br>
          <div class="input-group">メールアドレス：</div>    <div class="user-group_mail">{{$auth->email}}</div><br>
          <div class="input-group">パスワード：</div>        <div class="user-group_pass">  <a class="btn btn-success" href="{{route('user.password.edit') }}">パスワード変更</a></div><br>
          <div class="input-group">登録日時：</div>        <div class="user-group_pass">{{$auth->created_at}}</div><br>
          <div class="input-group">更新日時：</div>        <div class="user-group_pass">{{$auth->updated_at}}</div><br>
        </div>
        <a class="btn btn-success" href="/users/{{$auth->id}}/edit">ユーザ名・メールアドレスの変更</a>
      </div>
    </div>
</div>
    @endsection
