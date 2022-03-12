<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Page</title>
    <style>
        .wrapper {
            margin: 1em auto;
            width: 95%;
        }
    </style>
</head>
<body>
    <h1>Form Page</h1>
    <form method='post' onsubmit="handleSubmit(event, this);">
        <label for="title">Please enter a title for push notification</label>
        <input type="text" name="title" id="title" >
        <button>Submit</button>
    </form>
</body>
<script>
    const handleSubmit = (event, form) => {
        event.preventDefault();
        const param = {
            method: "POST",
            headers: {
                "Content-Type": "application/json; charset=utf-8",
            },
            body: JSON.stringify({
                title: form.title.value,
            }),
        };
        fetch('http://localhost:8080/api/push', param).then(() => {
            form.reset();
        }).catch((e) => {
            console.log(e);
            alert('メッセージの送信に失敗しました。');
        });
        return false;
    } 
</script>
</html>
