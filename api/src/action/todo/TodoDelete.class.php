<?php

//Define o local do arquivo
namespace src\action\todo;

// Importação de classes
use src\model\Todo;
use src\controller\todo\TodoValidate;
use src\controller\routers\Router;

class TodoDelete
{

    public static function execute(Router $request)
    {

        // Instâncimento de classes
        $Todo = new Todo();
        $TodoValidate = new TodoValidate();

        // Validação do campos de entrada
        $TodoValidate->setId((int) $request->input('id'));

        // Verifico a existência de erros
        if (count($TodoValidate->getErrors()) > 0) {

            // Mensagem de erro
            throw new \Exception(json_encode($TodoValidate->getErrors()));
        } else {

            // Efetua um novo cadastro ou atualiza o existente
            if ($Todo->delete($TodoValidate)) {

                // Result
                $result = [

                    'data' => 'Registro removido com sucesso!',

                ];
            } else {

                // Retorno da mensagem de erro
                throw new \InvalidArgumentException('Não foi possivel salvar o registro', 0);
            }
        }

        return $result;
    }
}
