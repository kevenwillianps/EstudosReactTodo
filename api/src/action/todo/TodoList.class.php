<?php

// Define o local da classe
namespace src\action\todo;

// Importação de classes
use src\model\Todo;

class TodoList
{

    public static function execute()
    {

        // Instânciamento de classes
        $Todo = new Todo();

        // Busco todos os registros
        return $Todo->All();
    }
}
