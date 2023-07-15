-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/07/2023 às 16:06
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE revistaPietre;
USE revistaPietre;
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigo`
--

CREATE TABLE `artigo` (
  `ID_artigo` int(10) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `classificacao` varchar(200) NOT NULL,
  `link_drive` varchar(500) NOT NULL,
  `data_publi` date NOT NULL,
  `id_publicador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `ID_conta` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta_publi`
--

CREATE TABLE `conta_publi` (
  `ID_publi` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `redes_sociais`
--

CREATE TABLE `redes_sociais` (
  `nome_redesocial` varchar(100) NOT NULL,
  `id_contapubli` int(10) NOT NULL,
  `arroba` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`ID_artigo`),
  ADD KEY `artigo-contapubli` (`id_publicador`);

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`ID_conta`);

--
-- Índices de tabela `conta_publi`
--
ALTER TABLE `conta_publi`
  ADD PRIMARY KEY (`ID_publi`),
  ADD KEY `conta-contapubli` (`id_conta`);

--
-- Índices de tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD KEY `contapubli-redesocial` (`id_contapubli`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `ID_artigo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `ID_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta_publi`
--
ALTER TABLE `conta_publi`
  MODIFY `ID_publi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigo`
--
ALTER TABLE `artigo`
  ADD CONSTRAINT `artigo-contapubli` FOREIGN KEY (`id_publicador`) REFERENCES `conta_publi` (`ID_publi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `conta_publi`
--
ALTER TABLE `conta_publi`
  ADD CONSTRAINT `conta-contapubli` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`ID_conta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD CONSTRAINT `contapubli-redesocial` FOREIGN KEY (`id_contapubli`) REFERENCES `conta_publi` (`ID_publi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
