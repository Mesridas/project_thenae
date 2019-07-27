-- USE `thenae_creations`

-- TRUNCATE TABLE `USERS`;



INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (1,"presentation1.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Des créations originales...");

INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (2,"presentation2.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Des matériaux qui vous ressemblent!");

INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (3,"presentation3.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Une créativité locale et artisanale");
 
INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (1, "Mes créations", "image1.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (2, "Mes créations", "image2.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (3, "Mes créations", "image3.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (4, "Mes créations", "image4.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (5, "Mes créations", "image5.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (6, "Mes créations", "image6.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (7, "Mes créations", "image7.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (8, "Mes créations", "image8.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (9, "Mes créations", "image9.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (10, "Mes créations", "image10.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (11, "Mes créations", "image11.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `GALLERY`(`gal_id`, `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES (12, "Mes créations", "image12.jpg", "nouveautes", "Fabrication Thénae Créations");

INSERT INTO `CATEGORIES`(`cat_id`, `cat_name`) VALUES (1 , "Des sacs à main");
INSERT INTO `CATEGORIES`(`cat_id`, `cat_name`) VALUES (2 , "Des pochettes");

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (1, "Sac à main jaune", "img-sacamain-sac1", 1, "sac1.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (2, "Sac à main beige et rouge", "img-sacamain-sac2", 1, "sac2.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (3, "Sac à main noir et gris", "img-sacamain-sac3", 1, "sac3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (4, "Sac à main beige et bleu", "img-sacamain-sac4", 1, "sac4.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (5, "Sac à main motif léopard", "img-sacamain-sac5", 1, "sac5.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (6, "Sac à main noir", "img-sacamain-sac6", 1, "sac6.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (7, "Sac à main gris", "img-sacamain-sac7", 1, "sac7.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (8, "Sac à main gris", "img-sacamain-sac8", 1, "sac8.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (9, "Sac à main jean", "img-sacamain-sac9", 1, "sac9.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (10, "Sac à main blanc/beige/rouge", "img-sacamain-sac10", 1, "sac10.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (11, "Sac à main beige et gris", "img-sacamain-sac11", 1, "sac11.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (12, "Sac à main bleu/multicolor", "img-sacamain-sac12", 1, "sac12.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (13, "Fabrication Thénae Créations", "pochettes", 1, "01.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (14, "Fabrication Thénae Créations", "pochettes", 1, "02.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (15, "Fabrication Thénae Créations", "pochettes", 1, "03.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (16, "Fabrication Thénae Créations", "pochettes", 1, "04.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (17, "Fabrication Thénae Créations", "pochettes", 1, "05.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (18, "Fabrication Thénae Créations", "pochettes", 1, "06.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (19, "Fabrication Thénae Créations", "pochettes", 1, "07.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (20, "Fabrication Thénae Créations", "pochettes", 1, "08.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (21, "Fabrication Thénae Créations", "pochettes", 1, "09.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (22, "Fabrication Thénae Créations", "pochettes", 1, "10.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (23, "Fabrication Thénae Créations", "pochettes", 1, "11.jpg", 2);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (24, "Fabrication Thénae Créations", "pochettes", 1, "12.jpg", 2);





INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (25, "Sac à main jaune", "img-sacamain-sac1", 0, "sac1_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (26, "Sac à main jaune", "img-sacamain-sac1", 0, "sac1_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (27, "Sac à main jaune", "img-sacamain-sac1", 0, "sac1_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (28, "Sac à main beige et rouge", "img-sacamain-sac2", 0, "sac2_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (29, "Sac à main beige et rouge", "img-sacamain-sac2", 0, "sac2_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (30, "Sac à main beige et rouge", "img-sacamain-sac2", 0, "sac2_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (31, "Sac à main noir et gris", "img-sacamain-sac3", 0, "sac3_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (32, "Sac à main noir et gris", "img-sacamain-sac3", 0, "sac3_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (33, "Sac à main noir et gris", "img-sacamain-sac3", 0, "sac3_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (34, "Sac à main beige et bleu", "img-sacamain-sac4", 0, "sac4_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (35, "Sac à main beige et bleu", "img-sacamain-sac4", 0, "sac4_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (36, "Sac à main beige et bleu", "img-sacamain-sac4", 0, "sac4_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (37, "Sac à main motif léopard", "img-sacamain-sac5", 0, "sac5_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (38, "Sac à main motif léopard", "img-sacamain-sac5", 0, "sac5_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (39, "Sac à main motif léopard", "img-sacamain-sac5", 0, "sac5_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (40, "Sac à main noir", "img-sacamain-sac6", 0, "sac6_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (41, "Sac à main noir", "img-sacamain-sac6", 0, "sac6_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (42, "Sac à main noir", "img-sacamain-sac6", 0, "sac6_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (43, "Sac à main gris", "img-sacamain-sac7", 0, "sac7_1", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (44, "Sac à main gris", "img-sacamain-sac7", 0, "sac7_2.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (45, "Sac à main gris", "img-sacamain-sac8", 0, "sac8_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (46, "Sac à main gris", "img-sacamain-sac8", 0, "sac8_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (47, "Sac à main gris", "img-sacamain-sac8", 0, "sac8_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (48, "Sac à main jean", "img-sacamain-sac9", 0, "sac9_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (49, "Sac à main jean", "img-sacamain-sac9", 0, "sac9_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (50, "Sac à main jean", "img-sacamain-sac9", 0, "sac9_3.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (51, "Sac à main jean", "img-sacamain-sac9", 0, "sac9_4.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (52, "Sac à main jean", "img-sacamain-sac9", 0, "sac9_5.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (53, "Sac à main blanc/beige/rouge", "img-sacamain-sac10", 0, "sac10_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (54, "Sac à main blanc/beige/rouge", "img-sacamain-sac10", 0, "sac10_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (55, "Sac à main blanc/beige/rouge", "img-sacamain-sac10", 0, "sac10_3.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (56, "Sac à main beige et gris", "img-sacamain-sac11", 0, "sac11_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (57, "Sac à main beige et gris", "img-sacamain-sac11", 0, "sac11_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (58, "Sac à main beige et gris", "img-sacamain-sac11", 0, "sac11_3.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (59, "Sac à main beige et gris", "img-sacamain-sac11", 0, "sac11_4.jpg", 1);

INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (60, "Sac à main bleu/multicolor", "img-sacamain-sac12", 0, "sac12_1.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (61, "Sac à main bleu/multicolor", "img-sacamain-sac12", 0, "sac12_2.jpg", 1);
INSERT INTO `CAROUSEL`(`car_id`, `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES (62, "Sac à main bleu/multicolor", "img-sacamain-sac12", 0, "sac12_3.jpg", 1);

INSERT INTO `ROLES` (`rol_id`, `rol_name`, `rol_power`) VALUES(1, 'Super Admin', 1);
INSERT INTO `ROLES` (`rol_id`, `rol_name`, `rol_power`) VALUES(2, 'Admin', 10);
INSERT INTO `ROLES` (`rol_id`, `rol_name`, `rol_power`) VALUES(3, 'Modérateur', 20);

INSERT INTO `USERS` (`use_id`, `use_login`, `use_pwd`, `use_role_fk`) VALUES(1,'su', PASSWORD('1234'), 1);
INSERT INTO `USERS` (`use_id`, `use_login`, `use_pwd`, `use_role_fk`) VALUES(2,'armelle', PASSWORD('1234'), 2);
INSERT INTO `USERS` (`use_id`, `use_login`, `use_pwd`, `use_role_fk`) VALUES(3,'test', PASSWORD('1234'), 3);
INSERT INTO `USERS` (`use_id`, `use_login`, `use_pwd`, `use_role_fk`) VALUES(4,'bibi', PASSWORD('1234'), 1);
