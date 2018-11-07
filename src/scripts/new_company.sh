########################################
# Script: `new_company.sh`
# Author: `Ashton Harding`
# Date: 2018-08-17
########################################
# The purpose of this script is to
# create a new proper database when
# a company is created.
########################################
# NOTE:
# Don't bother running this script,
# it's supposed to be for automation
# anyways.
########################################
# it also doesn't work yet :^)
CREATE DATABASE `NAME`
USE `NAME`
CREATE TABLE users (
 id MEDIUMINT NOT NULL AUTO_INCREMENT,
 first_name CHAR(64) NOT NULL,
 last_name CHAR(64) NOT NULL,
 email_addr CHAR(64) NOT NULL,
 password CHAR(64) NOT NULL,
 salt CHAR(64) NOT NULL,
 permission CHAR(64) NOT NULL,
 PRIMARY KEY (id)
);
CREATE TABLE tasks (
 id BIGINT NOT NULL AUTO_INCREMENT,
 department CHAR(254) NOT NULL,
 name CHAR(254) NOT NULL,
 description MEDIUMTEXT,
 status CHAR(64) NOT NULL,
 manager_id CHAR(64) NOT NULL,
 assigned_users MEDIUMTEXT,
 PRIMARY KEY (id)
);
CREATE TABLE invites (
 id MEDIUMINT NOT NULL AUTO_INCREMENT,
 email CHAR(64) NOT NULL,
 invite_code CHAR(254) NOT NULL,
 company CHAR(64) NOT NULL,
 invited_by CHAR(64) NOT NULL,
 code_used CHAR(64) NOT NULL,
 PRIMARY KEY (id)
);
