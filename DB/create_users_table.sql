create table users(
	user_id int auto_increment,
	user_role varchar(32) not null,
	username varchar(64) not null,
	user_password varchar(255) not null,
	primary key(user_id)
);
