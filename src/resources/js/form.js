window.handleSubmit = (event, form) => {
    event.preventDefault();
    if (!(form.title.value && form.body.value)) {
        alert("フォームに値を入力してください。");
        return false;
    }
    const param = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify({
            title: form.title.value,
            body: form.body.value,
            scheduled_at: form.scheduled_at.value,
            is_sended: !!form.scheduled_at,
        }),
    };
    fetch("http://localhost:8080/api/push", param)
        .then(() => {
            alert("メッセージを送信しました。");
            form.reset();
        })
        .catch((e) => {
            console.log(e);
            alert("メッセージの送信に失敗しました。");
        });
    return false;
};
