drop database if exists `da_db`;

create database if not exists `da_db`;
use `da_db`;

/**
*/
drop table if exists `da_db`.`department`;
create table `da_db`.`department`(
	id smallint unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(30) NOT NULL
) COMMENT '科室';

drop table if exists `da_db`.`district`;
create table `da_db`.`district`(
	id smallint unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(30) NOT NULL
) COMMENT '地区';

drop table if exists `da_db`.`title`;
create table `da_db`.`title`(
	id smallint unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(30) NOT NULL
) COMMENT '职称';

drop table if exists `da_db`.`level`;
create table `da_db`.`level`(
	id smallint unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(30) NOT NULL
) COMMENT '虚拟等级';

drop table if exists `da_db`.`role`;
create table `da_db`.`role`(
	id smallint unsigned NOT NULL auto_increment PRIMARY KEY,
	name varchar(30) NOT NULL
) COMMENT '系统中的角色';
/**
*/

/**
* 用户信息表
*/
drop table  if exists `da_db`.`user`;
create table `da_db`.`user` (
	id char(15) NOT NULL PRIMARY KEY COMMENT 'primary key',
	username varchar(15) NOT NULL UNIQUE COMMENT '用户名',
	`password` varchar(512) NOT NULL COMMENT '密码',
	nickname varchar(15) COMMENT '昵称/显示用户名',
	address varchar(50) COMMENT '地址',
	telephone varchar(20) COMMENT '固定电话',
	mobile varchar(20) COMMENT '手机',
	`district` smallint unsigned NOT NULL COMMENT '地区',
	email varchar(50) COMMENT 'email',
	role smallint unsigned NOT NULL COMMENT '角色',
	register_date datetime NOT NULL COMMENT '注册时间',
	last_update datetime COMMENT '上次更新注册信息时间',
	CONSTRAINT `user_district_fk` FOREIGN KEY (district) REFERENCES `da_db`.`district`(id),
	CONSTRAINT `user_role_fk` FOREIGN KEY (role) REFERENCES `da_db`.`role`(id)
) COMMENT '用户信息表，id首位为0，为医生；id首位为1，为公司';
create index `user_username_index` ON `da_db`.`user` (username(10)) COMMENT '用户名索引';

/**
* 医生信息
*/
drop table if exists `da_db`.`doctor`;
create table `da_db`.`doctor`(
	`id` char(15) NOT NULL PRIMARY KEY,
	name varchar(10) NOT NULL COMMENT '姓名',
	age tinyint unsigned NOT NULL COMMENT '年龄',
	phano varchar(30) NOT NULL COMMENT '医师资格证书编号',
	department smallint unsigned NOT NULL COMMENT '科室',
	hospital varchar(30) NOT NULL COMMENT '医院',
	title smallint unsigned NOT NULL COMMENT '职称',
	`level` smallint unsigned NOT NULL COMMENT '虚拟等级',
	CONSTRAINT `doctor_id_fk` FOREIGN KEY (id) REFERENCES `da_db`.`user`(id),
	CONSTRAINT `doctor_department_fk` FOREIGN KEY (department) REFERENCES `da_db`.`department`(id),
	CONSTRAINT `doctor_title_fk` FOREIGN KEY (title) REFERENCES `da_db`.`title`(id),
	CONSTRAINT `doctor_level_fk` FOREIGN KEY (`level`) REFERENCES `da_db`.`level`(id)
	
) COMMENT '医生信息';

/**
* 公司信息/销售代表
*/
drop table if exists `da_db`.`company`;
create table `da_db`.`company`(
	`id` char(15) NOT NULL PRIMARY KEY,
	name varchar(15) NOT NULL COMMENT '公司名称',
	business_license varchar(50) NOT NULL COMMENT '营业执照',
	tax_license varchar(50) NOT NULL COMMENT '税务注册证',
	code_license varchar(50) NOT NULL COMMENT '代码证',
	CONSTRAINT `company_id_fk` FOREIGN KEY (id) REFERENCES `da_db`.`user`(id)
	
) COMMENT '公司信息';

drop table if exists `da_db`.`question`;
create table `da_db`.`question`(
	`id` bigint unsigned NOT NULL PRIMARY KEY COMMENT 'key',
	`title` varchar(50) NOT NULL COMMENT '标题'
	
) COMMENT '问题记录表';
/**
* 回答
**/
drop table if exists `da_db`.`answer`;
create table `da_db`.`answer`(
	`id` bigint unsigned NOT NULL PRIMARY KEY COMMENT 'key',
	`content` varchar(50) NOT NULL COMMENT '答案内容',
	`qid` bigint unsigned NOT NULL COMMENT '问题id'
) COMMENT '回答记录表';
create INDEX `answer_qid_fk` on `da_db`.`answer`(`qid`) COMMENT '问题外键索引';
/**
* 标签
*/
drop table if exists `da_db`.`tag`;
create table `da_db`.`tag`(
	`id` bigint unsigned NOT NULL PRIMARY KEY COMMENT 'key',
	`title` varchar(50) NOT NULL COMMENT 'tag'
	
) COMMENT '标签表';

/**
* 附件
*/
drop table if exists `da_db`.`attachment`;
create table `da_db`.`attachment`(
	`id` bigint unsigned NOT NULL PRIMARY KEY COMMENT 'key',
	`path` varchar(50) NOT NULL COMMENT 'path'
	
) COMMENT '附件信息表';

/**
* 登陆记录
*/
drop table if exists `da_db`.`login_log`;
create table `da_db`.`login_log`(
	`id` bigint unsigned NOT NULL PRIMARY KEY,
	uid varchar(15) NOT NULL COMMENT '用户ID',
	ip bigint NOT NULL COMMENT '登陆IP',
	`date` datetime NOT NULL COMMENT '登陆时间',
	CONSTRAINT `login_log_id_fk` FOREIGN KEY (uid) REFERENCES `da_db`.`user`(id)
	
)COMMENT '登陆记录';