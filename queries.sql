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