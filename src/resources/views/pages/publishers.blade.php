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
    @foreach ($items as $publisher)
        <tr>
            <td>{{ $publisher->id }}</td>
            <td>{{ $publisher->user_id }}</td>
            <td>{{ $publisher->created_at }}</th>
        </tr>
    @endforeach
@endsection
