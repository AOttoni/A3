-- PRODUCT TABLE

DROP DATABASE IF EXISTS `quarantine-supply-db`;
CREATE DATABASE `quarantine-supply-db`;
USE `quarantine-supply-db`;
-------------------
CREATE TABLE product(
id INTEGER,
`name` VARCHAR(100),
`description` VARCHAR(500),
price DECIMAL(6,2),
stock INTEGER,

CONSTRAINT pk_product_id PRIMARY KEY(id)
);


/*CART TABLE*/
-------------------
CREATE TABLE cart(
product_id INTEGER,
customer_id INTEGER,
quantity INTEGER,

CONSTRAINT pk_product_id_customer_id PRIMARY KEY(product_id,customer_id)
);


/*CUSTOMER TABLE*/
-------------------
CREATE TABLE customer(
id INTEGER AUTO_INCREMENT,
first_name VARCHAR(50),
last_name VARCHAR(50),
email VARCHAR(50),
`password` VARCHAR(50),
registered_on DATE,
`level` INTEGER,

CONSTRAINT pk_customer_id PRIMARY KEY(id)
);

CREATE TABLE address(
id INTEGER AUTO_INCREMENT,
country VARCHAR(20) NOT NULL,
city VARCHAR(20),
address VARCHAR(20),

CONSTRAINT pk_address_id PRIMARY KEY(id)
);

CREATE TABLE customer_address(
address_id INTEGER,
customer_id INTEGER,

CONSTRAINT fk_address_id FOREIGN KEY (address_id) REFERENCES address(id),
CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES customer(id),
CONSTRAINT pk_address_id_customer_id PRIMARY KEY(address_id, customer_id)
);

CREATE TABLE payment_method(
id INTEGER AUTO_INCREMENT,
card_type ENUM('credit','debit','gift card') NOT NULL,
card_number INTEGER,

CONSTRAINT pk_payment_method_id PRIMARY KEY(id)
);

CREATE TABLE customer_payment_method(
method_id INTEGER,
customer_id INTEGER,

CONSTRAINT pk_method_id_customer_id PRIMARY KEY(method_id, customer_id),
CONSTRAINT fk_method_id FOREIGN KEY (method_id) REFERENCES payment_method(id),
CONSTRAINT fk_custmer_payment_method_customer_id FOREIGN KEY (customer_id) REFERENCES customer(id)
);

/*ORDER TABLE*/
-------------------
CREATE TABLE `order`(
order_id INTEGER,
customer_id INTEGER,
made_on DATETIME,
grand_total DECIMAL(6,2),
ship_to INTEGER,
bill_to INTEGER,
payment_method_used INTEGER,

CONSTRAINT pk_order_id PRIMARY KEY(order_id),
CONSTRAINT fk_order_customer_id FOREIGN KEY(customer_id) REFERENCES customer(id),
CONSTRAINT fk_ship_to FOREIGN KEY(ship_to) REFERENCES address(id),
CONSTRAINT fk_bill_to FOREIGN KEY(bill_to) REFERENCES address(id),
CONSTRAINT fk_payment_method_used FOREIGN KEY(payment_method_used) REFERENCES payment_method(id)
);


/*ORDER/ITEM ASSOCIATIVE TABLE*/
-------------------
CREATE TABLE order_product(
product_id INTEGER,
order_id INTEGER,
order_item_quantity INTEGER,
order_item_total DECIMAL(6,2),

CONSTRAINT pk_product_id_order_id PRIMARY KEY(product_id,order_id)
);

-- INDEXES
-- Indexes will be on order, product and cart because they would be the most important queries for customers
-- An index on customers would be important for admins so we shoudl index that too

-- This is just an index on the order id and customer id so customers can find their own orders

CREATE INDEX `idx_order_order_id_customer_id`
ON `order` (`order_id`, `customer_id`);

-- This is an index on product id and name, so finding products won't be as long

CREATE INDEX `idx_product_id_name`
ON `product` (`id`, `name`);

-- Indexing carts for some reason, I don't really remember why we did this

CREATE INDEX `idx_cart_id_customer_id`
ON `cart` (`product_id`, `customer_id`);

-- Lastly, index the customer with their first and last name so it's easier to login (I hope lol)

CREATE INDEX `idx_customer_id_name`
ON `customer` (`id`, `first_name`, `last_name`);

-- ROLES
DROP ROLE IF EXISTS`registered_user`;
DROP ROLE IF EXISTS `admin`;
CREATE ROLE `registered_user`, `admin`;

-- Admin gets to do whatever he wants
GRANT ALL PRIVILEGES ON `quarantine-supply-db`.* TO `admin`;

-- SQL is so dry...
-- registered users can SELECT on anything, since they have information pertaining to them
-- in each table

-- they can insert on customer, cart, address and payment method because they should be able 
-- to create, for example, an account, a cart, add an address and payment method to their account,
-- etc. 

-- So the next few lines are that

GRANT SELECT ON `quarantine-supply-db`.*  
TO `registered_user`;

GRANT INSERT ON `quarantine-supply-db`.`customer`
TO `registered_user`;

GRANT INSERT ON `quarantine-supply-db`.`address`
TO `registered_user`;

GRANT INSERT ON `quarantine-supply-db`.`payment_method`
TO `registered_user`;

GRANT INSERT ON `quarantine-supply-db`.`cart`
TO `registered_user`;

-- VIEWS

CREATE VIEW customer_info AS
SELECT first_name, last_name, registered_on FROM customer
-- WHERE id = the current customers id
;

CREATE VIEW product_search AS
SELECT `name`, `description`, `price` FROM product
-- WHERE `name` = -- some way of getting the name
;

CREATE VIEW add_address AS
INSERT INTO `address`

-- TRIGGERS
DELIMITER $$
CREATE TRIGGER `insert_trigger_address` BEFORE INSERT ON `quarantine-supply-db`.`address` FOR EACH ROW
BEGIN
    IF EXISTS (SELECT 1 FROM address WHERE country = new.country
				AND city = new.city AND address = new.address)
			THEN
			SET new.country = null;
	END IF;
END$$

CREATE TRIGGER `insert_trigger_payment` BEFORE INSERT ON `quarantine-supply-db`.`payment_method` FOR EACH ROW
BEGIN
    IF EXISTS (SELECT 1 FROM payment_method WHERE card_type = new.card_type AND card_number = new.card_number)
		THEN
			SET new.card_type = null;
	END IF;
END$$

insert into product (id, `name`, `description`, price, stock) values (1, 'Shotgun', 'Does not come with any ammo, but if you are buying this, you definitely have some.', 199.99, 25);
insert into product (id, `name`, `description`, price, stock) values (2, 'Hand sanitizer', 'Now with 100% less glitter than Bath and Body Works.', 19.99, 85);
insert into product (id, `name`, `description`, price, stock) values (3, 'Apple', 'With many doctors getting corona from the hospital, it never hurts to have one of these bad boys to keep them at bay.', 19.99, 28);
insert into product (id, `name`, `description`, price, stock) values (4, 'Heineken', 'Cuz we are not dealing with corona.', 19.99, 78);
insert into product (id, `name`, `description`, price, stock) values (5, 'Cats', 'Netflix refused to show this movie and it made no money so here we are.', 39.99, 698);
insert into product (id, `name`, `description`, price, stock) values (6, 'The Office: The Complete Series', 'You know this is all you are watching Quarantine or not.', 89.99, 41);
insert into product (id, `name`, `description`, price, stock) values (7, 'Justice League: The Snyder Cut', 'We cannot prove we have it, but neither can you.', 9999.99, 1);
insert into product (id, `name`, `description`, price, stock) values (8, 'Face Mask', 'Not just a fad.', 9.99, 20);
insert into product (id, `name`, `description`, price, stock) values (9, 'Face Mask (Supreme(TM) Edition)', 'Why get something that works, when you can get something for 100x AND look like a douche.', 9999.99, 3);
insert into product (id, `name`, `description`, price, stock) values (10, 'Syringe + Cleaning Product', 'Chances are you will only use this once. But at least the US president approves!', 299.99, 96);


insert into customer (id, first_name, last_name, email, `password`, registered_on, `level`) values (1, 'Carleton', 'Sieur', 'csieur0@chronoengine.com', 'ofo7G1XnMLm9', '2020-2-27', 2);
insert into customer (id, first_name, last_name, email, `password`, registered_on, `level`) values (2, 'Dane', 'Denford', 'ddenford1@imdb.com', 'Q5N6HFCrDRWs', '2019-12-29', 4);
insert into customer (id, first_name, last_name, email, `password`, registered_on, `level`) values (3, 'Bret', 'Brydon', 'bbrydon2@google.co.jp', 'hkacgrnUdW', '2019-8-27', 4);

insert into address (id, country, city, `address`) values (1, 'Indonesia', 'Banjeru', 'Muller-Price');
insert into address (id, country, city, `address`) values (2, 'China', 'Liancheng', 'Dare and Sons');
insert into address (id, country, city, `address`) values (3, 'Poland', 'Włoszakowice', 'Reichert, Friesen');
insert into address (id, country, city, `address`) values (4, 'Sweden', 'Halmstad', 'Kris, Rice and Swift');

insert into payment_method (id, card_type, card_number) values ('1', 'credit', '504837');
insert into payment_method (id, card_type, card_number) values ('2', 'debit', '740836');
insert into payment_method (id, card_type, card_number) values ('3', 'gift card', '849836');
insert into payment_method (id, card_type, card_number) values ('4', 'credit', '970566');

insert into `order` (order_id, customer_id, made_on, grand_total, ship_to, bill_to, payment_method_used) values (178545633, 1, '2020-4-10', 1174.03, 1, 1, 1);
insert into `order` (order_id, customer_id, made_on, grand_total, ship_to, bill_to, payment_method_used) values (654621031, 2, '2019-6-29', 927.91, 2, 2, 2);
insert into `order` (order_id, customer_id, made_on, grand_total, ship_to, bill_to, payment_method_used) values (801661935, 3, '2019-12-1', 1308.11, 3, 3, 3);
