﻿# Host: localhost  (Version 5.5.5-10.1.29-MariaDB)
# Date: 2023-09-10 04:50:34
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tbl_admin"
#

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_admin"
#

INSERT INTO `tbl_admin` VALUES (1,'admin','admin');

#
# Structure for table "tbl_bahan"
#

DROP TABLE IF EXISTS `tbl_bahan`;
CREATE TABLE `tbl_bahan` (
  `id_bahan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_bahan"
#

INSERT INTO `tbl_bahan` VALUES (10,'Beras','kg',0.00),(11,'Bawang Merah','kg',15000.00),(12,'Bawang Putih','kg',0.00),(13,'Saos Tomat','kg',0.00),(14,'Lada Bubuk','Renteng',0.00),(15,'Kecap Manis','Botol',0.00),(16,'Kaldu Bubuk','Renteng',0.00),(17,'Telur','kg',0.00),(18,'ayam','kg',0.00),(19,'Minyak Goreng','Liter',0.00),(20,'garam','250 gram',0.00),(21,'lpg','3 kg',0.00);

#
# Structure for table "tbl_historipesan"
#

DROP TABLE IF EXISTS `tbl_historipesan`;
CREATE TABLE `tbl_historipesan` (
  `id_histori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_histori`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_historipesan"
#

INSERT INTO `tbl_historipesan` VALUES (12,'nasi goreng','30 Aug 2023','10','1424896.9'),(13,'nasi goreng','30 Aug 2023','10','1424896.9'),(14,'nasi goreng','30 Aug 2023','10','1424896.9'),(15,'nasi goreng','30 Aug 2023','2','284979.38');

#
# Structure for table "tbl_menu"
#

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_menu"
#

INSERT INTO `tbl_menu` VALUES (14,'nasi goreng',142489.69);

#
# Structure for table "tbl_pemulusan"
#

DROP TABLE IF EXISTS `tbl_pemulusan`;
CREATE TABLE `tbl_pemulusan` (
  `id_pemulusan` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `id_bahan` varchar(255) DEFAULT NULL,
  `harga_asli` varchar(255) DEFAULT NULL,
  `lefel` varchar(255) DEFAULT NULL,
  `trend` varchar(255) DEFAULT NULL,
  `seasonal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pemulusan`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_pemulusan"
#

INSERT INTO `tbl_pemulusan` VALUES (17,'2021','1','11','28000','','','-1083.3333333333'),(18,'2021','2','11','28000',NULL,NULL,'-1083.3333333333'),(19,'2021','3','11','28000',NULL,NULL,'-1083.3333333333'),(20,'2021','4','11','28000',NULL,NULL,'-1083.3333333333'),(21,'2021','5','11','30000',NULL,NULL,'916.66666666667'),(22,'2021','6','11','30000',NULL,NULL,'916.66666666667'),(23,'2021','7','11','30000',NULL,NULL,'916.66666666667'),(24,'2021','8','11','30000',NULL,NULL,'916.66666666667'),(25,'2021','9','11','30000',NULL,NULL,'916.66666666667'),(26,'2021','10','11','29000',NULL,NULL,'-83.333333333332'),(27,'2021','11','11','29000',NULL,NULL,'-83.333333333332'),(28,'2021','12','11','29000','29083.333333333','83.416666666667','-83.333333333332'),(30,'2021','1','10','12000',NULL,NULL,'-262.5'),(31,'2021','2','10','12000',NULL,NULL,'-262.5'),(32,'2021','3','10','12150',NULL,NULL,'-112.5'),(33,'2021','4','10','12500',NULL,NULL,'237.5'),(34,'2021','5','10','12000',NULL,NULL,'-262.5'),(35,'2021','6','10','13000',NULL,NULL,'737.5'),(36,'2021','7','10','12000',NULL,NULL,'-262.5'),(37,'2021','8','10','12000',NULL,NULL,'-262.5'),(38,'2021','9','10','12500',NULL,NULL,'237.5'),(39,'2021','10','10','12000',NULL,NULL,'-262.5'),(40,'2021','11','10','12000',NULL,NULL,'-262.5'),(41,'2021','12','10','13000','12262.5','83.416666666667','737.5'),(42,'2021','1','12','22000',NULL,NULL,'-1750'),(43,'2021','2','12','22000',NULL,NULL,'-1750'),(44,'2021','3','12','25000',NULL,NULL,'1250'),(45,'2021','4','12','25000',NULL,NULL,'1250'),(46,'2021','5','12','24000',NULL,NULL,'250'),(47,'2021','6','12','25000',NULL,NULL,'1250'),(48,'2021','7','12','24000',NULL,NULL,'250'),(49,'2021','8','12','24000',NULL,NULL,'250'),(50,'2021','9','12','22000',NULL,NULL,'-1750'),(51,'2021','10','12','22000',NULL,NULL,'-1750'),(52,'2021','11','12','25000',NULL,NULL,'1250'),(53,'2021','12','12','25000','23750','250.08333333333','1250'),(54,'2021','1','13','4000',NULL,NULL,'-229.16666666667'),(55,'2021','2','13','4000',NULL,NULL,'-229.16666666667'),(56,'2021','3','13','4000',NULL,NULL,'-229.16666666667'),(57,'2021','4','13','4000',NULL,NULL,'-229.16666666667'),(58,'2021','5','13','4000',NULL,NULL,'-229.16666666667'),(59,'2021','6','13','4250',NULL,NULL,'20.833333333333'),(60,'2021','7','13','4250',NULL,NULL,'20.833333333333'),(61,'2021','8','13','4250',NULL,NULL,'20.833333333333'),(62,'2021','9','13','4500',NULL,NULL,'270.83333333333'),(63,'2021','10','13','4500',NULL,NULL,'270.83333333333'),(64,'2021','11','13','4500',NULL,NULL,'270.83333333333'),(65,'2021','12','13','4500','4229.1666666667','41.75','270.83333333333'),(66,'2021','1','14','9500',NULL,NULL,'-104.16666666667'),(67,'2021','2','14','9500',NULL,NULL,'-104.16666666667'),(68,'2021','3','14','9500',NULL,NULL,'-104.16666666667'),(69,'2021','4','14','9500',NULL,NULL,'-104.16666666667'),(70,'2021','5','14','9500',NULL,NULL,'-104.16666666667'),(71,'2021','6','14','9500',NULL,NULL,'-104.16666666667'),(72,'2021','7','14','9500',NULL,NULL,'-104.16666666667'),(73,'2021','8','14','9750',NULL,NULL,'145.83333333333'),(74,'2021','9','14','9750',NULL,NULL,'145.83333333333'),(75,'2021','10','14','9750',NULL,NULL,'145.83333333333'),(76,'2021','11','14','9750',NULL,NULL,'145.83333333333'),(77,'2021','12','14','9750','9604.1666666667','20.916666666667','145.83333333333'),(78,'2021','1','15','6000',NULL,NULL,'-416.66666666667'),(79,'2021','2','15','6000',NULL,NULL,'-416.66666666667'),(80,'2021','3','15','6000',NULL,NULL,'-416.66666666667'),(81,'2021','4','15','6000',NULL,NULL,'-416.66666666667'),(82,'2021','5','15','6000',NULL,NULL,'-416.66666666667'),(83,'2021','6','15','6000',NULL,NULL,'-416.66666666667'),(84,'2021','7','15','6000',NULL,NULL,'-416.66666666667'),(85,'2021','8','15','7000',NULL,NULL,'583.33333333333'),(86,'2021','9','15','7000',NULL,NULL,'583.33333333333'),(87,'2021','10','15','7000',NULL,NULL,'583.33333333333'),(88,'2021','11','15','7000',NULL,NULL,'583.33333333333'),(89,'2021','12','15','7000','6416.6666666667','83.416666666667','583.33333333333'),(90,'2021','1','16','15000',NULL,NULL,'-500'),(91,'2021','2','16','15000',NULL,NULL,'-500'),(92,'2021','3','16','15000',NULL,NULL,'-500'),(93,'2021','4','16','15000',NULL,NULL,'-500'),(94,'2021','5','16','15000',NULL,NULL,'-500'),(95,'2021','6','16','15000',NULL,NULL,'-500'),(96,'2021','7','16','16000',NULL,NULL,'500'),(97,'2021','8','16','16000',NULL,NULL,'500'),(98,'2021','9','16','16000',NULL,NULL,'500'),(99,'2021','10','16','16000',NULL,NULL,'500'),(100,'2021','11','16','16000',NULL,NULL,'500'),(101,'2021','12','16','16000','15500','83.416666666667','500'),(102,'2021','1','17','25000',NULL,NULL,'2458.3333333333'),(103,'2021','2','17','22500',NULL,NULL,'-41.666666666668'),(104,'2021','3','17','20000',NULL,NULL,'-2541.6666666667'),(105,'2021','4','17','24500',NULL,NULL,'1958.3333333333'),(106,'2021','5','17','23000',NULL,NULL,'458.33333333333'),(107,'2021','6','17','20000',NULL,NULL,'-2541.6666666667'),(108,'2021','7','17','21000',NULL,NULL,'-1541.6666666667'),(109,'2021','8','17','22500',NULL,NULL,'-41.666666666668'),(110,'2021','9','17','22500',NULL,NULL,'-41.666666666668'),(111,'2021','10','17','22500',NULL,NULL,'-41.666666666668'),(112,'2021','11','17','22500',NULL,NULL,'-41.666666666668'),(113,'2021','12','17','24500','22541.666666667','-41.583333333333','1958.3333333333'),(114,'2021','1','18','40000',NULL,NULL,NULL),(115,'2021','2','18','40000',NULL,NULL,NULL),(116,'2021','3','18','40000',NULL,NULL,NULL),(117,'2021','4','18','40000',NULL,NULL,NULL),(118,'2021','5','18','40000',NULL,NULL,NULL),(119,'2021','6','18','40000',NULL,NULL,NULL),(120,'2021','7','18','40000',NULL,NULL,NULL),(121,'2021','8','18','35000',NULL,NULL,NULL),(122,'2021','9','18','35000',NULL,NULL,NULL),(123,'2021','10','18','35000',NULL,NULL,NULL),(124,'2021','11','18','35000',NULL,NULL,NULL),(125,'2021','12','18','35000',NULL,NULL,NULL),(126,'2021','1','19','11000',NULL,NULL,NULL),(127,'2021','2','19','12000',NULL,NULL,NULL),(128,'2021','3','19','11500',NULL,NULL,NULL),(129,'2021','4','19','12500',NULL,NULL,NULL),(130,'2021','5','19','11000',NULL,NULL,NULL),(131,'2021','6','19','13000',NULL,NULL,NULL),(132,'2021','7','19','12000',NULL,NULL,NULL),(133,'2021','8','19','11500',NULL,NULL,NULL),(134,'2021','9','19','11000',NULL,NULL,NULL),(135,'2021','10','19','12000',NULL,NULL,NULL),(136,'2021','11','19','11500',NULL,NULL,NULL),(137,'2021','12','19','12050',NULL,NULL,NULL),(138,'2021','1','20','1000',NULL,NULL,NULL),(139,'2021','2','20','1000',NULL,NULL,NULL),(140,'2021','3','20','1000',NULL,NULL,NULL),(141,'2021','4','20','1200',NULL,NULL,NULL),(142,'2021','5','20','1200',NULL,NULL,NULL),(143,'2021','6','20','1200',NULL,NULL,NULL),(144,'2021','7','20','1200',NULL,NULL,NULL),(145,'2021','8','20','1200',NULL,NULL,NULL),(146,'2021','9','20','1500',NULL,NULL,NULL),(147,'2021','10','20','1500',NULL,NULL,NULL),(148,'2021','11','20','1500',NULL,NULL,NULL),(149,'2021','12','20','1500',NULL,NULL,NULL),(150,'2021','1','21','16000',NULL,NULL,NULL),(151,'2021','2','21','16000',NULL,NULL,NULL),(152,'2021','3','21','16000',NULL,NULL,NULL),(153,'2021','4','21','16000',NULL,NULL,NULL),(154,'2021','5','21','16000',NULL,NULL,NULL),(155,'2021','6','21','16000',NULL,NULL,NULL),(156,'2021','7','21','16000',NULL,NULL,NULL),(157,'2021','8','21','16000',NULL,NULL,NULL),(158,'2021','9','21','16000',NULL,NULL,NULL),(159,'2021','10','21','16000',NULL,NULL,NULL),(160,'2021','11','21','16000',NULL,NULL,NULL),(161,'2021','12','21','16500',NULL,NULL,NULL),(162,'2023','09','10','13000','','','');

#
# Structure for table "tbl_pemulusanakhir"
#

DROP TABLE IF EXISTS `tbl_pemulusanakhir`;
CREATE TABLE `tbl_pemulusanakhir` (
  `id_pemulusanakhir` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `id_bahan` varchar(255) DEFAULT NULL,
  `harga_asli` varchar(255) DEFAULT NULL,
  `lefel` varchar(255) DEFAULT NULL,
  `trend` varchar(255) DEFAULT NULL,
  `seasonal` varchar(255) DEFAULT NULL,
  `hasilramal` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_pemulusanakhir`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_pemulusanakhir"
#

INSERT INTO `tbl_pemulusanakhir` VALUES (51,'2022','1','11','30000','30891.675','255.90916666666','-910.8408333333','30064.'),(52,'2022','2','11','30000','31089.758416667','250.12659166666','-1089.1159083333','30256.'),(53,'2022','3','11','35000','35608.988500833','677.03694091666','-656.4229840833','35202.'),(54,'2022','4','11','35000','number_format','658.79465115916','-1101.5756230908','35679.'),(55,'2022','5','11','35000','34351.239719533','417.67890357909','675.5509190866','35685.'),(56,'2022','6','11','40000','38651.891862311','805.97622749897','1304.9639905865','40374.'),(57,'2022','7','11','40000','39120.786808981','772.26809941605','882.95853858375','40809.'),(58,'2022','8','11','40000','39164.30549084','699.39315766031','843.79172491093','40780.'),(59,'2022','9','11','37000','36461.36986485','359.16027929531','576.43378830167','37737.'),(60,'2022','10','11','37000','37057.053014415','382.81256632223','-59.681046306411','37356.'),(61,'2022','11','11','37000','37118.986558074','350.72466405592','-115.42123559964','37386.'),(62,'2022','12','11','37000','37121.971122213','315.95065406426','-118.10734332499','37354.'),(68,'2022','1','10','12500','12720.841666667','120.90916666667','-225.0075','12579.'),(69,'2022','2','10','12500','12770.425083333','113.77659166667','-269.632575','12621.'),(70,'2022','3','10','12500','12639.6701675','89.323440916667','-136.95315075','12616.'),(71,'2022','4','10','13000','12759.149360842','92.339016159167','240.5155752425','13088.'),(72,'2022','5','10','13150','13356.3988377','142.83006222909','-212.00895393007','13236.'),(73,'2022','6','10','13000','12386.172889993','31.524461235466','626.19439900637','13155.'),(74,'2022','7','10','13500','13628.019735123','152.55669962491','-141.46776161055','13518.'),(75,'2022','8','10','14000','14214.307643475','195.92982049761','-219.1268791273','14147.'),(76,'2022','9','10','14500','14277.273746397','182.6334487401','224.20362824248','14697.'),(77,'2022','10','10','13000','13382.240719514','74.866801177738','-370.26664756236','13194.'),(78,'2022','11','10','13000','13281.960752069','57.352124315506','-280.01467686223','13076.'),(79,'2022','12','10','13500','12820.181287638','5.4389654408872','685.58684112538','13563.'),(93,'2022','1','13','4500','4683.3416666667','82.9925','-187.92416666667','4537.1'),(94,'2022','2','13','4500','4732.8834166667','79.647425','-232.51174166667','4583.3'),(95,'2022','3','13','5000','5187.5030841667','117.14464925','-191.66944241667','5075.4'),(96,'2022','4','13','5000','5236.7147733417','110.3513532425','-235.95996267417','5117.8'),(97,'2022','5','13','5000','5240.9566126584','99.740401849925','-239.77761805924','5111.5'),(98,'2022','6','13','5000','5015.3197014508','67.202670544174','-11.704397972417','5103.3'),(99,'2022','7','13','5000','4989.5022371995','57.900657064623','11.531319853782','5068.2'),(100,'2022','8','13','5000','4985.9902894264','51.759396580852','14.692072849562','5058.5'),(101,'2022','9','13','5000','4760.0249686007','23.986924840199','243.06086159268','5054.8'),(102,'2022','10','13','5000','4734.6511893441','19.050854430515','265.89726292365','5024.5'),(103,'2022','11','13','5000','4731.6202043775','16.842670490801','268.62514939362','5019.2'),(104,'2022','12','13','5000','4731.0962874868','15.106011752657','269.09667459519','5017.0'),(106,'2022','1','14','9750','9831.2583333333','41.534166666667','-83.54916666667','9768.6'),(107,'2022','2','14','9750','9856.02925','39.857841666667','-105.84299166667','9791.7'),(108,'2022','3','14','9750','9858.3387091667','36.103003416667','-107.92150491667','9790.2'),(109,'2022','4','14','9750','9858.1941712583','32.478249284167','-107.79142079917','9786.5'),(110,'2022','5','14','9750','9857.8172420543','29.192731435342','-107.4521845155','9782.8'),(111,'2022','6','14','9750','9857.450997349','26.236833821279','-107.12256428073','9779.5'),(112,'2022','7','14','10000','10082.118783117','46.079929015957','-84.323571471992','10024.'),(113,'2022','8','14','10000','9881.5698712133','21.417044923989','121.17044924136','10048.'),(114,'2022','9','14','10000','9859.0486916137','17.023222471633','141.43951088097','10021.'),(115,'2022','10','14','10000','9856.3571914085','15.051750203951','143.86186106565','10017.'),(116,'2022','11','14','10000','9855.8908941613','13.499945458827','144.2815285882','10015.'),(117,'2022','12','14','10000','9855.689083962','12.12976989302','144.46315776752','10013.'),(118,'2022','1','15','7000','7325.0083333333','165.90916666667','-334.17416666667','7074.2'),(119,'2022','2','15','7000','7424.09175','159.22659166667','-423.34924166667','7166.6'),(120,'2022','3','15','7000','7433.3318341667','144.22794091667','-431.66531741667','7160.8'),(121,'2022','4','15','8000','8332.7559775083','219.74756115917','-341.14704642417','8135.8'),(122,'2022','5','15','8000','8430.2503538668','207.52224267909','-428.89198514675','8221.1'),(123,'2022','6','15','8000','8438.7772596546','187.62270898997','-436.5662003558','8209.7'),(124,'2022','7','15','8000','8437.6399968645','168.74671181196','-435.54266384468','8189.7'),(125,'2022','8','15','8000','7535.6386708676','61.67190803108','476.25852955245','8180.6'),(126,'2022','9','15','8000','7434.7310578899','45.413955930195','567.07538123245','8063.4'),(127,'2022','10','15','8000','7423.014501382','39.700904686389','577.62028208952','8046.0'),(128,'2022','11','15','8000','7421.2715406068','35.556518140233','579.18894678718','8040.1'),(129,'2022','12','15','8000','7420.6828058747','31.941992852997','579.71880804609','8035.9'),(130,'2022','1','16','16000','16408.341666667','165.90916666667','-417.5075','16074.'),(131,'2022','2','16','16000','16507.425083333','159.22659166667','-506.682575','16166.'),(132,'2022','3','16','16000','16516.6651675','144.22794091667','-514.99865075','16160.'),(133,'2022','4','16','17000','17416.089310842','219.74756115917','-424.4803797575','17135.'),(134,'2022','5','16','17000','17513.5836872','207.52224267909','-512.22531848008','17221.'),(135,'2022','6','16','17000','17522.110592988','187.62270898997','-519.89953368912','17209.'),(136,'2022','7','16','17000','16620.973330198','78.746711811956','391.12400282199','17199.'),(137,'2022','8','16','17000','16519.972004201','60.771908031079','482.02519621913','17080.'),(138,'2022','9','16','17000','16508.074391223','53.504955930195','492.73304789911','17061.'),(139,'2022','10','16','17000','16506.157934715','47.962814686388','494.4578587562','17054.'),(140,'2022','11','16','17000','16505.41207494','43.091947240233','495.12913255384','17048.'),(141,'2022','12','16','18000','17404.850402218','128.726585244','585.63463800376','18033.'),(142,'2022','1','17','25000','22537.508333333','-37.84083333333','2462.0758333333','24958.'),(143,'2022','2','17','22000','22087.46675','-79.060908333333','-82.88674166667','21966.'),(144,'2022','3','17','21000','23388.340584167','58.93256591667','-2403.6731924167','20905.'),(145,'2022','4','17','20000','18582.227315008','-427.57201759083','1471.8287498258','20112.'),(146,'2022','5','17','24000','23002.965529742','57.259005641591','943.16435656575','23518.'),(147,'2022','6','17','24000','26193.522453538','370.58879745709','-2228.3368748512','24022.'),(148,'2022','7','17','24000','25643.9111251','278.5687848675','-1633.6866792563','24380.'),(149,'2022','8','17','24000','24229.747990997','109.29559297047','-210.9398585637','24297.'),(150,'2022','9','17','26000','25871.404358397','262.53167041342','111.56941077629','26092.'),(151,'2022','10','17','26000','26050.893602881','254.22742782051','-49.970909259579','26263.'),(152,'2022','11','17','26000','26068.01210307','230.51653505737','-65.377559429804','26256.'),(153,'2022','12','17','35000','32367.352863813','837.3989576259','2565.2157559018','35163.'),(154,'2022','1','18','35000','36027.691268054','1335.7837379285','-1033.255474582','36280.'),(155,'2022','2','18','37000','38011.347500598','1400.5709873901','-1018.5460838717','38328.'),(156,'2022','3','18','37000','38216.191848799','1280.9983234711','-1202.9059972523','38413.'),(157,'2022','4','18','37000','38224.719017227','1153.7512079668','-1210.5804488376','38295.'),(158,'2022','5','18','37000','36412.847022519','857.1888876994','620.10434639923','38186.'),(159,'2022','6','18','37000','36202.003591022','750.38565577971','809.86343474698','37869.'),(160,'2022','7','18','35000','34370.23892468','492.17062356757','658.45163445453','35779.'),(161,'2022','8','18','35000','33487.508333333','-422.0075','1452.9091666667','33982.'),(162,'2022','9','18','35000','34133.329471905','377.05723951077','871.67014195216','35427.'),(163,'2022','10','18','35000','35026.038671142','428.62243548335','-31.768137360747','35371.'),(164,'2022','11','18','37000','36920.466110662','575.20293588711','63.247167070424','37412.'),(165,'2022','12','18','37000','37124.566904655','538.09272169764','-120.4435475228','37579.'),(166,'2022','1','19','11500','15091.265962635','-1719.0466446741','-3340.472699705','12288.'),(167,'2022','2','19','12500','13562.221931796','-1700.0463832906','-1064.3330719498','10778.'),(168,'2022','3','19','11500','12511.217554851','-1635.1421826561','-1018.4291326988','9792.7'),(169,'2022','4','19','11500','12412.607537219','-1481.4889661536','-929.6801168308','9847.7'),(170,'2022','5','19','11500','10618.111857107','-1512.7896375495','885.36599527075','10021.'),(171,'2022','6','19','11750','10660.532221956','-1357.2686373097','1072.1876669065','10219.'),(172,'2022','7','19','11500','10455.326358465','-1242.0623599278','1031.8729440485','10129.'),(173,'2022','8','19','12000','10896.326399854','-1073.7561197961','1084.9729067984','10739.'),(174,'2022','9','19','12000','10957.257028006','-960.28744500129','1030.1353414615','10913.'),(175,'2022','10','19','11500','11424.6969583','-817.5147074717','59.439404196265','10523.'),(176,'2022','11','19','12500','12385.718225083','-639.66111004628','94.520264092079','11662.'),(177,'2022','12','19','11500','11599.605711504','-654.30625039958','-97.978473686626','10861.'),(178,'2022','1','20','1500','3419.5299461104','-1406.8832018989','-1835.9102848327','929.31'),(179,'2022','2','20','1500','2526.2646744211','-1355.521408878','-1031.9715403123','87.409'),(180,'2022','3','20','1500','2442.0743265543','-1228.3883027769','-956.20022723219','130.35'),(181,'2022','4','20','1500','2446.3686023777','-1105.1200449168','-960.06507547327','257.91'),(182,'2022','5','20','2000','1109.1248557461','-1128.3324150883','893.45429649519','897.45'),(183,'2022','6','20','2000','973.07924406577','-1029.1037347475','1015.8953470075','860.64'),(184,'2022','7','20','2000','969.39755093182','-926.56153058616','1019.208870828','959.50'),(185,'2022','8','20','2000','979.28360203456','-832.91677241727','1010.3114248356','1063.0'),(186,'2022','9','20','2000','989.63668296173','-748.58978708282','1000.9936520011','1157.7'),(187,'2022','10','20','2000','1899.1046895879','-582.78400771193','82.472446037567','1232.9'),(188,'2022','11','20','2500','2456.6320681876','-468.75286908076','30.697805297831','1904.5'),(189,'2022','12','20','2500','2523.7879199107','-415.16199700038','-29.742461252947','2025.2'),(190,'2022','1','21','16500','16035.862592291','977.56166993769','309.39033360477','15930.'),(191,'2022','2','21','16500','17526.342426223','1028.8534863371','-1032.0415169339','17471.'),(192,'2022','3','21','16500','17680.519591256','941.38585420671','-1170.8009654637','17538.'),(193,'2022','4','21','16500','17687.190544546','847.91436411506','-1176.8048234249','17451.'),(194,'2022','5','21','16500','15878.510490866','582.25492233555','651.00722488715','17377.'),(195,'2022','6','21','16500','15671.07654132','503.2860351474','837.69777947852','17091.'),(196,'2022','7','21','16500','15642.436257647','450.09340326532','863.47403478459','17009.'),(197,'2022','8','21','17000','16084.252966091','449.26573378323','915.83899718458','17450.'),(198,'2022','9','21','17000','16128.351869987','408.74905079453','876.14998367797','17453.'),(199,'2022','10','21','17000','17028.710092078','457.90996792415','-34.172416203709','17403.'),(200,'2022','11','21','17000','17123.662006','421.61416252394','-119.62913873354','17461.'),(201,'2022','12','21','17000','17129.527616852','380.03930735677','-124.90818850051','17426.'),(216,'2022','1','12','28000','29175.008333333','767.57583333333','-1232.5075','28192.'),(217,'2022','2','12','28000','29769.258416667','750.24325833333','-1767.332575','28769.'),(218,'2022','3','12','30000','28926.9501675','590.98810758333','1090.74484925','30767.'),(219,'2022','4','12','30000','28826.793827508','521.87366282583','1180.8855552425','30598.'),(220,'2022','5','12','28000','27909.866749033','377.99358869576','106.11992586993','28537.'),(221,'2022','6','12','28000','26903.786033773','239.58615830013','1111.5925696044','28393.'),(222,'2022','7','12','25000','24989.337219207','24.182661013558','34.596502713427','25263.'),(223,'2022','8','12','25000','24776.351988022','0.46587179368036','226.28321078012','25026.'),(224,'2022','9','12','25000','26552.681785982','178.05226441026','-1572.4136073834','24980.'),(225,'2022','10','12','27000','28548.073405039','359.786199875','-1568.2660645353','27157.'),(226,'2022','11','12','27000','26065.785960491','75.57883543272','965.79263555772','27391.'),(227,'2022','12','12','25000','23989.136479592','-139.64399620045','1034.7771683668','25099.'),(228,'2023','1','10','13500','','','','12600.');

#
# Structure for table "tbl_periode"
#

DROP TABLE IF EXISTS `tbl_periode`;
CREATE TABLE `tbl_periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `id_bahan` varchar(255) DEFAULT NULL,
  `harga_asli` varchar(255) DEFAULT NULL,
  `harga_ramal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_periode"
#

INSERT INTO `tbl_periode` VALUES (1,'2020','1','1','24000',NULL),(2,'2020','2','1','19500',NULL),(3,'2020','3','1','19000',NULL),(4,'2020','4','1','19150',NULL),(5,'2020','5','1','18000',NULL),(6,'2020','6','1','20000',NULL),(7,'2020','7','1','19000',NULL),(8,'2020','8','1','21000',NULL),(9,'2020','9','1','19500',NULL),(10,'2020','10','1','19000',NULL),(11,'2020','11','1','19000',NULL),(12,'2020','12','1','17000',NULL),(13,'2021','1','1','33000',NULL),(14,'2021','2','1','30000',NULL),(15,'2021','3','1','33500',NULL),(16,'2021','4','1','30250',NULL),(17,'2021','5','1','36000',NULL),(18,'2021','6','1','37000',NULL),(19,'2021','7','1','35000',NULL),(20,'2021','8','1','33000',NULL),(21,'2021','9','1','30000',NULL),(22,'2021','10','1','36500',NULL),(23,'2021','11','1','52000',NULL),(24,'2021','12','1','37500',NULL);

#
# Structure for table "tbl_resep"
#

DROP TABLE IF EXISTS `tbl_resep`;
CREATE TABLE `tbl_resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(255) DEFAULT NULL,
  `id_bahan` varchar(255) DEFAULT NULL,
  `takaran` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Data for table "tbl_resep"
#

INSERT INTO `tbl_resep` VALUES (3,'12','11',0.25),(6,'14','10',2.00),(7,'14','11',0.25),(8,'14','12',0.25),(9,'14','14',1.00),(10,'14','13',0.50),(11,'14','15',0.25),(12,'14','20',1.00),(13,'14','16',1.00),(14,'14','17',0.50),(15,'14','18',0.25),(16,'14','19',0.13),(17,'14','21',1.00);
