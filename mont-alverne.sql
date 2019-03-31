-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Mar-2019 às 06:44
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mont-alverne`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_financeiro`
--

CREATE TABLE `tbl_financeiro` (
  `ID` int(11) NOT NULL,
  `Data_P` date DEFAULT NULL,
  `Procedimento` text NOT NULL,
  `Valor` varchar(255) NOT NULL,
  `Forma_Pagamento` varchar(255) DEFAULT NULL,
  `Cpf` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_fperfil`
--

CREATE TABLE `tbl_fperfil` (
  `ID` int(11) NOT NULL,
  `Img` varchar(255) NOT NULL,
  `Cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_fperfil`
--

INSERT INTO `tbl_fperfil` (`ID`, `Img`, `Cpf`) VALUES
(1, 'cb33cafdc008d61db2a921211417c603.png', '02798175330'),
(2, '681f742ff83f6067a934fa3f3c9a725d.png', '444444');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_grupotrat`
--

CREATE TABLE `tbl_grupotrat` (
  `ID` int(11) NOT NULL,
  `Grupo` text NOT NULL,
  `Cpf` varchar(20) NOT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_grupotrat`
--

INSERT INTO `tbl_grupotrat` (`ID`, `Grupo`, `Cpf`, `Status`) VALUES
(13, 'Clareamento Dental', '02798175330', 'Em Tratamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_inadimplentes`
--

CREATE TABLE `tbl_inadimplentes` (
  `ID` int(11) NOT NULL,
  `Cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_necessidade`
--

CREATE TABLE `tbl_necessidade` (
  `ID` int(11) NOT NULL,
  `Necessidade` text NOT NULL,
  `Cpf` varchar(20) NOT NULL,
  `Data_Inicial` date NOT NULL,
  `Data_Final` date DEFAULT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_necessidade`
--

INSERT INTO `tbl_necessidade` (`ID`, `Necessidade`, `Cpf`, `Data_Inicial`, `Data_Final`, `Status`) VALUES
(2, 'Clareamento Dental', '444444', '2019-03-23', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_obssaude`
--

CREATE TABLE `tbl_obssaude` (
  `ID` int(11) NOT NULL,
  `Obs` text NOT NULL,
  `Cpf` varchar(20) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_obssaude`
--

INSERT INTO `tbl_obssaude` (`ID`, `Obs`, `Cpf`, `Data`) VALUES
(3, 'Paciente normal para procedimento', '444444', '2019-03-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_paciente`
--

CREATE TABLE `tbl_paciente` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `Idade` varchar(10) NOT NULL,
  `Rg` varchar(20) NOT NULL,
  `Cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_paciente`
--

INSERT INTO `tbl_paciente` (`ID`, `Nome`, `Data_Nascimento`, `Idade`, `Rg`, `Cpf`) VALUES
(1, 'Paciente Teste 1', '1996-09-08', '24 Anos', '0291065520057', '02798175330'),
(2, 'Raysasa', '2019-03-23', '22 Anos', '333333333', '444444');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_proc_realizados`
--

CREATE TABLE `tbl_proc_realizados` (
  `ID` int(11) NOT NULL,
  `Data_proc` date NOT NULL,
  `Procedimento` text NOT NULL,
  `Material` text NOT NULL,
  `Dentista` text NOT NULL,
  `Cpf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_proc_realizados`
--

INSERT INTO `tbl_proc_realizados` (`ID`, `Data_proc`, `Procedimento`, `Material`, `Dentista`, `Cpf`) VALUES
(1, '2019-03-22', 'Clareamento', 'usei um monte de  coisa, bisturi tesoura entre outras coisas', 'nome tal', '02798175330');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_tratamento`
--

CREATE TABLE `tbl_tratamento` (
  `ID` int(11) NOT NULL,
  `Tratamento` text NOT NULL,
  `Data_Inicial` date DEFAULT NULL,
  `Data_Final` date DEFAULT NULL,
  `Cpf` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Grupo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_tratamento`
--

INSERT INTO `tbl_tratamento` (`ID`, `Tratamento`, `Data_Inicial`, `Data_Final`, `Cpf`, `Status`, `Grupo`) VALUES
(29, 'Fazer raspagem', '2019-03-24', NULL, '02798175330', '1', 'Clareamento Dental'),
(30, 'aaaaaa', '2019-03-24', NULL, '02798175330', '1', 'Clareamento Dental'),
(32, 'asdas', '2019-03-24', NULL, '02798175330', '0', 'Clareamento Dental');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`ID`, `Usuario`, `Senha`, `Tipo`) VALUES
(1, 'admin@gmail.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_financeiro`
--
ALTER TABLE `tbl_financeiro`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fperfil`
--
ALTER TABLE `tbl_fperfil`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_grupotrat`
--
ALTER TABLE `tbl_grupotrat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_inadimplentes`
--
ALTER TABLE `tbl_inadimplentes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_necessidade`
--
ALTER TABLE `tbl_necessidade`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_obssaude`
--
ALTER TABLE `tbl_obssaude`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_proc_realizados`
--
ALTER TABLE `tbl_proc_realizados`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tratamento`
--
ALTER TABLE `tbl_tratamento`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_financeiro`
--
ALTER TABLE `tbl_financeiro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fperfil`
--
ALTER TABLE `tbl_fperfil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_grupotrat`
--
ALTER TABLE `tbl_grupotrat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_inadimplentes`
--
ALTER TABLE `tbl_inadimplentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_necessidade`
--
ALTER TABLE `tbl_necessidade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_obssaude`
--
ALTER TABLE `tbl_obssaude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_proc_realizados`
--
ALTER TABLE `tbl_proc_realizados`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tratamento`
--
ALTER TABLE `tbl_tratamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
