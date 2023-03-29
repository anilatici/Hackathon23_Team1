drop database QuizzApp;

CREATE DATABASE IF NOT EXISTS QuizzApp;

USE QuizzApp;


CREATE TABLE questions (
                           question_id INT PRIMARY KEY AUTO_INCREMENT,
                           question_text TEXT NOT NULL
);

CREATE TABLE answers (
                         answer_id INT PRIMARY KEY AUTO_INCREMENT,
                         question_id INT NOT NULL,
                         answer_text TEXT NOT NULL,
                         is_correct BOOLEAN NOT NULL,
                         FOREIGN KEY (question_id) REFERENCES questions(question_id)
);

CREATE TABLE scores (
                        score_id INT PRIMARY KEY AUTO_INCREMENT,
                        quiz_taker_name TEXT NOT NULL,
                        quiz_taker_email TEXT NOT NULL,
                        quiz_taker_score INT NOT NULL,
                        quiz_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
                        userid int(10) PRIMARY KEY NOT NULL,
                        name varchar(255) NOT NULL,
                        email varchar(255) NOT NULL,
                        password varchar(255) NOT NULL
);


INSERT INTO questions (question_id, question_text)
VALUES
    (1, 'What is the capital of France?'),
    (2, 'What is the tallest mountain in the world??'),
    (3, 'What is the largest country in the world by area"?'),
    (4, 'What is the smallest planet in our solar system?'),
    (5, 'Who wrote the book "1984?');



INSERT INTO answers (answer_id, question_id, answer_text, is_correct) VALUES
                                                               (1, 1, 'Paris', 1),
                                                               (2, 1, 'Berlin', 0),
                                                               (3, 1, 'London', 0),
                                                               (4, 1, 'Madrid', 0),
                                                               (5, 2, 'Mount Everest', 1),
                                                               (6, 2, 'K2', 0),
                                                               (7, 2, 'Makalu', 0),
                                                               (8, 2, 'Cho Oyu', 0),
                                                               (9, 3, 'Russia', 1),
                                                               (10, 3, 'Canada', 0),
                                                               (11, 3, 'USA', 0),
                                                               (12, 3, 'China', 0),
                                                               (13, 4, 'Mercury', 1),
                                                               (14, 4, 'Venus', 0),
                                                               (15, 4, 'Mars', 0),
                                                               (16, 4, 'Jupiter', 0),
                                                               (17, 5, 'George Orwell', 1),
                                                               (18, 5, 'Aldous Huxley', 0),
                                                               (19, 5, 'Ray Bradbury', 0),
                                                               (20, 5, 'Margaret Atwood', 0);



INSERT INTO scores (score_id, quiz_taker_name, quiz_taker_email, quiz_taker_score) VALUES
                                                                                       (1, 'John Smith', 'johnsmith@example.com', 3),
                                                                                       (2, 'Jane Doe', 'janedoe@example.com', 4),
                                                                                       (3, 'Bob Johnson', 'bobjohnson@example.com', 2),
                                                                                       (4, 'Sarah Williams', 'sarahwilliams@example.com', 5),
                                                                                       (5, 'David Lee', 'davidlee@example.com', 1);