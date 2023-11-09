CREATE DATABASE IF NOT EXISTS `mimoofc`;
USE `mimoofc`;

CREATE TABLE `produto` (
  `id_produto` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `quantidade` int NOT NULL,
  `data_registro` date NOT NULL,
  `valor` double(10,2) DEFAULT NULL,
  `link_img` varchar(255) DEFAULT NULL
);


ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);


ALTER TABLE `produto`
  MODIFY `id_produto` int NOT NULL AUTO_INCREMENT;