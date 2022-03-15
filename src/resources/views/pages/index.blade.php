@extends('layouts.layout')

@section('title', 'Top Page')

@section('content')
    <div class="wrapper">
        <div class="mt-3 mb-1">
            <p>
                このページはプッシュ通知購読用のエントリーページです。<br />
                プッシュ通知を行うためには、以下の手順に従ってください。
            </p>
            <ul>
                <li>このページでプッシュ通知を許可する。</li>
                <li>送信フォームページに移動する。</li>
                <li>送信フォームの入力を行い、ポストする。</li>
            </ul>
        </div>
        <div class="mt-1 mb-1">
            <p>
                プッシュ購読登録をリセットする際は以下の手順に従ってください。
            <ul>
                <li>Developer Tools > Application > Unregister</li>
                <li>アドレスバー横のツールチップ > 権限をリセット</li>
            </ul>
            </p>
        </div>
        <div class="mt-1">
            <p>また、以下のボタンで購読登録に関係なく通知をテストすることができます。</p>
            <button onclick="handleClick();" class="btn btn-primary">通知</button>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/index.js') }}"></script>
@endsection
