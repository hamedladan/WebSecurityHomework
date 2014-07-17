-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 14 Juillet 2011 à 12:45
-- Version du serveur: 5.1.33
-- Version de PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `administrationSecurity`
--

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `responsible` int(11) NOT NULL COMMENT 'ID of the user (prof) responsible for the course',
  `ECTS` int(11) NOT NULL,
  `semesterID` int(11) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `course`
--

INSERT INTO `course` (`courseID`, `name`, `responsible`, `ECTS`, `semesterID`) VALUES
(1, 'Web Security', 1, 6, 2),
(2, 'French', 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `fromUserID` int(11) NOT NULL,
  `toUserID` int(11) NOT NULL,
  `toCourseID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`messageID`, `fromUserID`, `toUserID`, `toCourseID`, `title`, `body`, `time`) VALUES
(1, 1, 2, 0, 'Hello World', 'This is a test of a message', '2011-06-09 11:28:34'),
(3, 1, 3, 0, 'rrr', 'Hello Inge', '2011-06-10 16:54:28'),
(5, 6, 4, 0, 'To Jean Muster', 'This is a message from admin to Jean Muster', '2011-06-14 20:20:40'),
(6, 4, 6, 0, 'Answer', 'This is an answer from Jean Muster to Silvia (Admin)', '2011-06-14 20:21:32');

-- --------------------------------------------------------

--
-- Structure de la table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `semesterID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `default` tinyint(1) NOT NULL,
  PRIMARY KEY (`semesterID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `semester`
--

INSERT INTO `semester` (`semesterID`, `name`, `default`) VALUES
(1, 'Winter term 10/11', 0),
(2, 'Summer term 2011', 1),
(3, 'Winter term 2011/201', 0);

-- --------------------------------------------------------

--
-- Structure de la table `studentcourse`
--

CREATE TABLE IF NOT EXISTS `studentcourse` (
  `studentcourseID` int(11) NOT NULL AUTO_INCREMENT,
  `idCourse` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `mark` decimal(2,1) NOT NULL DEFAULT '-1.0',
  PRIMARY KEY (`studentcourseID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `studentcourse`
--

INSERT INTO `studentcourse` (`studentcourseID`, `idCourse`, `idStudent`, `mark`) VALUES
(1, 1, 2, 3.7),
(2, 1, 3, 1.7),
(3, 2, 2, 3.3),
(4, 2, 3, 1.3),
(5, 1, 4, -1.0),
(6, 2, 4, -1.0),
(7, 1, 5, 1.0),
(8, 2, 5, -1.0),
(9, 1, 8, -1.0),
(10, 2, 8, -1.0),
(11, 1, 9, -1.0),
(12, 2, 9, -1.0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `name` varchar(40) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `coach` int(11) NOT NULL COMMENT 'link to the id of the professor coaching this student',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`userID`, `username`, `name`, `firstname`, `email`, `password`, `level`, `coach`) VALUES
(1, 'bie1', 'Benoist', 'Emmanuel', 'emmanuel@benoist.ch', 'toto14', 2, 0),
(2, 'muster', 'Muster', 'Hans', 'hans.muster@security4web.ch', 'toto14', 1, 1),
(3, 'muster2', 'Muster', 'Inge', 'inge.muster@security4web.ch', 'toto14', 1, 1),
(4, 'muster3', 'Muster', 'Jean', 'jean.muster@security4web.ch', 'toto14', 1, 1),
(5, 'muster4', 'Muster', 'Tanja', 'tanja.muster@security4web.ch', 'toto14', 1, 1),
(6, 'admin', 'Muster', 'Silvia', 'silvia.muster@security4web.ch', 'toto14', 3, 0),
(7, 'mlg1', 'Mueller', 'Guenter', 'guenter.mueller@uni-freiburg.de', 'toto14', 2, 0),
(8, 'muster8', 'Muster', 'Anita', 'anita.muster@uni-freiburg.de', 'toto14', 1, 7),
(9, 'muster9', 'Muster', 'Tony', 'tony.muster@uni-freiburg.de', 'toto14', 1, 7);

