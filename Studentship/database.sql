DROP DATABASE IF EXISTS `studentship`;
CREATE DATABASE IF NOT EXISTS `studentship`;
USE `studentship`;

create table if not exists `university`(
uniId int auto_increment,
uniname varchar(40) not null,
primary key (uniId)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

Insert into university(uniname) values("Universiteti i Tiranes");
Insert into university(uniname) values("Universiteti Politeknik i Tiranës");
Insert into university(uniname) values("Universiteti Bujqësor i Tiranës");
Insert into university(uniname) values('Universiteti i Elbasanit "Aleksandër Xhuvani"');
Insert into university(uniname) values('Universiteti "Luigj Gurakuqi", Shkodër');
Insert into university(uniname) values('Universiteti "Eqrem Çabej", Gjirokastër');
Insert into university(uniname) values('Universiteti "Fan S. Noli", Korçë');
Insert into university(uniname) values('Universiteti "Ismail Qemali", Vlorë');
Insert into university(uniname) values('Universiteti "Aleksandër Moisiu", Durrës');
Insert into university(uniname) values('Universiteti i Arteve');
Insert into university(uniname) values('Universiteti i Sporteve të Tiranës');
Insert into university(uniname) values('Universiteti i Mjekësisë, Tiranë');
Insert into university(uniname) values("Universiteti i New York-ut në Tiranë");
Insert into university(uniname) values('Universiteti Privat "Albanian University"');	
Insert into university(uniname) values('Universiteti Katolik "Zoja e Këshillit të Mirë"');	
Insert into university(uniname) values('Universiteti Europian i Tiranës	Universitet');
Insert into university(uniname) values('Universiteti "Aldent"');
Insert into university(uniname) values('Universiteti Polis');
Insert into university(uniname) values('Universiteti "EPOKA"');
Insert into university(uniname) values('Universiteti "Mesdhetar i Shqipërisë"');
Insert into university(uniname) values('Universiteti "Metropolitan Tirana"');
Insert into university(uniname) values('EPITECH ALBANIA');
Insert into university(uniname) values('Shkolla e larte universitare, jopublike, "Universiteti "Marin Barleti"');
Insert into university(uniname) values('Shkolla e Larte "Nehemia"');
Insert into university(uniname) values('Universiteti "Luarasi"	Kolegj Universitar');
Insert into university(uniname) values('Kolegji Universitar "Qiriazi"');
Insert into university(uniname) values('Kolegji Universitar "WISDOM"');
Insert into university(uniname) values('Kolegji Universitar "Pavarësia Vlorë"');
Insert into university(uniname) values("Kolegji Universitar LOGOS");
Insert into university(uniname) values("Tirana Business University"); 
Insert into university(uniname) values("Kolegji Universitar Bedër");
Insert into university(uniname) values("Kolegji Universitar I Biznesit");
Insert into university(uniname) values('Kolegji Universitar "REALD"');
Insert into university(uniname) values('Kolegji Universitar "Instituti Kanadez i Teknologjisë"');
Insert into university(uniname) values('Kolegji Profesional i Tiranës');
create table if not exists `representative`(
repId varchar(10) not null,
rep_fullname char(30) not null,
positionDocs varchar(100) not null,
primary key (repId)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;
create table if not exists `universityregister`(
iduni int auto_increment,
repId varchar(10) not null,
unipassword varchar(255) not null,
primary key(iduni, repId),
CONSTRAINT repId FOREIGN KEY (repId)
        REFERENCES representative (repId)
        ON DELETE NO ACTION ON UPDATE CASCADE,
CONSTRAINT FOREIGN KEY (iduni)
        REFERENCES university (uniId)
        ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

create table if not exists `degrees`(
did int auto_increment,
degree_name char(50) not null,
primary key(did)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

Insert into degrees(degree_name) value("Architecture	");
Insert into degrees(degree_name) value("Electronic Engineering	");
Insert into degrees(degree_name) value("Civil Engineering	");
Insert into degrees(degree_name) value("Computer Engineering	");
Insert into degrees(degree_name) value("Histori	");
Insert into degrees(degree_name) value("Gjeografi	");	
Insert into degrees(degree_name) value("Gjuhë- Letërsi	");	
Insert into degrees(degree_name) value("Gazetari	")	;
Insert into degrees(degree_name) value("Arkeologji	")	;
Insert into degrees(degree_name) value("Bioteknologji	");	
Insert into degrees(degree_name) value("Matematikë	")	;
Insert into degrees(degree_name) value("Fizikë	")	;
Insert into degrees(degree_name) value("Informatikë	");	
Insert into degrees(degree_name) value("Kimi dhe Teknologji Ushqimore	")	;
Insert into degrees(degree_name) value("Kimi Industriale dhe Mjedisore	")	;
Insert into degrees(degree_name) value("Inxhinieri Matematike dhe Informatike	");	
Insert into degrees(degree_name) value("Teknologji Informacioni dhe Komunikimi	")	;
Insert into degrees(degree_name) value("Gjuhë Angleze	")	;
Insert into degrees(degree_name) value("Gjuhë Frënge	")	;
Insert into degrees(degree_name) value("Gjuhë Gjermane	")	;
Insert into degrees(degree_name) value("Gjuhë Italiane	")	;
Insert into degrees(degree_name) value("Gjuhë Greke	")	;
Insert into degrees(degree_name) value("Gjuhë Turke	")	;
Insert into degrees(degree_name) value("Gjuhë Ruse	")	;
Insert into degrees(degree_name) value("Gjuhë Spanjolle me profil
Gjuhë -letërsi dhe qytetërim	")	;
Insert into degrees(degree_name) value("Psikologji	")	;
Insert into degrees(degree_name) value("Punë sociale	");	
Insert into degrees(degree_name) value("Filozofi	")	;
Insert into degrees(degree_name) value("Sociologji	")	;
Insert into degrees(degree_name) value("Shkenca Politike	");	
Insert into degrees(degree_name) value("Administrim dhe Politika
Sociale	")	;
Insert into degrees(degree_name) value("Ekonomiks	")	;
Insert into degrees(degree_name) value("Financë	")	;
Insert into degrees(degree_name) value("Informatikë Ekonomike	")	;
Insert into degrees(degree_name) value("Drejtësi	");	
Insert into degrees(degree_name) value("Mjekësi e Përgjithshme	");	
Insert into degrees(degree_name) value("Farmaci	")	;
Insert into degrees(degree_name) value("Stomatologji	");	
Insert into degrees(degree_name) value("Teknikë e Lartë Laboratorike	")	;
Insert into degrees(degree_name) value("Fizioterapi	")	;
Insert into degrees(degree_name) value("Logopedi	")	;
Insert into degrees(degree_name) value("Imazheri	")	;
Insert into degrees(degree_name) value("Menaxhim Agrobiznesi	")	;
Insert into degrees(degree_name) value("Ekonomi dhe Politikë Agrare	");	
Insert into degrees(degree_name) value("Financë-kontabilitet	")	;
Insert into degrees(degree_name) value("Menaxhim i Turizmit Rural	");	
Insert into degrees(degree_name) value("Informatikë Biznesi	")	;
Insert into degrees(degree_name) value("Ekonomiks i Aplikuar	");	
Insert into degrees(degree_name) value("Mbrojtje bimësh	")	;
Insert into degrees(degree_name) value("Hortikulturë	")	;
Insert into degrees(degree_name) value("Prodhim bimor	")	;
Insert into degrees(degree_name) value("Zootekni dhe biznes blegtoral	");	
Insert into degrees(degree_name) value("Akuakulturë dhe Menaxhim Peshkimi	");	
Insert into degrees(degree_name) value("Agromjedis dhe ekologji	")	;
Insert into degrees(degree_name) value("Inxhineri agrare – Agromekanizim	")	;
Insert into degrees(degree_name) value("Teknologji Agroushqimore	")	;
Insert into degrees(degree_name) value("Vreshtari-Enologji	")	;
Insert into degrees(degree_name) value("Mbarështim Pyjesh	")	;
Insert into degrees(degree_name) value("Përpunim Druri	")	;
Insert into degrees(degree_name) value("Mjekësi Veterinare	");	
Insert into degrees(degree_name) value("Menaxhim Veterinar (2vjeçar)	")	;
Insert into degrees(degree_name) value("Inxhinieri Ndërtimi	")	;
Insert into degrees(degree_name) value("Inxhinieri Hidroteknike	");	
Insert into degrees(degree_name) value("Inxhinieri Mjedisi	")	;
Insert into degrees(degree_name) value("Arkitekturë (Arkitekt)	");	
Insert into degrees(degree_name) value("Arkitekturë (Urbanist)	")	;
Insert into degrees(degree_name) value("Inxhinieri Gjeodezi	")	;
Insert into degrees(degree_name) value("Inxhinieri Elektrike (Automatizim i Industrisë)	");	
Insert into degrees(degree_name) value("Inxhinieri Elektrike (Energjitike)	")	;
Insert into degrees(degree_name) value("Inxhinieri Mekatronike	")	;
Insert into degrees(degree_name) value("Inxhinieri Fizike	")	;
Insert into degrees(degree_name) value("Inxhinieri Matematike	");	
Insert into degrees(degree_name) value("Inxhinieri Mekanike	")	;
Insert into degrees(degree_name) value("Inxhinieri Tekstile dhe Modë	")	;
Insert into degrees(degree_name) value("Inxhinieri Materiale	")	;
Insert into degrees(degree_name) value("Inxhinieri Ekonomike	")	;
Insert into degrees(degree_name) value("Shkencat e Tokës	")	;
Insert into degrees(degree_name) value("Inxhinieri Gjeoburimesh	");	
Insert into degrees(degree_name) value("Inxhinieri Gjeoinformatike	");	
Insert into degrees(degree_name) value("Inxhinieri Gjeomjedis	")	;
Insert into degrees(degree_name) value("Inxhinieri Elektronike	")	;
Insert into degrees(degree_name) value("Inxhinieri Informatike	")	;
Insert into degrees(degree_name) value("Inxhinieri Telekomunikacioni	");	
Insert into degrees(degree_name) value("Gjuhë- Letersi	")	;
Insert into degrees(degree_name) value("Gjuhë dhe Kulture Frënge	")	;
Insert into degrees(degree_name) value("Gjuhë Angleze	")	;
Insert into degrees(degree_name) value("Mësuesi për Arsimin Fillor	");	
Insert into degrees(degree_name) value("Mësuesi për Arsimin
Parashkollor	")	;
Insert into degrees(degree_name) value("Histori-Gjeografi	");	
Insert into degrees(degree_name) value("Filozofi-Sociologji	")	;
Insert into degrees(degree_name) value("Matematikë-Fizikë	")	;
Insert into degrees(degree_name) value("Matematikë-Informatikë	");	
Insert into degrees(degree_name) value("Biologji- Kimi	")	;
Insert into degrees(degree_name) value("Teknologji Informacioni	");	
Insert into degrees(degree_name) value("Infermieri e përgjithshme	");	
Insert into degrees(degree_name) value("Mami (Infermier)	")	;
Insert into degrees(degree_name) value("Financë – Kontabilitet	")	;
Insert into degrees(degree_name) value("Menaxhim	")	;
Insert into degrees(degree_name) value("Administrim Biznesi në
Marketing	")	;
Insert into degrees(degree_name) value("Administrim Biznesi në
Turizëm	")	;
Insert into degrees(degree_name) value("Agroushqim	");	
Insert into degrees(degree_name) value("Agrobiznes	")	;
Insert into degrees(degree_name) value("Inxhinieri Agronomike	");	
Insert into degrees(degree_name) value("Mjekesi e Bimeve dhe
Hortikulture	")	;
Insert into degrees(degree_name) value("Gjuhë – Letërsi	")	;
Insert into degrees(degree_name) value("Gjuhë – Letërsi shqipe dhe Frënge	");	
Insert into degrees(degree_name) value("Histori – Gjeografi	")	;
Insert into degrees(degree_name) value("Histori dhe gjuhë gjermane	");	
Insert into degrees(degree_name) value("Gjeografi dhe gjuhë italiane	");	
Insert into degrees(degree_name) value("Gjuhë angleze	")	;
Insert into degrees(degree_name) value("Gjuhë gjermane	")	;
Insert into degrees(degree_name) value("Gjuhë frënge	")	;
Insert into degrees(degree_name) value("Gjuhë italiane	")	;
Insert into degrees(degree_name) value("Gazetari	")	;
Insert into degrees(degree_name) value("Gazetari – Anglisht	");	
Insert into degrees(degree_name) value("Gjuhe Shqipe dhe Rome	");	
Insert into degrees(degree_name) value("Matematikë-Fizikë	");	
Insert into degrees(degree_name) value("Teknologji laboratori (2vjeçar)	")	;
Insert into degrees(degree_name) value("Fizikë kompjuterike	")	;
Insert into degrees(degree_name) value("Matematikë Informatike	");	
Insert into degrees(degree_name) value("Fizioterapi	")	;
Insert into degrees(degree_name) value("Logopedi	")	;
Insert into degrees(degree_name) value("Imazheri	")	;
Insert into degrees(degree_name) value("Teknologji laboratori	");	
Insert into degrees(degree_name) value("Mësuesi për Arsimin Fillor	");	
Insert into degrees(degree_name) value("Mesuesi per Arsimi Parashkollor	");	
Insert into degrees(degree_name) value("Edukim qytetar	")	;
Insert into degrees(degree_name) value("Punonjës social	")	;
Insert into degrees(degree_name) value("Filozofi-Sociologji	");	
Insert into degrees(degree_name) value("Psikologji	")	;
Insert into degrees(degree_name) value("Edukim Fizik dhe Sporte	");	
Insert into degrees(degree_name) value("Financë-Kontabilitet	");	
Insert into degrees(degree_name) value("Ekonomia dhe e drejta	")	;
Insert into degrees(degree_name) value("Informatikë ekonomike	")	;
Insert into degrees(degree_name) value("Ekonomi turizmi	")	;
Insert into degrees(degree_name) value("Administrim biznesi dhe
Inxhinieri	")	;
Insert into degrees(degree_name) value("Shkenca Juridike në Biznes	")	;
Insert into degrees(degree_name) value("Shkenca Juridike në
Sektorin Publik	")	;
Insert into degrees(degree_name) value("Fizikë dhe Teknologji Informacioni	")	;
Insert into degrees(degree_name) value("Matematikë – Fizikë	")	;
Insert into degrees(degree_name) value("Matematikë – Informatikë	");	
Insert into degrees(degree_name) value("Histori -Gjeografi	")	;
Insert into degrees(degree_name) value("Gjuhë – Letërsi Shqipe	");
Insert into degrees(degree_name) value("Gjuhë Letërsi Angleze	");	
Insert into degrees(degree_name) value("Gjuhë Letërsi Italiane	")	;
Insert into degrees(degree_name) value("Gjuhë Letërsi dhe Qytetërim Grek	");	
Insert into degrees(degree_name) value("Histori dhe Gjuhë Italiane	")	;
Insert into degrees(degree_name) value("Mësuesi për Arsimin Fillor	")	;
Insert into degrees(degree_name) value("Mësuesi për Arsimin Parashkollor	")	;
Insert into degrees(degree_name) value("Kontabilitet-Financë	")	;
Insert into degrees(degree_name) value("Administrim – Publik	")	;
Insert into degrees(degree_name) value("Ekonomi Turizmi	")	;
Insert into degrees(degree_name) value("Gjuhë – Letërsi	")	;
Insert into degrees(degree_name) value("Gazetari dhe komunikim	");	
Insert into degrees(degree_name) value("Histori	")	;
Insert into degrees(degree_name) value("Gjeografi	")	;
Insert into degrees(degree_name) value("Matematikë	");	
Insert into degrees(degree_name) value("Fizikë	")	;
Insert into degrees(degree_name) value("Informatikë	")	;	
Insert into degrees(degree_name) value("Infermieri (Fizioterapi)	");	
Insert into degrees(degree_name) value("Mësuesi Arsimi Fillor	")	;
Insert into degrees(degree_name) value("Mësuesi arsimi parashkollor	");	
Insert into degrees(degree_name) value("Psikologji	")	;
Insert into degrees(degree_name) value("Punë sociale	")	;
Insert into degrees(degree_name) value("Edukim fizik dhe sporte	")	;
Insert into degrees(degree_name) value("Financë – Kontabilitet	")	;
Insert into degrees(degree_name) value("Administrim – Biznes	");	
Insert into degrees(degree_name) value("Turizëm	")	;
Insert into degrees(degree_name) value("Gjuhë Angleze	")	;
Insert into degrees(degree_name) value("Gjuhë Italiane	")	;
Insert into degrees(degree_name) value("Gjuhë Gjermane	")	;
Insert into degrees(degree_name) value("Gjuhë Frënge	")	;
Insert into degrees(degree_name) value("Drejtësi	")	;
Insert into degrees(degree_name) value("Pikturë e grafikë	")	;
Insert into degrees(degree_name) value("Pedagogji muzikore	")	;
Insert into degrees(degree_name) value("Matematikë	");	
Insert into degrees(degree_name) value("Fizikë	")	;
Insert into degrees(degree_name) value("Shkenca Kompjuterike	")	;
Insert into degrees(degree_name) value("Informatikë	")	;
Insert into degrees(degree_name) value("Inxhinieri Navale	")	;
Insert into degrees(degree_name) value("Inxhinieri Mekanike	");	
Insert into degrees(degree_name) value("Navigacion	");	
Insert into degrees(degree_name) value("Kimi	")	;
Insert into degrees(degree_name) value("Biologji	")	;
Insert into degrees(degree_name) value("Inxhinieri Elektrike	")	;
Insert into degrees(degree_name) value("Menaxhim Turizmi	")	;
Insert into degrees(degree_name) value("Financë	")	;
Insert into degrees(degree_name) value("Kontabilitet	");	
Insert into degrees(degree_name) value("Marketing	")	;
Insert into degrees(degree_name) value("Mësuesi për Arsimin Fillor	")	;
Insert into degrees(degree_name) value("Mësuesi për Arsimin Parashkollor	");	
Insert into degrees(degree_name) value("Pedagogji e Specializuar	")	;
Insert into degrees(degree_name) value("Gjuhë Shqipe dhe Letërsi	")	;
Insert into degrees(degree_name) value("Gjuhë Angleze	")	;
Insert into degrees(degree_name) value("Gjuhë italiane	")	;
Insert into degrees(degree_name) value("Histori – Gjeografi	")	;
Insert into degrees(degree_name) value("Menaxhim – Marketing	");	
Insert into degrees(degree_name) value("Shkenca Ekonomike	")	;
Insert into degrees(degree_name) value("Financë -Kontabilitet	");	
Insert into degrees(degree_name) value("Bankë Financë	")	;
Insert into degrees(degree_name) value("Menaxhim Hotel Restorant	");	
Insert into degrees(degree_name) value("Menaxhim Turizëm
Kulturor	")	;
Insert into degrees(degree_name) value("Menaxhim Turizëm
Arkeologjik	")	;
Insert into degrees(degree_name) value("Drejtësi	")	;
Insert into degrees(degree_name) value("Shkenca Politike	")	;
Insert into degrees(degree_name) value("Politikë Ekonomike	");	
Insert into degrees(degree_name) value("Marrëdhënie me Publikun	")	;
Insert into degrees(degree_name) value("Fizioterapi	")	;
Insert into degrees(degree_name) value("Navigacion dhe Peshkim Detar	")	;
Insert into degrees(degree_name) value("Teknikë Elektrike (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Hidroteknikë Ujësjellës Kanalizime (2 vjeçar)	");	
Insert into degrees(degree_name) value("Asistencë Stomatologji (2 vjeçar)	");	
Insert into degrees(degree_name) value("Menaxhim Ndërtimi (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Menaxhim Transporti (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Asistencë Ligjore (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Asistencë Administrative (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Teknologji Automobilash (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Teknikë e Rrjeteve Kompjuterike (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Informatikë Praktike (2 vjeçar)	")	;
Insert into degrees(degree_name) value("Gjuhë Angleze	")	;
Insert into degrees(degree_name) value("Mësuesi për Arsim Fillor	");	
Insert into degrees(degree_name) value("Mësuesi për Arsim
Parashkollor	")	;
Insert into degrees(degree_name) value("Gjuhë Letërsi -Anglisht	")	;
Insert into degrees(degree_name) value("Gjermanisht – Anglisht	")	;
Insert into degrees(degree_name) value("Shkenca Kompjuterike	")	;
Insert into degrees(degree_name) value("Sistemet e Informacionit	");	
Insert into degrees(degree_name) value("Teknologji Informacioni	")	;
Insert into degrees(degree_name) value("Matematikë-Informatikë	")	;
Insert into degrees(degree_name) value("Informatikë-Anglisht	")	;
Insert into degrees(degree_name) value("Multimedia dhe Televizion Dixhital	");	
Insert into degrees(degree_name) value("Menaxhim i Bankave")	;
Insert into degrees(degree_name) value("Menaxhim i Hoteleri Turizëm")	;
Insert into degrees(degree_name) value("Menaxhim i Ndërmarrjeve të Vogla dhe të Mesme ");
Insert into degrees(degree_name) value("Ekspert në Proceset e Formimit	");	
Insert into degrees(degree_name) value("Psikologji Sociologji	")	;
Insert into degrees(degree_name) value("Regji Filmi dhe Televizioni.	")	;
Insert into degrees(degree_name) value("Aktrim	")	;
Insert into degrees(degree_name) value("Regji	")	;
Insert into degrees(degree_name) value("Skenografi – Kostumografi	");	
Insert into degrees(degree_name) value("Koreografi	");	
Insert into degrees(degree_name) value("Pikturë	")	;
Insert into degrees(degree_name) value("Skulpturë	")	;
Insert into degrees(degree_name) value("Muzikologji	")	;
Insert into degrees(degree_name) value("Kompozim	")	;
Insert into degrees(degree_name) value("Dirizhim	");	
Insert into degrees(degree_name) value("Piano	")	;
Insert into degrees(degree_name) value("Violinë	")	;
Insert into degrees(degree_name) value("Violonçel	");	
Insert into degrees(degree_name) value("Violë	")	;
Insert into degrees(degree_name) value("Kitarë	")	;
Insert into degrees(degree_name) value("Kontrabas	");	
Insert into degrees(degree_name) value("Flaut	")	;
Insert into degrees(degree_name) value("Oboe	")	;
Insert into degrees(degree_name) value("Klarinetë	");	
Insert into degrees(degree_name) value("Fagot	")	;
Insert into degrees(degree_name) value("Korno	")	;
Insert into degrees(degree_name) value("Trombë	")	;
Insert into degrees(degree_name) value("Trombon	")	;
Insert into degrees(degree_name) value("Bastubë	")	;
Insert into degrees(degree_name) value("Kanto	")	;
Insert into degrees(degree_name) value("Pedagogji Muzikore	")	;
Insert into degrees(degree_name) value("Fizarmonikë Klasike	");
Insert into degrees(degree_name) value("Shkencat e Lëvizjes	");	
Insert into degrees(degree_name) value("Fushat e Veprimtarisë Fizike,të Shëndetit dhe të Rekreacionit	");
Insert into degrees(degree_name) value("Rendin dhe Sigurinë Publike	");	



create table if not exists `hiredstatus`(
hiredid int not null auto_increment,
hired_status char(15) not null,
primary key(hiredid)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

Insert into `hiredstatus`(hired_status) value("Employed");
Insert into `hiredstatus`(hired_status) value("Not employed");
create table if not exists `studentstatus`(
ssid int auto_increment,
student_status char(15) not null,
primary key(ssid)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;
Insert into `studentstatus`(student_status) value("Student");
Insert into `studentstatus`(student_status) value("Alumnus");

create table if not exists `student`(
pid varchar(10) ,
studentid varchar(10),
fullname char(30) not null,
 email char(50) not null,
 iduni int not null,
 degree_id int not null,
 primary key(pid),
 CONSTRAINT FOREIGN KEY (iduni)
        REFERENCES university (uniId)
        ON DELETE NO ACTION ON UPDATE CASCADE,
 CONSTRAINT FOREIGN KEY (degree_id)
        REFERENCES degrees (did)
        ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

create table if not exists `student_profile`(
pid varchar(10) not null,
fullname char(30) not null,
email varchar(60) not null,
studentid varchar(10) not null,
 password varchar(255) not null,
 phone int(10) not null,
 birthday date not null,
 city char(20) not null,
  unistart int(4) not null,
 uniend int(4) not null,
 languages char(100) not null,
 github char(200),
 linkdin char(200),
 otherlinks text(400) not null,
 education text(200) not null,
 skills text(300) not null,
 experience text(300) not null,
 why_you text(1000) not null,
 hiredid int not null,
 image blob not null,
 ssid int not null,
 primary key(pid),
 CONSTRAINT FOREIGN KEY (hiredid)
        REFERENCES hiredstatus(hiredid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
        CONSTRAINT FOREIGN KEY (pid)
        REFERENCES student (pid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
        CONSTRAINT FOREIGN KEY (ssid)
        REFERENCES studentstatus(ssid)
        ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

create table if not exists `company`(
compid varchar(10) not null,
 compemail char(50) not null,
 comppass varchar(255) not null,

 primary key(compid)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

create table if not exists `company_profile`(
compid varchar(10) not null,
compname char(50) not null,
 compphone varchar(10) not null,
 complocation char(30) not null,
 slogan varchar(40) not null,
 about text(600) not null,
 what_wodo text(600) not null,
 what_welookfor text(600) not null,
 compimage varchar(100) not null,
 primary key(compid),
  CONSTRAINT FOREIGN KEY (compid)
        REFERENCES company (compid)
        ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;
create table if not exists `jobinfo`(
jobid int not null auto_increment,
jobtitle varchar(30),
position char(30) not null,
internbackground text(300) not null,
jobdesc text(400) not null,
internreq text(400) not null,
weeks int(5) not null,
hoursperweek int(5) not null,
joblocation char(15) not null,
 wage enum( 'Paid','Not paid') not null,
 remote enum('Remote work','Not remote') not null,
 flexibleh enum('Flexible hours','Not flexible hours') not null,
 primary key(jobid)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;
create table if not exists `newpost`(
postid int(10)  auto_increment,
compid varchar(10) not null,
jobid int not null,
 primary key(postid),
  CONSTRAINT FOREIGN KEY (compid)
        REFERENCES company (compid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
        CONSTRAINT FOREIGN KEY (jobid)
        REFERENCES jobinfo (jobid)
        ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

create table if not exists `notif_actions`(
actionid int not null auto_increment,
action_name varchar(30) not null,
primary key(actionid)
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;
Insert into `notif_actions`(action_name) value("hired you.");
Insert into `notif_actions`(action_name) value("emailed you.");
Insert into `notif_actions`(action_name) value("accepted the job position ");
Insert into `notif_actions`(action_name) value("applied to the job position ");
create table if not exists `notification_center`(
nid int(10)  auto_increment,
personalst_id varchar(10) not null,
postid int(10),
company_id varchar(10) not null,
actionid int not null,
 primary key(nid),
    CONSTRAINT FOREIGN KEY (personalst_id)
        REFERENCES student_profile (pid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
        CONSTRAINT FOREIGN KEY (postid)
        REFERENCES newpost (postid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
      CONSTRAINT FOREIGN KEY (company_id)
        REFERENCES company (compid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
             CONSTRAINT FOREIGN KEY (actionid)
        REFERENCES notif_actions (actionid)
        ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;

create table if not exists `hired_students`(
companyid varchar(10) not null,
stpersonalid varchar(10) not null,
 primary key(companyid),
  CONSTRAINT FOREIGN KEY (stpersonalid)
        REFERENCES student_profile (pid)
        ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT FOREIGN KEY (companyid)
        REFERENCES company (compid)
        ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=INNODB DEFAULT CHARACTER SET=UTF8MB4;
alter table newpost modify postid int not null auto_increment;