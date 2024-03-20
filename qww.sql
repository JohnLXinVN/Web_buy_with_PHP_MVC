-- --------------------------------------------------------
-- Máy chủ:                      127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Phiên bản:           12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for xxshop
CREATE DATABASE IF NOT EXISTS `xxshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `xxshop`;

-- Dumping structure for table xxshop.binh_luan
CREATE TABLE IF NOT EXISTS `binh_luan` (
  `ma_bl` int NOT NULL AUTO_INCREMENT,
  `noi_dung` varchar(225) NOT NULL,
  `ma_hh` int NOT NULL DEFAULT '0',
  `ngay_bl` date NOT NULL DEFAULT '2022-01-01',
  `ma_kh` int DEFAULT NULL,
  PRIMARY KEY (`ma_bl`),
  KEY `ma_hh` (`ma_hh`),
  KEY `FK_binh_luan_khach_hang` (`ma_kh`),
  CONSTRAINT `FK_binh_luan_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `users` (`ma_kh`),
  CONSTRAINT `ma_hh` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.binh_luan: ~3 rows (approximately)
INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_hh`, `ngay_bl`, `ma_kh`) VALUES
	(18, 'Đẹp nha', 21, '2024-02-21', 1),
	(19, '123', 22, '2024-02-21', 1),
	(20, 'ok', 21, '2024-02-21', 7);

-- Dumping structure for table xxshop.category_new
CREATE TABLE IF NOT EXISTS `category_new` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.category_new: ~0 rows (approximately)

-- Dumping structure for table xxshop.chi_tiet_don_hang
CREATE TABLE IF NOT EXISTS `chi_tiet_don_hang` (
  `ma_ctdh` int NOT NULL AUTO_INCREMENT,
  `giam_gia` double(10,2) NOT NULL DEFAULT '0.00',
  `don_gia` double(10,2) NOT NULL DEFAULT '0.00',
  `so_luong` int NOT NULL DEFAULT '0',
  `ma_dh` int NOT NULL DEFAULT '0',
  `ma_bt` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ma_ctdh`),
  KEY `FK_chi_tiet_don_hang_don_hang` (`ma_dh`),
  KEY `FK_chi_tiet_don_hang_loai_bt` (`ma_bt`),
  CONSTRAINT `FK_chi_tiet_don_hang_don_hang` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`),
  CONSTRAINT `FK_chi_tiet_don_hang_loai_bt` FOREIGN KEY (`ma_bt`) REFERENCES `loai_bt` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.chi_tiet_don_hang: ~0 rows (approximately)

-- Dumping structure for table xxshop.danhmuc
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.danhmuc: ~2 rows (approximately)
INSERT INTO `danhmuc` (`id`, `name`) VALUES
	(5, 'trà xanh'),
	(10, 'vịt');

-- Dumping structure for table xxshop.danh_gia
CREATE TABLE IF NOT EXISTS `danh_gia` (
  `ma_dg` int NOT NULL,
  `xep_hang` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ma_hh` int NOT NULL DEFAULT '0',
  `ma_kh` int DEFAULT NULL,
  PRIMARY KEY (`ma_dg`),
  KEY `FK_danh_gia_hang_hoa` (`ma_hh`),
  KEY `FK_danh_gia_khach_hang` (`ma_kh`),
  CONSTRAINT `FK_danh_gia_hang_hoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  CONSTRAINT `FK_danh_gia_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `users` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.danh_gia: ~0 rows (approximately)

-- Dumping structure for table xxshop.don_hang
CREATE TABLE IF NOT EXISTS `don_hang` (
  `ma_dh` int NOT NULL,
  `ghi_chu` varchar(50) NOT NULL DEFAULT '',
  `ngay_dat` date DEFAULT NULL,
  `tong_tien` double(10,2) NOT NULL DEFAULT '0.00',
  `dia_chi` varchar(50) NOT NULL DEFAULT '',
  `ma_tt` bit(1) NOT NULL DEFAULT b'0',
  `ma_kh` int DEFAULT NULL,
  PRIMARY KEY (`ma_dh`),
  KEY `FK_don_hang_khach_hang` (`ma_kh`),
  CONSTRAINT `FK_don_hang_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `users` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.don_hang: ~0 rows (approximately)

-- Dumping structure for table xxshop.gio_hang
CREATE TABLE IF NOT EXISTS `gio_hang` (
  `ma_gh` int NOT NULL,
  `so_luong` int DEFAULT NULL,
  `ma_hh` int DEFAULT NULL,
  `ma_kh` int DEFAULT NULL,
  PRIMARY KEY (`ma_gh`),
  KEY `FK_gio_hang_hang_hoa` (`ma_hh`),
  KEY `FK_gio_hang_khach_hang` (`ma_kh`),
  CONSTRAINT `FK_gio_hang_hang_hoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  CONSTRAINT `FK_gio_hang_khach_hang` FOREIGN KEY (`ma_kh`) REFERENCES `users` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.gio_hang: ~0 rows (approximately)

-- Dumping structure for table xxshop.hang_hoa
CREATE TABLE IF NOT EXISTS `hang_hoa` (
  `ma_hh` int NOT NULL AUTO_INCREMENT,
  `ten_hh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `don_gia` double(10,2) NOT NULL DEFAULT '0.00',
  `giam_gia` double(10,2) DEFAULT '0.00',
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `dac_biet` tinyint(1) NOT NULL DEFAULT '0',
  `luot_xem` int NOT NULL DEFAULT '0',
  `ma_loai` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ma_hh`),
  KEY `FK_hang_hoa_loai_hang` (`ma_loai`),
  CONSTRAINT `FK_hang_hoa_loai_hang` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.hang_hoa: ~7 rows (approximately)
INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `luot_xem`, `ma_loai`) VALUES
	(19, 'Áo khoác nam ngăn UV và kháng khuẩn _ Gavani hoz sun, rain in life 5', 569000.00, 0.20, 'gvn16824_copy_c432ef6d2bb6449b900ab32ef049a368.webp', '2024-02-25', 'Mặt Vải mè Cool Air làm mát tức thì với chức năng kháng khuẩn, chống tia UV. \r\nSợi vải giúp hạn chế mùi cơ thể , mùi mồ hôi PLUS công nghệ thích hợp mọi hoàn cảnh khắc nghiệt.\r\nChỉ số UPF 50+ cao,  khả năng chống nắng, ngăn tia UV lên đến 98%.\r\n1 mặt Vải dù hạn chế thấm nước, bền màu, nhẹ, cản gió', 1, 2, 44),
	(20, 'Áo thun nam unisex form rộng, ngắn tay _ Gavani Akh Maze', 149000.00, 0.10, 'gvn17770-min_9f2b108e112545b786b723d0413b8842.webp', '2024-02-21', 'Maze không chỉ là một chiếc áo thun cổ tròn tay ngắn đơn giản mà với thiết kế form áo rộng cùng kiểu phối màu tinh tế từ vai đến tay áo cũng là điểm nhấn tuyệt vời tạo sự hài hòa và nổi bật cho người mặc.\r\nTính Linh Hoạt: Dễ dàng kết hợp với nhiều trang phục khác nhau, từ quần jean cá tính đến chân váy nữ tính, quần sort nam, áo thun Cotton 2 Chiều Phối Sọc Vai là sự lựa chọn đa năng cho mọi dịp.', 1, 3, 44),
	(21, 'Áo khoác nam chất liệu dù 2 lớp phối màu thời trang Gavani _ Hoz Mixing', 439000.00, 0.30, 'gvn17113-min_568aa7fefc914d5cb58cd373adc341c5.webp', '2024-02-22', 'Với áo phối màu thời trang cùng đường may tinh tế giúp Hoz Mixing không chỉ là sự chọn lựa về tính năng mà còn là biểu tượng thời trang phản ánh phong cách cá nhân.\r\nBo thun tay áo cùng nút chặn lai áo linh hoạt giúp bạn cảm thấy thoải mái hơn khi mặc.\r\nĐặc biệt, 2 túi ngoài với dây kéo an toàn và 1 túi trong tiện lợi giúp bạn dễ dàng di chuyển mà vẫn giữ được những vật dụng cần thiết.', 1, 6, 44),
	(22, 'Áo khoác nam UV chống nắng và kháng khuẩn _ hoz ultra-sun SJ2', 549000.00, 0.60, 'gavani14049-min_ee5d3936a8a342e7ac7191ebbf35f2da.webp', '2024-02-25', 'Vải thun Cá Xéo chống UV, Kháng khuẩn.\r\nMặt vải mềm mịn,độ co dãn cao, lâu phai màu khi sử dụng.\r\nCó phủ chất chống UV và ngăn ngừa vi khuẩn cho vải.\r\nMặt trái vải dệt nổi vân nhưng không cào nên mát mẻ, dễ chịu, không nóng.\r\nVải không chứa kim loại nặng, an toàn và thân thiện với môi trường.', 1, 3, 44),
	(23, 'Áo khoác nữ ngăn UV và kháng khuẩn _ Gavani hoz sun, rain in life 5', 649000.00, 0.30, 'gvn15877_copy_a55e50f5661042f983566bebd63479a2.webp', '2024-02-24', 'Mặt Vải mè Cool Air làm mát tức thì với chức năng kháng khuẩn, chống tia UV. \r\nSợi vải giúp hạn chế mùi cơ thể , mùi mồ hôi PLUS công nghệ thích hợp mọi hoàn cảnh khắc nghiệt.\r\nChỉ số UPF 50+ cao,  khả năng chống nắng, ngăn tia UV lên đến 98%', 1, 3, 45),
	(24, 'Áo thun nữ tank top, cổ tròn Gavani Abl Fluffy', 99000.00, 0.50, 'gvn16964-min_3a5ab718972f437e8bf77a9c4e1749e6.webp', '2024-02-24', 'Form tank top unisex. Nam nữ đều mặc được.\r\nThiết kế cá tính, với hình in cấu trúc thân trước áo mang nét dễ thường hài hòa, năng động phù hợp buổi đi chơi ngoài trời', 1, 2, 45),
	(25, 'Áo thun nữ form croptop dài tay _ Gavani akh Forever Mine', 149000.00, 0.70, 'gvn16175-min_e74b51b55f1c4f43b161a00cc9cb4c34.webp', '2024-02-24', 'Được thiết kế tinh tế, áo thun này không chỉ là sự kết hợp hoàn hảo giữa chất liệu cotton 2 chiều cao cấp mà còn mang đến cho bạn phong cách tối giản và sự thoải mái khi mặc.', 1, 2, 45);

-- Dumping structure for table xxshop.loai_bt
CREATE TABLE IF NOT EXISTS `loai_bt` (
  `id` int NOT NULL,
  `loai_bt` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.loai_bt: ~0 rows (approximately)

-- Dumping structure for table xxshop.loai_hang
CREATE TABLE IF NOT EXISTS `loai_hang` (
  `ma_loai` int NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`ma_loai`),
  UNIQUE KEY `ten_loai` (`ten_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.loai_hang: ~2 rows (approximately)
INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`) VALUES
	(44, 'Đồ Nam'),
	(45, 'Đồ nữ');

-- Dumping structure for table xxshop.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `ma_kh` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_users` (`ma_kh`),
  CONSTRAINT `FK_order_users` FOREIGN KEY (`ma_kh`) REFERENCES `users` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.order: ~0 rows (approximately)

-- Dumping structure for table xxshop.tin_tuc
CREATE TABLE IF NOT EXISTS `tin_tuc` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `author` text NOT NULL,
  `publish_date` date NOT NULL,
  `category_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tin_tuc_category_new` (`category_id`),
  CONSTRAINT `FK_tin_tuc_category_new` FOREIGN KEY (`category_id`) REFERENCES `category_new` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.tin_tuc: ~0 rows (approximately)

-- Dumping structure for table xxshop.users
CREATE TABLE IF NOT EXISTS `users` (
  `ma_kh` int NOT NULL AUTO_INCREMENT,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `kich_hoat` tinyint(1) NOT NULL DEFAULT '0',
  `hinh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `vai_tro` tinyint(1) NOT NULL DEFAULT '0',
  `user_name` varchar(50) NOT NULL,
  PRIMARY KEY (`ma_kh`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.users: ~12 rows (approximately)
INSERT INTO `users` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`, `user_name`) VALUES
	(1, '123', 'hoanganh1', 1, 'dseULSi.jpg', 'anh12@gmail.com', 1, 'anhhm'),
	(7, '123123', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, 'Hoàng'),
	(11, 'a', 'tesst', 1, '', '123123@gmail.com', 1, '123123'),
	(12, 'Ánh', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, 'Hoàng'),
	(13, '123123', '123', 1, 'ca1.jpg', 'anhhmph46019@fpt.edu.vn', 1, 'hoang'),
	(14, '123123', '123', 1, '156952.jpg', 'a@gmail.com', 0, 'anhhm'),
	(15, '123123', 'a', 1, NULL, 'as@gmail.com', 0, 'hoanganh'),
	(16, '', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, 'Hoàng'),
	(17, '', '123', 1, '', '123@gmail.com', 0, '123'),
	(18, '', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, '123'),
	(19, '', '123', 1, '', 'anhhmph46019@fpt.edu.vn', 0, 'Hoàng'),
	(20, '123', '123', 1, '', '123123@gmail.com', 0, '123123');

-- Dumping structure for table xxshop.variant
CREATE TABLE IF NOT EXISTS `variant` (
  `id` int NOT NULL,
  `variant_name` varchar(255) NOT NULL DEFAULT '',
  `variant_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `quantity` double(10,2) DEFAULT NULL,
  `ma_hh` int DEFAULT NULL,
  `loai_bt` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_variant_hang_hoa` (`ma_hh`),
  KEY `FK_variant_loai_bt` (`loai_bt`),
  CONSTRAINT `FK_variant_hang_hoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  CONSTRAINT `FK_variant_loai_bt` FOREIGN KEY (`loai_bt`) REFERENCES `loai_bt` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.variant: ~0 rows (approximately)

-- Dumping structure for table xxshop.voucher
CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int NOT NULL,
  `voucher_name` varchar(225) DEFAULT NULL,
  `voucher_code` varchar(225) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.voucher: ~0 rows (approximately)

-- Dumping structure for table xxshop.yeu_thich
CREATE TABLE IF NOT EXISTS `yeu_thich` (
  `id` int NOT NULL,
  `ma_hh` int DEFAULT NULL,
  `ma_kh` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_yeu_thich_hang_hoa` (`ma_hh`),
  KEY `FK_yeu_thich_users` (`ma_kh`),
  CONSTRAINT `FK_yeu_thich_hang_hoa` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  CONSTRAINT `FK_yeu_thich_users` FOREIGN KEY (`ma_kh`) REFERENCES `users` (`ma_kh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xxshop.yeu_thich: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
