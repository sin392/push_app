window.handleResend = (event, message) => {
    const param = {
        method: "POST",
        headers: {
            "Content-Type": "application/json; charset=utf-8",
        },
        body: JSON.stringify({
            title: message.title,
            body: message.body,
        }),
    };
    fetch("http://localhost:8080/api/push", param)
        .then(() => {
            alert("メッセージを再送しました。");
        })
        .catch((e) => {
            console.log(e);
            alert("メッセージの送信に失敗しました。");
        });
};

window.handleDeleteMessage = (event, message) => {
    fetch(`http://localhost:8080/api/messages/${message.id}`, {
        method: "DELETE",
    })
        .then(() => {
            alert("メッセージを削除しました。");
        })
        .catch((e) => {
            console.log(e);
            alert("メッセージの削除に失敗しました。");
        });
    location.reload();
};
