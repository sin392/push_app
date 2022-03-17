@extends('layouts.list-layout')

@section('title', 'Messages List Page')

{{-- @section('style')
    <link href="{{ asset('/css/messages.css') }}" rel='stylesheet' type='text/css'>
@endsection --}}

@section('content')
@section('table-header')
    <tr>
        <th scope="col"></th>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">body</th>
        <th scope="col">publisher_id</th>
        <th scope="col">scheduled_at</th>
        <th scope="col">created_at</th>
        <th scope="col">is_sended</th>
        <th scope="col">ACTION</th>
    </tr>
@endsection
@section('table-body')
    @foreach ($items as $message)
        <tr>
            <td style="width:30px;"><input type="checkbox" class="form-check-input"></td>
            <td>{{ $message->id }}</td>
            <td>{{ $message->title }}</td>
            <td>{{ $message->body }}</td>
            <td>{{ $message->publisher_id }}</td>
            <td>{{ $message->scheduled_at }}</td>
            <td>{{ $message->created_at }}</td>
            <td>{{ $message->is_sended ? '○' : '' }}</td>
            <td>
                <div class="button-wrapper">
                    <button type="submit" class="btn btn-primary"
                        onclick="handleResend(event, {{ json_encode($message) }});">Resend</button>
                    <button type="submit" class="btn btn-danger"
                        onclick="handleDeleteMessage(event, {{ json_encode($message) }});">Delete</button>
                </div>
            </td>
        </tr>
    @endforeach
@endsection

@section('script')
    <script src="{{ asset('/js/messages.js') }}"></script>
@endsection
