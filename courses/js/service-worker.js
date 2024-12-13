const cacheName = 'cadtabs';
const filesToCache = [
  '/',
  'service.html',
  'index.html',
  'css/styles.css',
  'images/',
  'js/script.js',
  '/path/to/your/icon.png',
  // Add more files that you want to cache
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(cacheName).then((cache) => {
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});
