<?php

class Experiencia {

    public $id_exper;
    public $id_usuario;
	public $titulo;
    public $nome;
    public $email;
    public $conteudo;
    public $imagem_post;
    public $referencia;
    public $Autor;
    public $data_publicacao;

    public function __construct($id_exper = false)
    {
        if ($id_exper) {
            $this->id_exper = $id_exper;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT titulo, nome, email, conteudo, imagem_post, referencia, Autor, data_publicacao, id_usuario FROM experiencia where id_exper = :id_exper";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id_exper", $this->id_exper);
        $stmt->execute();
        $lista = $stmt->fetch();
        $this->titulo = $lista['titulo'];
        $this->conteudo = $lista['nome'];
        $this->imagem_post = $lista['email'];
        $this->id_usuario = $lista['conteudo'];
        $this->data_publicacao = $lista['imagem_post'];
        $this->conteudo = $lista['referencia'];
        $this->imagem_post = $lista['Autor'];
        $this->id_usuario = $lista['data_publicacao'];
        $this->data_publicacao = $lista['id_usuario'];
    }

    public function criar()
    {
        $query = "INSERT INTO experiencia (titulo, nome, email, conteudo, imagem_post, referencia, Autor, data_publicacao, id_usuario) 
        VALUES (:titulo, :nome, :email, :conteudo, :imagem_post, :referencia, :Autor, :data_publicacao, :id_usuario )";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':titulo', $this->titulo);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':conteudo', $this->conteudo);
        $stmt->bindValue(':imagem_post', $this->imagem_post);
        $stmt->bindValue(':referencia', $this->contreferenciaeudo);
        $stmt->bindValue(':Autor', $this->Autor);
        $stmt->bindValue(':data_publicacao', $this->data_publicacao);
        $stmt->execute();
    }

    public static function listar()
    {
        $query = "SELECT * FROM experiencia";
        $conexao = conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

}
