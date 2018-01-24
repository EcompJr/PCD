-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Ago-2017 às 19:08
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcd_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advertencias`
--

CREATE TABLE `advertencias` (
  `id` int(16) NOT NULL,
  `data` date NOT NULL,
  `memberId` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `responsible` varchar(255) NOT NULL,
  `points` int(16) NOT NULL,
  `dismissed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `advertencias`
--

INSERT INTO `advertencias` (`id`, `data`, `memberId`, `reason`, `responsible`, `points`, `dismissed`) VALUES
(1, '2017-07-28', 5, 'Ausência nas reuniões:  faltar alguma reunião que foi marcada com pelo menos 72 horas (3 dias) de              antecedência sem nenhuma justificativa plausível. ', 'Kayo Costa', 4, 0),
(2, '2017-07-28', 5, 'Ausência de resposta dos comunicados internos:  presumem-se lidas as correspondências eletrônicas em um prazo de 48 horas,           assim o membro terá até este prazo para resposta de emails (quando necessário). ', 'Kayo Costa', 2, 1),
(3, '2017-07-29', 12, 'Ausência nas reuniões:  faltar alguma reunião que foi marcada com pelo menos 72 horas (3 dias) de              antecedência sem nenhuma justificativa plausível. ', 'Cássio Santos', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `name`, `occupation`, `score`, `history`, `privilege`) VALUES
(5, 'pedrogomes', '8cb2237d0679ca88db6464eac60da96345513964', 'Pedro', 'Trainee', 19, 'Trainee', 0),
(6, 'kayocosta', '8cb2237d0679ca88db6464eac60da96345513964', 'Kayo Costa', 'Diretor de Recursos Humanos', 19, '', 1),
(7, 'pedroneri', '8cb2237d0679ca88db6464eac60da96345513964', 'Pedro Neri', 'Presidente', 20, '', 1),
(8, 'ssscassio', '8cb2237d0679ca88db6464eac60da96345513964', 'Cássio Santos', 'Vice-Presidente', 20, '', 1),
(9, 'alissonvilas', '8cb2237d0679ca88db6464eac60da96345513964', 'Alisson Vilas', 'Diretor de Marketing', 18, '', 1),
(12, 'bernardorosa', '8cb2237d0679ca88db6464eac60da96345513964', 'Bernardo Rosa', 'Diretor Financeiro', 18, '', 1),
(13, 'saulodetarso', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Saulo De Tarso', 'Diretor de Projetos', 17, '', 1),
(14, 'thatiannecristiana', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Thatianne Cristina', 'Acessora Financeira', 19, '', 0),
(15, 'lucascardoso', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Lucas Cardoso', 'Consultor', 17, '', 0),
(16, 'lucasalves', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Lucas Alves', 'Acessor de Vice-Presidência', 18, '', 0),
(17, 'marialuisa', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Maria Luísa', 'Consultora', 20, '', 0),
(18, 'odiviocaio', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Odivio Caio', 'Consultor', 16, '', 0),
(19, 'luanvictor', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Luan Victor', 'Acessor de Recursos Humanos', 20, '', 0),
(20, 'nilsonaugusto', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Nilson Augusto', 'Acessor de Vendas', 17, '', 0),
(21, 'brunovogel', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Bruno Vogel', 'Acessor de Projetos', 20, '', 0),
(22, 'pedrobrandao', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Pedro Brandão', 'Acessor de Marketing', 19, '', 1),
(23, 'fabiobarros', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Fábio Barros', 'Conselheiro', 18, '', 1),
(24, 'gledsondeoliveira', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Gledson De Oliveira', 'Conselheiro', 20, '', 1),
(25, 'henriquebastos', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Henrique Bastos', 'Trainee', 20, '', 0),
(26, 'valmiralmeida', '8cb2237d0679ca88db6464eac60da96345513964', 'Valmir Vinícius', 'Trainee', 20, '', 0),
(27, 'gustavoboanerges', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Gustavo Boanerges', 'Trainee', 20, '', 0),
(28, 'aloisiojunior', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Aloísio Júnior', 'Trainee', 20, '', 0),
(29, 'igorgarcia', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Igor Garcia', 'Trainee', 20, '', 0),
(30, 'karollima', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Karol Lima', 'Trainee', 20, '', 0),
(31, 'marcelomota', '8cb2237d0679ca88db6464eac60da96345513964\r\n', 'Marcelo Mota', 'Trainee', 20, '', 0),
(32, 'milenamelo', '8cb2237d0679ca88db6464eac60da9634551', 'Milena Melo', 'Trainee', 20, '', 0),
(33, 'douglascerqueira', '8cb2237d0679ca88db6464eac60da9634551', 'Douglas Cerqueira', 'Trainee', 20, '', 0),
(34, 'emillesampaio', '8cb2237d0679ca88db6464eac60da9634551', 'Emille Sampaio', 'Trainee', 20, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertencias`
--
ALTER TABLE `advertencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertencias`
--
ALTER TABLE `advertencias`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;