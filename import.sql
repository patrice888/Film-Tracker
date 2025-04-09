DROP DATABASE IF EXISTS film_tracker;

CREATE DATABASE IF NOT EXISTS film_tracker;
USE film_tracker;

CREATE TABLE IF NOT EXISTS films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(255) NOT NULL,
    beschrijving TEXT,
    releasejaar YEAR,
    director VARCHAR(500),
    poster_url VARCHAR(500),
    rating DECIMAL(3,1),
    youtube_trailer_id VARCHAR(500)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL
);

INSERT INTO films (titel, beschrijving, releasejaar, director, poster_url, rating, youtube_trailer_id) VALUES
('Oppenheimer', 'Een film over de atoombom.', 2023, 'Christopher Nolan', 'https://a.ltrbxd.com/resized/film-poster/7/8/4/3/2/8/784328-oppenheimer-0-1000-0-1500-crop.jpg?v=e3c6e7a32c', '8.3', 'bK6ldnjE3Y0'),
('Dune: Part Two', 'Epische sci-fi film over de strijd op de planeet Arrakis.', 2024, 'Denis Villeneuve', 'https://a.ltrbxd.com/resized/film-poster/6/1/7/4/4/3/617443-dune-part-two-0-1000-0-1500-crop.jpg?v=cc533700f8', '8.5', 'n9xhJrPXop4'),
('1917', 'Twee Britse soldaten moeten een boodschap afleveren om een aanval te stoppen tijdens de Eerste Wereldoorlog.', 2019, 'Sam Mendes', 'https://a.ltrbxd.com/resized/film-poster/4/6/0/1/5/5/460155-1917-0-1000-0-1500-crop.jpg?v=9eb1d95df5', '8.2', 'YqNYrYUiMfg'),
('La La Land', 'Een jazzmuzikant en een actrice vallen voor elkaar in Los Angeles, terwijl ze hun dromen najagen.', 2016, 'Damien Chazelle', 'https://a.ltrbxd.com/resized/film-poster/2/4/0/3/4/4/240344-la-la-land-0-1000-0-1500-crop.jpg?v=053670ff84', '8.0', '0pdqf4P9MB8'),
('Mickey 17', 'Een mysterieuze film met Robert Pattinson en Mark Ruffalo, geregisseerd door Bong Joon-ho.', 2025, 'Bong Joon-ho', 'https://a.ltrbxd.com/resized/film-poster/6/2/0/2/8/1/620281-mickey-17-0-1000-0-1500-crop.jpg?v=93e4d2af6d', '7.0', 'tA1s65o_kYM'),
('Whiplash', 'Een jonge drummer streeft naar perfectie onder leiding van een meedogenloze muziekdocent.', 2014, 'Damien Chazelle', 'https://a.ltrbxd.com/resized/sm/upload/cl/dn/kr/f1/4C9LHDxMsoYI0S3iMPZdm3Oevwo-0-1000-0-1500-crop.jpg?v=d13ea36528', '8.5', '7d_jQycdQGo'),
('Spider-Man: Across the Spider-Verse', 'Miles Morales reist door verschillende universums en ontmoet verschillende versies van Spider-Man.', 2023, 'Joaquim Dos Santos, Kemp Powers, Justin K. Thompson', 'https://a.ltrbxd.com/resized/film-poster/4/9/7/6/3/1/497631-spider-man-across-the-spider-verse-0-1000-0-1500-crop.jpg?v=f2acbf1b8a', '7.7', 'cqGjhVJWtEg'),
('Transformers One', 'Een animatiefilm die de oorsprong van de Autobots en Decepticons vertelt.', 2024, 'Josh Cooley', 'https://a.ltrbxd.com/resized/film-poster/6/2/2/4/1/3/622413-transformers-one-0-1000-0-1500-crop.jpg?v=b86bf0cdb6', '8.3', '0rmJXXKDrsM'),
('The Shawshank Redemption', 'Een onschuldig veroordeelde man vindt hoop en vriendschap in een gevangenis.', 1994, 'Frank Darabont', 'https://a.ltrbxd.com/resized/sm/upload/7l/hn/46/uz/zGINvGjdlO6TJRu9wESQvWlOKVT-0-1000-0-1500-crop.jpg?v=8736d1c395','9.3', 'PLl99DlL6b4'),
('The Dark Knight', 'Batman neemt het op tegen de Joker in een strijd om Gotham City te redden.', 2008, 'Christopher Nolan', 'https://a.ltrbxd.com/resized/sm/upload/78/y5/zg/ej/oefdD26aey8GPdx7Rm45PNncJdU-0-1000-0-1500-crop.jpg?v=2d0ce4be25','9.2' , 'EXeTwQWrcwY'),
('Inception', 'Een dief die dromen infiltreert krijgt de opdracht om een idee in iemands geest te planten.', 2010, 'Christopher Nolan', 'https://a.ltrbxd.com/resized/sm/upload/sv/95/s9/4j/inception-0-1000-0-1500-crop.jpg?v=30d7224316', '8.8', '8hP9D6kZseM'),
('Fight Club', 'Een man die lijdt aan slapeloosheid begint een underground vechtclub.', 1999, 'David Fincher', 'https://a.ltrbxd.com/resized/film-poster/5/1/5/6/8/51568-fight-club-0-1000-0-1500-crop.jpg?v=768b32dfa4', '8.5', 'BdJKm16Co6M'),
('The Matrix', 'Een hacker ontdekt dat de realiteit die hij kent een simulatie is en sluit zich aan bij een opstand.', 1999, 'Lana Wachowski, Lilly Wachowski', 'https://a.ltrbxd.com/resized/film-poster/5/1/5/1/8/51518-the-matrix-0-1000-0-1500-crop.jpg?v=fc7c366afe', '8.7' , 'vKQi3bBA1y8'),
('Forrest Gump', 'Het levensverhaal van een man met een laag IQ die per ongeluk invloed heeft op belangrijke historische gebeurtenissen.', 1994, 'Robert Zemeckis', 'https://a.ltrbxd.com/resized/film-poster/2/7/0/4/2704-forrest-gump-0-1000-0-1500-crop.jpg?v=173bc04cf0', '8.8', 'bLvqoHBptjg'),
('The Godfather', 'Het verhaal van de machtige maffiafamilie Corleone en hun patriarch Don Vito Corleone.', 1972, 'Francis Ford Coppola', 'https://a.ltrbxd.com/resized/film-poster/5/1/8/1/8/51818-the-godfather-0-1000-0-1500-crop.jpg?v=bca8b67402', '9.2', 'UaVTIH8mujA'),
('Pulp Fiction', 'Een serie met elkaar verweven misdaadzaken die zich afspelen in Los Angeles.', 1994, 'Quentin Tarantino', 'https://a.ltrbxd.com/resized/film-poster/5/1/4/4/4/51444-pulp-fiction-0-1000-0-1500-crop.jpg?v=dee19a8077', '8.9', 's7EdQ4FqbhY');

INSERT INTO users (naam, email, wachtwoord) VALUES
('admin', 'admin@example.com', '123');