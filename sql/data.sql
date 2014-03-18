/*clos foreign check*/
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

truncate `da_db`.department;
insert into `da_db`.department(name) values('内科');
insert into `da_db`.department(name) values('外科');
insert into `da_db`.department(name) values('妇产科');
insert into `da_db`.department(name) values('儿科');
insert into `da_db`.department(name) values('五官科');
insert into `da_db`.department(name) values('肿瘤科');
insert into `da_db`.department(name) values('皮肤性病科');
insert into `da_db`.department(name) values('中医科');
insert into `da_db`.department(name) values('传染科');
insert into `da_db`.department(name) values('精神心理科');
insert into `da_db`.department(name) values('整形美容科');
insert into `da_db`.department(name) values('营养科');
insert into `da_db`.department(name) values('生殖中心');
insert into `da_db`.department(name) values('麻醉医学科');
insert into `da_db`.department(name) values('变态反应科');
insert into `da_db`.department(name) values('病理科');
insert into `da_db`.department(name) values('急诊科');

truncate `da_db`.title;
insert into `da_db`.title(name) values('主任医师');
insert into `da_db`.title(name) values('副主任医师');
insert into `da_db`.title(name) values('主治医师');
insert into `da_db`.title(name) values('住院医师 ');

truncate `da_db`.role;
insert into `da_db`.role values(1,'医生');
insert into `da_db`.role values(2,'企业');
insert into `da_db`.role values(3,'管理员');
insert into `da_db`.role values(4,'销售');

truncate `da_db`.`level`;
insert into `da_db`.`level`(name) values('实习医生');

truncate `da_db`.district;
insert into `da_db`.district(name) values('河北省');
insert into `da_db`.district(name) values('天津市');

truncate `da_db`.`user`;
insert into `da_db`.user(username,password,district,role) values('songdragon','85aa7a90b985d64a22140ab819e735fe',1,1);

/*open foreign check*/
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;