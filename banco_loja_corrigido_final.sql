-- Cria��o do banco de dados
CREATE DATABASE IF NOT EXISTS zezinhokids;
USE zezinhokids;

-- Tabela de produtos
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    categoria VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de usu�rios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('cliente','admin') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pendente','Pago','Enviado','Cancelado') DEFAULT 'Pendente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de itens dos pedidos
CREATE TABLE IF NOT EXISTS pedido_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inser��o dos produtos
INSERT INTO produtos (nome, descricao, preco, imagem, categoria) VALUES
('Body Estampado Azul', 'Body confort�vel 100% algod�o para meninos.', 39.90, 'body_azul.jpg', 'Menino'),
('Vestido Floral', 'Vestido leve com estampa floral para meninas.', 59.90, 'vestido_floral.jpg', 'Menina'),
('Macac�o Unissex Bege', 'Macac�o unissex em algod�o, ideal para qualquer ocasi�o.', 49.90, 'macacao_bege.jpg', 'Neutro'),
('Body Azul', 'Body azul confort�vel para beb�s.', 59.90, 'body_azul.jpg', 'Roupas'),
('Vestido Floral', 'Vestido leve com estampa floral para meninas.', 69.90, 'vestido_floral.jpg', 'Roupas'),
('Macac�o Bege', 'Macac�o unissex em algod�o, cor bege.', 74.90, 'macacao_bege.jpg', 'Roupas'),
('Conjunto Safari', 'Conjunto camiseta e bermuda com tema safari.', 89.90, 'conjunto_safari.jpg', 'Conjuntos'),
('Body Estampa Ursinho', 'Body com estampa de ursinhos, super fofo.', 64.90, 'body_ursinho.jpg', 'Roupas'),
('Macac�o Jeans', 'Macac�o jeans fashion para beb�s estilosos.', 84.90, 'macacao_jeans.jpg', 'Roupas'),
('Vestido Po� Rosa', 'Vestido com estampa po� rosa para meninas.', 72.90, 'vestido_poa_rosa.jpg', 'Roupas'),
('Body Verde Menta', 'Body verde menta em algod�o macio.', 58.90, 'body_verde_menta.jpg', 'Roupas');

-- Inser��o do usu�rio administrador (senha: admin123)
INSERT INTO usuarios (nome, email, senha, tipo) VALUES
('Admin', 'admin@zezinhokids.com', '$2y$10$hgGct.1J3y6JopNUoGqfMOjG0EWFRb9WKAC.Rlsp7taGioCgZP/x2', 'admin');