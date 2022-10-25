# bitoid-challenge-3

This is php app which fetches data from github users api and stores it into mysql database.

Before serve the project you have to create mysql database named github_users and run next command:

CREATE TABLE users (
id int(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(255) NOT NULL,
followers int(150) NOT NULL,
repositories int(150) NOT NULL,
avatar_url varchar(150) NOT NULL,
html_url varchar(150) NOT NULL
);

and finally you need to have created database user "root" without password;
