-- INSERT INTO barangays VALUES ('1', '012801001', 'Adams (Pob.)', '01', '0128', '012801',now(),now());

-- id, users_id, seasons_id, planned_hec, actual_hec, plannumfar, actnumfar, plqty, actqty,season_list_statuses_id

-- season 1 dry
INSERT INTO `season_lists` VALUES(1,'10','1','8.9','8.5','10','10','100','100','2',now(),now());
INSERT INTO `season_lists` VALUES(2,'11','1','10.4','9.8','15','14','100','100','2',now(),now());
INSERT INTO `season_lists` VALUES(3,'12','1','26.3','2.1','7','5','320','310','2',now(),now());

-- season 2 dry
INSERT INTO `season_lists` VALUES(4,'10','2','10.4','10.2','12','11','150','145','2',now(),now());
INSERT INTO `season_lists` VALUES(5,'11','2','7.1','7.0','6','6','120','115','2',now(),now());
INSERT INTO `season_lists` VALUES(6,'12','2','25','22','20','19','340','320','2',now(),now());

-- season 3 wet
INSERT INTO `season_lists` VALUES(7,'10','3','8.8','8.4','10','12','115','107','2',now(),now());
INSERT INTO `season_lists` VALUES(8,'11','3','7.8','8.1','10','9','105','98','2',now(),now());
INSERT INTO `season_lists` VALUES(9,'12','3','22','24','18','17','270','258','2',now(),now());

-- season 4 wet
INSERT INTO `season_lists` VALUES(10,'10','4','8.5','8.5','11','10','90','85','2',now(),now());
INSERT INTO `season_lists` VALUES(11,'11','4','7.8','7.4','9','9','100','94','2',now(),now());
INSERT INTO `season_lists` VALUES(12,'12','4','19','8.5','19','18','240','220','2',now(),now());

-- season 5 dry
INSERT INTO `season_lists` VALUES(13,'10','5','9.0','8.6','12','12','130','125','2',now(),now());
INSERT INTO `season_lists` VALUES(14,'11','5','8.9','8.5','15','13','120','110','2',now(),now());
INSERT INTO `season_lists` VALUES(15,'12','5','21','20','23','20','350','320','2',now(),now());

--season 6 wet
-- INSERT INTO `season_lists` VALUES(16,'12','6','9.1',null,'10',null,'110',null,'1',now(),now());
-- INSERT INTO `season_lists` VALUES(17,'12','6','8.9',null,'12',null,'105',null,'1',now(),now());
-- INSERT INTO `season_lists` VALUES(18,'12','6','18',null,'18',null,'270',null,'1',now(),now());