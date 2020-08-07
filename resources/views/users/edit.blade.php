@extends('layouts.app')
  @section('content')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">ユーザ情報編集ページ</h3>
      </div>

      @if (isset($msg))

     <div class="user-list__msg">

     <span>{{$msg}}</span>

     </div>
      @endif

    </div>

    <div class="row">
        <div class="user-table">
          <form action="{{ url('users/'.$auth->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          <div class="form-group">
          <div class="input-group">ユーザ名：</div>        <input class="user-group_name" type="text" name="name" value="{{$auth->name}}">
          <div class="input-group">メールアドレス：</div>   <input class="user-group_mail" type="text" name="mail" value="{{$auth->mail}}">
          <div class="input-group">パスワード：</div>       <input class="user-group_pass" type="text" name="pass" value="">
        <button type="submit" class="btn-success btn-fun">更新</button>
      </form>
      </div>
    </div>
</div>
    @endsection
