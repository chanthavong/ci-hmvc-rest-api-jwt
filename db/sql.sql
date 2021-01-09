

create table books(
	id int auto_increment,
	code varchar(40),
	name varchar(20) no null,
	description varchar(255),
	tag varchar(60),
	created_at datetime DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
);


create table users(
	id int auto_increment,
	fullname varchar(40),
	phone varchar(20),
	email varchar(60) not null,
	password varchar(400) not null,
	ip varchar(20),
	token varchar(500),
	block boolean default 0,
	lastlog datetime,
	created_at datetime DEFAULT CURRENT_TIMESTAMP,
	updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
);