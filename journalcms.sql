-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2016 at 08:27 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journalcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accses`
--

CREATE TABLE `accses` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `poll` tinyint(1) NOT NULL DEFAULT '0',
  `article` tinyint(1) NOT NULL DEFAULT '0',
  `youtube` tinyint(1) NOT NULL DEFAULT '0',
  `gallery` tinyint(1) NOT NULL DEFAULT '0',
  `user` tinyint(1) NOT NULL DEFAULT '0',
  `email` tinyint(1) NOT NULL DEFAULT '0',
  `titleEnglish` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `accses`:
--

--
-- Dumping data for table `accses`
--

INSERT INTO `accses` (`id`, `creatDate`, `lastUpdateDate`, `poll`, `article`, `youtube`, `gallery`, `user`, `email`, `titleEnglish`, `titleArabic`, `isDeleted`) VALUES
(0, '2016-05-09 16:38:03', '2016-05-16 10:39:20', 0, 0, 0, 0, 0, 0, 'User', 'مستخدم', 0),
(1, '2016-05-09 16:38:03', '2016-05-09 16:38:03', 1, 1, 1, 1, 0, 0, 'Writer', 'كاتب', 0),
(2, '2016-05-09 16:40:35', '2016-05-16 10:40:41', 2, 2, 2, 2, 0, 0, 'Editor', 'محرر', 0),
(3, '2016-05-09 16:40:35', '2016-05-16 10:40:41', 3, 3, 3, 3, 0, 0, 'Publisher', 'الناشر', 0),
(4, '2016-05-09 16:59:12', '2016-05-16 10:39:41', 4, 4, 4, 4, 4, 4, 'Admin', 'مشرف', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `youtubeID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEnglish` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionArabic` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `bodyEnglish` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `bodyArabic` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `categoryID` int(11) NOT NULL,
  `language` tinyint(1) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `imageNumber` tinyint(2) NOT NULL,
  `views` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `article`:
--   `categoryID`
--       `category` -> `id`
--   `writerID`
--       `user` -> `id`
--

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `creatDate`, `lastUpdateDate`, `titleEnglish`, `titleArabic`, `display`, `writerID`, `youtubeID`, `descriptionEnglish`, `descriptionArabic`, `bodyEnglish`, `bodyArabic`, `categoryID`, `language`, `importance`, `imageNumber`, `views`, `isDeleted`) VALUES
(1, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(2, '2016-05-15 23:13:21', '2016-05-16 14:52:03', 'Lorem ipsum dolor sit amet', '', 1, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 3, 0, 0, 0, 0, 0),
(3, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(4, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(5, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(6, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(7, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(8, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(9, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(10, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(11, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(12, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(13, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0);
INSERT INTO `article` (`id`, `creatDate`, `lastUpdateDate`, `titleEnglish`, `titleArabic`, `display`, `writerID`, `youtubeID`, `descriptionEnglish`, `descriptionArabic`, `bodyEnglish`, `bodyArabic`, `categoryID`, `language`, `importance`, `imageNumber`, `views`, `isDeleted`) VALUES
(14, '2016-05-15 23:13:21', '2016-05-16 22:07:56', 'Lorem ipsum dolor sit amet', '', 3, 4141127, '', 'orem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt dui vel erat vulputate, et imperdiet neque malesuada. Sed ac lobortis turpis. Duis nec laoreet nibh. Praesent eu lacus sed lorem condimentum ultricies. Donec tempor libero sit amet diam egestas imperdiet. In hac habitasse platea dictumst. Sed ut sapien non augue placerat tincidunt scelerisque nec lorem. Proin metus turpis, faucibus et nibh vitae, pretium porttitor quam. Suspendisse venenatis, massa eget lobortis hendrerit, leo odio dictum mauris, eget consequat quam risus malesuada elit. Pellentesque sit amet bibendum augue. Donec venenatis velit quis dui facilisis, dapibus consequat ante malesuada. Ut cursus feugiat sem quis pellentesque. Morbi quis porttitor purus.</p>\r\n<p>Aenean lobortis arcu est, vitae placerat turpis ultrices in. Nulla facilisi. Fusce convallis, erat id suscipit egestas, diam leo pulvinar lorem, ac pulvinar nulla mauris ultricies justo. Cras mattis ante leo, vel finibus ipsum congue a. Sed egestas, massa vel pellentesque vestibulum, lorem nunc aliquet tortor, et condimentum lacus sapien eget tortor. Praesent fermentum ultricies risus, at interdum diam maximus id. Nulla facilisi. Donec neque diam, porttitor et quam semper, convallis maximus nunc.</p>\r\n<p>Vestibulum quam quam, luctus et ullamcorper vel, fermentum non metus. Pellentesque porttitor ligula risus, ut dapibus magna euismod eget. Mauris fermentum pulvinar est, non consequat nisl consectetur id. Integer ultricies rhoncus lorem sed feugiat. Vestibulum sodales porta leo, at pharetra diam placerat at. Suspendisse euismod imperdiet velit, faucibus aliquet eros ultrices ac. Fusce eget arcu vitae nunc facilisis porttitor. Quisque sem dui, faucibus quis risus eget, mattis sodales enim. Sed facilisis ullamcorper eros, vel pharetra orci efficitur ac. Suspendisse viverra, massa in consequat luctus, lacus nisi vestibulum justo, eget varius ipsum nunc a odio. Proin molestie, eros ac bibendum maximus, nibh orci iaculis turpis, vel mollis diam mauris id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut quis suscipit erat. Sed sagittis lorem at est vestibulum, ac feugiat sem fermentum.</p>\r\n<p>Vivamus in tortor risus. Quisque hendrerit velit a sodales porttitor. Etiam quis ipsum dapibus, molestie lectus quis, fringilla libero. Mauris semper consequat hendrerit. Praesent lacinia facilisis semper. Curabitur suscipit rhoncus sagittis. Sed aliquet urna id urna aliquam hendrerit.</p>\r\n<p>Fusce augue nunc, iaculis sit amet ultricies vitae, pellentesque quis orci. Suspendisse quis metus ultricies, aliquet libero sit amet, porta risus. Etiam diam enim, tincidunt sit amet eleifend iaculis, laoreet et turpis. Maecenas porttitor venenatis felis, eget dictum felis eleifend nec. Vivamus a hendrerit ante, ut venenatis mauris. Nullam tristique eleifend nibh, a aliquam augue tincidunt eget. Donec pellentesque mattis eleifend. Nullam sodales consequat est, id vehicula risus sollicitudin quis. Sed neque ex, ultrices quis tempus lacinia, pellentesque in enim. Proin nec nibh id massa blandit faucibus. In eleifend nibh ut mi hendrerit, eget pharetra magna maximus. Vivamus et lacinia metus. Integer quis massa et lorem viverra fermentum eu sed mi. Donec sit amet nulla lorem.</p>', '', 2, 0, 0, 0, 0, 0),
(15, '2016-05-17 12:52:36', '2016-05-17 12:53:15', 'Hareeka fi Masrelgdida', 'accident in masr', 3, 4141127, '', 'desc', 'test', '<p>Ù‚Ø§Ù„ Ø±Ø¬Ù„ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ØŒ Ø¥Ù† Ù‚Ø±Ø§Ø±Ù‡ Ø¨Ø¨ÙŠØ¹ ÙƒØ§Ù…Ù„ Ø§Ù„Ø£Ø³Ù‡Ù… ÙÙ‰ Ù‚Ù†Ø§Ø© "Ø£ÙˆÙ† ØªÙ‰ ÙÙ‰" Ø¬Ø§Ø¡ Ø¨Ø¹Ø¯ Ø£Ù† Ø³Ø¹Øª Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù‚Ù†Ø§Ø© Ù„Ø¹Ø¯Ø© Ø³Ù†ÙˆØ§Øª Ù„ØªØ­ÙˆÙŠÙ„ Ø§Ù„Ù‚Ù†Ø§Ø© Ø¥Ù„Ù‰ Ø§Ù„Ø±Ø¨Ø­ÙŠØ©ØŒ Ù…ÙˆØ¶Ø­Ø§ Ø£Ù† Ø®Ø·ØªÙ‡ Ø§Ù„Ø§Ø³ØªØ«Ù…Ø§Ø±ÙŠØ© Ø§Ù„Ø¢Ù† Ù…Ø¨Ù†ÙŠØ© Ø¹Ù„Ù‰ Ø§Ù„Ø§Ø³ØªØ«Ù…Ø§Ø± ÙÙ‰ Ù…Ø¬Ø§Ù„ Ø­Ù‚ÙˆÙ‚ Ø§Ù„Ø§Ø¹Ù„Ø§Ù† ÙˆÙ…Ø¬Ø§Ù„ Ø¥Ù†ØªØ§Ø¬ Ø§Ù„Ø£ÙÙ„Ø§Ù… ÙˆØ§Ù„Ù…Ø³Ù„Ø³Ù„Ø§Øª ÙˆØ§Ù„Ø¨Ø±Ø§Ù…Ø¬ Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ø´Ø±ÙƒØ© "Ø¨Ø±ÙˆÙ…ÙˆÙ…ÙŠØ¯ÙŠØ§" Ø§Ù„ØªØ§Ø¨Ø¹Ø© Ù„Ù…Ø¬Ù…ÙˆØ¹ØªÙ‡ Ø§Ù„Ø¥Ø¹Ù„Ø§Ù…ÙŠØ© ÙˆØ§Ù„ØªÙ‰ ØªØ±ÙƒØ² Ù†Ø´Ø§Ø·Ù‡Ø§ ÙÙ‰ Ø§Ù„Ø´Ù‚ Ø§Ù„ØªØ¬Ø§Ø±Ù‰ Ù„Ù„Ø¥Ø¹Ù„Ø§Ù…ØŒ ÙˆØ§Ù„ØªÙ‰ ÙŠÙ†ÙˆÙ‰ Ø¯Ø¹Ù…Ù‡Ø§ Ù…Ø§Ù„ÙŠØ§Ù‹ ÙˆÙ…Ø¹Ù†ÙˆÙŠØ§Ù‹ ÙˆØ¥Ø¯Ø§Ø±ÙŠØ§Ù‹. ÙˆÙˆÙÙ‚Ø§ Ù„Ø¨ÙŠØ§Ù† ØµØ­ÙÙ‰ Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡ØŒ ÙÙ‚Ø¯ ÙˆØ§ÙÙ‚ Ø§Ù„Ù…Ù‡Ù†Ø¯Ø³ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ Ø¹Ù„Ù‰ Ø±ÙØ¹ Ø±Ø£Ø³ Ø§Ù„Ù…Ø§Ù„ Ø§Ù„Ù…Ø¯ÙÙˆØ¹ Ù„Ø´Ø±ÙƒØ© "Ø¨Ø±ÙˆÙ…ÙˆÙ…ÙŠØ¯ÙŠØ§" Ø¥Ù„Ù‰ 500 Ù…Ù„ÙŠÙˆÙ† Ø¬Ù†ÙŠÙ‡ Ù…ØµØ±Ù‰ Ù„Ù„Ø¯ÙØ¹ Ø¨Ø§Ù„Ø´Ø±ÙƒØ© ÙˆØªØ¹Ø²ÙŠØ² Ù…ÙˆÙ‚ÙÙ‡Ø§ Ø§Ù„Ù…Ø§Ù„Ù‰ØŒ ÙˆÙˆØ§ÙÙ‚ Ø£ÙŠØ¶Ø§Ù‹ Ø¹Ù„Ù‰ Ø£Ù† ÙŠØ±Ø£Ø³ Ù…Ø¬Ù„Ø³ Ø¥Ø¯Ø§Ø±ØªÙ‡Ø§ØŒ ÙÙ‰ Ø­ÙŠÙ† Ø³ÙˆÙ ÙŠØªÙˆÙ„Ù‰ Ø§Ù„Ø³ÙŠØ¯ Ø¥ÙŠÙ‡Ø§Ø¨ Ø·Ù„Ø¹Øª Ù…Ù†ØµØ¨ Ø§Ù„Ø¹Ø¶Ùˆ Ø§Ù„Ù…Ù†ØªØ¯Ø¨ Ù„ÙŠØ¯ÙØ¹ Ø§Ù„Ø´Ø±ÙƒØ© Ø¨Ø®Ø¨Ø±ØªÙ‡ Ø§Ù„ÙˆØ§Ø³Ø¹Ø© ÙÙ‰ Ù…Ø¬Ø§Ù„ Ø§Ù„Ø¥Ø¹Ù„Ø§Ù… Ø¥Ù„Ù‰ Ø§Ù„Ù…Ø²ÙŠØ¯ Ù…Ù† Ø§Ù„Ù†Ø¬Ø§Ø­ØŒ ÙˆÙŠØ¬Ø¹Ù„Ù‡Ø§ ØªØ¹Ø²Ø² Ù…ÙˆÙ‚Ø¹Ù‡Ø§ Ø§Ù„Ø±ÙŠØ§Ø¯Ù‰ ÙÙ‰ Ø§Ù„Ø³ÙˆÙ‚ Ø§Ù„Ù…ØµØ±ÙŠØ© ÙˆØªØ¹Ø¸Ù… Ø­ØµØªÙ‡Ø§ Ø§Ù„Ø³ÙˆÙ‚ÙŠØ©. ÙƒÙ…Ø§ Ø¹Ù„Ù‚ Ø³Ø§ÙˆÙŠØ±Ø³ Ø¹Ù„Ù‰ Ø£Ø«Ø± Ø§Ù„ØªØ·ÙˆØ±Ø§Øª Ø§Ù„Ø£Ø®ÙŠØ±Ø© ÙÙŠÙ…Ø§ ÙŠØ®Øµ Ù†Ø´Ø§Ø· Ø¨Ø±ÙˆÙ…ÙˆÙ…ÙŠØ¯ÙŠØ§ Ù‚Ø§Ø¦Ù„Ø§Ù‹: "Ø¨Ø¨ÙŠØ¹ Ù‚Ù†Ø§Ø© Ø£ÙˆÙ† ØªÙ‰ ÙÙ‰ Ø²Ø§Ù„Øª Ø´Ø¨Ù‡Ø© ØªØ¶Ø§Ø±Ø¨ Ø§Ù„Ù…ØµØ§Ù„Ø­ Ø¨ÙŠÙ† Ø§Ù…ØªÙ„Ø§Ùƒ Ù‚Ù†Ø§Ø© ØªÙ„ÙŠÙØ²ÙŠÙˆÙ†ÙŠØ© ÙˆØ§Ù…ØªÙ„Ø§Ùƒ Ø­Ù‚ÙˆÙ‚ Ø§Ù„Ø¥Ø¹Ù„Ø§Ù† Ù„Ù„Ù‚Ù†ÙˆØ§Øª Ø§Ù„Ø£Ø®Ø±Ù‰ØŒ Ù…Ù…Ø§ ÙŠÙØªØ­ Ù„Ù†Ø§ Ø§Ù„Ø·Ø±ÙŠÙ‚ Ù„Ù„ØªØ¹Ø§ÙˆÙ† Ù…Ø¹ Ø¬Ù…ÙŠØ¹ Ø§Ù„Ù‚Ù†ÙˆØ§Øª". ÙˆØ£Ø¶Ø§Ù Ø§Ù„Ù…Ù„ÙŠØ§Ø±Ø¯ÙŠØ± Ø§Ù„Ù…ØµØ±Ù‰ØŒ Ø£Ù† Ù‚Ù†Ø§Ø© ØªÙ‚ÙˆÙ… Ø¹Ù„Ù‰ Ø§Ù„Ø£Ø®Ø¨Ø§Ø± ÙˆØ§Ù„Ø£Ø­Ø¯Ø§Ø« Ø§Ù„Ø¬Ø§Ø±ÙŠØ© ÙˆØ­Ø¯Ù‡Ø§ Ù„Ø§ ØªØ³ØªØ·ÙŠØ¹ Ø£Ù† ØªØ­Ù‚Ù‚ Ø§Ù„Ø£Ø±Ø¨Ø§Ø­ ÙÙ‰ Ø§Ù„Ø³ÙˆÙ‚ Ø§Ù„Ù…ØµØ±ÙŠØ©ØŒ Ø­ÙŠØ« ÙƒØ§Ù† Ù…Ù† Ø§Ù„Ø¶Ø±ÙˆØ±Ù‰ Ø¥Ø¶Ø§ÙØ© Ù‚Ù†ÙˆØ§Øª ØªÙ‚Ø¯Ù… Ø£Ù†ÙˆØ§Ø¹ Ø£Ø®Ø±Ù‰ Ù…Ù† Ø§Ù„Ù…Ø­ØªÙˆÙ‰ Ø§Ù„ØªÙ„ÙŠÙØ²ÙŠÙˆÙ†Ù‰ Ù…Ø«Ù„ Ø§Ù„Ø¯Ø±Ø§Ù…Ø§ ÙˆØ§Ù„Ø£ÙÙ„Ø§Ù… ÙˆØ§Ù„Ù…Ù†ÙˆØ¹Ø§Øª ÙˆØ§Ù„Ù„Ø§ÙŠÙ Ø³ØªØ§ÙŠÙ„ Ù„Ø®Ù„Ù‚ Ø´Ø¨ÙƒØ© Ù…ØªÙƒØ§Ù…Ù„Ø© ØªØ®Ø§Ø·Ø¨ Ù†ÙˆØ¹ÙŠØ§Øª Ù…Ø®ØªÙ„ÙØ© Ù…Ù† Ø§Ù„Ù…Ø´Ø§Ù‡Ø¯ÙŠÙ†ØŒ ÙˆØ¨Ø§Ù„ØªØ§Ù„Ù‰ ØªØ¬Ø°Ø¨ Ù…ÙˆØ§Ø±Ø¯ Ø¥Ø¹Ù„Ø§Ù†ÙŠØ© ÙƒØ¨ÙŠØ±Ø©ØŒ ÙˆÙ‡Ùˆ Ù…Ø§ ÙƒØ§Ù† ÙŠØªØ·Ù„Ø¨ Ø¶Ø® Ø§Ø³ØªØ«Ù…Ø§Ø±Ø§Øª Ø·Ø§Ø¦Ù„Ø© Ù„Ø¥Ù†Ø´Ø§Ø¡ Ù‡Ø°Ù‡ Ø§Ù„Ø´Ø¨ÙƒØ© Ø§Ù„Ù…ØªÙƒØ§Ù…Ù„Ø©ØŒ ÙˆÙ‡Ùˆ Ù…Ø§ ÙˆØµÙÙ‡ Ø§Ù„Ù…Ù‡Ù†Ø¯Ø³ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ Ø¨Ø£Ù†Ù‡ Ø§Ø³ØªØ«Ù…Ø§Ø± Ù‡Ùˆ Ù„ÙŠØ³ Ø¹Ù„Ù‰ Ø§Ø³ØªØ¹Ø¯Ø§Ø¯ Ø§Ù„Ø®ÙˆØ¶ ÙÙŠÙ‡. ÙƒÙ…Ø§ ÙƒØ§Ù† Ø§Ù„Ù…Ù‡Ù†Ø³ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ Ù‚Ø¯ Ø£Ø¹Ø±Ø¨ Ø¹Ù† Ø£Ù† Ù‚Ù†Ø§Ø© "Ø£ÙˆÙ† ØªÙ‰ ÙÙ‰" Ù‚Ø¯ Ø£ØµØ¨Ø­Øª Ù…ØµØ¯Ø±Ø§Ù‹ Ù„Ù„ØµØ¯Ø§Ø¹ Ù„Ù‡ Ø¨ØµÙØ© Ø´Ø®ØµÙŠØ©ØŒ ÙÙÙ‰ Ø§Ù„Ø¢ÙˆÙ†Ø© Ø§Ù„Ø£Ø®ÙŠØ±Ø© ÙƒØ§Ù† ÙŠØªÙ„Ù‚Ù‰ Ø§Ù„Ù†Ù‚Ø¯ ÙˆØ§Ù„Ø´ÙƒÙˆÙ‰ Ø§Ù„Ø¯Ø§Ø¦Ù…Ø© Ù…Ù† Ø¬Ù…ÙŠØ¹ Ø§Ù„Ø£Ø·Ø±Ø§Ù ÙˆØ§Ù„Ù‚ÙˆÙ‰ Ø§Ù„Ù…Ø®ØªÙ„ÙØ©Ø› ÙÙ…Ø§ Ø¨ÙŠÙ† Ù‚ÙˆÙ‰ Ø«ÙˆØ±Ø© 25 ÙŠÙ†Ø§ÙŠØ± ÙˆÙ…Ù† ÙŠÙØ·Ù„Ù‚ Ø¹Ù„ÙŠÙ‡Ù… Ø§Ù„ÙÙ„ÙˆÙ„ØŒ Ø§Ù„Ù…Ø­Ø§ÙØ¸ÙˆÙ† ÙˆØ§Ù„Ø¥ØµÙ„Ø§Ø­ÙŠÙˆÙ†ØŒ Ø§Ù„Ù†Ø¸Ø§Ù… ÙˆØ§Ù„Ù…Ø¹Ø§Ø±Ø¶Ø©ØŒ ÙƒÙ„Ù‡Ù… Ø¹Ù„Ù‰ Ø­Ø¯ Ø§Ù„Ø³ÙˆØ§Ø¡ ÙƒØ§Ù†ÙˆØ§ ØºÙŠØ± Ø±Ø§Ø¶ÙŠÙ†. ÙˆÙƒØ§Ù† ÙŠØªÙ„Ù‚Ù‰ Ø§Ù„Ù„ÙˆÙ… Ø§Ù„Ø¯Ø§Ø¦Ù…ØŒ Ù…Ù…Ø§ Ø³Ø¨Ø¨ Ù„Ù‡ Ù‡Ùˆ Ø´Ø®ØµÙŠØ§Ù‹ Ø§Ù„Ø¶ÙŠÙ‚. <br /><br /><a href="http://www.youm7.com/story/2016/5/17/%D8%B3%D8%A7%D9%88%D9%8A%D8%B1%D8%B3-%D8%A8%D8%B9%D8%AF-%D8%A8%D9%8A%D8%B9-On-TV--%D8%B1%D9%81%D8%B9-%D8%B1%D8%A3%D8%B3%D9%85%D8%A7%D9%84-%D8%A8%D8%B1%D9%88%D9%85%D9%88-%D9%85%D9%8A%D8%AF%D9%8A%D8%A7-%D9%84%D9%80500-%D9%85%D9%84%D9%8A%D9%88%D9%86-%D8%AC%D9%86%D9%8A/2721623">http://www.youm7.com/story/2016/5/17/Ø³Ø§ÙˆÙŠØ±Ø³-Ø¨Ø¹Ø¯-Ø¨ÙŠØ¹-On-TV--Ø±ÙØ¹-Ø±Ø£Ø³Ù…Ø§Ù„-Ø¨Ø±ÙˆÙ…Ùˆ-Ù…ÙŠØ¯ÙŠØ§-Ù„Ù€500-Ù…Ù„ÙŠÙˆÙ†-Ø¬Ù†ÙŠ/2721623#</a></p>', '<p>Ù‚Ø§Ù„ Ø±Ø¬Ù„ Ø§Ù„Ø£Ø¹Ù…Ø§Ù„ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ØŒ Ø¥Ù† Ù‚Ø±Ø§Ø±Ù‡ Ø¨Ø¨ÙŠØ¹ ÙƒØ§Ù…Ù„ Ø§Ù„Ø£Ø³Ù‡Ù… ÙÙ‰ Ù‚Ù†Ø§Ø© "Ø£ÙˆÙ† ØªÙ‰ ÙÙ‰" Ø¬Ø§Ø¡ Ø¨Ø¹Ø¯ Ø£Ù† Ø³Ø¹Øª Ø¥Ø¯Ø§Ø±Ø© Ø§Ù„Ù‚Ù†Ø§Ø© Ù„Ø¹Ø¯Ø© Ø³Ù†ÙˆØ§Øª Ù„ØªØ­ÙˆÙŠÙ„ Ø§Ù„Ù‚Ù†Ø§Ø© Ø¥Ù„Ù‰ Ø§Ù„Ø±Ø¨Ø­ÙŠØ©ØŒ Ù…ÙˆØ¶Ø­Ø§ Ø£Ù† Ø®Ø·ØªÙ‡ Ø§Ù„Ø§Ø³ØªØ«Ù…Ø§Ø±ÙŠØ© Ø§Ù„Ø¢Ù† Ù…Ø¨Ù†ÙŠØ© Ø¹Ù„Ù‰ Ø§Ù„Ø§Ø³ØªØ«Ù…Ø§Ø± ÙÙ‰ Ù…Ø¬Ø§Ù„ Ø­Ù‚ÙˆÙ‚ Ø§Ù„Ø§Ø¹Ù„Ø§Ù† ÙˆÙ…Ø¬Ø§Ù„ Ø¥Ù†ØªØ§Ø¬ Ø§Ù„Ø£ÙÙ„Ø§Ù… ÙˆØ§Ù„Ù…Ø³Ù„Ø³Ù„Ø§Øª ÙˆØ§Ù„Ø¨Ø±Ø§Ù…Ø¬ Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ø´Ø±ÙƒØ© "Ø¨Ø±ÙˆÙ…ÙˆÙ…ÙŠØ¯ÙŠØ§" Ø§Ù„ØªØ§Ø¨Ø¹Ø© Ù„Ù…Ø¬Ù…ÙˆØ¹ØªÙ‡ Ø§Ù„Ø¥Ø¹Ù„Ø§Ù…ÙŠØ© ÙˆØ§Ù„ØªÙ‰ ØªØ±ÙƒØ² Ù†Ø´Ø§Ø·Ù‡Ø§ ÙÙ‰ Ø§Ù„Ø´Ù‚ Ø§Ù„ØªØ¬Ø§Ø±Ù‰ Ù„Ù„Ø¥Ø¹Ù„Ø§Ù…ØŒ ÙˆØ§Ù„ØªÙ‰ ÙŠÙ†ÙˆÙ‰ Ø¯Ø¹Ù…Ù‡Ø§ Ù…Ø§Ù„ÙŠØ§Ù‹ ÙˆÙ…Ø¹Ù†ÙˆÙŠØ§Ù‹ ÙˆØ¥Ø¯Ø§Ø±ÙŠØ§Ù‹. ÙˆÙˆÙÙ‚Ø§ Ù„Ø¨ÙŠØ§Ù† ØµØ­ÙÙ‰ Ø§Ù„Ø«Ù„Ø§Ø«Ø§Ø¡ØŒ ÙÙ‚Ø¯ ÙˆØ§ÙÙ‚ Ø§Ù„Ù…Ù‡Ù†Ø¯Ø³ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ Ø¹Ù„Ù‰ Ø±ÙØ¹ Ø±Ø£Ø³ Ø§Ù„Ù…Ø§Ù„ Ø§Ù„Ù…Ø¯ÙÙˆØ¹ Ù„Ø´Ø±ÙƒØ© "Ø¨Ø±ÙˆÙ…ÙˆÙ…ÙŠØ¯ÙŠØ§" Ø¥Ù„Ù‰ 500 Ù…Ù„ÙŠÙˆÙ† Ø¬Ù†ÙŠÙ‡ Ù…ØµØ±Ù‰ Ù„Ù„Ø¯ÙØ¹ Ø¨Ø§Ù„Ø´Ø±ÙƒØ© ÙˆØªØ¹Ø²ÙŠØ² Ù…ÙˆÙ‚ÙÙ‡Ø§ Ø§Ù„Ù…Ø§Ù„Ù‰ØŒ ÙˆÙˆØ§ÙÙ‚ Ø£ÙŠØ¶Ø§Ù‹ Ø¹Ù„Ù‰ Ø£Ù† ÙŠØ±Ø£Ø³ Ù…Ø¬Ù„Ø³ Ø¥Ø¯Ø§Ø±ØªÙ‡Ø§ØŒ ÙÙ‰ Ø­ÙŠÙ† Ø³ÙˆÙ ÙŠØªÙˆÙ„Ù‰ Ø§Ù„Ø³ÙŠØ¯ Ø¥ÙŠÙ‡Ø§Ø¨ Ø·Ù„Ø¹Øª Ù…Ù†ØµØ¨ Ø§Ù„Ø¹Ø¶Ùˆ Ø§Ù„Ù…Ù†ØªØ¯Ø¨ Ù„ÙŠØ¯ÙØ¹ Ø§Ù„Ø´Ø±ÙƒØ© Ø¨Ø®Ø¨Ø±ØªÙ‡ Ø§Ù„ÙˆØ§Ø³Ø¹Ø© ÙÙ‰ Ù…Ø¬Ø§Ù„ Ø§Ù„Ø¥Ø¹Ù„Ø§Ù… Ø¥Ù„Ù‰ Ø§Ù„Ù…Ø²ÙŠØ¯ Ù…Ù† Ø§Ù„Ù†Ø¬Ø§Ø­ØŒ ÙˆÙŠØ¬Ø¹Ù„Ù‡Ø§ ØªØ¹Ø²Ø² Ù…ÙˆÙ‚Ø¹Ù‡Ø§ Ø§Ù„Ø±ÙŠØ§Ø¯Ù‰ ÙÙ‰ Ø§Ù„Ø³ÙˆÙ‚ Ø§Ù„Ù…ØµØ±ÙŠØ© ÙˆØªØ¹Ø¸Ù… Ø­ØµØªÙ‡Ø§ Ø§Ù„Ø³ÙˆÙ‚ÙŠØ©. ÙƒÙ…Ø§ Ø¹Ù„Ù‚ Ø³Ø§ÙˆÙŠØ±Ø³ Ø¹Ù„Ù‰ Ø£Ø«Ø± Ø§Ù„ØªØ·ÙˆØ±Ø§Øª Ø§Ù„Ø£Ø®ÙŠØ±Ø© ÙÙŠÙ…Ø§ ÙŠØ®Øµ Ù†Ø´Ø§Ø· Ø¨Ø±ÙˆÙ…ÙˆÙ…ÙŠØ¯ÙŠØ§ Ù‚Ø§Ø¦Ù„Ø§Ù‹: "Ø¨Ø¨ÙŠØ¹ Ù‚Ù†Ø§Ø© Ø£ÙˆÙ† ØªÙ‰ ÙÙ‰ Ø²Ø§Ù„Øª Ø´Ø¨Ù‡Ø© ØªØ¶Ø§Ø±Ø¨ Ø§Ù„Ù…ØµØ§Ù„Ø­ Ø¨ÙŠÙ† Ø§Ù…ØªÙ„Ø§Ùƒ Ù‚Ù†Ø§Ø© ØªÙ„ÙŠÙØ²ÙŠÙˆÙ†ÙŠØ© ÙˆØ§Ù…ØªÙ„Ø§Ùƒ Ø­Ù‚ÙˆÙ‚ Ø§Ù„Ø¥Ø¹Ù„Ø§Ù† Ù„Ù„Ù‚Ù†ÙˆØ§Øª Ø§Ù„Ø£Ø®Ø±Ù‰ØŒ Ù…Ù…Ø§ ÙŠÙØªØ­ Ù„Ù†Ø§ Ø§Ù„Ø·Ø±ÙŠÙ‚ Ù„Ù„ØªØ¹Ø§ÙˆÙ† Ù…Ø¹ Ø¬Ù…ÙŠØ¹ Ø§Ù„Ù‚Ù†ÙˆØ§Øª". ÙˆØ£Ø¶Ø§Ù Ø§Ù„Ù…Ù„ÙŠØ§Ø±Ø¯ÙŠØ± Ø§Ù„Ù…ØµØ±Ù‰ØŒ Ø£Ù† Ù‚Ù†Ø§Ø© ØªÙ‚ÙˆÙ… Ø¹Ù„Ù‰ Ø§Ù„Ø£Ø®Ø¨Ø§Ø± ÙˆØ§Ù„Ø£Ø­Ø¯Ø§Ø« Ø§Ù„Ø¬Ø§Ø±ÙŠØ© ÙˆØ­Ø¯Ù‡Ø§ Ù„Ø§ ØªØ³ØªØ·ÙŠØ¹ Ø£Ù† ØªØ­Ù‚Ù‚ Ø§Ù„Ø£Ø±Ø¨Ø§Ø­ ÙÙ‰ Ø§Ù„Ø³ÙˆÙ‚ Ø§Ù„Ù…ØµØ±ÙŠØ©ØŒ Ø­ÙŠØ« ÙƒØ§Ù† Ù…Ù† Ø§Ù„Ø¶Ø±ÙˆØ±Ù‰ Ø¥Ø¶Ø§ÙØ© Ù‚Ù†ÙˆØ§Øª ØªÙ‚Ø¯Ù… Ø£Ù†ÙˆØ§Ø¹ Ø£Ø®Ø±Ù‰ Ù…Ù† Ø§Ù„Ù…Ø­ØªÙˆÙ‰ Ø§Ù„ØªÙ„ÙŠÙØ²ÙŠÙˆÙ†Ù‰ Ù…Ø«Ù„ Ø§Ù„Ø¯Ø±Ø§Ù…Ø§ ÙˆØ§Ù„Ø£ÙÙ„Ø§Ù… ÙˆØ§Ù„Ù…Ù†ÙˆØ¹Ø§Øª ÙˆØ§Ù„Ù„Ø§ÙŠÙ Ø³ØªØ§ÙŠÙ„ Ù„Ø®Ù„Ù‚ Ø´Ø¨ÙƒØ© Ù…ØªÙƒØ§Ù…Ù„Ø© ØªØ®Ø§Ø·Ø¨ Ù†ÙˆØ¹ÙŠØ§Øª Ù…Ø®ØªÙ„ÙØ© Ù…Ù† Ø§Ù„Ù…Ø´Ø§Ù‡Ø¯ÙŠÙ†ØŒ ÙˆØ¨Ø§Ù„ØªØ§Ù„Ù‰ ØªØ¬Ø°Ø¨ Ù…ÙˆØ§Ø±Ø¯ Ø¥Ø¹Ù„Ø§Ù†ÙŠØ© ÙƒØ¨ÙŠØ±Ø©ØŒ ÙˆÙ‡Ùˆ Ù…Ø§ ÙƒØ§Ù† ÙŠØªØ·Ù„Ø¨ Ø¶Ø® Ø§Ø³ØªØ«Ù…Ø§Ø±Ø§Øª Ø·Ø§Ø¦Ù„Ø© Ù„Ø¥Ù†Ø´Ø§Ø¡ Ù‡Ø°Ù‡ Ø§Ù„Ø´Ø¨ÙƒØ© Ø§Ù„Ù…ØªÙƒØ§Ù…Ù„Ø©ØŒ ÙˆÙ‡Ùˆ Ù…Ø§ ÙˆØµÙÙ‡ Ø§Ù„Ù…Ù‡Ù†Ø¯Ø³ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ Ø¨Ø£Ù†Ù‡ Ø§Ø³ØªØ«Ù…Ø§Ø± Ù‡Ùˆ Ù„ÙŠØ³ Ø¹Ù„Ù‰ Ø§Ø³ØªØ¹Ø¯Ø§Ø¯ Ø§Ù„Ø®ÙˆØ¶ ÙÙŠÙ‡. ÙƒÙ…Ø§ ÙƒØ§Ù† Ø§Ù„Ù…Ù‡Ù†Ø³ Ù†Ø¬ÙŠØ¨ Ø³Ø§ÙˆÙŠØ±Ø³ Ù‚Ø¯ Ø£Ø¹Ø±Ø¨ Ø¹Ù† Ø£Ù† Ù‚Ù†Ø§Ø© "Ø£ÙˆÙ† ØªÙ‰ ÙÙ‰" Ù‚Ø¯ Ø£ØµØ¨Ø­Øª Ù…ØµØ¯Ø±Ø§Ù‹ Ù„Ù„ØµØ¯Ø§Ø¹ Ù„Ù‡ Ø¨ØµÙØ© Ø´Ø®ØµÙŠØ©ØŒ ÙÙÙ‰ Ø§Ù„Ø¢ÙˆÙ†Ø© Ø§Ù„Ø£Ø®ÙŠØ±Ø© ÙƒØ§Ù† ÙŠØªÙ„Ù‚Ù‰ Ø§Ù„Ù†Ù‚Ø¯ ÙˆØ§Ù„Ø´ÙƒÙˆÙ‰ Ø§Ù„Ø¯Ø§Ø¦Ù…Ø© Ù…Ù† Ø¬Ù…ÙŠØ¹ Ø§Ù„Ø£Ø·Ø±Ø§Ù ÙˆØ§Ù„Ù‚ÙˆÙ‰ Ø§Ù„Ù…Ø®ØªÙ„ÙØ©Ø› ÙÙ…Ø§ Ø¨ÙŠÙ† Ù‚ÙˆÙ‰ Ø«ÙˆØ±Ø© 25 ÙŠÙ†Ø§ÙŠØ± ÙˆÙ…Ù† ÙŠÙØ·Ù„Ù‚ Ø¹Ù„ÙŠÙ‡Ù… Ø§Ù„ÙÙ„ÙˆÙ„ØŒ Ø§Ù„Ù…Ø­Ø§ÙØ¸ÙˆÙ† ÙˆØ§Ù„Ø¥ØµÙ„Ø§Ø­ÙŠÙˆÙ†ØŒ Ø§Ù„Ù†Ø¸Ø§Ù… ÙˆØ§Ù„Ù…Ø¹Ø§Ø±Ø¶Ø©ØŒ ÙƒÙ„Ù‡Ù… Ø¹Ù„Ù‰ Ø­Ø¯ Ø§Ù„Ø³ÙˆØ§Ø¡ ÙƒØ§Ù†ÙˆØ§ ØºÙŠØ± Ø±Ø§Ø¶ÙŠÙ†. ÙˆÙƒØ§Ù† ÙŠØªÙ„Ù‚Ù‰ Ø§Ù„Ù„ÙˆÙ… Ø§Ù„Ø¯Ø§Ø¦Ù…ØŒ Ù…Ù…Ø§ Ø³Ø¨Ø¨ Ù„Ù‡ Ù‡Ùˆ Ø´Ø®ØµÙŠØ§Ù‹ Ø§Ù„Ø¶ÙŠÙ‚. <br /><br /><a href="http://www.youm7.com/story/2016/5/17/%D8%B3%D8%A7%D9%88%D9%8A%D8%B1%D8%B3-%D8%A8%D8%B9%D8%AF-%D8%A8%D9%8A%D8%B9-On-TV--%D8%B1%D9%81%D8%B9-%D8%B1%D8%A3%D8%B3%D9%85%D8%A7%D9%84-%D8%A8%D8%B1%D9%88%D9%85%D9%88-%D9%85%D9%8A%D8%AF%D9%8A%D8%A7-%D9%84%D9%80500-%D9%85%D9%84%D9%8A%D9%88%D9%86-%D8%AC%D9%86%D9%8A/2721623">http://www.youm7.com/story/2016/5/17/Ø³Ø§ÙˆÙŠØ±Ø³-Ø¨Ø¹Ø¯-Ø¨ÙŠØ¹-On-TV--Ø±ÙØ¹-Ø±Ø£Ø³Ù…Ø§Ù„-Ø¨Ø±ÙˆÙ…Ùˆ-Ù…ÙŠØ¯ÙŠØ§-Ù„Ù€500-Ù…Ù„ÙŠÙˆÙ†-Ø¬Ù†ÙŠ/2721623#</a></p>', 2, 2, 5, 1, 0, 0),
(16, '2016-05-17 12:54:05', '2016-05-17 12:54:05', 'sdfhgdf', '', 3, 4141127, '', 'hdsfgsjdsh', '', '<p>xhxfjhxgchf</p>', '', 16, 0, 0, 1, 0, 0),
(17, '2016-05-17 12:54:47', '2016-05-17 12:54:47', 'dfhgsdsdf', '', 3, 4141127, '', 'ghdfhgshdfh', '', '<p>dsfghsdfhgsdfgh</p>', '', 2, 0, 0, 1, 0, 0),
(18, '2016-05-17 13:12:16', '2016-05-17 13:14:28', 'testin role ', '', 3, 4141127, '', 'description', '', '<p>fdsgfdsgsdfgfdsg</p>', '', 2, 0, 0, 1, 0, 0),
(19, '2016-05-17 13:40:56', '2016-05-17 13:40:56', 'test', '', 3, 4141127, '', 'sdfadfa', '', '<p>,jgdlsjagag</p>', '', 2, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `possition` int(11) NOT NULL,
  `nameEnglish` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nameArabic` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ParentID` int(11) DEFAULT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `category`:
--   `ParentID`
--       `category` -> `id`
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `creatDate`, `lastUpdateDate`, `possition`, `nameEnglish`, `nameArabic`, `ParentID`, `isDeleted`) VALUES
(1, '2016-05-09 22:33:40', '2016-05-09 22:37:20', 1, 'News', 'أخبار', NULL, 0),
(2, '2016-05-16 10:47:33', '2016-05-16 10:47:33', 2, 'Local News', 'اخبار محلية', 1, 0),
(3, '2016-05-09 22:35:38', '2016-05-09 23:52:16', 1, 'World News', 'اخبار العالم', 1, 0),
(4, '2016-05-09 23:52:00', '2016-05-09 23:52:00', 3, 'News of University', 'أخبار الجامعة', 1, 0),
(5, '2016-05-16 10:44:28', '2016-05-16 10:44:28', 2, 'Art', 'فن', NULL, 0),
(6, '2016-05-16 10:48:56', '2016-05-16 10:48:56', 1, 'Cinema', 'سينما', 5, 0),
(7, '2016-05-16 10:49:43', '2016-05-16 10:49:43', 2, 'Drama', 'دراما', 5, 0),
(8, '2016-05-16 10:50:09', '2016-05-16 10:50:09', 3, 'Theater', 'مسرح', 5, 0),
(9, '2016-05-16 10:51:42', '2016-05-16 10:51:42', 3, 'Sport', 'رياضة', NULL, 0),
(10, '2016-05-16 10:52:30', '2016-05-16 10:52:30', 1, 'Local Football', 'كرة القدم المحلية', 9, 0),
(11, '2016-05-16 10:53:25', '2016-05-16 10:53:25', 2, 'International Football', 'الدولي لكرة القدم', 9, 0),
(12, '2016-05-16 10:53:54', '2016-05-16 10:53:54', 3, 'Other', 'آخر', 9, 0),
(13, '2016-05-16 10:56:39', '2016-05-16 10:56:39', 4, 'Interviews', 'مقابلات', NULL, 0),
(14, '2016-05-16 10:56:39', '2016-05-16 10:56:39', 5, 'Tech & Science', 'التكنولوجيا والعلوم', NULL, 0),
(15, '2016-05-16 10:57:13', '2016-05-16 10:57:13', 6, 'Economy', 'اقتصاد', NULL, 0),
(16, '2016-05-17 12:49:59', '2016-05-17 12:49:59', 0, 'accidents', 'dsfdsf', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `imageNumber` tinyint(2) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `gallery`:
--   `writerID`
--       `user` -> `id`
--

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `creatDate`, `lastUpdateDate`, `titleEnglish`, `titleArabic`, `display`, `writerID`, `imageNumber`, `isDeleted`) VALUES
(1, '2016-05-17 12:13:50', '2016-05-17 12:23:50', 'Test ', 'afdsf', 3, 4141127, 3, 0),
(2, '2016-05-17 12:21:05', '2016-05-17 12:25:26', 'afdasdf', 'sadfadsf', 3, 4141127, 6, 0),
(3, '2016-05-17 12:57:06', '2016-05-17 12:57:06', 'dhfghsdf', 'hgsdfhgds', 3, 4141127, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `importance` tinyint(1) NOT NULL,
  `source` tinyint(2) NOT NULL,
  `sourceID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `notification`:
--   `userID`
--       `user` -> `id`
--

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `creatDate`, `lastUpdateDate`, `message`, `importance`, `source`, `sourceID`, `userID`, `isDeleted`) VALUES
(1, '2016-05-17 10:21:12', '2016-05-17 10:21:12', 'Multimedia was updated by Marc Wafik', 0, 0, 1, 4141127, 0);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `poll`:
--   `writerID`
--       `user` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `pollchoice`
--

CREATE TABLE `pollchoice` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `textEnglish` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `textArabic` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `PollID` int(11) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `pollchoice`:
--   `PollID`
--       `poll` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `editorID` int(11) NOT NULL,
  `targetID` int(11) NOT NULL,
  `targetType` tinyint(2) NOT NULL,
  `MessageType` tinyint(2) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `updates`:
--   `editorID`
--       `user` -> `id`
--

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `creatDate`, `lastUpdateDate`, `editorID`, `targetID`, `targetType`, `MessageType`, `isDeleted`) VALUES
(1, '2016-05-17 10:21:12', '2016-05-17 10:21:12', 4141127, 1, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fullName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(13) NOT NULL,
  `nameArabic` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `accsesID` int(11) NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `user`:
--   `accsesID`
--       `accses` -> `id`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `creatDate`, `lastUpdateDate`, `fullName`, `email`, `phoneNumber`, `nameArabic`, `password`, `gender`, `accsesID`, `about`, `birthDate`, `isDeleted`) VALUES
(4141076, '2016-05-15 22:35:50', '2016-05-17 11:11:02', 'Ghoneim', 'Ghoneim@gmail.com', 2147483647, '', '86a53dd33aa2112aa01a03ed488a794cfbbfe92607678827e25b7b1f52dad8a2', 0, 1, '', '2000-01-01', 0),
(4141110, '2016-05-15 22:35:50', '2016-05-17 03:24:47', 'Andrew Emad', 'andrew@gmail.com', 2147483647, '', '86a53dd33aa2112aa01a03ed488a794cfbbfe92607678827e25b7b1f52dad8a2', 0, 2, '', '2000-01-01', 0),
(4141127, '2016-05-15 22:35:50', '2016-05-16 09:00:46', 'Marc Wafik', 'marc.wafik@gmail.com', 2147483647, '', '86a53dd33aa2112aa01a03ed488a794cfbbfe92607678827e25b7b1f52dad8a2', 0, 4, '', '2000-01-01', 0),
(4141149, '2016-05-15 22:35:50', '2016-05-16 09:01:23', 'Abdo Mamdouh', 'abdo@gmail.com', 2147483647, '', '86a53dd33aa2112aa01a03ed488a794cfbbfe92607678827e25b7b1f52dad8a2', 0, 3, '', '2000-01-01', 0),
(4141152, '2016-05-15 22:35:50', '2016-05-17 03:24:40', 'Moetasem Salah', 'Moetasem@gmail.com', 2147483647, '', '86a53dd33aa2112aa01a03ed488a794cfbbfe92607678827e25b7b1f52dad8a2', 0, 0, '', '2000-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `id` int(11) NOT NULL,
  `creatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdateDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titleEnglish` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `titleArabic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `writerID` int(11) NOT NULL,
  `youtubeID` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionEnglish` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionArabic` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `youtube`:
--   `writerID`
--       `user` -> `id`
--

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`id`, `creatDate`, `lastUpdateDate`, `titleEnglish`, `titleArabic`, `display`, `writerID`, `youtubeID`, `descriptionEnglish`, `descriptionArabic`, `isDeleted`) VALUES
(1, '2016-05-17 10:15:01', '2016-05-17 10:16:54', 'asdgsadg', 'asgsdag agsd asg asg as', 3, 4141127, '7qzhngp7jh8', 'AFDAfAFfadf', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accses`
--
ALTER TABLE `accses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writerID` (`writerID`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ParentID` (`ParentID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writerID` (`writerID`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`),
  ADD KEY `writerID` (`writerID`);

--
-- Indexes for table `pollchoice`
--
ALTER TABLE `pollchoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PollID` (`PollID`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editorID` (`editorID`),
  ADD KEY `targetID` (`targetID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fullName` (`fullName`),
  ADD KEY `nameArabic` (`nameArabic`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writerID` (`writerID`),
  ADD KEY `titleEnglish` (`titleEnglish`),
  ADD KEY `titleArabic` (`titleArabic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accses`
--
ALTER TABLE `accses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pollchoice`
--
ALTER TABLE `pollchoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
