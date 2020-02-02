if ('serviceWorker' in window.navigator) {
  window.addEventListener('load', () => {
      navigator.serviceWorker
        .register('./pages.js')
        .then(reg => {})
        .catch(err => console.log(`Service Worker: Error: ${err}`));
    });
  }
  