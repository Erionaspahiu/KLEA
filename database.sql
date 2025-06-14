-- Create database
CREATE DATABASE IF NOT EXISTS klea_hotel;
USE klea_hotel;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Rooms table
CREATE TABLE IF NOT EXISTS rooms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    room_type VARCHAR(50) NOT NULL,
    room_number VARCHAR(10) NOT NULL UNIQUE,
    description TEXT,
    price_per_night DECIMAL(10,2) NOT NULL,
    capacity_adults INT NOT NULL,
    capacity_children INT NOT NULL,
    size_sqm INT,
    features JSON,
    status ENUM('available', 'occupied', 'maintenance') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Room images table
CREATE TABLE IF NOT EXISTS room_images (
    id INT PRIMARY KEY AUTO_INCREMENT,
    room_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    is_primary BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

-- Extras table
CREATE TABLE IF NOT EXISTS extras (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    is_per_person BOOLEAN DEFAULT FALSE,
    is_per_day BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bookings table
CREATE TABLE IF NOT EXISTS bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_reference VARCHAR(20) NOT NULL UNIQUE,
    user_id INT NOT NULL,
    room_id INT NOT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    adults INT NOT NULL,
    children INT DEFAULT 0,
    total_price DECIMAL(10,2) NOT NULL,
    special_requests TEXT,
    booking_status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- Booking extras table
CREATE TABLE IF NOT EXISTS booking_extras (
    booking_id INT NOT NULL,
    extra_id INT NOT NULL,
    quantity INT DEFAULT 1,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (booking_id, extra_id),
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (extra_id) REFERENCES extras(id)
);

-- Payments table
CREATE TABLE IF NOT EXISTS payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    transaction_id VARCHAR(100),
    payment_status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

-- Reviews table
CREATE TABLE IF NOT EXISTS reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id)
);

-- Insert sample room types
INSERT INTO rooms (room_type, room_number, description, price_per_night, capacity_adults, capacity_children, size_sqm, features) VALUES
('Deluxe Room', '101', 'Luxurious room with city view', 250.00, 2, 1, 35, '{"wifi": true, "minibar": true, "tv": "55-inch", "balcony": true}'),
('Presidential Suite', '201', 'Spacious suite with panoramic view', 500.00, 4, 2, 75, '{"wifi": true, "minibar": true, "tv": "65-inch", "balcony": true, "jacuzzi": true, "kitchen": true}'),
('Royal Suite', '301', 'Ultimate luxury experience', 1000.00, 6, 3, 120, '{"wifi": true, "minibar": true, "tv": "75-inch", "balcony": true, "jacuzzi": true, "kitchen": true, "private_pool": true}');

-- Insert sample extras
INSERT INTO extras (name, description, price, is_per_person, is_per_day) VALUES
('Airport Transfer', 'Luxury car transfer from/to airport', 50.00, false, false),
('Breakfast', 'Gourmet breakfast buffet', 25.00, true, true),
('Spa Access', 'Full day access to spa facilities', 35.00, true, false),
('Evening Turn-down', 'Evening room service with chocolates', 15.00, false, true),
('Welcome Package', 'Champagne and fruits upon arrival', 75.00, false, false); 