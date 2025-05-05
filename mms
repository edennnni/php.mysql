 CREATE TABLE `users`(
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `emri` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `confirm_password` varchar(255) NOT NULL,
    `is_admin` varchar(255)
    )
    INSERT INTO `users` (`emri`,`username`,`email`,`password`,`confirm_password`,`is_admin`)VALUES
INSERT INTO `users` (`emri`,`username`,`email`,`password`,`confirm_password`,`is_admin`)VALUES
('Eden','EdenK','edenkurtolli@gmail.com','123456','123456','true'),
('Edenki','EdeK','edenkurtoll@gmail.com','123456','123456','false')



CREATE TABLE `movies`(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `movie_name` VARCHAR(255) NOT NULL,
    `movie_desc` VARCHAR(255) NOT NULL,
    `movie_quality` VARCHAR(255) NOT NULL,
    `movie_rating` VARCHAR(255) NOT NULL,
    `movie_image` VARCHAR(255) NOT NULL
)


CREATE TABLE `bookings`( `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, `users_id` varchar(255) NOT NULL,
 `movie_id` varchar(255) NOT NULL, `nr_tickets` varchar(255) NOT NULL, `date` varchar(255) NOT NULL, `is_approved`
  varchar(255) NOT NULL, `time` varchar(255) );
