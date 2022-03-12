// プッシュ通知を受け取ったときのイベント
self.addEventListener("push", function (event) {
    const data = event.data.json();
    console.log("receive", data);
    const options = {
        // body: event.data.text(), // サーバーからのメッセージ
        body: "",
        tag: data.title, // タイトル
        // icon: "icon-512x512.png", // アイコン
        // badge: "icon-512x512.png", // アイコン
    };

    event.waitUntil(self.registration.showNotification(data.title, options));
});

// プッシュ通知をクリックしたときのイベント
self.addEventListener("notificationclick", function (event) {
    event.notification.close();

    // サービスワーカーの中で環境変数使えない？
    // event.waitUntil(
    //     // プッシュ通知をクリックしたときにブラウザを起動して表示するURL
    //     clients.openWindow("https://localhost:8080")
    // );
});

// Service Worker インストール時に実行される
// キャッシュするファイルとかをここで登録する
self.addEventListener("install", (event) => {
    console.log("service worker install ...");
});
