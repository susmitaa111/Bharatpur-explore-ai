CREATE DATABASE IF NOT EXISTS bharatpur_explore_ai CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bharatpur_explore_ai;

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  icon VARCHAR(100) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  language ENUM('en','ne','hi') DEFAULT 'en',
  role ENUM('user','admin') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE places (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id INT UNSIGNED NULL,
  name VARCHAR(180) NOT NULL,
  category VARCHAR(100) NOT NULL,
  location VARCHAR(220) NOT NULL,
  description TEXT,
  image_url TEXT,
  rating DECIMAL(2,1) DEFAULT 0,
  estimated_cost DECIMAL(10,2) DEFAULT 0,
  best_time VARCHAR(150) NULL,
  opening_hours VARCHAR(200) NULL,
  lat DECIMAL(10,7) NULL,
  lng DECIMAL(10,7) NULL,
  is_demo TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_places_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE restaurants (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(180) NOT NULL,
  category VARCHAR(100) DEFAULT 'Food',
  location VARCHAR(220) NOT NULL,
  description TEXT,
  image_url TEXT,
  rating DECIMAL(2,1) DEFAULT 0,
  price_level DECIMAL(10,2) DEFAULT 0,
  lat DECIMAL(10,7) NULL,
  lng DECIMAL(10,7) NULL,
  is_demo TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE homestays (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(180) NOT NULL,
  location VARCHAR(220) NOT NULL,
  description TEXT,
  image_url TEXT,
  rating DECIMAL(2,1) DEFAULT 0,
  price_per_night DECIMAL(10,2) DEFAULT 0,
  lat DECIMAL(10,7) NULL,
  lng DECIMAL(10,7) NULL,
  is_demo TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(180) NOT NULL,
  event_type VARCHAR(100) NOT NULL,
  event_date DATE NULL,
  location VARCHAR(220) NOT NULL,
  description TEXT,
  image_url TEXT,
  is_demo TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NULL,
  place_id INT UNSIGNED NULL,
  rating TINYINT UNSIGNED NOT NULL,
  review_text TEXT NOT NULL,
  sentiment ENUM('Positive','Neutral','Negative') DEFAULT 'Neutral',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_reviews_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  CONSTRAINT fk_reviews_place FOREIGN KEY (place_id) REFERENCES places(id) ON DELETE CASCADE
);

CREATE TABLE favorites (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  item_type ENUM('place','restaurant','homestay','event','itinerary') NOT NULL,
  item_id INT UNSIGNED NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_favorite (user_id,item_type,item_id),
  CONSTRAINT fk_favorites_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE itineraries (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NULL,
  title VARCHAR(180) NOT NULL,
  days TINYINT UNSIGNED NOT NULL,
  budget_label VARCHAR(100),
  group_type VARCHAR(50),
  interests JSON,
  transport VARCHAR(80),
  starting_location VARCHAR(220),
  estimated_total DECIMAL(10,2) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_itinerary_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE itinerary_places (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  itinerary_id INT UNSIGNED NOT NULL,
  place_id INT UNSIGNED NOT NULL,
  day_number TINYINT UNSIGNED NOT NULL,
  time_slot ENUM('Morning','Afternoon','Evening') NOT NULL,
  position_no TINYINT UNSIGNED DEFAULT 1,
  recommendation_score DECIMAL(5,2) NULL,
  CONSTRAINT fk_ip_itinerary FOREIGN KEY (itinerary_id) REFERENCES itineraries(id) ON DELETE CASCADE,
  CONSTRAINT fk_ip_place FOREIGN KEY (place_id) REFERENCES places(id) ON DELETE CASCADE
);

CREATE TABLE emergency_services (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(100) NOT NULL,
  name VARCHAR(180) NOT NULL,
  location VARCHAR(220) NOT NULL,
  contact_label VARCHAR(220) NULL,
  verified TINYINT(1) DEFAULT 0,
  lat DECIMAL(10,7) NULL,
  lng DECIMAL(10,7) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
