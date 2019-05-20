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
drop table imc;

ALTER DATABASE sportify CHARACTER SET utf8 COLLATE utf8_general_ci;

create table repete(
    id_repete int AUTO_INCREMENT not null,
    poid_rep int(2) null,
    nb_rep int(1) null,
    duree time null,
    primary key (id_repete)
);

create table exercice(
    id_exercice int AUTO_INCREMENT not null,
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
    niveau int null,
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
    id_seance int AUTO_INCREMENT not null,
    dates date not null,
    id_programme int not null,
    validation_s int DEFAULT 0 not null,
    poid_s int null,

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

create table imc(
    id_imc int AUTO_INCREMENT not null,
    imc int not null,
    date_imc date not null,
    id_utilisateur int not null,
    primary key (id_imc),
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
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
insert into exercice values (19,'squat','0.png','machine smitch',1);
insert into exercice values (20,'squat','0.png','machine smitch',2);
insert into exercice values (21,'squat','0.png','machine smitch',3);
insert into exercice values (22,'pompe genoux','0.png',null,1);
insert into exercice values (23,'pompe genoux','0.png',null,2);
insert into exercice values (24,'pompe genoux','0.png',null,3);
insert into exercice values (25,'fente avant alterne medicine ball','0.png','haltere',1);
insert into exercice values (26,'fente avant alterne medicine ball','0.png','haltere',2);
insert into exercice values (27,'fente avant alterne medicine ball','0.png','haltere',3);
insert into exercice values (28,'planche','0.png',null,7);
insert into exercice values (29,'planche','0.png',null,8);
insert into exercice values (30,'planche','0.png',null,9);
insert into exercice values (31,'crunch','0.png',null,7);
insert into exercice values (32,'crunch','0.png',null,8);
insert into exercice values (33,'crunch','0.png',null,9);
insert into exercice values (34,'velo eliptique','0.png','velo',4);
insert into exercice values (35,'velo eliptique','0.png','velo',5);
insert into exercice values (36,'velo eliptique','0.png','velo',6);
insert into exercice values (37,'tapis de course','0.png','tapis de course',4);
insert into exercice values (38,'tapis de course','0.png','tapis de course',5);
insert into exercice values (39,'tapis de course','0.png','tapis de course',6);
insert into exercice values (40,'rowing dorsal','0.png','rowing machine',1);
insert into exercice values (41,'rowing dorsal','0.png','rowing machine',2);
insert into exercice values (42,'rowing dorsal','0.png','rowing machine',3);
insert into exercice values (43,'squat jambes ecartées','0.png',null,1);
insert into exercice values (44,'squat jambes ecartées','0.png',null,2);
insert into exercice values (45,'squat jambes ecartées','0.png',null,3);
insert into exercice values (46,'developper coucher','0.png','developper coucher',1);
insert into exercice values (47,'developper coucher','0.png','developper coucher',2);
insert into exercice values (48,'developper coucher','0.png','developper coucher',3);
insert into exercice values (49,'sit up','0.png',null,1);
insert into exercice values (50,'sit up','0.png',null,2);
insert into exercice values (51,'sit up','0.png',null,3);
insert into exercice values (52,'fente inverse, alterne haltere','0.png','haltere',1);
insert into exercice values (53,'fente inverse, alterne haltere','0.png','haltere',2);
insert into exercice values (54,'fente inverse, alterne haltere','0.png','haltere',3);
insert into exercice values (55,'developper epaule haltere','0.png','haltere',1);
insert into exercice values (56,'developper epaule haltere','0.png','haltere',2);
insert into exercice values (57,'developper epaule haltere','0.png','haltere',3);
insert into exercice values (58,'handwalk','0.png',null,7);
insert into exercice values (59,'handwalk','0.png',null,8);
insert into exercice values (60,'handwalk','0.png',null,9);
insert into exercice values (61,'machine pour adducteur','0.png','machine pour adducteur',1);
insert into exercice values (62,'machine pour adducteur','0.png','machine pour adducteur',2);
insert into exercice values (63,'machine pour adducteur','0.png','machine pour adducteur',3);
insert into exercice values (64,'presse a cuisse assise','0.png','presse',1);
insert into exercice values (65,'presse a cuisse assise','0.png','presse',2);
insert into exercice values (66,'presse a cuisse assise','0.png','presse',3);
insert into exercice values (67,'traction vers le bas triceps','0.png','poulie',1);
insert into exercice values (68,'traction vers le bas triceps','0.png','poulie',2);
insert into exercice values (69,'traction vers le bas triceps','0.png','poulie',3);
insert into exercice values (70,'pec deck','0.png','pec deck',1);
insert into exercice values (71,'pec deck','0.png','pec deck',2);
insert into exercice values (72,'pec deck','0.png','pec deck',3);
insert into exercice values (73,'souleve de terre','0.png','kettlebell',1);
insert into exercice values (74,'souleve de terre','0.png','kettlebell',2);
insert into exercice values (75,'souleve de terre','0.png','kettlebell',3);
insert into exercice values (76,'flexion des biceps','0.png','poulli',1);
insert into exercice values (77,'flexion des biceps','0.png','poulli',2);
insert into exercice values (78,'flexion des biceps','0.png','poulli',3);
insert into exercice values (79,'releve lateral debout','0.png','haltere',1);
insert into exercice values (80,'releve lateral debout','0.png','haltere',2);
insert into exercice values (81,'releve lateral debout','0.png','haltere',3);

insert into programme values (1,'performance','0.png',null,1,'gagner en performance');
insert into programme values (2,'performance','0.png',null,2,'gagner en performance');
insert into programme values (3,'performance','0.png',null,3,'gagner en performance');
insert into programme values (4,'se tonifier','0.png',null,1,'gagner en tonification');
insert into programme values (5,'se tonifier','0.png',null,2,'gagner en tonification');
insert into programme values (6,'se tonifier','0.png',null,3,'gagner en tonification');
insert into programme values (7,'prise de masse','0.png',null,1,'prendre en masse');
insert into programme values (8,'prise de masse','0.png',null,2,'prendre en masse');
insert into programme values (9,'prise de masse','0.png',null,3,'prendre en masse');
insert into programme values (10,'perte de poid','0.png',null,1,'perdre du poid');
insert into programme values (11,'perte de poid','0.png',null,2,'perdre du poid');
insert into programme values (12,'perte de poid','0.png',null,3,'perdre du poid');
insert into programme values (13,'remise en forme','0.png',null,1,'se remettre en forme');
insert into programme values (14,'remise en forme','0.png',null,2,'se remettre en forme');
insert into programme values (15,'remise en forme','0.png',null,3,'se remettre en forme');

ALTER table programme modify id_programme int AUTO_INCREMENT;

insert into possede values (37,1,3);
insert into possede values (40,1,3);
insert into possede values (43,1,3);
insert into possede values (46,1,3);
insert into possede values (49,1,3);
insert into possede values (52,1,3);
insert into possede values (40,1,3);
insert into possede values (28,1,3);
insert into possede values (55,1,3);
insert into possede values (58,1,3);

insert into possede values (38,2,4);
insert into possede values (41,2,4);
insert into possede values (44,2,4);
insert into possede values (47,2,4);
insert into possede values (50,2,4);
insert into possede values (53,2,4);
insert into possede values (41,2,4);
insert into possede values (29,2,4);
insert into possede values (56,2,4);
insert into possede values (59,2,4);

insert into possede values (39,3,5);
insert into possede values (42,3,5);
insert into possede values (45,3,5);
insert into possede values (48,3,5);
insert into possede values (51,3,5);
insert into possede values (54,3,5);
insert into possede values (42,3,5);
insert into possede values (30,3,5);
insert into possede values (57,3,5);
insert into possede values (60,3,5);

insert into possede values (37,4,3);
insert into possede values (61,4,3);
insert into possede values (64,4,3);
insert into possede values (10,4,3);
insert into possede values (67,4,3);
insert into possede values (4,4,3);
insert into possede values (40,4,3);
insert into possede values (61,4,3);
insert into possede values (28,4,3);
insert into possede values (43,4,3);

insert into possede values (38,5,4);
insert into possede values (62,5,4);
insert into possede values (65,5,4);
insert into possede values (11,5,4);
insert into possede values (68,5,4);
insert into possede values (5,5,4);
insert into possede values (41,5,4);
insert into possede values (62,5,4);
insert into possede values (29,5,4);
insert into possede values (44,5,4);

insert into possede values (39,6,5);
insert into possede values (63,6,5);
insert into possede values (66,6,5);
insert into possede values (12,6,5);
insert into possede values (69,6,5);
insert into possede values (6,6,5);
insert into possede values (42,6,5);
insert into possede values (63,6,5);
insert into possede values (30,6,5);
insert into possede values (45,6,5);

insert into possede values (34,7,3);
insert into possede values (64,7,3);
insert into possede values (4,7,3);
insert into possede values (70,7,3);
insert into possede values (40,7,3);
insert into possede values (67,7,3);
insert into possede values (19,7,3);
insert into possede values (7,7,3);
insert into possede values (73,7,3);
insert into possede values (31,7,3);
insert into possede values (76,7,3);
insert into possede values (79,7,3);

insert into possede values (35,8,4);
insert into possede values (65,8,4);
insert into possede values (5,8,4);
insert into possede values (71,8,4);
insert into possede values (41,8,4);
insert into possede values (69,8,4);
insert into possede values (20,8,4);
insert into possede values (8,8,4);
insert into possede values (74,8,4);
insert into possede values (32,8,4);
insert into possede values (77,8,4);
insert into possede values (80,8,4);

insert into possede values (36,9,5);
insert into possede values (66,9,5);
insert into possede values (6,9,5);
insert into possede values (72,9,5);
insert into possede values (42,9,5);
insert into possede values (70,9,5);
insert into possede values (21,9,5);
insert into possede values (9,9,5);
insert into possede values (75,9,5);
insert into possede values (33,9,5);
insert into possede values (78,9,5);
insert into possede values (81,9,5);

insert into possede values (37,10,3);
insert into possede values (4,10,3);
insert into possede values (13,10,3);
insert into possede values (7,10,3);
insert into possede values (10,10,3);
insert into possede values (67,10,3);
insert into possede values (25,10,3);
insert into possede values (28,10,3);
insert into possede values (1,10,3);

insert into possede values (38,11,4);
insert into possede values (5,11,4);
insert into possede values (14,11,4);
insert into possede values (8,11,4);
insert into possede values (11,11,4);
insert into possede values (68,11,4);
insert into possede values (26,11,4);
insert into possede values (29,11,4);
insert into possede values (2,11,4);

insert into possede values (39,12,5);
insert into possede values (6,12,5);
insert into possede values (15,12,5);
insert into possede values (9,12,5);
insert into possede values (12,12,5);
insert into possede values (69,12,5);
insert into possede values (27,12,5);
insert into possede values (30,12,5);
insert into possede values (3,12,5);

insert into possede values (1,13,3);
insert into possede values (4,13,3);
insert into possede values (7,13,3);
insert into possede values (10,13,3);
insert into possede values (13,13,3);
insert into possede values (16,13,3);
insert into possede values (19,13,3);
insert into possede values (22,13,3);
insert into possede values (25,13,3);
insert into possede values (28,13,3);
insert into possede values (31,13,3);
insert into possede values (34,13,3);

insert into possede values (2,14,4);
insert into possede values (5,14,4);
insert into possede values (8,14,4);
insert into possede values (11,14,4);
insert into possede values (14,14,4);
insert into possede values (17,14,4);
insert into possede values (20,14,4);
insert into possede values (23,14,4);
insert into possede values (26,14,4);
insert into possede values (29,14,4);
insert into possede values (32,14,4);
insert into possede values (35,14,4);

insert into possede values (3,15,5);
insert into possede values (6,15,5);
insert into possede values (9,15,5);
insert into possede values (12,15,5);
insert into possede values (15,15,5);
insert into possede values (18,15,5);
insert into possede values (21,15,5);
insert into possede values (24,15,5);
insert into possede values (27,15,5);
insert into possede values (30,15,5);
insert into possede values (33,15,5);
insert into possede values (36,15,5);





