create table utenti(
  `ID_Utente` int(11) AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Amministratore` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Utente`)
);
