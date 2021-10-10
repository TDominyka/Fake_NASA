create table news(
	news_id int auto_increment,
	category varchar(16),
	title varchar(64) not null,
	description varchar(255),
	image longblob,
	primary key(news_id)
);
