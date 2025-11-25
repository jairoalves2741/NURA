<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="manifest" href="/NURA/manifest.json">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nura - Alimentação Saudável</title>
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
                <a href="index.php" style="color: var(--primary); font-weight: bold;">Início</a>
                <a href="index.php?page=produtos">Produtos</a>
                <a href="index.php?page=cadastro">Minha Conta</a>
            </nav>

            <div class="header-actions">
                <a href="index.php?page=cadastro" class="btn btn-ghost" aria-label="Conta">
                    <i class="ph ph-user" style="font-size: 1.2rem;"></i>
                </a>
                <a href="index.php?page=carrinho" class="btn btn-ghost" style="position: relative;"
                    aria-label="Carrinho">
                    <i class="ph ph-shopping-cart" style="font-size: 1.2rem;"></i>
                    <span
                        style="position: absolute; top: 5px; right: 5px; background: var(--primary); width: 8px; height: 8px; border-radius: 50%;"></span>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section
            style="padding: 4rem 0; text-align: center; background: linear-gradient(to bottom, white, var(--secondary));">
            <div class="container">
                <div
                    style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(22,163,74,0.1); color: var(--primary); padding: 0.4rem 1rem; border-radius: 2rem; font-size: 0.85rem; font-weight: 600; margin-bottom: 1.5rem;">
                    <i class="ph-fill ph-leaf"></i> 100% Natural e Saudável
                </div>
                <h1
                    style="font-size: clamp(2.5rem, 5vw, 4rem); line-height: 1.1; font-weight: 800; margin-bottom: 1.5rem;">
                    Alimentação Saudável <br>
                    <span class="text-gradient">Feita com Amor</span>
                </h1>
                <p style="max-width: 600px; margin: 0 auto 2rem; color: var(--muted); font-size: 1.1rem;">
                    Descubra refeições deliciosas, nutritivas e preparadas com ingredientes frescos e naturais.
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <a href="index.php?page=produtos" class="btn btn-primary">
                        Ver Cardápio <i class="ph-bold ph-arrow-right"></i>
                    </a>
                    <a href="index.php?page=cadastro" class="btn btn-ghost" style="border: 1px solid var(--border);">
                        Criar Conta
                    </a>
                </div>
            </div>
        </section>

        <section class="container" style="padding: 4rem 1.5rem;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem;">Produtos em Destaque</h2>
                <p style="color: var(--muted);">Confira alguns dos nossos pratos mais populares.</p>
            </div>

            <div class="carousel-container">
                <button class="carousel-btn prev-btn"><i class="ph-bold ph-caret-left"></i></button>

                <div class="carousel-track">
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&auto=format&fit=crop"
                                    alt="Bowl" class="card-img">
                                <span class="card-badge">Bowls</span>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">Bowl Verde Vitality</h3>
                                <p class="card-desc">Mix de folhas, abacate, quinoa, grão de bico e molho especial.</p>
                                <div class="card-price">R$ 32,90</div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i>
                                    Adicionar</button>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&auto=format&fit=crop"
                                    alt="Salada" class="card-img">
                                <span class="card-badge">Saladas</span>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">Salada Color Nura</h3>
                                <p class="card-desc">Tomate cereja, pepino, rabanete, sementes e proteína vegetal.</p>
                                <div class="card-price">R$ 28,50</div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i>
                                    Adicionar</button>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?w=500&auto=format&fit=crop"
                                    alt="Smoothie" class="card-img">
                                <span class="card-badge">Bebidas</span>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">Smoothie Detox</h3>
                                <p class="card-desc">Couve, maçã, gengibre e limão. Energia pura para o seu dia.</p>
                                <div class="card-price">R$ 18,00</div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i>
                                    Adicionar</button>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-img-wrapper">
                                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=500&auto=format&fit=crop"
                                    alt="Wrap" class="card-img">
                                <span class="card-badge">Lanches</span>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">Wrap de Frango</h3>
                                <p class="card-desc">Wrap integral com frango grelhado, alface e tomate.</p>
                                <div class="card-price">R$ 22,00</div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-full"><i class="ph-bold ph-shopping-cart"></i>
                                    Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-btn next-btn"><i class="ph-bold ph-caret-right"></i></button>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                <div>
                    <div class="logo" style="margin-bottom: 1rem;">
                        Nura<span>.</span>
                    </div>
                    <p style="color: var(--muted); font-size: 0.9rem;">Alimentação saudável e deliciosa para uma vida
                        melhor.</p>
                </div>

                <div>
                    <h3 style="font-weight: 600; margin-bottom: 1rem;">Links Rápidos</h3>
                    <ul
                        style="display: flex; flex-direction: column; gap: 0.5rem; color: var(--muted); font-size: 0.9rem;">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="index.php?page=produtos">Produtos</a></li>
                        <li><a href="index.php?page=cadastro">Minha Conta</a></li>
                    </ul>
                </div>

                <div>
                    <h3 style="font-weight: 600; margin-bottom: 1rem;">Contato</h3>
                    <ul
                        style="display: flex; flex-direction: column; gap: 0.5rem; color: var(--muted); font-size: 0.9rem;">
                        <li style="display: flex; gap: 0.5rem;"><i class="ph ph-envelope"></i> contato@nura.com</li>
                        <li style="display: flex; gap: 0.5rem;"><i class="ph ph-phone"></i> (11) 9999-9999</li>
                    </ul>
                </div>
            </div>

            <div
                style="text-align: center; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.05); color: var(--muted); font-size: 0.85rem;">
                &copy; 2025 Nura. Todos os direitos reservados.
            </div>
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