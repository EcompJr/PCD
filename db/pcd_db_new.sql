-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 25/02/2018 às 15:41
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pcd_db`
--
CREATE DATABASE `db_pcd`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `advertences`
--

CREATE TABLE `advertences` (
  `id` int(16) NOT NULL,
  `memberId` int(16) NOT NULL,
  `member` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `responsible` varchar(80) NOT NULL,
  `reason` varchar(80) NOT NULL,
  `data` varchar(14) NOT NULL,
  `points` int(5) NOT NULL,
  `dismissed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `advertences`
--

INSERT INTO `advertences` (`id`, `memberId`, `member`, `responsible`, `reason`, `data`, `points`, `dismissed`) VALUES
(8, 37, '123', '123', 'motivo3', '22/02/2018', 2468, 1),
(10, 13, 'Saulo De Tarso', '', 'motivo6', '25/02/2018', 10, 1),
(11, 22, 'Pedro Brandão', '', 'motivo2', '27/02/2018', 2, 1),
(12, 22, 'Pedro Brandão', '', 'motivo3', '25/02/2018', 6666, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(16) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `score` int(16) NOT NULL,
  `history` varchar(255) NOT NULL,
  `privilege` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `name`, `occupation`, `score`, `history`, `privilege`) VALUES
(1, 'johnnysanttana', '', 'Johnny Santtana', 'Membro Consultor', 8, '', 0),
(2, 'arianapereira', '', 'Ariana Pereira', 'Gerente de Redes Sociais', 0, '', 0),
(3, 'emanuelsantana', '', 'Emanuel Santana', 'Membro Consultor', 0, '', 0),
(4, 'carlostinin', '', 'Carlos Tinin', 'Membro Consultor', 0, '', 0),
(5, 'pedrogomes', '8cb2237d0679ca88db6464eac60da96345513964', 'Pedro Gomes', 'Membro Consultor', 19, 'Trainee', 0),
(6, 'gabrielazevedo', '', 'Gabriel Azevedo', '', 0, '', 0),
(7, 'marcosantonio', '', 'Marcos Antonio', 'Assessor de RH', 0, '', 0),
(8, 'ssscassio', '8cb2237d0679ca88db6464eac60da96345513964', 'Cássio Santos', 'Conselheiro', 16, '', 1),
(9, 'taisonmachado', '', 'Taíson Machado', 'Membro Consultor', 0, '', 0),
(10, 'vanessasouza', '', 'Vanessa Souza', 'Membro Consultor', 0, '', 0),
(11, 'victorsouza', '', 'Victor Souza', 'Membro Consultor', 0, '', 0),
(12, 'elvishuges', '', 'Elvis Huges', 'Membro Consultor', 0, '', 0),
(13, 'saulodetarso', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Saulo De Tarso', 'Diretor Presidente', 10, '', 1),
(14, 'rafaelbrito', '', 'Rafael Brito', 'Membro Consultor', 0, '', 0),
(15, 'lucascardoso', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Lucas Cardoso', 'Consultor', 17, '', 0),
(16, 'khaickbrito', '', 'Khaíck Brito', 'Gerente de Vendas e Prosprecção Ativa', 0, '', 0),
(17, 'eduardomendes', '', 'Eduardo Mendes', 'Membro Consultor', 0, '', 0),
(21, 'brunovogel', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Bruno Vogel', 'Vice-Presidente', 11, '', 0),
(22, 'pedrobrandao', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Pedro Brandão', 'Membro Consultor', 19, '', 1),
(26, 'valmiralmeida', '8cb2237d0679ca88db6464eac60da96345513964', 'Valmir Vinícius', 'Diretor de Projetos', 17, '', 0),
(27, 'gustavoboanerges', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Gustavo Boanerges', 'Membro Consultor', 19, '', 0),
(28, 'aloisiojunior', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Aloísio Júnior', 'Diretor de Administrativo e Financeiro', 14, '', 0),
(30, 'karollima', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Karol Lima', 'Membro Consultor', 17, '', 0),
(34, 'emillesampaio', '8cb2237d0679ca88db6464eac60da9634551', 'Emille Sampaio', 'Diretor de Recursos Humanos', 13, '', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `advertences`
--
ALTER TABLE `advertences`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `advertences`
--
ALTER TABLE `advertences`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
