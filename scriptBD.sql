/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  Sena
 * Created: 6/09/2022
 */

create table carta(
    id int auto_increment primary key,
    codigo varchar(2) not null,
    nombre varchar(50) not null,
    imagen varchar(50) not null,
    valor int not null,
    titulo int not null,
    jugador int not null
);

INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1A', 'Ajax','Ajax.png','145628','15','14785');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2A', 'Atletico de Madrid','AtleticoMadrid.png','568794','11','14578');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3A', 'Barcelona','Barcelona.png','520000','32','12345');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4A', 'Bayern','Bayern.png','620000','12','14578');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1B', 'Benfica','Benfica.png','654800','47','2689');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2B', 'Brugge','Brugge.png','246160','17','45789');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3B', 'Brujas','Brujas.png','540235','6','14896');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4B', 'Celtic','Celtic.png','478925','24','62547');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1C', 'Chelsea','Chelsea.png','134668','45','89574');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2C', 'Copenhagen','Copenhagen.png','568694','21','63259');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3C', 'Dinamo Zagreb','DinamoZagreb.png','647895','6','24579');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4C', 'Dortmund','Dortmund.png','526478','48','26579');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1D', 'Frankfurt','Frankfurt.png','468996','12','36257');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2D', 'Inter','InterMilan.png','457886','78','89654');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3D', 'Juventus','Juventus.png','569856','5','78456');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4D', 'Leipzig','Leipzig.png','314568','26','89657');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1E', 'Leverkuzen','Leverkuzen.png','568947','78','14578');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2E', 'Liverpool','Liverpool.png','167894','65','13896');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3E', 'Manchester City','ManchesterCity.png','632547','42','25468');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4E', 'Manchester United','ManchesterUnited.png','789654','34','23657');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1F', 'Marsella','Marsella.png','564788','14','85478');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2F', 'Milan','Milan.png','123456','68','96687');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3F', 'Napoli','Napoli.png','789569','12','24567');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4F', 'Paris St Germain','ParisSt.png','265478','2','78549');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1G', 'Porto','Porto.png','478965','45','26546');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2G', 'Rangers','Rangers.png','458999','68','23589');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3G', 'Real Madrid','Real Madrid.png','147859','21','15748');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4G', 'Sevilla','Sevilla.png','896574','14','58964');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('1H', 'Shatkthar','Shatkthar.png','159784','12','13458');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('2H', 'Sporting','Sporting.png','326478','45','89657');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('3H', 'Tottenham','Tottenham.png','962541','36','47895');
INSERT INTO `carta`(`codigo`, `nombre`, `imagen`, `valor`, `titulo`, `jugador`) VALUES ('4H', 'Viktoria','Viktoria.png','325469','14','15748');