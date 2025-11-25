/**
 * Carrega os dados de autenticação e busca dados adicionais do Firestore (coleção 'users').
 * @param {object|null} authUser O objeto User do Firebase Auth, ou null se deslogado.
 */
async function loadUserData(authUser) {
  if (!authUser) {
    // Usuário não logado
    const headerUserName = document.getElementById("header-user-name");
    const headerUserAvatar = document.getElementById("header-user-avatar");
    if (headerUserName) headerUserName.textContent = `Olá, Visitante`;
    if (headerUserAvatar) headerUserAvatar.textContent = `?`;

    // Redireciona se estiver na página de perfil sem estar logado
    if (window.location.pathname.includes("perfil.html")) {
      alert("Você precisa estar logado para acessar esta página.");
      window.location.href = "cadastro.html";
    }
    return;
  }

  // Usuário logado - Busca dados adicionais no Firestore
  if (!window.db) return console.error("Firestore não inicializado.");

  let userData = {};
  try {
    // CORREÇÃO: Usando window.doc e window.getDoc
    const userDocRef = window.doc(
      window.db, // Instância do Firestore
      `users`, // Coleção
      authUser.uid // Document ID
    );
    const userDoc = await window.getDoc(userDocRef);

    if (userDoc.exists()) {
      userData = userDoc.data();
    }
  } catch (error) {
    console.error("Erro ao buscar dados do usuário no Firestore:", error);
  }

  // Juntando dados do Auth e do Firestore
  const user = { ...authUser, ...userData };

  // 1. Atualiza Header
  const headerUserName = document.getElementById("header-user-name");
  const headerUserAvatar = document.getElementById("header-user-avatar");

  if (headerUserName) {
    const displayName =
      user.nome || user.displayName || user.email.split("@")[0];
    headerUserName.textContent = `Olá, ${displayName}`;
  }
  if (headerUserAvatar) {
    headerUserAvatar.textContent = (
      user.nome ||
      user.displayName ||
      user.email ||
      "U"
    )
      .charAt(0)
      .toUpperCase();
  }

  // 2. Atualiza Formulário de Perfil (se estiver na página)
  if (window.location.pathname.includes("perfil.html")) {
    const inputNome = document.getElementById("input-nome");
    const inputSobrenome = document.getElementById("input-sobrenome");
    const inputEmail = document.getElementById("input-email");
    const inputTelefone = document.getElementById("input-telefone");

    if (inputNome) inputNome.value = user.nome || "";
    if (inputSobrenome) inputSobrenome.value = user.sobrenome || "";
    if (inputEmail) inputEmail.value = user.email || "";
    if (inputTelefone) inputTelefone.value = user.telefone || "";

    // 3. Carregar pedidos e endereços
    loadUserOrders(user.uid);
    loadUserAddresses(user.uid);
  }
}

// --------------------------------------------------------------------------------------

/**
 * Carrega e renderiza os pedidos do usuário no Firestore (coleção 'orders').
 * @param {string} userId O UID do usuário logado.
 */
async function loadUserOrders(userId) {
  const listaPedidos = document.getElementById("lista-pedidos");
  if (!listaPedidos || !window.db) return;

  listaPedidos.innerHTML = "";

  try {
    // CORREÇÃO: Usando collection, query, where, orderBy e getDocs corretamente
    const ordersCollectionRef = window.collection(window.db, "orders");

    const q = window.query(
      ordersCollectionRef,
      window.where("userId", "==", userId),
      window.orderBy("createdAt", "desc")
    );
    const querySnapshot = await window.getDocs(q);

    if (querySnapshot.empty) {
      listaPedidos.innerHTML = `
        <div style="text-align: center; padding: 2rem; border: 1px dashed var(--border); border-radius: var(--radius); color: var(--muted);">
            <i class="ph ph-package" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
            <p>Você ainda não fez nenhum pedido.</p>
            <a href="produtos.html" class="btn btn-ghost" style="margin-top: 1rem; color: var(--primary);">Ir para o Cardápio</a>
        </div>
      `;
      return;
    }

    // Renderização dos pedidos
    querySnapshot.forEach((doc) => {
      const order = { id: doc.id, ...doc.data() };

      const statusClass =
        order.status === "delivered" ? "status-delivered" : "status-processing";
      const statusText =
        order.status === "delivered" ? "Entregue" : "Em Preparo";
      const buttonText =
        order.status === "delivered" ? "Pedir Novamente" : "Acompanhar Entrega";

      const itemsList = (order.items || [])
        .map((item) => `<span>${item}</span>`)
        .join("");

      const buttonAction =
        order.status === "delivered"
          ? `<button class="btn btn-primary" style="font-size: 0.85rem; padding: 0.4rem 1rem; float: right;">${buttonText}</button>`
          : `<button class="btn btn-ghost" style="font-size: 0.85rem; padding: 0.3rem 0;">${buttonText}</button>`;

      const totalFormatted = order.total
        ? parseFloat(order.total).toFixed(2).replace(".", ",")
        : "0,00";

      listaPedidos.innerHTML += `
        <div class="order-card">
            <div class="order-header">
                <div>
                    <span style="font-weight: 700;">#Pedido ${order.id}</span>
                    <span style="color: var(--muted); font-size: 0.85rem; display: block;">${
                      order.date || "Data Indefinida"
                    }</span>
                </div>
                <span class="status-badge ${statusClass}">${statusText}</span>
            </div>
            <div class="order-body">
                <div class="order-items">
                    ${itemsList}
                </div>
                <div class="order-total">Total: R$ ${totalFormatted}</div>
            </div>
            <div style="padding-top: 1rem; margin-top: 1rem; border-top: 1px solid var(--border);">
                <button class="btn btn-ghost" style="font-size: 0.85rem; padding: 0.3rem 0;">Ver Detalhes</button>
                ${buttonAction}
            </div>
        </div>
      `;
    });
  } catch (error) {
    console.error("Erro ao carregar pedidos do usuário:", error);
    listaPedidos.innerHTML = `<p style="color: #ef4444; text-align: center;">Erro ao carregar pedidos.</p>`;
  }
}

// --------------------------------------------------------------------------------------

/**
 * Carrega e renderiza os endereços do usuário no Firestore (subcoleção 'addresses').
 * @param {string} userId O UID do usuário logado.
 */
async function loadUserAddresses(userId) {
  const listaEnderecos = document.getElementById("lista-enderecos");
  if (!listaEnderecos || !window.db) return;

  listaEnderecos.innerHTML = "";

  // 1. Adiciona o botão de "Adicionar Novo" primeiro
  listaEnderecos.innerHTML += `
      <div class="address-card new-address" id="btn-add-endereco">
          <i class="ph ph-plus" style="font-size: 2rem; color: var(--muted); margin-bottom: 0.5rem;"></i>
          <span style="font-weight: 500; color: var(--muted);">Adicionar Novo</span>
      </div>
  `;

  try {
    // CORREÇÃO: Usando collection e getDocs corretamente
    // Busca endereços na subcoleção 'addresses' do documento do usuário (users/userId/addresses)
    const addressesCollectionRef = window.collection(
      window.db,
      `users`,
      userId,
      `addresses`
    );
    const querySnapshot = await window.getDocs(addressesCollectionRef);

    // 3. Renderização dos endereços
    querySnapshot.forEach((doc) => {
      const address = { id: doc.id, ...doc.data() };

      const activeClass = address.isDefault ? "active" : "";
      const defaultIcon = address.isDefault
        ? `<div style="position: absolute; top: 1rem; right: 1rem; color: var(--primary);"><i class="ph-fill ph-check-circle" style="font-size: 1.2rem;"></i></div>`
        : "";

      const nicknameIcon =
        address.nickname === "Casa"
          ? '<i class="ph ph-house"></i>'
          : address.nickname === "Trabalho"
          ? '<i class="ph ph-briefcase"></i>'
          : '<i class="ph ph-map-pin"></i>';

      listaEnderecos.innerHTML += `
          <div class="address-card ${activeClass}">
              ${defaultIcon}
              <h3 style="font-weight: 600; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">${nicknameIcon} ${
        address.nickname
      }</h3>
              <p style="color: var(--muted); font-size: 0.9rem; line-height: 1.5;">
                  ${address.street}, ${address.number} ${
        address.complement ? "- " + address.complement : ""
      }<br>
                  ${address.neighborhood}, ${address.city} - ${
        address.state
      }<br>
                  CEP: ${address.zip}
              </p>
              <div style="margin-top: 1rem; display: flex; gap: 0.5rem;">
                  <button class="btn btn-ghost" style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">Editar</button>
                  <button class="btn btn-ghost" style="padding: 0.2rem 0.5rem; font-size: 0.8rem; color: #ef4444;">Excluir</button>
              </div>
          </div>
      `;
    });
  } catch (error) {
    console.error("Erro ao carregar endereços do usuário:", error);
    listaEnderecos.innerHTML += `<p style="color: #ef4444; text-align: center;">Erro ao carregar endereços.</p>`;
  }
}

// --------------------------------------------------------------------------------------

// REGISTRO DO SERVICE WORKER (Deixado intacto)
if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker
      .register("/NURA/sw.js", { scope: "/NURA/" })
      .then((registration) => {
        console.log("SW registrado com escopo:", registration.scope);
      })
      .catch((error) => {
        console.error("Falha ao registrar SW:", error);
      });
  });
}
