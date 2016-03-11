<?php
namespace App;

use App\Conexao;

class User
{
    private $db;
    private $tabela  = 'user';
    public $colunas = 'id,empresa_id,codigo,nome,senha,email,ativo,nivel';
    private $empresa_id;
    private $codigo;
    private $nome;
    private $senha;
    private $email;
    private $ativo;
    private $nivel;


    public function __construct(Conexao $conexao)
    {
        $this->db = $conexao;
    }

    public function save()
    {
        $sql  = "INSERT INTO {$this->tabela}({$this->colunas}) VALUES(?,?,?,?,?,?,?,?)";
        //$stmt = parent::getConexao()->prepare($sql);
        $stmt = $this->db->getConexao()->prepare($sql);
        $stmt->bindValue(1,null,              PDO::PARAM_INT);
        $stmt->bindValue(2,$this->empresa_id, PDO::PARAM_INT);
        $stmt->bindValue(3,$this->codigo,     PDO::PARAM_INT);
        $stmt->bindValue(4,$this->nome,       PDO::PARAM_STR);
        $stmt->bindValue(5,$this->senha,      PDO::PARAM_STR);
        $stmt->bindValue(6,$this->email,      PDO::PARAM_STR);
        $stmt->bindValue(7,$this->ativo,      PDO::PARAM_BOOL);
        $stmt->bindValue(8,$this->nivel,      PDO::PARAM_INT);
        $stmt->execute();
    }
}