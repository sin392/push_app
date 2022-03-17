@extends('layout')

@section('title', 'Form Page')

@section('style')
    {{-- <link href="{{ asset('/css/form.css') }}" rel='stylesheet' type='text/css'> --}}
@endsection

@section('content')
    <div class='wrapper'>
        <form method='post' onsubmit="handleSubmit(event, this);">
            <div class="my-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" placeholder="タイトルを入力" name="title" id="title" class="form-control">
                <label for="title" class="form-label">Message</label>
                <input type="text" placeholder="本文を入力" name="body" id="body" class="form-control">
                <label for="title" class="form-label">Button1URL</label>
                <input type="url" placeholder="URLを入力" name="url1" id="url1" class="form-control"
                    patarn="[http|https]://.*">
                <label for="title" class="form-label">Button2URL</label>
                <input type="url" placeholder="URLを入力" name="url2" id="url2" class="form-control"
                    patarn="[http|https]://.*">
            </div>
            {{-- <div class="mx-auto"> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- </div> --}}
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/form.js') }}"></script>
@endsection
