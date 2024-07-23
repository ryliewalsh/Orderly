-- Table for storing households
CREATE TABLE households (
                            household_id INT AUTO_INCREMENT PRIMARY KEY,
                            household_name VARCHAR(100) NOT NULL,
                            house_key VARCHAR(100) NOT NULL
);

-- Table for storing users
CREATE TABLE users (
                       user_id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       username VARCHAR(50) NOT NULL UNIQUE,
                       password_hash VARCHAR(100) NOT NULL,
                       household_id INT  NULL,

                       first_name VARCHAR(100) NOT NULL,
                       last_name VARCHAR(100) NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (household_id) REFERENCES households(household_id)
);

-- Table for storing chores/ Do page items
CREATE TABLE chores (
                        chore_id INT AUTO_INCREMENT PRIMARY KEY,
                        user_id INT,
                        description TEXT NOT NULL,
                        due_date DATE NOT NULL,
                        is_recurring BOOLEAN NOT NULL,
                        is_done BOOLEAN NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Table for linking users to chores
CREATE TABLE user_chores (
                             user_chore_id INT AUTO_INCREMENT PRIMARY KEY,
                             user_id INT NOT NULL,
                             chore_id INT NOT NULL,
                             created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                             FOREIGN KEY (user_id) REFERENCES users(user_id),
                             FOREIGN KEY (chore_id) REFERENCES chores(chore_id)
);

-- Table for storing bills/ Pay page items
CREATE TABLE bills (
                       bill_id INT AUTO_INCREMENT PRIMARY KEY,
                       user_id INT NOT NULL,
                       description TEXT NOT NULL,
                       amount DECIMAL(10,2) NOT NULL,
                       due_date DATE NOT NULL,
                       is_recurring BOOLEAN NOT NULL,
                       is_paid BOOLEAN NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Table for linking users to bills
CREATE TABLE user_bills (
                            user_bill_id INT AUTO_INCREMENT PRIMARY KEY,
                            user_id INT NOT NULL,
                            bill_id INT NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            FOREIGN KEY (user_id) REFERENCES users(user_id),
                            FOREIGN KEY (bill_id) REFERENCES bills(bill_id)
);

-- Table for storing events/ Plan page items
CREATE TABLE events (
                        user_id INT NOT NULL,
                        event_id INT AUTO_INCREMENT PRIMARY KEY,
                        event_date DATE NOT NULL,
                        event_name VARCHAR(100) NOT NULL,
                        event_description TEXT,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for storing event responses
CREATE TABLE event_responses (
                                 response_id INT AUTO_INCREMENT PRIMARY KEY,
                                 event_id INT NOT NULL,
                                 user_id INT NOT NULL,
                                 response VARCHAR(10) NOT NULL, -- Changed ENUM to VARCHAR
                                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                 FOREIGN KEY (event_id) REFERENCES events(event_id),
                                 FOREIGN KEY (user_id) REFERENCES users(user_id)
);
