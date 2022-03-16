@extends('layouts.layout')

@section('title', 'Message List Page')

@section('style')
    <link href="{{ asset('/css/messages.css') }}" rel='stylesheet' type='text/css'>
@endsection

@section('content')
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">body</th>
                    <th scope="col">publisher_id</th>
                    <th scope="col">created_at</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->body }}</td>
                        <td>{{ $message->publisher_id }}</td>
                        <td>{{ $message->created_at }}</td>
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
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/messages.js') }}"></script>
@endsection
