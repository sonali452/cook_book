-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 08:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'kitchen', 'diarieskitchen21@gmail.com', 'diykitchen');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ing_id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `dish_id` int(255) NOT NULL,
  `ing1` varchar(255) NOT NULL,
  `ing2` varchar(255) NOT NULL,
  `ing3` varchar(255) NOT NULL,
  `ing4` varchar(255) NOT NULL,
  `ing5` varchar(255) NOT NULL,
  `ing6` varchar(255) NOT NULL,
  `ing7` varchar(255) NOT NULL,
  `ing8` varchar(255) NOT NULL,
  `ing9` varchar(255) NOT NULL,
  `ing10` varchar(255) NOT NULL,
  `ing11` varchar(255) NOT NULL,
  `ing12` varchar(255) NOT NULL,
  `ing13` varchar(255) NOT NULL,
  `ing14` varchar(255) NOT NULL,
  `ing15` varchar(255) NOT NULL,
  `ing16` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ing_id`, `userid`, `dish_id`, `ing1`, `ing2`, `ing3`, `ing4`, `ing5`, `ing6`, `ing7`, `ing8`, `ing9`, `ing10`, `ing11`, `ing12`, `ing13`, `ing14`, `ing15`, `ing16`) VALUES
(18, 38, 15, 'Rice Flour-1 cup', 'Lentil paste-1/3 cup', 'Salt-1/6 teaspoon', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 38, 17, '1.5 dried split black lentils (3 cups soaked)', '2 generous tablespoon minced ginger', '2 teaspoon cumin powder', '2 teaspoon salt', 'pinch of turmeric powder', 'water, as needed to puree', 'neutral oil such as canola, sunflower oil to pan-fry', 'optional: add minced garlic, chopped cilantro to the mix', '', '', '', '', '', '', '', ''),
(36, 32, 36, 'Rice Flour - 6 cups', 'Gund/Sakkhar/Jaggery – 200 grams', 'Butter or Ghee – 2 Tablespoon', 'Dates – 8 pieces chopped without seeds', 'Sesame Seeds – 1/4 cup', 'Peanuts – 1/3 cup', 'Dried Coconuts – 1/2 cup', 'Milk – 5 to 8 tablespoon', 'Water to make the dough', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` varchar(255) NOT NULL,
  `emailUsers` varchar(255) NOT NULL,
  `pwdUsers` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `session`) VALUES
(32, 'Kitchen', 'diarieskitchen21@gmail.com', 'CxDx8', '702A9A9Cz0'),
(35, 'sandhya', 'sandyshrestacresta@gmail.com', '$2y$10$oR5gIwGHxP1XCJzEFm3ioOEbOgj8cPYiLKwhfMAaMp//HINo80w5a', ''),
(36, 'sand', 'sandhya@gmail.com', '$2y$10$aBVLH8/kacwuH/AOlfZlnOGQD9grN/s1.cJn.N8EBtx2cJ39G6aim', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersrecipe`
--

CREATE TABLE `usersrecipe` (
  `dish_id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `dish` varchar(255) NOT NULL,
  `directions` varchar(10000) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersrecipe`
--

INSERT INTO `usersrecipe` (`dish_id`, `userid`, `dish`, `directions`, `photo`, `uploaded_on`) VALUES
(15, 38, 'Chatamari', 'Soak black lentil in water overnight or until the black coating is easily removed.\r\nRemove black coating by rinsing with water.\r\nMix lentil paste with rice flour to make a thin paste. (thinner then cake paste)\r\nFor topping mix everything well.Heat the flat pan on medium heat\r\nPut the paste on the hot pan in rolling action making as thin of sheet as possible\r\nCover the paste and cook in medium heat (chatamari is cooked from only one side)\r\nCook until the paste is done and serve hot.\r\nUse the damp cloth to wipe out any burnt left behind', 'Chatamari-0.jpg', '2021-08-27 15:30:50'),
(17, 38, 'Wo:', 'In a medium bowl, rinse dried split black lentils few times and soak 8 hours or overnight.\r\n\r\nRinse one more time and drain the water. Use a blender to puree split black lentils in batches if needed into a thick yet somewhat pourable consistency. Add 1-2 tablespoon of water to get the blender going and puree in batches if needed. The batter shouldn’t be grainy nor runny like pancake/crepe batter. Refer to the picture and video above for visual description.\r\n\r\nOnce the batter is ready, add minced ginger, cumin powder, salt, and turmeric powder. Mix everything well and adjust the salt as needed. \r\n\r\nBrush a thin layer of oil on a cast iron or non-stick pan over medium high heat. Use your hand to take about 1/4 cup of batter and gently spread on the pan. Tap on the batter to create a circle as shown on the video. The pancake shouldn’t be too thick or spread too thin. Mine was slightly less than 1/2 inch thick.\r\n\r\nLet it cook for about a minute or so and brush little oil around the edges. You will notice the sides will naturally peel away from the pan. Use a spatula to see if the pancake is ready to be flipped over. If it doesn’t pull easily, allow another 1-2 minutes on the pan and adjust the stove’s heat as needed. When ready, flip the pancake and brush more oil on the edges and cook for 1-2 minutes. \r\n\r\nServe it hot.', 'wo.jpg', '2021-08-28 00:08:28'),
(36, 32, 'Yomari', 'In a bowl, mix rice flour and all purpose flour.\r\nAdd warm water little at a time and start kneading.Once the dough is ready, keep it aside for about 10 minutes.In a high temperature, heat up a deep cooking pot.\r\nPut the jaggery balls and start stiring.\r\nOnce all melted, add 2 spoons of ghee and stir it again.\r\nThen, add little milk and stir again for a minute.\r\nTake it out in bowl, add grated dry coconut and brown sesame seeds.Take a little bit of oil in one hand and take a small portion of the dough.\r\nMake a round and then make a cone shape.\r\nDip your finger in oil and make a hole on the top of the dough.\r\nPress down to make a bigger hole.\r\nRotate the cover while you make the hole.\r\nFill the cover with the chaku . (If the chaku gets too thick, microwave for 20 seconds then pour it)\r\nFill it up to halfway and close the top.\r\nCook the Yomari in the steamer for about 15 minutes.', 'yomari.jpeg', '2021-08-29 00:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `dish_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `userid`, `dish_id`, `name`, `location`) VALUES
(12, 38, 17, 'wo recipe.mp4', 'videos/wo recipe.mp4'),
(26, 32, 36, 'yomari recipe video.mp4', 'videos/yomari recipe video.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ing_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `ingredients_ibfk_2` (`dish_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
