@extends('layouts.layout')

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
                <label for="body" class="form-label">Message</label>
                <input type="text" placeholder="本文を入力" name="body" id="body" class="form-control">
                <label for="scheduled_at" class="form-label">Scheduled_at</label>
                <input type="datetime-local" placeholder="配信予定日時を入力" name="scheduled_at" id="scheduled_at"
                    class="form-control">
                <p style="color: gray;">※ Scheduled_atを指定しない場合は即時配信が行われます。</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('/js/form.js') }}"></script>
@endsection
