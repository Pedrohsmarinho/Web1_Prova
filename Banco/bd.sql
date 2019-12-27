drop database if exists web20191series;
create database if not exists web20191series;

use web20191series;

-- UP
create table users (
    id          int primary key auto_increment,
    name        varchar(255),
    email       varchar(255),
    password    varchar(255)
);

create table series (
    id       int primary key auto_increment,
    name     varchar(255),
    genre    varchar(255),
    seasons  int,
    synopsis text
);

create table users_series (
    user_id         int,
    serie_id        int,
    current_season  boolean,
    current_episode int,
    completed       boolean,
    primary key (user_id, serie_id),
    foreign key (user_id) references users(id),
    foreign key (serie_id) references series(id)
);

-- ENDUP

create user if not exists web20191 identified by 'web20191';
grant all privileges on web20191series.* to web20191;

-- SEED
insert into users (name, email, password) values
    ('Tony Stark', 'tony@stark.co', 'pepper'),
    ('Bruce Banner', 'bruce@avengers.com', 'natasha'),
    ('Bruce Wayne', 'bruce@wayne.tech', 'alfred');

insert into series (name, genre, seasons, synopsis) values
    ('The Big Bang Theory', 'Comedy', 12, '...'),
    ('Supernatural', 'Terror', 14, '...'),
    ('Breaking Bad', 'Drama', 5, '...'),
    ('La Casa de Papel', 'Police',  2, '...');

insert into users_series (user_id, serie_id, current_season, current_episode) values
    (1, 1, 1, 1),
    (1, 2, 2, 4),
    (1, 3, 1, 8),
    (2, 2, 10, 2),
    (2, 3, 8, 3),
    (3, 3, 1, 2);