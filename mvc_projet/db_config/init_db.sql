-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 13 Avril 2017 à 16:43
-- Version du serveur: 5.0.75
-- Version de PHP: 5.2.6-3ubuntu4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `jefseutin`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer_faq`
--cette table renferme les informations relatives aux réponses aux questions posées par les utilisateurs


CREATE TABLE IF NOT EXISTS `answer_faq` (
  `answer_ID` int(11) NOT NULL auto_increment,
  `answer_faq_ID` int(11) NOT NULL,
  `answer_user_ID` int(11) NOT NULL,
  `answer_text` varchar(500) NOT NULL,
  `answer_date` datetime NOT NULL,
  `answer_note` int(11) NOT NULL,
  PRIMARY KEY  (`answer_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `faq_ID` int(11) NOT NULL auto_increment,
  `faq_question` varchar(200) NOT NULL,
  `faq_answer` varchar(400) NOT NULL,
  `faq_date` date NOT NULL,
  `faq_user_ID` int(11) NOT NULL,
  PRIMARY KEY  (`faq_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


-- --------------------------------------------------------

-- Structure de la table `note`
--cette table renferme les informations relatives aux notes attribuées par les utilisateurs aux aux reponses apportées 

CREATE TABLE IF NOT EXISTS `note` (
  `note_ID` int(11) NOT NULL auto_increment,
  `note_answer_ID` int(11) NOT NULL,
  `note_user_ID` int(11) NOT NULL,
  `note_status` smallint(6) NOT NULL,
  PRIMARY KEY  (`note_ID`),
  UNIQUE KEY `note_answer_ID` (`note_answer_ID`,`note_user_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;



-- --------------------------------------------------------

--
-- Structure de la table `service`
--cette table renferme les informations relatives aux services disponibles et proposés par les utilisateurs
--
CREATE TABLE IF NOT EXISTS `service` (
  `service_ID` int(11) NOT NULL auto_increment,
  `service_user_ID` int(11) NOT NULL,
  `service_title` varchar(200) NOT NULL,
  `service_description` varchar(500) NOT NULL,
  `service_category` varchar(100) NOT NULL,
  `service_date` date NOT NULL,
  `service_delay` date NOT NULL,
  PRIMARY KEY  (`service_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;


-- --------------------------------------------------------

--
--Structure de la table `user`
--cette table renferme les informations relatives à l'identité des utilisateur détenteurs d'un compte
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(11) NOT NULL auto_increment,
  `user_firstname` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_nickname` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_address_latitude` varchar(30) NOT NULL,
  `user_address_longitude` varchar(30) NOT NULL,
  `user_id_confirm` int(11) NOT NULL,
  `user_isModerator` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_ID`),
  UNIQUE KEY `user_nickname` (`user_nickname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;




----------------------------------------------------
--                                                --
--confiuration de l'utilisateur administrateur    --
--                                                --
----------------------------------------------------


-- Cette section est destinée à la configuration de l'utilisateur  administrateur  de façon automatique dès que 
-- la migration de la base de donée aura été effectuée. veuillez à ce que les différentes valeur soitent bien replie.




--variables à définir
DECLARE @nom varchar(30);
DECLARE @prenom varchar(30);
DECLARE @pseudo varchar(50) NOT NULL;
DECLARE @email varchar(50) NOT NULL;
DECLARE @mot_de_pass varchar(50) NOT NULL;
DECLARE @adresse varchar(150) NOT NULL;
DECLARE @address_latitude varchar(30) NOT NULL, @address_longitude varchar(30) NOT NULL;
DECLARE @est_administrateur tinyint(1) NOT NULL default '1';


-------------------  Identité de l'administrateur ----------
-- 


SET @pnom='';
SET @prenom='';
SET @pseudo='';
SET @email ='';

-------------------------- Adrese de l'administrateur -----------

SET @adresse='';
SET @address_latitude='';
SET @address_longitude='';



--INSERT INTO `user` (`user_ID`, `user_firstname`, `user_lastname`, `user_nickname`, `user_password`, `user_email`, `user_address`, `user_address_latitude`, `user_address_longitude`, `user_id_confirm`, `user_isModerator`) VALUES('',@prenom,@nom,@pseudo,@mot_de_pass,@email,@adresse,@address_latitude,@address_longitude,'0',@est_administrateur);