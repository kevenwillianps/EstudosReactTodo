function TodoList({ todos = [], onTodoCompletedClick, onTodoDeletedClick, onTodoEditedClick }) {

    return (
        <div className="card mt-3 shadow-sm">
            <div className="card-body">
                {todos.map((todo) => (
                    <div key={todo.id} className="row g-2 mb-2">
                        <div className="col-sm-6 col-md">
                            <button className="btn btn-outline-primary w-100" onClick={() => onTodoCompletedClick(todo.id)}>
                                {todo.name} - {todo.completed}
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-outline-primary w-100" onClick={() => onTodoDeletedClick(todo.id)}>
                                Remover
                            </button>
                        </div>
                        <div className="col">
                            <button className="btn btn-outline-primary w-100" onClick={() => onTodoEditedClick(todo.id)}>
                                Editar
                            </button>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );

};

export default TodoList;