/**
 * Author:  Erika Martínez Pérez
 * Created: 3 dic 2023
 */
-- Me posiciono en la base de datos
USE DB202DWESLoginLogoffTema5;

/*Se insertan valores en la tabla Usuario*/
insert into T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_Perfil) values 
    ("heraclio",SHA2(CONCAT('heraclio','paso'), 256),"Heraclio Borbujo Moran", NULL, "administrador"), 
    ("alberto",SHA2(CONCAT('alberto','paso'), 256),"Alberto Bahillo Fernandez", NULL, "administrador"),
    ("antonio",SHA2(CONCAT('antonio','paso'), 256),"Antonio Jañez Velada", NULL, "administrador"),
    ("amor",SHA2(CONCAT('amor','paso'), 256),"Amor Rodriguez Navarro", NULL, "administrador"),
    ("erika",SHA2(CONCAT('erika','paso'), 256),"Erika Martínez Pérez", NULL, "usuario"),
    ("rebeca",SHA2(CONCAT('rebeca','paso'), 256),"Rebeca Sánchez Pérez", NULL, "usuario"),
    ("alvaro",SHA2(CONCAT('alvaro','paso'), 256),"Alvaro Cordero Miñambres", NULL, "usuario"),
    ("borja",SHA2(CONCAT('borja','paso'), 256),"Borja Nuñez Refoyo", NULL, "usuario"),
    ("ismael",SHA2(CONCAT('ismael','paso'), 256),"Ismael Ferreras García", NULL, "usuario"),
    ("oscar",SHA2(CONCAT('oscar','paso'), 256),"Oscar Pascual Ferrero", NULL, "usuario"),
    ("carlos",SHA2(CONCAT('carlos','paso'), 256),"Carlos Garcia Cachon", NULL, "usuario");

/*Se insertan valores en la tabla Departamento*/
insert into T02_Departamento values 
    ("DAW","Desarrollo de aplicaciones web",now(),50.50,null),
    ("SMR","Sistemas microinformarticos y redes",now(),1.50,null),
    ("PRE","Proyectos de edificacion",now(),150,null),
    ("DAM","Desarrollo de aplicaciones multiplataforma",now(),10.25,null),
    ("ASI","Administracion de sistemas informaticos en red",now(),0.10,null);