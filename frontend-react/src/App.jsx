import React, { useEffect, useState } from 'react';

function App() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    fetch('/api/index.php')  // O Vite irá redirecionar para a API PHP
      .then(response => response.text())
      .then(data => {
        const userArray = data.split('<br>').map(user => {
          const [id, name, email] = user.split(' - ').map(item => item.split(': ')[1]);
          return { id, name, email };
        }).filter(user => user.id);  // Remover entradas vazias
        setUsers(userArray);
      });
  }, []);

  return (
    <div>
      <h1>Lista de Usuários</h1>
      <ul>
        {users.map(user => (
          <li key={user.id}>
            {user.name} - {user.email}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default App;
