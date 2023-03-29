-- Matthew Riddell
-- SD1c D00245674
-- NASA Database for ServerSide CA2

USE D00245674;
DROP TABLE IF EXISTS missions, programs;

-- Creating Tables
-- Programs Table
CREATE TABLE programs ( program_name CHAR(20) NOT NULL,
program_start_date DATE,
program_end_date DATE,
program_status VARCHAR(30),
image VARCHAR(200),
PRIMARY KEY (program_name));

-- Missions Table
CREATE TABLE missions ( mission_id CHAR(20) NOT NULL,
  program_name CHAR(20),
  mission_name VARCHAR(30),
  mission_type VARCHAR(50),
  mission_crew INT,
  mission_status VARCHAR(30),
  image VARCHAR(200),
  description VARCHAR(500),
  PRIMARY KEY (mission_id),
  FOREIGN KEY (program_name) REFERENCES programs(program_name)
);

-- Inserting Table Data
-- Programs Table
INSERT INTO
		programs (program_name, program_start_date, program_end_date, program_status, image)
VALUES
		('Mercury', '1958-10-07', '1963-05-15', 'COMPLETE', 'images/mercury.png'),
		('Gemini', '1964-04-08', '1966-11-11', 'COMPLETE', 'images/gemini.png'),
		('Apollo', '1961-10-27', '1972-12-19', 'COMPLETE', 'images/apollo.png'),
		('Skylab', '1973-05-04', '1979-07-11', 'DEORBITED', 'images/skylab.png'),
		('Voyager', '1977-08-20', NULL, 'ONGOING', 'images/voyager.png'),
		('Mariner', '1962-07-22', '1975-03-24', 'COMPLETE', 'images/mariner10.png'),
		('Pioneer', '1958-08-17', '1978-08-08', 'COMPLETE', 'images/pioneer11.png'),
		('Viking', '1975-08-20', '1975-09-09', 'COMPLETE', 'images/viking.png'),
		('Space Shuttle', '1977-08-12', '2011-07-21', 'RETIRED', 'images/shuttle.png'),
		('Vanguard', '1957-12-06', '1959-09-18', 'COMPLETE', 'images/vanguard.png');
		
-- Missions Table
INSERT INTO
		missions (mission_id, program_name, mission_name, mission_type, mission_crew, mission_status, image, description)
VALUES
		('1', 'Mercury', 'Mercury-Atlas 6', 'Test flight', 1, 'COMPLETE', 'images/mercury.png', 'Mercury-Atlas 6 was the first manned orbital flight of the Mercury program, launched by NASA in 1962. Astronaut John Glenn orbited the Earth three times in the Friendship 7 spacecraft, becoming the first American to do so.'),
		('2', 'Mercury', 'Mercury-Atlas 7', 'Test flight', 1, 'COMPLETE', 'images/mercury.png', 'Mercury-Atlas 7 was the second manned orbital flight of the Mercury program, launched by NASA in 1962. Astronaut Scott Carpenter orbited the Earth three times in the Aurora 7 spacecraft.'),
		('3', 'Gemini', 'Gemini 6A', 'Orbital Rendezvous', 2, 'COMPLETE', 'images/gemini.png', 'Gemini 6A was a 1965 manned spaceflight in NASA''s Gemini program. It was the fifth manned Gemini flight, and the 13th manned American flight. The crew, Wally Schirra and Tom Stafford, rendezvoused with the previously launched unmanned Gemini 7 target vehicle.'),
		('4', 'Gemini', 'Gemini 8', 'Docking test', 2, 'COMPLETE', 'images/gemini.png', 'Gemini 8 was a 1966 manned spaceflight in NASA''s Gemini program. It was the sixth manned Gemini flight, and the 16th manned American flight. The crew, Neil Armstrong and David Scott, achieved the first docking of two spacecraft in orbit, but the mission was cut short due to a malfunction.'),
		('5', 'Apollo', 'Apollo 4', 'Uncrewed Earth orbital CSM flight', 0, 'COMPLETE', 'images/apollo.png', 'Apollo 4 was the first unmanned test flight of the Saturn V launch vehicle and the Apollo Command and Service Module, launched by NASA in 1967. The mission was a complete success, paving the way for the first manned Apollo flight.'),
		('6', 'Apollo', 'Apollo 5', 'Uncrewed Earth orbital LM flight', 0, 'COMPLETE', 'images/apollo.png', 'Apollo 5 was an unmanned test of the Lunar Module conducted by NASA in 1968. The mission tested the descent and ascent stages of the spacecraft, as well as the propulsion systems and rendezvous radar.'),
		('7', 'Apollo', 'Apollo 6', 'Uncrewed Earth orbital CSM flight', 0, 'COMPLETE', 'images/apollo.png', 'Apollo 6 was an unmanned test of the Saturn V launch vehicle and the Apollo Command and Service Module, conducted by NASA in 1968. The mission encountered several technical issues but was still considered a success.'),
		('8', 'Apollo', 'Apollo 7', 'Crewed Earth orbital CSM flight', 3, 'COMPLETE', 'images/apollo7.png', 'Apollo 7 was the first manned mission in the Apollo program, launched by NASA in 1968. The crew, Wally Schirra, Donn Eisele, and Walter Cunningham, orbited the Earth for 11 days aboard the Command and Service Module.'),
		('9', 'Apollo', 'Apollo 8', 'Crewed lunar orbital CSM flight', 3, 'COMPLETE', 'images/apollo8.png', 'Apollo 8 was the first crewed spacecraft to leave low Earth orbit, reach the Moon, orbit it, and return safely to Earth.'),
		('10', 'Apollo', 'Apollo 9', 'Crewed Earth orbital CSM/LM flight', 3, 'COMPLETE', 'images/apollo9.png', 'Apollo 9 was the first crewed flight of the Lunar Module, which was tested in Earth orbit for the first time.'),
		('11', 'Apollo', 'Apollo 10', 'Crewed Earth orbital CSM/LM flight', 3, 'COMPLETE', 'images/apollo10.png', 'Apollo 10 was a dress rehearsal for the first Moon landing, with the crew testing the Lunar Module in lunar orbit and descending to within 9 miles of the lunar surface before returning to the Command Module and returning to Earth.'),
		('12', 'Apollo', 'Apollo 11', 'Crewed lunar landing', 3, 'COMPLETE', 'images/apollo11.png', 'Apollo 11 was the first crewed mission to land on the Moon. Astronauts Neil Armstrong and Edwin "Buzz" Aldrin became the first humans to walk on the Moon, while Michael Collins orbited above in the Command Module.'),
		('13', 'Skylab', 'Skylab', 'Manned Space Station', 3, 'DEORBITED', 'images/skylab.png', 'Skylab was the first United States space station, and orbited the Earth from 1973 to 1979. It was visited by three crews during its operational lifetime.'),
		('14', 'Mariner', 'Mariner 10', 'Planetary exploration', 0, 'DECOMMISSIONED', 'images/mariner10.png', 'Mariner 10 was a robotic space probe that performed the first flyby of the planet Mercury in 1974. It was the first spacecraft to visit two planets in a single mission, having previously flown by Venus.'),
		('15', 'Voyager', 'Voyager 1', 'Outer planetary exploration', 0, 'ONGOING', 'images/voyager.png', 'Voyager 1 is a space probe launched by NASA in 1977 to study the outer Solar System. It is currently the most distant man-made object from Earth, having entered interstellar space in 2012.'),
		('16', 'Voyager', 'Voyager 2', 'Outer planetary exploration', 0, 'ONGOING', 'images/voyager.png', 'Voyager 2 is a space probe launched by NASA in 1977 to study the outer Solar System. It is the only spacecraft to have visited Uranus and Neptune, and is currently in the outer reaches of the Solar System.'),
		('17', 'Pioneer', 'Pioneer 11', 'Planetary exploration', 0, 'COMPLETE', 'images/pioneer11.png', 'Pioneer 11 was a space probe launched in 1973 to study the outer Solar System, and was the first spacecraft to flyby Jupiter. It continued to send data back to Earth until 1995.'),
		('18', 'Viking', 'Viking 1', 'Martian planetary exploration', 0, 'COMPLETE', 'images/viking.png', 'Viking 1 was a NASA mission to Mars, which consisted of an orbiter and a lander. The orbiter was designed to photograph the surface of Mars from orbit, while the lander was designed to study the planet’s soil and atmosphere. The Viking 1 lander successfully touched down on the Martian surface on July 20, 1976, becoming the first spacecraft to successfully land on Mars. The mission operated until November 1982, and it was considered a major success in the exploration of Mars.'),
		('19', 'Viking', 'Viking 2', 'Martian planetary exploration', 0,	'COMPLETE', 'images/viking.png', 'Viking 2 was the second NASA mission to Mars, consisting of an orbiter and a lander. The Viking 2 lander touched down on the Martian surface on September 3, 1976, and operated until April 1980. The orbiter continued to operate until July 1978, when its mission was terminated due to a malfunction. The Viking 2 mission was considered a success and provided important data about the Martian environment and geology, paving the way for future missions to Mars.')
		
