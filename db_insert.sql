-- USE `thenae_creations`

-- TRUNCATE TABLE `USERS`;

-- INSERT INTO `USERS` (`use_id`,`use_login`,`use_pwd`,`use_role`) VALUES (1, 'su', '1234', 1);
-- INSERT INTO `USERS` (`use_id`,`use_login`,`use_mdp`,`use_role`) VALUES (2, 'armelle', '1234', 2);

INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (1,"presentation1.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Des créations originales...");

INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (2,"presentation2.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Des matériaux qui vous ressemblent!");

INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (3,"presentation3.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Une créativité locale et artisanale");

INSERT INTO `SECTION`(`sec_id`, `sec_image`, `sec_text`, `sec_title`) VALUES (4,"presentation3.jpg","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.","Une créativité locale et artisanale");  

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

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (1, "Des sacs à main", "Sac à main jaune", "img-sacamain-sac1", 1, "sac1");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (2, "Des sacs à main", "Sac à main beige et rouge", "img-sacamain-sac2", 1, "sac2");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (3, "Des sacs à main", "Sac à main noir et gris", "img-sacamain-sac3", 1, "sac3");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (4, "Des sacs à main", "Sac à main beige et bleu", "img-sacamain-sac4", 1, "sac4");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (5, "Des sacs à main", "Sac à main motif léopard", "img-sacamain-sac5", 1, "sac5");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (6, "Des sacs à main", "Sac à main noir", "img-sacamain-sac6", 1, "sac6");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (7, "Des sacs à main", "Sac à main gris", "img-sacamain-sac7", 1, "sac7");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (8, "Des sacs à main", "Sac à main gris", "img-sacamain-sac8", 1, "sac8");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (9, "Des sacs à main", "Sac à main jean", "img-sacamain-sac9", 1, "sac9");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (10, "Des sacs à main", "Sac à main blanc/beige/rouge", "img-sacamain-sac10", 1, "sac10");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (11, "Des sacs à main", "Sac à main beige et gris", "img-sacamain-sac11", 1, "sac11");

INSERT INTO `CAROUSEL`(`car_id`, `car_title_carousel`, `car_title`, `car_location`, `car_type_img`, `car_image`) VALUES (12, "Des sacs à main", "Sac à main bleu/multicolor", "img-sacamain-sac12", 1, "sac12");

