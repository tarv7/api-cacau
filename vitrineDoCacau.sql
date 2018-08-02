-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 02/08/2018 às 00:05
-- Versão do servidor: 5.7.22-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vitrineDoCacau`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_eventos`
--

CREATE TABLE `tb_eventos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `confirmaram` int(11) NOT NULL,
  `destaque` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_eventos`
--

INSERT INTO `tb_eventos` (`id`, `nome`, `cidade`, `endereco`, `descricao`, `email`, `telefone`, `banner`, `data`, `latitude`, `longitude`, `confirmaram`, `destaque`, `created_at`, `updated_at`) VALUES
(1, 'NIBS', 'Ilheus', 'Rua A', 'É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por \'lorem ipsum\' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).', 'nibs@gmail.com', '7391288213', '', '', 0, 0, 0, 1, NULL, '2018-05-12'),
(2, 'Uesc cic', 'Ilheus', 'Rua Z', 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.', 'uesccic@gmail.com', '7327127493', '', '', 0, 0, 0, 1, NULL, NULL),
(3, 'cacau tecnologico', 'itabuna', 'Rua Ahaga', 'Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do "de Finibus Bonorum et Malorum" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, "Lorem Ipsum dolor sit amet..." vem de uma linha na seção 1.10.32.\r\n\r\nO trecho padrão original de Lorem Ipsum, usado desde o século XVI, está reproduzido abaixo para os interessados. Seções 1.10.32 e 1.10.33 de "de Finibus Bonorum et Malorum" de Cicero também foram reproduzidas abaixo em sua forma exata original, acompanhada das versões para o inglês da tradução feita por H. Rackham em 1914.', 'tecnologico@gmail.com', '73981289218', '', '', 0, 0, 2, 0, NULL, '2018-05-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `artesanal` int(11) NOT NULL,
  `exportador` int(11) NOT NULL,
  `certificacao` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_produtor` int(11) NOT NULL,
  `curtidas` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `nome`, `artesanal`, `exportador`, `certificacao`, `foto`, `id_produtor`, `curtidas`, `descricao`, `updated_at`, `created_at`) VALUES
(1, 'Nibs', 0, 0, 1, 'https://drrocha.com.br/wp-content/uploads/2017/05/img1010392.jpg', 1, 0, '', NULL, NULL),
(2, '100%', 0, 0, 0, 'https://drrocha.com.br/wp-content/uploads/2017/05/img1010391.jpg', 1, 4, '', '2018-05-12', NULL),
(3, 'amendoa', 0, 0, 1, 'https://drrocha.com.br/wp-content/uploads/2017/05/img1010390.jpg', 2, 1, '', '2018-05-12', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `artesanal` tinyint(1) NOT NULL,
  `exportador` varchar(255) NOT NULL,
  `certificacao` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `curtidas` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `tipo`, `artesanal`, `exportador`, `certificacao`, `nome`, `email`, `senha`, `foto`, `cnpj`, `cidade`, `estado`, `endereco`, `latitude`, `longitude`, `descricao`, `curtidas`, `created_at`, `updated_at`) VALUES
(1, 'produtor', 0, 'false', 0, 'Akara', 'akara@gmail.com', '123', 'https://drrocha.com.br/wp-content/uploads/2017/05/img1010394.jpg', '987654321', 'Ilheus', 'bahia', '', '123', '321', '', 8, '2018-05-11 23:12:16', '2018-05-12 09:22:44'),
(2, 'comprador', 0, 'true', 0, 'Thales Cacau', 'thales@gmail.com', '321', 'https://drrocha.com.br/wp-content/uploads/2017/05/img1010393.jpg', '1234567890', 'Ipiau', 'bahia', 'rua A', '678', '543', '', 1, '2018-05-11 23:28:14', '2018-05-12 09:22:35');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_eventos`
--
ALTER TABLE `tb_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
