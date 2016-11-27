# Slim Framework 3 Skeleton Application
# MJ_TEST task

Routes for using:
        For retrieving customers data: /api/{type}/{value} - Where {type} is field by which we look in SQL in WHERE clause and {value} is the value of this field
        For adding new customer: /api/add
                Fields for adding: 'customer_name', 'email', 'mobile_number', 'age', 'address', 'city', 'zip_code', 'something_1', 'something_2'
                Email field is unique.

Classes in src/ folder:
        Customer.php   - Customer table model
        Encryption.php - Encrypt\Decrypt phone numbers
        Validation.php - Interface for Validation
        CustomerValidatior.php - Class for validating email, phone number format and empty fields
        DataLayer.php  - Functions for storing/retrieving data from database
        Controller.php - Class with functions for adding/retrieving data
        routes.php - Class with routes


MySQL Table:
        CREATE TABLE IF NOT EXISTS `customers` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `customer_name` varchar(256) DEFAULT NULL,
          `email` varchar(100) NOT NULL,
          `mobile_number` varchar(256) NOT NULL,
          `age` int(2) DEFAULT NULL,
          `address` varchar(256) DEFAULT NULL,
          `city` varchar(256) DEFAULT NULL,
          `zip_code` int(5) DEFAULT NULL,
          `something_1` varchar(256) DEFAULT NULL,
          `something_2` varchar(256) DEFAULT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `email` (`email`(100))
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;


        MySQL user setting in src/settings.php => 'pdo'
        Default user 'root' without password. Host: localhost.
