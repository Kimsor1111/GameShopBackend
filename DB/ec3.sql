-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 05:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ec3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `userid`, `productid`, `qty`, `price`, `date`) VALUES
(3, 6, 29, 1, 199.99, '2024-11-22 17:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cate`
--

CREATE TABLE `tbl_cate` (
  `cateid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `menuid` int(11) NOT NULL,
  `des` text NOT NULL,
  `img` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cate`
--

INSERT INTO `tbl_cate` (`cateid`, `name`, `menuid`, `des`, `img`, `status`) VALUES
(2, 'monitor', 1, 'monitor', 'cate (2).png', 'Active'),
(1, 'laptop', 1, 'laptop', 'cate (1).png', 'Active'),
(3, 'Accessories ', 1, 'accessories', 'cate (3).png', 'Active'),
(4, 'CPU', 2, 'cpu', 'cate (4).png', 'Active'),
(5, 'GPU', 2, 'gpu', 'cate (5).png', 'Active'),
(6, 'Motherboard', 2, 'mb', 'cate (6).png', 'Active'),
(7, 'Power Supply', 2, 'PSU', 'cate (7).png', 'Active'),
(8, 'Storage', 2, 'storage', 'cate (8).png', 'Active'),
(9, 'Case', 2, 'case', 'cate (9).png', 'Active'),
(10, 'PS5', 3, 'PS5', 'cate (10).png', 'Active'),
(11, 'PS5 Pro', 3, 'ps5 pro', 'cate (11).png', 'Active'),
(12, 'Game', 3, 'game222', 'cate (12).png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feature`
--

CREATE TABLE `tbl_feature` (
  `featureid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `img` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feature`
--

INSERT INTO `tbl_feature` (`featureid`, `name`, `detail`, `date`, `img`, `status`) VALUES
(1, 'PlayStation 5 Witness Play Unleashed', 'Play PS5<sup>®</sup> games with the most impressive visuals ever possible on console.a PlayStation ', '2024-11-20 08:03:00', 'feature1.jpg', 'Active'),
(2, 'Ultimate gaming, creating, and AI with GeForce RTX.', 'GeForce RTX 40™ Series graphics cards, laptops, desktops, and G-SYNC<sup>®</sup>.', '2024-11-20 08:39:00', 'feature2.jpg', 'Active'),
(3, 'Don’t Pass This Up!', 'Try premium gaming with a Day Pass 25% off for a limited time.', '2024-11-20 08:51:00', 'feature3.jpg', 'Active'),
(4, 'ASUS achieved countless and then went beyond', 'As we demonstrated in 2012 when we launched the world’s first 144Hz gaming monitor, we know what specs create the best visual experience.', '2024-11-20 08:53:00', 'feature4.jpg', 'Active'),
(5, 'Feel the new real world with PlayStation VR2', 'Immerse yourself in epic world that go beyond reality with the groundbreaking PS VR2 headset and PS VR2 Sense controller.', '2024-11-20 09:29:00', 'feature5.jpg', 'Active'),
(6, 'Back to the future', 'With the combination of a BTF graphics card, motherboard, and chassis, you can enjoy a full hidden-connector experience.', '2024-11-20 14:35:00', 'feature6new.jpg', 'Active'),
(8, ' GeForce RTX 40 Series Laptops', 'NVIDIA® GeForce RTX™ 40 Series Laptop GPUs power the world’s fastest laptops for gamers and creators. Plus, the Max-Q suite of technologies optimizes system performance, power, battery life, and acoustics for peak efficiency.', '2024-11-20 10:30:00', 'feature8.jpg', 'Active'),
(7, 'ProArt PZ13 Creativity Unplugged, Anywhere with Copilot+ PC​', 'Introducing ProArt PZ13, an IP52-rated and military-grade-tested detachable laptop for active creators that excels outdoors.', '2024-11-20 14:43:00', 'feature7new.jpg', 'Active'),
(9, 'Unlock Epic Cloud Gaming Adventure. 50% Discount* Second to None!', 'Boosteroid is a leading cloud gaming service that lets you play hundreds of titles from popular platforms on virtually any device, from laptops and desktops to smartphones and tablets. ', '2024-11-21 11:34:00', 'feature9.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menuid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menuid`, `name`, `order`, `status`) VALUES
(1, 'asus', 1, 'Active'),
(2, 'hardware', 2, 'Active'),
(3, 'console', 3, 'Active'),
(4, 'my account', 4, 'Active'),
(5, 'about us', 5, 'Active'),
(6, 'shop', 6, 'Active'),
(7, 'our services', 7, 'Active'),
(8, 'our product', 8, 'Active'),
(9, 'term & condition', 9, 'Active'),
(10, 'contact us', 10, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prd`
--

CREATE TABLE `tbl_prd` (
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `des` text NOT NULL,
  `stock` int(11) NOT NULL,
  `cateid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_prd`
--

INSERT INTO `tbl_prd` (`productid`, `name`, `price`, `des`, `stock`, `cateid`, `menuid`, `discount`, `date`, `img`) VALUES
(1, 'ProArt PZ13 (HT5306); Copilot+ PC', 1299.99, 'Introducing ProArt PZ13, an IP52-rated and military-grade-tested detachable laptop for active creators that excels outdoors. Its OLED touchscreen gives you an incomparable viewing experience, and it’s powered by Snapdragon® X Plus processor with 45 TOPS NPU that unleashes AI-enhanced creativity without sacrificing battery life. Versatile accessories to boost productivity include a detachable keyboard and ASUS Pen 2.0. A full set of I/O ports, including an SD slot with a microSD adapter, simplifies device connectivity and photo transfers. Its slim & light build marries advanced tech with a superior user experience, making creativity accessible to everyone, everywhere.', 23, 1, 1, 10.00, '2024-11-21 07:17:06', 'laptop1.png'),
(2, 'ProArt P16 (H7606); Copilot+ PC', 2599.99, 'Meet ProArt P16 – your ultimate creative companion for the studio and on the move. Its OLED touchscreen ensures precise color accuracy for flawless proofing, while versatile I/O ports seamlessly connect all your peripherals. This NVIDIA® Studio-validated laptop packs a GeForce RTX™ 40 Series Laptop GPU, providing powerful graphics and 321 TOPS AI performance. Additionally, it features up to a 50 TOPS AMD Ryzen™ AI 9 HX 370 processor, delivering exceptional processing power. With AI-enhanced creative features, military-grade toughness, and a long-lasting battery, ProArt P16 transforms any setting into your studio.', 12, 1, 1, 0.00, '2024-11-21 11:17:16', 'laptop2.png'),
(3, 'ASUS A3402', 349.99, 'ASUS A3402 all-in-one PC features an up to 12th Gen Intel Core i7 processor for uncompromising computing performance1. Its dual-storage design empowers both rapid file access and large capacity, while the dual band WiFi 6 ensures superfast, stable wireless connectivity. The slim-bezel NanoEdge design results in an up to 88% screen-to-body ratio for expansive productivity. This beautiful, broad display benefits from 100% sRGB color gamut and 178° wide-view technology for truly great imagery. Combined with its advanced ASUS SonicMaster Premium audio — featuring Dolby® Atmos and two-way AI-powered Noise-Canceling — ASUS A3402 immerses you in striking visuals and superb sound for the ultimate entertainment experience.', 10, 2, 1, 0.00, '2024-11-21 11:20:30', 'monitor1.png'),
(4, 'ROG Strix Scope II 96 RX Wireless', 79.99, 'The ROG Strix Scope II 96 RX Wireless is a full-function gaming keyboard packed into an efficient 96% layout designed to free up desk space. It features tri-mode connectivity with Bluetooth®, 2.4 GHZ ROG SpeedNova wireless technology, and wired USB-C. Plus, the Strix Scope II 96 RX Wireless supports the ROG Omni Receiver and Polling Rate Booster*. Equipped with ROG RX Red or Blue optical switches, and boasting silicone dampening foam, the Scope II 96 RX Wireless offers a superior typing experience. Additional features include streaming hotkeys, multi-function controls, additional ROG-themed ABS keycaps, three tilt angles, and a detachable wrist rest for all-around gaming versatility.', 100, 3, 1, 30.00, '2024-11-21 11:30:22', 'ac1.png'),
(5, 'ROG Pelta', 69.99, 'The specially-tuned sound signature of the ROG Pelta ensures what you hear is as clear and accurate as possible. You can experience incredibly authentic and balanced in-game sound with wide 20Hz–20kHz frequency response, which offers deep, powerful bass and crisp, clear highs, ensuring every footstep, reload, and gunshot is amazingly lifelike. The next-generation detachable boom mic covers a wider frequency range to capture every nuance in your voice without peaking or distortion.', 33, 3, 1, 0.00, '2024-11-21 14:47:39', 'ac2.png'),
(6, 'GeForce GTX 1660 SUPER VENTUS XS OC', 267.25, '\r\nMSI Gaming GeForce GTX 1660 Super 192-bit HDMI/DP 6GB GDRR6 HDCP Support DirectX 12 Dual Fan VR Ready OC Graphics Card (GTX 1660 Super VENTUS XS OC). GTX 1660 Super \"almost makes the 1660 Ti look redundant and noted that it outperforms anything AMD currently offers in the same price range (it is about 20 percent faster than the RX 590).', 4, 5, 2, 13.00, '2024-11-21 15:02:31', 'gpu1.png'),
(7, 'Intel<sup>®</sup>Core<sup>™</sup>i9 14900KF', 489.00, 'Power your computing experience with the Intel Core i9-14900KF, a cutting-edge 14th Generation processor tailored for enthusiasts, gamers, and creators who demand top-tier performance. Designed with Intel\'s advanced architecture, this processor combines exceptional speed, power efficiency, and multitasking capabilities to handle the most intensive workloads effortlessly. Whether you\'re gaming, streaming, editing, or designing, the Intel Core i9-14900KF delivers the performance you need to excel. Unleash unparalleled responsiveness, lightning-fast processing, and smooth multitasking with a processor engineered for today\'s most demanding applications.', 32, 4, 2, 0.00, '2024-11-21 15:19:23', 'cpu1.jpg'),
(8, 'ROG Strix SQ7 Gen4 SSD 1TB', 204.95, '1 TB M.2 PCIe® Gen 4 NVMe® , internal solid state drive with DRAM buffering and large SLC cache, up to 7000 MB/s maximum file transfer speed, compatible with PC and PlayStation® ™5, TCG Opal and AES 256-bit encryption, plus NTI Backup Now EZ software.', 94, 8, 2, 40.00, '2024-11-21 15:35:02', 'store1.png'),
(9, 'PlayStation<sup>®</sup>5 Console', 499.99, 'The PS5® console* unleashes new gaming possibilities that you never anticipated. Experience lightning fast loading with an ultra-high speed SSD, deeper immersion with support for haptic feedback, adaptive triggers, and 3D Audio**, and an all-new generation of incredible PlayStation® games. With PS5®, players get powerful gaming technology packed inside a sleek and compact console design. The custom integration of the PS5® console\'s systems lets creators pull data from the SSD so quickly that they can design games in ways never before possible.', 22, 10, 3, 0.00, '2024-11-21 15:55:42', 'ps5(1).webp'),
(10, 'PRO RACING WHEEL', 799.99, '11Nm Direct Drive and TRUEFORCE feedback technology for PC, PlayStation or Xbox. Logitech G PRO Racing Wheel delivers a professional-grade connection to the race with 11Nm of Direct Drive and TRUEFORCE feedback technology. Featuring an extensively tested PRO “thumbsweep” button layout, plus magnetic gear-shift paddles, dual clutch paddles, and easy mounting. For PC, PlayStation or Xbox.', 4, 10, 3, 5.00, '2024-11-21 15:59:55', 'ps5(2).webp'),
(11, 'TUF GAMING Z890-PRO WIFI', 369.99, 'ASUS TUF GAMING Z890-PRO WIFI takes all the essential elements of the latest Intel® Core™ Ultra Processors (Series 2) processors and combines them with game-ready features and proven durability. Engineered with military-grade components, an upgraded power solution and a comprehensive cooling system, this motherboard goes beyond expectations with rock-solid and stable performance for marathon gaming. TUF GAMING motherboards also undergo rigorous endurance testing to ensure that they can handle conditions where others may fail. This platform delivers the power and connectivity that advanced AI PC applications demand.', 45, 6, 2, 0.00, '2024-11-22 12:43:01', 'mb1.webp'),
(12, 'ROG Strix XG259QNG', 299.99, 'The ROG Strix XG259QNG redefines gaming excellence with its cutting-edge technology. Designed for competitive gamers, it ensures superior speed and precision, offering ultra-fast performance that gives you the winning edge in intense matches. Its vibrant visuals bring games to life like never before, delivering exceptional clarity that enhances the gaming experience. The 24.5-inch display is engineered to meet the demands of professional esports, providing smooth, fluid motion for fast-paced gameplay. With its lightning-fast responsiveness, the ROG Strix XG259QNG offers a true competitive advantage. Whether you\'re streaming, competing, or enjoying your favorite titles, this monitor ensures every moment feels immersive and engaging. The sleek design and advanced features make it the ultimate choice for gamers who demand the best. With cutting-edge color technology, this monitor showcases a wide color gamut for vivid, accurate visuals. Designed to handle the most demanding games, the ROG Strix XG259QNG will elevate your gaming experience to new heights.', 8, 2, 1, 5.00, '2024-11-22 12:49:42', 'monitor2.png'),
(13, 'ASUS TUF Gaming M3 Gen II', 64.99, 'The ASUS TUF Gaming M3 Gen II mouse is built for durability and performance, designed to meet the demands of serious gamers. With its ergonomic design and lightweight build, it provides comfort for long gaming sessions without compromising on control. The mouse features durable switches that are rated for millions of clicks, ensuring reliability throughout intense gaming experiences. Equipped with a high-precision optical sensor, it offers exceptional accuracy and responsiveness. Whether you\'re playing fast-paced shooters or strategy games, the TUF Gaming M3 Gen II delivers smooth, consistent performance. The customizable RGB lighting lets you personalize the look of the mouse to match your gaming setup. Its programmable buttons give you the flexibility to assign complex commands for quick access during gameplay. Built with a tough, textured surface, the mouse offers a solid grip, even in the most heated moments. The ASUS TUF Gaming M3 Gen II is crafted to withstand the rigors of intense gaming, providing the durability and performance you need to stay ahead of the competition. With its unbeatable combination of comfort, precision, and reliability, it’s the perfect choice for gamers looking to elevate their gameplay.', 58, 3, 1, 50.00, '2024-11-22 13:00:36', 'ac3.png'),
(14, 'ROG Raikiri Pro', 108.99, 'ROG Raikiri Pro is designed to elevate your gaming experience with precision and style. Crafted for both casual and competitive gamers, it features an ergonomic design that provides comfort for extended gaming sessions. The controller comes with a unique customizable OLED display on both handles, allowing you to personalize your experience by showing custom images or important game stats. With responsive triggers and programmable buttons, the ROG Raikiri Pro ensures quick, accurate input for any game. It offers both wired and wireless connectivity, providing flexibility whether you\'re gaming on a PC, console, or mobile device. The ROG Raikiri Pro also includes customizable RGB lighting, adding a personalized touch to your gaming setup. Its durable construction is built to withstand intense gameplay, ensuring long-lasting reliability. Featuring Xbox Wireless and Bluetooth support, it ensures seamless and stable connections for lag-free performance. Whether you\'re in the middle of an action-packed shooter or an immersive RPG, the ROG Raikiri Pro provides a competitive edge with its advanced features. With its premium build quality and innovative design, this controller is the ultimate choice for gamers looking for precision, performance, and personalization.', 66, 3, 1, 30.00, '2024-11-22 13:06:42', 'ac4.png'),
(15, 'ROG Strix OLED XG27AQDMG', 2049.99, 'The ROG Strix XG27AQDMG boasts a high-performance 27-inch WOLED panel with stunning 1440p resolution and 240Hz refresh rate, ideal for competitive gaming. It’s equipped with advanced OLED Anti-flicker technology and Extreme Low Motion Blur (ELMB) for smooth, clear visuals during fast-paced action. With 99% DCI-P3 color accuracy and OLED Care features, it offers vibrant, consistent performance while reducing burn-in risks. Its custom heatsink ensures optimal cooling, making it a reliable choice for gamers seeking sharp detail and immersive experiences.', 3, 2, 1, 25.00, '2024-11-22 13:11:55', 'monitor3.png'),
(16, 'ROG Strix XG259QNS-W', 499.99, 'The ROG Strix XG259QNS-W is a high-performance gaming display designed for competitive esports with several key features. This 24.5-inch monitor boasts a Full HD (1920 x 1080) IPS panel that offers a 380Hz refresh rate and a rapid 0.3ms (GTG) response time, ensuring smooth and ultra-responsive gameplay. It covers 110% of the sRGB color gamut and supports HDR10 for vibrant and dynamic visuals. The monitor is equipped with AMD FreeSync Premium and ELMB (Extreme Low Motion Blur) technology to reduce screen tearing and motion blur, making it ideal for fast-paced games. It also supports VRR (Variable Refresh Rate) and GameFast Input for seamless synchronization with your GPU. For ergonomics, it features a stand that allows for height, tilt, swivel, and pivot adjustments, with VESA mounting options for added flexibility. The XG259QNS-W also includes a variety of connectivity options, including DisplayPort 1.4, HDMI 2.0, and USB 3.2 Type-A ports, ensuring compatibility with a range of devices. Its design incorporates a sleek, modern look with a non-glare surface for comfortable, long gaming sessions.', 32, 2, 1, 0.00, '2024-11-22 13:15:14', 'monitor4.png'),
(17, 'ROG Swift OLED PG39WCDM', 999.99, 'The ROG Swift OLED PG39WCDM is a 39-inch ultrawide display offering a stunning 3440x1440 resolution with OLED technology, delivering deep blacks and vibrant colors. Its 240Hz refresh rate and 0.03ms response time ensure an incredibly smooth gaming experience. Equipped with HDR10 support, it offers peak brightness of 1,300 cd/㎡, while its OLED panel provides exceptional contrast with a 1,500,000:1 ratio. The monitor supports NVIDIA® G-SYNC™ and AMD FreeSync Premium Pro, minimizing screen tearing and stutter. It also features ASUS\'s exclusive Dynamic Shadow Boost for better visibility in dark scenes, alongside GameVisual and GamePlus enhancements for a personalized gaming experience. The flexible design includes tilt, swivel, and height adjustments, plus a VESA mount option. Connectivity includes HDMI 2.1, DisplayPort 1.4, and USB-C with 90W power delivery.', 15, 2, 1, 30.00, '2024-11-22 13:17:44', 'monitor5.png'),
(18, 'ProArt Studiobook 16 OLED (H7604)', 2499.99, 'The ProArt Studiobook 16 OLED (H7604) is a powerful workstation laptop designed for creative professionals, offering exceptional performance and a stunning display. Equipped with a 16-inch 3.2K OLED touchscreen, the laptop delivers vibrant colors and deep blacks with a 120Hz refresh rate for smooth visuals. It is powered by the Intel Core i9 13th Gen processor, coupled with an NVIDIA GeForce RTX 4060 GPU, making it ideal for graphics-intensive tasks like video editing, 3D rendering, and digital content creation. The laptop features 16GB of DDR5 RAM (expandable up to 64GB) and a 1TB PCIe 4.0 SSD, providing ample storage and fast data access. The ProArt Studiobook 16 OLED also includes a 1080p camera with a privacy shutter, a built-in fingerprint reader, and Wi-Fi 6E for seamless connectivity. With Thunderbolt 4 ports, HDMI, and USB 3.2 Type-A ports, it offers plenty of options for connecting external devices. The system\'s cooling design ensures that it remains efficient even under heavy workloads, and it has a solid build with a lightweight yet durable chassis. This laptop is tailored for professionals who need high performance, color accuracy, and portability.', 39, 1, 1, 15.00, '2024-11-22 13:26:16', 'laptop3.png'),
(19, 'ProArt Studiobook 16 (H5600, AMD Ryzen 5000 series)', 1899.99, 'Turn your creative vision into reality with the ProArt Studiobook 16 studio laptop: it pushes every boundary to give you the effortless creative experience you’ve always wanted, but never thought possible. With a certified color-accurate 16-inch 120 Hz 2.5K IPS wide-view 16:10 display, up to a breathtakingly powerful AMD Ryzen™ 9 5900HX processor, fast NVIDIA® GeForce RTX™ 3070 graphics, huge amounts of memory, advanced ultrafast storage, superb I/O connectivity, and ultra-precise fingertip control over your creative apps with the groundbreaking new ASUS Dial, ProArt Studiobook 16 is simply the best creator laptop we’ve ever made.', 9, 1, 1, 0.00, '2024-11-22 13:28:51', 'laptop4.png'),
(20, 'ASUS Zenbook S 13 OLED (UX5304)', 1149.99, 'Lighten up your life with the ultra-thin and super-light Zenbook S 13 OLED! This 1 cm-thin2, 1 kg-light3 marvel uses efficient Intel® Core™ Ultra processors, and the amazing 13.3-inch 16:10 3K OLED HDR NanoEdge4 display delivers brilliant visuals. ASUS is completely committed to purposeful innovation that supports a healthier planet, so we’ve also made Zenbook S 13 OLED the most eco-friendly Zenbook ever, in line with our core values. More care, less impact!', 44, 1, 1, 13.00, '2024-11-22 13:30:44', 'laptop5.png'),
(21, 'ASUS Zenbook Pro 14 OLED (UX6404)', 999.99, 'Better doesn’t always have to be bigger! The all-conquering Zenbook Pro 14 OLED packs more on-the-go creative power into its elegant, ultra-compact chassis than ever before, starting with a new 14.5-inch 120Hz OLED NanoEdge display. Added to this is the full power of the latest 13th Gen Intel® Core™ i9-13900H processors and studio-grade NVIDIA® GeForce RTX™ 4070 graphics — unleashed by ASUS IceCool Pro thermal technology to a max 125-watt combined TDP — and the innovative ASUS DialPad for total creative control. Work freely wherever you are with this 17.9 mm-thin, 1.6 kg-light marvel, and enjoy non-stop productivity from the long-lasting 76 Wh battery. Make your creative power more incredible with Zenbook Pro 14 OLED!', 6, 1, 1, 10.00, '2024-11-22 13:33:09', 'laptop6.png'),
(22, 'Zenbook S 13 OLED (UM5302)', 1239.99, 'The ultralight 1-kilogram2 Zenbook S 13 OLED is an elegant and powerful companion for those with busy lifestyles. It packs a lot of advanced technology into its super-thin 14.9 mm magnesium-aluminum alloy chassis, including the latest AMD Ryzen™ 7000-Series Processors and AMD Radeon™ graphics. Finished in one of four sophisticated new colors — Ponder Blue, Aqua Celadon, Vestige Beige and Refined White — Zenbook S 13 OLED is designed to stand out, yet it blends in anywhere. Your eyes — and your fingers — will enjoy the clarity and responsiveness of the 16:10 13.3-inch 2.8K OLED NanoEdge touchscreen3,4,5, which is Dolby Vision-certified with ultra-vivid colors for a superlative viewing experience. And your ears will appreciate the immersive multi-dimensional sound from the Dolby Atmos audio system. Elegance doesn’t get much more refined than this.', 4, 1, 1, 0.00, '2024-11-22 13:36:09', 'laptop7.png'),
(23, 'Black Myth: Wukong', 59.99, 'Black Myth: Wukong is an action RPG rooted in Chinese mythology and based on Journey to the West, one of the Four Great Classical Novels of Chinese literature. You shall set out as the Destined One to venture into the challenges and marvels ahead, to uncover the obscured truth beneath the veil of a glorious legend from the past. As the Destined One, you shall encounter powerful foes and worthy rivals throughout your journey. Fearlessly engage them in epic battles where surrender is not an option. Aside from mastering various staff techniques, you can also freely combine different spells, abilities, weapons, and equipment to find the winning strategy that best suits your combat style. \r\n\r\n', 500, 12, 3, 0.00, '2024-11-22 13:42:18', 'game1.webp'),
(24, 'ZOTAC GAMING GEFORCE GTX 1630 4GB', 149.99, 'The ZOTAC GAMING GeForce GTX 1630 4GB is a compact yet powerful graphics card designed for entry-level gaming and multimedia applications. It features 4GB of GDDR6 memory with a 64-bit memory interface, offering a solid performance boost for most modern games at 1080p. The base clock runs at 1.740 GHz, and it can boost up to 1.785 GHz for enhanced speeds during intensive tasks. With a total TDP of just 75W, it is energy-efficient and requires no additional power connectors. The card supports up to three displays with a maximum resolution of 7680x4320 pixels and includes HDMI 2.0b, DisplayPort 1.4a, and DVI-D outputs. For cooling, it uses a single 90mm axial fan, ensuring reliable thermal performance. The GTX 1630 supports G-SYNC technology for smooth, tear-free gaming, though it does not support FreeSync. Measuring 151mm in length and occupying 2 PCIe slots, it is ideal for smaller builds. Released in mid-2022, it is a great choice for users who need a reliable GPU for casual gaming or video editing.', 142, 5, 2, 30.00, '2024-11-22 13:47:02', 'gpu2.png'),
(25, 'ROG Hyperion GR701 BTF Edition', 299.99, 'The ROG Hyperion GR701 BTF Edition brings an X factor in both form and function that builders around the world have been craving. With support for dual 420 mm radiators, towering video cards, a fully integrated 2-way aluminum graphics card holder, 60-watt device charging and dual front USB-C connectors for compatible ROG motherboards, it is truly a PC chassis in the coveted ROG style. The GR701 BTF Edition is forged with high-end materials that are given extra treatments and distinctive polishing methods, to deliver the luxurious look and feel that elevates an ROG chassis above its many challenges. With the combination of a BTF graphics card, motherboard and chassis, you can enjoy a full hidden-connector experience. This Advanced BTF approach is achieved through the new graphics card high-power slot available on BTF motherboards, which can deliver up to 600 watts to BTF graphics cards. With a full set of BTF components, builders can eliminate visible cables for an extra-clean aesthetic.', 6, 9, 2, 5.00, '2024-11-22 13:54:16', 'case1.png'),
(26, 'ASUS TUF Gaming GT501 White Edition', 149.99, 'TUF Gaming GT501\'s trio of 120mm Aura Sync RGB fans each contains 11 blades, and deliver high-static-pressure flow for targeted cooling. There\'s also a high-airflow 140mm PWM fan for wider heat removal. It\'s fitted with two ergonomic, woven-cotton handles, rigorously tested to support up to 30kg – so it\'s both easy and safe to transport your completed build. It\'s easy to upgrade cooling when you need, with up to seven mounting points for the installation of fans.', 4, 9, 2, 0.00, '2024-11-22 13:57:35', 'case2.png'),
(27, 'SATA HDD Internal Desktop Hard Drive PC CCTV Lot', 30.99, 'The SATA HDD Internal Desktop Hard Drive, commonly used for PCs and CCTV setups, is available in various storage capacities, such as 500GB, 1TB, 2TB, 3TB, and even up to 10TB. These drives are designed for internal use in desktop systems, offering ample storage for files, surveillance footage, and other data. The drives feature 3.5-inch form factor and are compatible with SATA interfaces, ensuring reliable data transfer speeds. With rotational speeds typically at 7200RPM, these hard drives are optimized for performance in both desktop computing and surveillance applications. Many of these drives are tested using S.M.A.R.T. diagnostics to ensure operational functionality. These HDDs are available in bulk, making them a popular choice for system builders, CCTV setups, and data storage expansion.', 55, 8, 2, 60.00, '2024-11-22 14:01:28', 'hdd1.webp'),
(28, 'Netac 1TB Internal SSD 2.5\' SATA III 6Gb/s SSD lot', 49.99, 'The Netac 1TB, 2TB, and 512GB Internal SSDs are high-performance storage solutions that come in a 2.5-inch SATA III form factor, offering compatibility with laptops, PCs, and other devices that support the SATA interface. These drives provide read speeds of up to 500MB/s and write speeds of up to 400MB/s, ensuring fast data access and efficient operation for everyday computing tasks and media storage. The solid-state technology enhances durability and energy efficiency compared to traditional hard drives. With capacities ranging from 512GB to 2TB, they offer flexible options to meet different storage needs. The drives are designed for easy installation and reliable performance over time.', 10, 8, 2, 2.50, '2024-11-22 14:04:29', 'ssd1.webp'),
(29, 'DualSense Edge<sup>™</sup> wireless controller', 199.99, 'Built with high performance and personalization in mind, this new PS5 controller invites you to craft your own unique gaming experience so you can play your way. Find your edge with customizable controls and swappable profiles that can help equip you for anything from pro level tournaments to epic single player adventures. Get the behind the scenes story of how PlayStation’s first-ever high-performance ultra-customizable controller was created – told by those who helped design and develop it.', 2, 10, 3, 0.00, '2024-11-22 14:08:13', 'ps5(3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `date`) VALUES
(1, '1', '1', '1', '2025-03-16 04:15:42'),
(2, '2', '2', '2', '2025-03-16 04:16:17'),
(3, '3', '3', '3', '2025-03-16 04:17:24'),
(4, '4', '4', '4', '2025-03-16 04:17:24'),
(5, '5', '5', '5', '2025-03-16 04:17:24'),
(6, '6', '6', '6', '2025-03-16 04:17:24'),
(7, '7', '7', '7', '2025-03-16 04:17:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_cate`
--
ALTER TABLE `tbl_cate`
  ADD PRIMARY KEY (`cateid`);

--
-- Indexes for table `tbl_feature`
--
ALTER TABLE `tbl_feature`
  ADD PRIMARY KEY (`featureid`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `tbl_prd`
--
ALTER TABLE `tbl_prd`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_cate`
--
ALTER TABLE `tbl_cate`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111112;

--
-- AUTO_INCREMENT for table `tbl_feature`
--
ALTER TABLE `tbl_feature`
  MODIFY `featureid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `tbl_prd`
--
ALTER TABLE `tbl_prd`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
