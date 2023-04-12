<?php

namespace Caio\Pagination;

use PDO;

use PDOException;

/**
 * ARQUIVO DE CONEXÃO AO BANCO DE DADOS
 */

// Classe com informações do banco de dados
class Database
{
    private $db;

    // Função de conexão ao banco de dados
    private function conn()
    {
        // Checa se a conexão já não foi feita
        if (!isset(self::$db)) {
            // Estabelece conexão utilizando PDO
            try {
                self::$db = new PDO("msql:host=" . DB_HOST
                    . ", dbname=" . DB_NAME, DB_USER, DB_PASS);

                self::$db->exec("set names utf8");
                self::$db->exec("SET character_set_connection=utf8");
                self::$db->exec("SET character_set_client=utf8");
                self::$db->exec("SET character_set_results=utf8");
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                /**
                 * Gerencia o erro e só mostra qual erro é se o projeto estiver 
                 * local
                 */
            } catch (PDOException $e) {
                echo " Algo deu errado ao estabelecer a conexão com o banco de dados. \n
                Contate um administrador caso esse erro seja recorrente.\n
                {$e}";
                exit;
            }

            echo " Conexão bem-sucessida. Procedendo. \n";
            return self::$db;
        }
    }

    function insert(string $table, array $values)
    {
        $columnsAsString = $this->array_into_values($values, true);
        $valuesAsString  = $this->array_into_values($values);

        $db     = self::conn();
        $insert = $db->prepare(
            "INSERT INTO {$table} ({$columnsAsString}) VALUES ({$valuesAsString});"
        );

        for ($i = 1; $i <= count($values); $i++) {
            $insert->bindValue($i, $values[$i - 1]);
        }

        return $insert->execute();
    }

    public function array_into_values(array $array, bool $getKeys = false)
    {
        foreach ($array as $column => $value) {
            $values[]  = '?';
            $columns[] = $column;
        }

        if ($getKeys) {
            return implode(', ', $columns);
        }

        return implode(', ', $values);
    }

}

// EOF
