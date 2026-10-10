-- ============================================
-- RedArrow Database Schema (Phase 2)
-- ============================================

DROP DATABASE IF EXISTS redarrow_db;
CREATE DATABASE redarrow_db
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE redarrow_db;

-- ============================================
-- USERS (applicants + admins)
-- ============================================
CREATE TABLE users (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  full_name     VARCHAR(120) NOT NULL,
  email         VARCHAR(120) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  phone         VARCHAR(30),
  gender        ENUM('Male','Female','Other'),
  role          ENUM('applicant','admin') DEFAULT 'applicant',
  created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_email (email)
) ENGINE=InnoDB;

-- ============================================
-- JOBS
-- ============================================
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
  INDEX idx_active (is_active),
  INDEX idx_country (country)
) ENGINE=InnoDB;

-- ============================================
-- APPLICATIONS
-- ============================================
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
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
  INDEX idx_status (status)
) ENGINE=InnoDB;

-- ============================================
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