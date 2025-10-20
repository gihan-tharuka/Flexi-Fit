self.addEventListener('push', (event) => {
    const notification = event.data.json();

    event.waitUntil(
        self.registration.showNotification(notification.title,
            {
                body: notification.body,

                icon: "./images/favicon.ico",
                data: {
                    url: notification.url
                }
            })
    );
});

self.addEventListener("notificationclick", function (event) {
event.waitUntil(
    clients.openWindow(event.notification.data.url)
)
})
