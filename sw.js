const CACHE_NAME = "nura-cache-v1";
const arquivosParaCache = [
  "/",
  "/index.php",
  "/cadastro.php",
  "/carrinho.php",
  "/perfil.php",
  "/produtos.php",
  "/style.css",
  "/script.js",
  "/manifest.json",
  "/icons/icon-192x192.png",
  "/icons/icon-512x512.png",
];

self.addEventListener("install", (evento) => {
  evento.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(arquivosParaCache);
    })
  );
  // Faz o service worker ativar logo (mais simples)
  self.skipWaiting();
});

self.addEventListener("activate", (evento) => {
  evento.waitUntil(
    caches
      .keys()
      .then((nomesCaches) => {
        return Promise.all(
          nomesCaches.map((nome) => {
            // Se tiver cache antigo, deleta para manter só o atual
            if (nome !== CACHE_NAME) {
              return caches.delete(nome);
            }
          })
        );
      })
      .then(() => {
        // Assume o controle das abas abertas
        self.clients.claim();
      })
  );
});

self.addEventListener("fetch", (evento) => {
  evento.respondWith(
    caches.match(evento.request).then((resCache) => {
      // Se achou no cache, retorna isso
      if (resCache) {
        return resCache;
      }
      // Se não, vai na rede
      return fetch(evento.request).catch(() => {
        // Se a rede falhar (offline), podemos retornar uma página fallback simples
        return caches.match("/index.php");
      });
    })
  );
});
