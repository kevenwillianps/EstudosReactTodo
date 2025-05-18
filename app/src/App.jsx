import { useEffect, useState } from 'react';
import TodoForm from './components/TodoForm'
import TodoList from './components/TodoList'
import axios from 'axios';

function App() {

  const [todos, setTodos] = useState([]);

  function onTodoCompletedClick(todoId) {
    console.log('onTodoCompletedClick', todoId);
  }

  function onTodoDeletedClick(todoId) {
    const deleteTodo = async () => {
      const response = await axios.post(`http://localhost/todo/api/router.php`, {
        path: 'action/todo/TodoDelete',
        id: todoId
      });
      const newTodo = todos.filter(task => task.id !== todoId);
      setTodos(newTodo)
    }
    deleteTodo();
  }

  function onTodoEditedClick(todoId) {
    console.log('onTodoEditedClick', todoId);
  }

  function onTodoCreatedClick(title) {
    const saveTodo = async () => {
      const response = await axios.post(`http://localhost/todo/api/router.php`, {
        path: 'action/todo/TodoSave',
        name: title
      });
      const newTodo = {
        id: todos.length + 1,
        name: title,
        completed: false
      };
      setTodos([...todos, newTodo]);
    }
    saveTodo();
  }

  useEffect(() => {
    const fetchTodos = async () => {
      try {
        const response = await axios.post(`http://localhost/todo/api/router.php`, {
          path: 'action/todo/TodoList'
        });
        const data = response.data.data || []; // fallback para array vazio
        setTodos(data);
      } catch (error) {
        console.error('Erro ao buscar todos:', error);
        setTodos([]); // segurança para evitar o erro do .map
      }
    }
    fetchTodos();
  }, []);

  return (
    <div className='container my-5'>
      <div className='row'>
        <div className='col-md-4 mx-auto'>
          <TodoForm
            onTodoCreatedClick={onTodoCreatedClick} />
          <TodoList
            todos={todos}
            onTodoCompletedClick={onTodoCompletedClick}
            onTodoDeletedClick={onTodoDeletedClick}
            onTodoEditedClick={onTodoEditedClick} />
        </div>
      </div>
    </div>
  )
}

export default App
