CREATE schema `test`;
CREATE TABLE IF NOT EXISTS `test`.`user` (
    id   INTEGER PRIMARY KEY,
    username VARCHAR (255) NOT NULL,
    password VARCHAR (255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `test`.`account` (
    id   INTEGER PRIMARY KEY,
    userId VARCHAR (255) NOT NULL,
    name VARCHAR (255) NOT NULL
);
CREATE TABLE `test`.`attempt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` INT NULL,
  `time` DATETIME CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));


INSERT INTO `test`.`user` (`id`, `username`,`password`) VALUES
('1', 'adam', '61ebfba9fbe81f958f0781856179b025'),
('2', 'mark', '82934b3589c16d856f4b410828718186'),
('3', 'peter', '178e724ce993ae58a3e7888a2f25a565');

INSERT INTO `test`.`account` (`id`, `userId`,`name`) VALUES
('1', '1', 'Account 1'),
('2', '1', 'Account 2'),
('3', '2', 'Account 1'),
('4', '2', 'Account 2'),
('5', '2', 'Account 3');
