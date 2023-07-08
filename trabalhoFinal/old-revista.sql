-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2023 às 21:05
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE `pietreRevista`;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

USE pietreRevista;

CREATE TABLE `artigo` (
  `id_artigo` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `classificacao` varchar(255) NOT NULL,
  `link_drive` varchar(255) NOT NULL,
  `data_publi` date NOT NULL,
  `id_pesquisador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id_conta` int(11) NOT NULL,
  `senha` varchar(24) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_pesquisador`
--

CREATE TABLE `conta_pesquisador` (
  `id_pesquisador` int(11) NOT NULL,
  `id_rede` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `redes_sociais`
--

CREATE TABLE `redes_sociais` (
  `id_rede` int(11) NOT NULL,
  `arroba` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id_artigo`),
  ADD KEY `id_pesquisador` (`id_pesquisador`);

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices para tabela `conta_pesquisador`
--
ALTER TABLE `conta_pesquisador`
  ADD PRIMARY KEY (`id_pesquisador`),
  ADD KEY `id_rede` (`id_rede`),
  ADD KEY `id_conta` (`id_conta`);

--
-- Índices para tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD PRIMARY KEY (`id_rede`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id_artigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta_pesquisador`
--
ALTER TABLE `conta_pesquisador`
  MODIFY `id_pesquisador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  MODIFY `id_rede` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`id_conta`) REFERENCES `conta_pesquisador` (`id_conta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `conta_pesquisador`
--
ALTER TABLE `conta_pesquisador`
  ADD CONSTRAINT `conta_pesquisador_ibfk_1` FOREIGN KEY (`id_pesquisador`) REFERENCES `artigo` (`id_pesquisador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `redes_sociais`
--
ALTER TABLE `redes_sociais`
  ADD CONSTRAINT `redes_sociais_ibfk_1` FOREIGN KEY (`id_rede`) REFERENCES `conta_pesquisador` (`id_rede`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
