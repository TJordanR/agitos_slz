create database agitos_slz;

create table usuarios (
    id_usuario int not null auto_increment,
    nome_usuario varchar(200) not null,
    email varchar(200) not null,
    senha varchar(200) not null,
    primary key (id_usuario)
);

INSERT INTO usuarios (nome_usuario, email, senha) VALUES ('Admin', 'admin@mail.com', '$2y$10$dE0FnEqee2fdxfKhWddFpOt55BgTw5oj7OsAq0xfXXyLBV1HKVVAi');

create table imagens (
    id_imagem int not null auto_increment,
    imagem_inicio longblob not null,
    data_upload timestamp default current_timestamp,
    primary key (id_imagem)
);

create table postagens (
    id_post int not null auto_increment,
    titulo varchar(250) not null,
    conteudo longtext not null,
    imagem_post longblob,
    data_publicacao timestamp default current_timestamp on update current_timestamp,
    id_usuario int not null,
    primary key (id_post),
    foreign key (id_usuario) references usuarios(id_usuario)
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
    local_evento varchar(500) not null,
    hora time not null,
    data_evento date not null,
    descricao_evento longtext,
    primary key(id_evento)
);

/* cria a tabela conteudo para postagens*/
CREATE TABLE experiencia (
    id_exper INT NOT NULL AUTO_INCREMENT,
    id_usuario int not null,
	titulo varchar(250) not null,
    nome VARCHAR(60) NOT NULL,
    email VARCHAR(50) NOT NULL,
    conteudo TEXT NOT NULL,
    imagem_post LONGBLOB NOT NULL,
    referencia TEXT NOT NULL,
    Autor VARCHAR(30) NOT NULL,
    data_publicacao timestamp default current_timestamp on update current_timestamp,
  	primary key (id_exper),
    foreign key (id_usuario) references usuarios(id_usuario)
);