 -- Create the table first
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `emri` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `confirm_password` varchar(255) NOT NULL,
    `is_admin` varchar(255)
);

-- Insert users
INSERT INTO `users` (`emri`, `username`, `email`, `password`, `confirm_password`, `is_admin`) VALUES
('Eden', 'EdenK', 'edenkurtolli@gmail.com', '123456', '123456', 'true'),
('Edenki', 'EdeK', 'edenkurtoll@gmail.com', '123456', '123456', 'false');

-- Now you can select data (optional)
SELECT * FROM `users`;



CREATE TABLE `movies`(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `movie_name` VARCHAR(255) NOT NULL,
    `movie_desc` VARCHAR(255) NOT NULL,
    `movie_quality` VARCHAR(255) NOT NULL,
    `movie_rating` VARCHAR(255) NOT NULL,
    `movie_image` VARCHAR(255) NOT NULL
)


Per Tesla

CREATE TABLE `bookings`( `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `users_id` varchar(255) NOT NULL,
 `movie_id` varchar(255) NOT NULL, `nr_tickets` varchar(255) NOT NULL, `date` varchar(255) NOT NULL, `is_approved`
  varchar(255) NOT NULL, `time` varchar(255) );

CREATE DATABASE IF NOT EXISTS rent_tesla;
USE rent_tesla;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    price_per_day DECIMAL(10,2) NOT NULL,
    image_url VARCHAR(255)
);

INSERT INTO users (email, password) VALUES 
('admin@example.com', '" . password_hash('admin123', PASSWORD_DEFAULT) . "');

INSERT INTO cars (model, year, price_per_day, image_url) VALUES
('Tesla Model 3', 2022, 120.00, 'images/model3.jpg'),
('Tesla Model Y', 2023, 150.00, 'images/modely.jpg'),
('Tesla Model S', 2021, 180.00, 'images/models.jpg'),
('Tesla Model X', 2020, 200.00, 'images/modelx.jpg');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
