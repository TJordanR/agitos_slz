<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/agitos_slz/models/experiencias.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/agitos_slz/bd/conexao.php';
session_start();


try {
    $experiencia = new Experiencia();

    $titulo = htmlspecialchars($_POST['titulo']);
    $conteudo = htmlspecialchars($_POST['conteudo']);
    $id_autor = $_SESSION['usuario']['id_usuario'];
    if (!empty($_FILES['imagem_post']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['imagem_post']['tmp_name']);
    }

    $experiencia->titulo = $titulo;
    $experiencia->conteudo = $conteudo;
    $experiencia->imagem_post = $imagem;
    $experiencia->id_usuario  = $id_autor;

    $experiencia->criar();

    header('Location: /agitos_slz/views/admin/adicionar_postagem_experiencias.php');
} catch (Exception $e) {
    echo $e->getMessage();
}
