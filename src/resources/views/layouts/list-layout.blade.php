@extends('layouts.layout')

@section('title', 'List Page')

@section('style')
    <link href="{{ asset('/css/list-layout.css') }}" rel='stylesheet' type='text/css'>
@endsection
@yield('style')

@section('content')
    <div class="list-sub-wrapper mt-3">
        <div>合計：{{ count($items) }} 件</div>
        <select class="form-select" style="width: 150px;" onchange="handleSelect(event);">
            <option value="messages" {{ 'list/messages' == request()->path() ? 'selected' : '' }}>Messages
            </option>
            <option value="subscribers" {{ 'list/subscribers' == request()->path() ? 'selected' : '' }}>
                Subscribers</option>
            <option value="publishers" {{ 'list/publishers' == request()->path() ? 'selected' : '' }}>Publishers
            </option>
        </select>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                @yield('table-header')
            </thead>
            <tbody>
                @yield('table-body')
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/list-layout.js') }}"></script>
@endsection
@yield('script')
