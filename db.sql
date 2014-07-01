--------------------------------------------------------
--  File created - wtorek-lipiec-01-2014   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence BOARDSEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HPH"."BOARDSEQ"  MINVALUE 3 MAXVALUE 100000 INCREMENT BY 1 START WITH 32 CACHE 20 NOORDER  CYCLE ;
--------------------------------------------------------
--  DDL for Sequence POSTS_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HPH"."POSTS_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 156 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence USEQ
--------------------------------------------------------

   CREATE SEQUENCE  "HPH"."USEQ"  MINVALUE 2 MAXVALUE 1000000 INCREMENT BY 1 START WITH 78 CACHE 20 ORDER  CYCLE ;
--------------------------------------------------------
--  DDL for Table BOARDS
--------------------------------------------------------

  CREATE TABLE "HPH"."BOARDS" 
   (	"BOARD_ID" NUMBER, 
	"NAME" VARCHAR2(128 BYTE), 
	"DESCRIPTION" VARCHAR2(255 BYTE), 
	"PARENT_ID" NUMBER DEFAULT NULL
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table GROUP_RIGHT
--------------------------------------------------------

  CREATE TABLE "HPH"."GROUP_RIGHT" 
   (	"GROUP_ID" NUMBER(*,0), 
	"RIGHT_ID" NUMBER(*,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table GROUPS
--------------------------------------------------------

  CREATE TABLE "HPH"."GROUPS" 
   (	"GROUP_ID" NUMBER(*,0), 
	"NAME" VARCHAR2(48 BYTE), 
	"DISPLAY_NAME" VARCHAR2(48 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table MENU
--------------------------------------------------------

  CREATE TABLE "HPH"."MENU" 
   (	"ITEM_ID" NUMBER(*,0), 
	"TITLE" VARCHAR2(48 BYTE), 
	"CONTROLLER" VARCHAR2(20 BYTE), 
	"ACTION" VARCHAR2(20 BYTE), 
	"PARENT_ID" NUMBER(*,0) DEFAULT 0
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table POSTS
--------------------------------------------------------

  CREATE TABLE "HPH"."POSTS" 
   (	"POST_ID" NUMBER, 
	"BOARD_ID" NUMBER, 
	"USER_ID" NUMBER, 
	"TOPIC" VARCHAR2(45 BYTE), 
	"DATETIME" NUMBER, 
	"REPLY_ID" NUMBER, 
	"CONTENT" CLOB, 
	"APPROVED" NUMBER(*,0) DEFAULT 0
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" 
 LOB ("CONTENT") STORE AS BASICFILE (
  TABLESPACE "HPH" ENABLE STORAGE IN ROW CHUNK 8192 RETENTION 
  NOCACHE LOGGING 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)) ;
--------------------------------------------------------
--  DDL for Table POSTS_LIKES
--------------------------------------------------------

  CREATE TABLE "HPH"."POSTS_LIKES" 
   (	"POST_ID" NUMBER, 
	"USER_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table RIGHTS
--------------------------------------------------------

  CREATE TABLE "HPH"."RIGHTS" 
   (	"RIGHT_ID" NUMBER(*,0), 
	"TYPE" VARCHAR2(128 BYTE), 
	"BOARD_ID" NUMBER(*,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table USER_GROUP
--------------------------------------------------------

  CREATE TABLE "HPH"."USER_GROUP" 
   (	"USER_ID" NUMBER(*,0), 
	"GROUP_ID" NUMBER(*,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Table USERS
--------------------------------------------------------

  CREATE TABLE "HPH"."USERS" 
   (	"USER_ID" NUMBER(*,0), 
	"EMAIL" VARCHAR2(255 BYTE), 
	"TOKEN" VARCHAR2(255 BYTE), 
	"LOGIN" VARCHAR2(255 BYTE), 
	"PASSWORD" VARCHAR2(255 BYTE), 
	"ACTIVE" NUMBER(*,0) DEFAULT 1, 
	"BANNED" NUMBER(*,0) DEFAULT 0, 
	"AVATAR_IMAGE" VARCHAR2(255 BYTE), 
	"SCREEN_NAME" VARCHAR2(255 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
REM INSERTING into HPH.BOARDS
SET DEFINE OFF;
Insert into HPH.BOARDS (BOARD_ID,NAME,DESCRIPTION,PARENT_ID) values ('13','Śledztwo','Agent Cooper w akcji','1');
Insert into HPH.BOARDS (BOARD_ID,NAME,DESCRIPTION,PARENT_ID) values ('12','Karnisze','Wszystko co musisz wiedzieć o bezdźwięcznych karniszach','1');
Insert into HPH.BOARDS (BOARD_ID,NAME,DESCRIPTION,PARENT_ID) values ('14','Szachy','szachmat','1');
Insert into HPH.BOARDS (BOARD_ID,NAME,DESCRIPTION,PARENT_ID) values ('1','Twin Peaks',null,'0');
REM INSERTING into HPH.GROUP_RIGHT
SET DEFINE OFF;
Insert into HPH.GROUP_RIGHT (GROUP_ID,RIGHT_ID) values ('0','0');
REM INSERTING into HPH.GROUPS
SET DEFINE OFF;
Insert into HPH.GROUPS (GROUP_ID,NAME,DISPLAY_NAME) values ('0','SUPERADMINS','SUPER USERS');
Insert into HPH.GROUPS (GROUP_ID,NAME,DISPLAY_NAME) values ('1','REGULARS','Normal users');
Insert into HPH.GROUPS (GROUP_ID,NAME,DISPLAY_NAME) values ('2','MODERATORS','Moderators');
REM INSERTING into HPH.MENU
SET DEFINE OFF;
Insert into HPH.MENU (ITEM_ID,TITLE,CONTROLLER,ACTION,PARENT_ID) values ('1','test','boards',' ','1');
REM INSERTING into HPH.POSTS
SET DEFINE OFF;
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('127','13','48','Śmierć Sary Palmer','1402726785',null,'1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('129','13','52',null,'1402727040','127','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('128','13','54',null,'1402726848','127','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('130','12','50','za głośno','1402727216',null,'1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('131','12','48',null,'1402727287','130','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('132','12','48','szukam...','1402727327',null,'1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('133','1','44','Co nowego w Twin Peaks?','1402727402',null,'1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('140','13','44','dd','1402728052','138','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('138','13','44','a','1402728042','137','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('139','13','44','c','1402728047','137','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('141','13','58','fsadfa','1402728111','137','1');
Insert into HPH.POSTS (POST_ID,BOARD_ID,USER_ID,TOPIC,DATETIME,REPLY_ID,APPROVED) values ('137','13','44','f','1402728030',null,'1');
REM INSERTING into HPH.POSTS_LIKES
SET DEFINE OFF;
REM INSERTING into HPH.RIGHTS
SET DEFINE OFF;
Insert into HPH.RIGHTS (RIGHT_ID,TYPE,BOARD_ID) values ('0','*',null);
REM INSERTING into HPH.USER_GROUP
SET DEFINE OFF;
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('30','0');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('32','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('36','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('40','0');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('54','2');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('34','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('42','0');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('48','2');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('46','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('52','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('56','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('44','0');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('21','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('50','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('58','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('1','0');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('17','1');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('38','0');
Insert into HPH.USER_GROUP (USER_ID,GROUP_ID) values ('19','1');
REM INSERTING into HPH.USERS
SET DEFINE OFF;
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('7',null,null,'tt','3c520f543c3cecf899da9a1322c0ff0c,aa773e29eef2a5c30b84d36435f99094','1','0',null,'tagdsgdafg');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('54',null,'fbd2367b610709a34ef4bb9605ec5ba9','truman','e0774a764e02c559699be88bde4da8b3,f12657ca95cecbef9739a7c9c04faae6','1','0','45d16fc6ac85fb03503bb94e4416d10btruman.jpg','Sheriff Trumann');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('48',null,'caaa29eab72b231b0af62fbdff89bfce','dale','3406322d9f06363350db97011eca7251,8d9a15b55c2ac9becb69a52624396966','1','0','6dbaca89701b0bb7b3af6476397a53362.jpg','Agent Cooper');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('44',null,'7ae7778c9ae86d2ded133e891995dc9e','admin','5685eb255541b4a46cfd7573314cacf7,57e7710feda049f5d5b0c46d6f611852','1','0','57352c8f06218a3db251f11dcd32fcd2indeks.jpg','Dave');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('52',null,'d1f8643fbc2b43ef133eec4e483b3565','log','fbbf8d0275edeb753751336d316d3953,73b98aaf0b3dc56931f522711bcb457b','1','0','04bdc2e27fae0be6604b98c1fcefdcac3.jpg','The Log Lady');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('56',null,null,'midget','c237047b23ec07a13d6cbfc6696debd1,61ae94caa4df330f8633334fa4cdc804','1','0','332d3e50f6956b5fd73ee582888d0125PDVD_285.jpg','Small dude');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('50',null,'ec3c79029a2bc3e4f7d85343a4a70350','draperunner','f88b90fa688e630eae7a0223719d466e,4b4035563213d4fc685e4b065326e68e','1','0','ebecccda0aee2d8f72ec973f8f0da17cX_6616cc08.jpg','draperunner gal');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('9',null,null,'tt','43187ca69558b615228ded098195fee1,edcf8899baa331c4008eaf6a7de9f08b','1','0',null,'tagdsgdafg');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('6',null,'2f5d21999da313309846db2cf8f995df','tester','8bb654c2cd19350d50be15ef51a951bf,c24c47dd1b2e9aac64cab553d94a22d7','1','0',null,'ttestter');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('11',null,null,'tt','bc44892fe7caf61725f8c40de752b7f0,d8585cb93fef89c4cf932574e6554c9c','1','0',null,'tagdsgdafg');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('13',null,null,'tt','97fe6b4c5533a76d7cfc52485f284277,01eb7e52b5ec845670f477a41d4c00a3','1','0',null,'tagdsgdafg');
Insert into HPH.USERS (USER_ID,EMAIL,TOKEN,LOGIN,PASSWORD,ACTIVE,BANNED,AVATAR_IMAGE,SCREEN_NAME) values ('15',null,null,'tt','8e8d9c53f952a022bc6705862ba35c1e,037c4b89b115a70b50f13db0d6b4da9d','1','0',null,'tagdsgdafg');
--------------------------------------------------------
--  DDL for Index TABLE1_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."TABLE1_PK" ON "HPH"."USERS" ("USER_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Index BOARDS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."BOARDS_PK" ON "HPH"."BOARDS" ("BOARD_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Index POSTS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."POSTS_PK" ON "HPH"."POSTS" ("POST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Index PK_PL
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."PK_PL" ON "HPH"."POSTS_LIKES" ("POST_ID", "USER_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Index GROUPS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."GROUPS_PK" ON "HPH"."GROUPS" ("GROUP_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Index MENU_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."MENU_PK" ON "HPH"."MENU" ("ITEM_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  DDL for Index RIGHTS_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "HPH"."RIGHTS_PK" ON "HPH"."RIGHTS" ("RIGHT_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH" ;
--------------------------------------------------------
--  Constraints for Table POSTS_LIKES
--------------------------------------------------------

  ALTER TABLE "HPH"."POSTS_LIKES" ADD CONSTRAINT "PK_PL" PRIMARY KEY ("POST_ID", "USER_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."POSTS_LIKES" MODIFY ("USER_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."POSTS_LIKES" MODIFY ("POST_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table POSTS
--------------------------------------------------------

  ALTER TABLE "HPH"."POSTS" ADD CONSTRAINT "POSTS_PK" PRIMARY KEY ("POST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."POSTS" MODIFY ("USER_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."POSTS" MODIFY ("BOARD_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."POSTS" MODIFY ("POST_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table GROUP_RIGHT
--------------------------------------------------------

  ALTER TABLE "HPH"."GROUP_RIGHT" MODIFY ("RIGHT_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."GROUP_RIGHT" MODIFY ("GROUP_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table USERS
--------------------------------------------------------

  ALTER TABLE "HPH"."USERS" MODIFY ("BANNED" NOT NULL ENABLE);
  ALTER TABLE "HPH"."USERS" MODIFY ("ACTIVE" NOT NULL ENABLE);
  ALTER TABLE "HPH"."USERS" ADD CONSTRAINT "TABLE1_PK" PRIMARY KEY ("USER_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."USERS" MODIFY ("PASSWORD" NOT NULL ENABLE);
  ALTER TABLE "HPH"."USERS" MODIFY ("LOGIN" NOT NULL ENABLE);
  ALTER TABLE "HPH"."USERS" MODIFY ("USER_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table USER_GROUP
--------------------------------------------------------

  ALTER TABLE "HPH"."USER_GROUP" MODIFY ("GROUP_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."USER_GROUP" MODIFY ("USER_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table BOARDS
--------------------------------------------------------

  ALTER TABLE "HPH"."BOARDS" ADD CONSTRAINT "BOARDS_PK" PRIMARY KEY ("BOARD_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."BOARDS" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "HPH"."BOARDS" MODIFY ("BOARD_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table RIGHTS
--------------------------------------------------------

  ALTER TABLE "HPH"."RIGHTS" MODIFY ("TYPE" NOT NULL ENABLE);
  ALTER TABLE "HPH"."RIGHTS" ADD CONSTRAINT "RIGHTS_PK" PRIMARY KEY ("RIGHT_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."RIGHTS" MODIFY ("RIGHT_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table MENU
--------------------------------------------------------

  ALTER TABLE "HPH"."MENU" ADD CONSTRAINT "MENU_PK" PRIMARY KEY ("ITEM_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."MENU" MODIFY ("PARENT_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."MENU" MODIFY ("CONTROLLER" NOT NULL ENABLE);
  ALTER TABLE "HPH"."MENU" MODIFY ("TITLE" NOT NULL ENABLE);
  ALTER TABLE "HPH"."MENU" MODIFY ("ITEM_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table GROUPS
--------------------------------------------------------

  ALTER TABLE "HPH"."GROUPS" ADD CONSTRAINT "GROUPS_PK" PRIMARY KEY ("GROUP_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "HPH"  ENABLE;
  ALTER TABLE "HPH"."GROUPS" MODIFY ("GROUP_ID" NOT NULL ENABLE);
  ALTER TABLE "HPH"."GROUPS" MODIFY ("NAME" NOT NULL ENABLE);
--------------------------------------------------------
--  Ref Constraints for Table BOARDS
--------------------------------------------------------

  ALTER TABLE "HPH"."BOARDS" ADD CONSTRAINT "BOARDS_FK1" FOREIGN KEY ("BOARD_ID")
	  REFERENCES "HPH"."BOARDS" ("BOARD_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table GROUP_RIGHT
--------------------------------------------------------

  ALTER TABLE "HPH"."GROUP_RIGHT" ADD CONSTRAINT "GROUP_RIGHT_FK1" FOREIGN KEY ("GROUP_ID")
	  REFERENCES "HPH"."GROUPS" ("GROUP_ID") ENABLE;
  ALTER TABLE "HPH"."GROUP_RIGHT" ADD CONSTRAINT "GROUP_RIGHT_FK2" FOREIGN KEY ("RIGHT_ID")
	  REFERENCES "HPH"."RIGHTS" ("RIGHT_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table MENU
--------------------------------------------------------

  ALTER TABLE "HPH"."MENU" ADD CONSTRAINT "PARENT_ID" FOREIGN KEY ("PARENT_ID")
	  REFERENCES "HPH"."MENU" ("ITEM_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table POSTS_LIKES
--------------------------------------------------------

  ALTER TABLE "HPH"."POSTS_LIKES" ADD CONSTRAINT "PL_FK" FOREIGN KEY ("POST_ID")
	  REFERENCES "HPH"."POSTS" ("POST_ID") ENABLE;
  ALTER TABLE "HPH"."POSTS_LIKES" ADD CONSTRAINT "PL_FK2" FOREIGN KEY ("USER_ID")
	  REFERENCES "HPH"."USERS" ("USER_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table USER_GROUP
--------------------------------------------------------

  ALTER TABLE "HPH"."USER_GROUP" ADD CONSTRAINT "USER_GROUP_FK1" FOREIGN KEY ("GROUP_ID")
	  REFERENCES "HPH"."GROUPS" ("GROUP_ID") ENABLE;
--------------------------------------------------------
--  DDL for Trigger BOARDSINC
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HPH"."BOARDSINC" 
   before insert on "HPH"."BOARDS" 
   for each row 
begin  
   if inserting then 
      if :NEW."BOARD_ID" is null then 
         select BOARDSEQ.nextval into :NEW."BOARD_ID" from dual; 
      end if; 
   end if; 
end;

/
ALTER TRIGGER "HPH"."BOARDSINC" ENABLE;
--------------------------------------------------------
--  DDL for Trigger POSTS_BIR
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HPH"."POSTS_BIR" 
BEFORE INSERT ON posts 
FOR EACH ROW

BEGIN
  SELECT posts_seq.NEXTVAL
  INTO   :new.post_id
  FROM   dual;
END;
/
ALTER TRIGGER "HPH"."POSTS_BIR" ENABLE;
--------------------------------------------------------
--  DDL for Trigger UT
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HPH"."UT" 
   before insert on "HPH"."USERS" 
   for each row 
begin  
   if inserting then 
      if :NEW."USER_ID" is null then 
         select USEQ.nextval into :NEW."USER_ID" from dual; 
      end if; 
   end if; 
end;

/
ALTER TRIGGER "HPH"."UT" ENABLE;
