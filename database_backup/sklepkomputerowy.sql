-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 03, 2025 at 08:30 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklepkomputerowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `atrybutkategoria`
--

CREATE TABLE `atrybutkategoria` (
  `AtrybutId` int(11) NOT NULL,
  `KategoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `atrybutkategoria`
--

INSERT INTO `atrybutkategoria` (`AtrybutId`, `KategoriaId`) VALUES
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 5),
(14, 5),
(15, 5),
(15, 12),
(16, 5),
(17, 5),
(23, 7),
(24, 7),
(25, 7),
(26, 7),
(27, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 11),
(32, 11),
(33, 11),
(34, 11),
(35, 11),
(36, 11),
(37, 11),
(38, 11),
(39, 12),
(40, 12),
(41, 12),
(42, 12),
(43, 12),
(44, 3),
(45, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `atrybuty`
--

CREATE TABLE `atrybuty` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(100) NOT NULL,
  `DataUtworzenia` datetime NOT NULL,
  `DataModyfikacji` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `atrybuty`
--

INSERT INTO `atrybuty` (`Id`, `Nazwa`, `DataUtworzenia`, `DataModyfikacji`) VALUES
(1, 'Typ gniazda', '2025-06-25 18:53:50', '2025-06-25 18:53:50'),
(2, 'Liczba rdzeni', '2025-06-25 18:53:59', '2025-06-25 18:53:59'),
(3, 'Liczba wątków', '2025-06-25 18:54:04', '2025-06-25 18:54:04'),
(4, 'Częstotliwość taktowania procesora', '2025-06-25 18:54:10', '2025-06-25 18:54:10'),
(5, 'Częstotliwość maksymalna Turbo', '2025-06-25 18:54:17', '2025-06-25 18:54:17'),
(6, 'Zintegrowany układ graficzny', '2025-06-25 18:54:24', '2025-06-25 18:54:24'),
(7, 'Wynik Benchmark', '2025-06-25 18:54:31', '2025-06-25 18:54:31'),
(8, 'Mikroarchitektura procesora', '2025-06-25 18:54:37', '2025-06-25 18:54:37'),
(9, 'Seria karty graficznej', '2025-06-26 15:18:58', '2025-06-26 15:18:58'),
(10, 'Obsługa Ray tracingu', '2025-06-26 15:19:14', '2025-06-26 15:19:14'),
(11, 'Technika upscalingu', '2025-06-26 15:19:28', '2025-06-26 15:19:28'),
(12, 'Układ graficzny', '2025-06-26 15:19:42', '2025-06-26 15:19:42'),
(13, 'Typ obudowy', '2025-06-26 15:20:12', '2025-06-26 15:20:12'),
(14, 'Panel boczny', '2025-06-26 15:20:19', '2025-06-26 15:20:19'),
(15, 'Podświetlenie', '2025-06-26 15:20:29', '2025-06-26 15:20:29'),
(16, 'Standard zasilacza', '2025-06-26 15:26:08', '2025-06-26 15:26:08'),
(17, 'Miejsca na karty rozszerzeń', '2025-06-26 15:26:20', '2025-06-26 15:26:20'),
(23, 'Typ pamięci', '2025-07-03 15:16:44', '2025-07-03 15:16:44'),
(24, 'Chłodzenie', '2025-07-03 15:16:48', '2025-07-03 15:16:48'),
(25, 'Pojemność łączna', '2025-07-03 15:16:52', '2025-07-03 15:16:52'),
(26, 'Liczba modułów', '2025-07-03 15:16:56', '2025-07-03 15:16:56'),
(27, 'Częstotliwość pracy [MHz]', '2025-07-03 15:16:59', '2025-07-03 15:16:59'),
(28, 'Opóźnienie', '2025-07-03 15:17:02', '2025-07-03 15:17:02'),
(29, 'Napięcie [V]', '2025-07-03 15:17:08', '2025-07-03 15:17:08'),
(30, 'Technologia podkręcania', '2025-07-03 15:17:12', '2025-07-03 15:17:12'),
(31, 'Standard płyty', '2025-07-03 15:24:55', '2025-07-03 15:24:55'),
(32, 'Chipset płyty', '2025-07-03 15:25:01', '2025-07-03 15:25:01'),
(33, 'Gniazdo procesora', '2025-07-03 15:25:09', '2025-07-03 15:25:09'),
(34, 'Obsługiwane procesory', '2025-07-03 15:25:13', '2025-07-03 15:25:13'),
(35, 'Standard pamięci', '2025-07-03 15:25:18', '2025-07-03 15:25:18'),
(36, 'Liczba slotów pamięci', '2025-07-03 15:25:23', '2025-07-03 15:25:23'),
(37, 'Maksymalna ilość pamięci', '2025-07-03 15:25:29', '2025-07-03 15:25:29'),
(38, 'Złącza wewnętrzne', '2025-07-03 15:25:46', '2025-07-03 15:25:46'),
(39, 'Rozmiar chłodnicy', '2025-07-03 15:32:11', '2025-07-03 15:32:11'),
(40, 'Przeznaczenie', '2025-07-03 15:32:18', '2025-07-03 15:32:18'),
(41, 'Kompatybilność z procesorami Intel', '2025-07-03 15:32:21', '2025-07-03 15:32:21'),
(42, 'Kompatybilność z procesorami AMD', '2025-07-03 15:32:25', '2025-07-03 15:32:25'),
(43, 'Liczba wentylatorów', '2025-07-03 15:32:39', '2025-07-03 15:32:39'),
(44, 'Rekomendowana moc zasilacza', '2025-07-03 15:45:47', '2025-07-03 15:45:47'),
(45, 'Ilość pamięci RAM', '2025-07-03 15:46:02', '2025-07-03 15:46:02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `elementyzamowienia`
--

CREATE TABLE `elementyzamowienia` (
  `Id` int(11) NOT NULL,
  `ZamowienieId` int(11) NOT NULL,
  `ProduktId` int(11) NOT NULL,
  `Ilosc` int(10) UNSIGNED NOT NULL,
  `Cena` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `elementyzamowienia`
--

INSERT INTO `elementyzamowienia` (`Id`, `ZamowienieId`, `ProduktId`, `Ilosc`, `Cena`) VALUES
(8, 9, 4, 1, 2499.00),
(9, 9, 5, 2, 2449.00),
(10, 9, 6, 1, 1112.06),
(11, 10, 4, 2, 2499.00),
(12, 10, 6, 1, 1112.06),
(13, 11, 5, 2, 2449.00),
(14, 12, 4, 2, 2499.00),
(15, 12, 5, 1, 2449.00),
(16, 13, 5, 2, 2449.00),
(17, 14, 5, 1, 2449.00),
(18, 14, 6, 1, 1112.06),
(19, 15, 4, 1, 2499.00),
(20, 17, 4, 2, 2499.00),
(21, 18, 2, 1, 3.00),
(22, 18, 4, 1, 2499.00),
(23, 19, 2, 1, 3.00),
(24, 19, 4, 2, 2499.00),
(25, 20, 2, 1, 3.00),
(26, 21, 5, 1, 2449.00),
(27, 21, 11, 1, 970.99),
(28, 21, 12, 1, 629.00),
(29, 21, 13, 1, 499.00),
(30, 22, 9, 1, 390.04),
(31, 22, 13, 1, 499.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(100) NOT NULL,
  `Opis` text DEFAULT NULL,
  `Ikona` varchar(100) DEFAULT NULL,
  `DataUtworzenia` datetime NOT NULL,
  `DataModyfikacji` datetime NOT NULL,
  `CzyAktywny` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`Id`, `Nazwa`, `Opis`, `Ikona`, `DataUtworzenia`, `DataModyfikacji`, `CzyAktywny`) VALUES
(3, 'Karta graficzna', '<h2>Karty graficzne - czym kierować się podczas wyboru?</h2>\r\n<h3>Karta graficzna GeForce czy Radeon?</h3>\r\n<p>Na wyb&oacute;r producenta chipu wpływa gł&oacute;wnie obecność takiego modelu karty graficznej, kt&oacute;ry spełnia wymagania użytkownika. Niezależnie, czy będzie Ci służyć do rozwiązań domowych, profesjonalnych, czy też w gamingu. Modelu, kt&oacute;ry zapewni oczekiwaną wydajność, ma optymalne parametry pracy i cieszy się dobrymi opiniami. W ofercie obu producent&oacute;w znajdziesz karty graficzne chętnie wybierane przez graczy, grafik&oacute;w, czy fotograf&oacute;w. Zar&oacute;wno wersje referencyjne, jak i niereferencyjne. Zobacz&nbsp;<a title=\"karty graficzne NVIDIA\" href=\"https://www.x-kom.pl/g-5/c/346-karty-graficzne-nvidia.html\"><strong>karty graficzne NVIDIA</strong></a>&nbsp;i&nbsp;<a title=\"karty graficzne AMD\" href=\"https://www.x-kom.pl/g-5/c/22-karty-graficzne-amd.html\"><strong>karty graficzne AMD</strong></a>.</p>\r\n<h3>Kompatybilność z komponentami innych marek</h3>\r\n<p>Nie ma żadnych przeciwwskazań do zainstalowania karty graficznej Radeon na płycie gł&oacute;wnej z procesorem Intel. Ta zasada odnosi się także do konstrukcji GeForce, goszczących w zestawach pod kontrolą procesora AMD. Ograniczeniem są technologie odświeżania obrazu (AMD FreeSync i NVIDIA G-Sync), obecne w monitorach. Chcąc z nich korzystać, dopasuj kartę graficzną do technologii obsługiwanej przez panel. Sprawdź także, jak dużą kartę VGA pomieści obudowa desktopa.</p>\r\n<h3>Układ gamingowy, biurowy, a może profesjonalny?</h3>\r\n<p>W domu i w biurze wystarczy konstrukcja z serii GeForce GT. Myśląc o komponencie do gier, wybierz produkty z segmentu NVIDIA GeForce RTX, NVIDIA GeForce GTX, AMD Radeon RX serii 5xx oraz Radeon RX Vega. W pracy z programami profesjonalnymi niezbędne są układy o ogromnej mocy obliczeniowej, jak NVIDIA Quadro. Szczeg&oacute;łową charakterystykę powyższych układ&oacute;w VGA znajdziesz w naszym poradniku:&nbsp;<a title=\"Jaką kartę graficzną wybrać? Kt&oacute;ra jest najlepsza?\" href=\"https://www.x-kom.pl/poradniki/5277-jaka-karte-graficzna-wybrac-ktora-jest-najlepsza.html\"><strong>Karta graficzna &ndash; jak wybrać? Kt&oacute;ra jest najlepsza?</strong></a></p>\r\n<h3>Wybieramy ilość pamięci VRAM</h3>\r\n<p>Na wyb&oacute;r ilości pamięci VRAM decydujący wpływ mają:</p>\r\n<ul>\r\n<li>Rozdzielczość, w jakiej grasz lub pracujesz. Dla rozdzielczości Full HD potrzebujesz układu z pamięcią VRAM 4 GB. Rozdzielczość WQHD wymaga 6 GB, a dla podziałki 4K niezbędne jest 8 GB VRAM, a najlepiej 11 GB VRAM albo więcej.</li>\r\n<li>Poziom detalizacji ustawień oraz efekt&oacute;w dodatkowych. Wysokie detale wymagają 4 GB VRAM, do ustawień ultra potrzebny jest układ z minimum 6 GB VRAM.</li>\r\n<li>Proporcje matrycy monitora. Dla paneli 16:9 wystarcza 4 GB pamięci wideo. Wyświetlacze panoramiczne (21:9 albo 32:9) potrzebują przynajmniej 6 GB VRAM.</li>\r\n<li>Segment gier. W popularne tytuły zagrasz z kartą graficzną z 4 GB VRAM, lecz dla gier z segmentu AAA wybierz model z 6 GB lub od razu z 8 GB pamięci wideo.</li>\r\n</ul>\r\n<h3>Technologie i rozwiązania stosowane w kartach graficznych</h3>\r\n<p>Jednym z najbardziej pożądanych rozwiązań jest podkręcania wydajności. Służą do tego dedykowane aplikacje z predefiniowanymi trybami pracy. Jedno kliknięcie i karta automatycznie zwiększy taktowanie. R&oacute;wnie ceniony jest p&oacute;łpasywny układ chłodzenia VGA, zaczynający pracę dopiero wtedy, gdy temperatura konstrukcji osiągnie określony poziom.</p>\r\n<p>Miłośnicy designu szukają także modeli z podświetleniem LED, dającym się konfigurować. Coraz bardziej popularna jest ponadto technologia VR, czyli projekcja rzeczywistości wirtualnej. Karty obsługujące VR dysponują odpowiednią liczbą port&oacute;w.</p>\r\n<h3>FAQ - Najczęściej zadawane pytania</h3>\r\n<div>\r\n<h3 itemprop=\"name\">Jaka karta graficzna do gier?</h3>\r\n<p>Do gier najlepszymi kartami graficznymi są serie NVIDIA GeForce RTX i AMD Radeon RX, z kt&oacute;rych każda oferuje wystarczającą wydajność w nowych produkcjach. Każdy producent (np.&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?producent=27-asus\">ASUS</a>,&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?producent=7-msi\">MSI</a>,&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?producent=57-gigabyte\">Gigabyte</a>&nbsp;czy&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?producent=1126-inno3d\">Inno3D</a>) ma w swojej ofercie modele z r&oacute;żnych segment&oacute;w. R&oacute;żnią się one specyfikacją, wydajnością oraz ceną.<br><br>Ceny kart graficznych NVIDIA GeForce RTX czy AMD Radeon RX nie należą do niskich. Najtańsze modele przeznaczone do gry w rozdzielczości 1080p mają cenę sugerowaną poniżej lub około 2000 zł (<a href=\"https://www.x-kom.pl/g-5/c/346-karty-graficzne-nvidia.html?f1702-uklad-graficzny=231180-geforce-rtx-3050\">RTX 3050</a>,&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/346-karty-graficzne-nvidia.html?f1702-uklad-graficzny=191561-geforce-rtx-3060\">RTX 3060</a>&nbsp;lub Radeony&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/22-karty-graficzne-amd.html?f1702-uklad-graficzny=221408-radeon-rx-6600\">RX 6600</a>,&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/22-karty-graficzne-amd.html?f1702-uklad-graficzny=214160-radeon-rx-6600-xt\">RX 6600 XT</a>&nbsp;i&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/22-karty-graficzne-amd.html?f1702-uklad-graficzny=246533-radeon-rx-6650-xt\">RX 6650 XT</a>). Gdy chcesz lepszą wydajność i grać w np. 1440p, musisz wydać od 2000 zł (<a href=\"https://www.x-kom.pl/g-5/c/346-karty-graficzne-nvidia.html?f1702-uklad-graficzny=186579-geforce-rtx-3060-ti\">RTX 3060 Ti</a>,&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/346-karty-graficzne-nvidia.html?f1702-uklad-graficzny=178141-geforce-rtx-3070\">RTX 3070</a>&nbsp;lub&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?f1702-uklad-graficzny=251495-radeon-rx-6700\">RX 6700</a>) do nawet ok. 5000 zł (<a href=\"https://www.x-kom.pl/g-5/c/346-karty-graficzne-nvidia.html?f1702-uklad-graficzny=270832-geforce-rtx-4070-ti\">RTX 4070 Ti</a>&nbsp;lub&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/22-karty-graficzne-amd.html?f1702-uklad-graficzny=269126-radeon-rx-7900-xt\">RX 7900 XT</a>). Cena najmocniejszych kart graficznych, kt&oacute;re sprawdzą się w 4K, waha się między 5000 zł a nawet ponad 10000 zł (<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?f1702-uklad-graficzny=261756-geforce-rtx-4080\">RTX 4080</a>,&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/345-karty-graficzne.html?f1702-uklad-graficzny=260164-geforce-rtx-4090\">RTX 4090</a>&nbsp;lub&nbsp;<a href=\"https://www.x-kom.pl/g-5/c/22-karty-graficzne-amd.html?f1702-uklad-graficzny=269116-radeon-rx-7900-xtx\">RX 7900 XTX</a>).</p>\r\n</div>\r\n<div>\r\n<h3 itemprop=\"name\">Jaką kartę graficzną wybrać do laptopa?</h3>\r\n<p>Do prostych zastosowań, w tym biurowych, wystarczy zintegrowany układ graficzny (iGPU) Intela lub AMD, kt&oacute;ry cechuje się energooszczędnością. Do bardziej zaawansowanych zadań, takich jak projektowanie graficzne, oraz do wymagających gier wybierz dedykowaną kartę pokroju GeForce GTX, GeForce RTX czy AMD Radeon RX.</p>\r\n</div>\r\n<div>\r\n<h3 itemprop=\"name\">Czy można wymienić kartę graficzną w laptopie?</h3>\r\n<p>Zintegrowanego układu graficznego, kt&oacute;ry jest częścią procesora, nie da się wymienić. R&oacute;wnież w wielu przypadkach wymiana dedykowanego GPU nie jest możliwa lub bardzo utrudniona, gdy jest przylutowana do płyty gł&oacute;wnej. Wyjątkiem są notebooki wyposażone w specjalne dedykowane złącze lub MXM, będące odpowiednikiem PCI-Express z komputer&oacute;w stacjonarnych.</p>\r\n</div>', 'karta-graficzna.png', '2025-06-24 13:44:28', '2025-06-26 16:50:47', b'1'),
(4, 'Zasilacz', NULL, 'zasilacz.png', '2025-06-24 13:51:17', '2025-06-26 16:24:16', b'1'),
(5, 'Obudowa', NULL, 'obudowa.png', '2025-06-24 13:51:39', '2025-06-26 16:24:22', b'1'),
(6, 'Procesor', NULL, 'procesor.png', '2025-06-24 14:14:01', '2025-06-26 16:20:28', b'1'),
(7, 'Pamięć RAM', NULL, 'pamiec-ram.png', '2025-06-24 14:14:18', '2025-06-26 16:20:41', b'1'),
(11, 'Płyta główna', NULL, 'plyta-glowna.png', '2025-06-26 16:33:53', '2025-06-26 16:33:58', b'1'),
(12, 'Chłodzenie', NULL, 'chlodzenie.png', '2025-06-26 16:34:06', '2025-06-26 16:34:06', b'1'),
(13, 'Dysk HDD', NULL, 'dysk-hdd.png', '2025-06-26 16:34:13', '2025-06-26 20:12:36', b'1'),
(14, 'Dysk SSD', NULL, 'dysk-ssd.png', '2025-06-26 16:34:29', '2025-06-26 16:34:46', b'1'),
(15, 'Klawiatura', NULL, 'klawiatura.png', '2025-06-26 16:34:40', '2025-06-26 16:34:40', b'1'),
(16, 'Mysz', NULL, 'mysz.png', '2025-06-26 16:35:16', '2025-06-26 16:35:16', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinieproduktow`
--

CREATE TABLE `opinieproduktow` (
  `Id` int(11) NOT NULL,
  `ProduktId` int(11) NOT NULL,
  `UzytkownikId` int(11) NOT NULL,
  `Ocena` tinyint(3) UNSIGNED NOT NULL,
  `Komentarz` text DEFAULT NULL,
  `DataUtworzenia` datetime NOT NULL,
  `DataModyfikacji` datetime NOT NULL,
  `CzyAktywny` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `opinieproduktow`
--

INSERT INTO `opinieproduktow` (`Id`, `ProduktId`, `UzytkownikId`, `Ocena`, `Komentarz`, `DataUtworzenia`, `DataModyfikacji`, `CzyAktywny`) VALUES
(3, 4, 2, 5, 'Super!', '2025-06-25 14:29:56', '2025-06-25 14:29:56', b'1'),
(4, 4, 1, 2, 'Średni *****', '2025-06-25 14:43:27', '2025-07-02 15:47:31', b'0'),
(5, 5, 1, 5, 'Najlepszy procesor', '2025-06-26 12:48:08', '2025-06-26 12:48:08', b'1'),
(6, 6, 1, 3, 'Słabo', '2025-06-26 17:19:05', '2025-07-02 15:47:36', b'1'),
(7, 6, 2, 5, 'Super procesor', '2025-06-26 22:29:34', '2025-06-26 22:29:34', b'1'),
(8, 5, 2, 4, 'okej', '2025-06-26 22:46:27', '2025-07-02 14:05:26', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produktatrybut`
--

CREATE TABLE `produktatrybut` (
  `Id` int(11) NOT NULL,
  `ProduktId` int(11) NOT NULL,
  `AtrybutId` int(11) NOT NULL,
  `Wartosc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `produktatrybut`
--

INSERT INTO `produktatrybut` (`Id`, `ProduktId`, `AtrybutId`, `Wartosc`) VALUES
(2, 5, 2, '16 rdzeni'),
(3, 5, 3, '32'),
(4, 5, 4, '4.3 GHz'),
(5, 5, 5, '5.7 GHz'),
(6, 5, 6, 'AMD Radeon Graphics'),
(7, 5, 7, '66284'),
(8, 5, 8, 'Socket AM5'),
(9, 6, 1, 'Socket AM5'),
(10, 6, 2, '8 rdzeni'),
(11, 6, 3, '16'),
(12, 6, 4, '3.8 GHz'),
(13, 6, 5, '5.3 GHz'),
(14, 6, 6, 'AMD Radeon seria R7'),
(15, 6, 7, '34798'),
(16, 6, 8, 'Zen 4'),
(17, 7, 23, 'DDR5'),
(18, 7, 24, 'Radiator'),
(19, 7, 25, '32 GB'),
(20, 7, 26, '2'),
(21, 7, 27, '6000'),
(22, 7, 28, 'CL30'),
(23, 7, 29, '1.4'),
(24, 7, 30, 'AMD EXPO'),
(25, 8, 31, 'ATX'),
(26, 8, 32, 'AMD X870E'),
(27, 8, 33, 'Socket AM5'),
(28, 8, 34, 'AMD Ryzen'),
(29, 8, 35, 'DDR5'),
(30, 8, 36, '4'),
(31, 8, 37, '256 GB'),
(32, 9, 39, '360 mm'),
(33, 9, 40, 'Do procesora'),
(34, 9, 41, 'LGA 1700/1851'),
(35, 9, 42, 'AM4, AM5'),
(36, 9, 43, '3'),
(37, 9, 15, 'ARGB'),
(38, 10, 9, 'Nvidia GeForce'),
(39, 10, 10, 'Tak'),
(40, 10, 11, 'DLSS 4'),
(41, 10, 12, 'GeForce RTX 5060'),
(42, 11, 9, 'AMD Radeon RX'),
(43, 11, 12, 'Radeon RX 6600'),
(44, 11, 44, '500 W'),
(45, 11, 45, '8 GB'),
(46, 22, 10, '34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `Id` int(11) NOT NULL,
  `KategoriaId` int(11) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `Opis` text NOT NULL,
  `Cena` decimal(10,2) NOT NULL,
  `IloscNaStanie` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `SKU` varchar(100) NOT NULL,
  `UrlZdjecia` varchar(255) DEFAULT NULL,
  `DataUtworzenia` datetime NOT NULL,
  `DataModyfikacji` datetime NOT NULL,
  `CzyAktywny` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`Id`, `KategoriaId`, `Nazwa`, `Opis`, `Cena`, `IloscNaStanie`, `SKU`, `UrlZdjecia`, `DataUtworzenia`, `DataModyfikacji`, `CzyAktywny`) VALUES
(2, 5, '1', '<p>2</p>', 3.00, 1, '5', 'https://image.ceneostatic.pl/data/products/154359851/i-gigabyte-geforce-rtx-4060-gaming-oc-8gb-gddr6-gvn4060gamingoc8gd.jpg', '2025-06-17 15:11:35', '2025-07-02 14:04:53', b'0'),
(3, 3, 'Karta graficzna', '<p>3</p>', 4.00, 0, '2', 'https://techlord.pl/images/produkty/MSONE/3267588/2.jpg', '2025-06-17 15:15:31', '2025-07-02 14:18:28', b'1'),
(4, 3, 'Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4', '<div class=\"opis_market\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5 style=\"text-align: center;\"><strong>Wydajność do działania</strong></h5>\r\n<img class=\"indiana_img has-lazy-load is-loaded\" style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/1.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Karta graficzna Gigabyte GeForce RTX 5070 Windforce OC SFF 16GB w ujęciu na czarnym tle\" width=\"694\" height=\"440\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>GeForce RTX&trade; z serii 50</strong></h5>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/rtx50.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"676\" height=\"507\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Architektura NVIDIA Blackwell</strong></h5>\r\n<p>Oparte na przełomowych rozwiązaniach&nbsp;<strong>NVIDIA Blackwell</strong>&nbsp;układy&nbsp;<strong>GPU GeForce RTX&trade; z serii 50</strong>&nbsp;redefiniują standardy w grach i tw&oacute;rczości cyfrowej. Dzięki&nbsp;<strong>potężnej mocy sztucznej inteligencji</strong>&nbsp;oferują zupełnie nowe wrażenia oraz niespotykaną dotąd wierność graficzną. Zyskaj przewagę z technologią&nbsp;<strong>NVIDIA DLSS 4</strong>, kt&oacute;ra zwiększa wydajność i generuje obrazy z niezwykłą szybkością, pozwalając na jeszcze bardziej płynną rozgrywkę. Uwolnij swoją kreatywność z platformą&nbsp;<strong>NVIDIA Studio</strong>, kt&oacute;ra dostarcza narzędzia i optymalizacje, aby Twoje projekty sięgnęły doskonałości.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/nvidiablackwell.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"709\" height=\"399\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>RTX. It&rsquo;s On.</strong></h5>\r\n<p><strong>RTX</strong>&nbsp;to zaawansowana platforma, kt&oacute;ra przenosi gry i tworzenie na kolejny poziom. Dzięki&nbsp;<strong>pełnemu ray tracingowi</strong>&nbsp;możesz cieszyć się&nbsp;<strong>realistycznym oświetleniem, odbiciami i cieniami</strong>, dzięki kt&oacute;rym świat w grach wygląda jak rzeczywistość. Zaawansowane&nbsp;<strong>techniki renderingu oparte na sieciach neuronowych</strong>, takie jak&nbsp;<strong>DLSS</strong>, wpływają na wyjątkową płynność i jakość obrazu przy niewielkim obciążeniu sprzętu. Z technologii RTX korzysta&nbsp;<strong>ponad 700 gier i aplikacji</strong>, oferując niesamowitą grafikę i wydajność sprawiające, że każda rozgrywka i proces tw&oacute;rczy stają się&nbsp;<strong>efektywne, płynne i ekscytujące</strong>.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/rtx1.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"700\" height=\"394\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Oprawa graficzna z potęgą AI</strong></h5>\r\n<p><strong>DLSS</strong>&nbsp;to zaawansowana&nbsp;<strong>technologia renderingu oparta na sztucznej inteligencji</strong>, kt&oacute;ra wykorzystuje sieci neuronowe, by zwiększać ilość FPS, redukować op&oacute;źnienia i poprawiać jakość obrazu. Wersja&nbsp;<strong>DLSS 4</strong>&nbsp;wprowadza&nbsp;<strong>funkcje generowania wielu klatek</strong>, ulepszoną&nbsp;<strong>rekonstrukcję promieni</strong>&nbsp;oraz&nbsp;<strong>superrozdzielczość</strong>, zapewniając realistyczne wrażenia. Działa dzięki układom&nbsp;<strong>GeForce RTX&trade; z serii 50</strong>&nbsp;i&nbsp;<strong>rdzeniom Tensor 5 generacji</strong>, oferując wyjątkową wydajność. Dzięki wsparciu przez&nbsp;<strong>superkomputer AI NVIDIA</strong>&nbsp;w chmurze stale podnosi możliwości gamingowe, zapewniając płynną rozgrywkę i niesamowitą grafikę.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/dlss.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"709\" height=\"399\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Przełomowy realizm</strong></h5>\r\n<p><strong>Architektura NVIDIA Blackwell</strong>&nbsp;przenosi gry na kolejny poziom realizmu dzięki&nbsp;<strong>pełnemu ray tracingowi</strong>, kt&oacute;ry zmienia reguły gry. Doświadcz płynnej rozgrywki i wyjątkowej szczeg&oacute;łowości dzięki układom&nbsp;<strong>GeForce RTX z serii 50</strong>, kt&oacute;re wykorzystują&nbsp;<strong>rdzenie RT 4 generacji</strong>&nbsp;do realistycznego oświetlenia i cieni oraz&nbsp;<strong>rdzenie Tensor 5 generacji</strong>, akcelerujące technologie renderingu oparte na sztucznej inteligencji. To gwarancja niesamowitej wydajności i wciągających wrażeń wizualnych.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/rtx2.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"716\" height=\"403\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Rozgrywki bez op&oacute;źnień</strong></h5>\r\n<p>Technologie&nbsp;<strong>NVIDIA Reflex</strong>&nbsp;optymalizują proces graficzny, oferując wyjątkową responsywność, szybkie namierzanie cel&oacute;w, kr&oacute;tki czas reakcji i precyzję celowania w grach rywalizacyjnych.&nbsp;<strong>Reflex 2</strong>&nbsp;wprowadza&nbsp;<strong>funkcję Frame Warp</strong>, kt&oacute;ra pozwoli na jeszcze mniejsze op&oacute;źnienia,&nbsp;<strong>dostosowując wyświetlanie klatek do danych wejściowych z myszy</strong>. To oznacza błyskawiczne reakcje i przewagę w grach, w kt&oacute;rych liczy się każda milisekunda.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/reflex2.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"717\" height=\"404\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Przewaga dzięki AI</strong></h5>\r\n<p>Podkręć swoją rozgrywkę, tworzenie, produktywność oraz programowanie z kartami&nbsp;<strong>NVIDIA GeForce RTX&trade;</strong>. Dzięki&nbsp;<strong>wbudowanym procesorom AI</strong>&nbsp;zyskujesz dostęp do zaawansowanych technologii sztucznej inteligencji, kt&oacute;re wspomogą Tw&oacute;j komputer z systemem Windows. Od ulubionych aplikacji po programy &ndash; z&nbsp;<strong>RTX AI</strong>&nbsp;wszystko stanie się szybkie, inteligentne i przyjemne. Od uruchamiania własnego chatbota, przez trenowanie niestandardowych modeli, aż po wbudowywanie AI w gry &ndash; to możliwe dzięki mocy RTX. Co więcej,&nbsp;<strong>dane pozostają na komputerze</strong>, co zapewnia ich prywatność i bezpieczeństwo.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/rtx_ai.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"691\" height=\"389\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Kreatywna przewaga z AI</strong></h5>\r\n<p><strong>NVIDIA Studio</strong>&nbsp;daje Ci kreatywną przewagę, oferując przełomową wydajność w edycji wideo, renderingu 3D i projektowaniu graficznym. Układy&nbsp;<strong>GPU GeForce RTX z serii 50</strong>&nbsp;zapewniają&nbsp;<strong>akcelerację RTX</strong>&nbsp;w aplikacjach kreatywnych, umożliwiając szybkie realizowanie ambitnych projekt&oacute;w. Dzięki&nbsp;<strong>stale aktualizowanym sterownikom NVIDIA Studio</strong>, zaprojektowanym z myślą o maksymalnej stabilności, oraz wyjątkowym&nbsp;<strong>narzędziom wspomaganym AI</strong>, zyskujesz pełną moc platformy do kreatywnego tworzenia.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_nvidia_rtx50/nvidiastudio.jpg\" alt=\"Nvidia GeForce RTX z serii 50\" width=\"749\" height=\"422\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Uwolnij pełną moc</strong></h5>\r\n<p><strong>GIGABYTE GeForce RTX 5070 Windforce OC SFF</strong>&nbsp;to karta graficzna, kt&oacute;ra łączy wysoką wydajność z praktycznymi rozwiązaniami. Dzięki&nbsp;<strong>zgodności ze standardem NVIDIA SFF-ready</strong>&nbsp;bez problemu mieści się w mniejszych obudowach, nie tracąc przy tym na mocy obliczeniowej. Układ bazuje na&nbsp;<strong>architekturze NVIDIA Blackwell</strong>, wspiera&nbsp;<strong>Ray Tracing</strong>&nbsp;i technologię&nbsp;<strong>DLSS 4</strong>, co przekłada się na realistyczne efekty świetlne oraz wysoką płynność animacji. Z&nbsp;<strong>12 GB pamięci GDDR7</strong>&nbsp;i&nbsp;<strong>192-bitową szyną pamięci</strong>&nbsp;oferuje błyskawiczne przetwarzanie danych.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/2.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Widok karty graficznej z innej perspektywy, ukazujący grubość i konstrukcję systemu chłodzenia. Wentylatory mają aerodynamiczny kształt, a obudowa utrzymana jest w jednolitym czarnym kolorze\" width=\"726\" height=\"437\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Efektywne chłodzenie</strong></h5>\r\n<p><strong>Chłodzenie WINDFORCE</strong>&nbsp;wykorzystuje połączenie kilku technologii, kt&oacute;re dbają o optymalne temperatury pracy.&nbsp;<strong>Trzy wentylatory Hawk Fan</strong>&nbsp;zwiększają przepływ powietrza o nawet&nbsp;<strong>12,5%</strong>&nbsp;i podnoszą ciśnienie statyczne o<strong>&nbsp;53,6%</strong>&nbsp;w stosunku do wentylator&oacute;w używanych w starszych modelach. Dodatkowo zastosowano&nbsp;<strong>funkcję Alternate Spinning</strong>, kt&oacute;ra redukuje turbulencje między wentylatorami, poprawiając wydajność chłodzenia. Konstrukcja opiera się też na&nbsp;<strong>dużej komorze parowej przylegającej bezpośrednio do rdzenia GPU</strong>&nbsp;oraz zestawie&nbsp;<strong>kompozytowych rurek cieplnych</strong>, kt&oacute;re skutecznie odprowadzają ciepło na radiator.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/3.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Ilustracja działania wentylator&oacute;w z zaznaczonym ruchem powietrza. Strzałki wskazują kierunek obrotu, co podkreśla technologię naprzemiennego obracania, poprawiającą przepływ powietrza i wydajność chłodzenia\" width=\"741\" height=\"391\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Inteligentne wentylatory</strong></h5>\r\n<p><strong>P&oacute;łpasywne chłodzenie 3D Active Fan&nbsp;</strong>sprawia, że wentylatory pozostają wyłączone przy niskim obciążeniu, co pozwala na cichszą pracę systemu. Gdy temperatura wzrasta, chłodzenie&nbsp;<strong>automatycznie dostosowuje swoje parametry</strong>, zapewniając wydajne odprowadzanie ciepła bez nadmiernego hałasu. Konstrukcja radiatora z&nbsp;<strong>technologią Screen Cooling</strong>&nbsp;pozwala na lepszy przepływ powietrza, co poprawia rozpraszanie energii cieplnej.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/4.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Widok tylnej części karty, prezentujący metalowy backplate z wcięciami umożliwiającymi lepszą cyrkulację powietrza. Dodatkowe oznaczenia pokazują przepływ ciepła i efektywność systemu Screen Cooling\" width=\"726\" height=\"465\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Solidna konstrukcja</strong></h5>\r\n<p><strong>Wzmocniona metalowa płyta ochronna</strong>&nbsp;zwiększa sztywność konstrukcji, chroniąc kartę&nbsp;<strong>GIGABYTE GeForce RTX 5070 Windforce OC SFF</strong>&nbsp;przed odkształceniami i uszkodzeniami mechanicznymi. Dodatkowo zastosowano&nbsp;<strong>komponenty Ultra Durable</strong>&nbsp;&ndash; wysokogatunkowe dławiki, kondensatory o niskim ESR oraz&nbsp;<strong>2-uncjową warstwę miedzi w PCB</strong>, co zwiększa stabilność napięć i żywotność układu. Dzięki temu karta może pracować z wysokim obciążeniem przez długi czas,&nbsp;<strong>bez ryzyka spadk&oacute;w wydajności</strong>.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/5.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Metalowa osłona ochronna karty z logo Gigabyte i oznaczeniami GeForce RTX. Wyr&oacute;żniają się żłobienia poprawiające sztywność konstrukcji oraz otwory wentylacyjne wspierające odprowadzanie ciepła\" width=\"726\" height=\"412\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Podłącz i graj</strong></h5>\r\n<p><strong>Trzy porty DisplayPort 2.1b</strong>&nbsp;oraz&nbsp;<strong>jedno HDMI 2.1b</strong>&nbsp;pozwalają na obsługę do&nbsp;<strong>czterech monitor&oacute;w jednocześnie</strong>. Dzięki maksymalnej rozdzielczości&nbsp;<strong>7680 x 4320 px</strong>&nbsp;karta świetnie sprawdzi się w zastosowaniach wieloekranowych &ndash; zar&oacute;wno w gamingu, jak i w profesjonalnych zadaniach, takich jak obr&oacute;bka grafiki czy edycja wideo.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/8.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Ujęcie pod kątem, pokazujące porty wyjściowe karty, w tym trzy DisplayPort 2.1b oraz jedno HDMI 2.1b. Widoczna także struktura wentylator&oacute;w i og&oacute;lny design urządzenia\" width=\"730\" height=\"526\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\" style=\"text-align: center;\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5><strong>Kontroluj działanie karty</strong></h5>\r\n<p><strong>Oprogramowanie GIGABYTE Control Center</strong>&nbsp;to niezwykle funkcjonalne narzędzie dla posiadaczy karty&nbsp;<strong>GIGABYTE GeForce RTX 5070 Windforce OC SFF</strong>. Dzięki niemu użytkownicy mogą&nbsp;<strong>dostosować jej ustawienia, prędkość wentylator&oacute;w</strong>&nbsp;oraz&nbsp;<strong>monitorować temperaturę</strong>&nbsp;czy inne parametry.</p>\r\n<img class=\"has-lazy-load is-loaded\" src=\"https://www.mediaexpert.pl/media/cache/resolve/filemanager_original/images/descriptions/images/74/7473110/storage_app_opisy2_gigabyte_2062927/9.jpg\" alt=\"Karta graficzna GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB DLSS 4 Interfejs oprogramowania Gigabyte Control Center z otwartymi panelami zarządzania kartą graficzną. Na ekranie widoczne są opcje regulacji taktowania, ustawienia wentylator&oacute;w i monitorowanie temperatury GPU\" width=\"714\" height=\"381\" data-adafir-ll=\"1\"></div>\r\n</div>\r\n</div>\r\n<div class=\"clear_box\" style=\"text-align: center;\">&nbsp;</div>\r\n<hr>\r\n<div class=\"opis_market\">\r\n<div class=\"mainWidth_v\">\r\n<div class=\"prawa\">\r\n<h5 style=\"text-align: center;\"><strong>Zawartość opakowania</strong></h5>\r\n<p style=\"text-align: center;\">Opakowanie zawiera: kartę graficzną&nbsp;<strong>GIGABYTE GeForce RTX 5070 Windforce OC SFF 12GB</strong>, adapter zasilania z 1x12V-2x6 na 2x 8-pin PCIe oraz szybki przewodnik.</p>\r\n</div>\r\n</div>\r\n</div>', 2499.00, 35, '4718006457358', 'https://prod-api.mediaexpert.pl/api/images/gallery/thumbnails/images/74/7473110/Karta-graficzna-GIGABYTE-GeForce-RTX-5070-Windforce-1.jpg', '2025-06-24 15:10:04', '2025-07-02 14:04:48', b'1'),
(5, 6, 'Procesor AMD Ryzen 9 9950X, 4.3 GHz, 64 MB, BOX', '<div class=\"section-accordion__body collapsible\">\r\n<div class=\"panel-description\">\r\n<div class=\"desc-items1\">\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"image col-sm-12 text-center\" style=\"text-align: center;\">&nbsp;</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3><strong>Nowa generacja wydajności &ndash; architektura Zen 5</strong></h3>\r\n<p>Procesor AMD Ryzen 9 9950X to flagowy model najnowszej serii Ryzen 9000, zbudowany na architekturze Zen 5. Dzięki zaawansowanej technologii produkcji, procesor oferuje imponującą wydajność zar&oacute;wno w grach, jak i w profesjonalnych aplikacjach. Nowa architektura zapewnia znaczący wzrost wydajności i efektywności energetycznej, co czyni ten procesor idealnym wyborem dla entuzjast&oacute;w komputer&oacute;w.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/d0/d006a3861ffa5b77d4467159d94c69aa.jpeg\" width=\"752\" height=\"423\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>&nbsp;</h3>\r\n<h3><strong>16 rdzeni i 32 wątki &ndash; moc dla najbardziej wymagających</strong></h3>\r\n<p>AMD Ryzen 9 9950X został wyposażony w 16 rdzeni i 32 wątki, co gwarantuje niezwykle szybkie przetwarzanie danych. Procesor ten osiąga bazowe taktowanie na poziomie 4,3 GHz, a w trybie Boost aż do 5,7 GHz, co zapewnia płynne działanie nawet najbardziej zaawansowanych aplikacji. To jednostka stworzona z myślą o profesjonalistach, kt&oacute;rzy potrzebują maksymalnej mocy obliczeniowej do pracy z grafiką, wideo czy programowaniem.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/13/13381f66733a8e858562eb6fe83ded07.jpeg\" width=\"763\" height=\"429\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>&nbsp;</h3>\r\n<h3><strong>Zwiększona pamięć podręczna i obsługa DDR5</strong></h3>\r\n<p>Procesor Ryzen 9 9950X dysponuje 64 MB pamięci podręcznej L3, co pozwala na szybsze przetwarzanie dużych ilości danych. Dodatkowo obsługa dwukanałowej pamięci DDR5-5600 gwarantuje, że Tw&oacute;j komputer będzie działał jeszcze szybciej, z wyższą przepustowością pamięci, co jest kluczowe dla wymagających użytkownik&oacute;w.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/69/69e2da5e2594d95620cb7cb561b7160a.jpeg\" width=\"743\" height=\"418\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>&nbsp;</h3>\r\n<h3><strong>Zintegrowany układ graficzny Radeon &ndash; gotowy do pracy</strong></h3>\r\n<p>Procesor wyposażony jest r&oacute;wnież w zintegrowany układ graficzny AMD Radeon, co pozwala na podstawowe przetwarzanie grafiki bez potrzeby stosowania dedykowanej karty graficznej. Jest to idealne rozwiązanie dla tych, kt&oacute;rzy potrzebują wydajnego procesora z gotowym do pracy układem graficznym.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/0d/0d5efce95bdb9837762ab1ce61165225.jpeg\" width=\"756\" height=\"425\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\" style=\"text-align: center;\">\r\n<h3>&nbsp;</h3>\r\n<h3><strong>Idealny wyb&oacute;r dla entuzjast&oacute;w technologii</strong></h3>\r\n<p>Jeśli szukasz procesora, kt&oacute;ry zapewni Ci najwyższą wydajność na rynku, AMD Ryzen 9 9950X jest wyborem, kt&oacute;ry spełni wszystkie Twoje oczekiwania. Niezależnie od tego, czy jesteś graczem, tw&oacute;rcą treści, czy inżynierem, ten procesor poradzi sobie z każdym wyzwaniem, jakie przed nim postawisz.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/da/daad4f1340f135ddd8af34a82daf5cc4.jpeg\" width=\"754\" height=\"424\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 2449.00, 17, '730143315272', 'https://allegro.stati.pl/AllegroIMG/PRODUCENCI/AMD/100-100001277WOF/AMD-Ryzen-9-9950X-mobile.jpg', '2025-06-25 18:14:50', '2025-07-03 16:08:33', b'1'),
(6, 6, 'Procesor AMD Ryzen 7 7700, 3.8 GHz, 32 MB, BOX', '<div class=\"panel-description\">\r\n<div class=\"row\">\r\n<div class=\"videoWrapper\" style=\"text-align: center;\"><strong>AMD Ryzen 7 7700 z wentylatorem Wraith Prism &ndash; procesor o wszechstronnym zastosowaniu</strong></div>\r\n<div class=\"desc-items1\" style=\"text-align: center;\">\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<p>Procesor AMD Ryzen 7 7700 to komponent, kt&oacute;ry dzięki swojej specyfikacji technicznej jest w stanie zagwarantować wszechstronność pod każdym względem. Sprawdzi się zar&oacute;wno do użytku domowego, profesjonalnego gamingu, jak i do pracy na zaawansowanych programach. Model ten oparty jest na nowatorskiej architekturze Zen 4 i ma naprawdę wiele do zaoferowania. Zobacz, na co możesz liczyć, decydując się na AMD 7 7700 z wentylatorem Wraith Prism.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3><strong>Wysoka wydajność dzięki 8 rdzeniom i 16 wątkom</strong></h3>\r\n<p>AMD Ryzen 7 7700 zdecydowanie prezentuje wysoki standard na rynku procesor&oacute;w. Optymalną wydajność dla najbardziej wymagających użytkownik&oacute;w gwarantuje 8 rdzeni i 16 wątk&oacute;w. Dzięki temu bazowa częstotliwość taktowania wynosi 3.8 GHz, a w trybie Boost procesor osiąga nawet 5.3 GHz. Odblokowany mnożnik umożliwia wykrzesać jak najwięcej z oferowanego komponentu!</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/a9/a9e2a4836d14e223bf56ad5c970d7f4b.jpeg\" width=\"765\" height=\"431\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3><strong>Mniejszy pob&oacute;r mocy procesora</strong></h3>\r\n<p>Opisywany procesor w por&oacute;wnaniu do modelu Ryzen 7 7700X r&oacute;żni się niższym wsp&oacute;łczynnikiem TDP. AMD Ryzen 7 7700 charakteryzuje się TDP na poziomie 65 W, podczas gdy w przypadku wariantu z X w nazwie wartość ta wynosiła 105 W. Dla użytkownika przekłada się to na wiele korzyści. Mianowicie nie będziesz musiał przejmować się większym poborem mocy, generowanym ciepłem i dużymi wymaganiami pod względem chłodzenia.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/35/356ceb807d2b6cf556f18cf9ea4c9e7e.jpeg\" width=\"784\" height=\"441\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3><strong>Zintegrowana karta graficzna AMD Radeon</strong></h3>\r\n<p>AMD Ryzen 7 7700 wyposażony jest w zintegrowaną kartę graficzną. Zastosowano podstawowy układ z dwiema jednostkami obliczeniowymi, dzięki kt&oacute;rym taktowanie grafiki wynosi maksymalnie 2200 MHz.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/89/890c1ccd45c28f0218eb2210aa0d92b2.jpeg\" width=\"775\" height=\"436\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3><strong>Pamięć podręczna dla jeszcze większej wydajności</strong></h3>\r\n<p>Pamięć podręczna w AMD Ryzen 7 7700 to kolejny mocny atut zapewniający wydajną i szybką pracę komputera. Pojemność pamięci cache L3 wynosi aż 32 MB. Do tego warto wspomnieć, że model ten oferuje po 1 MB pamięci podręcznej L2 na rdzeń, co daje łącznie 8 MB. Dzięki temu nie musisz przejmować się brakiem płynności podczas pracy na kilku programach jednocześnie.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/81/810368480a01ee4b28ad4394951e3ee1.jpeg\" width=\"762\" height=\"429\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3><strong>Chłodzenie Wraith Prism</strong></h3>\r\n<p>Procesor AMD Ryzen 7 7700 wyposażony jest w najwyższej jakości chłodzenie Wraith Prism. Zapewnia ono nie tylko efektywną pracę, aby nie dopuścić do przegrzewania się komponentu, ale oferuje też podświetlenie RGB. To idealne połączenie funkcjonalności z urozmaiceniem designu Twojego PC.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/38/38516aa45096c5838598130ad53f7d82.jpeg\" width=\"761\" height=\"428\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"specification-footer\" style=\"text-align: center;\">&nbsp;</div>', 1112.06, 10, '730143314497', 'https://cdn.x-kom.pl/i/setup/images/prod/big/product-new-big,,2023/1/pr_2023_1_10_13_37_28_110_00.jpg', '2025-06-26 12:53:47', '2025-07-02 13:50:59', b'1'),
(7, 7, 'Pamięć Corsair Vengeance RGB, DDR5, 32 GB, 6000MHz, CL30', '<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3 style=\"text-align: center;\">Poznaj najwyższą wydajność</h3>\r\n<p style=\"text-align: center;\">Przełam bariery swojego systemu dzięki innej niż dotychczasowe pamięci DDR5, kt&oacute;ra zapewnia większą częstotliwość, pojemność i&nbsp;wydajność. Korzystaj z najwyższej wydajności moduł&oacute;w RAM DDR5 zoptymalizowanych pod kątem płyt gł&oacute;wnych do procesor&oacute;w AMD i ozdabiających Tw&oacute;j najnowocześniejszy komputer dziesięciostrefowym podświetleniem.</p>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/0d/0d37e36089b265a8821831dc339c91a9.png\" width=\"366\" height=\"183\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>R&oacute;b wszystko, co chcesz, w dodatku szybciej</h3>\r\n<p>W epoce procesor&oacute;w wielordzeniowych bezprecedensowa szybkość pamięci DRAM DDR5 sprawia, że Tw&oacute;j najwyższej klasy procesor będzie szybciej otrzymywać dane. Tw&oacute;j komputer gamingowy wyjątkowo łatwo poradzi sobie z każdym wyzwaniem: podczas gry lub tworzenia treści, gdy otworzysz 100 kart przeglądarki lub gdy będziesz wykonywać wiele czynności naraz.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/4c/4cefcedca0017d475a4e5c8401a02a05.png\" width=\"744\" height=\"372\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Dynamiczne dziesięciostrefowe podświetlenie RGB</h3>\r\n<p>Ożyw wnętrze swojego komputera za pomocą dziesięciu indywidualnie adresowanych, niezwykle jasnych diod LED RGB na każdym module obudowanych w panoramicznym pasku. Wybieraj spośr&oacute;d kilkudziesięciu gotowych, zachwycających profili podświetlenia lub przygotuj własne, niemal nieograniczone efekty w iCUE.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/b5/b59c7a1d4f3dba340cdc6e60f335a8e1.png\" width=\"702\" height=\"351\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Wbudowana regulacja napięcia</h3>\r\n<p>Masz moc i władzę. Wbudowana regulacja napięcia w oprogramowaniu iCUE pozwala na łatwiejsze, bardziej precyzyjne i&nbsp;stabilne przetaktowywanie.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/6b/6b926fe1b087f2e2e304e7014c88d602.png\" width=\"760\" height=\"380\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Niestandardowe profile AMD&reg; EXPO</h3>\r\n<p>Koniec ze żmudną, ręczną regulacją ustawień wydajności za każdym razem, gdy zapisujesz własne profile AMD EXPO przez oprogramowanie iCUE. Z łatwością dostosowuj swoje profile ustawień w zależności od aplikacji lub zadania w celu uzyskania większej wydajności.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/d6/d69c53b5119318b9b3d35b4012079a6f.png\" width=\"722\" height=\"361\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Kontynuacja tradycji doskonałej wydajności</h3>\r\n<p><strong>Maksymalna przepustowość i kr&oacute;tki czas reakcji</strong><br>Optymalizacja pod kątem maksymalnej przepustowości i kr&oacute;tkiego czasu reakcji na najnowszych płytach gł&oacute;wnych zgodnych z technologiami DDR5 firmy Intel.</p>\r\n<p><strong>Ręcznie sortowane, dokładnie sprawdzane układy pamięci</strong><br>Zapewniają konsekwentnie wysoką wydajność dzięki opcjom błyskawicznej reakcji.</p>\r\n<p><strong>Radiator z litego aluminium</strong><br>Szybko odprowadza ciepło od pamięci, a wykwintny styl VENGEANCE w dw&oacute;ch odcieniach pasuje do wyglądu nowoczesnych zestaw&oacute;w komputerowych.</p>\r\n<p><strong>Niestandardowa, wysokowydajna płytka drukowana</strong><br>Gwarantuje jakość sygnału i&nbsp;stabilność niezbędne do przetaktowywania w&nbsp;wyjątkowo szerokim zakresie.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/29/29894142673f230cc31330ed76c5c6d3.png\" width=\"672\" height=\"336\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\" style=\"text-align: center;\">\r\n<h3>Ograniczona gwarancja wieczysta</h3>\r\n<p>Gwarancja wieloletniego działania i pełnego spokoju.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/9b/9b7c7839ec74dba3722c8adf2319e88a.png\" width=\"750\" height=\"375\" loading=\"lazy\"></div>\r\n</div>\r\n</div>', 565.66, 14, 'CMH32GX5M2B6000Z30K', 'https://images.morele.net/i1064/12763226_1_i1064.jpg', '2025-07-03 15:16:29', '2025-07-03 15:16:29', b'1'),
(8, 11, 'Płyta główna Gigabyte X870E AORUS ELITE WIFI7', '<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3 style=\"text-align: center;\">Zbuduj najbardziej zaawansowany komputer do gier i tworzenia treści</h3>\r\n<p style=\"text-align: center;\">Gdy tylko najszybsze rozwiązanie jest potrzebne, płyta gł&oacute;wna AMD z serii X800 spełnia oczekiwania. Dzięki wbudowanemu USB 4.0 wraz z solidnymi możliwościami podkręcania, szybszej obsłudze pamięci dwukanałowej DDR5, technologii AMD EXPO&trade; i obsłudze PCIe&reg; 5.0 zar&oacute;wno dla grafiki, jak i NVMe, możesz grać w najbardziej wymagające gry i realizować swoje największe projekty dzięki rewolucyjnej wydajności płyty gł&oacute;wnej AMD z serii X800 i procesor&oacute;w AMD Ryzen&trade; z serii 9000, 8000 i 7000.</p>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/cf/cf869442433bf563a69db7ab4322aff6.jpeg\" width=\"778\" height=\"438\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Wydajność procesora</h3>\r\n<p>Płyta gł&oacute;wna Gigabyte X870E AORUS ELITE WIFI7 jest wyposażona w gniazdo AMD Socket AM5, kt&oacute;re obsługuje procesory z serii AMD Ryzen&trade; 9000, 8000 i 7000. Dzięki zaawansowanej architekturze VRM z 16+2+2 fazami, zapewnia stabilne zasilanie nawet przy najwyższych obciążeniach. To idealne rozwiązanie dla entuzjast&oacute;w gier i profesjonalist&oacute;w, kt&oacute;rzy potrzebują maksymalnej wydajności.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/70/70edbefd628eeb0d13b0e2382c4fc3c4.jpeg\" width=\"738\" height=\"515\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Szybka pamięć</h3>\r\n<p>Płyta gł&oacute;wna obsługuje pamięć DDR5 z czterema gniazdami DIMM, co pozwala na instalację moduł&oacute;w pamięci o wysokiej przepustowości. Dzięki wsparciu dla technologii AMD EXPO&trade;, użytkownicy mogą łatwo optymalizować ustawienia pamięci, aby uzyskać jeszcze lepszą wydajność. To idealne rozwiązanie dla tych, kt&oacute;rzy potrzebują szybkiego dostępu do danych i płynnej pracy systemu.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/1e/1e238e209f63766d12443068f001a891.jpeg\" width=\"747\" height=\"420\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Ultra-szybkie przechowywanie</h3>\r\n<p>Gigabyte X870E AORUS ELITE WIFI7 oferuje cztery gniazda M.2, w tym trzy z obsługą PCIe 5.0 x4. Dzięki temu użytkownicy mogą korzystać z najnowszych dysk&oacute;w SSD NVMe, kt&oacute;re zapewniają niesamowicie szybki transfer danych. To idealne rozwiązanie dla tych, kt&oacute;rzy potrzebują dużej ilości miejsca na dane i szybkiego dostępu do nich.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/6d/6de6992cccb7bd322815ac8e90aff311.png\" width=\"739\" height=\"472\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Zaawansowane chłodzenie</h3>\r\n<p>Płyta gł&oacute;wna jest wyposażona w zaawansowany system chłodzenia VRM Thermal Armor oraz M.2 Thermal Guard L. Te technologie zapewniają efektywne odprowadzanie ciepła, co pozwala na utrzymanie stabilnej pracy systemu nawet przy dużym obciążeniu. To idealne rozwiązanie dla tych, kt&oacute;rzy chcą uniknąć przegrzewania się komponent&oacute;w i zapewnić długą żywotność swojego sprzętu.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/9c/9c5455395cc7831c47c3c24bd804dfd2.jpeg\" width=\"696\" height=\"486\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Szybka sieć</h3>\r\n<p>Gigabyte X870E AORUS ELITE WIFI7 oferuje szybkie połączenia sieciowe dzięki wbudowanej karcie sieciowej 2.5GbE LAN oraz Wi-Fi 7 z kierunkową anteną o wysokim zysku. Dzięki temu użytkownicy mogą cieszyć się stabilnym i szybkim połączeniem internetowym, co jest kluczowe dla graczy online i profesjonalist&oacute;w pracujących z dużymi plikami.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/c0/c02e5a4611990ee8c3e5e5cef0376953.jpeg\" width=\"794\" height=\"292\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Szeroki wyb&oacute;r złącz</h3>\r\n<p>Płyta gł&oacute;wna oferuje szeroką gamę port&oacute;w, w tym dwa porty USB4 Type-C z obsługą DP-Alt oraz HDMI. Dzięki temu użytkownicy mogą podłączyć wiele urządzeń peryferyjnych i cieszyć się wysoką jakością obrazu i dźwięku. To idealne rozwiązanie dla tych, kt&oacute;rzy potrzebują wszechstronnej i elastycznej płyty gł&oacute;wnej do r&oacute;żnych zastosowań.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/7d/7d3df5772a00c5bf1b9e0dabb60534a0.png\" width=\"703\" height=\"551\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>Najwyższej jakości dźwięk</h3>\r\n<p>Zanurz się w otaczającym dźwięku przestrzennym i ciesz się odtwarzaniem dźwięku DSD dzięki kodekowi Realtek ALC1220. Kondensatory WIMA i Premium Grade Audio gwarantują r&oacute;wnomierne dostarczanie mocy, odtwarzając dźwięk o jakości profesjonalnego studia.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/3c/3cb68872871afed2322a2af775edf8e5.png\" width=\"683\" height=\"333\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\" style=\"text-align: center;\">\r\n<h3>GIGABYTE Control Center</h3>\r\n<p>Uwolnij swoją wyobraźnię, korzystając z wszechstronnych opcji oświetlenia GCC dla swojej płyty gł&oacute;wnej. Dostosuj swoją konfigurację za pomocą przyciągających wzrok wyświetlaczy, kt&oacute;re odzwierciedlają Twoją wyjątkową osobowość i preferencje. Programowalne złącza LED RGB umożliwiają precyzyjną kontrolę nad poszczeg&oacute;lnymi diodami LED (dla urządzeń ARGB GEN2), płynnie zarządzanymi przez GCC.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/0b/0b47f66db1a16c93d883fcf30bc5c75d.jpeg\" width=\"707\" height=\"246\" loading=\"lazy\"></div>\r\n</div>\r\n</div>', 1250.00, 4, '4719331864613', 'https://images.morele.net/i1064/14136030_0_i1064.jpg', '2025-07-03 15:28:43', '2025-07-03 15:28:43', b'1'),
(9, 12, 'Chłodzenie wodne MSI MAG CoreLiquid A15 360', '<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3 style=\"text-align: center;\">MSI MAG CoreLiquid A15 360</h3>\r\n<p style=\"text-align: center;\">Produkty z serii MAG firmy MSI to sprzęt, kt&oacute;ry uosabia stabilność i trwałość. Został on skonstruowany w taki spos&oacute;b, aby wytrzymać nawet najbardziej intensywne, gamingowe rozgrywki. Cała linia urządzeń z tej serii charakteryzuje się solidną konstrukcją i doskonałym systemem rozpraszaniem ciepła, co gwarantuje stabilność pracy dla wszystkich krytycznych, gamingowych komponent&oacute;w.</p>\r\n<p style=\"text-align: center;\">Systemy chłodzenia wodą z serii MAG CORELIQUID A15 cechują się odważnym, zainspirowanym militarną stylistyką, designem oraz charakteryzują się ostrymi, pewnie prowadzonymi liniami, kt&oacute;re emanują siłą i precyzją. Wyrafinowane, lakierowane wykończenia w połączeniu z akcentami ze szczotkowanego aluminium nadają systemowi chłodzenia wodą wyjątkowego, luksusowego wyglądu. Podświetlenie ARGB GEN2 podkreśla to uderzające połączenie materiał&oacute;w, uwypuklając przyciągające wzrok detale, kt&oacute;re sprawią, że Tw&oacute;j komputer będzie się naprawdę wyr&oacute;żniać.</p>\r\n</div>\r\n<div class=\"row\" style=\"text-align: center;\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/1d/1d6a74ebd440e0981de23a6ac4831ec2.png\" width=\"705\" height=\"430\" loading=\"lazy\"></div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\" style=\"text-align: center;\">\r\n<h3>Przyjazne dla składaczy</h3>\r\n<p>Zainstalowany fabrycznie i łatwy w użyciu uniwersalny uchwyt montażowy, UNI Bracket, przystosowany jest zar&oacute;wno do gniazd procesor&oacute;w Intel, jak i AMD. Dzięki temu można znacznie skr&oacute;cić czas montażu systemu chłodzenia wodą i poprawić jakość samodzielnie złożonego, gamingowego komputera.&nbsp;</p>\r\n<p>Wcześniej, systemy chłodzenia wodą z serii 360 wymagały odpowiedniego ułożenia co najmniej sześciu kabli. Teraz nie tylko wentylatory są fabrycznie zainstalowane, ale także skr&oacute;cono czas potrzebny na uporządkowanie kabli, ograniczają tę czynność do zaledwie jednego przewodu. Ułatwia to montaż, zmniejsza problemy związane z instalacją systemu i zwiększa przyjemność samodzielnego składania komputera.</p>\r\n<p>Złącze JAF_1 firmy MSI wszystkim entuzjastom samodzielnie składającym swoje komputery udostępnia znacznie więcej możliwości. Dedykowane gniazdo JAF_1 pozwala bowiem na instalację połączonych łańcuchowo wentylator&oacute;w lub nowej generacji system&oacute;w chłodzenia cieczą firmy MSI za pomocą pojedynczego przewodu. Dodatkowo, złącze to można przekształcić w dodatkowe gniazdo ARGB i FAN za pomocą kabla EZ Conn-Cable, usprawniając tym samym cały proces budowy komputera.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/4b/4b9219223fc1670991fcbc348ca1cf2f.png\" width=\"544\" height=\"280\" loading=\"lazy\"></div>\r\n</div>\r\n</div>', 390.04, 25, '4711377257312', 'https://images.morele.net/i1064/15059623_0_i1064.jpg', '2025-07-03 15:34:36', '2025-07-03 18:33:33', b'1');
INSERT INTO `produkty` (`Id`, `KategoriaId`, `Nazwa`, `Opis`, `Cena`, `IloscNaStanie`, `SKU`, `UrlZdjecia`, `DataUtworzenia`, `DataModyfikacji`, `CzyAktywny`) VALUES
(10, 3, 'Karta graficzna Gigabyte GeForce RTX 5060 Windforce OC 8GB GDDR7 DLSS4', '<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<p style=\"text-align: center;\">Karta graficzna, kt&oacute;ra zmienia reguły gry</p>\r\n<p style=\"text-align: center;\">Układy NVIDIA&reg; GeForce RTX&trade; 5060, oparte na architekturze NVIDIA Blackwell, oferują przełomowe możliwości AI w najnowszych grach i aplikacjach. Zwiększ wydajność z NVIDIA DLSS 4, ciesz się realistyczną grafiką dzięki ray tracingowi i przesuwaj granice kreatywności z pomocą NVIDIA Studio.</p>\r\n<p style=\"text-align: center;\">Poznaj kompaktową kartę graficzną Gigabyte GeForce RTX 5060 Windforce OC. Zmieść w jego wnętrzu prawdziwego potwora wydajności, kt&oacute;ry nie będzie miał przy tym kolosalnych rozmiar&oacute;w. Zyskaj przewagę, jaką daje Ci technika i ciesz się realizmem gier wideo, szybkością pracy oraz tworzenia kreatywnego, dzięki potędze NVIDIA Blackwell, architektury, kt&oacute;ra wyprzedza sw&oacute;j czas. Uzyskaj dostęp do pełnego pakietu technik NVIDII, ze sztandarowymi w postaci DLSS 4 i ray tracingu. Każda z nich oferuje najwyższy poziom zaawansowania, dostępny jedynie dla układ&oacute;w RTX 50.</p>\r\n</div>\r\n<p class=\"row\" style=\"text-align: center;\">&nbsp;</p>\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/5d/5d1f6b8153b36aa7dae32e376f6def54.png\" width=\"699\" height=\"427\" loading=\"lazy\"></div>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p class=\"row\" style=\"text-align: center;\">&nbsp;</p>\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<h3>System chłodzenia WindForce</h3>\r\n<p>System chłodzenia WINDFORCE zapewnia wyjątkową wydajność termiczną dzięki połączeniu najnowocześniejszych technologii. Obejmuje on żel termoprzewodzący klasy serwerowej, innowacyjne wentylatory Hawk z naprzemiennym obrotem, kompozytowe miedziane rurki cieplne, dużą komorę parową, aktywne wentylatory 3D oraz chłodzenie ekranowe.</p>\r\n<p>Wentylator Hawk wyr&oacute;żnia się unikalnym designem łopatek inspirowanym aerodynamiką skrzydeł orła. Ten projekt redukuje op&oacute;r powietrza i poziom hałasu, zwiększając ciśnienie powietrza nawet o 53,6% i objętość powietrza o 12,5%, bez uszczerbku dla akustyki. Zmniejsza turbulencje między sąsiednimi wentylatorami i zwiększa ciśnienie przepływu powietrza. Aktywny wentylator 3D zapewnia p&oacute;łpasywne chłodzenie, a wentylatory pozostają wyłączone, gdy GPU pracuje przy niskim obciążeniu lub w mało wymagających grach. Nanolubrikant grafenowy może wydłużyć żywotność wentylator&oacute;w z łożyskami ślizgowymi nawet 2,1 razy, zbliżając ją do żywotności łożysk kulkowych, przy jednoczesnym zachowaniu cichszej pracy.</p>\r\n<p>W celu poprawy jakości i niezawodności produktu wprowadziliśmy żel termoprzewodzący klasy serwerowej do chłodzenia krytycznych komponent&oacute;w, takich jak VRAM i MOSFET-y. Ten wysoce elastyczny, niepłynny żel zapewnia optymalny kontakt z nier&oacute;wnymi powierzchniami i skutecznie opiera się odkształceniom podczas transportu lub długotrwałego użytkowania, w przeciwieństwie do tradycyjnych podkładek termicznych.</p>\r\n<p>Duża komora parowa ma bezpośredni kontakt z GPU, a w połączeniu z kompozytowymi miedzianymi rurkami cieplnymi szybko odprowadza ciepło z GPU i VRAM do radiatora.</p>\r\n<p>Rozszerzony radiator umożliwia przepływ powietrza, zapewniając lepsze odprowadzanie ciepła.</p>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/6a/6adf116d21ca300989139c15ff61fb35.png\" width=\"623\" height=\"283\" loading=\"lazy\"></div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div class=\"row\">\r\n<p class=\"text1 col-sm-12 text-justify\" style=\"text-align: center;\">&nbsp;</p>\r\n<h3>GIGABYTE Control Center</h3>\r\n<p>GIGABYTE Control Center (GCC) to zintegrowane oprogramowanie do zarządzania i optymalizacji system&oacute;w komputerowych, kt&oacute;re łączy w sobie funkcje takie jak kontrola oświetlenia RGB, regulacja prędkości wentylator&oacute;w, aktualizacja sterownik&oacute;w oraz monitorowanie wydajności. Oferuje intuicyjny interfejs, kt&oacute;ry umożliwia łatwe dostosowanie ustawień sprzętowych, takich jak krzywe wentylator&oacute;w, efekty świetlne czy parametry overclockingu, co jest szczeg&oacute;lnie przydatne dla użytkownik&oacute;w płyt gł&oacute;wnych i kart graficznych Gigabyte. GCC wyr&oacute;żnia się funkcją aktualizacji online, kt&oacute;ra regularnie sprawdza dostępność nowych wersji sterownik&oacute;w, BIOS-u i oprogramowania, zapewniając stabilność i optymalną wydajność systemu.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"row\">\r\n<p class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/3b/3b5f92f9f4f21f54947d6eb27b98f092.png\" width=\"736\" height=\"318\" loading=\"lazy\"></p>\r\n</div>\r\n</div>', 1399.00, 2, 'GV-N5060WF2OC-8GD', 'https://images.morele.net/i1064/15234816_0_i1064.jpg', '2025-07-03 15:45:11', '2025-07-03 15:45:11', b'1'),
(11, 3, 'Karta graficzna Power Color Radeon RX 6600 Fighter 8GB GDDR6', '<div class=\"row\">\r\n<div class=\"text1 col-sm-12 text-justify\">\r\n<p style=\"text-align: center;\">AMD Radeon RX 6600</p>\r\n<p style=\"text-align: center;\">Oparta na architekturze AMD RDNA&trade; 2 karta graficzna PowerColor Fighter Radeon&trade; RX 6600 zawiera 28 jednostek obliczeniowych, 32 MB całkowicie nowej pamięci podręcznej AMD Infinity Cache i 8 GB dedykowanej pamięci GDDR6. wrażenia z gry.</p>\r\n</div>\r\n<p class=\"row\" style=\"text-align: center;\">&nbsp;</p>\r\n<div class=\"image col-sm-12 text-center\"><img src=\"https://images.morele.net/description/c5/c5b1cf50492292486c7c9df27751bef2.jpeg\" width=\"719\" height=\"423\" loading=\"lazy\"></div>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"row\">\r\n<p class=\"text1 col-sm-12 text-justify\" style=\"text-align: center;\">&nbsp;</p>\r\n<h3>Zacznij cieszyć się życiem w grach</h3>\r\n<p>Jako bilet wstępu do gry, karta graficzna PowerColor Fighter Radeon&trade; RX 6600 jest uzbrojona w podw&oacute;jny wentylator chłodzący o średnicy 90 mm, chłodnicę z powiększoną powierzchnią radiatora oraz zestaw rurek cieplnych bezpośrednio dotykających GPU w celu lepszego rozpraszania ciepła. Zacznij cieszyć się życiem w grach dzięki PowerColor Fighter Radeon&trade; RX 6600!</p>\r\n<p>&nbsp;</p>\r\n<div class=\"row\">\r\n<p class=\"image col-sm-12 text-center\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.morele.net/description/ea/ea09821c7f398b20e32c58be2e9ccd14.jpeg\" width=\"749\" height=\"441\" loading=\"lazy\"></p>\r\n</div>\r\n</div>', 970.99, 10, 'AXRX 6600 8GBD6-3DH', 'https://images.morele.net/i1064/5949666_0_i1064.jpg', '2025-07-03 15:47:36', '2025-07-03 16:08:33', b'1'),
(12, 4, 'Zasilacz be quiet! Pure Power 12 M 850W 80 Plus Gold ATX 3.0', '<h3>Niezwykła cisza, wyjątkowa wydajność</h3>\r\n<p>Pure Power 12 M 850W jest zgodny ze standardem ATX 3.0 i PCIe 5.0. Oferuje niezr&oacute;wnaną niezawodność i najlepsze w swojej klasie funkcje. To najlepsze połączenie wydajności z wyjątkową kompatybilnością.</p>\r\n<ul>\r\n<li>Sprawność 80 PLUS&reg; Gold (do 93.2%)</li>\r\n<li>Zasilacz ATX 3.0 z pełnym wsparciem dla kart graficznych PCIe 5.0 oraz ze złączami 6+2 pin</li>\r\n<li>Wyjątkowo cichy wentylator be quiet! 120mm</li>\r\n<li>Stabilność dzięki technologii LLC</li>\r\n<li>Dwie mocne linie 12V</li>\r\n<li>Modularne przewody dla maksymalnej wygody</li>\r\n<li>Jeden kabel PCIe 5.0 12VHPWR 600W i cztery złącza PCIe 6+2 dla podkręconych kart graficznych z wyższej p&oacute;łki</li>\r\n</ul>', 629.00, 44, 'BN335', 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQNp4nYnQXUXkqcqU1tLesJ_i_qGEe4IUmm69RRsuj8qTaRclkcYwuvnK7eUaKKz5jdH4o9GUQVzvDG_Lu1961u3FPfOmWrs_q5HSOjhgFonePmzOYhzfoQqT9yR0Hiyw&usqp=CAc', '2025-07-03 15:51:11', '2025-07-03 16:08:33', b'1'),
(13, 5, 'Obudowa Endorfy Arx 700 Air', '<h3>Legendarna przewiewność</h3>\r\n<p>ENDORFY Arx 700 Air to jedna z największych obud&oacute;w, jakie mieliśmy okazję stworzyć (486&times;228&times;472 mm). Zmieścisz w niej wszystko, czego potrzebujesz do wygrywania &ndash; na przykład wysoką wieżę systemu chłodzenia (do 179 mm), 8 wentylator&oacute;w (w tym 5 fabrycznie zainstalowanych Stratus 140 PWM) i praktycznie każdą dostępną na rynku kartę graficzną (do 410 mm).</p>\r\n<ul>\r\n<li>Pięć wentylator&oacute;w w zestawie</li>\r\n<li>Przestronne wnętrze</li>\r\n<li>Pomieści chłodnicę 420 mm</li>\r\n<li>Panel boczny z hartowanego szkła</li>\r\n<li>System aranżacji okablowania</li>\r\n</ul>', 499.00, 28, 'EY2A012', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcQ8bWR4vzBwigxJv3ELpeIpfjMokky78T1RmN2UtQE06hIq9ZdLNOL-kxUK1r0J2Ku1wV40q1qiQRnBTHi0LbHOruGx7FEhxR5IeKTMISQjKTYamzvrOVqe', '2025-07-03 15:51:11', '2025-07-03 18:33:33', b'1'),
(14, 14, 'Dysk SSD Lexar NM790 2TB M.2 PCIe Gen4 NVMe', '<h3>Niesamowita prędkość, kt&oacute;ra napędza Twoją kreatywność</h3>\r\n<p>Dysk Lexar NM790 M.2 2280 PCIe Gen 4x4 NVMe to doskonały wyb&oacute;r dla graczy i tw&oacute;rc&oacute;w treści, kt&oacute;rzy oczekują najwyższej wydajności. Zapewnia prędkości odczytu do 7400 MB/s i zapisu do 6500 MB/s. Dysk jest kompatybilny z laptopami, komputerami stacjonarnymi oraz konsolą PlayStation 5.</p>\r\n<ul>\r\n<li>Pojemność: 2000 GB</li>\r\n<li>Format: M.2</li>\r\n<li>Interfejs: PCI-E 4.0 x4 NVMe</li>\r\n<li>Prędkość odczytu: 7400 MB/s</li>\r\n<li>Prędkość zapisu: 6500 MB/s</li>\r\n</ul>', 589.00, 150, 'LNM790X002T-RNNG', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSCiPsc80hiP2Bu8k9v4Q7FdV_cmEx9f5GpOk18LDdsI_5IQ7vWXodoaoBRm_-r_j02zvbcAqJIBFHXCBsrM2V6lTXrZshYfQBsUqKV_sPqlwdR_8eTkK8s', '2025-07-03 15:51:11', '2025-07-03 15:58:34', b'1'),
(15, 13, 'Dysk HDD Seagate BarraCuda 4TB 3.5\" SATA III', '<h3>Niezawodność i pojemność</h3>\r\n<p>Dyski twarde BarraCuda od firmy Seagate to synonim niezawodności i wydajności. Model o pojemności 4TB zapewnia ogromną przestrzeń na Twoje gry, filmy i inne pliki. Prędkość obrotowa 5400 obr./min oraz 256MB pamięci podręcznej gwarantują szybki dostęp do danych.</p>\r\n<ul>\r\n<li>Pojemność: 4000 GB</li>\r\n<li>Format: 3.5\"</li>\r\n<li>Interfejs: SATA III (6.0 Gb/s)</li>\r\n<li>Pamięć podręczna: 256 MB</li>\r\n<li>Prędkość obrotowa: 5400 obr./min</li>\r\n</ul>', 479.00, 80, 'ST4000DM004', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR7CI5mAtjkGjNqxYBlS6fL4klHZm5rsrX9pRuYTpt5LjtVv55vV9Z5dr2CXtClEW6aP9DB961iyWwzC21be7xi9WdgZgoXvQTurBXInPhU3reouaYoRuuGEA', '2025-07-03 15:51:11', '2025-07-03 15:59:16', b'1'),
(16, 15, 'Klawiatura Razer BlackWidow V4 Pro', '<h3>Pełna immersja w grach</h3>\r\n<p>Razer BlackWidow V4 Pro to klawiatura, kt&oacute;ra oferuje pełną kontrolę i zaawansowane funkcje dla graczy. Wyposażona w przełączniki mechaniczne Razer Green, programowalne pokrętło Command Dial i 8 dedykowanych klawiszy makr, pozwala na dostosowanie do własnych potrzeb. Podświetlenie Razer Chroma RGB dodaje niesamowitego stylu.</p>\r\n<ul>\r\n<li>Typ przełącznik&oacute;w: Mechaniczne - Razer Green</li>\r\n<li>Łączność: Przewodowa</li>\r\n<li>Podświetlenie: RGB</li>\r\n<li>Dodatkowe funkcje: 8 klawiszy makr, pokrętło Command Dial, podkładka pod nadgarstki</li>\r\n</ul>', 1199.00, 25, 'RZ03-04680100-R3M1', 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcThArHJV7TBJy7KHVlH1lTl0vxLJlGEZVIXkqbkLX4J1BxUfzvwPjU7Qkl6oX_IvTu1IAXkyPzwZLWHu7ObnlX4tIqt6E-tKbnRb1i1g_L3pljUt3vG1inT', '2025-07-03 15:51:11', '2025-07-03 15:59:30', b'1'),
(17, 16, 'Mysz Logitech G502 X PLUS', '<h3>Ikona gamingu w nowej odsłonie</h3>\r\n<p>Logitech G502 X PLUS to najnowsza wersja legendarnej myszy dla graczy. Wyposażona w hybrydowe przełączniki optyczno-mechaniczne LIGHTFORCE, bezprzewodową technologię LIGHTSPEED i podświetlenie LIGHTSYNC RGB. Oferuje niezr&oacute;wnaną precyzję i szybkość reakcji.</p>\r\n<ul>\r\n<li>Sensor: Optyczny - HERO 25K</li>\r\n<li>Liczba przycisk&oacute;w: 13</li>\r\n<li>Rozdzielczość: 25600 DPI</li>\r\n<li>Łączność: Bezprzewodowa - LIGHTSPEED</li>\r\n<li>Podświetlenie: RGB</li>\r\n</ul>', 549.00, 60, '910-006161', 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSXYmRkhS1C1RT7Sv2uWhlqsvyE6aeq-EsiUlJHqGgAFYeX2H60BKiBzDNcPhgYTJxrAeW6b_5YTQPRPyfYN_sVng30v3GBhw0e2vvedZqlzh6BqaLX9fal', '2025-07-03 15:51:11', '2025-07-03 15:59:42', b'1'),
(18, 12, 'Chłodzenie wodne Arctic Liquid Freezer III 360 A-RGB Black', '<h3>Zoptymalizowane dla procesor&oacute;w Intel i AMD</h3>\r\n<p>Arctic Liquid Freezer III 360 to gotowy do natychmiastowego użycia, wysokowydajny system chłodzenia wodnego typu all-in-one z wentylatorami A-RGB. Został opracowany specjalnie z myślą o gniazdach Intel LGA1700 i LGA1851 i zapewnia doskonałe chłodzenie nawet najmocniejszych procesor&oacute;w.</p>\r\n<ul>\r\n<li>Rozmiar chłodnicy: 398 x 120 x 38 mm</li>\r\n<li>Liczba wentylator&oacute;w: 3x 120 mm A-RGB</li>\r\n<li>Kompatybilność: Intel LGA1700/1851, AMD AM4/AM5</li>\r\n<li>Dodatkowy wentylator VRM</li>\r\n</ul>', 529.00, 40, 'ACFRE00143A', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSGhg7ECHCGlI9iBfY0aPsKxXSBTiG5gfipOz4tmQW7tGdrRpIFNxKpM439XH_pGCg5qptRQny4Y640t--PQB6c69CAWQar_UBzQFz9jFGtzG_9eDyowLmMrRvU6b84AYKAvCMawvWyBg&usqp=CAc', '2025-07-03 15:51:11', '2025-07-03 16:00:13', b'1'),
(19, 6, 'Procesor Intel Core i7-14700K, 3.4 GHz, 33 MB, BOX', '<h3>Potęga dla graczy i tw&oacute;rc&oacute;w</h3>\r\n<p>Procesor Intel Core i7-14700K z rodziny Raptor Lake Refresh to potężna jednostka oferująca 20 rdzeni (8 P-core, 12 E-core) i 28 wątk&oacute;w. Taktowanie sięgające 5.6 GHz w trybie Turbo oraz odblokowany mnożnik sprawiają, że jest to idealny wyb&oacute;r dla najbardziej wymagających użytkownik&oacute;w.</p>\r\n<ul>\r\n<li>Gniazdo procesora: Socket 1700</li>\r\n<li>Liczba rdzeni: 20 (8 P-core + 12 E-core)</li>\r\n<li>Liczba wątk&oacute;w: 28</li>\r\n<li>Częstotliwość taktowania: 3.4 GHz (5.6 GHz w trybie Turbo)</li>\r\n<li>Zintegrowany układ graficzny: Intel UHD Graphics 770</li>\r\n</ul>', 1899.00, 55, 'BX8071514700K', 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQFWw9ZqULcSdYHeTFzwf366UkYSSiW11X3gXEh1IF5U2pCymMpQC9585qunywcT3HUMFNHE5PBaH-r7GE_2TaYFqkAOq8ITyfzCePPlkKJG4luxSfvYma4&usqp=CAc', '2025-07-03 15:51:11', '2025-07-03 16:00:24', b'1'),
(20, 7, 'Pamięć Kingston FURY Renegade, DDR5, 32 GB, 6400MHz, CL32', '<h3>Ekstremalna wydajność DDR5</h3>\r\n<p>Pamięć Kingston FURY Renegade DDR5 została zaprojektowana z myślą o ekstremalnej wydajności na platformach nowej generacji. Zapewnia szybkość do 6400 MT/s i niskie op&oacute;źnienia CL32. Aluminiowy radiator w czarnym kolorze dba o skuteczne odprowadzanie ciepła.</p>\r\n<ul>\r\n<li>Seria: FURY Renegade</li>\r\n<li>Typ pamięci: DDR5</li>\r\n<li>Pojemność łączna: 32 GB (2x16 GB)</li>\r\n<li>Taktowanie: 6400 MHz</li>\r\n<li>Op&oacute;źnienie: CL32</li>\r\n<li>Obsługa Intel XMP 3.0</li>\r\n</ul>', 599.00, 70, 'KF564C32RSK2-32', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcR0CO1D1JW0oniXlihKtp7WTnJ94FdmVQA3oZ4DyPwni94AiWKTXv6nWkDk7YFzi7v12KOIRHaLBbVVEwfcUTwePZ1boTCwEAj3EOgVFbIGY13ekF715sye', '2025-07-03 15:51:11', '2025-07-03 16:00:58', b'1'),
(21, 11, 'Płyta główna ASUS ROG STRIX Z790-E GAMING WIFI II', '<h3>Dominacja w grach</h3>\r\n<p>ASUS ROG STRIX Z790-E GAMING WIFI II to płyta gł&oacute;wna stworzona dla entuzjast&oacute;w, kt&oacute;rzy nie uznają kompromis&oacute;w. Obsługuje procesory Intel Core 14., 13. i 12. generacji, pamięci DDR5 do 8000+ MHz (OC) oraz oferuje gniazdo PCIe 5.0 x16. Posiada r&oacute;wnież 5 gniazd M.2, złącze USB 20 Gb/s oraz łączność Wi-Fi 7.</p>\r\n<ul>\r\n<li>Gniazdo procesora: Socket 1700</li>\r\n<li>Chipset: Intel Z790</li>\r\n<li>Obsługa pamięci: DDR5 do 8000+ (OC)</li>\r\n<li>Łączność: Wi-Fi 7, LAN 2.5Gbps</li>\r\n<li>Format: ATX</li>\r\n</ul>', 2899.00, 15, '90MB1G70-M0EAY0', 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcQAE_P5XvazIXY3mmwIW7gmUVgPvi5az61RgwUPuy6KxHODXQY2zrHzXwJezS7qY__UfMWHb6gaYG9kyEkxB7CDjKjuGOhma3-DRjr1VEms', '2025-07-03 15:51:11', '2025-07-03 16:01:10', b'1'),
(22, 3, '1', '<p>3455</p>', 34.00, 23, '232323', 'https://techlord.pl/images/produkty/MSONE/3267588/2.jpg', '2025-07-03 18:37:03', '2025-07-03 19:03:40', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9L0wEegslEB6tswfx8N5OqP48vtEJSJ3eHw9KIp9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjR1VEJxck9ySjVKTkluT0JmWUtQSGdUa1haNG9KaEdvMmxqOFY4VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751566862);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubioneprodukty`
--

CREATE TABLE `ulubioneprodukty` (
  `Id` int(11) NOT NULL,
  `UzytkownikId` int(11) NOT NULL,
  `ProduktId` int(11) NOT NULL,
  `DataUtworzenia` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `ulubioneprodukty`
--

INSERT INTO `ulubioneprodukty` (`Id`, `UzytkownikId`, `ProduktId`, `DataUtworzenia`) VALUES
(8, 1, 5, '2025-06-25 18:22:47'),
(9, 1, 6, '2025-06-26 15:05:28'),
(19, 2, 5, '2025-06-27 20:02:22'),
(23, 2, 4, '2025-06-27 21:46:08'),
(25, 1, 13, '2025-07-03 16:01:26'),
(26, 1, 18, '2025-07-03 16:01:26'),
(27, 1, 19, '2025-07-03 16:01:27'),
(28, 1, 15, '2025-07-03 16:01:28'),
(29, 1, 21, '2025-07-03 16:10:15'),
(30, 2, 8, '2025-07-03 18:32:53'),
(31, 1, 14, '2025-07-03 19:02:44');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Haslo` varchar(255) NOT NULL,
  `CzyAdmin` bit(1) NOT NULL DEFAULT b'0',
  `DataUtworzenia` datetime NOT NULL,
  `DataModyfikacji` datetime NOT NULL,
  `CzyAktywny` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id`, `Nazwa`, `Email`, `Haslo`, `CzyAdmin`, `DataUtworzenia`, `DataModyfikacji`, `CzyAktywny`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$oxqlbM.BDfoqwkiE3vUT.un9NISqUXWK6mrhCBfPhJXJ2oRhb2Liy', b'1', '2025-06-17 13:56:27', '2025-06-17 13:56:27', b'1'),
(2, 'Uzytkownik', 'uzytkownik@gmail.com', '$2y$12$jHbrYGjxM5Vkup2Z4VFcPOCkpAEp24q.dFlT64o0TMtBHP1wvFpPq', b'0', '2025-06-25 11:44:22', '2025-06-25 11:44:22', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `Id` int(11) NOT NULL,
  `UzytkownikId` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Oczekujące',
  `CalkowitaKwota` decimal(10,2) NOT NULL,
  `DataUtworzenia` datetime NOT NULL,
  `DataModyfikacji` datetime NOT NULL,
  `CzyAktywny` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`Id`, `UzytkownikId`, `Status`, `CalkowitaKwota`, `DataUtworzenia`, `DataModyfikacji`, `CzyAktywny`) VALUES
(9, 1, 'Zakończone', 8509.06, '2025-07-01 18:03:42', '2025-07-01 20:09:20', b'1'),
(10, 2, 'Zakończone', 6110.06, '2025-06-30 20:08:45', '2025-07-02 14:16:26', b'1'),
(11, 2, 'Zakończone', 4898.00, '2025-06-26 20:09:01', '2025-07-02 14:16:40', b'1'),
(12, 2, 'Nowe', 7447.00, '2025-06-30 18:27:26', '2025-06-30 18:27:26', b'1'),
(13, 2, 'W trakcie realizacji', 4898.00, '2025-06-27 21:14:37', '2025-06-27 21:28:12', b'1'),
(14, 2, 'Nowe', 3561.06, '2025-06-27 21:35:13', '2025-06-27 21:35:13', b'1'),
(15, 2, 'Nowe', 2499.00, '2025-06-27 21:35:29', '2025-06-27 21:35:29', b'1'),
(16, 2, 'Anulowane', 0.00, '2025-06-27 21:35:36', '2025-07-02 13:30:47', b'1'),
(17, 2, 'Zakończone', 4998.00, '2025-06-27 21:35:49', '2025-07-02 13:30:56', b'1'),
(18, 2, 'Wysłane', 2502.00, '2025-06-27 21:37:00', '2025-07-02 13:30:52', b'1'),
(19, 2, 'W trakcie realizacji', 5001.00, '2025-06-27 21:47:41', '2025-07-03 16:40:10', b'1'),
(20, 2, 'Zakończone', 3.00, '2025-07-02 13:28:17', '2025-07-03 16:40:17', b'1'),
(21, 1, 'Zakończone', 4547.99, '2025-07-03 16:08:33', '2025-07-03 16:09:12', b'1'),
(22, 2, 'Nowe', 889.04, '2025-07-03 18:33:33', '2025-07-03 18:33:33', b'1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `atrybutkategoria`
--
ALTER TABLE `atrybutkategoria`
  ADD PRIMARY KEY (`AtrybutId`,`KategoriaId`),
  ADD KEY `KategoriaId` (`KategoriaId`);

--
-- Indeksy dla tabeli `atrybuty`
--
ALTER TABLE `atrybuty`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nazwa` (`Nazwa`);

--
-- Indeksy dla tabeli `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `elementyzamowienia`
--
ALTER TABLE `elementyzamowienia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ZamowienieId` (`ZamowienieId`),
  ADD KEY `ProduktId` (`ProduktId`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeksy dla tabeli `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nazwa` (`Nazwa`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `opinieproduktow`
--
ALTER TABLE `opinieproduktow`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProduktId` (`ProduktId`),
  ADD KEY `UzytkownikId` (`UzytkownikId`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `produktatrybut`
--
ALTER TABLE `produktatrybut`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProduktId` (`ProduktId`),
  ADD KEY `AtrybutId` (`AtrybutId`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `KategoriaId` (`KategoriaId`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeksy dla tabeli `ulubioneprodukty`
--
ALTER TABLE `ulubioneprodukty`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UzytkownikId` (`UzytkownikId`,`ProduktId`),
  ADD KEY `ProduktId` (`ProduktId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UzytkownikId` (`UzytkownikId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atrybuty`
--
ALTER TABLE `atrybuty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `elementyzamowienia`
--
ALTER TABLE `elementyzamowienia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opinieproduktow`
--
ALTER TABLE `opinieproduktow`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produktatrybut`
--
ALTER TABLE `produktatrybut`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ulubioneprodukty`
--
ALTER TABLE `ulubioneprodukty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atrybutkategoria`
--
ALTER TABLE `atrybutkategoria`
  ADD CONSTRAINT `atrybutkategoria_ibfk_1` FOREIGN KEY (`AtrybutId`) REFERENCES `atrybuty` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `atrybutkategoria_ibfk_2` FOREIGN KEY (`KategoriaId`) REFERENCES `kategorie` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `elementyzamowienia`
--
ALTER TABLE `elementyzamowienia`
  ADD CONSTRAINT `elementyzamowienia_ibfk_1` FOREIGN KEY (`ZamowienieId`) REFERENCES `zamowienia` (`Id`),
  ADD CONSTRAINT `elementyzamowienia_ibfk_2` FOREIGN KEY (`ProduktId`) REFERENCES `produkty` (`Id`);

--
-- Constraints for table `opinieproduktow`
--
ALTER TABLE `opinieproduktow`
  ADD CONSTRAINT `opinieproduktow_ibfk_1` FOREIGN KEY (`ProduktId`) REFERENCES `produkty` (`Id`),
  ADD CONSTRAINT `opinieproduktow_ibfk_2` FOREIGN KEY (`UzytkownikId`) REFERENCES `uzytkownicy` (`Id`);

--
-- Constraints for table `produktatrybut`
--
ALTER TABLE `produktatrybut`
  ADD CONSTRAINT `produktatrybut_ibfk_1` FOREIGN KEY (`ProduktId`) REFERENCES `produkty` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produktatrybut_ibfk_2` FOREIGN KEY (`AtrybutId`) REFERENCES `atrybuty` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`KategoriaId`) REFERENCES `kategorie` (`Id`);

--
-- Constraints for table `ulubioneprodukty`
--
ALTER TABLE `ulubioneprodukty`
  ADD CONSTRAINT `ulubioneprodukty_ibfk_1` FOREIGN KEY (`UzytkownikId`) REFERENCES `uzytkownicy` (`Id`),
  ADD CONSTRAINT `ulubioneprodukty_ibfk_2` FOREIGN KEY (`ProduktId`) REFERENCES `produkty` (`Id`);

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`UzytkownikId`) REFERENCES `uzytkownicy` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
