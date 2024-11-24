const express = require('express');
const { Sequelize, DataTypes } = require('sequelize');

const app = express();
app.use(express.json());

const sequelize = new Sequelize('teste_db', 'usuario', 'senha', {
  host: 'mysql',
  dialect: 'mysql'
});

const Usuario = sequelize.define('Usuario', {
  nome: {
    type: DataTypes.STRING,
    allowNull: false
  },
  email: {
    type: DataTypes.STRING,
    allowNull: false
  }
});

app.get('/usuarios', async (req, res) => {
  const usuarios = await Usuario.findAll();
  res.json(usuarios);
});

app.post('/usuarios', async (req, res) => {
  const usuario = await Usuario.create(req.body);
  res.json(usuario);
});

app.put('/usuarios/:id', async (req, res) => {
  const usuario = await Usuario.update(req.body, {
    where: { id: req.params.id }
  });
  res.json(usuario);
});

app.delete('/usuarios/:id', async (req, res) => {
  await Usuario.destroy({ where: { id: req.params.id } });
  res.sendStatus(204);
});

app.listen(3000, async () => {
  await sequelize.sync();
  console.log('API rodando na porta 3000');
});
