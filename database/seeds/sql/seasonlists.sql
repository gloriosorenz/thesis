-- INSERT INTO barangays VALUES ('1', '012801001', 'Adams (Pob.)', '01', '0128', '012801',now(),now());

-- id, users_id, seasons_id, planned_hec, actual_hec, plannumfar, actnumfar, plqty, actqty,season_list_statuses_id

-- season 1 dry
INSERT INTO `season_lists` VALUES(1,'10','1','4.0','3.5','13','12','100','100','2',now(),now());
INSERT INTO `season_lists` VALUES(2,'11','1','4.8','4.8','15','14','100','100','2',now(),now()); -- Gregorio
INSERT INTO `season_lists` VALUES(3,'12','1','16.3','12.1','7','5','320','310','2',now(),now());

-- season 2 dry
INSERT INTO `season_lists` VALUES(4,'10','2','3.8','3.2','12','11','150','145','2',now(),now());
INSERT INTO `season_lists` VALUES(5,'11','2','4.1','7.0','6','6','120','115','2',now(),now()); -- Gregorio
INSERT INTO `season_lists` VALUES(6,'12','2','14.2','12','20','19','340','320','2',now(),now());

-- season 3 wet
INSERT INTO `season_lists` VALUES(7,'10','3','2.5','2.2','10','12','115','107','2',now(),now());
INSERT INTO `season_lists` VALUES(8,'11','3','7.8','8.1','10','9','105','98','2',now(),now()); -- Gregorio
INSERT INTO `season_lists` VALUES(9,'12','3','12','14','13','17','270','258','2',now(),now());

-- season 4 wet
INSERT INTO `season_lists` VALUES(10,'10','4','2.2','1.3','11','10','90','85','2',now(),now());
INSERT INTO `season_lists` VALUES(11,'11','4','7.8','7.4','9','9','100','94','2',now(),now()); -- Gregorio
INSERT INTO `season_lists` VALUES(12,'12','4','19','8.5','19','18','240','220','2',now(),now());

-- season 5 dry
INSERT INTO `season_lists` VALUES(13,'10','5','3.9','3.7','12','12','130','125','2',now(),now());
INSERT INTO `season_lists` VALUES(14,'11','5','8.9','8.5','15','13','120','110','2',now(),now()); -- Gregorio
INSERT INTO `season_lists` VALUES(15,'12','5','12','11','23','20','350','320','2',now(),now());

-- Julio farmer
INSERT INTO `season_lists` VALUES(16,'17','1','3.0','2.0','13','11','120','115','2',now(),now());
INSERT INTO `season_lists` VALUES(17,'17','2','3.7','3.5','11','10','120','110','2',now(),now());
INSERT INTO `season_lists` VALUES(18,'17','3','3.6','3.5','10','9','100','88','2',now(),now());
INSERT INTO `season_lists` VALUES(19,'17','4','3.2','3.0','11','11','90','89','2',now(),now());
INSERT INTO `season_lists` VALUES(20,'17','5','3.9','3.4','12','11','105','104','2',now(),now());

-- Margarita farmer
INSERT INTO `season_lists` VALUES(21,'18','1','2.0','2.0','13','11','120','115','2',now(),now());
INSERT INTO `season_lists` VALUES(22,'18','2','1.7','1.5','11','10','120','110','2',now(),now());
INSERT INTO `season_lists` VALUES(23,'18','3','1.6','1.5','10','9','100','88','2',now(),now());
INSERT INTO `season_lists` VALUES(24,'18','4','1.2','1.0','11','11','90','89','2',now(),now());
INSERT INTO `season_lists` VALUES(25,'18','5','1.9','1.4','12','11','105','104','2',now(),now());

-- Ines farmer
INSERT INTO `season_lists` VALUES(26,'19','1','4.0','3.7','13','11','120','115','2',now(),now());
INSERT INTO `season_lists` VALUES(27,'19','2','4.3','3.8','11','10','120','110','2',now(),now());
INSERT INTO `season_lists` VALUES(28,'19','3','3.5','3.5','10','9','100','88','2',now(),now());
INSERT INTO `season_lists` VALUES(29,'19','4','3.2','6.0','11','11','90','89','2',now(),now());
INSERT INTO `season_lists` VALUES(30,'19','5','4.5','7.4','12','11','105','104','2',now(),now());

--season 6 wet
-- INSERT INTO `season_lists` VALUES(16,'12','6','9.1',null,'10',null,'110',null,'1',now(),now());
-- INSERT INTO `season_lists` VALUES(17,'12','6','8.9',null,'12',null,'105',null,'1',now(),now());
-- INSERT INTO `season_lists` VALUES(18,'12','6','18',null,'18',null,'270',null,'1',now(),now());