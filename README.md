# 📝 EstudosReactTodo

Projeto de lista de tarefas (Todo List) desenvolvido com React, para fins de aprendizado e prática.

## 🚀 Tecnologias utilizadas

- React
- Vite
- Axios
- Bootstrap (ou Tailwind, dependendo da versão)
- API backend em PHP (via `router.php`)

---

## 📦 Como clonar e rodar o projeto localmente

### 1. Clone o repositório

```bash
git clone https://github.com/kevenwillianps/EstudosReactTodo.git
````

### 2. Acesse a pasta do projeto

```bash
cd EstudosReactTodo
```

### 3. Instale as dependências

Certifique-se de ter o **Node.js** instalado (versão 16 ou superior recomendada).

```bash
npm install
```

### 4. Inicie o servidor de desenvolvimento

```bash
npm run dev
```

Isso iniciará o projeto em modo de desenvolvimento. O Vite normalmente irá rodar na porta `5173`. Acesse:

```
http://localhost:5173
```

---

## ⚙️ Backend (API)

Este projeto consome uma API PHP localizada em:

```
http://localhost/todo/api/router.php
```

### ✅ Verifique:

* Se o backend está rodando corretamente no seu ambiente local.
* Se você tem um servidor Apache/Nginx com suporte a PHP instalado (como XAMPP, Laragon, Wamp, etc).
* Que o endpoint `router.php` esteja acessível e com as rotas:

  * `action/todo/TodoList`
  * `action/todo/TodoDelete`
  * (e outros conforme o código)

---

## 📁 Estrutura do projeto

```bash
src/
├── components/
│   ├── TodoForm.jsx
│   └── TodoList.jsx
├── App.jsx
└── main.jsx
```

---

## 🙋‍♂️ Contribuindo

Sinta-se à vontade para abrir issues, sugerir melhorias ou contribuir com o projeto.

---

## 📜 Licença

Este projeto é apenas para fins educacionais e não possui uma licença formal definida.