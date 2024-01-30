--- Estrutura da tabela ---
CREATE TABLE `usuario` (
  `ID_usuario` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(80) COLLATE latin1_general_cs NOT NULL,
  `E_mail` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Cel` char(14) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Aniversario` date NOT NULL,
  `Idade` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;


--- Inserindo dados ---
INSERT INTO `usuario` (`ID_usuario`, `Nome`, `E_mail`, `Cel`, `Aniversario`, `Idade`) VALUES
(1, 'Eveline', 'eveline@meuemail.com', '(41)9999-9999', '1993-06-03', 30);

INSERT INTO `usuario` (`ID_usuario`, `Nome`, `E_mail`, `Cel`, `Aniversario`, `Idade`) VALUES
(2, 'Eduardo', 'eduardo@meuemail.com', '(41)9993-9999', '1998-03-02', 26);
