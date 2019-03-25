-- id, sea_id, user_id, or_pr_id, cu_pr_id, harvest_date,or_qty,curr_qty,price
-- season 1
INSERT INTO product_lists VALUES (1, '1','10','1','1','2017-11-17','70','20',17.0,now(),now());
INSERT INTO product_lists VALUES (2, '1','10','2','2','2017-11-17','20','0',13.0,now(),now());
INSERT INTO product_lists VALUES (3, '1','10','3','3','2017-11-17','10','10',0.0,now(),now());
INSERT INTO product_lists VALUES (4, '1','11','1','1','2017-11-17','70','10',17.0,now(),now());
INSERT INTO product_lists VALUES (5, '1','11','2','2','2017-11-17','20','0',13.0,now(),now());
INSERT INTO product_lists VALUES (6, '1','11','3','3','2017-11-17','10','10',0.0,now(),now());
INSERT INTO product_lists VALUES (7, '1','12','1','1','2017-11-17','290','20',17.0,now(),now());
INSERT INTO product_lists VALUES (8, '1','12','2','2','2017-11-17','10','0',13.0,now(),now());
INSERT INTO product_lists VALUES (9, '1','12','3','3','2017-11-17','10','20',0.0,now(),now());

-- season 2
INSERT INTO product_lists VALUES (10, '2','10','1','1','2018-02-20','100','100',16.0,now(),now());
INSERT INTO product_lists VALUES (11, '2','10','2','2','2018-02-20','40','0',12.0,now(),now());
INSERT INTO product_lists VALUES (12, '2','10','3','3','2018-02-20','5','15',0.0,now(),now());
INSERT INTO product_lists VALUES (13, '2','11','1','1','2018-02-20','90','90',16.0,now(),now());
INSERT INTO product_lists VALUES (14, '2','11','2','2','2018-02-20','13','0',12.0,now(),now());
INSERT INTO product_lists VALUES (15, '2','11','3','3','2018-02-20','12','12',0.0,now(),now());
INSERT INTO product_lists VALUES (16, '2','12','1','1','2018-02-20','300','300',16.0,now(),now());
INSERT INTO product_lists VALUES (17, '2','12','2','2','2018-02-20','17','17',12.0,now(),now());
INSERT INTO product_lists VALUES (18, '2','12','3','3','2018-02-20','3','3',0.0,now(),now());

-- season 3  (typhoon)
INSERT INTO product_lists VALUES (19, '3','10','1','1','2018-06-28','80','80',14.0,now(),now());
INSERT INTO product_lists VALUES (20, '3','10','2','2','2018-06-28','5','5',9.0,now(),now());
INSERT INTO product_lists VALUES (21, '3','10','3','3','2018-06-28','22','22',0.0,now(),now());
INSERT INTO product_lists VALUES (22, '3','11','1','1','2018-06-28','60','60',14.0,now(),now());
INSERT INTO product_lists VALUES (23, '3','11','2','2','2018-06-28','20','20',9.0,now(),now());
INSERT INTO product_lists VALUES (24, '3','11','3','3','2018-06-28','18','18',0.0,now(),now());
INSERT INTO product_lists VALUES (25, '3','12','1','1','2018-06-28','200','200',14.0,now(),now());
INSERT INTO product_lists VALUES (26, '3','12','2','2','2018-06-28','30','30',9.0,now(),now());
INSERT INTO product_lists VALUES (27, '3','12','3','3','2018-06-28','28','28',0.0,now(),now());

-- season 4 (under effect but less quantity, better quality)
INSERT INTO product_lists VALUES (28, '4','10','1','1','2018-11-20','70','70',15.0,now(),now());
INSERT INTO product_lists VALUES (29, '4','10','2','2','2018-11-20','10','10',11.0,now(),now());
INSERT INTO product_lists VALUES (30, '4','10','3','3','2018-11-20','5','5',0.0,now(),now());
INSERT INTO product_lists VALUES (31, '4','11','1','1','2018-11-20','71','71',15.0,now(),now());
INSERT INTO product_lists VALUES (32, '4','11','2','2','2018-11-20','19','19',11.0,now(),now());
INSERT INTO product_lists VALUES (33, '4','11','3','3','2018-11-20','4','4',0.0,now(),now());
INSERT INTO product_lists VALUES (34, '4','12','1','1','2018-11-20','200','200',15.0,now(),now());
INSERT INTO product_lists VALUES (35, '4','12','2','2','2018-11-20','14','14',11.0,now(),now());
INSERT INTO product_lists VALUES (36, '4','12','3','3','2018-11-20','6','6',0.0,now(),now());

-- season 5
INSERT INTO product_lists VALUES (37, '5','10','1','1','2019-03-25','110','20',19.0,now(),now());
INSERT INTO product_lists VALUES (38, '5','10','2','2','2019-03-25','10','6',14.0,now(),now());
INSERT INTO product_lists VALUES (39, '5','10','3','3','2019-03-25','5','1',0.0,now(),now());
INSERT INTO product_lists VALUES (40, '5','11','1','1','2019-03-26','80','80',19.0,now(),now());
INSERT INTO product_lists VALUES (41, '5','11','2','2','2019-03-26','22','22',14.0,now(),now());
INSERT INTO product_lists VALUES (42, '5','11','3','3','2019-03-26','8','8',0.0,now(),now());
INSERT INTO product_lists VALUES (43, '5','12','1','1','2019-03-24','290','0',19.0,now(),now());
INSERT INTO product_lists VALUES (44, '5','12','2','2','2019-03-24','16','0',14.0,now(),now());
INSERT INTO product_lists VALUES (45, '5','12','3','3','2019-03-24','4','2',0.0,now(),now());

-- season 5 farmers 17-19
INSERT INTO product_lists VALUES (46, '5','17','1','1','2019-03-25','110','110',19.0,now(),now());
INSERT INTO product_lists VALUES (47, '5','17','2','2','2019-03-25','10','10',14.0,now(),now());
INSERT INTO product_lists VALUES (48, '5','17','3','3','2019-03-25','5','5',0.0,now(),now());
INSERT INTO product_lists VALUES (49, '5','18','1','1','2019-03-26','80','80',19.0,now(),now());
INSERT INTO product_lists VALUES (50, '5','18','2','2','2019-03-26','22','22',14.0,now(),now());
INSERT INTO product_lists VALUES (51, '5','18','3','3','2019-03-26','8','8',0.0,now(),now());
INSERT INTO product_lists VALUES (52, '5','19','1','1','2019-03-24','290','290',19.0,now(),now());
INSERT INTO product_lists VALUES (53, '5','19','2','2','2019-03-24','16','16',14.0,now(),now());
INSERT INTO product_lists VALUES (54, '5','19','3','3','2019-03-24','4','4',0.0,now(),now());

-- season 4 farmers 17-19
INSERT INTO product_lists VALUES (55, '4','17','1','1','2018-11-20','110','110',19.0,now(),now());
INSERT INTO product_lists VALUES (56, '4','17','2','2','2018-11-20','10','10',14.0,now(),now());
INSERT INTO product_lists VALUES (57, '4','17','3','3','2018-11-20','5','5',0.0,now(),now());
INSERT INTO product_lists VALUES (58, '4','18','1','1','2018-11-20','80','80',19.0,now(),now());
INSERT INTO product_lists VALUES (59, '4','18','2','2','2018-11-20','22','22',14.0,now(),now());
INSERT INTO product_lists VALUES (60, '4','18','3','3','2018-11-20','8','8',0.0,now(),now());
INSERT INTO product_lists VALUES (61, '4','19','1','1','2018-11-20','290','290',19.0,now(),now());
INSERT INTO product_lists VALUES (62, '4','19','2','2','2018-11-20','16','16',14.0,now(),now());
INSERT INTO product_lists VALUES (63, '4','19','3','3','2018-11-20','4','4',0.0,now(),now());