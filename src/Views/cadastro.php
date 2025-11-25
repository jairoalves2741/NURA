<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="manifest" href="/NURA/manifest.json">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nura - Acessar Conta</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>

    <header>
        <div class="container header-inner">
            <a href="index.php" class="logo">
                Nura<span>.</span>
            </a>

            <a href="index.php" style="font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="ph-bold ph-arrow-left"></i> Voltar
            </a>
        </div>
    </header>

    <div class="auth-wrapper">
        <div class="auth-card">

            <div class="auth-header">
                <h1 class="logo" style="font-size: 2rem; margin-bottom: 0.5rem;">Nura<span>.</span></h1>
                <p style="color: var(--muted); font-size: 0.9rem;">Acesse sua conta ou crie uma nova</p>
            </div>

            <div class="tabs">
                <button class="tab-btn active" data-target="login-form">Login</button>
                <button class="tab-btn" data-target="signup-form">Cadastro</button>
            </div>

            <div id="login-form" class="form-content active">
                <form id="form-login">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="input-login-email" class="input" placeholder="seu@email.com" required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" id="input-login-password" class="input" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Entrar</button>
                </form>
            </div>

            <div id="signup-form" class="form-content">
                <form id="form-cadastro">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" id="input-cadastro-nome" class="input" placeholder="Seu nome" required>
                    </div>
                    <div class="form-group">
                        <label>Sobrenome</label>
                        <input type="text" id="input-cadastro-sobrenome" class="input" placeholder="Seu sobrenome"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="input-cadastro-email" class="input" placeholder="seu@email.com"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" id="input-cadastro-password" class="input" placeholder="••••••••"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">Criar Conta</button>
                </form>
            </div>

        </div>
    </div>

    <footer>
        <div class="container" style="text-align: center; padding: 2rem 0;">
            <p style="color: var(--muted); font-size: 0.85rem;">&copy; 2025 Nura. Todos os direitos reservados.</p>
        </div>
    </footer>

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