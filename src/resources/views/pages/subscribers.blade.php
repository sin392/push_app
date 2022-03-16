@extends('layouts.list-layout')

@section('title', 'Subscribers List Page')

@section('table-header')
    <tr>
        <th scope="col"></th>
        <th scope="col">#</th>
        <th scope="col">endpoint</th>
        <th scope="col">created_at</th>
    </tr>
@endsection

@section('table-body')
    @foreach ($items as $subscriber)
        <tr>
            <td style="width:30px;"><input type="checkbox" class="form-check-input"></td>
            <td>{{ $subscriber->id }}</td>
            <td>{{ $subscriber->endpoint }}</td>
            <td>{{ $subscriber->created_at }}</th>
        </tr>
    @endforeach
@endsection
