#
# TABLE STRUCTURE FOR: circuit
#

DROP TABLE IF EXISTS `circuit`;

CREATE TABLE `circuit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `circuit_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `circuit` (`id`, `circuit_name`) VALUES ('15', 'Bujang Circuit');
INSERT INTO `circuit` (`id`, `circuit_name`) VALUES ('17', 'Wallembele Circuit');
INSERT INTO `circuit` (`id`, `circuit_name`) VALUES ('18', 'Tarsor/Kulfuo');
INSERT INTO `circuit` (`id`, `circuit_name`) VALUES ('19', 'tumu east');


#
# TABLE STRUCTURE FOR: comments
#

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `coment` text NOT NULL,
  `dentry` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

INSERT INTO `comments` (`id`, `stfid`, `coment`, `dentry`) VALUES ('90', '875442254', '<span style=\'display: none\'>#promo</span> Promoted to the grade of Sup\'t. ii Prof.', '2017-09-11');
INSERT INTO `comments` (`id`, `stfid`, `coment`, `dentry`) VALUES ('91', '875442254', '<span style=\'display: none;\'> #status 0</span>Status changed to Active', '2017-09-06');
INSERT INTO `comments` (`id`, `stfid`, `coment`, `dentry`) VALUES ('92', '145885', '<span style=\'display: none;\'> #status 6</span>Status changed to Maternity Leave', '2018-10-09');
INSERT INTO `comments` (`id`, `stfid`, `coment`, `dentry`) VALUES ('93', '444665', '<span style=\'display: none;\'> #status 10</span>Status changed to Sick Leave', '2018-10-11');


#
# TABLE STRUCTURE FOR: oinfo
#

DROP TABLE IF EXISTS `oinfo`;

CREATE TABLE `oinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `olabel` varchar(120) NOT NULL,
  `ovalue` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('1', '00555788', 'house no.', 'j43');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('2', '00555788', 'Address', 'new zongo hilia liman road');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('3', '5542442', 'Guardian\'s Phone number', '0242044493');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('4', '5542442', 'Home town', 'Wenchi');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('5', '5542442', 'House no.', 'J43');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('10', '574454', 'the label', 'the value');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('11', '5542442', 'Net salary for january 2017', 'GHs 2,000');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('12', '574454', 'my new label', 'my new value');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('13', '5542442', 'Next Of kin', 'Katulie Niamatu');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('14', '5542442', 'Local house number', 'j67');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('15', '5542442', 'Voter ID number', 'k2542215215');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('16', '554822', 'net salary for january 2018', 'GHs 2,000');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('17', '5542442', 'NHIS No', '12544848487484');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('18', '121448854', 'House Number', 'J43');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('19', '22415566', 'House Address', 'house no. g56, Nyamenjang, tumu');
INSERT INTO `oinfo` (`id`, `stfid`, `olabel`, `ovalue`) VALUES ('20', '5542442', 'fatyer\\s name', 'salifu Aminu');


#
# TABLE STRUCTURE FOR: post
#

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(200) NOT NULL,
  `circuit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('6', 'Tumu JHS', '14');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('7', 'ST Gabriel\'s JHS', '14');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('8', 'Basinsang Basic', '17');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('9', 'bugugbele basic', '17');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('10', 'Basinsang JHS', '16');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('11', 'bujang basic school', '15');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('12', 'challu Basic School', '15');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('13', 'Pieng basic school', '18');
INSERT INTO `post` (`id`, `post_name`, `circuit`) VALUES ('15', 'ST. Gabriels Basic', '19');


#
# TABLE STRUCTURE FOR: ranks
#

DROP TABLE IF EXISTS `ranks`;

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `ranks` (`id`, `rank_name`) VALUES ('2', 'Director I');
INSERT INTO `ranks` (`id`, `rank_name`) VALUES ('6', 'Sup\'t. ii Prof.');
INSERT INTO `ranks` (`id`, `rank_name`) VALUES ('7', 'Senior Wachman/Gateman');
INSERT INTO `ranks` (`id`, `rank_name`) VALUES ('8', 'Director II');
INSERT INTO `ranks` (`id`, `rank_name`) VALUES ('9', 'senior Sup\'t II');


#
# TABLE STRUCTURE FOR: staff
#

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stfid` varchar(50) NOT NULL,
  `fname` varchar(180) NOT NULL,
  `lname` varchar(180) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `rank` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `aqual` varchar(180) NOT NULL,
  `pqual` varchar(180) NOT NULL,
  `apdate` date NOT NULL,
  `datepro` date NOT NULL,
  `trdate` date NOT NULL,
  `phone` varchar(150) NOT NULL,
  `ssnit` varchar(150) NOT NULL,
  `regno` varchar(150) NOT NULL,
  `cshs` varchar(150) NOT NULL,
  `ccol` varchar(150) NOT NULL,
  `datecrank` date NOT NULL,
  `bank` varchar(150) NOT NULL,
  `acno` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('52', '5542442', 'Katulie', 'Mohammed Naabia', 'Male', '1998-03-11', '2', '12', 'Dip. Ed.', 'Dip. Ed.', '2012-03-14', '2017-09-12', '2017-09-13', '0203170321', 'ko55724451', '124545/785', 'General Science', 'B.Ed Science', '0000-00-00', 'A.D.B', '125454224544', '0', '5542442.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('53', '554822', 'Nafar', 'Osman', 'Male', '1980-06-11', '6', '8', 'B. ED.', 'B. ED.', '2006-06-07', '2017-09-05', '2017-09-20', '0242044493', 'Ko588886', 'N/A', 'Visual Arts', 'B, Ed.', '0000-00-00', 'ADB', '882558888778', '0', '554822.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('54', '1215574', 'Margaret', 'Hawine Bundi', 'Female', '1992-05-10', '6', '9', 'Dip. ED', 'Dip. ED', '2016-09-12', '2016-09-12', '2016-09-12', '0242044493', 'k089205100024', '14545424/8', 'Home Economics', 'Early childhood Education', '0000-00-00', 'GCB', '000154544548', '0', '1215574.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('55', '444665', 'Kuri', 'Haruna Kayi', 'Male', '1992-06-09', '6', '12', 'B.Ed maths', 'B.ed maths', '2016-09-12', '2016-09-12', '2016-09-12', '0242044493', 'K0004545478', '41458747', 'General Agriculture', 'B. ED Mathematics', '0000-00-00', 'GCB', '55544242154', '10', '444665.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('56', '121448854', 'Katulie', 'Harimah Ajaratu', 'Female', '1989-12-24', '6', '11', 'B.Ed Biology', 'B.Ed Biology', '2012-06-05', '2016-06-10', '2012-05-06', '0203170321', 'k0065556', 'N/A', 'General Sicence', 'BSC. Biology', '0000-00-00', 'ADB', '00044215544544', '0', '121448854.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('57', '00555788', 'Niamatu', 'Katulie', 'Female', '1996-08-16', '6', '9', 'Dip. Early childhood ED.', 'Dip. Early childhood ED.', '2016-08-16', '2016-08-16', '2016-08-16', '0242044493', 'k06668898988', '5545212/8', 'General Arts', 'Dip, Early Child hood', '0000-00-00', 'GN Bank', '002145454545', '0', '00555788.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('58', '22415566', 'Imoro', 'Elyasu Ven-Ei', 'Male', '1990-06-12', '6', '11', 'Dip. Early Childhood Education', 'Dip. Early Childhood Education', '2015-08-18', '2015-08-18', '2015-08-18', '0242044493', 'k0554566854', '1255448/7', 'General Agriculture', 'Early Childhood Education', '0000-00-00', 'GCB', '44556588884', '0', '22415566.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('59', '875442256', 'Abdul Aziz', 'Neke', 'Male', '1992-02-10', '9', '9', 'B.Ed Economics', 'B.Ed Economics', '2016-06-14', '2018-01-15', '2016-02-02', '0203170321', 'k05552445', 'N/A', 'General Arts', 'B.ED Economics', '0000-00-00', 'GCB', '10006655633', '5', '875442256.jpg');
INSERT INTO `staff` (`id`, `stfid`, `fname`, `lname`, `sex`, `dob`, `rank`, `post`, `aqual`, `pqual`, `apdate`, `datepro`, `trdate`, `phone`, `ssnit`, `regno`, `cshs`, `ccol`, `datecrank`, `bank`, `acno`, `status`, `photo`) VALUES ('60', '145885', 'Fuseina', 'Benin', 'Female', '1987-02-11', '2', '12', 'ECE', 'ECE', '2012-02-08', '2017-09-13', '2016-09-14', '0207353880', 'ko5245445', '522451/7', 'General Science', 'ECE', '0000-00-00', 'GN Bank', '887554254442', '6', '145885.jpg');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(150) NOT NULL,
  `upass` varchar(80) NOT NULL,
  `logtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `uname`, `upass`, `logtime`) VALUES ('2', 'osman', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-09-18 21:16:48');
INSERT INTO `users` (`id`, `uname`, `upass`, `logtime`) VALUES ('4', 'system', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-10-10 17:01:22');
INSERT INTO `users` (`id`, `uname`, `upass`, `logtime`) VALUES ('5', 'yusif', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-09-18 21:25:05');
INSERT INTO `users` (`id`, `uname`, `upass`, `logtime`) VALUES ('6', 'Amin', '5f4dcc3b5aa765d61d8327deb882cf99', '2017-09-22 16:19:06');


