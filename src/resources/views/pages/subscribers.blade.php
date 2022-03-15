@extends('layouts.layout')

@section('title', 'Subscribers List Page')

@section('style')
    {{-- <link href="{{ asset('/css/form.css') }}" rel='stylesheet' type='text/css'> --}}
@endsection

@section('content')
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">endpoint</th>
                    <th scope="col">created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscriber->id }}</td>
                        <td>{{ $subscriber->endpoint }}</td>
                        <td>{{ $subscriber->created_at }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
