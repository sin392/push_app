// プッシュ通知を受け取ったときのイベント
self.addEventListener("push", function (event) {
    const data = event.data.json();
    console.log("receive", data);
    const options = {
        // body: event.data.text(), // サーバーからのメッセージ
        body: data.body,
        tag: data.title, // タイトル
        // icon: "icon-512x512.png", // アイコン
        // badge: "icon-512x512.png", // アイコン
        actions: [
            { action: 'action1', title: "button1" },
            { action: 'action2', title: "button2" }
        ]
    };

    event.waitUntil(self.registration.showNotification(data.title, options));
});

// プッシュ通知をクリックしたときのイベント
self.addEventListener("notificationclick", function (event) {
    event.notification.close();

    // サービスワーカーの中で環境変数使えない？
    //     //     // プッシュ通知をクリックしたときにブラウザを起動して表示するURL
    //     clients.openWindow("http://localhost:8080")
    // );

    if (event.action === 'action1') {
        event.waitUntil(
            clients.openWindow("http://localhost:8080")
        );
    } else if (event.action === 'action2') {
        event.waitUntil(
            clients.openWindow("http://localhost:8080/messages")
        );
    }
});

// Service Worker インストール時に実行される
// キャッシュするファイルとかをここで登録する
self.addEventListener("install", (event) => {
    console.log("service worker install ...");
});
