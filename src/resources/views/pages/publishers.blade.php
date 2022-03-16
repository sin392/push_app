@extends('layouts.list-layout')

@section('title', 'Publishers List Page')

@section('content')

@section('table-header')
    <tr>
        <th scope="col">#</th>
        <th scope="col">user_id</th>
        <th scope="col">created_at</th>
    </tr>
@endsection

@section('table-header')
    @foreach ($items as $subscriber)
        <tr>
            <td>{{ $subscriber->id }}</td>
            <td>{{ $subscriber->user_id }}</td>
            <td>{{ $subscriber->created_at }}</th>
        </tr>
    @endforeach
@endsection
