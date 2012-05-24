CREATE TABLE user
(
	username VARCHAR(64) NOT NULL PRIMARY KEY,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE profile
(
	profile_username VARCHAR(64) NOT NULL,
	firstname VARCHAR(128) NOT NULL,
	lastname VARCHAR(128) NOT NULL,
	birthmonth INT NOT NULL,
	birthday INT NOT NULL,
	birthyear INT NOT NULL,
	title VARCHAR(128),
	goal VARCHAR(128) NOT NULL,
	gender VARCHAR(128) NOT NULL,
	weight INT,
	height INT,
	location VARCHAR(128),
	INDEX profile_index (profile_username),
	FOREIGN KEY (profile_username) REFERENCES user(username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
