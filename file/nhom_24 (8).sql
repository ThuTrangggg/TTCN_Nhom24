-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2023 lúc 01:15 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom_24`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `id` int(11) NOT NULL,
  `duan_id` int(11) NOT NULL,
  `nhanvien_id` int(11) NOT NULL,
  `tenbaocao` varchar(200) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `ngaylap` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baocao`
--

INSERT INTO `baocao` (`id`, `duan_id`, `nhanvien_id`, `tenbaocao`, `noidung`, `ngaylap`) VALUES
(1, 1, 5, 'Báo cáo game Stickman', 'báocáo.docx', '2023-05-18'),
(2, 2, 4, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietduan`
--

CREATE TABLE `chitietduan` (
  `id` int(11) NOT NULL,
  `nhanvien_id` int(11) DEFAULT NULL,
  `task` varchar(500) DEFAULT NULL,
  `phantram` varchar(255) DEFAULT NULL,
  `tiendo` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `pheduyet` varchar(255) DEFAULT NULL,
  `ngaybatdau` date DEFAULT NULL,
  `ngayketthuc` date DEFAULT NULL,
  `duan_id` int(11) NOT NULL,
  `ngaynop` datetime DEFAULT current_timestamp(),
  `loaifile` varchar(255) DEFAULT NULL,
  `ghichu` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietduan`
--

INSERT INTO `chitietduan` (`id`, `nhanvien_id`, `task`, `phantram`, `tiendo`, `file`, `pheduyet`, `ngaybatdau`, `ngayketthuc`, `duan_id`, `ngaynop`, `loaifile`, `ghichu`) VALUES
(1, 3, 'mkt', '20', 'Chậm tiến độ', 'file 123', 'Không phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-12 00:09:19', '', 'gc'),
(2, 6, 'GD', '20', 'Chậm tiến độ', 'file', 'Không phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-13 00:09:19', '', 'okddddđ'),
(4, 5, 'DEV', '20', 'Chậm tiến độ', 'file', 'phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-09 00:09:19', '', 'aaaaaaaaaaaaa'),
(6, 5, 'DEV123', '20000', 'Đúng tiến độ', 'file', 'Không phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-13 11:09:19', '', '122'),
(7, 3, 'mkt123', '20', 'Đúng tiến độ', 'file', 'Phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-13 00:19:19', '', 'rrrrffffffffffffffffff'),
(8, 8, ',m', '100%', 'Đúng tiến độ', 'cn', 'Không phê duyệt', '2023-06-01', '2023-06-28', 3, '2023-06-22 01:33:15', '', 'đã phê duyệt'),
(9, 3, 'mkt123', '43', 'ok', 'Đang làm nhá', 'Không phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-22 22:47:32', 'ý tưởng', 'dsadassssssssssssssss'),
(10, 3, 'mkt123', '52', 'Đúng tiến độ', 'notinew', 'Không phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-23 10:17:54', 'link', 'khong phe duyet nha'),
(11, 3, 'mkt123', '81', 'Đúng tiến độ', 'test noti', 'Phê duyệt', '2023-06-01', '2023-06-15', 3, '2023-06-23 16:52:49', 'link', 'phee duyet not');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhqc`
--

CREATE TABLE `chitietkhqc` (
  `id` int(11) NOT NULL,
  `duan_id` int(11) DEFAULT NULL,
  `KHQC_id` int(11) DEFAULT NULL,
  `noidung` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietkhqc`
--

INSERT INTO `chitietkhqc` (`id`, `duan_id`, `KHQC_id`, `noidung`) VALUES
(1, 1, 1, 'Trò chơi chiến đấu ragdoll stickman hay nhất. Tất cả người chơi sẽ có một phần của cuộc phiêu lưu anh hùng chiến tranh stickman, Chơi chống lại sự mù mờ trong các trò chơi chiến đấu stickman. Hãy từ b'),
(2, 3, 2, 'CapCut tích hợp các sticker động thuộc nhiều chủ đề như chữ cái, hoa lá, pháo hoa để người dùng chèn vào video để tạo hiệu ứng sinh động. Tính năng này giúp cho video của bạn sinh động và để lại ấn tư');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `chucvu` varchar(200) DEFAULT NULL,
  `mota` varchar(500) DEFAULT NULL,
  `tenviettat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `chucvu`, `mota`, `tenviettat`) VALUES
(1, 'Project Manager', 'Project Manager được các công ty, doanh nghiệp chỉ định và giao nhiệm vụ quản lý một dự án, chịu trách nhiệm lên kế hoạch, triển khai cho dự án đó hoàn thành các mục tiêu ban đầu. Là người làm việc giữa khách hàng và bộ phận công nghệ thông tin hay developer team.', 'PM'),
(2, 'Marketer', 'Làm việc trong lĩnh vực marketing, chịu trách nhiệm nghiên cứu, phân tích thị trường và lên chiến lược nhằm cung cấp sản phẩm và dịch vụ có giá trị đến khách hàng tiềm năng.\r\n\r\n', 'MKT'),
(3, 'Game Designer', 'Game designer/Thiết kế đồ hoạ game: Định hình trò chơi qua các đề xuất ý tưởng của bản thân về các nhân vật trong game, thể loại game, hay đối tượng game hướng đến, thiết kế các trình độ game hay bản đồ dành cho người chơi', 'GD'),
(4, 'Tester', 'Kiểm tra chất lượng phần mềm, phát hiện ra các lỗi, sai sót hay bất cứ vấn đề nào có thể ảnh hưởng đến chất lượng phần mềm.', 'TEST'),
(5, 'Developer', 'Viết mã code; tạo nên các chương trình, phần mềm và ứng dụng trên các thiết bị số\n- Tạo ra nền móng cho những phần mềm, ứng dụng. ', 'DEV');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duan`
--

CREATE TABLE `duan` (
  `id` int(11) NOT NULL,
  `loaiduan_id` int(11) NOT NULL,
  `tenduan` varchar(200) NOT NULL,
  `ngaylap` date NOT NULL DEFAULT current_timestamp(),
  `tinhtrang` varchar(200) NOT NULL,
  `hinhanh` varchar(500) NOT NULL,
  `mota` varchar(600) NOT NULL,
  `chiphi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `duan`
--

INSERT INTO `duan` (`id`, `loaiduan_id`, `tenduan`, `ngaylap`, `tinhtrang`, `hinhanh`, `mota`, `chiphi`) VALUES
(1, 2, 'Puzzle Defenders', '2021-07-15', 'Update', 'https://play-lh.googleusercontent.com/LdFBg-gWhcS0NE0YBdgbF6L4QEUKdJvjhNCMe0Ib3rg4X8PINaLxlUykOjVwUS0vC2E=w480-h960-rw', 'Nếu bạn là fan của Rise of Defenders hoặc đã từng chơi và yêu thích đồ họa của tựa game này thì không thể bỏ qua một siêu phẩm - Puzzle Defenders - một trong những series game trung cấp của Apero Game Studio.\r\n\r\nCũng là một dòng game chiến thuật, Puzzle Defender mang đến cho bạn những màn chơi khác nhau với các cấp độ từ dễ đến khó, thử thách người chơi vận dụng tư duy logic và sáng tạo để đánh bại lũ quái vật hung hãn. Nhiệm vụ của bạn là sử dụng các Anh hùng có sẵn, và sắp xếp vị trí dựa trên kỹ năng của từng anh hùng để tiêu diệt hết quái vật để vượt qua', '1200000000'),
(2, 2, 'Save the puppy: Pet dog rescue', '2021-04-21', 'Hoàn thành', 'https://play-lh.googleusercontent.com/YpuhJZ0D2UU73GJZabhvPj9vhfwfkWrXITZRFtMODa5KU-c18liHcqbMFSwxsbxsNew=w480-h960-rw', 'Cứu chó con: Giải cứu chó cưng là một trò chơi chó giải đố trí não tuyệt vời dành cho những người đang tìm kiếm thứ gì đó gây nghiện, vui nhộn và đầy thử thách với lối chơi đơn giản. Có hàng trăm cách để giải mọi câu đố, chỉ bằng cách vẽ các đường trên màn hình của bạn để cứu những chú chó dễ thương!', '420000000'),
(3, 1, 'Hero Craft: Stumble Race\r\n', '2021-05-25', 'Hoàn thành', 'https://play-lh.googleusercontent.com/UXhnuCnkqR4RJDLybO_Z3XHlKdRqoNpWQFrkJIQff10PQkHPJRjFk6ckvaEgSQR-Fw=w480-h960-rw', 'Bạn là một fan hâm mộ lớn của trò chơi thủ công giải đố? Sẵn sàng để có một số vấp ngã crafter? Vì vậy, trò chơi đụng độ này chính xác là dành cho bạn. Chào mừng bạn đến với cuộc đua vấp ngã mới nhất dành cho người khai thác Á hậu của bạn, một trò chơi chỉ dành cho một cộng đồng sôi động, Hero Craft: Stumble Race\r\n', '380000000'),
(4, 2, 'Alphabet Love: Merge Puzzle\r\n', '2022-10-16', 'chưa hoàn thành', 'https://play-lh.googleusercontent.com/kdLp_6Nc4px0EUUjfF3y3LUCwS_SDMEBoVIBfmuIj3lsaC7P0P3v9dKg7RxDldOezZm4=w480-h960-rw', 'Giới thiệu về trò chơi này\r\nYêu thích các nhân vật trong Bảng chữ cái và muốn vui vẻ với chúng?\r\n\r\nTìm kiếm một trò chơi hay khác với những trò chơi hợp nhất khác?\r\n\r\nCần một trò chơi để bạn và con bạn cùng nhau thưởng thức?\r\n', '500000000'),
(20, 4, 'Royal Color: Paint By Number\r\n', '2023-06-12', 'Royal Color: Paint By Number\r\n', 'https://play-lh.googleusercontent.com/7J8B7TUqX-rHYzdRo31bm6fJ1qWtlLwaUwjODwqxE_ivJn41xky8k5gaTsamJhLqqBo=w480-h960-rw', '? Một trò chơi chống căng thẳng cho thời gian thư giãn\r\n? Màu Hơn 1000 cuốn sách tô màu với nhiều thể loại\r\n\r\nGiảm căng thẳng với Paint By Number, một trò chơi tô màu cho phép bạn tạo ra cuốn sách tô màu thú vị của riêng mình. Với nguồn sách tô màu đa dạng, nó đáp ứng niềm đam mê của những người đam mê tô màu theo số ở nhiều thể loại, từ thiên nhiên, động vật đến con người, hoa lá, thực vật và tranh vẽ pixel bí ẩn.', '2000000000'),
(22, 2, 'Rise Of Defenders: Idle TD', '2023-06-20', 'hoàn thành ', 'https://play-lh.googleusercontent.com/U5ncMZa_6xYaxCYesSLFAl_LfRtaU8WvebsoHFon1lVEGREXCIrQN6W-0iYrlez3FYM=s96-rw', 'Chào mừng bạn đến với các trận chiến trong trò chơi chiến lược Rise of Warrior Defender. Rise of Warrior Defender là game chiến thuật phòng thủ với hệ thống nhân vật và anh hùng phong phú.\r\n\r\nTrong Rise of Warrior Defender, bạn có nhiệm vụ tuyển mộ và phát triển một đội quân anh hùng để phá hủy các tháp phòng thủ của đối phương. Khám phá thế giới vô tận và đánh bại kẻ thù để kiếm kho báu, củng cố quyền lực và thống trị vương quốc. Toàn bộ đội quân của kẻ thù đang tấn công mạnh mẽ vào hệ thống phòng thủ của bạn, hãy cố gắng tiêu diệt', '112000000'),
(23, 3, 'Math and Blast: Portal Defense\r\n', '2023-06-01', 'hoàn thành', 'https://play-lh.googleusercontent.com/XYwfgcQFtAkKWLJ_NhMJKur53yaluQWiw49e-lQCooTnto7n8OxQjztKpdWYAcToVQ=w480-h960-rw', 'Math and Blast - Chinh phục những con số\r\nBạn có phải là người yêu toán học không?\r\nBạn có thích trò chơi chiến lược không?\r\nThì bạn không thể bỏ qua một siêu phẩm trong dòng game giải đố Rise of Defenders. Với lối chơi ly kỳ và các cấp độ đầy thử thách của chúng tôi, hãy cố gắng nhanh chóng giành được nhiều điểm số và phần thưởng tuyệt vời, đồng thời trở thành bậc thầy về số lượng của chúng tôi.', '3000000'),
(24, 4, 'Drift and Pop\r\n', '2023-05-02', 'đang thực hiện ', 'https://play-lh.googleusercontent.com/s1T_WTkqqUHlAyFNX7xlcaYi-okJwoHWiOP3pf9aM1Xj2Ypzr3GzHqA7-ZwdYm__q-MP=w480-h960-rw', 'Giới thiệu về trò chơi này\r\nBạn có thích trôi dạt?\r\nNhững quả bóng bay đầy màu sắc có làm bạn thích thú và vui vẻ không?\r\nVì vậy, hãy nắm lấy tay lái của bạn và trở thành vua drift với Drift and Pop của chúng tôi - một trò chơi hành động ly kỳ đơn giản.\r\n?️ Bạn phải làm gì với trò chơi drift này? ?️\r\n?Thực hiện các pha trôi dự án xuất sắc để làm nổ tất cả các quả bóng bay', '500000000'),
(25, 3, 'Car Race: Tap Merge Idle\r\n', '2023-06-03', 'đang thực hiện', 'https://play-lh.googleusercontent.com/40gM9r8DFZgHQYo-aUKW5y6PAILXrlxTgrzUytidQzo7Li2qxSJBSUsGkEIgWfSosw=w480-h960-rw', 'Hợp nhất hợp nhất hợp nhất và chạm nhanh nhất có thể và trở thành chủ nhân của đấu trường cuộc đua ma thuật này.\r\nCách chơi trò chơi rất đơn giản: Lắp ráp ô tô và hợp nhất chúng lại với nhau để tạo ra một đế chế đua xe. Bạn chạm càng nhanh, tiền kiếm được càng nhanh. Kiếm tiền để nâng cấp đường đua của bạn, kiếm được nhiều tiền hơn và bạn sẽ có nhiều xe vip hơn để đua.\r\n?️TÍNH NĂNG TRÒ CHƠI HỢP NHẤT XE NÀY?️\r\n? Dễ chơi', '60000000'),
(26, 1, 'Coloring 3D: Painting Book\r\n', '2023-06-04', 'đang thực hiện ', 'https://play-lh.googleusercontent.com/GE0g-t6H3xpW4sxK9cnWgEYWB2geWNemFu7NyTxFVsSe6ew7dQcls7tDvgUqvOlLFwk=w480-h960-rw', 'Thay vì tốn công mua dụng cụ như màu, tranh, cọ thì giờ đây bạn không cần mua bất cứ thứ gì, chỉ cần một chiếc điện thoại thông minh và trò chơi Tô màu 3D của chúng tôi. Bạn có thể thoải mái sáng tạo những cuốn sách tô màu 3D nổi bật.\r\n\r\nTô màu 3D là trò chơi tô màu cho các bức tranh 3D, từ đơn giản đến phức tạp. Dựa vào màu gợi ý và tranh pixel art mẫu, người chơi sẽ tô màu giống mẫu theo phác thảo chính xác. Color 3D được coi là sự lựa chọn tuyệt vời để tăng cường trí thông minh và trí tưởng tượng. Với đồ họa đẹp mắt và lối chơi đơn giản, bạn sẽ không thể rời mắt khỏi trò chơi của chún', '7000000'),
(27, 3, 'Happy Journey: Draw To Fly\r\n', '2023-06-03', 'hoàn thành ', 'https://play-lh.googleusercontent.com/OUlIvL-0LWoIjtKEBNBC28F2jE0Kx46PRBnOEWgLMjldPqBFcd7ym0RxX44jh3YCPA=w480-h960-rw', 'Trải nghiệm hành trình hạnh phúc nhất với trò chơi Draw To Fly.\r\n\r\nKhơi dậy khả năng sáng tạo của bạn và vẽ những đường ngắn để giúp các nhân vật của bạn có một hành trình thú vị.\r\n\r\nBạn cần sự nhanh nhẹn và khéo léo để giúp nhân vật không bị rơi xuống và bị đại dương bao la nuốt chửng trong game vẽ này.', '900000000'),
(28, 1, 'Monster Makeover: Mix Monster\r\n', '2023-06-06', 'hoàn thành ', 'https://play-lh.googleusercontent.com/g8QRP8TGgkMrhkhcEM1cX19YGKdas4hBwpPXCPkfUmyQkRlIluYshdNIqsFHlexcwKY=w480-h960-rw', 'Bước vào một thế giới kỳ diệu nơi sự sáng tạo không có giới hạn và những sinh vật độc đáo đang chờ khám phá.\r\n\r\nMonster Makeover là một trò chơi thú vị và sáng tạo, nơi bạn trở thành người tạo ra quái vật và tạo ra những sinh vật độc đáo. Bạn có thể trộn quái vật, tùy chỉnh quái vật với màu sắc, hình dạng, kích cỡ, v.v. theo bất kỳ hình dạng nào bạn muốn.\r\n\r\n?Các tính năng thú vị của Mix Monster!?', '400000000'),
(29, 2, '2321', '2023-06-22', '1', '321', '213', '3123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `taikhoan_id` int(11) NOT NULL,
  `duan_id` int(11) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `taikhoan_id`, `duan_id`, `noidung`, `rate`, `date`, `img`) VALUES
(1, 9, 1, 'Game hay wa', 5, '2023-05-18', NULL),
(2, 9, 1, 'Game hay bình thường', 3, '2023-05-17', NULL),
(3, 12, 1, 'Cũng tạm', 4, '2023-05-17', NULL),
(4, 12, 3, 'ok nhé', 4, '2023-05-17', NULL),
(31, 9, 1, 'dsa', 4, '2023-06-15', ''),
(32, 9, 1, 'hfjkdshf', 4, '2023-06-15', ''),
(33, 1, 1, 'thùy xinh gái ', 5, '2023-06-15', ''),
(34, 1, 1, 'thủiui', 5, '2023-06-15', '324512414_1690531031362365_585894317410626104_n.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khqc`
--

CREATE TABLE `khqc` (
  `id` int(11) NOT NULL,
  `loaiKHQC` int(11) DEFAULT NULL,
  `tenKHQC` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khqc`
--

INSERT INTO `khqc` (`id`, `loaiKHQC`, `tenKHQC`) VALUES
(1, 1, 'Đưa ứng dụng Stickman Fight Battle Warra mắt thị trường '),
(2, 2, 'Quảng cáo chế độ đơn trên ứng dụng '),
(3, 3, 'Chương trình tham gia hoạt động off game '),
(4, 1, 'quảng cáo ứng dụng chat trên game');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiduan`
--

CREATE TABLE `loaiduan` (
  `id` int(11) NOT NULL,
  `ten_loai_du_an` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiduan`
--

INSERT INTO `loaiduan` (`id`, `ten_loai_du_an`) VALUES
(1, 'Game'),
(2, 'File'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhqc`
--

CREATE TABLE `loaikhqc` (
  `id` int(11) NOT NULL,
  `tenloaiKHQC` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaikhqc`
--

INSERT INTO `loaikhqc` (`id`, `tenloaiKHQC`) VALUES
(1, 'mạng xã hội'),
(2, 'website'),
(3, 'offline');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `ngaygui` date DEFAULT current_timestamp(),
  `dadoc` tinyint(1) DEFAULT NULL,
  `nguoigui` varchar(200) DEFAULT NULL,
  `nguoinhan` varchar(200) DEFAULT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `chucvu_id` int(11) DEFAULT NULL,
  `taikhoan_id` int(11) DEFAULT NULL,
  `ten` varchar(200) DEFAULT NULL,
  `gioitinh` varchar(200) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `cccd` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `chucvu_id`, `taikhoan_id`, `ten`, `gioitinh`, `ngaysinh`, `diachi`, `email`, `sdt`, `cccd`) VALUES
(1, 1, 1, 'Hoàng Thu Trang', 'Nữ', '2002-06-04', '762 Bạch Đằng, Hai Bà Trưng, Hà Nội', 'trangtrangg002@gmail.com', 988280852, 1302003200),
(3, 2, 2, 'Dương Thị Thùy', 'Nữ', '2002-12-31', '1194 đường Láng, Đống Đa, Hà Nội', 'duongthuy0907@gmail.com', 918472849, 1303004223),
(4, 5, 3, 'Nguyễn Thị Thùy', 'Nữ', '2001-10-10', '12 Chùa Bộc, Quang Trung, Đống Đa, Hà Nội', 'nguyenthuy@gmail.com', 988284771, 1302003043),
(5, 5, NULL, 'Nguyễn Thị A', 'Nữ', '1999-04-05', 'Ngõ 771 Hai Bà Trưng, Hoàn Kiếm, Hà Nội', 'thiA2000@gmail.com', 984718233, 1303003291),
(6, 3, NULL, 'Trần Văn B', 'Nam', '2000-01-01', 'số nhà 30, ngõ 84, đường Trần Khát Chân, HBT, HN', 'vanB@gmail.com', 988284775, 1302992841),
(7, 3, NULL, 'Nguyễn Văn C', 'Nam', '1998-04-10', 'số nhà 20, ngõ 84, đường Hoàng Quốc Việt, Cầu Giấy, HN', 'vanC@gmail.com', 988282441, 13023614),
(8, 4, NULL, 'Trần Thị D', 'Nữ', '1998-04-10', 'số nhà 10, ngõ 70, đường Nguyễn Bỉnh Khiêm, Nguyễn Du, HN', 'thiD@gmail.com', 988282241, 1302344612);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noti`
--

CREATE TABLE `noti` (
  `id` int(11) NOT NULL,
  `tenduan` varchar(224) DEFAULT NULL,
  `img` varchar(224) DEFAULT NULL,
  `loai` varchar(224) DEFAULT NULL,
  `tennhanvien` varchar(224) DEFAULT NULL,
  `text` varchar(224) DEFAULT NULL,
  `noti_status` int(1) DEFAULT NULL,
  `ngaylap` datetime NOT NULL DEFAULT current_timestamp(),
  `duan_id` int(11) DEFAULT NULL,
  `from_roleid` int(11) DEFAULT NULL,
  `to_userid` int(11) DEFAULT NULL,
  `to_roleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `noti`
--

INSERT INTO `noti` (`id`, `tenduan`, `img`, `loai`, `tennhanvien`, `text`, `noti_status`, `ngaylap`, `duan_id`, `from_roleid`, `to_userid`, `to_roleid`) VALUES
(21, 'Hero Craft: Stumble Race\r\n', 'https://play-lh.googleusercontent.com/UXhnuCnkqR4RJDLybO_Z3XHlKdRqoNpWQFrkJIQff10PQkHPJRjFk6ckvaEgSQR-Fw=w480-h960-rw', 'link', 'MKT_duongthuy', 'dự án', 1, '2023-06-23 16:52:49', 3, 2, NULL, 1),
(22, 'Hero Craft: Stumble Race\r\n', 'https://play-lh.googleusercontent.com/UXhnuCnkqR4RJDLybO_Z3XHlKdRqoNpWQFrkJIQff10PQkHPJRjFk6ckvaEgSQR-Fw=w480-h960-rw', 'link', 'PM_thutrang', 'Phê duyệt', 1, '2023-06-23 16:59:24', 3, 1, 2, NULL),
(23, 'Hero Craft: Stumble Race\r\n', 'https://play-lh.googleusercontent.com/UXhnuCnkqR4RJDLybO_Z3XHlKdRqoNpWQFrkJIQff10PQkHPJRjFk6ckvaEgSQR-Fw=w480-h960-rw', '', 'PM_thutrang', 'Phê duyệt', 0, '2023-06-23 18:13:50', 3, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(20) NOT NULL,
  `vitri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `vitri`) VALUES
(1, 'PM'),
(2, 'Nhân viên'),
(3, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) DEFAULT NULL,
  `ngaylap` date NOT NULL DEFAULT current_timestamp(),
  `tentaikhoan` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `img` varchar(500) NOT NULL,
  `role_id` int(20) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `unique_id`, `ngaylap`, `tentaikhoan`, `matkhau`, `email`, `img`, `role_id`, `status`) VALUES
(1, 1, '2023-05-18', 'PM_thutrang', '123', 'trangtrangg002@gmail.com', 'https://toigingiuvedep.vn/wp-content/uploads/2021/05/hinh-anh-avatar-trang.jpg', 1, 'Đang hoạt động'),
(2, 1, '2023-05-18', 'MKT_duongthuy', '123', 'duongthuy0907@gmail.com', 'https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2022/02/avatar-trang-tron.jpg?ssl\\\\u003d1', 2, 'Đang hoạt động'),
(3, 2, '2023-05-18', 'DEV_nguyenthuy', '123', 'nguyenthuy002@gmail.com', 'https://c3kienthuyhp.edu.vn/wp-content/uploads/2023/01/1672832395_134_45-Avatar-Trang-Xoa-Cute-Dep-Cho-FB-Nam-Nu.jpg', 2, ''),
(9, 1, '2023-05-18', 'user123', '123', 'user0908821234@gmail.com', 'https://ephoto360.com/uploads/worigin/2020/03/23/tao-avatar-mac-dinh-facebook-thay-nen-cuc-hot5e7838ae39057_96eb8aef68a3aa00523448390b49fbcb.jpg', 3, 'Đang hoạt động'),
(10, NULL, '2023-05-18', 'GD_vanb', '1234', 'vanB@gmail.com', '', 3, ''),
(11, NULL, '2023-05-18', 'TEST_thia', '12', 'thiA@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVcOkcFbUF_3YFQr1KyplE-zOyQJZsH9rN-w&usqp=CAU', 3, ''),
(12, NULL, '2023-05-18', 'taikhoan22020', '123', 'hihi@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVcOkcFbUF_3YFQr1KyplE-zOyQJZsH9rN-w&usqp=CAU', 3, ''),
(13, NULL, '2023-05-18', 'admin1', '1', 'admin@gmail.com', '', 1, 'Đang hoạt động'),
(14, NULL, '2023-05-18', 'admin2', '1', 'admin2@gmail.com', '', 2, ''),
(15, NULL, '2023-05-25', 'thuyxinhgai', 'thuy123', 'thuy@gmail.com', '', 1, ''),
(16, NULL, '2023-06-02', 'dsads', 'ád', 'dsa', '', 2, ''),
(17, NULL, '2023-06-02', 'd', 'd', 'd', '', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ytuong`
--

CREATE TABLE `ytuong` (
  `id` int(11) NOT NULL,
  `duan_id` int(11) DEFAULT NULL,
  `nhanvien_id` int(11) DEFAULT NULL,
  `tenytuong` varchar(200) DEFAULT NULL,
  `noidung` varchar(500) DEFAULT NULL,
  `ngaylap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ytuong`
--

INSERT INTO `ytuong` (`id`, `duan_id`, `nhanvien_id`, `tenytuong`, `noidung`, `ngaylap`) VALUES
(1, 1, 6, 'Stickman Fight Battle - ý tưởng ', 'Stickman Fight Battle là một trò chơi chiến đấu Stickman dựa trên vật lý. \r\nChiến đấu chống lại các Stickmans khác để trở thành huyền thoại trong Stickman Fight và nhận được những phần thưởng tuyệt vời trong các trò chơi chiến đấu. Trong trò chơi này, bạn phải thu thập các loại vũ khí chiến đấu tối cao để làm cho bạn mạnh mẽ hơn và nổi bật so với phần còn lại và trở thành huyền thoại Stickman giỏi nhất.', '2021-10-13'),
(2, 1, 6, 'Stickman Fight Battle - ý tưởng 2', 'Stickman Fight Battle là một trò chơi chiến đấu Stickman dựa trên vật lý. \nChiến đấu chống lại các Stickmans khác để trở thành huyền thoại trong Stickman Fight và nhận được những phần thưởng tuyệt vời trong các trò chơi chiến đấu. Trong trò chơi này, bạn phải thu thập các loại vũ khí chiến đấu tối cao để làm cho bạn mạnh mẽ hơn và nổi bật so với phần còn lại và trở thành huyền thoại Stickman giỏi nhất.', '2021-11-13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baocao_ibfk_1` (`duan_id`),
  ADD KEY `baocao_ibfk_2` (`nhanvien_id`);

--
-- Chỉ mục cho bảng `chitietduan`
--
ALTER TABLE `chitietduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_duan_id` (`duan_id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- Chỉ mục cho bảng `chitietkhqc`
--
ALTER TABLE `chitietkhqc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietkhqc_ibfk_1` (`duan_id`),
  ADD KEY `chitietkhqc_ibfk_2` (`KHQC_id`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duan_ibfk_1` (`loaiduan_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_ibfk_1` (`taikhoan_id`),
  ADD KEY `feedback_ibfk_2` (`duan_id`);

--
-- Chỉ mục cho bảng `khqc`
--
ALTER TABLE `khqc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khqc_ibfk_1` (`loaiKHQC`);

--
-- Chỉ mục cho bảng `loaiduan`
--
ALTER TABLE `loaiduan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaikhqc`
--
ALTER TABLE `loaikhqc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanvien_ibfk_1` (`chucvu_id`),
  ADD KEY `nhanvien_ibfk_2` (`taikhoan_id`);

--
-- Chỉ mục cho bảng `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tentaikhoan` (`tentaikhoan`),
  ADD KEY `taikhoan_ibfk_` (`role_id`);

--
-- Chỉ mục cho bảng `ytuong`
--
ALTER TABLE `ytuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ytuong_ibfk_1` (`duan_id`),
  ADD KEY `ytuong_ibfk_2` (`nhanvien_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baocao`
--
ALTER TABLE `baocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietduan`
--
ALTER TABLE `chitietduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chitietkhqc`
--
ALTER TABLE `chitietkhqc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `duan`
--
ALTER TABLE `duan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `khqc`
--
ALTER TABLE `khqc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaiduan`
--
ALTER TABLE `loaiduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaikhqc`
--
ALTER TABLE `loaikhqc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `noti`
--
ALTER TABLE `noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `ytuong`
--
ALTER TABLE `ytuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_ibfk_1` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`id`),
  ADD CONSTRAINT `baocao_ibfk_2` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `chitietduan`
--
ALTER TABLE `chitietduan`
  ADD CONSTRAINT `fk_duan_id` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`id`),
  ADD CONSTRAINT `fk_nhanvien_id` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `chitietkhqc`
--
ALTER TABLE `chitietkhqc`
  ADD CONSTRAINT `chitietkhqc_ibfk_1` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`id`),
  ADD CONSTRAINT `chitietkhqc_ibfk_2` FOREIGN KEY (`KHQC_id`) REFERENCES `khqc` (`id`);

--
-- Các ràng buộc cho bảng `duan`
--
ALTER TABLE `duan`
  ADD CONSTRAINT `duan_ibfk_1` FOREIGN KEY (`loaiduan_id`) REFERENCES `loaiduan` (`id`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`id`);

--
-- Các ràng buộc cho bảng `khqc`
--
ALTER TABLE `khqc`
  ADD CONSTRAINT `khqc_ibfk_1` FOREIGN KEY (`loaiKHQC`) REFERENCES `loaikhqc` (`id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`chucvu_id`) REFERENCES `chucvu` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`taikhoan_id`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `ytuong`
--
ALTER TABLE `ytuong`
  ADD CONSTRAINT `ytuong_ibfk_1` FOREIGN KEY (`duan_id`) REFERENCES `duan` (`id`),
  ADD CONSTRAINT `ytuong_ibfk_2` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
