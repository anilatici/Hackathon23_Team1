CREATE DATABASE IF NOT EXISTS FastFoodRestaurant;
USE FastFoodRestaurant;



create table branch ( Branch_Id   int NOT NULL AUTO_INCREMENT,
					  Branch_Name     VARCHAR(50),
					  Manager_Name    VARCHAR(100),
					  Telephone       VARCHAR(15),
					  Address_Line1   VARCHAR(200),
					  Address_Line2   VARCHAR(200),
					  Address_Line3   VARCHAR(200),
					  Eircode         VARCHAR(8),			
					  Established     DATE  ,			  
PRIMARY KEY (Branch_Id));


INSERT INTO branch VALUES
('1',  'KFC Jervis',           'Jack Black',     '894148673','125 Abbey Street Upper', 	'North Dublin',     'Co. Dublin',  'D01 W3X5',     '2020/08/11'),
('2',  'KFC Applegreen',       'Ryan Gosling',   '894149241','Demsesne',	        	'Dundalk',		    'Co. Louth',   'A94 R178',     '2021/10/12'),
('3',  'KFC Dundalk Road',     'Amy Winehous',   '894149809','Dundalk Rd', 				'Drogheda', 	    'Co. Louth',   'A42 A241',     '2020/10/13'),
('4',  'KFC Marshes',          'Andrew Garfield','874150377','Marshes Lower', 			'Dundalk',		    'Co. Louth',   'Z11 H463',     '1995/04/14'),
('5',  'KFC Drogheda',         'Jason Bourne',   '874180945','Park Ln',				    'Drogheda',		    'Co. Louth',   'N35 T785',     '2008/10/15'),
('6',  'KFC Galway City',      'Johnny Depp',    '874211513','Meadow Rd', 				'Galway City',      'Co. Galway',  'P24 J445',     '2001/04/16'),
('7',  'KFC Castlebellingham', 'Ariana Grande',  '874242081','Upper Heights',			'Castlebellingham', 'Co. Louth',   'M46 W352',     '2008/02/17'),
('8',  'KFC Ballymahon',       'Marylin Monroe', '874272649','Stallion Ave', 			'Ballymahon', 		'Co. Lonford', 'J35 R456',     '2007/10/18'),
('9',  'KFC Long Walk',        'Frank Sinatra',  '874303217','The Long Walk',			'Dundalk',			'Co. Louth',   'X33 X683',     '2018/10/19'),
('10', 'KFC Ravensdale',       'Billy Benson',   '894153785','Lumpers Rd', 				'Ravensdale', 		'Co. Louth',   'Z24 O757',     '2015/02/10'),
('11',  'KFC Jervis',           'Jack Black',     '894148673','125 Abbey Street Upper', 'North Dublin',     'Co. Dublin',  'D01 W3X5',     '2020/08/11'),
('12',  'KFC Applegreen',       'Ryan Gosling',   '894149241','Demsesne',	        	'Dundalk',		    'Co. Louth',   'A94 R178',     '2021/10/12'),
('13',  'KFC Dundalk Road',     'Amy Winehous',   '894149809','Dundalk Rd', 			'Drogheda', 	    'Co. Louth',   'A42 A241',     '2020/10/13'),
('14',  'KFC Marshes',          'Andrew Garfield','874150377','Marshes Lower', 			'Dundalk',		    'Co. Louth',   'Z11 H463',     '1995/04/14'),
('15',  'KFC Drogheda',         'Jason Bourne',   '874180945','Park Ln',				'Drogheda',		    'Co. Louth',   'N35 T785',     '2008/10/15'),
('16',  'KFC Galway City',      'Johnny Depp',    '874211513','Meadow Rd', 				'Galway City',      'Co. Galway',  'P24 J445',     '2001/04/16'),
('17',  'KFC Castlebellingham', 'Ariana Grande',  '874242081','Upper Heights',			'Castlebellingham', 'Co. Louth',   'M46 W352',     '2008/02/17'),
('18',  'KFC Ballymahon',       'Marylin Monroe', '874272649','Stallion Ave', 			'Ballymahon', 		'Co. Lonford', 'J35 R456',     '2007/10/18'),
('19',  'KFC Long Walk',        'Frank Sinatra',  '874303217','The Long Walk',			'Dundalk',			'Co. Louth',   'X33 X683',     '2018/10/19'),
('20', 'KFC Ravensdale',       'Billy Benson',   '894153785','Lumpers Rd', 				'Ravensdale', 		'Co. Louth',   'Z24 O757',     '2015/02/10');




CREATE TABLE kfc_menu (
                          item_id INT PRIMARY KEY,
                          item_name VARCHAR(255) NOT NULL,
                          category VARCHAR(255) NOT NULL,
                          price DECIMAL(10,2) NOT NULL,
                          calories INT,
                          allergens VARCHAR(255)
);

INSERT INTO kfc_menu (item_id, item_name, category, price, calories, allergens) VALUES
     (1, 'Original Recipe Chicken', 'Bucket Meals', 14.99, 1420, 'Wheat, Soy'),
     (2, 'Extra Crispy Chicken', 'Bucket Meals', 14.99, 1620, 'Wheat, Soy'),
     (3, 'Kentucky Fried Wings', 'Bucket Meals', 12.99, 1280, 'Wheat, Soy'),
     (4, 'Tender Bucket', 'Bucket Meals', 12.99, 1140, 'Wheat, Soy, Milk'),
     (5, 'Pot Pie Fill-Up', 'Bucket Meals', 9.99, 790, 'Wheat, Soy, Milk'),
     (6, 'Famous Bowl Fill-Up', 'Bucket Meals', 7.99, 790, 'Wheat, Soy, Milk'),
     (7, 'Extra Crispy Tenders', 'Tenders & Nuggets', 6.99, 760, 'Wheat, Soy'),
     (8, 'Nashville Hot Tenders', 'Tenders & Nuggets', 6.99, 750, 'Wheat, Soy'),
     (9, 'Popcorn Nuggets', 'Tenders & Nuggets', 5.99, 540, 'Wheat, Soy'),
     (10, 'KFC Go Cup', 'Snacks & Sides', 2.99, 290, 'Wheat, Soy, Milk'),
     (11, 'Mashed Potatoes & Gravy', 'Snacks & Sides', 2.49, 120, 'Milk'),
     (12, 'Cole Slaw', 'Snacks & Sides', 2.49, 150, 'Milk'),
     (13, 'Mac & Cheese', 'Snacks & Sides', 2.49, 190, 'Wheat, Milk'),
     (14, 'Biscuit', 'Snacks & Sides', 0.99, 180, 'Wheat, Milk'),
     (15, 'Chocolate Chip Cookie', 'Desserts', 1.29, 160, 'Wheat, Soy, Milk');




CREATE TABLE messages (
                          messages_Id int NOT NULL AUTO_INCREMENT,
                          name VARCHAR(50),
                          email VARCHAR(100),
                          phone VARCHAR(15),
                          terms VARCHAR(200),
                          birthdate VARCHAR(50),
                          gender VARCHAR(200),
                          country VARCHAR(100),
                          datetime VARCHAR(100),
                          file VARCHAR(200),
                          message VARCHAR(500),
                          PRIMARY KEY (messages_Id)
);











