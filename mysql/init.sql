CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL
);

INSERT INTO usuarios (nome, email) VALUES
('João', 'joao@example.com'),
('Maria', 'maria@example.com');