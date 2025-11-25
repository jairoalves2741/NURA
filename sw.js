const CACHE_NAME = "nura-cache-v1";

// CORREÇÃO: Todos os caminhos agora usam o prefixo /NURA/
const arquivosParaCache = [
  "/NURA/",
  "/NURA/index.php",
  "/NURA/style.css",
  "/NURA/script.js",
  "/NURA/manifest.json",
  "/NURA/cadastro.php",
  "/NURA/carrinho.php",
  "/NURA/perfil.php",
  "/NURA/produtos.php",
  // Verifique a pasta dos ícones:
  "/NURA/icons/icon-192x192.png",
  "/NURA/icons/icon-512x512.png",
];

self.addEventListener("install", (evento) => {
  evento.waitUntil(
    caches
      .open(CACHE_NAME)
      .then((cache) => {
        return cache.addAll(arquivosParaCache);
      })
      .catch((error) => {
        console.error("Falha na instalação. Verifique os caminhos:", error);
        throw error;
      })
  );
  self.skipWaiting();
});

self.addEventListener("activate", (evento) => {
  evento.waitUntil(
    caches
      .keys()
      .then((nomesCaches) => {
        return Promise.all(
          nomesCaches.map((nome) => {
            if (nome !== CACHE_NAME) {
              return caches.delete(nome);
            }
          })
        );
      })
      .then(() => {
        self.clients.claim();
      })
  );
});

self.addEventListener("fetch", (evento) => {
  evento.respondWith(
    caches.match(evento.request).then((resCache) => {
      if (resCache) {
        return resCache;
      }
      return fetch(evento.request).catch(() => {
        // Fallback para navegação offline
        return caches.match("/NURA/index.php");
      });
    })
  );
});
