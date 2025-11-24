document.addEventListener("DOMContentLoaded", () => {
  /* --- LÓGICA DAS ABAS (AUTH e Perfil) --- */
  const tabBtns = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".form-content");

  tabBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      // Remove ativo de todos
      tabBtns.forEach((b) => b.classList.remove("active"));
      tabContents.forEach((c) => c.classList.remove("active"));

      // Ativa o clicado
      btn.classList.add("active");
      const targetId = btn.getAttribute("data-target");
      document.getElementById(targetId).classList.add("active");
    });
  });

  /* --- LÓGICA DO CARROSSEL (se existir na página) --- */
  const track = document.querySelector(".carousel-track");
  if (track) {
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const items = document.querySelectorAll(".carousel-item");

    let currentIndex = 0;

    // Quantos itens visíveis? (Mobile 1, Desktop 3)
    const getItemsVisible = () => (window.innerWidth >= 768 ? 3 : 1);

    const updateCarousel = () => {
      const itemsVisible = getItemsVisible();
      const maxIndex = items.length - itemsVisible;

      // Loop limits
      if (currentIndex < 0) currentIndex = 0;
      if (currentIndex > maxIndex) currentIndex = maxIndex;

      // Ajuste para o gap (espaçamento) - simplificado para porcentagem
      track.style.transform = `translateX(-${
        currentIndex * (100 / itemsVisible)
      }%)`;
    };

    if (nextBtn) {
      // Verifica se os botões existem
      nextBtn.addEventListener("click", () => {
        const itemsVisible = getItemsVisible();
        if (currentIndex < items.length - itemsVisible) {
          currentIndex++;
          updateCarousel();
        } else {
          // Loop para o início
          currentIndex = 0;
          updateCarousel();
        }
      });
    }

    if (prevBtn) {
      // Verifica se os botões existem
      prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
          currentIndex--;
          updateCarousel();
        }
      });
    }

    // Responsividade
    window.addEventListener("resize", updateCarousel);
    // Garante que o carrossel é inicializado corretamente ao carregar a página
    updateCarousel();
  }

  /* --- LÓGICA DE PERFIL & LOGOUT --- */
  const btnLogout = document.getElementById("btn-logout");
  if (btnLogout) {
    btnLogout.addEventListener("click", () => {
      // 1. AQUI VOCÊ COLOCARÁ O CÓDIGO DO FIREBASE PARA LOGOUT:
      // Por exemplo: firebase.auth().signOut().then(() => { ... })

      // 2. Por enquanto, apenas simula e redireciona
      alert("Você saiu da sua conta.");
      window.location.href = "cadastro.html"; // Redireciona para a página de login/cadastro
    });
  }

  /* --- LÓGICA DE SALVAR PERFIL (Formulário) --- */
  const formPerfil = document.getElementById("form-perfil");
  if (formPerfil) {
    formPerfil.addEventListener("submit", (e) => {
      e.preventDefault(); // Impede o recarregamento da página

      const nome = document.getElementById("input-nome").value;
      const sobrenome = document.getElementById("input-sobrenome").value;
      // O email é disabled, então não será pego aqui.
      const telefone = document.getElementById("input-telefone").value;

      // AQUI ENTRA O FIREBASE FIRESTORE UPDATE:
      // Por exemplo: db.collection('users').doc(userId).update({ nome, sobrenome, telefone }).then(() => { ... })

      console.log("Salvando:", { nome, sobrenome, telefone });
      alert("Dados salvos com sucesso! (Simulação)");
    });
  }

  /* --- LÓGICA DE CARREGAR DADOS DO USUÁRIO (Firebase) --- */
  // Esta função será chamada após o usuário logar e em páginas como 'perfil.html'
  function loadUserData(user) {
    if (user) {
      // Se estiver logado, atualiza o header e os inputs do perfil
      const headerUserName = document.getElementById("header-user-name");
      const headerUserAvatar = document.getElementById("header-user-avatar");

      if (headerUserName) {
        const displayName = user.displayName || user.email.split("@")[0]; // Pega nome ou parte do email
        headerUserName.textContent = `Olá, ${displayName}`;
      }
      if (headerUserAvatar) {
        headerUserAvatar.textContent = (user.displayName || user.email || "U")
          .charAt(0)
          .toUpperCase();
      }

      // Apenas se estiver na página de perfil
      if (window.location.pathname.includes("perfil.html")) {
        const inputNome = document.getElementById("input-nome");
        const inputSobrenome = document.getElementById("input-sobrenome");
        const inputEmail = document.getElementById("input-email");
        const inputTelefone = document.getElementById("input-telefone");

        if (inputNome) inputNome.value = user.nome || ""; // Supondo que você salve 'nome' no Firebase
        if (inputSobrenome) inputSobrenome.value = user.sobrenome || ""; // Supondo que você salve 'sobrenome'
        if (inputEmail) inputEmail.value = user.email || "";
        if (inputTelefone) inputTelefone.value = user.telefone || ""; // Supondo que você salve 'telefone'

        // Carregar pedidos e endereços
        loadUserOrders(user.uid); // Passa o ID do usuário para carregar pedidos
        loadUserAddresses(user.uid); // Passa o ID do usuário para carregar endereços
      }
    } else {
      // Usuário não logado, talvez redirecionar ou mostrar botões de login
      const headerUserName = document.getElementById("header-user-name");
      const headerUserAvatar = document.getElementById("header-user-avatar");
      if (headerUserName) headerUserName.textContent = `Olá, Visitante`;
      if (headerUserAvatar) headerUserAvatar.textContent = `?`;

      // Se estiver na página de perfil sem estar logado, redireciona
      if (window.location.pathname.includes("perfil.html")) {
        alert("Você precisa estar logado para acessar esta página.");
        window.location.href = "cadastro.html";
      }
    }
  }

  // AQUI VOCÊ INTEGRARÁ O FIREBASE AUTH:
  // Exemplo: firebase.auth().onAuthStateChanged((user) => {
  //     loadUserData(user);
  // });
  // Por agora, vamos simular um usuário logado para testes
  // const mockUser = {
  //     uid: 'mockUserId123',
  //     displayName: 'Daniel Silva',
  //     email: 'daniel@exemplo.com',
  //     nome: 'Daniel',
  //     sobrenome: 'Silva',
  //     telefone: '(11) 99999-9999'
  // };
  // loadUserData(mockUser); // Descomente para testar com dados mockados

  /* --- Funções de Carregamento de Dados (Para o Firebase) --- */
  // Estas funções serão chamadas por 'loadUserData' ou por eventos

  function loadUserOrders(userId) {
    const listaPedidos = document.getElementById("lista-pedidos");
    if (!listaPedidos) return;

    // Limpa a lista atual (se houver o "nenhum pedido")
    listaPedidos.innerHTML = "";

    // 1. AQUI VOCÊ COLOCARÁ O CÓDIGO DO FIREBASE PARA BUSCAR PEDIDOS:
    // Exemplo: db.collection('orders').where('userId', '==', userId).get().then((querySnapshot) => {
    //     if (querySnapshot.empty) {
    //         listaPedidos.innerHTML = `
    //             <div style="text-align: center; padding: 2rem; border: 1px dashed var(--border); border-radius: var(--radius); color: var(--muted);">
    //                 <i class="ph ph-package" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
    //                 <p>Você ainda não fez nenhum pedido.</p>
    //                 <a href="produtos.html" class="btn btn-ghost" style="margin-top: 1rem; color: var(--primary);">Ir para o Cardápio</a>
    //             </div>
    //         `;
    //         return;
    //     }
    //     querySnapshot.forEach((doc) => {
    //         const order = doc.data();
    //         // ... monta o HTML do pedido e adiciona em listaPedidos.innerHTML += ...
    //     });
    // });

    // DADOS MOCKADOS PARA EXEMPLO:
    const mockOrders = [
      {
        id: "4829",
        date: "14 Nov 2025",
        status: "delivered",
        items: ["1x Bowl Verde Vitality", "2x Smoothie Detox"],
        total: "68,90",
      },
      {
        id: "5021",
        date: "Hoje",
        status: "processing",
        items: ["1x Salada Color Nura"],
        total: "28,50",
      },
    ];

    if (mockOrders.length === 0) {
      listaPedidos.innerHTML = `
                <div style="text-align: center; padding: 2rem; border: 1px dashed var(--border); border-radius: var(--radius); color: var(--muted);">
                    <i class="ph ph-package" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                    <p>Você ainda não fez nenhum pedido.</p>
                    <a href="produtos.html" class="btn btn-ghost" style="margin-top: 1rem; color: var(--primary);">Ir para o Cardápio</a>
                </div>
            `;
    } else {
      mockOrders.forEach((order) => {
        const statusClass =
          order.status === "delivered"
            ? "status-delivered"
            : "status-processing";
        const buttonText =
          order.status === "delivered"
            ? "Pedir Novamente"
            : "Acompanhar Entrega";
        const buttonAction =
          order.status === "delivered"
            ? `<button class="btn btn-primary" style="font-size: 0.85rem; padding: 0.4rem 1rem; float: right;">${buttonText}</button>`
            : `<button class="btn btn-ghost" style="font-size: 0.85rem; padding: 0.3rem 0;">${buttonText}</button>`;

        listaPedidos.innerHTML += `
                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <span style="font-weight: 700;">#Pedido ${
                                  order.id
                                }</span>
                                <span style="color: var(--muted); font-size: 0.85rem; display: block;">${
                                  order.date
                                }</span>
                            </div>
                            <span class="status-badge ${statusClass}">${
          order.status === "delivered" ? "Entregue" : "Em Preparo"
        }</span>
                        </div>
                        <div class="order-body">
                            <div class="order-items">
                                ${order.items
                                  .map((item) => `<span>${item}</span>`)
                                  .join("")}
                            </div>
                            <div class="order-total">Total: R$ ${
                              order.total
                            }</div>
                        </div>
                        <div style="padding-top: 1rem; margin-top: 1rem; border-top: 1px solid var(--border);">
                            <button class="btn btn-ghost" style="font-size: 0.85rem; padding: 0.3rem 0;">Ver Detalhes</button>
                            ${buttonAction}
                        </div>
                    </div>
                `;
      });
    }
  }

  function loadUserAddresses(userId) {
    const listaEnderecos = document.getElementById("lista-enderecos");
    if (!listaEnderecos) return;

    // 1. AQUI VOCÊ COLOCARÁ O CÓDIGO DO FIREBASE PARA BUSCAR ENDEREÇOS:
    // Exemplo: db.collection('users').doc(userId).collection('addresses').get().then((querySnapshot) => {
    //     listaEnderecos.innerHTML = ''; // Limpa antes de adicionar
    //     querySnapshot.forEach((doc) => {
    //         const address = doc.data();
    //         // ... monta o HTML do endereço e adiciona
    //     });
    //     // Adiciona o botão "Adicionar Novo" no final
    //     listaEnderecos.innerHTML += `...html do new-address-card...`;
    // });

    // DADOS MOCKADOS PARA EXEMPLO:
    const mockAddresses = [
      {
        id: "addr1",
        nickname: "Casa",
        street: "Rua das Flores",
        number: "123",
        complement: "Apto 45",
        neighborhood: "Jardins",
        city: "São Paulo",
        state: "SP",
        zip: "01234-567",
        isDefault: true,
      },
      {
        id: "addr2",
        nickname: "Trabalho",
        street: "Av. Paulista",
        number: "1000",
        complement: "Conj 150",
        neighborhood: "Bela Vista",
        city: "São Paulo",
        state: "SP",
        zip: "01310-100",
        isDefault: false,
      },
    ];

    // Sempre adiciona o botão de "Adicionar Novo" primeiro
    listaEnderecos.innerHTML = `
            <div class="address-card new-address" id="btn-add-endereco">
                <i class="ph ph-plus" style="font-size: 2rem; color: var(--muted); margin-bottom: 0.5rem;"></i>
                <span style="font-weight: 500; color: var(--muted);">Adicionar Novo</span>
            </div>
        `;

    mockAddresses.forEach((address) => {
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

    const btnAddEndereco = document.getElementById("btn-add-endereco");
    if (btnAddEndereco) {
      btnAddEndereco.addEventListener("click", () => {
        alert("Funcionalidade de adicionar novo endereço (Firebase)");
        // AQUI VOCÊ PODE ABRIR UM MODAL PARA ADICIONAR NOVO ENDEREÇO
      });
    }
  }
});

// registrando SERVICE WORKER
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/NURA/sw.js', { scope: '/NURA/' })
      .then(registration => {
        console.log('SW registrado com escopo:', registration.scope);
      })
      .catch(error => {
        console.error('Falha ao registrar SW:', error);
      });
  });
}

