# 📂 Pasta /admin

Esta pasta contém os arquivos responsáveis pela **área administrativa** do projeto **Zezinho Kids**.

## 👩‍💻 Funcionalidades da área admin:
- 🔐 Gerenciamento de usuários (admin)
- 🛒 Visualização dos pedidos realizados
- 🏷️ Gerenciamento de produtos (opcional, se tiver essa função implementada)
- 🗂️ Acesso restrito, protegido por login

## 📄 Arquivos típicos na pasta:
- `consultar_pedidos.php` → Tela para consultar os pedidos
- `criar_admin.php` → Script para criar usuários administradores
- Outros arquivos que sejam específicos da administração do sistema

## 🚩 Observações:
- Apenas usuários autorizados (admins) podem acessar essa pasta.
- Recomenda-se implementar verificação de login para proteção dos dados sensíveis.

## 🔒 Segurança:
- Adicionar validação de sessão (`$_SESSION`) em todas as páginas admin.
- Bloquear acesso não autorizado com redirecionamento para a página de login.

---
