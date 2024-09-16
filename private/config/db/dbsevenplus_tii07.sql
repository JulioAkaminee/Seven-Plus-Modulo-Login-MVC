-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/09/2024 às 16:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbsevenplus_tii07`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbacl`
--

CREATE TABLE `tbacl` (
  `idAcl` int(2) NOT NULL,
  `type` int(2) NOT NULL,
  `description` varchar(20) NOT NULL,
  `idprofile` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `tbacl`
--

INSERT INTO `tbacl` (`idAcl`, `type`, `description`, `idprofile`) VALUES
(1, 1, 'MASTER', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprofile`
--

CREATE TABLE `tbprofile` (
  `idprofile` int(1) NOT NULL,
  `type` int(1) NOT NULL,
  `description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `tbprofile`
--

INSERT INTO `tbprofile` (`idprofile`, `type`, `description`) VALUES
(1, 1, 'MASTER'),
(2, 2, 'FUNCIONARIO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbstatus`
--

CREATE TABLE `tbstatus` (
  `idstatus` int(2) NOT NULL,
  `type` int(2) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `tbstatus`
--

INSERT INTO `tbstatus` (`idstatus`, `type`, `description`) VALUES
(1, 0, 'INATIVO'),
(2, 1, 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbuser`
--

CREATE TABLE `tbuser` (
  `idUser` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `hash` varchar(60) NOT NULL,
  `idprofile` int(1) NOT NULL,
  `idstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Despejando dados para a tabela `tbuser`
--

INSERT INTO `tbuser` (`idUser`, `email`, `password`, `hash`, `idprofile`, `idstatus`) VALUES
(9, 'julioakaminee@gmail.com', '$2b$09$6a832b6fd8a9b66a22ffbOMtzWPgDcn9LUNQuAlUyy5rz9BbjzI5W', '$2b$08$2b55d0394cf0d0871c320ezYvR.FklYZHWUZC6UsUGxqwPdsVCn0G', 1, 2),
(10, 'teste@gmail.com', '$2b$09$7f8a417482fc8041c8b08uk/WyCUipPyObuffzu2w20gvAjH8l61.', '123', 1, 2),
(11, 'gustavo@gmail.com', '$2b$09$4fdbea4bd4429b843ec2fujeVSw.q6CQ50RFRDAizOXTAANm8PLWe', '111', 1, 2),
(12, 'juliooakamine@gmail.com', '$2b$09$7dbcb9f45f9a0b1da9df0O.mcRuZNdmLWfE0Y/MjfWaDIWT9h/5k.', '123', 1, 2),
(15, 'juliooaskamine@gmail.com', '123', 'teste', 1, 2),
(16, 'testeeee@gmail.com', '123', 'teste', 1, 2),
(17, 'testeesee@gmail.com', '123', 'teste', 1, 2),
(18, 'queijo@gmail.com', '$2b$09$5fc456dcf6d0f2187c14buXT6UeqAdETk3ETRVn.bKG9Iy1u1GzlC', 'teste', 1, 2),
(19, 'queijoss@gmail.com', '$2b$09$1ffe22e8c326ee0ca910fuUc7AJJnMndWDnuusJ8ycfKleRflSoDW', 'teste', 1, 2),
(20, 'ksksk@gmail.com', '$2b$09$6258a8b2dc69044a049f9OeEHtvIUIlRNKoFnAF/VHvKDvUFiJU3W', 'teste', 1, 2),
(21, 'ksksks@gmail.com', '$2b$09$7f99340d15e22d5dab687e9sSWlnBfF3yResC3stv.54D4TzZnA5W', 'teste', 1, 2),
(22, 'julio@gmail.comm', '$2b$09$ecfd0c4c9ac5fe7acc46au7OYzo7bnzzdeWHQiVq2UElyub6BPY4S', 'teste', 1, 2),
(23, 'julis@gmail.comm', '$2b$09$a92119e4c2ef41164beaaOWoghoh7GtwYE8daEADgSZLua07O3NZ6', 'teste', 1, 2),
(24, 'juliss@gmail.comm', '$2b$09$5b24b58eef62c544e01c4ecUK9OBaOguMBpD1aWzuwwUH8V.piqMe', 'teste', 1, 2),
(25, 'julisss@gmail.comm', '$2b$09$861b27449ee9fe68bcd51Onb4jADOZ/717cKOaSqa1iAlzW9hJUI.', 'teste', 1, 2),
(26, 'julissSSSs@gmail.comm', '$2b$09$202cb962ac59075b964b0uHF2NKTnymeIpjrtaoFxdUA4DLktFDQ2', 'teste', 1, 2),
(27, 'julissSSSSSs@gmail.comm', '$2b$09$202cb962ac59075b964b0uC5TkH6WcOGxn7XObMzVIMeX.osKsBfW', 'teste', 1, 2),
(28, 'julissSSSXXSSs@gmail.comm', '$2b$09$202cb962ac59075b964b0uAC4SG2p7yxa8mzf/zF6j.466dWH/jsS', 'teste', 1, 2),
(29, 'julioakamineee@Gmail.com', '$2b$09$7ad7a5f75cd2ea801e2d2OCfWccaZZcE7a7rZZkka1N8DaOj8ZHf6', '$2b$08$479e1ac4bf0bb6bbd642eun7JBSo9ebnQBwCYyaFUh/DrNq.nlhvK', 1, 2),
(30, 'julioak@gmail.com', '$2b$09$236c7e9a5d30618fe0e77uSnS/6LFG8J9pYPIF5f921eefzPWTEoG', '$2b$08$15322c1e066eca2364a2fuv6QEsYq.iRVSuHUwtPaqYiE4EDVWlWG', 1, 2),
(31, 'julioak1@gmail.com', '$2b$09$bd3d1440c51d46231b92duMLnfdaLIHyjxVTW.p9SzDxSqG7Qgw7u', '$2b$08$da673ebcbe9c41fce5fdbu/qUlutsR49Mq6/jk0amSg7iBfDZfBf6', 1, 2),
(32, 'jual@f.cmo', '$2b$09$c884c0d1262ce7dc7c80fuXM.UD00Z/9g25pZO.aWp6yJG2tVE5MG', '$2b$08$693d5ab988f54f4944ed4ufd7Fu63jyCOTEN/NYZwtjgWkh63kKGK', 1, 2),
(33, 'julisdaasdoakamine@gmail.com', '$2b$09$e11c35d1438d4614f7b41OR.oieFivxYCIBnDPPix1uFu4CY7rjhK', '$2b$08$06e4e38c7b8a641c95474e5N6FlvUVSugsdIPQcqh097dbyT.GBA6', 1, 2),
(34, 'ju@ju.com', '*0', '*0', 1, 2),
(35, 'ju@ju.csoms', '$2b$09$889ee5e28ada65a9dabb9u9mKOilRLEAMPxh.wiXHGbeFiZTK0cLC', '$2b$08$96ab1685ec66a71e6c1f9eI5CgWK89M88FDPNNi2hPSOtiSS6d8XC', 1, 2),
(36, 'teste1s@gmail.com', '$2b$09$d6c0099c21b4eb74d54a0uPcC67P5He3cEY03qyeUkPhlqBR7bD86', '$2b$08$5f1b2ee8c26942330ad55eLtH.PuZw301flfsLB02lcDVczyBCdq.', 1, 2),
(37, 'teste21s@gmail.com', '$2b$09$4f3136587176ce1bc6005OdELsi3LpZ6KZqe1EQADx7QGLO..X4Le', '$2b$08$4f3136587176ce1bc6005OT7PR0TcBr4z9qB47qwrEFmajtuh8eJu', 1, 2),
(38, 'teste@teste2.com', '$2y$10$qIdHxTUb0j7NGdF4KD7Eleqoo4qCrUyL71AXWv.tYvCt6xinmTbcS', '$2b$08$13d8863a4459c1cae97baudw.MKfbq3Jz8Bi24VOkAgPBSLSAQbI.', 1, 2),
(39, 'julio@teste.com', '123', '', 1, 2),
(40, 'julio@julioaka.com', '123', '', 1, 2),
(41, 'julio@julio1.com', '12345', '', 1, 2),
(42, 'julio@julio2.com', '12345', '', 1, 2),
(43, 'julioaka@gmail.com', '$2b$09$131a49df51cdc28960e79e97ZQguxlQtfwfN83mC6vl9jN.mSMjj6', '$2b$08$068efb02fc3e11b9091f1uRBlGs8rP1XkU7ERZ5q7PJ7ukfG6PPfO', 1, 2),
(44, 'nerildoViana@gmail.com', '$2b$09$b086b4ab1abc4d253f109OQhZGsHrHTqFRdzXANIOkRvrj6nc5ruu', '$2b$08$1d56b939063c45302c20aeTo05y1MSGjRLaegxzlZCRU2EUgj/k1a', 1, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbacl`
--
ALTER TABLE `tbacl`
  ADD PRIMARY KEY (`idAcl`),
  ADD UNIQUE KEY `UQ_tipo` (`type`),
  ADD KEY `FK_idprofile` (`idprofile`);

--
-- Índices de tabela `tbprofile`
--
ALTER TABLE `tbprofile`
  ADD PRIMARY KEY (`idprofile`),
  ADD UNIQUE KEY `UQ_tipo` (`type`);

--
-- Índices de tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`idstatus`),
  ADD UNIQUE KEY `UQ_tipo` (`type`);

--
-- Índices de tabela `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `UQ_email` (`email`),
  ADD KEY `FK_idProfile` (`idprofile`),
  ADD KEY `FK_idStatus` (`idstatus`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbacl`
--
ALTER TABLE `tbacl`
  MODIFY `idAcl` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbprofile`
--
ALTER TABLE `tbprofile`
  MODIFY `idprofile` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbstatus`
--
ALTER TABLE `tbstatus`
  MODIFY `idstatus` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbacl`
--
ALTER TABLE `tbacl`
  ADD CONSTRAINT `tbacl_ibfk_1` FOREIGN KEY (`idprofile`) REFERENCES `tbprofile` (`idprofile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tbuser`
--
ALTER TABLE `tbuser`
  ADD CONSTRAINT `tbuser_ibfk_1` FOREIGN KEY (`idprofile`) REFERENCES `tbprofile` (`idprofile`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbuser_ibfk_2` FOREIGN KEY (`idstatus`) REFERENCES `tbstatus` (`idstatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
