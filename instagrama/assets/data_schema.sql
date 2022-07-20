-- SQL para o Projeto da Rede Social de Fotos
-- Version 1.0 (02/07/2022)
-- Autor: Prof. Rodrigo Cezario da Silva

--
-- Banco de dados: `fotoweb`
--
CREATE DATABASE IF NOT EXISTS `fotoweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fotoweb`;

--
-- Estrutura para tabela `Pessoa`
--

CREATE TABLE `Pessoa` (
  `PessoaID` INTEGER NOT NULL,
  `PessoaNome` VARCHAR(60) NOT NULL,
  `PessoaNick` VARCHAR(30) NOT NULL,
  `PessoaEmail` VARCHAR(80) NOT NULL,
  `PessoaFoto` VARCHAR(20) NULL,
  `PessoaSenha` VARCHAR(20) NOT NULL,
  `PessoaDataCad` DATETIME NOT NULL
);


--
-- Estrutura para tabela `Publicacao`
--

CREATE TABLE `Publicacao` (
  `PubID` INTEGER NOT NULL,
  `PessoaID` INTEGER NOT NULL,
  `PubData` DATETIME NOT NULL,
  `PubArquivo` VARCHAR(20) NOT NULL,
  `PubTexto` TEXT NULL
);


--
-- Estrutura para tabela `Curtida`
--

CREATE TABLE `Curtida` (
  `CurtID` INTEGER NOT NULL,
  `PubID` INTEGER NOT NULL,
  `PessoaID` INTEGER NOT NULL
);

--
-- Estrutura para tabela `PessoaAmigos`
--

CREATE TABLE `PessoaAmigos` (
  `PesAmID` INTEGER NOT NULL,
  `PessoaID` INTEGER NOT NULL,
  `AmigoID` INTEGER NOT NULL
);

--
-- Índices de tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  ADD PRIMARY KEY (`PessoaID`);

--
-- Índices de tabela `Publicacao`
--
ALTER TABLE `Publicacao`
  ADD PRIMARY KEY (`PubID`),
  ADD KEY `fk_publicacao_pessoa` (`PessoaID`);

--
-- Índices de tabela `PessoaAmigos`
--
ALTER TABLE `PessoaAmigos`
  ADD PRIMARY KEY (`PesAmID`),
  ADD UNIQUE KEY `PessoaID` (`PessoaID`,`AmigoID`);

--
-- Índices de tabela `Curtida`
--
ALTER TABLE `Curtida`
  ADD PRIMARY KEY (`CurtID`),
  ADD KEY `fk_curtida_publicacao` (`PubID`),
  ADD KEY `fk_curtida_pessoa` (`PessoaID`);


--
-- AUTO_INCREMENT de tabela `Curtida`
--
ALTER TABLE `Curtida`
  MODIFY `CurtID` INTEGER NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  MODIFY `PessoaID` INTEGER NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `PessoaAmigos`
--
ALTER TABLE `PessoaAmigos`
  MODIFY `PesAmID` INTEGER NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Publicacao`
--
ALTER TABLE `Publicacao`
  MODIFY `PubID` INTEGER NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas `Curtida`
--
ALTER TABLE `Curtida`
  ADD CONSTRAINT `fk_curtida_pessoa` FOREIGN KEY (`PessoaID`) REFERENCES `Pessoa` (`PessoaID`),
  ADD CONSTRAINT `fk_curtida_publicacao` FOREIGN KEY (`PubID`) REFERENCES `Publicacao` (`PubID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `PessoaAmigos`
--
ALTER TABLE `PessoaAmigos`
  ADD CONSTRAINT `fk_pessoa_amigos` FOREIGN KEY (`AmigoID`) REFERENCES `Pessoa` (`PessoaID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pessoaamigos_pessoa` FOREIGN KEY (`PessoaID`) REFERENCES `Pessoa` (`PessoaID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `Publicacao`
--
ALTER TABLE `Publicacao`
  ADD CONSTRAINT `fk_publicacao_pessoa` FOREIGN KEY (`PessoaID`) REFERENCES `Pessoa` (`PessoaID`) ON DELETE CASCADE;
COMMIT;
