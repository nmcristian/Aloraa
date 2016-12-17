
DROP TABLE IF EXISTS items_orders;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS addresses;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS orders;

CREATE TABLE IF NOT EXISTS users (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    email varchar(50) CHARACTER SET utf8 UNIQUE NOT NULL,
	password varchar(200) CHARACTER SET utf8 NOT NULL,
	name varchar(80) CHARACTER SET utf8 NOT NULL
);

CREATE TABLE IF NOT EXISTS addresses (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id MEDIUMINT NOT NULL,
	street varchar(80) CHARACTER SET utf8 NOT NULL,
    number varchar(10) CHARACTER SET utf8 NOT NULL,
    floor varchar(10) CHARACTER SET utf8,
    door varchar(10) CHARACTER SET utf8,
    zip varchar(10) CHARACTER SET utf8 NOT NULL,
    city varchar(40) CHARACTER SET utf8 NOT NULL,
    country varchar(40) CHARACTER SET utf8 NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS categories (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name varchar(30) CHARACTER SET utf8 NOT NULL
);

CREATE TABLE IF NOT EXISTS items (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    category_id MEDIUMINT NOT NULL,
	name varchar(50) CHARACTER SET utf8 NOT NULL,
    description varchar(500) CHARACTER SET utf8 NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)  ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS images (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    item_id MEDIUMINT NOT NULL,
    url varchar(200) CHARACTER SET utf8 NOT NULL,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS orders (
	id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id MEDIUMINT NOT NULL,
    address_id MEDIUMINT NOT NULL,
    date DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (address_id) REFERENCES addresses(id)
);

CREATE TABLE IF NOT EXISTS items_orders (
	item_id MEDIUMINT NOT NULL,
    order_id MEDIUMINT NOT NULL,
	FOREIGN KEY (item_id) REFERENCES items(id),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    PRIMARY KEY (item_id, order_id)
);



INSERT INTO users (email, password, name) VALUES
('1@test.com', '$2y$10$rF4SN4mvZCqV6HEW5iH.p.0KXOqtHl3dUI6JrRaXZy6EEw0woT5yq', '1');

INSERT INTO addresses (user_id, street, number, floor, door, zip, city, country) VALUES
(1, 'Ravnholmvej', 4, null, null, '2800', 'Kongens Lyngby', 'Danmark');



select * from users;


delete FROM users
where id > 1;