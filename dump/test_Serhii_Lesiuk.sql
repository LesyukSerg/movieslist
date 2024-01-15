-- Adminer 4.8.1 MySQL 5.6.51 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `test_Serhii_Lesiuk`;
CREATE DATABASE `test_Serhii_Lesiuk` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test_Serhii_Lesiuk`;

DROP TABLE IF EXISTS `director`;
CREATE TABLE `director` (
  `directorId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`directorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `director` (`directorId`, `name`) VALUES
(1,	'Christopher Nolan'),
(2,	'Quentin Tarantino'),
(3,	'Steven Spielberg'),
(4,	'Martin Scorsese'),
(5,	'Hayao Miyazaki'),
(6,	'Alfred Hitchcock'),
(7,	'Francis Ford Coppola'),
(8,	'Stanley Kubrick'),
(9,	'Greta Gerwig'),
(11,	'Denis Villeneuve')
ON DUPLICATE KEY UPDATE `directorId` = VALUES(`directorId`), `name` = VALUES(`name`);

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `movieId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `directorId` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `releaseDate` date NOT NULL,
  PRIMARY KEY (`movieId`),
  KEY `directorId` (`directorId`),
  CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`directorId`) REFERENCES `director` (`directorId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `movie` (`movieId`, `directorId`, `name`, `description`, `releaseDate`) VALUES
(1,	1,	'Inception',	'A skilled thief enters the dreams of others to steal their secrets. 123',	'2010-07-16'),
(2,	2,	'Pulp Fiction',	'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine.',	'1994-10-14'),
(3,	3,	'Jurassic Park',	'A theme park suffers a major power breakdown that allows its cloned dinosaur exhibits to run amok.',	'1993-06-11'),
(4,	1,	'The Dark Knight',	'Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',	'2008-07-18'),
(5,	2,	'Django Unchained',	'With the help of a German bounty hunter, a freed slave sets out to rescue his wife from a brutal Mississippi plantation owner.',	'2012-12-25'),
(6,	3,	'E.T. the Extra-Terrestrial',	'A troubled child summons the courage to help a friendly alien escape Earth and return to his home world.',	'1982-06-11'),
(7,	1,	'Interstellar',	'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',	'2014-11-07'),
(8,	2,	'Kill Bill: Vol. 1',	'After awakening from a four-year coma, a former assassin wreaks vengeance on the team of assassins who betrayed her.',	'2003-10-10'),
(9,	3,	'Schindler\'s List',	'In German-occupied Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.',	'1993-12-15'),
(10,	1,	'Memento',	'A man with short-term memory loss attempts to track down his wife\'s murderer.',	'2001-09-05'),
(11,	4,	'Goodfellas',	'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito.',	'1990-09-12'),
(12,	5,	'Spirited Away',	'During her family\'s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.',	'2001-07-20'),
(13,	6,	'Psycho',	'A Phoenix secretary embezzles $40,000 from her employer\'s client, goes on the run, and checks into a remote motel run by a disturbed innkeeper.',	'1960-09-08'),
(14,	7,	'The Godfather',	'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son.',	'1972-03-24'),
(15,	8,	'2001: A Space Odyssey',	'A voyage to Jupiter with the sentient HAL 9000 computer aboard the spacecraft Discovery One.',	'1968-04-02'),
(16,	4,	'The Departed',	'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in Boston.',	'2006-10-06'),
(17,	5,	'My Neighbor Totoro',	'When two girls move to the country to be near their ailing mother, they have adventures with the wondrous forest spirits who live nearby.',	'1988-04-16'),
(18,	6,	'North by Northwest',	'A New York City advertising executive goes on the run after being mistaken for a government agent by a group of foreign spies.',	'1959-08-06'),
(19,	7,	'Apocalypse Now',	'A U.S. Army officer serving in Vietnam is tasked with assassinating a renegade Special Forces Colonel who sees himself as a god.',	'1979-08-15'),
(20,	8,	'A Clockwork Orange',	'In the future, a sadistic gang leader is imprisoned and volunteers for a conduct-aversion experiment, but it doesn\'t go as planned.',	'1971-12-19'),
(21,	4,	'Raging Bull',	'The life of boxer Jake LaMotta, whose violence and temper that led him to the top in the ring destroyed his life outside of it.',	'1980-11-14'),
(22,	5,	'Howl\'s Moving Castle',	'When an unconfident young woman is cursed with an old body by a spiteful witch, her only chance of breaking the spell lies with a self-indulgent yet insecure young wizard and his companions in his legged, walking castle.',	'2004-11-20'),
(23,	6,	'Vertigo',	'A former police detective juggles wrestling with his personal demons and becoming obsessed with a hauntingly beautiful woman.',	'1958-05-09'),
(24,	7,	'The Godfather: Part II',	'The early life and career of Vito Corleone in 1920s New York City is portrayed while his son, Michael, expands and tightens his grip on the family crime syndicate.',	'1974-12-12'),
(25,	8,	'The Shining',	'A family heads to an isolated hotel for the winter where a sinister presence influences the father into violence, while his psychic son sees horrific forebodings from both past and future.',	'1980-05-23'),
(26,	4,	'Taxi Driver',	'A mentally unstable veteran works as a nighttime taxi driver in New York City, where the perceived decadence and sleaze fuels his urge for violent action by attempting to liberate a presidential campaign worker and an underage prostitute.',	'1976-02-08'),
(27,	5,	'Princess Mononoke',	'On a journey to find the cure for a Tatarigami\'s curse, Ashitaka finds himself in the middle of a war between the forest gods and Tatara, a mining colony.',	'1997-07-12'),
(28,	6,	'The Birds',	'A wealthy San Francisco socialite pursues a potential boyfriend to a small Northern California town that slowly takes a turn for the bizarre when birds of all kinds suddenly begin to attack people.',	'1963-03-28'),
(29,	7,	'The Conversation',	'A paranoid, secretive surveillance expert has a crisis of conscience when he suspects that the couple he is spying on will be murdered.',	'1974-04-07'),
(32,	2,	'Once Upon a Time in Hollywood',	'A faded television actor and his stunt double strive to achieve fame and success in the final years of Hollywood\\\'s Golden Age in 1969 Los Angeles',	'2019-07-26'),
(36,	11,	'Blade Runner 2049',	'A young blade runner\'s discovery of a long-buried secret leads him to track down former blade runner Rick Deckard, who\'s been missing for thirty years.',	'2017-10-06')
ON DUPLICATE KEY UPDATE `movieId` = VALUES(`movieId`), `directorId` = VALUES(`directorId`), `name` = VALUES(`name`), `description` = VALUES(`description`), `releaseDate` = VALUES(`releaseDate`);

-- 2024-01-15 16:54:43
