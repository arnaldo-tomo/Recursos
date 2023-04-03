-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Nov-2021 às 13:11
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
-- Estrutura da tabela `anuncio__destinatario`
--

DROP TABLE IF EXISTS `anuncio__destinatario`;
CREATE TABLE IF NOT EXISTS `anuncio__destinatario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `anuncio__destinatario`
--

INSERT INTO `anuncio__destinatario` (`id`, `nome`) VALUES
(1, 'Estudantes'),
(2, 'Docentes'),
(3, 'Todos');

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
  `inicio` datetime DEFAULT NULL,
  `fim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_evento_id` (`tipo_evento_id`),
  KEY `destinatario_id` (`destinatario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `anuncio__evento`
--

INSERT INTO `anuncio__evento` (`id`, `tipo_evento_id`, `destinatario_id`, `assunto`, `descricao`, `data`, `foto`, `inicio`, `fim`) VALUES
(1, 1, 3, 'VI GRADUAÇÃO', 'grduação', '2021-10-24', 'fotos/anuncios/graduation-g384444594_1920.jpg', NULL, NULL),
(2, 2, 1, 'Quero Roolups', 'fgdgd', '2021-10-24', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio__tipo_evento`
--

DROP TABLE IF EXISTS `anuncio__tipo_evento`;
CREATE TABLE IF NOT EXISTS `anuncio__tipo_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `anuncio__tipo_evento`
--

INSERT INTO `anuncio__tipo_evento` (`id`, `nome`) VALUES
(1, 'Academico'),
(2, 'Desportivo'),
(3, 'Administrativo');

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
  `dia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `calendario__dias`
--

INSERT INTO `calendario__dias` (`id`, `dia`) VALUES
(1, 'Segunda-Feira'),
(2, 'Terça-Feira'),
(3, 'Quarta-Feira'),
(4, 'Quinta-Feira'),
(5, 'Sexta-Feira'),
(6, 'Sábado');

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
  `hora_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `sala` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` year(4) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dia_id` (`dia_id`),
  KEY `curso_id` (`curso_id`),
  KEY `disciplina_id` (`disciplina_id`),
  KEY `turma_id` (`turma_id`),
  KEY `periodo_id` (`periodo_id`),
  KEY `hora_id` (`hora_id`),
  KEY `docente_id` (`docente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `calendario__horario_academico`
--

INSERT INTO `calendario__horario_academico` (`id`, `dia_id`, `hora_id`, `curso_id`, `turma_id`, `disciplina_id`, `docente_id`, `sala`, `ano`, `periodo_id`) VALUES
(1, 1, 1, 1, 1, 1, 1, '10', 2021, 1),
(2, 2, 1, 1, 1, 2, 1, '4', 2021, 1),
(3, 3, 2, 1, 1, 1, 1, '10', 2021, 1),
(4, 3, 1, 1, 1, 1, 1, '10', 2021, 1),
(5, 5, 2, 1, 1, 1, 1, '8', 2021, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario__horas`
--

DROP TABLE IF EXISTS `calendario__horas`;
CREATE TABLE IF NOT EXISTS `calendario__horas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `periodo_id` (`periodo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `calendario__horas`
--

INSERT INTO `calendario__horas` (`id`, `hora`, `periodo_id`) VALUES
(1, '6:00-7:00h', 1),
(2, '7:00-8:00h', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario__periodo`
--

DROP TABLE IF EXISTS `calendario__periodo`;
CREATE TABLE IF NOT EXISTS `calendario__periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `calendario__periodo`
--

INSERT INTO `calendario__periodo` (`id`, `nome`) VALUES
(1, 'Laboral'),
(2, 'Pós-Laboral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente__dados_academicos`
--

DROP TABLE IF EXISTS `docente__dados_academicos`;
CREATE TABLE IF NOT EXISTS `docente__dados_academicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_formacao` varchar(700) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel_academico_id` int(11) NOT NULL,
  `universidade_id` int(11) DEFAULT NULL,
  `ano_conclusao` year(4) DEFAULT NULL,
  `media` int(11) DEFAULT NULL,
  `professor_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivel_academico_id` (`nivel_academico_id`),
  KEY `professor_id` (`professor_id`),
  KEY `universidade_id` (`universidade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `docente__dados_academicos`
--

INSERT INTO `docente__dados_academicos` (`id`, `area_formacao`, `nivel_academico_id`, `universidade_id`, `ano_conclusao`, `media`, `professor_id`) VALUES
(1, 'Engenharia florestal', 1, 2, 2010, 15, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `docente__dados_contacto`
--

INSERT INTO `docente__dados_contacto` (`id`, `morada`, `morada2`, `nacionalidade`, `localidade`, `provincia`, `email`, `professor_id`) VALUES
(1, 'rua 6 manga', 'rua 6 manga', 'MOÇAMBICANA', 'Beira', 'Sofala', 'celsose@gmail.com', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente__niivel_academico`
--

DROP TABLE IF EXISTS `docente__niivel_academico`;
CREATE TABLE IF NOT EXISTS `docente__niivel_academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `docente__niivel_academico`
--

INSERT INTO `docente__niivel_academico` (`id`, `nome`) VALUES
(1, 'Licenciatura'),
(2, 'Mestrado'),
(3, 'Phd');

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
  `docente_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docente_id` (`docente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escola__curso_classe`
--

INSERT INTO `escola__curso_classe` (`id`, `nome`, `codigo`, `descricao`, `docente_id`) VALUES
(1, 'Enfermagem Geral', NULL, NULL, 1),
(2, 'Nutrição Dietética', NULL, NULL, 1),
(3, 'Técnicos de Farmacia', NULL, NULL, 1),
(4, 'Técnicos de Medicina Geral', NULL, NULL, 1),
(5, 'Técnicos de Medicina Preventiva', NULL, NULL, 1),
(6, 'Celso Jose', '12345678', 'fsf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola__curso_disciplinas`
--

DROP TABLE IF EXISTS `escola__curso_disciplinas`;
CREATE TABLE IF NOT EXISTS `escola__curso_disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `disciplina_id` (`disciplina_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escola__curso_disciplinas`
--

INSERT INTO `escola__curso_disciplinas` (`id`, `curso_id`, `disciplina_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola__disciplina`
--

DROP TABLE IF EXISTS `escola__disciplina`;
CREATE TABLE IF NOT EXISTS `escola__disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escola__disciplina`
--

INSERT INTO `escola__disciplina` (`id`, `nome`, `codigo`, `descricao`) VALUES
(1, 'Português', 'PT', 'Disciplina de portugues'),
(2, 'Português', 'PT', 'Disciplina de portugues');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola__disciplina_docentes`
--

DROP TABLE IF EXISTS `escola__disciplina_docentes`;
CREATE TABLE IF NOT EXISTS `escola__disciplina_docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `disciplina_id` (`disciplina_id`),
  KEY `docente_id` (`docente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escola__disciplina_docentes`
--

INSERT INTO `escola__disciplina_docentes` (`id`, `disciplina_id`, `docente_id`) VALUES
(1, 1, 1),
(2, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escola__turmas`
--

INSERT INTO `escola__turmas` (`id`, `turma`, `curso_id`, `codigo`, `descricao`) VALUES
(1, 'A', 1, NULL, NULL),
(2, 'B', 1, NULL, NULL),
(3, 'A', 3, NULL, NULL),
(4, 'B', 3, NULL, NULL),
(5, 'C', 1, '12345678', 'sfd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante__dados_academicos`
--

DROP TABLE IF EXISTS `estudante__dados_academicos`;
CREATE TABLE IF NOT EXISTS `estudante__dados_academicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `estudante_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  KEY `turma_id` (`turma_id`),
  KEY `estudante_id` (`estudante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estudante__dados_academicos`
--

INSERT INTO `estudante__dados_academicos` (`id`, `codigo`, `curso_id`, `turma_id`, `estudante_id`) VALUES
(1, '12345678', 3, 3, 4);

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
  `local_trabalho` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_alternativo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estudante_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estudante__dados_encarregado`
--

INSERT INTO `estudante__dados_encarregado` (`id`, `nome`, `email`, `profissao`, `local_trabalho`, `contacto`, `contacto_alternativo`, `morada`, `estudante_id`) VALUES
(1, 'Celso Jose', 'celsojuliojose@gmail.com', 'professor', 'beira', '334859594554', '5353453334', 'matacuane', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante__dados_filiacao`
--

DROP TABLE IF EXISTS `estudante__dados_filiacao`;
CREATE TABLE IF NOT EXISTS `estudante__dados_filiacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pai` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_mae` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profissao_pai` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profissao_mae` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada_pai` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada_mae` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_trabalho_mae` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_trabalho_pai` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estudante_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estudante__dados_filiacao`
--

INSERT INTO `estudante__dados_filiacao` (`id`, `nome_pai`, `nome_mae`, `profissao_pai`, `profissao_mae`, `morada_pai`, `morada_mae`, `local_trabalho_mae`, `local_trabalho_pai`, `estudante_id`) VALUES
(1, 'Celso Jose', 'Fausia Saguate', 'Professor', 'Professor', 'matacuane', 'matacuane', 'Beira', 'Beira', 1),
(2, 'Celso Jose', 'Fausia Saguate', 'Professor', 'Professor', 'matacuane', 'matacuane', 'Beira', 'Beira', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

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
-- Estrutura da tabela `universidades`
--

DROP TABLE IF EXISTS `universidades`;
CREATE TABLE IF NOT EXISTS `universidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `universidades`
--

INSERT INTO `universidades` (`id`, `nome`) VALUES
(1, 'UEM (Universidade Eduardo Mondlane)'),
(2, 'UNIZAMBEZE'),
(3, 'UNILÚRIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apelido` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero_id` int(11) DEFAULT NULL,
  `data_nasc` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_alternativo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distrito` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bilhete_identificacao` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_access_id` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `user_access_id` (`user_access_id`),
  KEY `genero_id` (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `codigo`, `apelido`, `name`, `email`, `genero_id`, `data_nasc`, `contacto`, `contacto_alternativo`, `morada`, `distrito`, `provincia`, `bilhete_identificacao`, `foto`, `user_access_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Celso Julio', 'celsojuliojose@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '$2y$10$y/xISTz2eb.RPZAeQaxReO0e7ih60l7X1ZgIG/vUwPgYP.UB1FmQG', NULL, '2021-10-13 06:33:47', '2021-10-13 06:33:47'),
(4, NULL, 'Jose', 'Miguel', 'celso@gmail.com', 1, '10/12/2021', '+258 876242932', NULL, 'matacuane', 'Beira', 'Sofala', '1234556788', 'fotos/estudantes/graduation-g384444594_1920.jpg', 1, NULL, '$2y$10$CxytjmGRbfiTlcQqstwUmeh0subAEU2cGPwe8Yerv4zY4pN9qYgOe', NULL, '2021-10-24 07:37:56', '2021-10-24 07:37:56'),
(5, NULL, 'Jose', 'Celso Jose', 'celsose@gmail.com', 1, '10/20/2021', '+258 876242932', NULL, NULL, NULL, NULL, NULL, 'fotos/docentes/graduation-g384444594_1920.jpg', 2, NULL, '$2y$10$c1LTKIOuReUcAPaCOgMx0.5yOBa7n2biq9wmkOj0wejyLtuzjyQ5m', NULL, '2021-10-24 09:07:59', '2021-10-24 09:07:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_access`
--

DROP TABLE IF EXISTS `user_access`;
CREATE TABLE IF NOT EXISTS `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user_access`
--

INSERT INTO `user_access` (`id`, `nome`) VALUES
(1, 'Estudante'),
(2, 'Docente'),
(3, 'Administrador');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `anuncio__evento`
--
ALTER TABLE `anuncio__evento`
  ADD CONSTRAINT `anuncio__evento_ibfk_1` FOREIGN KEY (`tipo_evento_id`) REFERENCES `anuncio__evento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anuncio__evento_ibfk_2` FOREIGN KEY (`destinatario_id`) REFERENCES `anuncio__destinatario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `calendario__horario_academico_ibfk_5` FOREIGN KEY (`periodo_id`) REFERENCES `calendario__periodo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__horario_academico_ibfk_6` FOREIGN KEY (`hora_id`) REFERENCES `calendario__horas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendario__horario_academico_ibfk_7` FOREIGN KEY (`docente_id`) REFERENCES `docente__dados_academicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `calendario__horas`
--
ALTER TABLE `calendario__horas`
  ADD CONSTRAINT `calendario__horas_ibfk_1` FOREIGN KEY (`periodo_id`) REFERENCES `calendario__periodo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `docente__dados_academicos`
--
ALTER TABLE `docente__dados_academicos`
  ADD CONSTRAINT `docente__dados_academicos_ibfk_1` FOREIGN KEY (`nivel_academico_id`) REFERENCES `docente__niivel_academico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docente__dados_academicos_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docente__dados_academicos_ibfk_3` FOREIGN KEY (`universidade_id`) REFERENCES `universidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `docente__dados_contacto`
--
ALTER TABLE `docente__dados_contacto`
  ADD CONSTRAINT `docente__dados_contacto_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `escola__curso_classe`
--
ALTER TABLE `escola__curso_classe`
  ADD CONSTRAINT `escola__curso_classe_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docente__dados_academicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `escola__curso_disciplinas`
--
ALTER TABLE `escola__curso_disciplinas`
  ADD CONSTRAINT `escola__curso_disciplinas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `escola__curso_classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `escola__curso_disciplinas_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `escola__disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `escola__disciplina_docentes`
--
ALTER TABLE `escola__disciplina_docentes`
  ADD CONSTRAINT `escola__disciplina_docentes_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `escola__disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `escola__disciplina_docentes_ibfk_2` FOREIGN KEY (`docente_id`) REFERENCES `docente__dados_academicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
