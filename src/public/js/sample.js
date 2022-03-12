if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("/service-worker.js", { scope: "/" })
        .then(function (reg) {
            // registration worked
            window.sw = reg;
            console.log("Registration succeeded. Scope is " + reg.scope);
        })
        .catch(function (error) {
            // registration failed
            console.log("Registration failed with " + error);
        });
}

// function initialiseServiceWorker() {
//     if (!("showNotification" in ServiceWorkerRegistration.prototype)) {
//         console.log("cant use notification");
//         return;
//     }

//     if (Notification.permission === "denied") {
//         console.log("user block notification");
//         return;
//     }

//     if (!("PushManager" in window)) {
//         console.log("push messaging not supported");
//         return;
//     }

//     // プッシュ通知使えるので
//     navigator.serviceWorker.ready.then((registration) => {
//         registration.pushManager.getSubscription().then((subscription) => {
//             if (!subscription) {
//                 // subscribe();
//                 console.log(subscription);
//             }
//         });
//     });
// }

const handleClick = () => {
    console.log("clikcked");
    if (Notification.permission === "granted") {
        const n = new Notification("To do list");
    }
};

function urlB64ToUint8Array(base64String) {
    const padding = "=".repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, "+")
        .replace(/_/g, "/");

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

navigator.serviceWorker.ready.then((registration) => {
    Notification.requestPermission().then(async (permission) => {
        console.log(permission);

        const appServerKey =
            "BGCBsWD2wckI_Ym0UoHiKEXcV3W_-LPMVzbDA5yjtbuhmm9cYQH16IydrxHtTyFTBGsCylpvL-nakhm0sMHGk-E";
        const applicationServerKey = urlB64ToUint8Array(appServerKey);

        // push managerにサーバーキーを渡し、トークンを取得
        let subscription = undefined;
        try {
            subscription = await window.sw.pushManager.subscribe({
                userVisibleOnly: true,
                applicationServerKey,
            });
        } catch (e) {
            console.log(e);
            alert(
                "Push通知機能が拒否されたか、エラーが発生しましたので、Push通知は送信されません。"
            );
            return false;
        }

        // 必要なトークンを変換して取得（これが重要！！！）
        const key = subscription.getKey("p256dh");
        const token = subscription.getKey("auth");
        const request = {
            endpoint: subscription.endpoint,
            userPublicKey: btoa(
                String.fromCharCode.apply(null, new Uint8Array(key))
            ),
            userAuthToken: btoa(
                String.fromCharCode.apply(null, new Uint8Array(token))
            ),
        };

        console.log(request);
    });
});
