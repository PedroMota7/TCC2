-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/06/2025 às 03:58
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
(0, 43, NULL, '2025-06-02 16:49:54'),
(0, 37, NULL, '2025-06-03 20:05:14'),
(0, 37, NULL, '2025-06-04 14:46:39'),
(0, 41, NULL, '2025-06-04 17:30:47'),
(0, 39, NULL, '2025-06-04 17:32:12'),
(0, 43, NULL, '2025-06-04 17:32:19'),
(0, 40, NULL, '2025-06-04 18:09:01'),
(0, 45, NULL, '2025-06-04 18:55:17'),
(0, 46, NULL, '2025-06-04 21:58:06'),
(0, 42, NULL, '2025-06-04 21:59:49'),
(0, 48, NULL, '2025-06-06 13:47:38');

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
(61, 'Beatriz Moura ', 'bisocialgame@gmail.com', '077.495.391-82', '39.987.241/0001-01', '$2y$10$jbgvAYb9JYWgYSAMAuU0Vukrih0nScsEEJtyNF1Azws82t6f/meYm');

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
(37, 'Lucas Silva Oliveira', '287.265.140-36', 'lucas@gmail.com', '1992-08-15', '(61) 98829-4756', '8781fcfff26565f5afa9f74d72cefb78'),
(39, 'Isabela Cardoso Santos', '864.112.090-49', 'isabela@gmail.com', '1997-02-12', '(61) 98935-2894', 'e0f9f24158fb82d5560a4ae8e8d317ee'),
(40, 'Ricardo Santos Alves', '887.806.110-79', 'ricardo@gmail.com', '2000-03-14', '(61) 92764-8343', 'a10b3110602409b62dc1b25f902509cc'),
(41, 'Camila Almeida Freitas', '809.044.750-34', 'camila@gmail.com', '1996-05-19', '(61) 95308-2965', '388a9a180c0588768409b101d4370f94'),
(42, 'Fernando Rodrigues Pereira', '077.495.391-82', 'jose@gmail.com', '1983-06-05', '(61) 96823-9532', '4c0c871d87556774bf276fbd767c6902'),
(43, 'Juliana Lima Souza', '210.599.940-97', 'juliana@gmail.com', '1997-11-22', '(61) 96823-9543', 'fed4e5892cddc92f95f64465472359f3'),
(45, 'Paulo Jeferson Rosa', '083.537.060-75', 'p-aulo18@hotmail.com', '2025-02-15', '(61) 98935-2894', 'e1341ca0287c39ee033373f36ca90dec'),
(48, 'Diekson Rosa de Moura', '484.054.740-80', 'dieksonrosa@gmail.com', '1993-09-07', '(61) 98428-7404', '69270c202039035a620b10ba6fc03d78');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `db_use`
--
ALTER TABLE `db_use`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
