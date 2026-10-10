<<<<<<< HEAD
-- ============================================
-- RedArrow Database Schema (Phase 2)
-- ============================================

DROP DATABASE IF EXISTS redarrow_db;
CREATE DATABASE redarrow_db
=======
-- RedArrow Database Schema
-- I-import ito sa phpMyAdmin

CREATE DATABASE IF NOT EXISTS redarrow_db
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE redarrow_db;

-- ============================================
-- USERS (applicants + admins)
-- ============================================
<<<<<<< HEAD
CREATE TABLE users (
=======
CREATE TABLE IF NOT EXISTS users (
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
  id            INT AUTO_INCREMENT PRIMARY KEY,
  full_name     VARCHAR(120) NOT NULL,
  email         VARCHAR(120) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  phone         VARCHAR(30),
<<<<<<< HEAD
  gender        ENUM('Male','Female','Other'),
=======
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
  role          ENUM('applicant','admin') DEFAULT 'applicant',
  created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_email (email)
) ENGINE=InnoDB;

-- ============================================
-- JOBS
-- ============================================
<<<<<<< HEAD
CREATE TABLE jobs (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  title           VARCHAR(150) NOT NULL,
  company         VARCHAR(150) NOT NULL,
  country         VARCHAR(80)  NOT NULL,
  location        VARCHAR(120) NOT NULL,
  field           VARCHAR(80),
  salary_min      INT,
  salary_max      INT,
  salary_currency VARCHAR(10) DEFAULT 'USD',
  job_type        ENUM('Full-time','Part-time','Contract','Remote') DEFAULT 'Full-time',
  experience      VARCHAR(80),
  description     TEXT,
  requirements    TEXT,
  image_url       VARCHAR(255),
  posted_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_active       TINYINT(1) DEFAULT 1,
=======
CREATE TABLE IF NOT EXISTS jobs (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  title         VARCHAR(150) NOT NULL,
  company       VARCHAR(150) NOT NULL,
  country       VARCHAR(80)  NOT NULL,
  location      VARCHAR(120) NOT NULL,
  field         VARCHAR(80),
  salary_min    INT,
  salary_max    INT,
  salary_currency VARCHAR(10) DEFAULT 'USD',
  job_type      ENUM('Full-time','Part-time','Contract','Remote') DEFAULT 'Full-time',
  description   TEXT,
  requirements  TEXT,
  image_url     VARCHAR(255),
  posted_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  is_active     TINYINT(1) DEFAULT 1,
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
  INDEX idx_active (is_active),
  INDEX idx_country (country)
) ENGINE=InnoDB;

-- ============================================
-- APPLICATIONS
-- ============================================
<<<<<<< HEAD
CREATE TABLE applications (
  id                 INT AUTO_INCREMENT PRIMARY KEY,
  job_id             INT NOT NULL,
  user_id            INT,
  full_name          VARCHAR(120) NOT NULL,
  email              VARCHAR(120) NOT NULL,
  phone              VARCHAR(30),
  gender             ENUM('Male','Female','Other'),
  preferred_position VARCHAR(150),
  destination        VARCHAR(80),
  resume_path        VARCHAR(255),
  cover_letter       TEXT,
  status             ENUM('pending','review','shortlisted','rejected','hired') DEFAULT 'pending',
  applied_at         TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (job_id)  REFERENCES jobs(id)  ON DELETE CASCADE,
=======
CREATE TABLE IF NOT EXISTS applications (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  job_id        INT NOT NULL,
  user_id       INT,
  full_name     VARCHAR(120) NOT NULL,
  email         VARCHAR(120) NOT NULL,
  phone         VARCHAR(30),
  preferred_position VARCHAR(150),
  destination   VARCHAR(80),
  resume_path   VARCHAR(255),
  cover_letter  TEXT,
  status        ENUM('pending','review','shortlisted','rejected','hired') DEFAULT 'pending',
  applied_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE,
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_status (status)
) ENGINE=InnoDB;

-- ============================================
<<<<<<< HEAD
-- SEED — Admin User
-- Email: admin@redarrow.com
-- Password: admin123
-- ============================================
INSERT INTO users (full_name, email, password_hash, role) VALUES
('Red Arrow Admin', 'admin@redarrow.com',
 '$2y$10$YourHashWillBeHere', 'admin');

-- ============================================
-- SEED — Sample Jobs
-- ============================================
INSERT INTO jobs (title, company, country, location, field, salary_min, salary_max, salary_currency, experience, description, image_url) VALUES
('Male Nurses',       'Qatar Hospital',   'Qatar', 'Doha',     'Healthcare',            4000,    7000,  'QAR', '1+ year preferred',  'Registered male nurses for Qatar hospital.',       'https://images.unsplash.com/photo-1584515933487-779824d29309?w=800'),
('Female Nurses',     'Qatar Hospital',   'Qatar', 'Doha',     'Healthcare',            4000,    7000,  'QAR', '1+ year preferred',  'Registered female nurses for Qatar hospital.',     'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=800'),
('Domestic Helper',   'UAE Household',    'UAE',   'Dubai',    'Household Services',    1500,    2500,  'AED', '1+ year preferred',  'Domestic helper for UAE household.',               'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800'),
('Assistant Teacher', 'UAE School',       'UAE',   'Abu Dhabi','Education',             3000,    5000,  'AED', '1+ year preferred',  'Assistant teacher for international school.',      'https://images.unsplash.com/photo-1544717297-fa95b6ee9643?w=800'),
('Cleaner',           'UAE Facility',     'UAE',   'Dubai',    'Facility & Maintenance',1200,    2000,  'AED', '6+ months preferred','Cleaner for commercial facility.',                 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800'),
('Waitress & Waiter', 'Japan Restaurant', 'Japan', 'Tokyo',    'Food & Beverage',       200000,  300000,'JPY', '1+ year preferred',  'F&B staff for Japan restaurant.',                  'https://images.unsplash.com/photo-1559339352-11d035aa65de?w=800'),
('Bartender',         'Korea Bar',        'Korea', 'Seoul',    'Food & Beverage',       2000000, 3000000,'KRW','1+ year preferred', 'Bartender for Korea bar.',                         'https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=800');
=======
-- SEED DATA — Default Admin
-- Email: admin@redarrow.com
-- Password: admin123  (PALITAN AGAD PAG LIVE)
-- ============================================
INSERT INTO users (full_name, email, password_hash, role) VALUES
('Red Arrow Admin', 'admin@redarrow.com',
 '$2y$10$e0MYzXyjpJS7Pd0RVvHwHe1HcVqLPBBLKQZaZAjL9WvI3hVJqUJ3e',
 'admin');

-- ============================================
-- SEED DATA — Sample Jobs (base sa React design)
-- ============================================
INSERT INTO jobs (title, company, country, location, field, salary_min, salary_max, salary_currency, description, image_url) VALUES
('Male Nurses',      'Qatar Hospital',  'Qatar',  'Doha',    'Healthcare',           4000,  7000, 'QAR', 'Registered male nurses for Qatar hospital.', 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800'),
('Female Nurses',    'Qatar Hospital',  'Qatar',  'Doha',    'Healthcare',           4000,  7000, 'QAR', 'Registered female nurses for Qatar hospital.', 'https://images.unsplash.com/photo-1762331975804-bce3e0578a8f?w=800'),
('Domestic Helper',  'UAE Household',   'UAE',    'Dubai',   'Household Services',   1500,  2500, 'AED', 'Domestic helper for UAE household.', 'https://images.unsplash.com/flagged/photo-1559717865-a99cac1c95d8?w=800'),
('Assistant Teacher','UAE School',      'UAE',    'Abu Dhabi','Education',           3000,  5000, 'AED', 'Assistant teacher for international school.', 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800'),
('Cleaner',          'UAE Facility',    'UAE',    'Dubai',   'Facility & Maintenance',1200, 2000, 'AED', 'Cleaner for commercial facility.', 'https://images.unsplash.com/photo-1773184283673-db37ee1e21ed?w=800'),
('Waitress & Waiter','Japan Restaurant', 'Japan', 'Tokyo',   'Food & Beverage',      200000,300000,'JPY', 'F&B staff for Japan restaurant.', 'https://images.unsplash.com/photo-1513407030348-c983a97b98d8?w=800'),
('Bartender',        'Korea Bar',       'Korea',  'Seoul',   'Food & Beverage',      2000000,3000000,'KRW','Bartender for Korea bar.', 'https://images.unsplash.com/photo-1773184283673-db37ee1e21ed?w=800');
>>>>>>> 0153079aee2abcae3f3cab1b2568e2ed1410652a
