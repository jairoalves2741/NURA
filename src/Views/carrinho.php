<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="manifest" href="/NURA/manifest.json">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nura - Carrinho</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>

  <header>
    <div class="container header-inner">
      <a href="index.php" class="logo">
        Nura<span>.</span>
      </a>

      <nav class="nav-links">
        <a href="index.php">Início</a>
        <a href="index.php?page=produtos">Produtos</a>
      </nav>
    </div>
  </header>

  <main class="container" style="padding: 3rem 0; max-width: 800px;">
    <h1 style="margin-bottom: 2rem;">Seu Carrinho</h1>

    <div class="order-card" style="display: flex; gap: 1rem; align-items: center; padding: 1rem;">
      <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500" alt="Bowl"
        style="width: 80px; height: 80px; object-fit: cover; border-radius: var(--radius);">

      <div style="flex: 1;">
        <h3 style="font-size: 1rem;">Bowl Verde Vitality</h3>
        <div style="color: var(--primary); font-weight: 700;">R$ 32,90</div>
      </div>

      <div style="display: flex; align-items: center; gap: 0.5rem;">
        <button class="btn btn-ghost" style="border: 1px solid var(--border); padding: 0.3rem 0.6rem;">-</button>
        <span>1</span>
        <button class="btn btn-ghost" style="border: 1px solid var(--border); padding: 0.3rem 0.6rem;">+</button>
        <button class="btn btn-ghost" style="color: #ef4444;"><i class="ph ph-trash"></i></button>
      </div>
    </div>

    <div style="background: var(--secondary); padding: 1.5rem; border-radius: var(--radius); margin-top: 2rem;">
      <div style="display: flex; justify-content: space-between; margin-bottom: 0.8rem;">
        <span>Subtotal</span>
        <span>R$ 32,90</span>
      </div>

      <div style="display: flex; justify-content: space-between; margin-bottom: 0.8rem;">
        <span>Entrega</span>
        <span>R$ 10,00</span>
      </div>

      <div
        style="display: flex; justify-content: space-between; border-top: 1px solid rgba(0,0,0,0.1); padding-top: 1rem; font-size: 1.2rem; font-weight: 700; color: var(--primary);">
        <span>Total</span>
        <span>R$ 42,90</span>
      </div>

      <button class="btn btn-primary btn-full" style="margin-top: 1rem;"
        onclick="window.location.href='index.php?page=cadastro'">
        Finalizar Pedido
      </button>
    </div>
  </main>

  <script src="script.js"></script>

  <script type="module">
    // Importações necessárias para o Firebase App, Auth e Firestore
    import { initializeApp } from "https://www.gstatic.com/firebasejs/12.6.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/12.6.0/firebase-analytics.js";
    import {
      getAuth,
      onAuthStateChanged,
      signOut,
      createUserWithEmailAndPassword,
      signInWithEmailAndPassword
    } from "https://www.gstatic.com/firebasejs/12.6.0/firebase-auth.js";
    import {
      getFirestore,
      doc,
      updateDoc,
      setDoc, // <-- AGORA IMPORTADO
      collection,
      query,
      where,
      getDoc,
      getDocs,
      orderBy
    } from "https://www.gstatic.com/firebasejs/12.6.0/firebase-firestore.js";

    // Sua configuração web app's Firebase
    const firebaseConfig = {
      apiKey: "AIzaSyBGR0TXV9bGdXPP8xm5EDr5h4M1qDQtGYY",
      authDomain: "nura-3da07.firebaseapp.com",
      projectId: "nura-3da07",
      storageBucket: "nura-3da07.firebasestorage.app",
      messagingSenderId: "542616787048",
      appId: "1:542616787048:web:625d4f4f16d62e45eac3dd",
      measurementId: "G-WLMM0FF9S0"
    };

    // 1. Inicializa o Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);

    // 2. Inicializa os serviços e expõe as INSTÂNCIAS e FUNÇÕES no escopo global
    window.auth = getAuth(app);
    window.db = getFirestore(app);

    // Expondo FUNÇÕES DE AUTH
    window.createUserWithEmailAndPassword = createUserWithEmailAndPassword;
    window.signInWithEmailAndPassword = signInWithEmailAndPassword;
    window.signOut = signOut;

    // Expondo funções do Firestore (CORRIGIDO: setDoc e updateDoc)
    window.doc = doc;
    window.updateDoc = updateDoc;
    window.setDoc = setDoc; // <-- CORREÇÃO
    window.collection = collection;
    window.query = query;
    window.where = where;
    window.getDoc = getDoc;
    window.getDocs = getDocs;
    window.orderBy = orderBy;


    // 3. Conecta o estado de autenticação (loadUserData está no script.js)
    onAuthStateChanged(window.auth, (user) => {
      if (typeof loadUserData === 'function') {
        loadUserData(user);
      }
    });
  </script>
</body>

</html>