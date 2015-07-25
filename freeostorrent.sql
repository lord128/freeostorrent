-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 25 Juillet 2015 à 09:28
-- Version du serveur :  5.5.43-0+deb8u1
-- Version de PHP :  5.6.10-1~dotdeb+7.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `freeostorrent`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_cats`
--

CREATE TABLE IF NOT EXISTS `blog_cats` (
`catID` int(11) unsigned NOT NULL,
  `catTitle` varchar(255) DEFAULT NULL,
  `catSlug` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_cats`
--

INSERT INTO `blog_cats` (`catID`, `catTitle`, `catSlug`) VALUES
(1, 'Arch', 'arch'),
(2, 'Autres Arch', 'autres-arch'),
(3, 'Debian', 'debian'),
(4, 'Autres Debian', 'autres-debian'),
(5, 'CentOS', 'centos'),
(6, 'Fedora', 'fedora'),
(8, 'Elementary', 'elementary'),
(9, 'Gentoo', 'gentoo'),
(10, 'Mageia', 'mageia'),
(11, 'Red Hat', 'red-hat'),
(12, 'Mandriva', 'mandriva'),
(13, 'Mint', 'mint'),
(14, 'Slackware', 'slackware'),
(15, 'PCLinuxOS', 'pclinuxos'),
(16, 'Ubuntu', 'ubuntu'),
(17, 'Autres Ubuntu', 'autres-ubuntu'),
(18, 'FreeBSD', 'freebsd'),
(19, 'OpenBSD', 'openbsd'),
(20, 'NetBSD', 'netbsd'),
(21, 'Autres', 'autres'),
(22, 'Autres FreeBSD', 'autres-freebsd'),
(23, 'Android', 'android'),
(24, 'Puppy', 'puppy'),
(25, 'Autres Fedora', 'autres-fedora'),
(26, 'OpenSuse', 'opensuse'),
(27, 'Autres Puppy', 'autres-puppy'),
(28, 'Autres Slackware', 'autres-slackware'),
(29, 'Autres OpenBSD', 'autres-openbsd'),
(30, 'Autres NetBSD', 'autres-netbsd'),
(31, 'Frugalware', 'frugalware');

-- --------------------------------------------------------

--
-- Structure de la table `blog_licences`
--

CREATE TABLE IF NOT EXISTS `blog_licences` (
`licenceID` int(11) unsigned NOT NULL,
  `licenceTitle` varchar(255) NOT NULL,
  `licenceSlug` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_licences`
--

INSERT INTO `blog_licences` (`licenceID`, `licenceTitle`, `licenceSlug`) VALUES
(1, 'GPL V2', 'gpl-v2'),
(2, 'GPL V3', 'gpl-v3'),
(3, 'LGPL V2', 'lgpl-v2'),
(4, 'LGPL V3', 'lgpl-v3'),
(6, 'BSD', 'bsd'),
(7, 'MIT', 'mit'),
(9, 'C.C. By', 'c-c-by'),
(10, 'C.C. By-Nd', 'c-c-by-nd'),
(11, 'C.C. By-Sa', 'c-c-by-sa'),
(12, 'C.C. By-Nc', 'c-c-by-nc'),
(13, 'C.C. By-Nc-Sa', 'c-c-by-nc-sa'),
(14, 'C.C. By-Nc-Nd', 'c-c-by-nc-nd'),
(16, 'AGPL', 'agpl'),
(17, 'FreeBSD', 'freebsd'),
(20, 'C.C. 0', 'c-c-0'),
(21, 'Apache 2.0', 'apache-2-0');

-- --------------------------------------------------------

--
-- Structure de la table `blog_members`
--

CREATE TABLE IF NOT EXISTS `blog_members` (
`memberID` int(11) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pid` varchar(32) NOT NULL,
  `memberDate` datetime NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_members`
--


-- --------------------------------------------------------

--
-- Structure de la table `blog_messages`
--

CREATE TABLE IF NOT EXISTS `blog_messages` (
`messages_id` int(11) NOT NULL,
  `messages_id_expediteur` int(11) NOT NULL DEFAULT '0',
  `messages_id_destinataire` int(11) NOT NULL DEFAULT '0',
  `messages_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `messages_titre` text NOT NULL,
  `messages_message` text NOT NULL,
  `messages_lu` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_messages`
--


-- --------------------------------------------------------

--
-- Structure de la table `blog_posts_comments`
--

CREATE TABLE IF NOT EXISTS `blog_posts_comments` (
`cid` int(10) NOT NULL,
  `cid_torrent` int(10) NOT NULL,
  `cadded` datetime NOT NULL,
  `ctext` text NOT NULL,
  `cuser` varchar(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_posts_comments`
--


-- --------------------------------------------------------

--
-- Structure de la table `blog_posts_seo`
--

CREATE TABLE IF NOT EXISTS `blog_posts_seo` (
`postID` int(11) unsigned NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postAuthor` varchar(255) NOT NULL,
  `postSlug` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postTaille` bigint(20) NOT NULL DEFAULT '0',
  `postDate` datetime DEFAULT NULL,
  `postTorrent` varchar(150) NOT NULL,
  `postImage` varchar(255) NOT NULL,
  `postViews` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_posts_seo`
--


-- --------------------------------------------------------

--
-- Structure de la table `blog_post_cats`
--

CREATE TABLE IF NOT EXISTS `blog_post_cats` (
`id` int(11) unsigned NOT NULL,
  `postID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=362 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_post_cats`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_post_licences`
--

CREATE TABLE IF NOT EXISTS `blog_post_licences` (
`id_BPL` int(11) unsigned NOT NULL,
  `postID_BPL` int(11) NOT NULL,
  `licenceID_BPL` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=382 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `blog_post_licences`
--


-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE IF NOT EXISTS `compteur` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compteur`
--


-- --------------------------------------------------------

--
-- Structure de la table `connectes`
--

CREATE TABLE IF NOT EXISTS `connectes` (
  `ip` varchar(15) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `connectes`
--


-- --------------------------------------------------------

--
-- Structure de la table `xbt_announce_log`
--

CREATE TABLE IF NOT EXISTS `xbt_announce_log` (
`id` int(11) NOT NULL,
  `ipa` int(10) unsigned NOT NULL,
  `port` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `info_hash` binary(20) NOT NULL,
  `peer_id` binary(20) NOT NULL,
  `downloaded` bigint(20) unsigned NOT NULL,
  `left0` bigint(20) unsigned NOT NULL,
  `uploaded` bigint(20) unsigned NOT NULL,
  `uid` int(11) NOT NULL,
  `mtime` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5631616 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `xbt_announce_log`
--

-- --------------------------------------------------------

--
-- Structure de la table `xbt_config`
--

CREATE TABLE IF NOT EXISTS `xbt_config` (
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `value` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `xbt_config`
--

INSERT INTO `xbt_config` (`name`, `value`) VALUES
('redirect_url', ''),
('query_log', '1'),
('pid_file', '/var/run/xbt_tracker.pid'),
('offline_message', ''),
('column_users_uid', 'uid'),
('column_files_seeders', 'seeders'),
('column_files_leechers', 'leechers'),
('column_files_fid', 'fid'),
('column_files_completed', 'completed'),
('write_db_interval', '15'),
('scrape_interval', '0'),
('read_db_interval', '60'),
('read_config_interval', '60'),
('clean_up_interval', '60'),
('log_scrape', '0'),
('log_announce', '1'),
('log_access', '0'),
('gzip_scrape', '1'),
('full_scrape', '0'),
('debug', '1'),
('daemon', '1'),
('anonymous_scrape', '0'),
('announce_interval', '200'),
('torrent_pass_private_key', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
('table_announce_log', 'xbt_announce_log'),
('table_files', 'xbt_files'),
('table_files_users', 'xbt_files_users'),
('table_scrape_log', 'xbt_scrape_log'),
('table_users', 'xbt_users'),
('listen_ipa', '*'),
('listen_port', '54969'),
('anonymous_announce', '0'),
('auto_register', '0');

-- --------------------------------------------------------

--
-- Structure de la table `xbt_deny_from_hosts`
--

CREATE TABLE IF NOT EXISTS `xbt_deny_from_hosts` (
  `begin` int(10) unsigned NOT NULL,
  `end` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `xbt_files`
--

CREATE TABLE IF NOT EXISTS `xbt_files` (
`fid` int(11) NOT NULL,
  `info_hash` binary(20) NOT NULL,
  `leechers` int(11) NOT NULL DEFAULT '0',
  `seeders` int(11) NOT NULL DEFAULT '0',
  `completed` int(11) NOT NULL DEFAULT '0',
  `flags` int(11) NOT NULL DEFAULT '0',
  `mtime` int(11) NOT NULL,
  `ctime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `xbt_files`
--


-- --------------------------------------------------------

--
-- Structure de la table `xbt_files_users`
--

CREATE TABLE IF NOT EXISTS `xbt_files_users` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `announced` int(11) NOT NULL,
  `completed` int(11) NOT NULL,
  `downloaded` bigint(20) unsigned NOT NULL,
  `left` bigint(20) unsigned NOT NULL,
  `uploaded` bigint(20) unsigned NOT NULL,
  `mtime` int(11) NOT NULL,
  `down_rate` int(10) unsigned NOT NULL,
  `up_rate` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `xbt_files_users`
--


-- --------------------------------------------------------

--
-- Structure de la table `xbt_scrape_log`
--

CREATE TABLE IF NOT EXISTS `xbt_scrape_log` (
`id` int(11) NOT NULL,
  `ipa` int(10) unsigned NOT NULL,
  `info_hash` binary(20) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `mtime` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `xbt_users`
--

CREATE TABLE IF NOT EXISTS `xbt_users` (
`uid` int(11) NOT NULL,
  `torrent_pass_version` int(11) NOT NULL DEFAULT '0',
  `downloaded` bigint(20) unsigned NOT NULL DEFAULT '0',
  `uploaded` bigint(20) unsigned NOT NULL DEFAULT '0',
  `torrent_pass` char(32) CHARACTER SET latin1 NOT NULL,
  `torrent_pass_secret` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `xbt_users`
--


--
-- Index pour les tables exportées
--

--
-- Index pour la table `blog_cats`
--
ALTER TABLE `blog_cats`
 ADD PRIMARY KEY (`catID`);

--
-- Index pour la table `blog_licences`
--
ALTER TABLE `blog_licences`
 ADD PRIMARY KEY (`licenceID`);

--
-- Index pour la table `blog_members`
--
ALTER TABLE `blog_members`
 ADD PRIMARY KEY (`memberID`);

--
-- Index pour la table `blog_messages`
--
ALTER TABLE `blog_messages`
 ADD PRIMARY KEY (`messages_id`);

--
-- Index pour la table `blog_posts_comments`
--
ALTER TABLE `blog_posts_comments`
 ADD PRIMARY KEY (`cid`);

--
-- Index pour la table `blog_posts_seo`
--
ALTER TABLE `blog_posts_seo`
 ADD PRIMARY KEY (`postID`);

--
-- Index pour la table `blog_post_cats`
--
ALTER TABLE `blog_post_cats`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `blog_post_licences`
--
ALTER TABLE `blog_post_licences`
 ADD PRIMARY KEY (`id_BPL`);

--
-- Index pour la table `xbt_announce_log`
--
ALTER TABLE `xbt_announce_log`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xbt_files`
--
ALTER TABLE `xbt_files`
 ADD PRIMARY KEY (`fid`), ADD UNIQUE KEY `info_hash` (`info_hash`);

--
-- Index pour la table `xbt_files_users`
--
ALTER TABLE `xbt_files_users`
 ADD UNIQUE KEY `fid` (`fid`,`uid`), ADD KEY `uid` (`uid`);

--
-- Index pour la table `xbt_scrape_log`
--
ALTER TABLE `xbt_scrape_log`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xbt_users`
--
ALTER TABLE `xbt_users`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `blog_cats`
--
ALTER TABLE `blog_cats`
MODIFY `catID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `blog_licences`
--
ALTER TABLE `blog_licences`
MODIFY `licenceID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `blog_members`
--
ALTER TABLE `blog_members`
MODIFY `memberID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `blog_messages`
--
ALTER TABLE `blog_messages`
MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `blog_posts_comments`
--
ALTER TABLE `blog_posts_comments`
MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `blog_posts_seo`
--
ALTER TABLE `blog_posts_seo`
MODIFY `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `blog_post_cats`
--
ALTER TABLE `blog_post_cats`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=362;
--
-- AUTO_INCREMENT pour la table `blog_post_licences`
--
ALTER TABLE `blog_post_licences`
MODIFY `id_BPL` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=382;
--
-- AUTO_INCREMENT pour la table `xbt_announce_log`
--
ALTER TABLE `xbt_announce_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5631616;
--
-- AUTO_INCREMENT pour la table `xbt_files`
--
ALTER TABLE `xbt_files`
MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `xbt_scrape_log`
--
ALTER TABLE `xbt_scrape_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT pour la table `xbt_users`
--
ALTER TABLE `xbt_users`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `xbt_files_users`
--
ALTER TABLE `xbt_files_users`
ADD CONSTRAINT `xbt_files_users_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `xbt_files` (`fid`) ON DELETE CASCADE,
ADD CONSTRAINT `xbt_files_users_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `xbt_files` (`fid`) ON DELETE CASCADE,
ADD CONSTRAINT `xbt_files_users_ibfk_3` FOREIGN KEY (`fid`) REFERENCES `xbt_files` (`fid`) ON DELETE CASCADE,
ADD CONSTRAINT `xbt_files_users_ibfk_4` FOREIGN KEY (`uid`) REFERENCES `xbt_users` (`uid`) ON DELETE CASCADE,
ADD CONSTRAINT `xbt_files_users_ibfk_5` FOREIGN KEY (`uid`) REFERENCES `xbt_users` (`uid`) ON DELETE CASCADE,
ADD CONSTRAINT `xbt_files_users_ibfk_6` FOREIGN KEY (`uid`) REFERENCES `xbt_users` (`uid`) ON DELETE CASCADE,
ADD CONSTRAINT `xbt_files_users_ibfk_7` FOREIGN KEY (`uid`) REFERENCES `xbt_users` (`uid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
