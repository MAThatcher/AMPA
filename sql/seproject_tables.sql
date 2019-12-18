drop table update_table cascade constraints;
drop table watershed cascade constraints;
drop table owner cascade constraints;
drop table ranking cascade constraints;
drop table parcel cascade constraints;


create table parcel
(APN            number not null,
old_apn         number,
parcel_city		varchar2(25),
parcel_zip		number,
parcel_street	varchar2(50),
occupied        varchar2(4),
primary key (apn)
);



create table ranking
(APN					number not null,
permit_on_file			varchar2(4),
age_of_system			varchar2(25),
proximity				varchar2(25),
currently_compliant		varchar2(25),
slope					varchar2(25),
condition				varchar2(25),
soil					varchar2(25),
comments				varchar2(215),
total_score				number,
foreign key	(apn) references parcel,
primary key	(apn)
);

create table owner
(APN 				number not null,
owner_name			varchar2(215),
owner_address		varchar2(215),
owner_city			varchar2(25),
owner_state			varchar2(25),
owner_zip			varchar2(25),
foreign key (apn) references ranking,
primary key (apn)
);

create table watershed
(APN				number not null,
parcel_city			varchar2(25),
watershed_name		varchar2(25),
beach				varchar2(25),
foreign key (apn) references parcel,
primary key (apn)
);

create table update_table
(APN				number not null,
DATE_OF_CHANGE		date default sysdate,
old_field			varchar2(25),
old_field_val		varchar2(25),
old_ranking			varchar2(25),
old_comments		varchar2(215),
foreign key (apn) references ranking,
primary key (apn, date_of_change)
);