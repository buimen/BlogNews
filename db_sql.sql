-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 05:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` text,
  `categoryParent` int(11) DEFAULT NULL,
  `memberEditCategory` int(11) NOT NULL,
  `datetimeEditCategory` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryParent`, `memberEditCategory`, `datetimeEditCategory`) VALUES
(1, 'PHP', 0, 0, '0000-00-00 00:00:00'),
(2, 'Java', 0, 0, '0000-00-00 00:00:00'),
(3, '.Net', 0, 0, '0000-00-00 00:00:00'),
(4, 'MySQL', 0, 0, '0000-00-00 00:00:00'),
(5, 'Javascript', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelID` int(11) NOT NULL,
  `levelName` text,
  `levelAccess` text,
  `memberEditLevel` int(11) NOT NULL,
  `datetimeEditLevel` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelID`, `levelName`, `levelAccess`, `memberEditLevel`, `datetimeEditLevel`) VALUES
(1, 'Admin', 'Toàn bộ hệ thống', 0, '0000-00-00 00:00:00'),
(2, 'Guest', 'Viết bài', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `levelID` int(11) NOT NULL,
  `memberUser` text,
  `memberPass` text,
  `memberImage` varchar(255) NOT NULL,
  `memberEdit` int(11) NOT NULL,
  `datetimeEdit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `levelID`, `memberUser`, `memberPass`, `memberImage`, `memberEdit`, `datetimeEdit`) VALUES
(1, 1, 'Admin', '123456', 'admin-account-dnn7.png', 0, '0000-00-00 00:00:00'),
(2, 2, 'Naruto', '012345', 'Naruto_Uzumaki.png', 0, '0000-00-00 00:00:00'),
(3, 2, 'Sakura', '345678', 'Sakura_child.png', 0, '0000-00-00 00:00:00'),
(4, 2, 'Sasuke', '234567', 'uchiha-sasuke.jpeg', 0, '0000-00-00 00:00:00'),
(5, 2, 'Kai', '112233', 'Kai.jpeg', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `newsTitle` text,
  `newsContent` text,
  `newsImage` text,
  `newsTag` text,
  `newsDatetime` datetime DEFAULT NULL,
  `newsView` int(11) DEFAULT NULL,
  `newsSummary` varchar(120) NOT NULL,
  `memberEditNews` int(11) NOT NULL,
  `datetimeEditNews` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsID`, `categoryID`, `memberID`, `newsTitle`, `newsContent`, `newsImage`, `newsTag`, `newsDatetime`, `newsView`, `newsSummary`, `memberEditNews`, `datetimeEditNews`) VALUES
(14, 1, 1, 'Hướng dẫn cài đặt Vertrigo Server', '<h2 id="goto-h2-0" data-stt="0">1. Các bước cài đặt Vertrigo Server</h2>\r\n\r\n<p><strong>Bước 1</strong>: Download Vertrigo Server&nbsp;2.27 <a href="http://vertrigo.sourceforge.net/" rel="nofollow">tại đây</a>.</p>\r\n\r\n<p><strong>Bước 2</strong>: Bạn chạy file setup <strong>Vertrigo_227.exe</strong> vừa download</p>\r\n\r\n<p><strong>Bước 3</strong>: Giao diện sẽ như sau, bạn click Next</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-1.png" style="height:390px; width:504px"></p>\r\n\r\n<p><strong>Bước 4</strong>: Click Agree để đồng ý với những điều khoản</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-2.png" style="height:390px; width:504px"></p>\r\n\r\n<p><strong>Bước 5</strong>: Click Next</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-3.png" style="height:390px; width:504px"></p>\r\n\r\n<p><strong>Bước 6</strong>: Chọn đường dẫn cài đặt. Click Next.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-4.png" style="height:390px; width:504px"></p>\r\n\r\n<p><strong>Bước 7</strong>: Click Install. Tiến trình cài đặt <strong>vertrigo server</strong>&nbsp;sẽ chạy mất một khoảng thời gian.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-5.png" style="height:390px; width:504px"></p>\r\n\r\n<p><strong>Bước 8</strong>: Sau khi cài đặt xong bạn click vào <strong>Run Vertrigo Server </strong>và click <strong>Finish</strong>.\r\n Hãy nhớ rằng trước khi nhấn Finish bạn phải tắt skype đi nhé, vì nó \r\nchiếm cổng 80&nbsp;(cổng mặc định để chạy Server). Sau này mỗi lần chạy \r\nVertrigo bạn phải tắt Skype hoặc bạn đổi cổng cho Skype qua một cổng \r\nkhác.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-6.png" style="height:390px; width:504px"></p>\r\n\r\n<p><strong>Bước 9</strong>: Sau khi hoàn tất bạn mở một trình duyệt bấy \r\nkì rồi gõ vào localhost. Nếu giao diện hiện ra như sau là bạn đã cài đặt\r\n thành công.</p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://freetuts.net/upload/tut_post/images/2014/08/02/1/cao-dat-vertrigo-server-buoc-7.png" style="height:390px; width:504px"></p>\r\n\r\n<h2 id="goto-h2-1" data-stt="1">2. Thư mục chứa source của ứng dụng</h2>\r\n\r\n<p>Nơi chứa source chạy ứng dụng nằm trong thư mục &nbsp;<strong>www </strong>mà bạn đã Install (<em>đường dẫn bạn chọn ở bước 6</em>).\r\n Bạn vào đó và xóa hết tất cả các files, folders để tiện làm việc sau \r\nnày hơn. Sau khi xóa bạn ra trình duyệt gõ lại đường dẫn localhost thì \r\ntrình duyệt thông báo không tìm thấy, lý do là bạn đã xóa hết các file \r\ntrong thư mục <strong>www</strong> rồi.</p>\r\n\r\n<p>Thư mục <strong>www</strong> này rất quan trọng sau này tôi nói tạo file mới thì bạn nhớ là tạo trong này nhé.</p>\r\n\r\n<h2 id="goto-h2-2" data-stt="2">3. Lời kết</h2>\r\n\r\n<p>Kết thúc bài này là bạn có thể <strong>tự cài đặt vertrigo server&nbsp;</strong>cho\r\n riêng mình được rồi đấy. Nếu bạn không muốn xài vertrigo server&nbsp;thì có \r\nthể chọn một số phần mềm khác như Wamp hay Xampp. Bài tiếp theo chúng ta\r\n sẽ tìm hiểu <a href="http://freetuts.net/khai-bao-bien-va-hang-so-trong-php-2.html" title="biến và hằng số trong php">cách khai báo biến và hằng số trong php</a>.</p>        \r\n        ', 'vertrigoserv-2.jpeg', 'PHP vertrigo server', '2016-06-03 00:00:00', 2, 'Như ta biết thì PHP là một ngôn ngữ chạy trên Server nên ta cần một Server ảo để biên dịch những dòng lệnh đó.', 0, '0000-00-00 00:00:00'),
(15, 1, 2, 'Các kiểu dữ liệu trong PHP', '<p><strong>Trong php có tổng cộng 7 kiểu dữ liệu:</strong></p>\r\n\r\n<ul><li>Kiểu INT</li><li>Kiểu Boolean</li><li>Kiểu Số Thực (float, double)</li><li>Kiểu Chuỗi</li><li>Kiểu Mảng (array)</li><li>Kiểu NULL</li><li>Kiểu Đối Tượng (object)</li></ul>\r\n\r\n<h2 id="goto-h2-0" data-stt="0">1. Kiểu dữ liệu INT</h2>\r\n\r\n<p>Chữ INT là viết tắt của chữ INTEGER, là một kiểu dữ liệu dạng số và có thể ở viết ở nhiều cơ số khác nhau.</p>\r\n\r\n<p><strong>Ví dụ 1:</strong></p>\r\n\r\n<div><div id="highlighter_377898" class="syntaxhighlighter  php"><br></div></div>\r\n\r\n<p>Kiểu số INT Chúng ta không dùng dấu nháy để bao quanh nó và kích \r\nthước của kiểu INT là 32bit. Trong PHP không hỗ trợ nhiều kiểu Unsigned \r\nInteger (Số nguyên dương) nên nếu bạn sử dụng vượt quá giới hạn của nó \r\nthì mặc nhiên trình biên dịch sẽ hiểu đây là kiểu Float (số thực), tuy \r\nnhiên không phải lúc nào điều này cũng đúng cho trường hợp số dương.</p>\r\n\r\n<h3 id="goto-h3-0">Khai báo biến kiểu INT</h3>\r\n\r\n<p>Để khai báo một biến kiểu INT bạn sẽ gán giá trị cho nó là số nguyên (kể cả số âm).</p>\r\n\r\n<p><strong>Ví dụ 2:</strong></p>\r\n\r\n<div><div id="highlighter_958485" class="syntaxhighlighter  php"><br></div></div>\r\n\r\n<h3 id="goto-h3-1">Ép dữ liệu sang kiểu INT</h3>\r\n\r\n<p><strong>Cú Pháp</strong>: <code>(int)$ten_bien;</code></p>\r\n\r\n<p><strong>Ví dụ 3:</strong></p>\r\n\r\n<div><div id="highlighter_38396" class="syntaxhighlighter  php"><br></div></div>\r\n\r\n<p>Việc chuyển đổi này trong PHP đôi khi lại không cần thiết vì các kiểu\r\n dữ liệu trong php tự động chuyển các biến sang các kiểu thích hợp để \r\nthực hiện phép tính, tuy nhiên sau khi thực hiện tính toán thì biến đó \r\nsẽ tự chuyển lại kiểu dữ liệu ban đầu.</p>\r\n\r\n<p><strong>Ví dụ 4:</strong></p>\r\n\r\n<div><div id="highlighter_667520" class="syntaxhighlighter  php"><br></div></div>\r\n\r\n<p>Trong ví dụ này các bạn thấy biến <code>$a</code> là chuỗi còn biến <code>$b</code>\r\n là số, khi ta cộng 2 biến lại thì các biến sẽ tự động chuyển sang kiểu \r\nsố INT thích hợp để cộng, và kết quả là kiểu INT gán vào biến <code>$c</code>. Để kiểm tra bạn dùng dòng lệnh <code>var_dump(is_int($c)); </code>để xuất ra màn hình kết quả kiểm tra.</p>\r\n\r\n<p><strong>Ví dụ 5:</strong></p>\r\n\r\n<div><div id="highlighter_603754" class="syntaxhighlighter  php"><br></div></div>\r\n\r\n<p>Chạy đoạn lệnh này các bạn sẽ thấy kết quả ra số 0. Tại sao? vì bạn thấy biến <code>$a</code>\r\n có ký tự đầu tiên không phải ở dạng số nên nó sẽ tự động cắt bỏ tất cả \r\nnhững ký tự đằng sau ký tự a nên chuỗi này rỗng, mà giá trị rỗng chuyển \r\nsang kiểu INT có giá trị bằng không.</p>\r\n\r\n<p><strong>Ví dụ 6:</strong></p>\r\n\r\n<div><div id="highlighter_272777" class="syntaxhighlighter  php"><br></div></div>\r\n\r\n<p>Chạy đoạn code này kết quả xuất ra màn hình là 123, cũng như giải \r\nthích ở trên nó sẽ xóa các ký tự bắt đầu từ ký tự a nên chuỗi sẽ còn \r\n’123′, chuyển sang kiểu INT &nbsp;thành 123.</p>\r\n\r\n<h3 id="goto-h3-2">Kiểm tra dữ liệu có phải kiểu INT.</h3>\r\n\r\n<p>Để kiểm tra một biến nào đó có phải kiểu INT không bạn dùng 2 hàm <code>is_int($bien)</code> hoặc <code>is_integer($bien).</code> kết quả trả về giá trị <strong>True </strong>nếu là kiểu INT và <strong>False </strong>nếu không phải kiểu INT.</p><h2 id="goto-h2-6" data-stt="6">7. Kiểu Object (Đối Tượng)</h2>\r\n\r\n<p>Riêng <strong>kiểu đối tượng (Object)</strong> thì nó liên quan đến \r\nphần OOP(Lập trình hướng đối tượng) nên tạm thời các bạn chưa quan tâm \r\nnó vội, qua bài khác ta sẽ đề cập đến nó.</p>\r\n\r\n<h2 id="goto-h2-7" data-stt="7">8. Kết thúc bài học</h2>\r\n\r\n<p>Các bạn thấy các kiểu dữ liệu trong PHP rất là nhiều và cách sử dụng \r\nnó thật sự đơn giản hơn các kiểu dữ liệu trong ngôn ngữ lập trình khác. \r\nHy vọng bài này sẽ là tiền đề để các bạn đam mê ngành <strong>lập trình web php</strong>.&nbsp;Bài tiếp theo chúng ta sẽ tìm hiểu <a href="http://freetuts.net/toan-tu-va-bieu-thuc-trong-php-4.html" title="Toán tử và biểu thức trong php">toán tử và biểu thức trong php</a>.</p>', 'php.png', 'kiểu dữ liệu, object, đối tượng', '2016-06-03 00:00:00', 1, 'Cứ độ vài tháng lại phải review cái danh sách những quán cafe hot ở Hà Nội một lượt, cũng bởi vì dân tình thay đổi chỗ ă', 0, '0000-00-00 00:00:00'),
(16, 4, 2, 'Thiết kế CSDL đa ngôn ngữ với MySQL', '<p>Web đa ngôn ngữ không còn xa lạ gì với công nghệ web 2.0 nữa, không \r\nchỉ website&nbsp;lớn mà cả những website nhỏ và trung bình cũng có nhu cầu sử\r\n dụng đa ngôn ngữ để giúp cho người dùng có thể đọc được, điều này giúp \r\ncho website giữ được lượng khách truy cập và sẽ xuất hiện nhiều khách \r\nhàng tiềm năng hơn.</p>\r\n\r\n<h2 id="goto-h2-0" data-stt="0">1. Web đa ngôn ngữ là gì?</h2>\r\n\r\n<p>Web đa ngôn ngữ là web có thể xem ở nhiều ngôn ngữ khác nhau, đây là \r\ndạng web dành cho những trang tin tức, thương mại điện tử hoặc những \r\nwebsite muốn đánh vào nhiều quốc gia khác nhau trên thế giới.</p>\r\n\r\n<p>Để xây dựng một website đa ngôn ngữ thì có hai vấn đề chính mà lập trình viên&nbsp;(<em>Coder</em>) và khách hàng (<em>Customer</em>) cần phải chú ý như sau:</p>\r\n\r\n<ul><li><strong>Khách hàng</strong>: Đòi hỏi phải dịch hầu hết các bài viết\r\n trong website nên tốn nhiều thời gian và tiền bạc. Tuy nhiên nếu khách \r\nhàng muổn website chỉ dịch một số bài thôi thì điều này cần phải bàn bạc\r\n thêm&nbsp;với Coder để họ xử lý cho bạn.</li><li><strong>Lập trình viên</strong>: Bạn phải dựa vào yêu cầu của khách\r\n hàng và&nbsp;từ đó phân tích được độ lớn của dự án mà chọn giải pháp tối ưu \r\nnhất có thể. Thông thường những website nhỏ thì ta sử dụng PHP và MySQL \r\nđể xây dựng luôn.</li></ul>\r\n\r\n<p>Nói chung quy lại cho dễ hiểu thì trong bài này mình sẽ hướng dẫn các bạn cách thiết kế CSDL đơn giản cho một <strong>website đa ngôn ngữ</strong>.</p>\r\n\r\n<h2 id="goto-h2-1" data-stt="1">2. Cách thiết kế CSDL website đa ngôn ngữ</h2>\r\n\r\n<p>Như mình phân tích ở trên thông thường có hai dạng yêu cầu web đa ngôn ngữ đó là:</p>\r\n\r\n<ul><li>Web dịch toàn bộ bài</li><li>Web chỉ dịch một số bài</li></ul>\r\n\r\n<h3 id="goto-h3-0">Dịch toàn bộ bài viết</h3>\r\n\r\n<p>Trường hợp này ta có một số cách thiết kế như sau:</p>\r\n\r\n<p><strong>Cách 1</strong>: Mỗi table ta sẽ lưu số trường bằng tương ứng với số ngôn ngữ. Ví dụ website làm 3 ngôn ngữ thì mình lưu trường <code>title</code> là <code>title_en</code>, <code>title_vi</code>, <code>title_cn</code>. Như vậy nếu mở rộng thì sẽ rất khó khăn vì ta phải vào hệ thống thêm từng field.</p>\r\n\r\n<p><strong>Cách 2</strong>: Mỗi field ta sẽ lưu dạng thẻ xml dạng <code><span style="line-height: 20.8px;">&lt;lang&gt;nội dung&lt;/lang&gt;</span></code>. Ví dụ <code>&lt;vi&gt;Nội dung&lt;/vi&gt;&lt;en&gt;Content&lt;/en&gt;</code>.&nbsp;Với cách lưu này <span style="line-height: 20.8px;">khi mở rộng ta không cần phải bổ sung field. Tuy nhiên</span>&nbsp;có hai điểm yếu, <strong>thứ nhất</strong> nếu dữ liệu quá nhiều vượt quá mức lưu trữ của MySQL thì sẽ mất dữ liệu, <strong>thứ hai</strong>&nbsp;tuy nhiên ban phải sử dụng thêm PHP để lập trình thật chặc chẽ (dùng <a href="http://freetuts.net/tag/regular-expression" title="Regular Expression">Regular Expression</a> để bóc tách).</p>\r\n\r\n<p><strong>Cách 3</strong>: Mỗi table ta sẽ lưu trữ thêm một table đa ngôn ngữ và một table liên kết&nbsp;nữa. Ví dụ có table <strong>News(id, titlte, content, status)</strong> với hai field <code>title</code> và <code>content</code> là đa ngôn ngữ thì ta bổ sung thêm table language như hình&nbsp;sau:&nbsp;</p>\r\n\r\n<p style="text-align: center;">&nbsp;&nbsp;<img alt="" src="http://freetuts.net/upload/tut_post/images/2015/09/10/435/web-da-ngon-ngu-php.png" style="border-width: 1px; border-style: solid;"></p>\r\n\r\n<p>Với cách lưu trữ này khi ban thêm mới một ngôn ngữ thì chỉ cần bổ sung dữ liệu vào bảng <code>Language</code>.</p>\r\n\r\n<h3 id="goto-h3-1">Dịch một số bài viết&nbsp;</h3>\r\n\r\n<p>Với yêu cầu này thì hơi&nbsp;rườm rà nên mình đưa ra một cách đơn giản để các bạn tham khảo.</p>\r\n\r\n<p>Chúng ta chỉ cần một bảng và trong bảng đó sẽ có một số field liên hệ với nhau như sau:&nbsp;<strong><span style="line-height: 1.6em;">News (id, title, content, language, parent_id</span><span style="line-height: 1.6em;">)</span></strong></p>\r\n\r\n<p><span style="line-height: 1.6em;">Giả sử mình chọn ngôn ngữ tiếng \r\nViệt làm ngôn ngữ chính thì khi thêm một bài viết mới nếu bài này dành \r\ncho tiếng Việt thì ta không cần chọn <code>parrent_id</code>, ngược lại nếu là ngôn ngữ khác thì ta phải chọn <code>parent_id </code>(<em>chính là bài tiêng Việt</em>).</span></p>\r\n\r\n<p>Lúc này dư liệu như sau:</p>\r\n\r\n<p style="text-align: center;"><img alt="" src="http://freetuts.net/upload/tut_post/images/2015/09/10/435/web-da-ngon-ngu-php-2.png"></p>\r\n\r\n<p>Như vậy ta phải dựa vào ha field <code>language</code> và <code>parrent_id</code> đẻ xử chuyển ngôn ngữ cho thật chính xác.</p>\r\n\r\n<p><strong>Lưu ý</strong>: Để xử lý nhuần nhuyễn và chính xác các cách \r\ntrên thì đòi hỏi ban phải thành thạo PHP, MySQL, Javascript để xử lý \r\nphía backend lẫn frontend.</p>\r\n\r\n<h2 id="goto-h2-2" data-stt="2">3. Lời kết</h2>\r\n\r\n<p>Như vậy trong bài này mình đã giới thiệu web đa ngôn ngư là gì và đưa\r\n ra một số cách lưu trữ CSDL tương ứng cho từng trường hợp cụ thể. Tuy \r\nnhiên đó là ý kiến riêng của bạn thân mình nên có thể nó không hay lắm, \r\nvì vậy nếu bạn có cách khác hay hơn thì xin hãy bổ sung bằng cách bình \r\nluận bên dưới để mình có thể đưa vào bài viết giúp hoàn thiện hơn.</p>', 'mysql_logo.jpeg', 'sql, mysql, cơ sở dữ liệu, csdl', '2016-06-03 00:00:00', 0, 'Web đa ngôn ngữ không còn xa lạ gì với công nghệ web 2.0 nữa, không chỉ website lớn mà cả những website nhỏ và trung bìn', 0, '0000-00-00 00:00:00'),
(17, 5, 3, 'Javascript cơ bản', '<p><a href="http://thachpham.com/web-development/html-css/html-va-css-can-ban-danh-cho-cho-moi-nguoi.html" target="_blank">Kiến thức cơ bản về HTML và CSS</a>\r\n có thể giúp bạn tạo được website đơn giản. Nhưng nếu bạn mong muốn 1 \r\nwebsite sinh động và phức tạp hơn, bạn cần Javascript. Javascript là \r\nngôn ngữ lập trình đơn giản, nhưng cực kì mạnh mẽ và phổ biến cho lập \r\ntrình web. Các ứng dụng thường thấy ở Javascript có thể kể đến như:</p><ul><li>Tương tác với HTML và thay đổi nội dung và định dạng trên website dễ dàng.</li><li>Tương tác với các hành động của người dùng như nhấn chuột, gõ phím…</li><li>Xử lý và kiểm tra các dữ liệu trên form trước khi gửi về server.</li><li>Tạo và truy xuất thông tin lưu trong cookie trên máy người dùng.</li><li>Đóng vai trò như 1 ngôn ngữ lập trình phía server (sử dụng các framework như Node.js).</li></ul><p>Có\r\n nhiều phương pháp để học Javascript, và tốt nhất là để người học được \r\ntự tay mày mò trong suốt quá trình tìm hiểu. Bài viết hôm nay sẽ áp dụng\r\n phương pháp đó, và tiếp cận nó theo một cách mới để mong bạn đọc dễ làm\r\n quen và hình dung hơn: gamification – trò chơi hóa nội dung bài học.</p><p>Hãy\r\n tưởng tượng bạn là nhân vật chính trong một game nhập vai, khởi đầu từ \r\ncon số 0 tròn trĩnh để đấu tranh trở thành Anh Hùng trong cõi \r\nJavascript. Không gì hứa hẹn một hành trình bằng phẳng cả, nhưng đừng \r\nngại ngần khi định mệnh đã gọi tên!</p><p align="center">&nbsp;<strong>INTRO CHAPTER!</strong><br> Hãy tạo nên huyền thoại của riêng bạn về 1 Anh Hùng Javascript!</p><div align="center"><img class="aligncenter" alt="Javascript căn bản - Anh Hùng Javascript" src="http://static.thach.io/wp-content/uploads/2014/03/JS-can-ban-SuperHero.png" width="500"></div><p>Javascript có thể được sử dụng dễ dàng với thẻ HTML <code>script</code>: chỉ cần đưa các câu lệnh Javascript vào trong cặp thẻ hoặc nhúng 1 file Javascript bên ngoài.</p><div><div id="highlighter_621306" class="syntaxhighlighter  xml"><div class="container"><ol><li><code class="xml plain">&lt;</code><code class="xml keyword">html</code><code class="xml plain">&gt;</code></li><li><code class="xml plain">&lt;</code><code class="xml keyword">body</code><code class="xml plain">&gt;</code></li><li><code class="xml plain">&lt;</code><code class="xml keyword">script</code> <code class="xml color1">type</code><code class="xml plain">=</code><code class="xml string">"text/javascript"</code><code class="xml plain">&gt;</code></li><li><code class="xml plain">// Gõ code ở đây</code></li><li><code class="xml plain"><!--</code--><code class="xml keyword">script</code><code class="xml plain">&gt;</code></code></li><li><code class="xml plain"><code class="xml plain"><!--</code--><code class="xml keyword">body</code><code class="xml plain">&gt;</code></code></code></li><li><code class="xml plain"><code class="xml plain"><code class="xml plain"><!--</code--><code class="xml keyword">html</code><code class="xml plain">&gt;</code></code></code></code></li></ol></div></div></div><p><code class="xml plain"><code class="xml plain">&nbsp;</code></code></p><div class="container"><ol><li><code class="xml plain"><code class="xml plain"><code class="xml plain">&lt;</code><code class="xml keyword">html</code><code class="xml plain">&gt;</code></code></code></li><li><code class="xml plain"><code class="xml plain"><code class="xml plain">&lt;</code><code class="xml keyword">body</code><code class="xml plain">&gt;</code></code></code></li><li><code class="xml plain"><code class="xml plain"><code class="xml plain">&lt;</code><code class="xml keyword">script</code> <code class="xml color1">type</code><code class="xml plain">=</code><code class="xml string">"text/javascript"</code> <code class="xml color1">src</code><code class="xml plain">=</code><code class="xml string">"đường-dẫn-đến-file-javascript.js"</code><code class="xml plain">&gt;<!--</code--><code class="xml keyword">script</code><code class="xml plain">&gt;</code></code></code></code></li><li><code class="xml plain"><code class="xml plain"><code class="xml plain"><!--</code--><code class="xml keyword">body</code><code class="xml plain">&gt;</code></code></code></code></li><li><code class="xml plain"><code class="xml plain"><code class="xml plain"><!--</code--><code class="xml keyword">html</code><code class="xml plain">&gt;</code></code></code></code></li></ol></div><div><div id="highlighter_521244" class="syntaxhighlighter  xml"><code class="xml plain"><code class="xml plain"><br></code></code></div></div><p><code class="xml plain"><code class="xml plain">Tuy\r\n nhiên, trong hành trình Javascript cơ bản này, bạn không cần phải chèn \r\ncode hay file Javascript vào 1 file html và chạy file này. Bạn sẽ gõ \r\ncode trực tiếp trên trình duyệt bằng công cụ Console. Để mở Console, hãy\r\n bấm F12 và chọn tab Console ở khung công cụ lập trình được hiển thị, \r\nhoặc sử dụng phím tắt nhanh Ctrl+Shift+J (Chrome/Firefox).</code></code></p>', 'javascript.png', 'javascript', '2016-06-03 00:00:00', 0, '															Kiến thức cơ bản về HTML và CSS có thể giúp bạn tạo được website đơn giản. Nhưng nếu bạn mong muốn 1 webs', 0, '2016-06-03 00:00:00'),
(19, 3, 2, 'Tài liệu Giới thiệu cơ bản về ngôn ngữ ASP.NET', '<p class="para" id="id4197197">Từ khoảng cuối thập niên 90, ASP (Active \r\nServer Page) đã được nhiều lập trình viên lựa chọn để xây dựng và phát \r\ntriển ứng dụng web động trên máy chủ sử dụng hệ điều hành Windows. ASP \r\nđã thể hiện được những ưu điểm của mình với mô hình lập trình thủ tục \r\nđơn giản, sử dụng hiệu quả các đối tượng COM: ADO (ActiveX Data Object) -\r\n xử lý dữ liệu, FSO (File System Object) - làm việc với hệ thống tập \r\ntin…, đồng thời, ASP cũng hỗ trợ nhiều ngôn ngữ: VBScript, JavaScript. \r\nChính những ưu điểm đó, ASP đã được yêu thích trong một thời gian dài. </p>\r\n    <p class="para" id="id6201810">Tuy nhiên, ASP vẫn còn tồn đọng một \r\nsố khó khăn như Code ASP và HTML lẫn lộn, điều này làm cho quá trình \r\nviết code khó khăn, thể hiện và trình bày code không trong sáng, hạn chế\r\n khả năng sử dụng lại code. Bên cạnh đó, khi triển khai cài đặt, do \r\nkhông được biên dịch trước nên dễ bị mất source code. Thêm vào đó, ASP \r\nkhông có hỗ trợ cache, không được biên dịch trước nên phần nào hạn chế \r\nvề mặt tốc độ thực hiện. Quá trình xử lý Postback khó khăn, … </p>\r\n    <p class="para" id="id7146729">Đầu năm 2002, Microsoft giới thiệu \r\nmột kỹ thuật lập trình Web khá mới mẻ với tên gọi ban đầu là ASP+, tên \r\nchính thức sau này là ASP.Net. Với ASP.Net, không những không cần đòi \r\nhỏi bạn phải biết các tag HTML, thiết kế web, mà nó còn hỗ trợ mạnh lập \r\ntrình hướng đối tượng trong quá trình xây dựng và phát triển ứng dụng \r\nWeb. </p>\r\n    <p class="para" id="id5118768">ASP.Net là kỹ thuật lập trình và phát\r\n triển ứng dụng web ở phía Server (Server-side) dựa trên nền tảng của \r\nMicrosoft .Net Framework. </p>\r\n    <p class="para" id="id3807950">Hầu hết, những người mới đến với lập \r\ntrình web đều bắt đầu tìm hiểu những kỹ thuật ở phía Client \r\n(Client-side) như: HTML, Java Script, CSS (Cascading Style Sheets). Khi \r\nWeb browser yêu cầu một trang web (trang web sử dụng kỹ thuật \r\nclient-side), Web server tìm trang web mà Client yêu cầu, sau đó gởi về \r\ncho Client. Client nhận kết quả trả về từ Server và hiển thị lên màn \r\nhình. </p>\r\n    <p class="para" id="id3968791">ASP.Net sử dụng kỹ thuật lập trình ở \r\nphía server thì hoàn toàn khác, mã lệnh ở phía server (ví dụ: mã lệnh \r\ntrong trang ASP) sẽ được biên dịch và thi hành tại Web Server. Sau khi \r\nđược Server đọc, biên dịch và thi hành, kết quả tự động được chuyển sang\r\n HTML/JavaScript/CSS và trả về cho Client. Tất cả các xử lý lệnh ASP.Net\r\n đều được thực hiện tại Server và do đó, gọi là kỹ thuật lập trình ở \r\nphía server.</p>\r\n    <div class="section"><h1 class="title" id="id6523449">Những ưu điểm nổi bật của ASP.NET</h1>\r\n      \r\n      <p class="para" id="id5092980">ASP.Net cho phép bạn lựa chọn một trong các ngôn ngữ lập trình mà bạn yêu thích: Visual Basic.Net, J#, C#,… </p>\r\n      <p class="para" id="id4414472">Trang ASP.Net được biên dịch trước.\r\n Thay vì phải đọc và thông dịch mỗi khi trang web được yêu cầu, ASP.Net \r\nbiên dịch những trang web động thành những tập tin DLL mà Server có thể \r\nthi hành nhanh chóng và hiệu quả. Yếu tố này là một bước nhảy vọt đáng \r\nkể so với kỹ thuật thông dịch của ASP.</p>\r\n      <p class="para" id="id4414477">\r\n        </p><div align="center"><figure id="id5293083">\r\n          <span class="media" id="id5293083_media" alt="">\r\n            <img src="https://voer.edu.vn/file/34829" data-mime-type="image/png" id="id5293083__onlineimage" height="208" width="629">\r\n          </span>\r\n        </figure></div>\r\n      \r\n      <p class="para" id="id4073930">ASP.Net hỗ trợ mạnh mẽ bộ thư viện \r\nphong phú và đa dạng của .Net Framework, làm việc với XML, Web Service, \r\ntruy cập cơ sở dữ liệu qua ADO.Net, … </p>\r\n      <p class="para" id="id4073934">ASPX và ASP có thể cùng hoạt động trong 1 ứng dụng. </p>\r\n      <p class="para" id="id5259114">ASP.Net sử dụng phong cách lập trình mới: Code behide. Tách code riêng, giao diện riêng do vậy dễ đọc, dễ quản lý và bảo trì. </p>\r\n      <p class="para" id="id3772227">Kiến trúc lập trình giống ứng dụng trên Windows. </p>\r\n      <p class="para" id="id4034506">Hỗ trợ quản lý trạng thái của các control </p>\r\n      <p class="para" id="id4118380">Tự động phát sinh mã HTML cho các Server control tương ứng với từng loại Browser </p>\r\n      <p class="para" id="id4284833">Hỗ trợ nhiều cơ chế cache. </p>\r\n      <p class="para" id="id3960106">Triển khai cài đặt </p>\r\n      <p class="para" id="id3960111">Không cần lock, không cần đăng ký DLL </p>\r\n      <p class="para" id="id4367310">Cho phép nhiều hình thức cấu hình ứng dụng </p>\r\n      <p class="para" id="id6540184">Hỗ trợ quản lý ứng dụng ở mức toàn cục </p>\r\n      <p class="para" id="id6309535">Global.aspx có nhiều sự kiện hơn </p>\r\n      <p class="para" id="id5340981">Quản lý session trên nhiều Server, không cần Cookies</p>\r\n    </div>', 'lap-trinh-vien-co-ban-net.jpg', '.net, asp', '2016-06-03 00:00:00', 0, 'ASP.Net là kỹ thuật lập trình và phát triển ứng dụng web ở phía Server (Server-side) dựa trên nền tảng của Microsoft .Ne', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` text,
  `categoryParent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`categoryID`, `categoryName`, `categoryParent`) VALUES
(1, 'Mobile', 0),
(2, 'Laptop', 0),
(3, 'PC', 0),
(4, 'Tablet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_producer`
--

CREATE TABLE `tb_producer` (
  `producerID` int(11) NOT NULL,
  `producerName` text,
  `producerAddress` text,
  `producerPhone` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_producer`
--

INSERT INTO `tb_producer` (`producerID`, `producerName`, `producerAddress`, `producerPhone`) VALUES
(1, 'Apple', 'USA', '023893478'),
(2, 'Dell', 'China', '5678754'),
(3, 'Samsung', 'Korea', '1234567'),
(4, 'Nokia', 'Việt Nam', '976789567'),
(5, 'Asus', 'USA', '02883939');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `productID` int(11) NOT NULL,
  `productName` text,
  `productImage` text,
  `productPrice` int(11) DEFAULT NULL,
  `producerID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`productID`, `productName`, `productImage`, `productPrice`, `producerID`, `categoryID`) VALUES
(1, 'iPhone 6s Plus', 'iphone-6s-plus-128gb.png', 27490000, 1, 1),
(2, 'iPad Pro Wifi Cellular', 'ipad-pro-wifi-cellular-128gb.png', 26990000, 1, 4),
(3, 'Galaxy S7 Edge', 'samsung-galaxy-s7-edge.png', 18490000, 3, 1),
(4, 'ZenPad 7.0 (Z370CG)', 'asus-zenpad-c-70-z370cg.png', 3990000, 5, 4),
(5, 'Inspiron 5559', 'dell-inspiron-5559.png', 15490000, 2, 2),
(6, 'Vostro 5459', 'dell-vostro-5459.png', 17790000, 2, 2),
(7, 'Lumia 950 XL', 'microsoft-lumia-950-xl.png', 9990000, 4, 1),
(8, 'Lumia 950', 'microsoft-lumia-950.png', 7990000, 4, 1),
(9, 'Galaxy Tab S2 9.7 (SM-T815)', 'samsung-galaxy-tab-s2-t815.png', 13990000, 3, 4),
(10, 'K501UX', 'asus-k501ux.png', 19990000, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsID`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `tb_producer`
--
ALTER TABLE `tb_producer`
  ADD PRIMARY KEY (`producerID`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_producer`
--
ALTER TABLE `tb_producer`
  MODIFY `producerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
