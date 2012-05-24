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

CREATE TABLE follower
(
	followed_username VARCHAR(64) NOT NULL,
	follower_username VARCHAR(64) NOT NULL,
	status INT NOT NULL,
	create_time INTEGER NOT NULL,
	INDEX followed_index (followed_username),
	INDEX follower_index (follower_username),
	FOREIGN KEY (followed_username) REFERENCES user(username),
	FOREIGN KEY (follower_username) REFERENCES user(username),
	PRIMARY KEY (followed_username, follower_username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
	
CREATE TABLE post
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	to_user VARCHAR(64) NOT NULL,
	from_user VARCHAR(64) NOT NULL,
	content TEXT NOT NULL,
	status INT NOT NULL,
	create_time INTEGER NOT NULL,
	INDEX to_index (to_user),
	INDEX from_index (from_user),
	FOREIGN KEY (to_user) REFERENCES user(username),
	FOREIGN KEY (from_user) REFERENCES user(username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE postcomment
(
	comment_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	post_id INTEGER NOT NULL,
	commenter_username VARCHAR(64) NOT NULL,
	content TEXT NOT NULL,
	create_time INTEGER NOT NULL,
	INDEX post_index (post_id),
	INDEX commenter_index (commenter_username),
	FOREIGN KEY (post_id) REFERENCES post(id),
	FOREIGN KEY (commenter_username) REFERENCES user(username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE message
(
	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	to_user VARCHAR(64) NOT NULL,
	from_user VARCHAR(64) NOT NULL,
	create_time INTEGER NOT NULL,
	update_time INTEGER NOT NULL,
	INDEX to_index (to_user),
	INDEX from_index (from_user),
	FOREIGN KEY (to_user) REFERENCES user(username),
	FOREIGN KEY (from_user) REFERENCES user(username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
	
CREATE TABLE messagethread
(
	thread_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	message_id INTEGER NOT NULL,
	status INTEGER NOT NULL,
	content TEXT NOT NULL,
	create_time INTEGER NOT NULL,
	INDEX message_index (message_id),
	FOREIGN KEY (message_id) REFERENCES message(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

