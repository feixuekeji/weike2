
create table if not exists find(
find_id int unsigned not null auto_increment,
openid varchar(50) not null,
find_name varchar(50),
card_num int,
find_msg varchar(200),
find_addr varchar(100),
now_addr varchar(100),
map varchar(20),
find_time int,
pub_time int not null,
telephone varchar(20),
QQ varchar(20),
image varchar(40),
status tinyint,
primary key(find_id)
);

create table if not exists lost(
lost_id int unsigned not null auto_increment,
openid varchar(50) not null,
lost_name varchar(50),
card_num int,
lost_msg varchar(200),
lost_addr varchar(100),
lost_time int,
pub_time int not null,
telephone varchar(20),
QQ varchar(20),
image varchar(40),
status tinyint,
primary key(lost_id)
);

create table if not exists admin(
admin_id int unsigned not null auto_increment,
username varchar(50) not null,
password varchar(50) not null,
primary key(admin_id)
);


