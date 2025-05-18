<?php

//Define o local do arquivo
namespace src\action\todo;

// Importação de classes
use src\model\Todo;
use src\controller\todo\TodoValidate;
use src\controller\routers\Router;

class TodoSave
{

    public static function execute(Router $request)
    {

        // Instâncimento de classes
        $Todo = new Todo();
        $TodoValidate = new TodoValidate();

        // Validação do campos de entrada
        $TodoValidate->setId((int) $request->input('id'));
        $TodoValidate->setName($request->input('name'));

        // Verifico a existência de erros
        if (count($TodoValidate->getErrors()) > 0) {

            // Mensagem de erro
            throw new \Exception(json_encode($TodoValidate->getErrors()));
        } else {

            // Efetua um novo cadastro ou atualiza o existente
            if ($Todo->save($TodoValidate)) {

                // Result
                $result = [

                    'data' => 'Registro salvo com sucesso!',

                ];
            } else {

                // Retorno da mensagem de erro
                throw new \InvalidArgumentException('Não foi possivel salvar o registro', 0);
            }
        }

        return $result;
    }
}
