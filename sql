CREATE  DATABASE loginsystem;

CREATE TABLE user (
  id int(11) not null PRIMARY KEY AUTOINCREMENT,
  first varchar(128) not null,
  last varchar(128) not null,
  uid varchar(128) not null,
  pwd varchar(128) not null

);
