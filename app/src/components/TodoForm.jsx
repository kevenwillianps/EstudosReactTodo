import { useState } from "react";

function TodoForm({ onTodoCreatedClick }) {

    const [title, setTitle] = useState('');

    return (
        <div className="card shadow-sm">
            <div className="card-body">
                <div className="row g-3">
                    <div className="col-md-12">
                        <div className="form-group">
                            <input
                                type="text"
                                placeholder="Nome da Tarefa"
                                className="form-control"
                                value={title}
                                onChange={(event) => setTitle(event.target.value)} />
                        </div>
                    </div>
                    <div className="col-md-">
                        <div className="form-group">
                            <button className="btn btn-primary" onClick={() => { onTodoCreatedClick(title) }}>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );

}

export default TodoForm;