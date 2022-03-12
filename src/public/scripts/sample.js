if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("/service-worker.js", { scope: "/" })
        .then(function (reg) {
            // registration worked
            console.log("Registration succeeded. Scope is " + reg.scope);
        })
        .catch(function (error) {
            // registration failed
            console.log("Registration failed with " + error);
        });
}

function initialiseServiceWorker() {
    if (!("showNotification" in ServiceWorkerRegistration.prototype)) {
        console.log("cant use notification");
        return;
    }

    if (Notification.permission === "denied") {
        console.log("user block notification");
        return;
    }

    if (!("PushManager" in window)) {
        console.log("push messaging not supported");
        return;
    }

    // プッシュ通知使えるので
    navigator.serviceWorker.ready.then((registration) => {
        registration.pushManager.getSubscription().then((subscription) => {
            if (!subscription) {
                // subscribe();
                console.log(subscription);
            }
        });
    });
}

navigator.serviceWorker.ready.then((registration) => {
    Notification.requestPermission().then((permission) => {
        console.log(permission);
        if (permission === "granted") {
            console.log("hoge");
            var n = new Notification("To do list");
        }
    });
});
// initialiseServiceWorker();
