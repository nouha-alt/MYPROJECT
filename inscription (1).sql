-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 jan. 2026 à 21:17
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `payment_method` varchar(50) NOT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `transaction_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `user_name`, `user_email`, `phone`, `address`, `products`, `payment_method`, `card_number`, `transaction_number`, `created_at`) VALUES
(1, 'llll', 'nouhano@gmail.com', '055555555', 'hgfdsdfghlo', '[{\"name\":\"\\n            Montre Homme\\/Femme        \",\"price\":\"\\n                3000 DA\\n            \",\"image\":\"https:\\/\\/i.pinimg.com\\/736x\\/69\\/13\\/03\\/691303326115216227313f6c57db19c9.jpg\",\"quantity\":1}]', 'cash', '23456789', 'jçoijhuyg', '2025-12-29 10:00:35'),
(49, 'yosra', 'yousraim@gmail.com', '088888888888', 'BOUZANA', '[{\"name\":\"pull pour filles\",\"price\":\"4500 DA\",\"image\":\"https:\\/\\/princessace.com\\/cdn\\/shop\\/files\\/oversized-preppy-v-neck-knitted-knit-cardigan-orange-one-size-cardiagn-250126-229.webp?v=1761663385&width=823\",\"quantity\":2,\"age\":15,\"size\":\"XL\"},{\"name\":\"veste hiver\",\"price\":\"3200 DA\",\"image\":\"https:\\/\\/i.pinimg.com\\/736x\\/d8\\/47\\/29\\/d847290849767815418e6f6bb60a1f99.jpg\",\"quantity\":3,\"age\":4,\"size\":\"YYF\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-01 20:58:19'),
(50, 'Rahma', 'rahma@gmail.com', '088888888888', 'hgfdsdfghlo', '[{\"name\":\"pull pour filles\",\"price\":\"4500 DA\",\"image\":\"https:\\/\\/princessace.com\\/cdn\\/shop\\/files\\/oversized-preppy-v-neck-knitted-knit-cardigan-milk-blue-one-size-cardiagn-250126-913.webp?v=1761663390\",\"quantity\":2,\"age\":15,\"size\":\"xl\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-01 21:33:52'),
(51, 'Rahma', 'rahma@gmail.com', '0344880321', 'BOUZANA', '[{\"name\":\"\\n            Pull pour filles        \",\"price\":\"\\n                4500 DA\\n            \",\"image\":\"https:\\/\\/princessace.com\\/cdn\\/shop\\/files\\/oversized-preppy-v-neck-knitted-knit-cardigan-orange-one-size-cardiagn-250126-229.webp?v=1761663385&width=823\",\"quantity\":4,\"age\":17,\"size\":\"XL\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-01 21:58:22'),
(52, 'Rahma', 'rahma@gmail.com', '09999999', 'BOUZANA', '[{\"name\":\"\\n            Bottes en cuir pour filles        \",\"price\":\"\\n                3500 DA\\n            \",\"image\":\"https:\\/\\/img.fantaskycdn.com\\/c433cdd9693406e25b1dfe39e95e060a_1080x.jpeg\",\"quantity\":3,\"age\":18,\"size\":\"38\"},{\"name\":\"Chapeau d\'hiver\",\"price\":\"4500 DA\",\"image\":\"https:\\/\\/img.kwcdn.com\\/product\\/fancy\\/ffae282d-6137-401c-a340-a2df40e30d53.jpg?imageView2\\/2\\/w\\/800\\/q\\/70\\/format\\/avif\",\"quantity\":5,\"age\":19,\"size\":\"\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-01 22:02:44'),
(53, 'NOUHA', 'nouhnnnoua@gmail.com', '088888888888', 'hgfdsdfghlo', '{\"0\":{\"name\":\"Ensemble filles\",\"price\":\"4500 DA\",\"image\":\"https:\\/\\/i.pinimg.com\\/736x\\/28\\/2b\\/f5\\/282bf5c2805da6b8bd738d405064b12b.jpg\",\"quantity\":3,\"age\":16,\"size\":\"XL\"},\"2\":{\"name\":\"Chemise d\'hiver\",\"price\":\"4500 DA\",\"image\":\"https:\\/\\/i.pinimg.com\\/736x\\/f8\\/5b\\/5d\\/f85b5d2fc949c7c45eaf3e095ee49db8.jpg\",\"quantity\":2,\"age\":44,\"size\":\"4\"},\"3\":{\"name\":\"Pull Homme\",\"price\":\"4500 DA\",\"image\":\"https:\\/\\/img.kwcdn.com\\/product\\/fancy\\/1a56a8c9-5295-4ef5-a384-9478e5e8ff07.jpg?imageView2\\/2\\/w\\/800\\/q\\/70\\/format\\/avif\",\"quantity\":1,\"age\":0,\"size\":\"\"},\"1\":{\"age\":0,\"size\":\"\",\"quantity\":1}}', 'card', '23456789', 'jçoijhuyg', '2026-01-02 18:48:01'),
(54, 'NOUHA', 'zahiaass123@gmail.com', '0344880321', 'hgfdsdfghlo', '[{\"name\":\"\\n            Pull pour filles        \",\"price\":\"\\n                4500 DA\\n            \",\"image\":\"https:\\/\\/princessace.com\\/cdn\\/shop\\/files\\/oversized-preppy-v-neck-knitted-knit-cardigan-red-one-size-cardiagn-250126-165.webp?v=1761663375&width=823\",\"quantity\":2,\"age\":22,\"size\":\"XL\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-02 19:34:29'),
(55, 'NOUHA', 'NOUHAN123@gmail.com', '0344880321', 'hgfdsdfghlo', '[{\"name\":\"Ensemble pour filles\",\"price\":\"4500.00 DA\",\"image\":\"https:\\/\\/img.kwcdn.com\\/product\\/fancy\\/1d506b7c-366b-4d9b-b4cf-df0ef07e796f.jpg?imageView2\\/2\\/w\\/800\\/q\\/70\\/format\\/avif\",\"quantity\":3,\"age\":14,\"size\":\"s\"},{\"name\":\"Ensemble garcon\",\"price\":\"4500.00 DA\",\"image\":\"https:\\/\\/i.pinimg.com\\/1200x\\/b1\\/a3\\/0b\\/b1a30b466f1137cdd399827da72d0ec9.jpg\",\"quantity\":4,\"age\":14,\"size\":\"s\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-02 20:03:04'),
(56, 'NOUHA', 'NOUHAM123@gmail.com', '0344880321', 'hgfdsdfghlo', '[{\"name\":\"Ensemble garcon\",\"price\":\"4500.00 DA\",\"image\":\"https:\\/\\/i.pinimg.com\\/736x\\/7d\\/95\\/b9\\/7d95b9f9233b5b3587c30e3afc4239a2.jpg\",\"quantity\":2,\"age\":5,\"size\":\"s\"},{\"name\":\"Ensemble fille (t-shirt+short)\",\"price\":\"2800.00 DA\",\"image\":\"https:\\/\\/i.pinimg.com\\/736x\\/ac\\/62\\/3b\\/ac623b8cc033108b9957e4a6faeab7d9.jpg\",\"quantity\":3,\"age\":4,\"size\":\"s\"}]', 'cash', '23456789', 'jçoijhuyg', '2026-01-02 20:14:01');

-- --------------------------------------------------------

--
-- Structure de la table `commande_items`
--

CREATE TABLE `commande_items` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT 0,
  `size` varchar(50) DEFAULT '',
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande_items`
--

INSERT INTO `commande_items` (`id`, `commande_id`, `name`, `price`, `image`, `age`, `size`, `quantity`) VALUES
(27, 49, 'pull pour filles', 4500.00, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-orange-one-size-cardiagn-250126-229.webp?v=1761663385&width=823', 15, 'XL', 2),
(28, 49, 'veste hiver', 3200.00, 'https://i.pinimg.com/736x/d8/47/29/d847290849767815418e6f6bb60a1f99.jpg', 4, 'YYF', 3),
(29, 50, 'pull pour filles', 4500.00, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-milk-blue-one-size-cardiagn-250126-913.webp?v=1761663390', 15, 'xl', 2),
(30, 51, '\n            Pull pour filles        ', 4500.00, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-orange-one-size-cardiagn-250126-229.webp?v=1761663385&width=823', 17, 'XL', 4),
(31, 52, '\n            Bottes en cuir pour filles        ', 3500.00, 'https://img.fantaskycdn.com/c433cdd9693406e25b1dfe39e95e060a_1080x.jpeg', 18, '38', 3),
(32, 52, 'Chapeau d\'hiver', 4500.00, 'https://img.kwcdn.com/product/fancy/ffae282d-6137-401c-a340-a2df40e30d53.jpg?imageView2/2/w/800/q/70/format/avif', 19, '', 5),
(33, 53, 'Ensemble filles', 4500.00, 'https://i.pinimg.com/736x/28/2b/f5/282bf5c2805da6b8bd738d405064b12b.jpg', 16, 'XL', 3),
(34, 53, 'Chemise d\'hiver', 4500.00, 'https://i.pinimg.com/736x/f8/5b/5d/f85b5d2fc949c7c45eaf3e095ee49db8.jpg', 44, '4', 2),
(35, 53, 'Pull Homme', 4500.00, 'https://img.kwcdn.com/product/fancy/1a56a8c9-5295-4ef5-a384-9478e5e8ff07.jpg?imageView2/2/w/800/q/70/format/avif', 0, '', 1),
(36, 54, '\n            Pull pour filles        ', 4500.00, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-red-one-size-cardiagn-250126-165.webp?v=1761663375&width=823', 22, 'XL', 2),
(37, 55, 'Ensemble pour filles', 4500.00, 'https://img.kwcdn.com/product/fancy/1d506b7c-366b-4d9b-b4cf-df0ef07e796f.jpg?imageView2/2/w/800/q/70/format/avif', 14, 's', 3),
(38, 55, 'Ensemble garcon', 4500.00, 'https://i.pinimg.com/1200x/b1/a3/0b/b1a30b466f1137cdd399827da72d0ec9.jpg', 14, 's', 4),
(39, 56, 'Ensemble garcon', 4500.00, 'https://i.pinimg.com/736x/7d/95/b9/7d95b9f9233b5b3587c30e3afc4239a2.jpg', 5, 's', 2),
(40, 56, 'Ensemble fille (t-shirt+short)', 2800.00, 'https://i.pinimg.com/736x/ac/62/3b/ac623b8cc033108b9957e4a6faeab7d9.jpg', 4, 's', 3);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `colors` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category`, `colors`) VALUES
(1, 'Montre Homme/Femme', 3000, 'https://i.pinimg.com/736x/69/13/03/691303326115216227313f6c57db19c9.jpg', NULL, ''),
(2, 'Chaussure Homme', 2500, 'https://img.fantaskycdn.com/4e1cac2174e44e8930873e053b0e0b72_750x.jpeg', NULL, 'https://img.fantaskycdn.com/4e1cac2174e44e8930873e053b0e0b72_750x.jpeg,https://img.fantaskycdn.com/651d32f8ed5c46af61f34599686524f5_750x.jpeg'),
(3, 'Pull pour filles', 4500, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-red-one-size-cardiagn-250126-165.webp?v=1761663375&width=823', NULL, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-red-one-size-cardiagn-250126-165.webp?v=1761663375&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-cardiagn-250126-111.webp?v=1761663370&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-black-one-size-cardiagn-250126-908.webp?v=1761663380&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-orange-one-size-cardiagn-250126-229.webp?v=1761663385&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-milk-blue-one-size-cardiagn-250126-913.webp?v=1761663390'),
(4, 'Montre Femme', 4500, 'https://img.fantaskycdn.com/0d51789170524cf86ca5e7b24a4fd3b1_1024x.jpeg', NULL, 'https://img.fantaskycdn.com/0d51789170524cf86ca5e7b24a4fd3b1_1024x.jpeg,\r\nhttps://img.fantaskycdn.com/4eba6a4d8bca8c01959ce8c3f1adb219_1080x.jpeg'),
(5, 'Bottes en cuir pour filles', 3500, 'https://img.fantaskycdn.com/c433cdd9693406e25b1dfe39e95e060a_1080x.jpeg', NULL, 'https://img.fantaskycdn.com/c433cdd9693406e25b1dfe39e95e060a_1080x.jpeg,\r\nhttps://img.fantaskycdn.com/23f163bc783f4a2d2eede20bf063c616_1080x.jpeg'),
(6, 'Bracelet', 2000, 'https://i.pinimg.com/1200x/95/55/b8/9555b8cb40bbfc2e2849ee0d8cc84c69.jpg', NULL, ''),
(7, 'Boucle d\'oreille', 1000, 'https://juliafashionshop.com/cdn/shop/products/2023-14K-Gold-Plated-Korean-New-Design-Fashion-Jewelry-Square-Grey-Crystal-Earrings-Elegant-Women-s_1000x.webp?v=1704442049', NULL, ''),
(8, 'Chemise Homme', 2000, 'https://cdn.wconcept.com/products/resize/632x843/migration/i/imgpin.wconceptusa.com/189fc3f5f98/49b94/49/KpaA92hbnc0Uisl_BAKIpk26_9o.png', NULL, ''),
(9, 'Sac pour femme', 2000, 'https://i.pinimg.com/1200x/de/b0/98/deb098f857194a00b51e29d737b7838c.jpg', NULL, ''),
(10, 'Chaussures', 1200, 'https://i.pinimg.com/736x/b5/bd/fb/b5bdfbe6012939e736669c98fa18b80f.jpg', NULL, ''),
(11, 'T-shirt sport homme', 3200, 'https://i.pinimg.com/1200x/6c/35/28/6c3528edbcbdf8bdb3f5a20b70c6461a.jpg', NULL, ''),
(12, 'T-shirt sport homme', 3200, 'https://i.pinimg.com/1200x/5f/4a/ff/5f4affdaec9fabef2eea82f5a39e97cd.jpg', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `productsenfants`
--

CREATE TABLE `productsenfants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(500) NOT NULL,
  `colors` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `productsenfants`
--

INSERT INTO `productsenfants` (`id`, `name`, `price`, `image`, `colors`) VALUES
(3, 'Ensemble garcon', 4500.00, 'https://i.pinimg.com/1200x/b1/a3/0b/b1a30b466f1137cdd399827da72d0ec9.jpg', 'https://i.pinimg.com/1200x/b1/a3/0b/b1a30b466f1137cdd399827da72d0ec9.jpg,https://i.pinimg.com/736x/7d/95/b9/7d95b9f9233b5b3587c30e3afc4239a2.jpg,https://i.pinimg.com/1200x/8f/7a/e7/8f7ae7b3653fa045eeb75f9d4b39cf0d.jpg'),
(4, 'Ensemble pour filles', 4500.00, 'https://img.kwcdn.com/product/fancy/1d506b7c-366b-4d9b-b4cf-df0ef07e796f.jpg?imageView2/2/w/800/q/70/format/avif', 'https://img.kwcdn.com/product/fancy/1d506b7c-366b-4d9b-b4cf-df0ef07e796f.jpg?imageView2/2/w/800/q/70/format/avif,https://img-1.kwcdn.com/product/fancy/aa5512b7-ad4a-4a7a-bda0-975eedf20c8a.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/9bb4f4f5-7a2d-4894-b11f-2408cd4a9c90.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/ca79785c-ffec-4527-9568-659f01dad12a.jpg?imageView2/2/w/800/q/70/format/avif'),
(5, 'Ensemble fille (t-shirt+short)', 2800.00, 'https://i.pinimg.com/736x/ac/62/3b/ac623b8cc033108b9957e4a6faeab7d9.jpg', ''),
(6, 'veste garçon', 3200.00, 'https://i.pinimg.com/1200x/0c/06/a9/0c06a9f76f2e72b60767f491c21eb1e9.jpg', ''),
(7, 'veste garçon', 2400.00, 'https://i.pinimg.com/736x/d4/43/0c/d4430cd4a19423b05a75b201b5139e31.jpg', ''),
(8, 'Ensemble pour filles', 3000.00, 'https://i.pinimg.com/736x/3d/96/cd/3d96cd608160318f3d4804f6ef6a3e8b.jpg', ''),
(9, 'Chaussures bébé', 2600.00, 'https://i.pinimg.com/1200x/f2/62/0a/f2620a034b9f475588c34ee4fe46da05.jpg', ''),
(10, 'Chaussures bébé', 2600.00, 'https://i.pinimg.com/1200x/e8/a9/1f/e8a91f48549a9f8eaa1d5a032ff9040b.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `productsfemme`
--

CREATE TABLE `productsfemme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `colors` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `productsfemme`
--

INSERT INTO `productsfemme` (`id`, `name`, `price`, `image`, `colors`, `category`) VALUES
(31, 'Montre Homme/Femme', 4500, 'https://i.pinimg.com/736x/69/13/03/691303326115216227313f6c57db19c9.jpg', '', NULL),
(32, 'pull pour filles', 4500, 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-red-one-size-cardiagn-250126-165.webp?v=1761663375&width=823', 'https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-red-one-size-cardiagn-250126-165.webp?v=1761663375&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-cardiagn-250126-111.webp?v=1761663370&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-black-one-size-cardiagn-250126-908.webp?v=1761663380&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-orange-one-size-cardiagn-250126-229.webp?v=1761663385&width=823,https://princessace.com/cdn/shop/files/oversized-preppy-v-neck-knitted-knit-cardigan-milk-blue-one-size-cardiagn-250126-913.webp?v=1761663390', NULL),
(33, 'Ensemble filles', 4500, 'https://i.pinimg.com/736x/28/2b/f5/282bf5c2805da6b8bd738d405064b12b.jpg', 'https://i.pinimg.com/736x/28/2b/f5/282bf5c2805da6b8bd738d405064b12b.jpg,https://i.pinimg.com/736x/de/b6/13/deb613f3785d31e3dffeb9c7398b3064.jpg', NULL),
(34, 'Montre Femme', 4500, 'https://img.fantaskycdn.com/0d51789170524cf86ca5e7b24a4fd3b1_1024x.jpeg', 'https://img.fantaskycdn.com/0d51789170524cf86ca5e7b24a4fd3b1_1024x.jpeg,https://img.fantaskycdn.com/4eba6a4d8bca8c01959ce8c3f1adb219_1080x.jpeg', NULL),
(35, 'Chapeau d\'hiver', 4500, 'https://img.kwcdn.com/product/fancy/ffae282d-6137-401c-a340-a2df40e30d53.jpg?imageView2/2/w/800/q/70/format/avif', 'https://img.kwcdn.com/product/fancy/ffae282d-6137-401c-a340-a2df40e30d53.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/1a816c7d-ebf0-4d40-ab4b-7a184364a77c.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/1c41078e-f663-45b0-9857-f53e750336e4.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/a210830d-3315-4dfe-bd7d-0594d713b2f3.jpg?imageView2/2/w/800/q/70/format/avif', NULL),
(36, 'bouttes en cuir por filles', 4500, 'https://img.fantaskycdn.com/c433cdd9693406e25b1dfe39e95e060a_1080x.jpeg', 'https://img.fantaskycdn.com/c433cdd9693406e25b1dfe39e95e060a_1080x.jpeg,https://img.fantaskycdn.com/23f163bc783f4a2d2eede20bf063c616_1080x.jpeg', NULL),
(37, 'Montou femme', 4500, 'https://i.pinimg.com/1200x/44/19/e5/4419e51329fc71babb777117e80993ee.jpg', 'https://i.pinimg.com/1200x/44/19/e5/4419e51329fc71babb777117e80993ee.jpg,https://i.pinimg.com/1200x/53/d5/6c/53d56ce8593569f9c04411baac082228.jpg,https://i.pinimg.com/736x/f0/c8/44/f0c844addbade5d3f93398991a203380.jpg,https://i.pinimg.com/1200x/50/52/e7/5052e768c1d4354f4b6e966e8637bcaa.jpg,https://i.pinimg.com/736x/72/97/e6/7297e66aa8511ae4482e8bfcc048553d.jpg', NULL),
(38, 'Chemise d\'hiver', 4500, 'https://i.pinimg.com/736x/f8/5b/5d/f85b5d2fc949c7c45eaf3e095ee49db8.jpg', 'https://i.pinimg.com/736x/f8/5b/5d/f85b5d2fc949c7c45eaf3e095ee49db8.jpg,https://i.pinimg.com/736x/76/64/9b/76649b388a38666ee6e87b81729f52af.jpg,https://juliafashionshop.com/cdn/shop/files/Sc028ce11f26b4afca9c5c9ff22d49548R_431bcf84-65a9-45df-a43a-bb02303faaf5_1000x.webp?v=1765534379', NULL),
(39, 'veste hiver', 3200, 'https://i.pinimg.com/736x/d8/47/29/d847290849767815418e6f6bb60a1f99.jpg', '', NULL),
(40, 'Bracelet', 3200, 'https://i.pinimg.com/1200x/95/55/b8/9555b8cb40bbfc2e2849ee0d8cc84c69.jpg', '', NULL),
(41, 'veste hiver', 3200, 'https://i.pinimg.com/736x/85/a7/0c/85a70cdec31c5ac70b4f24cdc3a328cc.jpg', '', NULL),
(42, 'Sac pour femme', 3200, 'https://i.pinimg.com/1200x/de/b0/98/deb098f857194a00b51e29d737b7838c.jpg', '', NULL),
(43, 'chaussures', 3200, 'https://i.pinimg.com/736x/b5/bd/fb/b5bdfbe6012939e736669c98fa18b80f.jpg', '', NULL),
(44, 'Boucle d\'oreille', 3200, 'https://juliafashionshop.com/cdn/shop/products/2023-14K-Gold-Plated-Korean-New-Design-Fashion-Jewelry-Square-Grey-Crystal-Earrings-Elegant-Women-s_1000x.webp?v=1704442049', '', NULL),
(45, 'Boucle d\'oreille', 3200, 'https://princessace.com/cdn/shop/files/color-block-striped-trendy-knit-crop-top-blue-one-size-sweaters-706.webp?v=1735776883', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `productshomme`
--

CREATE TABLE `productshomme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `colors` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `productshomme`
--

INSERT INTO `productshomme` (`id`, `name`, `price`, `image`, `colors`, `category`) VALUES
(49, 'veste Homme', 4200, 'https://i.pinimg.com/1200x/15/54/15/155415f3074145bea798f7768037a1da.jpg', NULL, NULL),
(50, 'Chaussure', 4200, 'https://i.pinimg.com/1200x/8f/fa/f0/8ffaf0eeadcf69b2b6560571ab0a9d7e.jpg', NULL, NULL),
(51, 'Ensemle homme', 4200, 'https://i.pinimg.com/736x/c4/3c/e8/c43ce852c84373cceddc5926ec3f9dcd.jpg', NULL, NULL),
(52, 'Chaussure', 4500, 'https://i.pinimg.com/1200x/f3/70/65/f37065d54299253254cc2d5bc67ff11a.jpg', 'https://i.pinimg.com/1200x/f3/70/65/f37065d54299253254cc2d5bc67ff11a.jpg,https://i.pinimg.com/736x/b3/96/a2/b396a285192b6529fb45ec904c5ddce2.jpg', NULL),
(53, 'Pull Homme', 4500, 'https://img.kwcdn.com/product/fancy/1a56a8c9-5295-4ef5-a384-9478e5e8ff07.jpg?imageView2/2/w/800/q/70/format/avif', 'https://img.kwcdn.com/product/fancy/1a56a8c9-5295-4ef5-a384-9478e5e8ff07.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/73a466f4-0cfc-41cb-bf4e-f7a2d93a2493.jpg?imageView2/2/w/800/q/70/format/avif', NULL),
(54, 'Chaussure', 4500, 'https://img.kwcdn.com/product/fancy/6c6ca885-5687-4364-a5ea-391238163bb8.jpg?imageView2/2/w/800/q/70/format/avif', 'https://img.kwcdn.com/product/fancy/6c6ca885-5687-4364-a5ea-391238163bb8.jpg?imageView2/2/w/800/q/70/format/avif,https://img.kwcdn.com/product/fancy/d11475a2-4b55-44a6-b7b1-f435ab167401.jpg?imageView2/2/w/800/q/70/format/avif', NULL),
(55, 'Chapeau d\'hiver', 4500, 'https://i.pinimg.com/736x/95/cc/78/95cc7886b9356d608b22f3033db8e99a.jpg', 'https://i.pinimg.com/736x/95/cc/78/95cc7886b9356d608b22f3033db8e99a.jpg,https://i.pinimg.com/1200x/e6/d0/96/e6d0961d29a3455f83a174136cb16a3a.jpg,https://i.pinimg.com/1200x/08/20/da/0820dace7a2a52c655e52a47bb5991e2.jpg', NULL),
(56, 'Ensemble homme', 4500, 'https://i.pinimg.com/736x/6f/1a/6e/6f1a6ed09f4c08ff96ddbb8ce5bff7de.jpg', 'https://i.pinimg.com/736x/6f/1a/6e/6f1a6ed09f4c08ff96ddbb8ce5bff7de.jpg,https://i.pinimg.com/736x/b6/1e/32/b61e326e5db8998b15c2c731e5a493c2.jpg', NULL),
(57, 'Ensemble homme', 9500, 'https://i.pinimg.com/736x/75/1c/59/751c59991792846317bbb47d4ba36098.jpg', NULL, NULL),
(58, 'Veste Décontractée 1', 9500, 'https://img.kwcdn.com/product/fancy/4ab894b4-b518-4397-95ed-43cde99b90b9.jpg?imageView2/2/w/800/q/70/format/avif', NULL, NULL),
(59, 'Veste Décontractée 2', 9500, 'https://i.pinimg.com/736x/9b/68/14/9b6814ab4ea603641233ee7f1e4f4bef.jpg', NULL, NULL),
(60, 'sous-vetement', 9500, 'https://i.pinimg.com/1200x/d6/db/b8/d6dbb8e99d2e78341014128fcbee3ac5.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Name`, `email`, `password`) VALUES
(23, 'mmm', 'nouhanou@gmail.com', '$2y$10$PEIdq5NBz.bMc67O2VqLKutoy0QnJM5f7VeDbo3F5.RWYC/D65WLS'),
(24, 'llll', 'nouhano@gmail.com', '$2y$10$FrWxMyaHMhoUPqwJpjFIwOnEywXuj3hjoeqwsAX6n2a6FXZhvT9M2'),
(25, 'loula', 'nouhanua@gmail.com', '$2y$10$ylI8vl.DUV9MW3/Qy5bqe.5dSf./WRuq6WJmSj6hCk4Nlu4lp9qa6'),
(26, 'kjkll', 'nouhaua@gmail.com', '$2y$10$F2W973mkKIfB88FcMiURVuVMRxFb8U9J.Wb.RXUqIsljA806A7rG2'),
(27, 'jojou', 'nanoua@gmail.com', '$2y$10$4bQenbIuGz8Tpw/27gSUSe5PK8UEaGRh19KyxuNhcIDX6HFdmRMim');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_items`
--
ALTER TABLE `commande_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `productsenfants`
--
ALTER TABLE `productsenfants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `productsfemme`
--
ALTER TABLE `productsfemme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `productshomme`
--
ALTER TABLE `productshomme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `commande_items`
--
ALTER TABLE `commande_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `productsenfants`
--
ALTER TABLE `productsenfants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `productsfemme`
--
ALTER TABLE `productsfemme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `productshomme`
--
ALTER TABLE `productshomme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_items`
--
ALTER TABLE `commande_items`
  ADD CONSTRAINT `commande_items_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
