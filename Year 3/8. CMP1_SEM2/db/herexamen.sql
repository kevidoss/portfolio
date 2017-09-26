-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2017 at 11:03 AM
-- Server version: 5.6.34
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herexamen`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `onderwerp` varchar(255) NOT NULL,
  `bericht` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `naam`, `email`, `onderwerp`, `bericht`) VALUES
(1, 'Kevin', 'kevin@kevin.kevin', 'Test', 'Test'),
(2, 'Kevin', 'kevin@kevin.kevin', 'service', 'Test'),
(3, 'Thomas Est', 't.est@djeemeel.kom', 'product', 'Does this work?');

-- --------------------------------------------------------

--
-- Table structure for table `image_upload`
--

CREATE TABLE `image_upload` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_upload`
--

INSERT INTO `image_upload` (`image_id`, `image_name`, `image`) VALUES
(1, 'Rome Oil', 'ryseoil2.png'),
(4, 'President Washington', 'uPlay_PC_Wallpaper3_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kunstwerk`
--

CREATE TABLE `kunstwerk` (
  `kunstwerk_id` int(11) NOT NULL,
  `kunstwerk_naam` varchar(255) NOT NULL,
  `tijd_id` int(11) NOT NULL,
  `mens_id` int(11) NOT NULL,
  `kunstwerk_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kunstwerk`
--

INSERT INTO `kunstwerk` (`kunstwerk_id`, `kunstwerk_naam`, `tijd_id`, `mens_id`, `kunstwerk_detail`) VALUES
(1, 'Mona Lisa', 5, 1, 'The Mona Lisa is thought to be a portrait of Lisa Gherardini, the wife of Francesco del Giocondo, and is in oil on a white Lombardy poplar panel. It is believed to have been painted between 1503 and 1506, however Leonardo may have continued working on it as late as 1517. It was acquired by King Francis I of France and is now the property of the French Republic, on permanent display at the Louvre Museum in Paris since 1797.'),
(4, 'Guernica', 3, 4, 'Guernica is a mural-sized oil painting on canvas by Spanish artist Pablo Picasso completed in June 1937, at his home on Rue des Grands Augustins, in Paris. The painting, which uses a palette of gray, black, and white, is regarded by many art critics as one of the most moving and powerful anti-war paintings in history. Standing at 3.49 meters (11 ft 5 in) tall and 7.76 meters (25 ft 6 in) wide, the large mural shows the suffering of people wrenched by violence and chaos. Prominent in the composition are a gored horse, a bull, and flames.  The painting was created in response to the bombing of Guernica, a Basque Country village in northern Spain, by Nazi Germany and Fascist Italian warplanes at the request of the Spanish Nationalists. Upon completion, Guernica was exhibited at the Spanish display at the Exposition Internationale des Arts et Techniques dans la Vie Moderne (Paris International Exposition) in the 1937 World\'s Fair in Paris and then at other venues around the world. The touring exhibition was used to raise funds for Spanish war relief. The painting became famous and widely acclaimed, and it helped bring worldwide attention to the Spanish Civil War.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_detail`) VALUES
(1, 'kevin', '123', 'Born 10-05-1996 in Aalst. Hobbies are football and futsal.'),
(2, 'Bla', 'bla', 'Blablablalba');

-- --------------------------------------------------------

--
-- Table structure for table `mens`
--

CREATE TABLE `mens` (
  `id` int(11) NOT NULL,
  `mens_naam` varchar(255) NOT NULL,
  `bijdrage` varchar(255) NOT NULL,
  `leven` varchar(255) NOT NULL,
  `mens_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mens`
--

INSERT INTO `mens` (`id`, `mens_naam`, `bijdrage`, `leven`, `mens_detail`) VALUES
(1, 'Leonardo Da Vinci', 'Mona Lisa', '15 April 1452 - 2 May 1519', 'Leonardo di ser Piero da Vinci, more commonly Leonardo da Vinci or simply Leonardo, was an Italian Renaissance polymath whose areas of interest included invention, painting, sculpting, architecture, science, music, mathematics, engineering, literature, anatomy, geology, astronomy, botany, writing, history, and cartography. He has been variously called the father of palaeontology, ichnology, and architecture, and is widely considered one of the greatest painters of all time. Sometimes credited with the inventions of the parachute, helicopter and tank, he epitomised the Renaissance humanist ideal.'),
(2, 'Nikola Tesla', 'Tesla Coil', '10 juli 1856 - 7 januari 1943', ''),
(3, 'Thomas Edison', 'Lamp', '11 February 1847 - 18 October 1931', 'Invented the lamp'),
(4, 'Pablo Picasso', 'Influential artist', '25 October 1881 – 8 April 1973', 'Pablo Picasso was a Spanish painter, sculptor, printmaker, ceramicist, stage designer, poet and playwright who spent most of his adult life in France. Regarded as one of the most influential artists of the 20th century, he is known for co-founding the Cubist movement, the invention of constructed sculpture, the co-invention of collage, and for the wide variety of styles that he helped develop and explore. Among his most famous works are the proto-Cubist Les Demoiselles d\'Avignon (1907), and Guernica (1937), a dramatic portrayal of the bombing of Guernica by the German and Italian airforces.'),
(6, 'Jesse Owens', 'World renowned athlete', '12 September 1913 - 31 March 1980', 'James Cleveland "Jesse" Owens was an American track and field athlete and four-time Olympic gold medalist in the 1936 Games. His achievement of setting three world records and tying another in less than an hour at the 1935 Big Ten track meet in Ann Arbor, Michigan, has been called "the greatest 45 minutes ever in sport" and has never been equaled. At the 1936 Summer Olympics in Berlin, Germany, Owens won international fame with four gold medals: 100 meters, 200 meters, long jump, and 4 × 100 meter relay. He was the most successful athlete at the Games and, as a black man, was credited with "single-handedly crushing Hitler\'s myth of Aryan supremacy", although he "wasn\'t invited to the White House to shake hands with the President, either".');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bericht` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `titel`, `bericht`, `auteur`, `tags`, `post_detail`) VALUES
(1, 'Welcome', 'Welcome to our forum. Here you can discuss, ask or answer any history related question.', 'Kevin', 'welcome', 'Thank you for using my website and visiting the forums. If you\'ve gotten this far, it also means you took the time to register. Thank you so much for that!'),
(2, 'The best empire?', 'Who had the best empire in your opinion? For me, it was Rome.', 'Kevin', 'discussion', 'The Roman Empire was the post-Roman Republic period of the ancient Roman civilization, characterized by government headed by emperors and large territorial holdings around the Mediterranean Sea in Europe, Africa and Asia.');

-- --------------------------------------------------------

--
-- Table structure for table `religie`
--

CREATE TABLE `religie` (
  `id` int(11) NOT NULL,
  `religie_naam` varchar(255) NOT NULL,
  `boek` varchar(255) NOT NULL,
  `land` varchar(255) NOT NULL,
  `religie_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `religie`
--

INSERT INTO `religie` (`id`, `religie_naam`, `boek`, `land`, `religie_detail`) VALUES
(1, 'Judaism', 'Torah', 'Jerusalem', 'Judaism is an ancient monotheistic Abrahamic religion, with the Torah as its foundational text, and supplemental oral tradition represented by later texts such as the Midrash and the Talmud. It encompasses the religion, philosophy, culture and way of life of the Jewish people.'),
(3, 'Christianity', 'Isreal', 'Isreal', ''),
(5, 'Islam', 'Koran', 'Mekka', 'Preached by prophet Mohammed'),
(6, 'Church of the Flying Spaghetti Monster', 'The Gospel of the Flying Spaghetti Monster', 'N/A', 'The Church of the Flying Spaghetti Monster, or Pastafarianism. Pastafarianism (a portmanteau of pasta and Rastafarian) is a social movement that promotes a light-hearted view of religion and opposes the teaching of intelligent design and creationism in public schools. Pastafarian tenets (generally satires of creationism) are presented both on Henderson\'s Church of the Flying Spaghetti Monster website, where he is described as "prophet", and in The Gospel of the Flying Spaghetti Monster, written by Henderson in 2006. The central belief is that an invisible and undetectable Flying Spaghetti Monster created the universe. Pirates are revered as the original Pastafarians. Henderson asserts that a decline in the number of pirates over the years is the cause of global warming. The FSM community congregates at Henderson\'s website to share ideas about the Flying Spaghetti Monster and crafts representing images of it.');

-- --------------------------------------------------------

--
-- Table structure for table `tijdperk`
--

CREATE TABLE `tijdperk` (
  `id` int(11) NOT NULL,
  `tijd_naam` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `einde` varchar(255) NOT NULL,
  `tijdperk_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tijdperk`
--

INSERT INTO `tijdperk` (`id`, `tijd_naam`, `start`, `einde`, `tijdperk_detail`) VALUES
(1, 'Machine Age', '1880', '1945', 'The Machine Age is an era that includes the early 20th century, sometimes also including the late 19th century. An approximate dating would be about 1880 to 1945. Considered to be at a peak in the time between the first and second world wars, it forms a late part of the Second Industrial Revolution. By the mid to late 1940s, the atom bomb, the first computers, and the transistor came into being, beginning the contemporary era of Digital Revolution and thus ending the intellectual model of the machine age founded in the mechanical and heralding a new more complex model of high technology. The digital era has been called the Second Machine Age, with its increased focus on machines that do mental tasks.'),
(3, 'Interwar period', '1918', '1939', ''),
(5, 'Italian Renaissance', '1300', '1500', 'The Italian Renaissance (Italian: Rinascimento) was the earliest manifestation of the general European Renaissance, a period of great cultural change and achievement that began in Italy during the 14th century and lasted until the 16th century, marking the transition between Medieval and Early Modern Europe.'),
(6, 'Middle Ages', '476', '1300', 'Subdivised in Early, High and Late Middle Ages');

-- --------------------------------------------------------

--
-- Table structure for table `uitvinding`
--

CREATE TABLE `uitvinding` (
  `uitvinding_id` int(11) NOT NULL,
  `uitvinding_naam` varchar(255) NOT NULL,
  `tijd_id` int(11) NOT NULL,
  `mens_id` int(11) NOT NULL,
  `uitvinding_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uitvinding`
--

INSERT INTO `uitvinding` (`uitvinding_id`, `uitvinding_naam`, `tijd_id`, `mens_id`, `uitvinding_detail`) VALUES
(2, 'Tesla Coil', 1, 2, 'The Tesla coil is an electrical resonant transformer circuit designed by inventor Nikola Tesla in 1891. It is used to produce high-voltage, low-current, high frequency alternating-current electricity. Tesla experimented with a number of different configurations consisting of two, or sometimes three, coupled resonant electric circuits.'),
(6, 'Vitruvian Man', 5, 1, 'The Vitruvian Man (Italian: Le proporzioni del corpo umano secondo Vitruvio, which is translated to "The proportions of the human body according to Vitruvius"), or simply L\'Uomo Vitruviano, is a drawing by Leonardo da Vinci around 1490. It is accompanied by notes based on the work of the architect Vitruvius. The drawing, which is in pen and ink on paper, depicts a man in two superimposed positions with his arms and legs apart and inscribed in a circle and square. The drawing and text are sometimes called the Canon of Proportions or, less often, Proportions of Man. It is kept in the Gabinetto dei disegni e stampe of the Gallerie dell\'Accademia, in Venice, Italy, under reference 228. Like most works on paper, it is displayed to the public only occasionally. The drawing is based on the correlations of ideal human proportions with geometry described by the ancient Roman architect Vitruvius in Book III of his treatise De architectura. Vitruvius described the human figure as being the principal source of proportion among the classical orders of architecture. Vitruvius determined that the ideal body should be eight heads high. Leonardo\'s drawing is traditionally named in honor of the architect.');

-- --------------------------------------------------------

--
-- Table structure for table `volk`
--

CREATE TABLE `volk` (
  `id` int(11) NOT NULL,
  `volk_naam` varchar(255) NOT NULL,
  `regio` varchar(255) NOT NULL,
  `bijdrage` varchar(255) NOT NULL,
  `volk_detail` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `volk`
--

INSERT INTO `volk` (`id`, `volk_naam`, `regio`, `bijdrage`, `volk_detail`) VALUES
(1, 'Aztec', 'Mesoamerica', 'Mandatory Education', 'The Aztec people were certain ethnic groups of central Mexico, particularly those groups who spoke the Nahuatl language and who dominated large parts of Mesoamerica from the 14th to 16th centuries.From the 13th century, the Valley of Mexico was the heart of Aztec civilization: here the capital of the Aztec Triple Alliance, the city of Tenochtitlan, was built upon raised islets in Lake Texcoco. The Triple Alliance formed a tributary empire expanding its political hegemony far beyond the Valley of Mexico, conquering other city states throughout Mesoamerica. At its pinnacle, Aztec culture had rich and complex mythological and religious traditions; as well as achieving remarkable architectural and artistic accomplishments.'),
(4, 'Inuit', 'Arctic', 'Snow shoes', ''),
(5, 'Egyptians', 'North Africa', 'Hieroglyphs', 'Formal writing system');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `image_upload`
--
ALTER TABLE `image_upload`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `kunstwerk`
--
ALTER TABLE `kunstwerk`
  ADD PRIMARY KEY (`kunstwerk_id`),
  ADD KEY `tijd_id` (`tijd_id`),
  ADD KEY `mens_id` (`mens_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mens`
--
ALTER TABLE `mens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `naam` (`mens_naam`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religie`
--
ALTER TABLE `religie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tijdperk`
--
ALTER TABLE `tijdperk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uitvinding`
--
ALTER TABLE `uitvinding`
  ADD PRIMARY KEY (`uitvinding_id`),
  ADD KEY `tijd_id` (`tijd_id`),
  ADD KEY `mens_id` (`mens_id`);

--
-- Indexes for table `volk`
--
ALTER TABLE `volk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `image_upload`
--
ALTER TABLE `image_upload`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kunstwerk`
--
ALTER TABLE `kunstwerk`
  MODIFY `kunstwerk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mens`
--
ALTER TABLE `mens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `religie`
--
ALTER TABLE `religie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tijdperk`
--
ALTER TABLE `tijdperk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uitvinding`
--
ALTER TABLE `uitvinding`
  MODIFY `uitvinding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `volk`
--
ALTER TABLE `volk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kunstwerk`
--
ALTER TABLE `kunstwerk`
  ADD CONSTRAINT `kunstwerk_ibfk_1` FOREIGN KEY (`tijd_id`) REFERENCES `tijdperk` (`id`),
  ADD CONSTRAINT `kunstwerk_ibfk_2` FOREIGN KEY (`mens_id`) REFERENCES `mens` (`id`);

--
-- Constraints for table `uitvinding`
--
ALTER TABLE `uitvinding`
  ADD CONSTRAINT `uitvinding_ibfk_1` FOREIGN KEY (`tijd_id`) REFERENCES `tijdperk` (`id`),
  ADD CONSTRAINT `uitvinding_ibfk_2` FOREIGN KEY (`mens_id`) REFERENCES `mens` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
