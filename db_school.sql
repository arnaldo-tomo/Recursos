-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Out-2021 às 11:21
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio__evento`
--

DROP TABLE IF EXISTS `anuncio__evento`;
CREATE TABLE IF NOT EXISTS `anuncio__evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_evento_id` int(11) NOT NULL,
  `destinatario_id` int(11) NOT NULL,
  `assunto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date NOT NULL,
  `foto` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_evento_id` (`tipo_evento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio__tipo_evento`
--

DROP TABLE IF EXISTS `anuncio__tipo_evento`;
CREATE TABLE IF NOT EXISTS `anuncio__tipo_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao__avaliacoes`
--

DROP TABLE IF EXISTS `avaliacao__avaliacoes`;
CREATE TABLE IF NOT EXISTS `avaliacao__avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `observacao` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ficheiro` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `turma_id` (`turma_id`),
  KEY `disciplina_id` (`disciplina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao__notas`
--

DROP TABLE IF EXISTS `avaliacao__notas`;
CREATE TABLE IF NOT EXISTS `avaliacao__notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `tipo_avaliacao_id` int(11) NOT NULL,
  `nota` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota_maxima` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estudante_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `turma_id` (`turma_id`),
  KEY `estudante_id` (`estudante_id`),
  KEY `tipo_avaliacao_id` (`tipo_avaliacao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao__tipo_avaliacao`
--

DROP TABLE IF EXISTS `avaliacao__tipo_avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao__tipo_avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario__dias`
--

DROP TABLE IF EXISTS `calendario__dias`;
CREATE TABLE IF NOT EXISTS `calendario__dias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario__exames`
--

DROP TABLE IF EXISTS `calendario__exames`;
CREATE TABLE IF NOT EXISTS `calendario__exames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `sala` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_avaliacao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `disciplina_id` (`disciplina_id`),
  KEY `tipo_avaliacao_id` (`tipo_avaliacao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario__horario_academico`
--

DROP TABLE IF EXISTS `calendario__horario_academico`;
CREATE TABLE IF NOT EXISTS `calendario__horario_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_id` int(11) NOT NULL,
  `hora` time NOT NULL,
  `curso_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `sala` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` year(4) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dia_id` (`dia_id`),
  KEY `curso_id` (`curso_id`),
  KEY `disciplina_id` (`disciplina_id`),
  KEY `turma_id` (`turma_id`),
  KEY `periodo_id` (`periodo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario__periodo`
--

DROP TABLE IF EXISTS `calendario__periodo`;
CREATE TABLE IF NOT EXISTS `calendario__periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente__dados_academicos`
--

DROP TABLE IF EXISTS `docente__dados_academicos`;
CREATE TABLE IF NOT EXISTS `docente__dados_academicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel_academico_id` int(11) NOT NULL,
  `universidade` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano_conclusao` year(4) DEFAULT NULL,
  `media` int(11) DEFAULT NULL,
  `professor_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel_academico_id` (`nivel_academico_id`),
  KEY `professor_id` (`professor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente__dados_contacto`
--

DROP TABLE IF EXISTS `docente__dados_contacto`;
CREATE TABLE IF NOT EXISTS `docente__dados_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `morada` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada2` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidade` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidade` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professor_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_id` (`professor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente__niivel_academico`
--

DROP TABLE IF EXISTS `docente__niivel_academico`;
CREATE TABLE IF NOT EXISTS `docente__niivel_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola__curso_classe`
--

DROP TABLE IF EXISTS `escola__curso_classe`;
CREATE TABLE IF NOT EXISTS `escola__curso_classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola__disciplina`
--

DROP TABLE IF EXISTS `escola__disciplina`;
CREATE TABLE IF NOT EXISTS `escola__disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola__turmas`
--

DROP TABLE IF EXISTS `escola__turmas`;
CREATE TABLE IF NOT EXISTS `escola__turmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso_id` int(11) NOT NULL,
  `codigo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante__dados_academicos`
--

DROP TABLE IF EXISTS `estudante__dados_academicos`;
CREATE TABLE IF NOT EXISTS `estudante__dados_academicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `estudante_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `turma_id` (`turma_id`),
  KEY `estudante_id` (`estudante_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante__dados_encarregado`
--

DROP TABLE IF EXISTS `estudante__dados_encarregado`;
CREATE TABLE IF NOT EXISTS `estudante__dados_encarregado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profissao` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estudante_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante__dados_filiacao`
--

DROP TABLE IF EXISTS `estudante__dados_filiacao`;
CREATE TABLE IF NOT EXISTS `estudante__dados_filiacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pai` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_mae` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profissao` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_alternativo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidade` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estudante_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remetente` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinatario` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assunto` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensagem` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apelido` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero_id` int(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `contacto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_alternativo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distrito` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bilhete_identificacao` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_access_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `user_access_id` (`user_access_id`),
  KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_access`
--

DROP TABLE IF EXISTS `user_access`;
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anuncio__evento`
--
ALTER TABLE `anuncio__evento`
  ADD CONSTRAINT `anuncio__evento_ibfk_1` FOREIGN KEY (`tipo_evento_id`) REFERENCES `anuncio__evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacao__avaliacoes`
--
ALTER TABLE `avaliacao__avaliacoes`
  ADD CONSTRAINT `avaliacao__avaliacoes_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `escola__curso_classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao__avaliacoes_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `escola__turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao__avaliacoes_ibfk_3` FOREIGN KEY (`disciplina_id`) REFERENCES `escola__disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `avaliacao__notas`
--
ALTER TABLE `avaliacao__notas`
  ADD CONSTRAINT `avaliacao__notas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `escola__curso_classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao__notas_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `escola__turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao__notas_ibfk_3` FOREIGN KEY (`estudante_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `avaliacao__notas_ibfk_4` FOREIGN KEY (`tipo_avaliacao_id`) REFERENCES `avaliacao__tipo_avaliacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `calendario__exames`
--
ALTER TABLE `calendario__exames`
  ADD CONSTRAINT `calendario__exames_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `escola__disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__exames_ibfk_2` FOREIGN KEY (`tipo_avaliacao_id`) REFERENCES `avaliacao__tipo_avaliacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `calendario__horario_academico`
--
ALTER TABLE `calendario__horario_academico`
  ADD CONSTRAINT `calendario__horario_academico_ibfk_1` FOREIGN KEY (`dia_id`) REFERENCES `calendario__dias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__horario_academico_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `escola__curso_classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__horario_academico_ibfk_3` FOREIGN KEY (`disciplina_id`) REFERENCES `escola__disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__horario_academico_ibfk_4` FOREIGN KEY (`turma_id`) REFERENCES `escola__turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__horario_academico_ibfk_5` FOREIGN KEY (`periodo_id`) REFERENCES `calendario__periodo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `docente__dados_academicos`
--
ALTER TABLE `docente__dados_academicos`
  ADD CONSTRAINT `docente__dados_academicos_ibfk_1` FOREIGN KEY (`nivel_academico_id`) REFERENCES `docente__niivel_academico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docente__dados_academicos_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `docente__dados_contacto`
--
ALTER TABLE `docente__dados_contacto`
  ADD CONSTRAINT `docente__dados_contacto_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `escola__turmas`
--
ALTER TABLE `escola__turmas`
  ADD CONSTRAINT `escola__turmas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `escola__curso_classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `estudante__dados_academicos`
--
ALTER TABLE `estudante__dados_academicos`
  ADD CONSTRAINT `estudante__dados_academicos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `escola__curso_classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudante__dados_academicos_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `escola__turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudante__dados_academicos_ibfk_3` FOREIGN KEY (`estudante_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_access_id`) REFERENCES `user_access` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
