drop database if exists bnu;
create database bnu;
use bnu;
create table student (
	 id int unsigned auto_increment,
	 name varchar(40) not null unique,
	 password varchar(40) not null,
	 gender varchar(4) not null,
	 nativeplace varchar(10) not null,
	 hobby varchar(40) not null,
	 primary key (id)
);