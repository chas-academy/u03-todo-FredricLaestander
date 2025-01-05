CREATE TABLE Tasks (
  id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  completed BOOLEAN DEFAULT 0 NOT NULL,
  important BOOLEAN DEFAULT 0 NOT NULL,
  deadline DATETIME,
  location VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);