-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 oct. 2022 à 22:34
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `alternative`
--

CREATE TABLE `alternative` (
  `id` int(25) NOT NULL,
  `titre` varchar(120) NOT NULL,
  `image` varchar(150) NOT NULL,
  `theme` varchar(120) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `alternative`
--

INSERT INTO `alternative` (`id`, `titre`, `image`, `theme`, `email`, `site`) VALUES
(0, 'Accorderie', 'accorderie.jpg', 'Dialogue', '', 'http://www.accorderie.fr/montpellier/'),
(26, 'enercoop', 'enercoop.jpg', 'Energie', '@EnercoopLR', 'http://Languedoc.enercoop.fr/'),
(27, 'Ale', 'Ale.jpg', 'Energie', 'contact@ale-montpellier.org', 'http://ale-montpellier.org'),
(28, 'autour', 'Autour.jpg', 'Dialogue', '@autourpointcom', 'https://autour.com/'),
(29, 'alternatiba', 'Alternatiba.jpg', 'Ecologie', 'montpellier@alternatiba.eu', 'http://alternatiba.eu/montpellier/'),
(30, 'Les semeurs de jardins', 'Les semeurs de jardins.jpg', 'Agriculture', 'contact@semeursdejardins.org', 'www.jardcollectif-lr.jimdo.com'),
(31, 'Ecohabitons', 'Ecohabitons.jpg', 'Habitat', 'ecohabitons@yahoo.fr', 'http://www.ecohabitons.org'),
(32, 'Repair cafe', 'Repair cafe.jpg', 'Ecologie', '@repaircafemontpellier34', 'https://repaircafe.org/fr'),
(33, 'HabFab', 'Habfab.jpg', 'Habitat', 'contact-montpellier@hab-fab.com', 'https://www.hab-fab.com'),
(34, 'ouvre tete', 'Ouvre tete.jpg', 'Ecoligie / Social', '', 'https://ouvre-tete.fr'),
(35, 'Montpellier à pied', 'Montpellier à pied.jpg', 'Social', '', 'https://autour.com/montpellierapied'),
(36, 'Nouveau monde', 'Nouveau monde.jpg', 'Social', 'le Nouveau Monde _ Montpellier', 'asso-nouveau-monde.fr');

-- --------------------------------------------------------

--
-- Structure de la table `ateliers`
--

CREATE TABLE `ateliers` (
  `id` int(11) NOT NULL,
  `revenu_etat` decimal(10,2) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `argument1` varchar(250) DEFAULT NULL,
  `sourceArg1` varchar(250) DEFAULT NULL,
  `prix1` decimal(10,2) DEFAULT NULL,
  `argument2` varchar(250) DEFAULT NULL,
  `sourceArg2` varchar(250) DEFAULT NULL,
  `prix2` decimal(10,2) DEFAULT NULL,
  `argument3` varchar(250) DEFAULT NULL,
  `sourceArg3` varchar(250) DEFAULT NULL,
  `prix3` decimal(10,2) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ateliers`
--

INSERT INTO `ateliers` (`id`, `revenu_etat`, `titre`, `argument1`, `sourceArg1`, `prix1`, `argument2`, `sourceArg2`, `prix2`, `argument3`, `sourceArg3`, `prix3`, `image`) VALUES
(1, '250.70', '« Ceux qui perçoivent les aides sociales sont ceux qui fraudent le plus »', 'Fraude aux allocations familiales', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '0.30', 'Fraude à l’impôt sur le revenu', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '170.00', NULL, NULL, NULL, NULL),
(2, '250.70', '« Le trou de la sécu est dû aux arrêts maladie injustifiés »', 'Fraude aux arrêts maladie', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '0.15', 'Travail non déclaré', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '14.00', 'Déficit de la sécurité sociale', 'http://europe1.fr/economie/le-deficit-de-la-secu-reduit-a-51-milliards-d-euros-en-2017-3600404', '5.00', NULL),
(3, '0.00', '« La France va mal à cause de ceux qui fraudent au RSA »', 'Fraude au RSA', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '0.80', 'Fraude patronale ', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '27.00', 'RSA non demandé ', 'https://www.aide-sociale.fr/infographie-fraude-sociale-particulier-entreprise/', '10.80', NULL),
(4, '250.70', '« Les étrangers viennent manger notre pain »', 'Cotisation de travailleurs émigrés', 'https://www.katibin.fr/2017/01/15/les-travailleurs-immigres-rapportent-chaque-annee-13-millliard-d-euros-a-letat/', '1.20', 'Fortune des 3 français les plus riches', 'https://www.ledauphine.com/france-monde/2018/07/08/qui-sont-les-plus-grosses-fortunes-de-france', '152.00', 'Impôts impayés par les GAFA', 'https//rmc.bfmtv.com/emission/taxer-davantage-les-gafa-au-final-cela-aurait-une-repercussion-sur-le-consommateur-1258179.html', '1.40', NULL),
(5, '250.70', '« On ne peut pas accueillir toute la misère du monde »', 'Apport d\'activité des réfugiés', 'https://www.francetvinfo.fr/replay-radio/le-vrai-du-faux/le-vrai-du-faux-non-les-francais-ne-paient-pas-4-milliards-d-euros-pour-l-acueil-des-migrants 2573271.html', '1.40', 'Suppression de l’ISF', 'http://www.lefigaro.fr/conjoncture/2018/20002-20181218ARTFIG00087-suppression-de-l-isf-peut-on-deja-dresser-un-premier-bilan.php', '5.00', '', '', '0.00', NULL),
(6, '250.70', '« Pour redresser la France il faut travailler et cotiser plus»', 'Déficit budgétaire', 'http://www.lefigaro.fr/flash-eco/2018/11/07/97002-20181107FILWWW00171-le-deficit-de-l-etat-sera-a-80-milliards-d-euros-en-2018-et-le-deficit-public-a-26.php', '80.00', 'Evasion fiscale', 'https://www.europe1.fr/economie/la-fraude-fiscale-atteint-100-milliards-deuros-par-an-selon-un-rapport-3755717', '100.00', 'Intérêts de la dette publique', 'https://www.financespubliques.fr/articles/debats/actualités/charge-de-la-dette-pour2017-quels-enjeux/', '41.50', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE `conference` (
  `id` int(15) NOT NULL,
  `titre` varchar(120) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `invite` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `synopsis` text NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conference`
--

INSERT INTO `conference` (`id`, `titre`, `theme`, `invite`, `date`, `heure`, `synopsis`, `image`) VALUES
(1, 'Semaine collapsologie', 'Constat d\'effondrement', 'Pablo servigne, Edgar Morin ,....', '2018-01-21', '18:30:00', 'Le Nouveau Monde – Montpellier vous invite à ses rencontres autour de notre civilisation, des effondrements à l’œuvre et des pistes d’actions à suivre !<br/>\r\n\r\n\r\nLundi 21 janvier à 18h30 : conférence/débat « vers un effondrement  de  notre civilisation ? »  à la fac de Sciences avec Edgar Morin & Pablo Servigne. <br/>\r\nMardi 22 janvier à 18h30: atelier « quelles attitudes face aux changements à venir ? » à La Carmagnole <br/>\r\nMercredi 23 janvier à 18h30, rencontre « modes de vie alternatifs & alternatives locales » à The Island<br/>\r\nJeudi 24 janvier à 18h30, présentation low-tech à La Ruche<br/>\r\nVendredi 25 janvier à 20h, concerts de clôture et Jam Session au bar La Pleine Lune', 'semaine colapso.webp'),
(2, 'Agir localement pour un nouveau monde', 'Discussions et Débats', 'Philippe Pascot, Noussomme, Gilet Jaunes, Youth for climate, ANC21, Iboycott, La Carmagnole, Alternatiba ....', '2019-09-24', '18:30:00', 'Cette soirée réunira les acteurs locaux du changement afin de poser les scénarios qui s\'offrent à nous, identifier les objectifs communs et avancer des stratégies pour y parvenir. Une belle occasion de réunir les associations, collectifs, mouvements sociaux, syndicats..... ainsi que les initiatives progressistes qui s\'organisent en vue des municipales de mars 2020.', '24sept.webp');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(25) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lowtech`
--

CREATE TABLE `lowtech` (
  `id` int(25) NOT NULL,
  `titre` varchar(120) DEFAULT NULL,
  `difficulte` int(25) DEFAULT NULL,
  `temps` varchar(50) DEFAULT NULL,
  `necessite` varchar(150) DEFAULT NULL,
  `fabrication` longtext DEFAULT NULL,
  `materiaux` longtext DEFAULT NULL,
  `fonctionnement` longtext DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  `imagePrincipe` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lowtech`
--

INSERT INTO `lowtech` (`id`, `titre`, `difficulte`, `temps`, `necessite`, `fabrication`, `materiaux`, `fonctionnement`, `image`, `imagePrincipe`, `source`) VALUES
(1, 'Frigo du désert', 3, '10 min', 'Conservation de nourriture', '- Mettre un lit de sable (3 cm) dans le fond du grand pot (boucher le trou). - Mettre le petit pot au centre sur le lit de sable. - Remplir l’espace entre les deux pots de sable.', '-2 Pots en terre cuite de diamètres différents (ex: Ø 100 et Ø 125). - Du sable fin (ex sable de jeu). - Un torchon en tissu ou une coupelle de diamètre égal ou supérieur au plus grand pot. - De l’eau pour amorcer le processus.', '- Verser l’eau sur le sable entre les deux pots. - Par thermo conduction l’eau va se charger des calories du sable jusqu’à évaporation. - Le sable va ensuite se charger des calories de l’intérieur du pot et donc le rafraichir. - Conservent plus longtemps les aliments.', 'Lefrigodudesert.webp', 'FrigoDuDesrtPricipe.webp', 'https://wiki.lowtechlab.org'),
(2, 'Réchaud à pyrolyse\r\n', 2, '40 min', 'Cuisson / chauffage', '\r\nSur la petite boite de conserve :.\r\n-Percer des trous sur le pourtour haut environ 10 de Ø 6 mm.\r\n- Enlever toute la partie centrale du fond de la boite.\r\n- Faire 8 petits trous également espacés sur la partie\r\nrestante du fond de la boite.\r\n- Relier les trous du fond de la boite par le fil de fer afin de créer un maillage.\r\n. Sur la grande boite de conserve :\r\n- Percer des trous sur le pourtour haut environ 8 de Ø 8 mm.\r\n- Enlever toute la partie centrale du fond de la boite de largeur égale au diamètre du la petite boite.\r\n- Emboiter la petite boite dans la grande.\r\n- Ne pas oublier de se confectionner un support pour le récipient à chauffer.', '- Deux boites de conserve de diamètre différent (ex: Ø 10 e Ø 12,5).\r\n- Du fil de fer.\r\n- Un clou ou une perceuse.\r\n- Un feutre.\r\n- une pince à couper l’acier.', '- Mettre les brindilles, un morceau de bois (environ 10 cm ) et allumer.\r\n- La première combustion se fait lorsque le bois brûle.\r\n- La deuxième combustion arrive lorsque les gaz de la première combustion remontent par l’espace entre les deux boites et ressortent par les trous en haut de la petite canne et s’enflamment.', 'rechauPyrolise.webp', 'rechaudAPyrolise.webp', 'https://wiki.lowtechlab.org'),
(3, 'LactoFermentation', 1, '10 min', 'Conservation nouriture', '- Râper les légumes. - Ajouter du sel aux légumes râpés et laisser reposer 10 min. - Remplir le bocal des légumes en tassant bien et en laissant environ 2cm d’espace libre avec le couvercle', '-1 Bocal en verre (ex : pot de confiture). - Des légumes (ex carottes + radis noire). - Du sel environ 30g/L eau. - De l’eau de source', '-Les bactéries lactiques vont attaquer les bactéries aérobies (environ 7 jours).-Les bactéries lactiques vont ensuite bonifier vos légumes tout en les conservant. - La consommation peut se faire dès 6 semaines. - La conservation est en moyenne de 12 mois mais peut aller jusqu’à 18 mois puis les légumes commencent à perdre leur valeur nutritive', 'Lactofermentation.webp', 'lactoFermentationPrincipe.webp', 'https://revolutionfermentation.com/'),
(4, 'Boussole', 3, '5 min', 'Orientation', '-Magnétiser l’aiguille en la frottant plusieurs fois sur l’aimant (environ 30 fois) et toujours dans la même direction. \r\n- Verser l’eau dans le bol. \r\n- Mettre le liège dans l’eau. \r\n-Placer l’aiguille sur le liège', '– un bol d’eau. \r\n– une épingle ou une aiguille à coudre. \r\n– un aimant. \r\n– un petit morceau de liège\r\n', '-L’aiguille indiquera le nord par électromagnétisme de pôle terrestre.', 'Boussole.webp', 'BoussolePrincipe.webp', 'http://sciencejunior.fr'),
(5, 'Bélier hydraulique', 3, '45 min', 'Remonter/approvisionner en eau', '- Connecter la vanne d’arriver au T de Ø 34 avec un joint Ø34/34 .- Connecter ensuite le coude 90° à la première connexion faite grâce au deuxième joint Ø 34/34 .- Connecter ensuite le clapet anti-retour Ø 27 sur le T de départ avec le joint de réduction Ø 34/27 .– Connecter le T Ø 27 au clapet anti-retour avec le joint Ø 27/27 .– Connecter l’extincteur au T Ø 27 grâce au 2ème joint Ø 27/27 .– Connecter la vanne de sortie Ø 27/27 sur la sortie restante du T Ø 27 ', '– Un coude de 90° . – Une vanne d’arrivée Ø 34/34 .– Deux joints Ø 34/34 .<br/>– Un T Ø 34 .– Un joint de réduction Ø 34/27 .– Un clapet anti-retour Ø 27 .– Un T Ø 27 .– Deux joints Ø 27/27 .– Un extincteur 6 à 7 litres .– Une vanne de sortie Ø 27/27 .– Un bec pour tuyau d’arrosage .– Un tuyau d’arrosage .– Une valve crépine modifiée (voir schéma/photos)', '- S’assurer d’une pression à la vanne d’arrivée d’un Bar. -Lancer le coup de bélier en tapotant sur le dessus de la valve crépine modifiée. ', 'belierHydro.webp', 'PrincipePompeBelier.webp', 'https://martes.tuxfamily.org/Le-belier-hydraulique'),
(7, 'Hotel à insectes', 3, '60 min', 'cultiver', '- Chambre de séchage :.\r\n- Assemble la chambre de séchage ( cube avec porte).\r\n- Découpé les voie d’aération ( en haut grilles, en bas trou connecté a la chambre de chauffe).\r\n- Chambre de chauffe :.\r\n- Assemble la chambre de chauffe ( caisson ).\r\n- Découpé les aération (en haut en contacte avec la chambre de séchage, en bas tour l’arrivé d’air).\r\n- Mettre le grillage anti insecte sur l’aération du bas.\r\n-Placé la perlite expansé au fond du caisson.\r\n- Recouvrir la perlite par la feuille de tôle ondulé.\r\n- Peindre la feuille de tôle et les bord visible du caisson en noir.\r\n- Placé la vitre au dessus de la feuille de tôle en laissant une lame d’air d’au moins 10cm.\r\n- Connecter les deux partie ( en y ajoutant le support nécessaires)\r\n', '– Planche de bois (120cm x 200cm).\r\n– Vitre (50cm x 100 cm).\r\n– Feuille de tôle ondulée.\r\n– Paille.\r\n– Grillage anti insectes.\r\n– Grillage 10x10 mm (casier entreposage).\r\n– Tasseaux 20x20 mm (casier entreposage).\r\n– Palette.\r\n- Vitre.\r\n- Feuille de tôle ondulé.\r\n- Perlite expansé.\r\n- Peinture noir\r\n', '- Placer les légumes et ou fruits puis orienter la partie vitrée face au soleil (réorienter au fur et a mesure de la journée).\r\n- L’aire chauffé par la tôle ondulé intensifié par l’effet loupe de la vitre, crée une effet thermodynamique (l’air chaud monte) qui va maintenir un flux d’air chaud dans la chambre de séchage\r\n', 'HotelAinsectes.webp', 'HotelAinsectesPrincipe.webp', 'www.feeda.org\r\n'),
(8, 'Filtre à eau', 1, '40 min', 'Alimentation', '-Percer le fond d’un des saut-Placer dans le fond de ce seau et dans cette ordre les éléments :.Coton, sable, cailloux puis charbon.-Placer le seau ainsi fabriqué au dessus du deuxième seau', '- Sable.- Coton.- Charbon.- Cailloux.- Deux sauts', '-Verser de l’eau sale dans le premier seau et attendre que celle-ci se retrouve dans le deuxième seau.-Toujours !!!! Faire bouillir l’eau obtenue dans le deuxième saut!!.Recommandation :.Cette LOW-TECH s\'applique dans des cas extrêmes, privilégier la récupération d’eau de pluie ou de rivière mais toujours faire bouillir l’eau cela tue la majorité des bactéries', 'filtreAeau.webp', 'filtreAeauPrincipe.webp', 'https://cabanadablog.wordpress.com/2018/03/15/filtrer-son-eau-grise-diy/'),
(10, 'Dentifrice', 2, '15 min', 'Hygiène', '- Dans un bol, mélangez le blanc de Meudon, l’argile et l’eau.\r\n- Dans un autre bol, mélangez l’huile de coco et le xylitol, puis ajoutez les huiles essentielles.\r\n- Ajoutez le second mélange au premier, et mélangez jusqu’à obtenir une pâte homogène.\r\n- Ajoutez le costard et mélangez.\r\n- Versez votre dentifrice dans un pot avec couvercle pour le conserver\r\n', '- 50 g de blanc de Meudon (carbonate de calcium).\r\n- 30 g d’argile blanche.\r\n- 40 ml d’eau.\r\n- 1 cuillère à café d’huile de coco vierge.\r\n- Une vingtaine de gouttes d’huiles essentielles de votre choix.\r\n- 1 cuillère à soupe de xylitol.\r\n- 25 gouttes de cosgard.\r\n- 2 bols.\r\n- Deux cuillères (ou une seule que vous nettoierez entre chaque étape).\r\n- Un pot avec couvercle pour conserver votre dentifrice\r\n', '- Humidifiez votre brosse à dents.\r\n-Placez un peu de dentifrice dessus à l’aide d’une petite spatule ou d’une petite cuillère (ou autre).\r\n- Ne plongez pas directement la brosse à dents dans le bocal de dentifrice, pour ne pas le contaminer.\r\n-N’utilisez pas non plus vos doigts, pour les mêmes raisons.\r\n- Brossez vous les dents comme d’habitude', 'Dentifrice.webp', 'Dentifrice.webp', 'https://planetehealthy.com/dentifrice-maison/'),
(11, 'Colle Alimentaire', 2, '20 min', 'Coller/fixer', '- Prenez un verre que vous utiliserez comme doseur.\r\n- Versez un verre de farine (ou d’amidon de riz) dans une casserole.\r\n- Ajoutez un verre d’eau et mélangez au fouet pour éviter les grumeaux.\r\n- Rajoutez l’extrait d’amande amère si vous souhaitez en mettre.\r\n- Mettre sur feu doux et continuez de mélanger régulièrement pour éviter que la colle ne s’agglutine.\r\n- La pâte va se compacter, si vous la sentez trop épaisse, rajoutez un peu d’eau.\r\n- N’oubliez pas qu’elle doit être facile à manier pour un enfant.\r\n- Votre colle est prête.\r\n', '- 1 verre de farine ou d’amidon de riz en cristaux.\r\n- 1 casserole.\r\n- 1 verre d’eau.\r\n- Extrait d’amande amère pour l’odeur (facultatif).\r\n- 1 fouet.\r\n- 1 bocal en verre ou des bâtonnets de colle vides\r\n', 'Attendez qu’elle soit froide avant de l’utiliser pour éviter tout risque de brûlure.\r\n', 'Colle alimentaire.webp', 'collePrincipe.webp', 'https://alternativi.fr/diy-fabriquer-soi-meme-de-la-colle/567\r\n'),
(12, 'Noeux marin', 1, '5 min', 'Lier/attacher', '- Assembler tel que décrit ci-contre', '- Corde ou ficelle', '', 'Noeux marin.webp', 'Noeux marin.webp', 'https://www.defense.gouv.fr/marine/patrimoine/traditions/noeuds-marins/les-noeuds-marins\r\n'),
(13, 'Le four Solaire', 2, '40 min', 'Cuisson', '- Couper une bande de 20x110 cm et la recourbé puis fixer ses extrémités.\r\n- couper un cercle de périmètre 100 cm dans le reste de la planche et faire un petit trou au centre de ce cercle.\r\n- Avec le chatterton fixer la couverture de survie et isoler les fond du cercle .\r\n- Chasser l’air de l’intérieur par le trou au centre du fond et le refermer avec le chatterton.\r\n-Fixer le trépider afin que le point de chauffe soit diriger sur le fond de la casserole\r\n\r\n', '- Planche souple 110x120cm ép 0,2cm.\r\n- Casserole.\r\n- Couverture de survie.\r\n- Chatterton.\r\n- Trépider\r\n', '- Placer le four face au soleil.\r\n-Suspendre la casserole au point de chauffe.\r\n-Surveiller jusqu’à cuisson des aliments \r\n', 'Le four solaire.webp', 'Le four solaire.webp', ''),
(14, 'Séchoir solaire', 3, '240 min', 'Conservation/alimentation', '* Chambre de séchage :.\r\n- Assemble la chambre de séchage ( cube avec porte).\r\n- Découpé les voie d’aération ( en haut grilles, en bas trou connecté a la chambre de chauffe).\r\n* Chambre de chauffe :.\r\n- Assemble la chambre de chauffe ( caisson ).\r\n- Découpé les aération (en haut en contacte avec la chambre de séchage, en bas tour l’arrivé d’air).\r\n- Mettre le grillage anti insecte sur l’aération du bas.\r\n-Placé la perlite expansé au fond du caisson.\r\n- Recouvrir la perlite par la feuille de tôle ondulé.\r\n- Peindre la feuille de tôle et les bord visible du caisson en noire.\r\n- Placé la vitre au dessus de la feuille de tôle en laissant une lame d’air d’au moins 10cm.\r\n- Connecter les deux partie ( en y ajoutant le support nécessaires)\r\n', '– Planche de bois (120cm x 200cm).\r\n– Vitre (50cm x 100 cm).\r\n– Feuille de tôle ondulée.\r\n– Paille.\r\n– Grillage anti insectes.\r\n– Grillage 10x10 mm (casier entreposage).\r\n– Tasseaux 20x20 mm (casier entreposage).\r\n– Palette.\r\n- Vitre.\r\n- Feuille de tôle ondulé.\r\n- Perlite expansé.\r\n- Peinture noir\r\n', '- Placer les légumes et ou fruits puis orienter la partie vitrée face au soleil (réorienter au fur et a mesure de la journée).\r\n- L’aire chauffé par la tôle ondulé intensifié par l’effet loupe de la vitre, crée une effet thermodynamique (l’air chaud monte) qui va maintenir un flux d’air chaud dans la chambre de séchage\r\n', 'Sechoir solaire.webp', 'Sechoir solaire.webp', 'www.feeda.org'),
(16, 'Poelito', 4, '240 min', 'Cuisson/chauffage', '- Regarder la vidéo de Barnabé Chaillot sur le sujet. -Couper les tubes d’acier de 10x10 aux dimensions que vous avez choisies. - Percer les ouvertures dans la bouteille de gaz (préalablement et complètement remplie d’eau). - Percer les ouverture dans les différents tubes aciers de 10x10. - Assembler comme sur le schéma.', '*Tube principal. - 1 Tube d’acier Ø 10x10 cm. *Bombonne de gaz vide. * Tube alimentation 2. - Tube d’acier Ø 10x10 cm. * Cheminée interne 3. - Tube d’acier Ø 10x10 cm. * Surface de cuisson 4.  - Casserole laiton.  * Enveloppe extérieure du corps de la masse 5. - Bombonne de gaz vide.  * Chemise d’étanchéité 6. - Feuille de tôle (couverture ext ballon d’eau chaude). * Masse 7. - Masse ( sable/cendre/ciment réfractaire…). * Cheminée externe 8. - Tube d’acier Ø 10x10 cm long 200 cm.  * Cheminée externe d’isolation 9. – Tube d’acier Ø 8 cm long 150 cm. * Bruleur 10. – Tige filetée Ø 10', '- Alimenter en bois, feuille, brf…. - Créer un effet d’aspiration dans le conduite 8', 'Poelito.avif', 'Poelito.avif', 'https://www.youtube.com/channel/UCg7HRu Q93hl9v8dTSt_XDHA/featured');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `titre` varchar(120) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `siteWeb` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `titre`, `description`, `siteWeb`, `email`, `image`) VALUES
(1, 'Duniter', 'La Ğ1 (prononcer : « June »), nouvelle monnaie dite « Libre », est\r\ncocréée et gérée de manière égalitaire, transparente et décentralisée.\r\nL\'association Duniter pense qu’un système de Monnaie Libre serait plus adapté à notre société que le système monétaire actuel, qui a été conçu et s’est développé dans des sociétés où les instances au pouvoir n’avaient pas pour premier objectif le bien-être et l’épanouissement de chacun.\r\n', 'https://duniter.fr', 'duniter@muc.duniter.org\r\n', 'duniter.avif'),
(2, 'Alternatiba', 'Ce réseau national vise à montrer toutes les solutions possibles pour s’attaquer aux causes du dérèglement climatique, au niveau local comme au niveau global. Prendre l’angle des alternatives concrètes permet de rompre avec le sentiment d’impuissance face à ce défi sans précédent pour l’humanité. Il s’agit également d’expliquer que la lutte contre le dérèglement climatique concerne la plupart des aspects de notre vie et de notre société : politiques énergétiques bien sûr, mais également aménagement du territoire, modèle d’agriculture, partage du travail et des richesses, modes de consommation ou de transports etc.', 'alternatiba.eu/montpellier ', 'montpellier@alternatiba.eu ', 'Alternatiba.avif'),
(3, 'La ruche', 'espace de co-working, d\'échanges et de créativité pour tous ceux qui souhaitent entreprendre autrement et innover en Occitanie ! La Ruche Montpellier accueille des entrepreneurs, salariés en télétravail et porteurs de projet, dans un cadre bienveillant et inspirant, facilitant la collaboration, l’épanouissement et la montée en compétences de chacun.  Vous souhaitez accueillir vos collaborateurs ou clients dans un espace à la fois professionnel mais aussi cosy, chaleureux et baigné de lumière? Avec son espace en plein centre ville, à 2min à pied de la Place de la Comédie et de la Gare St Roch, la Ruche offre des solutions adaptées à chaque acteur !', 'https://la-ruche.net/ruche/montpellier/', 'montpellier@la-ruche.net', 'La ruche.avif'),
(4, 'La cagette de Montpellier', 'Le premier supermarché coopératif et participatif à but non lucratif de Montpellier, dont les membres participent trois heures toutes les quatre semaines et sont les seul·e·s propriétaires, les seul·e·s décisionnaires et les seul·e·s client·e·s', 'https://lacagette-coop.fr', 'contact@lacagette-coop.fr', 'la cagette.avif');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `pseudo` varchar(120) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `mail`, `password`, `role`) VALUES
(1, 'olikoen', 'koenig', 'olivier', 'olikoen@yahoo.fr', '$2y$10$e4uHQJfWHEoLMDpCDGzAieDqg0DExuZ1t46Mi3nZ0YbNCv8hZHFyK', '1'),
(5, 'amour', 'Declosmenil', 'faustine', 'faustine@gmail.com', '$2y$10$3SH1UsmlfcDi435LqxaBges8T.1iA.swd6NNVD4glyrlmK3KC8HES', '2'),
(7, 'franckito', 'Bernard', 'franck', '', 'franck', '3'),
(8, 'manon', 'Asseli', 'Manon', '', '$2y$10$9YjOMvXAxRX3HmyzZh4xBuC3pmIWfidW8N.i2UDco00.uBCJnDayG', '3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alternative`
--
ALTER TABLE `alternative`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ateliers`
--
ALTER TABLE `ateliers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lowtech`
--
ALTER TABLE `lowtech`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alternative`
--
ALTER TABLE `alternative`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `ateliers`
--
ALTER TABLE `ateliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lowtech`
--
ALTER TABLE `lowtech`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
