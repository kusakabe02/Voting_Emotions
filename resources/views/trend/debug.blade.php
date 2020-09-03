@extends('layouts.app')
  @section('content')

  <div class="container ops-main">
  <div class="row">
    <div class="col-md-12">
      <h3 class="ops-title">DEBUGページ</h3>
    </div>
  </div>

------------------
{{ var_dump($old_date_trend) }}


@endsection
