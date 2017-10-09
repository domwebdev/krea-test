
CREATE DATABASE test_krea

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`user_id`, `login`, `password`) VALUES
(1, 'krea', '123456'),
(2, 'admin', 'eHg1NTQyZFg=');

CREATE TABLE `contacts` (
    contact_id int NOT NULL AUTO_INCREMENT,
    user_id int(11) NOT NULL,
    contact_type ENUM('address', 'email', 'phone', 'web'),
    contact_value text,
    PRIMARY KEY (contact_id),
    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `contacts` (`contact_id`, `user_id`, `contact_type`, `contact_value`) VALUES
(1, 1, 'email', 'krea@krea.com'),
(2, 1, 'email', 'support@krea.com'),
(3, 1, 'phone', '+421377930111'),
(4, 1, 'phone', '+421377930113'),
(5, 1, 'web', 'http://www.krea.com/');