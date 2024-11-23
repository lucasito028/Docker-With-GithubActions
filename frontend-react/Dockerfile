# Usar a imagem oficial do Node.js
FROM node:18

# Definir o diretório de trabalho no container
WORKDIR /app

# Copiar os arquivos de configuração de dependências
COPY package*.json ./

# Instalar as dependências
RUN npm install

# Copiar o restante dos arquivos da aplicação
COPY . .

# Expor a porta 5173 (porta padrão do Vite)
EXPOSE 5173

# Rodar o Vite para desenvolvimento
CMD ["npm", "run", "dev"]
