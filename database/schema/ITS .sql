CREATE TABLE `subjects` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `discription` varchar(255),
  `create_at` datetime,
  `update_at` datetime,
  `delate_at` datetime
);

CREATE TABLE `admins` (
  `id` integer PRIMARY KEY,
  `first_name` string(90),
  `last_name` string(90),
  `sure_name` string(90),
  `jender` ENUM ('Ayol', 'Erkak'),
  `username` varchar(40),
  `password` varchar(120),
  `role` ENUM ('Meneger', 'Teacher', 'Student'),
  `telephone` varchar(40),
  `uuid` varchar(120)
);

CREATE TABLE `users` (
  `id` integer PRIMARY KEY,
  `first_name` string(90),
  `last_name` string(90),
  `sure_name` string(90),
  `jender` ENUM ('Ayol', 'Erkak'),
  `username` varchar(40),
  `password` varchar(120),
  `role` ENUM ('Meneger', 'Teacher', 'Student'),
  `telephone` varchar(40)
);

CREATE TABLE `students` (
  `id` integer PRIMARY KEY,
  `first_name` string(90),
  `last_name` string(90),
  `sure_name` string(90),
  `jender` ENUM ('Ayol', 'Erkak'),
  `username` varchar(40),
  `password` varchar(120),
  `role` ENUM ('Meneger', 'Teacher', 'Student') DEFAULT 'student',
  `telephone` varchar(40),
  `pasport_code` varchar(60),
  `date_birth` datetime,
  `address` varchar(255),
  `uuid` varchar(120)
);

CREATE TABLE `teachers` (
  `id` integer PRIMARY KEY,
  `first_name` string(90),
  `last_name` string(90),
  `sure_name` string(90),
  `jender` ENUM ('Ayol', 'Erkak'),
  `username` varchar(40),
  `password` varchar(120),
  `role` ENUM ('Meneger', 'Teacher', 'Student') DEFAULT 'teacher',
  `telephone` varchar(40),
  `pasport_code` varchar(60),
  `date_birth` datetime,
  `address` varchar(255),
  `uuid` varchar(120)
);

CREATE TABLE `teacher_subjects` (
  `id` integer PRIMARY KEY,
  `teacher_id` integer,
  `subject_id` integer
);

CREATE TABLE `groups` (
  `id` integer PRIMARY KEY,
  `name` varchar(40),
  `teacher_id` integer,
  `discription` varchar(255),
  `uuid` varchar(120),
  `status` ENUM ('active', 'complite', 'no_startup')
);

CREATE TABLE `group_students` (
  `id` integer PRIMARY KEY,
  `group_id` integer,
  `student_id` integer,
  `start_at` date COMMENT 'Cursni boshlagan kuni yoziladi',
  `finish_at` date COMMENT 'Cursni tugatgan sanasi',
  `status` ENUM ('active', 'complite', 'left', 'unsuitable')
);

CREATE TABLE `group_days` (
  `id` integer PRIMARY KEY,
  `group_id` integer,
  `theme` varchar(255) COMMENT 'Otish karak bolgan daris yoziladi',
  `day` date
);

CREATE TABLE `group_day_students` (
  `id` integer PRIMARY KEY,
  `student_id` integer,
  `group_day_id` integer
);

ALTER TABLE `teacher_subjects` ADD FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

ALTER TABLE `teacher_subjects` ADD FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

ALTER TABLE `groups` ADD FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

CREATE TABLE `groups_group_students` (
  `groups_id` integer,
  `group_students_group_id` integer,
  PRIMARY KEY (`groups_id`, `group_students_group_id`)
);

ALTER TABLE `groups_group_students` ADD FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`);

ALTER TABLE `groups_group_students` ADD FOREIGN KEY (`group_students_group_id`) REFERENCES `group_students` (`group_id`);


CREATE TABLE `students_group_students` (
  `students_id` integer,
  `group_students_student_id` integer,
  PRIMARY KEY (`students_id`, `group_students_student_id`)
);

ALTER TABLE `students_group_students` ADD FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

ALTER TABLE `students_group_students` ADD FOREIGN KEY (`group_students_student_id`) REFERENCES `group_students` (`student_id`);


CREATE TABLE `groups_group_days` (
  `groups_id` integer,
  `group_days_group_id` integer,
  PRIMARY KEY (`groups_id`, `group_days_group_id`)
);

ALTER TABLE `groups_group_days` ADD FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`);

ALTER TABLE `groups_group_days` ADD FOREIGN KEY (`group_days_group_id`) REFERENCES `group_days` (`group_id`);


CREATE TABLE `students_group_day_students` (
  `students_id` integer,
  `group_day_students_student_id` integer,
  PRIMARY KEY (`students_id`, `group_day_students_student_id`)
);

ALTER TABLE `students_group_day_students` ADD FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

ALTER TABLE `students_group_day_students` ADD FOREIGN KEY (`group_day_students_student_id`) REFERENCES `group_day_students` (`student_id`);


CREATE TABLE `group_days_group_day_students` (
  `group_days_id` integer,
  `group_day_students_group_day_id` integer,
  PRIMARY KEY (`group_days_id`, `group_day_students_group_day_id`)
);

ALTER TABLE `group_days_group_day_students` ADD FOREIGN KEY (`group_days_id`) REFERENCES `group_days` (`id`);

ALTER TABLE `group_days_group_day_students` ADD FOREIGN KEY (`group_day_students_group_day_id`) REFERENCES `group_day_students` (`group_day_id`);

