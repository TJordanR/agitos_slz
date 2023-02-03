create database agitos_slz;

create table usuario (
    id_usuario int not null auto_increment,
    nome varchar(200) not null,
    email varchar(200) not null,
    senha varchar(200) not null,
    primary key (id_usuario)
);

create table imagem (
    id_img int not null auto_increment,
    img_inicio longblob not null,
    primary key (id_img)
);

create table postagem (
    id_post int not null auto_increment,
    titulo varchar(250) not null,
    conteudo longtext not null,
    imagem_post longblob,
    data_publicacao timestamp default current_timestamp on update current_timestamp,
    id_usuario int not null,
    primary key (id_post),
    foreign key (id_usuario) references usuario(id_usuario)
);

create table locais (
    id_local int not null auto_increment,
    nome varchar(250) not null,
    endereco varchar(250) not null,
    categoria enum('fazer', 'ficar', 'comer') not null default 'fazer',
    tipo enum('praia', 'museu', 'praca', 'parque', 'centro historico', 'igreja', 'artesanato', 'hotel', 'pousada', 'hostel', 'restaurante', 'bar', 'cafe') not null default 'centro historico',
    primary key (id_local)
);

create table eventos (
    id_evento int not null auto_increment,
    nome_evento varchar(250) not null,
    imagem_evento longblob,
    hora time not null,
    data_evento date not null,
    descricao_evento longtext,
    primary key(id_evento)
);