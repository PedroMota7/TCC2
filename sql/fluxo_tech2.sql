-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/06/2025 às 02:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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
(6, 61, NULL, '2025-06-01 21:38:55');

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
(59, 'taypan', 'taypanpalemira32@gmail.com', '103.123.101-37', '11.111.111/1111-11', '$2y$10$dOH03I3nrOyc2vttPG898umSAisv8wGAyNO4XavlxeXIjovYBneEK'),
(60, 'biatriz', 'bia@gmail.com', '629.571.450-14', '11.111.111/1111-11', '$2y$10$30iOJPxDT5n3HRJNLywGsOPbM3Pjr1MsIsyti/IvLHRd0RkzmI9Qi');

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
(61, 'taypan', '103.123.101-37', 'taypanpalmeira70@gmail.com', '0333-03-23', '(61) 99909-0943', 'eb188b3e03f4136b109e7bc7ac8fbb92'),
(62, 'aobae', '675.152.270-36', 'taypanpalemira32@gmail.com', '0222-06-23', '(61) 99909-0943', '6c2d3034f70a327540bef2d2c6bee5dd');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa_id` (`pessoa_id`);

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
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `db_use`
--
ALTER TABLE `db_use`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acessos`
--
ALTER TABLE `acessos`
  ADD CONSTRAINT `acessos_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `db_use` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
