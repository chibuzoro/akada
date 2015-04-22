/*
Navicat PGSQL Data Transfer

Source Server         : PostgreSQL DB
Source Server Version : 90401
Source Host           : localhost:5432
Source Database       : akada
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90401
File Encoding         : 65001

Date: 2015-04-22 01:10:17
*/


-- ----------------------------
-- Table structure for billing
-- ----------------------------
DROP TABLE IF EXISTS "billing";
CREATE TABLE "billing" (
"id" int4 NOT NULL,
"user_id" int4 NOT NULL,
"address" varchar(255) COLLATE "default" NOT NULL,
"phone_no" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of billing
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS "comments";
CREATE TABLE "comments" (
"id" int4 NOT NULL,
"comment" varchar(255) COLLATE "default" NOT NULL,
"subject_id" int4 NOT NULL,
"comment_title" varchar(255) COLLATE "default" NOT NULL,
"comment_post_date" date NOT NULL,
"comment_trail_id" int4,
"user_id" int4 NOT NULL,
"comment_status" varchar(64) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of comments
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS "course";
CREATE TABLE "course" (
"id" int4 NOT NULL,
"course_title" varchar(255) COLLATE "default" NOT NULL,
"sub_category_id" int4 NOT NULL,
"create_date" date NOT NULL,
"update_date" date NOT NULL,
"course_summary" varchar(255) COLLATE "default" NOT NULL,
"price" numeric(10,2) NOT NULL,
"created_by" int4 NOT NULL,
"is_publish" int4 NOT NULL,
"course_objectives" varchar(255) COLLATE "default" NOT NULL,
"course_preview" varchar(255) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of course
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for course_category
-- ----------------------------
DROP TABLE IF EXISTS "course_category";
CREATE TABLE "course_category" (
"id" int4 NOT NULL,
"description" varchar(128) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of course_category
-- ----------------------------
BEGIN;
INSERT INTO "course_category" VALUES ('1', 'Oil & Gas');
INSERT INTO "course_category" VALUES ('2', 'Accounting & Finance');
INSERT INTO "course_category" VALUES ('3', 'Information Technology');
INSERT INTO "course_category" VALUES ('4', 'Health, Safety & Environment (HSE)');
COMMIT;

-- ----------------------------
-- Table structure for course_sub_category
-- ----------------------------
DROP TABLE IF EXISTS "course_sub_category";
CREATE TABLE "course_sub_category" (
"id" int4 NOT NULL,
"description" varchar(255) COLLATE "default" NOT NULL,
"course_category" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of course_sub_category
-- ----------------------------
BEGIN;
INSERT INTO "course_sub_category" VALUES ('1', 'ICANN', '2');
INSERT INTO "course_sub_category" VALUES ('2', 'CFA', '2');
COMMIT;

-- ----------------------------
-- Table structure for curriculum
-- ----------------------------
DROP TABLE IF EXISTS "curriculum";
CREATE TABLE "curriculum" (
"id" int4 NOT NULL,
"curriculum_title" varchar(255) COLLATE "default" NOT NULL,
"created_by" int4 NOT NULL,
"create_date" date NOT NULL,
"course_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of curriculum
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS "notification";
CREATE TABLE "notification" (
"id" int4 NOT NULL,
"create_date" date NOT NULL,
"read_date" date NOT NULL,
"status" varchar(255) COLLATE "default" NOT NULL,
"notice_by" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of notification
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS "profile";
CREATE TABLE "profile" (
"id" int4 NOT NULL,
"first_name" varchar(255) COLLATE "default" NOT NULL,
"last_name" varchar(255) COLLATE "default" NOT NULL,
"email" varchar(255) COLLATE "default" NOT NULL,
"is_tutor" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of profile
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS "question";
CREATE TABLE "question" (
"id" int4 NOT NULL,
"description" varchar(255) COLLATE "default" NOT NULL,
"answer" varchar(255) COLLATE "default" NOT NULL,
"answer_options" varchar(255) COLLATE "default" NOT NULL,
"question_type_id" int4 NOT NULL,
"answer_explanation" varchar(255) COLLATE "default" NOT NULL,
"subject_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of question
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for question_type
-- ----------------------------
DROP TABLE IF EXISTS "question_type";
CREATE TABLE "question_type" (
"id" int4 NOT NULL,
"description" varchar(255) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of question_type
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for student_course
-- ----------------------------
DROP TABLE IF EXISTS "student_course";
CREATE TABLE "student_course" (
"id" int4 NOT NULL,
"course_id" int4 NOT NULL,
"student_id" int4 NOT NULL,
"enroll_date" date NOT NULL,
"finish_date" date,
"completion_status" varchar(255) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of student_course
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS "subject";
CREATE TABLE "subject" (
"id" int4 NOT NULL,
"course_id" int4 NOT NULL,
"subject_title" varchar(255) COLLATE "default" NOT NULL,
"price" numeric(10,2) NOT NULL,
"curriculum_id" int4 NOT NULL,
"content_type" varchar(255) COLLATE "default" NOT NULL,
"content_location" varchar(255) COLLATE "default" NOT NULL,
"content_length" varchar COLLATE "default" NOT NULL,
"date_uploaded" date NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of subject
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tutor
-- ----------------------------
DROP TABLE IF EXISTS "tutor";
CREATE TABLE "tutor" (
"id" int4 NOT NULL,
"instructor_since" date NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of tutor
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "user";
CREATE TABLE "user" (
"id" int4 NOT NULL,
"username" varchar(255) COLLATE "default" NOT NULL,
"password" varchar(255) COLLATE "default" NOT NULL,
"password_hash" varchar(255) COLLATE "default" NOT NULL,
"auth_key" varchar COLLATE "default" NOT NULL,
"status" varchar(255) COLLATE "default",
"password_reset_token" varchar(255) COLLATE "default",
"email" varchar(255) COLLATE "default",
"updated_at" date,
"created_at" date,
"lastlogin_at" date
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table billing
-- ----------------------------
ALTER TABLE "billing" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table comments
-- ----------------------------
ALTER TABLE "comments" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table course
-- ----------------------------
CREATE INDEX "idx_course_title" ON "course" USING btree ("course_title");

-- ----------------------------
-- Primary Key structure for table course
-- ----------------------------
ALTER TABLE "course" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table course_category
-- ----------------------------
CREATE UNIQUE INDEX "idx_course_category" ON "course_category" USING btree ("description");

-- ----------------------------
-- Primary Key structure for table course_category
-- ----------------------------
ALTER TABLE "course_category" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table course_sub_category
-- ----------------------------
CREATE UNIQUE INDEX "idx_course_sub_category_description" ON "course_sub_category" USING btree ("description");

-- ----------------------------
-- Primary Key structure for table course_sub_category
-- ----------------------------
ALTER TABLE "course_sub_category" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table curriculum
-- ----------------------------
CREATE UNIQUE INDEX "idx_curriculum_title" ON "curriculum" USING btree ("curriculum_title");

-- ----------------------------
-- Primary Key structure for table curriculum
-- ----------------------------
ALTER TABLE "curriculum" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table notification
-- ----------------------------
ALTER TABLE "notification" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table profile
-- ----------------------------
ALTER TABLE "profile" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table question
-- ----------------------------
ALTER TABLE "question" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table question_type
-- ----------------------------
ALTER TABLE "question_type" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table student_course
-- ----------------------------
CREATE UNIQUE INDEX "idx_course_id_student_id" ON "student_course" USING btree ("course_id", "student_id");

-- ----------------------------
-- Primary Key structure for table student_course
-- ----------------------------
ALTER TABLE "student_course" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table subject
-- ----------------------------
CREATE UNIQUE INDEX "idx_subject_description" ON "subject" USING btree ("subject_title", "course_id", "curriculum_id");

-- ----------------------------
-- Primary Key structure for table subject
-- ----------------------------
ALTER TABLE "subject" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tutor
-- ----------------------------
ALTER TABLE "tutor" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table user
-- ----------------------------
CREATE UNIQUE INDEX "idx_user_username" ON "user" USING btree ("username");

-- ----------------------------
-- Uniques structure for table user
-- ----------------------------
ALTER TABLE "user" ADD UNIQUE ("username");

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "user" ADD PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Key structure for table "billing"
-- ----------------------------
ALTER TABLE "billing" ADD FOREIGN KEY ("user_id") REFERENCES "profile" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "comments"
-- ----------------------------
ALTER TABLE "comments" ADD FOREIGN KEY ("comment_trail_id") REFERENCES "comments" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "comments" ADD FOREIGN KEY ("subject_id") REFERENCES "subject" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "comments" ADD FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "course"
-- ----------------------------
ALTER TABLE "course" ADD FOREIGN KEY ("created_by") REFERENCES "profile" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "course" ADD FOREIGN KEY ("sub_category_id") REFERENCES "course_sub_category" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "course_sub_category"
-- ----------------------------
ALTER TABLE "course_sub_category" ADD FOREIGN KEY ("course_category") REFERENCES "course_category" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "curriculum"
-- ----------------------------
ALTER TABLE "curriculum" ADD FOREIGN KEY ("created_by") REFERENCES "profile" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "curriculum" ADD FOREIGN KEY ("course_id") REFERENCES "course" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "notification"
-- ----------------------------
ALTER TABLE "notification" ADD FOREIGN KEY ("notice_by") REFERENCES "user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "profile"
-- ----------------------------
ALTER TABLE "profile" ADD FOREIGN KEY ("id") REFERENCES "user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "question"
-- ----------------------------
ALTER TABLE "question" ADD FOREIGN KEY ("question_type_id") REFERENCES "question_type" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "question" ADD FOREIGN KEY ("subject_id") REFERENCES "subject" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "student_course"
-- ----------------------------
ALTER TABLE "student_course" ADD FOREIGN KEY ("student_id") REFERENCES "profile" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "student_course" ADD FOREIGN KEY ("course_id") REFERENCES "course" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "subject"
-- ----------------------------
ALTER TABLE "subject" ADD FOREIGN KEY ("course_id") REFERENCES "course" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "subject" ADD FOREIGN KEY ("curriculum_id") REFERENCES "curriculum" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "tutor"
-- ----------------------------
ALTER TABLE "tutor" ADD FOREIGN KEY ("id") REFERENCES "profile" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
