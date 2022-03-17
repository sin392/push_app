window.handleSubmit = (event, form) => {
    event.preventDefault();
    const param = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify({
            title: form.title.value,
            body: form.body.value,
            url1: form.url1.value,
            url2: form.url2.value
        }),
    };
    fetch("http://localhost:8080/api/push", param)
        .then(() => {
            form.reset();
        })
        .catch((e) => {
            console.log(e);
            alert("メッセージの送信に失敗しました。");
        });
    return false;
};
