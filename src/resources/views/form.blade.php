<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Page</title>
    <link href="{{asset('/css/form.css')}}" rel='stylesheet' type='text/css'>
</head>
<body>
    <h1>Form Page</h1>
    <a href="/">トップ</a>
    <div class='wrapper'>
        <form method='post' onsubmit="handleSubmit(event, this);">
            <label for="title">Please enter a title for push notification</label>
            <input type="text" name="title" id="title" >
            <input type="text" name="body" id="body" >
            <button>Submit</button>
        </form>
    </div>
</body>
<script src="{{asset('/js/form.js')}}"></script>
</html>
