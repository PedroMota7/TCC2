-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/06/2025 às 22:01
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
-- Banco de dados: `fluxo_tech`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `data_hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acessos`
--

INSERT INTO `acessos` (`id`, `pessoa_id`, `nome`, `data_hora`) VALUES
(1, NULL, NULL, '2025-06-01 21:21:50'),
(5, 62, NULL, '2025-06-01 21:38:30'),
(6, 61, NULL, '2025-06-01 21:38:55'),
(0, 43, NULL, '2025-06-02 16:49:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`ID`, `NOME`, `email`, `CPF`, `cnpj`, `senha`) VALUES
(60, 'Julia Maria Silva', 'julia@gmail.com', '210.263.950-97', '65.368.003/0001-28', '$2y$10$TJrfHwUP2hDAcjqRZOeY6emiLZo3oGgWVbmkJdWDVExtKqQXRFYaW'),
(61, 'Adélia Dias Alves da Mota', 'diasalvesadelia@gmail.com', '839.866.696-04', '25.433.228/0001-21', '$2y$10$4kwKrRKiwbktd9v4EB08Tu1cVs/Gd9YSBxmCu7mjz9.qtsR73IC8a'),
(62, 'MARIA EDUARDA DIAS MOTA', 'pedtropaulo@gmail.com', '077.969.841-03', '11.111.111/1111-11', '$2y$10$ov0YQiCsrmZQfJTx4r3djusp0QOGj6Y5fmnN8w1oMjc/aeTV9SZXS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `db_use`
--

CREATE TABLE `db_use` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(80) DEFAULT NULL,
  `DATA_NASC` date DEFAULT NULL,
  `TELEFONE` varchar(15) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `db_use`
--

INSERT INTO `db_use` (`ID`, `NOME`, `CPF`, `EMAIL`, `DATA_NASC`, `TELEFONE`, `qr_code`) VALUES
(43, 'pedro', '103.123.101-37', 'pedtropaulo@gmail.com', '3333-02-23', '(61) 99999-9999', '09c189ba51ff182f4e18f0bb31e4c876');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `db_use`
--
ALTER TABLE `db_use`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `db_use`
--
ALTER TABLE `db_use`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
