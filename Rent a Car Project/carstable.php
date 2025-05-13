<?  TABLE cars 
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(100),
    price_per_day DECIMAL(10,2),
    features TEXT,
    image VARCHAR(255),
    availability BOOLEAN DEFAULT 1  -- 1 means available, \
?>