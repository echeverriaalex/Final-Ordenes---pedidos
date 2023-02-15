CREATE DATABASE IF NOT EXISTS Orders;
USE Orders;

CREATE TABLE IF NOT EXISTS orders
(
    orderId INT NOT NULL,
    orderStatusId INT NOT NULL,
    description NVARCHAR(200) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    CONSTRAINT PK_Order PRIMARY KEY (orderId)  
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS users
(
    userId INT NOT NULL AUTO_INCREMENT,
    email NVARCHAR(100) NOT NULL,
    password NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_User PRIMARY KEY (userId)
)Engine=InnoDB;

CREATE TABLE IF NOT EXISTS orderstatus
(
    orderStatusId INT NOT NULL AUTO_INCREMENT,
    description NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_OrderStatus PRIMARY KEY (orderStatusId)
)Engine=InnoDB;

INSERT INTO users
	(email, password)
VALUES 
	('user@myapp.com', '123456'),
	('final@myapp.com', '123456');


INSERT INTO orderstatus
    (description)
VALUES 
	('Pendiente'),
    ('Cancelada'),
    ('Aceptada');
    
delete from orders;
insert into orders(orderId, orderStatusId,description,price) 
	values 	(1,1,"rabas con papas fritas y coca cola", 4500), 
			(2,1,"milanesa con pure de papas y sprite", 2300),
            (3,1,"spaghettis con mariscos y agua", 3000),
			(4,2,"hamburguesa con papas", 600),
            (5,2,"sandwitch de lomito ", 700),
            (6,2,"hamburguesa con ensalada", 570),
            (7,3,"choripan", 300),
            (8,3,"bondiola con papas", 780),
            (9,3,"pechuga con ensalada", 450);
select  * from orders;

select * from orderstatus;
    
select * from users;