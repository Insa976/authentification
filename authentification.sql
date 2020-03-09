#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        iduser Int  Auto_increment  NOT NULL ,
        nom    Varchar (255) NOT NULL ,
        prenom Varchar (255) NOT NULL ,
        email  Varchar (255) NOT NULL ,
        mdp    Varchar (255) NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (iduser)
)ENGINE=InnoDB;
