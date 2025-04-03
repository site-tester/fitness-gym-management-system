// self.addEventListener('push', function(event) {
//     // Create the message body for the notification
//     var options = {
//         body: 'You haven\'t done any workout today. Don\'t forget to stay active!',
//         icon: 'https://ajdiafitnessgym.com/public/img/Logo.jpg',
//         badge: 'https://ajdiafitnessgym.com/public/img/Logo.jpg',
//     };

//     // Show the notification
//     event.waitUntil(
//         self.registration.showNotification('Workout Reminder', options)
//     );
// });

// self.addEventListener('notificationclick', function(event) {
//     // Close the notification when clicked
//     event.notification.close();

//     // Redirect the user to the workout page or gym homepage
//     event.waitUntil(
//         clients.openWindow('https://ajdiafitnessgym.com')
//     );
// });


self.addEventListener('push', (event) => {
    const data = event.data.json();
    const options = {
      body: data.body,
      icon: data.icon,
      actions: [
        { action: 'view_app', title: 'View App' },
      ],
    };
    event.waitUntil(self.registration.showNotification(data.title, options));
  });

  self.addEventListener('notificationclick', (event) => {
    event.notification.close();
    if (event.action === 'view_app') {
      event.waitUntil(clients.openWindow('https://ajdiafitnessgym.com'));
    }
  });

  self.addEventListener('pushsubscriptionchange', function(event) {
      event.waitUntil(
          self.registration.pushManager.subscribe({
              userVisibleOnly: true,
              applicationServerKey: 'BHobm4neAHKzOXazDwe8YKOB4TdSijuCLmj6R3sFXLXH7daMmXXW39S-GCbS7MxydAWxSvyz40PXKhVktTtCZNA', // Replace
          }).then(function(subscription) {
              console.log('Push subscription changed:', subscription);
              sendSubscriptionToServer(subscription);
          })
      );
  });

  function sendSubscriptionToServer(subscription) {
       fetch('/subscriptions', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify(subscription)
      });
  }
