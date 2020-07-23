-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2019 às 03:07
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igreja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_cat`
--

CREATE TABLE `lc_cat` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_cat`
--

INSERT INTO `lc_cat` (`id`, `nome`) VALUES
(2, 'CAIXA'),
(3, 'Dízimo'),
(4, 'Oferta'),
(5, 'Spotify'),
(6, 'Conta de Agua'),
(7, 'Conta de Luz'),
(8, 'Comida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lc_movimento`
--

CREATE TABLE `lc_movimento` (
  `id` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  `descricao` longtext,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lc_movimento`
--

INSERT INTO `lc_movimento` (`id`, `tipo`, `dia`, `mes`, `ano`, `cat`, `descricao`, `valor`) VALUES
(13, 1, 11, 1, 2019, 3, 'Diego', 156.87),
(14, 1, 11, 1, 2019, 3, 'Henrique', 189.45),
(19, 1, 11, 1, 2019, 5, 'Paulo', 156.87),
(20, 1, NULL, 2, 2019, 3, 'Teste', 156.87);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cargo` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `email`, `telefone`, `celular`, `data_nascimento`, `status`, `foto`, `data_cadastro`, `data_alteracao`, `cargo`, `senha`, `nivel`) VALUES
(1, 'Programador', '00000000000', 'paulo_hbs17@hotmail.com', '0000000000', '75988914101', '1998-06-12', 'ativo', '05012019_13775530_1753789811557389_914756884140324688_n.jpg', '2019-01-05 03:08:46', '0000-00-00 00:00:00', 'Programador', '_phbs', 1),
(13, 'Pastor', '09090098767', 'pastor@pastor.com', '7534243006', '75988914102', '1998-06-12', 'Ativo', '11012019_16115059_1839630796306623_7353787665396888471_n.jpg', '2019-01-05 03:24:34', '0000-00-00 00:00:00', 'Pastor', '123', 4),
(14, 'Tisoureiro', '09090098767', 'email@tisoureiro.com', '7534243006', '75988914102', '1998-06-12', 'Ativo', '05012019_18519535_1901434170126285_2109718002459826466_n.jpg', '2019-01-05 03:25:19', '0000-00-00 00:00:00', 'Tisoureiro', '123', 3),
(15, 'Visitante', '09090098767', 'visitante@visitante.com', '7534243006', '75988914101', '1998-06-12', 'Ativo', '11012019_18222650_1921361464744728_3755663050462360050_n.jpg', '2019-01-05 04:35:47', '0000-00-00 00:00:00', 'Visitante', '123456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lc_cat`
--
ALTER TABLE `lc_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lc_movimento`
--
ALTER TABLE `lc_movimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lc_cat`
--
ALTER TABLE `lc_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lc_movimento`
--
ALTER TABLE `lc_movimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
