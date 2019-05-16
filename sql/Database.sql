drop table repete;
drop table exercice;
drop table programme;
drop table possede;
drop table seance;
drop table premium;
drop table coach;
drop table donner;
drop table programmer;
drop table utilisateur;
drop table creer;

ALTER DATABASE sportify CHARACTER SET utf8 COLLATE utf8_general_ci;

create table repete(
    id_repete int not null,
    poid_rep int(2) null,
    nb_rep int(1) null,
    duree time null,
    primary key (id_repete)
);

create table exercice(
    id_exercice int not null,
    nom_ex varchar(50) not null,
    images_ex varchar(1000) DEFAULT '0.png' not null,
    machine varchar(50) null,
    id_repete int not null,
    primary key (id_exercice),
    FOREIGN KEY (id_repete) REFERENCES repete(id_repete)
);

create table programme(
    id_programme int not null,
    nom_pro varchar(50) not null,
    images_pro varchar(1000) DEFAULT '0.png' not null,
    descriptions varchar(200) null,
    niveau varchar(20) null,
    objectif varchar(200) null,
    primary key (id_programme)
);

create table possede(
    id_exercice int not null,
    id_programme int not null,
    nb_serie int(1) not null,
    primary key (id_programme,id_exercice),
    FOREIGN KEY (id_exercice) REFERENCES exercice(id_exercice),
    FOREIGN KEY (id_programme) REFERENCES programme(id_programme)
);

create table seance(
    id_seance int not null,
    dates date not null,
    id_programme int not null,
    seance int DEFAULT 0 not null,
    primary key (id_seance),
    FOREIGN KEY (id_programme) REFERENCES programme(id_programme)
);

create table premium(
    id_premium int not null,
    date_abo_debut date not null,
    date_abo_fin date not null,
    primary key (id_premium)
);

create table coach(
    id_coach int AUTO_INCREMENT not null,
    nom_c varchar(30) not null,
    prenom_c varchar(30) not null,
    mdp_c varchar(100) not null,
    age_c int(2) not null,
    description_c varchar(250) null,
    adresse_c varchar(100) null,
    ville_c varchar(100) null,
    code_postal_c varchar(5) null ,
    mail_c varchar(100) UNIQUE not null,
    telephone_c varchar(100) not null,
    specialite varchar(70) not null,
    images_c varchar(1000) DEFAULT '0.png' null,
    primary key (id_coach)
);

create table programmer(
    id_premium int not null,
    id_coach int not null,
    id_seance int not null,
    primary key (id_premium,id_coach,id_seance),
    FOREIGN KEY (id_premium) REFERENCES premium(id_premium),
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach),
    FOREIGN KEY (id_seance) REFERENCES seance(id_seance)
);

create table donner(
    id_premium int not null,
    id_coach int not null,
    note int(1) not null,
    primary key (id_premium,id_coach),
    FOREIGN KEY (id_premium) REFERENCES premium(id_premium),
    FOREIGN KEY (id_coach) REFERENCES coach(id_coach)
);

create table utilisateur (
    id_utilisateur int AUTO_INCREMENT not null,
    nom_u varchar(30) not null,
    prenom_u varchar(30) not null,
    mdp_u varchar(100) not null,
    age_u int(2) not null,
    description_u varchar(250) null,
    adresse_u varchar(100) null,
    ville_u varchar(100) null,
    code_postal_u varchar(5) null,
    mail_u varchar(100) UNIQUE not null,
    telephone_u varchar(100) not null,
    poid_u int(2) not null,
    taille int(2) not null,
    images_u varchar(1000) DEFAULT '0.png',
    id_premium int null,
    primary key (id_utilisateur),
    FOREIGN KEY (id_premium) REFERENCES premium(id_premium)
);


create table creer(
    id_utilisateur int not null,
    id_seance int not null,
    primary key (id_utilisateur,id_seance),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_seance) REFERENCES seanceid_seance(id_seance)
);

insert into repete values (1,null,12,null);
insert into repete values (2,null,15,null);
insert into repete values (3,null,20,null);
insert into repete values (4,null,null,300);
insert into repete values (5,null,null,600);
insert into repete values (6,null,null,900);
insert into repete values (7,null,null,20);
insert into repete values (8,null,null,'00:01:00');
insert into repete values (9,null,null,'00:02:00');

insert into exercice values (1,'velo fixe peu intensif','0.png','velo',4);
insert into exercice values (2,'velo fixe peu intensif','0.png','velo',5);
insert into exercice values (3,'velo fixe peu intensif','0.png','velo',6);
insert into exercice values (4,'developper assis','0.png','presse à pectoraux',1);
insert into exercice values (5,'developper assis','0.png','presse à pectoraux',2);
insert into exercice values (6,'developper assis','0.png','presse à pectoraux',3);
insert into exercice values (7,'rameur horizontale','0.png','rameur',1);
insert into exercice values (8,'rameur horizontale','0.png','rameur',2);
insert into exercice values (9,'rameur horizontale','0.png','rameur',3);
insert into exercice values (10,'banc crunch','0.png','banc',1);
insert into exercice values (11,'banc crunch','0.png','banc',2);
insert into exercice values (12,'banc crunch','0.png','banc',3);
insert into exercice values (13,'extension jambe assis','0.png','leg extension',1);
insert into exercice values (14,'extension jambe assis','0.png','leg extension',2);
insert into exercice values (15,'extension jambe assis','0.png','leg extension',3);
insert into exercice values (16,'straight arm pull down pulley','0.png','poulli',1);
insert into exercice values (17,'straight arm pull down pulley','0.png','poulli',2);
insert into exercice values (18,'straight arm pull down pulley','0.png','poulli',3);
insert into exercice values (19,'squat','0.png',null,1);
insert into exercice values (20,'squat','0.png',null,2);
insert into exercice values (21,'squat','0.png',null,3);
insert into exercice values (2,'pompe genoux','0.png',null,1);
insert into exercice values (2,'pompe genoux','0.png',null,2);
insert into exercice values (2,'pompe genoux','0.png',null,3);

