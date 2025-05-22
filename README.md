
# 🛍️ Zezinho Kids

Loja virtual de roupas infantis desenvolvida em PHP e MySQL, como projeto de estudo, prática e portfólio.

![GitHub repo size](https://img.shields.io/github/repo-size/elaineccordeiro1/zezinhokids)
![GitHub language count](https://img.shields.io/github/languages/count/elaineccordeiro1/zezinhokids)
![GitHub top language](https://img.shields.io/github/languages/top/elaineccordeiro1/zezinhokids)
![GitHub license](https://img.shields.io/github/license/elaineccordeiro1/zezinhokids)

---

## 🚀 Funcionalidades
- 🏷️ Listagem de produtos
- 🛒 Adicionar e gerenciar produtos no carrinho
- 🧾 Finalizar pedido com armazenamento no banco
- 🔍 Consulta dos pedidos (admin)
- 🔐 Área administrativa protegida

---

## 🎯 Tecnologias Utilizadas
- **Frontend:** HTML5 + CSS3
- **Backend:** PHP
- **Banco de Dados:** MySQL
- **Ambiente:** XAMPP, WampServer, Vertrigo ou outro servidor local
- **Versionamento:** Git + GitHub

---

## 🗄️ Banco de Dados
O projeto possui o script SQL para criação do banco:

📄 Arquivo: `banco_loja_corrigido_final.sql`

### Tabelas:
- `produtos` → Cadastro dos produtos
- `usuarios` → Controle de administradores
- `pedidos` → Dados dos pedidos
- `pedido_itens` → Itens de cada pedido

---

## 🏗️ Estrutura de Pastas

```
zezinhokids/
│
├── admin/                      → Área administrativa
│   ├── consultar_pedidos.php   → Consulta de pedidos
│   ├── criar_admin.php         → Criação de usuário admin
│   └── README.md               → Descrição da pasta admin
│
├── css/                        → Arquivos de estilos
│   ├── estilo.css              → Arquivo principal de estilos
│   └── README.md               → Descrição da pasta css
│
├── imagens/                    → Imagens do projeto
│   ├── body_azul.jpg           → Imagem de produto exemplo
│   ├── vestido_floral.jpg      → Imagem de produto exemplo
│   ├── macacao_bege.jpg        → Imagem de produto exemplo
│   ├── logo.png                → Logotipo
│   └── README.md               → Descrição da pasta imagens
│
├── banco_loja_corrigido_final.sql → Script SQL do banco de dados
│
├── cabecalho.php               → Cabeçalho das páginas
├── cadastro.php                → Cadastro de produtos (opcional)
├── carrinho.php                → Página do carrinho de compras
├── conexao.php                 → Conexão com banco de dados
├── consultar_pedidos.php       → Consulta de pedidos
├── detalhes.php                → Página de detalhes dos produtos
├── index.php                   → Página inicial do site
├── produtos.php                → Listagem de produtos
├── salvar_pedido.php           → Processamento de salvamento dos pedidos
└── README.md                   → Descrição geral do projeto
```

---

## 💻 Como Executar Localmente

1. Clone este repositório ou baixe como ZIP.
2. Coloque a pasta dentro do diretório do seu servidor local (`htdocs` no XAMPP, `www` no Wamp).
3. No **phpMyAdmin**, crie um banco de dados chamado `zezinhokids`.
4. Importe o arquivo `banco_loja_corrigido_final.sql` que está na raiz do projeto.
5. Acesse no navegador:  
👉 `http://localhost/zezinhokids/`

---

## 🚩 Melhorias Futuras
- 🔑 Login para clientes
- 📦 CRUD de produtos pela área admin
- 💳 Integração com meios de pagamento
- 📱 Design responsivo para dispositivos móveis
- ☁️ Publicação online do projeto

---

## 🤝 Contribuição
Sinta-se à vontade para abrir issues, sugerir melhorias ou enviar pull requests! 😄

---

## 📜 Licença
Este projeto está sob a licença MIT. Consulte o arquivo LICENSE para mais detalhes.

---

## 👩‍💻 Desenvolvido por:
- [Elaine Cristina Cordeiro](https://github.com/elaineccordeiro1)
