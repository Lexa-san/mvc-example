DROP DATABASE IF EXISTS asolovev_kplus;
CREATE DATABASE IF NOT EXISTS asolovev_kplus
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE `asolovev_kplus` ;

-- chess_grid
-- DROP TABLE IF EXISTS `chess_grid`;
CREATE TABLE IF NOT EXISTS `chess_grid` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` CHAR(2) NOT NULL,
  `horizontal` TINYINT(1) UNSIGNED NOT NULL,
  `vertical` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_UNIQUE` ON `chess_grid` (`name` ASC);

-- chess_figure
-- DROP TABLE IF EXISTS `chess_figure`;
CREATE TABLE IF NOT EXISTS `chess_figure` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `name_UNIQUE` ON `chess_figure` (`name` ASC);

-- chess_position
-- DROP TABLE IF EXISTS `chess_position`;
CREATE TABLE IF NOT EXISTS `chess_position` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- chess_position_plan
-- DROP TABLE IF EXISTS `chess_position_plan`;
CREATE TABLE IF NOT EXISTS `chess_position_plan` (
  `position_id` INT UNSIGNED NOT NULL,
  `grid_id` INT UNSIGNED NOT NULL,
  `figure_id` INT UNSIGNED NOT NULL,
  `color` CHAR(1) NOT NULL,
  PRIMARY KEY (`position_id`, `grid_id`, `figure_id`),
  CONSTRAINT `fk_chess_position_plan_chess_position`
    FOREIGN KEY (`position_id`) REFERENCES `chess_position` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_chess_position_plan_chess_grid1`
    FOREIGN KEY (`grid_id`) REFERENCES `chess_grid` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_chess_position_plan_chess_figure1`
    FOREIGN KEY (`figure_id`) REFERENCES `chess_figure` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT)
ENGINE = InnoDB;

CREATE TABLE asolovev_kplus.chess_figure
(
  id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name char(1) NOT NULL
);
CREATE UNIQUE INDEX name_UNIQUE ON asolovev_kplus.chess_figure (name);


-- TRUNCATE chess_figure;
INSERT INTO chess_figure (name)
VALUES (1, 'K'), (2, 'Q'), (3, 'R'), (4, 'N'), (5, 'B'), (6, 'p');

-- TRUNCATE chess_position;
INSERT INTO chess_position (name)
    VALUES ('Empty Grid'), ('Initial');

-- TRUNCATE chess_grid;
INSERT INTO chess_grid (name, horizontal, vertical)
    VALUES
      ('a8', 1, 8), ('b8', 2, 8), ('c8', 3, 8), ('d8', 4, 8), ('e8', 5, 8), ('f8', 6, 8), ('g8', 7, 8),  ('h8', 8, 8),
      ('a7', 1, 7), ('b7', 2, 7), ('c7', 3, 7), ('d7', 4, 7), ('e7', 5, 7), ('f7', 6, 7), ('g7', 7, 7),  ('h7', 8, 7),
      ('a6', 1, 6), ('b6', 2, 6), ('c6', 3, 6), ('d6', 4, 6), ('e6', 5, 6), ('f6', 6, 6), ('g6', 7, 6),  ('h6', 8, 6),
      ('a5', 1, 5), ('b5', 2, 5), ('c5', 3, 5), ('d5', 4, 5), ('e5', 5, 5), ('f5', 6, 5), ('g5', 7, 5),  ('h5', 8, 5),
      ('a4', 1, 4), ('b4', 2, 4), ('c4', 3, 4), ('d4', 4, 4), ('e4', 5, 4), ('f4', 6, 4), ('g4', 7, 4),  ('h4', 8, 4),
      ('a3', 1, 3), ('b3', 2, 3), ('c3', 3, 3), ('d3', 4, 3), ('e3', 5, 3), ('f3', 6, 3), ('g3', 7, 3),  ('h3', 8, 3),
      ('a2', 1, 2), ('b2', 2, 2), ('c2', 3, 2), ('d2', 4, 2), ('e2', 5, 2), ('f2', 6, 2), ('g2', 7, 2),  ('h2', 8, 2),
      ('a1', 1, 1), ('b1', 2, 1), ('c1', 3, 1), ('d1', 4, 1), ('e1', 5, 1), ('f1', 6, 1), ('g1', 7, 1),  ('h1', 8, 1)
;

INSERT INTO chess_position_plan (position_id, grid_id, figure_id, color)
    VALUES
      (2, 1, 3, 'b'),  (2, 2, 4, 'b'),  (2, 3, 5, 'b'),  (2, 4, 2, 'b'),  (2, 5, 1, 'b'),  (2, 6, 5, 'b'),  (2, 7, 4, 'b'),  (2, 8, 3, 'b'),
      (2, 9, 6, 'b'),  (2, 10, 6, 'b'), (2, 11, 6, 'b'), (2, 12, 6, 'b'), (2, 13, 6, 'b'), (2, 14, 6, 'b'), (2, 15, 6, 'b'), (2, 16, 6, 'b'),
      (2, 49, 6, 'w'), (2, 50, 6, 'w'), (2, 51, 6, 'w'), (2, 52, 6, 'w'), (2, 53, 6, 'w'), (2, 54, 6, 'w'), (2, 55, 6, 'w'), (2, 56, 6, 'w'),
      (2, 57, 3, 'w'), (2, 58, 4, 'w'), (2, 59, 5, 'w'), (2, 60, 2, 'w'), (2, 61, 1, 'w'), (2, 62, 5, 'w'), (2, 63, 4, 'w'), (2, 64, 3, 'w')
;


-- COMMIT ;

-- SELECT * from chess_figure;
-- SELECT * from chess_position;
-- SELECT * FROM chess_grid;
-- SELECT * FROM chess_position_plan;