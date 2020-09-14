-- ourWebPage.`User` definition

CREATE TABLE `User` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Lastname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;