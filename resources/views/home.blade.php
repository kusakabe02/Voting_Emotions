@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('「トレンドエモート」ホーム') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Twitteトレンド投票サイト「トレンドエモート」へようこそ！') }}
                    {{ __('当サービスでは、現在のTwitteトレンドに対する想いを共有する目的で作成しました。ぜひ利用してみてください。') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
