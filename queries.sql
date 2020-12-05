CREATE TABLE category(
	cat_name varchar(256) PRIMARY KEY
);

CREATE TABLE books(
	isbn varchar(16) PRIMARY KEY,
	author varchar(256) not null,
	publisher varchar(256),
	title varchar(256) not null,
	price double,
	quantity int,
	cat_name varchar(256),
	FOREIGN KEY (cat_name) REFERENCES category(cat_name)
);	

CREATE TABLE reviews(
	 text varchar(256) NOT NULL,
	 isbn varchar(16),
	 FOREIGN KEY (isbn) REFERENCES books(isbn),
	 PRIMARY KEY (text, isbn)
);

Create Table Orders(
	order_No int PRIMARY KEY,
	order_day int,
	order_month int,
	order_year int,
	order_total double
);

CREATE TABLE BBB_admin(
	admin_name varchar(30),
	pin int,
	PRIMARY KEY (admin_name, pin)
);

Create Table customer_reg(
	id int,
	username varchar(30),
	pin int,
	PRIMARY KEY (id)
);

Create Table shopping_cart(
	counter int AUTO_INCREMENT,
	id int,
	isbn varchar(16),
	FOREIGN KEY (id) REFERENCES customer_reg(id),
	FOREIGN KEY (isbn) REFERENCES books(isbn),
	PRIMARY KEY (counter, id, isbn)
);

INSERT INTO category
VALUES ('Fantasy');

INSERT INTO category
VALUES ('Adventure');

INSERT INTO category
VALUES ('Fiction');

INSERT INTO category
VALUES ('Horror');

INSERT INTO books
VALUES ('123454', 'bob', 'dan', 'story of time', 12.99, 5, 'Horror');

INSERT INTO books
VALUES ('357457', 'Toby Keller', 'Omega', 'Adventures of Hobb', 1.34, 3, 'Adventure');

INSERT INTO reviews
VALUES ('it was good?', '123454');

INSERT INTO reviews
VALUES ('meh', '123454');

Insert Into Orders
Values (0, 23, 11, 2020, 42.14);

Insert Into Orders
Values (1, 11, 11, 2020, 2.35);

Insert Into Orders
Values (2, 23, 05, 2020, 42.14);

Insert Into customer_reg
VALUES (0, 'bob', 0);

Insert Into customer_reg
VALUES (1, 'davey', 2);

Insert Into BBB_admin
VALUES ('admin', 1234);