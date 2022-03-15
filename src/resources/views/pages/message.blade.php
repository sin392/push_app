@extends('layout')

@section('title', 'Message List Page')

@section('style')
    {{-- <link href="{{ asset('/css/form.css') }}" rel='stylesheet' type='text/css'> --}}
@endsection

@section('content')
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        @foreach ($message as $key => $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
