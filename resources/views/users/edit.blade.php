@extends('layouts.app')
  @section('content')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">ユーザ情報編集ページ</h3>
      </div>

      {{-- エラーメッセージ --}}
      @if(count($errors) > 0)
      <div class="container mt-2">
          <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </div>
      </div>
      @endif

    </div>

    <div class="row">
        <div class="user-table">
          <form action="{{ url('users/'.$auth->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          <div class="form-group">
          <div class="input-group">ユーザ名：</div>        <input class="user-group_name form-control" type="text" name="name" value="{{$auth->name}}" required>
          <div class="input-group">メールアドレス：</div>   <input class="user-group_mail form-control" type="text" name="mail" value="{{$auth->email}}" required>
        <button type="submit" class="btn btn-success">更新</button>
      </form>
      <br><br>
      <a class="btn btn-secondary" href="/users">戻る</a>
      </div>
    </div>
</div>
    @endsection
