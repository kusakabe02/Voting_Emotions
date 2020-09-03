@extends('layouts.app')
  @section('content')
    <div class="container ops-main">
    <div class="row">
      <div class="col-md-12">
        <h3 class="ops-title">パスワード変更ページ</h3>
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

      {{-- 更新成功 --}}
      @if(session('update_success'))
      <div class="container ops-main">
        <div class="alert alert-success">
          {{session('update_success')}}
        </div>
      </div>
      @endif

      {{-- フォーム --}}
      <div class="row">
        <div class="user-table">
          <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
              <div class="input-group">現在のパスワードを入力してください：</div>
              <input class="user-group_name form-control" type="password" name="current-password"  required autofocus>

              <div class="input-group">新しいパスワードを入力してください。：</div>
              <input class="user-group_mail form-control" type="password" name="new-password" required>

              <div class="input-group">確認として、もう一度新しいパスワードを入力してください。：</div>
              <input class="user-group_pass form-control" type="password" name="new-password_confirmation" required>
              <button type="submit" class="btn-success btn-fun">更新</button>
      </form>
        <a class="btn btn-secondary" href="/users">戻る</a>
      </div>
    </div>
</div>
    @endsection
