-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2025 at 10:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `about_greeting` varchar(255) DEFAULT NULL,
  `about_description` text DEFAULT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `profile_gpa_badge` varchar(255) DEFAULT NULL,
  `profile_degree_badge` varchar(255) DEFAULT NULL,
  `cta_button_text` varchar(255) DEFAULT NULL,
  `stat_projects_count` varchar(255) DEFAULT NULL,
  `stat_projects_label` varchar(255) DEFAULT NULL,
  `stat_technologies_count` varchar(255) DEFAULT NULL,
  `stat_technologies_label` varchar(255) DEFAULT NULL,
  `stat_team_count` varchar(255) DEFAULT NULL,
  `stat_team_label` varchar(255) DEFAULT NULL,
  `stat_problem_count` varchar(255) DEFAULT NULL,
  `stat_problem_label` varchar(255) DEFAULT NULL,
  `stats_icon_urls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`stats_icon_urls`)),
  `soft_skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`soft_skills`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `about_greeting`, `about_description`, `profile_name`, `profile_gpa_badge`, `profile_degree_badge`, `cta_button_text`, `stat_projects_count`, `stat_projects_label`, `stat_technologies_count`, `stat_technologies_label`, `stat_team_count`, `stat_team_label`, `stat_problem_count`, `stat_problem_label`, `stats_icon_urls`, `soft_skills`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hi, I\'m Nirujan!', '<p>I\'m<strong> Nirujan</strong>, a passionate Software Engineering undergraduate at <a href=\"https://www.sliit.lk/humanities-sciences/programmes/undergraduate-degree-programs/b-ed-hons-in-biological-sciences-degree/\"><strong>SLIIT</strong></a></p><p><br></p>', 'Nirujan', 'GPA 3.8', 'BSc (Hons) SE', 'Let’s Work Together', '5+', 'Projects Completed', '10+', 'Technologies', '3+', 'Leadership Skills', '15+', 'Solving Expert', '{\"check\":\"https:\\/\\/img.icons8.com\\/?size=100&id=RWH5eUW9Vr7f&format=png&color=000000\",\"projects\":\"https:\\/\\/img.icons8.com\\/?size=100&id=IITEAlVNkuAG&format=png&color=000000\"}', '{\"LeaderShip\":\"https:\\/\\/img.icons8.com\\/?size=100&id=47roIg7hqbZd&format=png&color=000000\",\"Communication\":\"https:\\/\\/img.icons8.com\\/?size=100&id=SKPXwfsncJbF&format=png&color=000000\",\"Problem Solving\":\"https:\\/\\/img.icons8.com\\/?size=100&id=GaZyzpIg5O9B&format=png&color=000000\",\"Risk management \":\"https:\\/\\/img.icons8.com\\/?size=100&id=mKmuHvoyHMOC&format=png&color=000000\"}', '2025-10-30 22:08:07', '2025-12-02 04:56:22'),
(2, 3, 'Hi, I\'m !', 'Driven and innovative developer.', NULL, 'GPA 3.79', 'BSc(Hons)SE', 'Let\'s Work Together', '5+', 'Projects Completed', '10+', 'Technologies', 'Team', 'Leadership Skills', 'Problem', 'Solving Expert', NULL, NULL, '2025-11-17 23:21:14', '2025-11-17 23:21:14'),
(3, 4, 'Hi, I\'m Super Administrator!', 'System Administrator', 'Super Administrator', 'Detech', 'CEO Of Detech', 'Let\'s Work Together', '5+', 'Projects Completed', '15+', 'Technologies', 'Team', 'Leadership Skills', 'Problem', 'Solving Expert', NULL, NULL, '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(4, 5, 'Hi, I\'m !Hi, I\'m Super Administrator!', 'System Administrator', 'Super Administrator', 'GPA 3.79', 'BSc(Hons)SE', 'Let\'s Work Together', '5+', 'Projects Completed', '10+', 'Technologies', 'Team', 'Leadership Skills', 'Problem', 'Solving Expert', NULL, NULL, '2025-11-25 03:31:49', '2025-11-25 03:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `hero_image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `slug`, `excerpt`, `content`, `is_published`, `published_at`, `hero_image_path`, `created_at`, `updated_at`) VALUES
(2, 1, 'check', 'check', 'check', '<p>I’m not a big horror reader normally, but I make an exception in October. I liked&nbsp;</p><p><a href=\"https://medium.com/u/df5437246576?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">aristhought</a></p><p>’s <a href=\"https://aristhought.medium.com/horror-as-an-avenue-for-catharsis-19f94b04e84e\"><span style=\"text-decoration: underline;\">take on it</span></a>: “Horror is a controlled fall into the unknown. It’s a very human way to project our worst fears, our most unspoken questions and worries, and express them in a way that everyone can, in some way, connect with.”</p><p>That’s what’s best about storytelling on Medium: Writers come to make the strange feel familiar and the personal universal.</p><p>What’s scarier,&nbsp;</p><p><a href=\"https://medium.com/u/2fccb851bb5e?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Cassie Kozyrkov</a></p><p>&nbsp;asks, than being sent a thick report from a coworker that looks good on the surface, but when you peek under its mask, it’s actually AI-produced drivel, devoid of any actual insight, thought, or value? If you’ve received something like that recently, congratulations, you’ve just been <a href=\"https://medium.com/data-science-collective/have-you-been-workslopped-yet-d175a8e1a68f\"><span style=\"text-decoration: underline;\">workslopped</span></a>.</p><p>Being confronted with your own mortality and how meaninglessly you spend your time is another spooky experience.&nbsp;</p><p><a href=\"https://medium.com/u/7ba6be8a3022?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Alberto Romero</a></p><p>&nbsp;holds up a mirror to his readers, forcing us to think about <a href=\"https://albertoromgar.medium.com/you-will-die-mid-scroll-f9746b8915d2?sk=v2%2F65c7fab1-90d7-4846-8213-a5f1f35d87fe\"><span style=\"text-decoration: underline;\">how likely it is that we’ll die mid-scroll</span></a>. Like a horror story, you’re forced to admit the person you see (someone who spends hours a day on your phone) isn’t who you wanted to become. There’s no escape: You’re bound to keep repeating your haunted habits unless you exorcise them for good.</p><p>But the flip side of horror is comedy, as emeritus professor&nbsp;</p><p><a href=\"https://medium.com/u/33119d0d191d?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Mark C Watney</a></p><p>demonstrates in his deep exploration into <a href=\"https://markwatney.medium.com/i-place-dr-watney-in-dantes-inferno-for-gluttony-of-his-students-time-9d1bb284552b\"><span style=\"text-decoration: underline;\">why a student of his placed him</span></a>“in Circle 3 for Gluttony of his students’ time.” Don’t worry, though, Dr. Watney was not vindictive. “Finding within myself the Grace to be objective, I reluctantly placed a ‘B+’ on my tormentor’s perceptive paper,” he decided.</p><p>Come to Medium to laugh, cry, gasp — or just to <a href=\"http://story.new/\"><span style=\"text-decoration: underline;\">write your story</span></a>.</p><p>—&nbsp;</p><p><a href=\"https://medium.com/u/a870c0c34e46?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Zulie @ Medium</a></p><h2>By the numbers</h2><ul><li>Members came to Medium stories through search engines 6.9 million times. (Read more about how <a href=\"https://medium.com/blog/partner-program-update-starting-november-1-were-rewarding-search-traffic-3ac0635f9f6b\"><span style=\"text-decoration: underline;\">we’ve shifted our Partner Program</span></a> to reward writers when Medium members find their stories through search.)</li><li>Writers sent 98k member-only stories through <a href=\"https://help.medium.com/hc/en-us/articles/360059837393-Email-notifications\"><span style=\"text-decoration: underline;\">direct email notifications</span></a>to their subscribers</li></ul><h2>New (to Medium) writer corner​</h2><blockquote>Community manager&nbsp;<a href=\"https://medium.com/u/12b50f862078?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Kassandra @ Medium</a></blockquote><p>&nbsp;</p><blockquote>spotlights some new writer stories focused on creativity and imagination:</blockquote><p>I’ve started to consider imagination as the antidote to despair, the tiny spark that helps us persevere, evolve, and hope. In <a href=\"https://medium.com/statecraft/reviving-gaeilge-da43c514949c\"><span style=\"text-decoration: underline;\">Reviving Gaeilge</span></a>,&nbsp;</p><p><a href=\"https://medium.com/u/f0fefa3f107b?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Maia Weatherstone</a></p><p>&nbsp;shares how the Irish language survives through music and shared cultural identity.</p><p>That thread of music as a connection runs through <a href=\"https://kayleighmargaret.medium.com/i-dont-know-the-life-of-a-showgirl-15f873541337\"><span style=\"text-decoration: underline;\">I Don’t Know the Life of a Showgirl</span></a><em>.</em> In a pop landscape defined by eras, re-releases, and reinvention, writer&nbsp;</p><p><a href=\"https://medium.com/u/438fc891d53e?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Kayleigh</a></p><p>&nbsp;asks what happens when an artist’s creativity stops evolving and they lose connection with their fans.</p><p>While in <a href=\"https://medium.com/@sorrenbriarwood/free-the-vampire-reanimating-imagination-at-a-childrens-creative-writing-club-ec6fec3ed86b\"><span style=\"text-decoration: underline;\">Free the Vampire</span></a>,&nbsp;</p><p><a href=\"https://medium.com/u/cb9b8599e741?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Sorren Briarwood</a></p><p>&nbsp;uncovers the importance of recovering imagination as a means of self-exploration and play. Together, these stories celebrate the power of imagination to sustain heritage, challenge stagnation, and reanimate what lies within.</p><h2>Some more great Halloween-themed reads</h2><ul><li><a href=\"https://www.linkedin.com/in/benjamin-bryant-design/\"><span style=\"text-decoration: underline;\">Ben Bryant</span></a> and <a href=\"https://www.linkedin.com/in/christopherdistasi/\"><span style=\"text-decoration: underline;\">Chris DiStasi</span></a> investigate <a href=\"https://medium.com/reimagining-the-civic-commons/what-halloween-can-teach-us-about-civic-life-1221f3538333\"><span style=\"text-decoration: underline;\">the interesting cultural juxtaposition Halloween brings us</span></a>: In our individualistic society, we teach our children to come in when it’s dark and not talk to strangers. On Halloween, that’s upended. What could our culture look like if we extended that energy beyond October 31st? (Written via <br><a href=\"https://medium.com/u/98a57c4acb5a?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Reimagining the Civic Commons</a>)</li><li><br><a href=\"https://medium.com/u/e8ce32af9ee3?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Samantha McBirney</a> <a href=\"https://medium.com/@samanthamcbirney/okay-okay-i-know-its-already-mid-to-late-october-which-means-this-analysis-is-late-this-year-ee4ef55d207e\"><span style=\"text-decoration: underline;\">dives deep into data analysis</span></a> of last year’s Trick or Treaters (AKA ToTs) to her house, including how many ToTs, how many pieces of candy each ToT averaged, and what candy types were most popular with her ToTs. Come for the numbers, stay for the images and decoration philosophy. (“As tradition dictates, all decorations were gone from the yard before morning, preserving what I call the <a href=\"https://medium.com/@samanthamcbirney/2022-the-year-of-the-sour-af91831b9e4a\"><span style=\"text-decoration: underline;\">‘magic of Halloween</span></a>’. When little ones wake up on November 1st, I want them to feel as if it was all a dream.”)</li><li>Crime journalist <br><a href=\"https://medium.com/u/c11fd9686beb?source=post_page---user_mention--eb1ed51c9bc2---------------------------------------\">Jeff Maysh</a> tells <a href=\"https://jeffmaysh.medium.com/i-bought-a-witches-prison-ad2e7cbcecb\"><span style=\"text-decoration: underline;\">the true, haunting story of what happened</span></a> when Vanessa Mitchell bought her dream home — a former medieval jail where England’s witches waited to hang and burn.</li></ul><h2>Featured by Medium editors</h2><p>Did you know publication editors can <a href=\"https://medium.com/blog/introducing-featured-stories-for-publications-a0a714b8151d\"><span style=\"text-decoration: underline;\">Feature</span></a> a limited number of stories from their publication per month, <a href=\"https://medium.com/blog/making-featured-stories-even-more-visible-92c7a534929a\"><span style=\"text-decoration: underline;\">which sends out a notification</span></a> and makes that story more likely to be recommended to followers of that publication?</p>', 1, '2025-11-26 23:59:00', 'blog-hero-images/01KB1WBG2K96BVJ8VPE67BYK0Y.png', '2025-11-26 23:55:08', '2025-12-01 03:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'theme',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(3) UNSIGNED DEFAULT NULL,
  `likes_count` int(11) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `theme_comment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `icon_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `institution`, `degree`, `year`, `details`, `icon_url`, `created_at`, `updated_at`) VALUES
(5, 1, 'JVK', 'G.C.E. Ordinary Level', 'December 2018', '8A 1C - Excellence in ICT, Mathematics, Science, English, and History', 'https://img.icons8.com/?size=100&id=RWH5eUW9Vr7f&format=png&color=000000', '2025-10-28 03:52:31', '2025-10-30 20:18:16'),
(6, 1, 'Chavakachcheri Hindu college', 'G.C.E. Advanced Level - Physical Science', 'May 2019 - February 2022', NULL, 'https://img.icons8.com/?size=100&id=RWH5eUW9Vr7f&format=png&color=000000', '2025-10-28 03:53:49', '2025-11-19 13:13:26'),
(7, 1, 'Sri Lanka Institute of Information Technology (SLIIT)', 'B.Sc.(Hons) in Information Technology', 'May 2023 - Present', 'Specializing in Software Engineering with current GPA of 3.79.Specializing in Software', NULL, '2025-10-28 03:54:31', '2025-12-02 05:23:00'),
(8, 1, 'test', 'test', '2025', NULL, NULL, '2025-11-17 01:57:14', '2025-11-17 01:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 1, 'niru', 'niru@gmail.com', 'test', 'test', '2025-10-28 01:17:03', '2025-10-28 01:17:03'),
(3, 1, 'niru', 'nirujan@gmail.com', 'test1', 'test1', '2025-10-28 02:02:46', '2025-10-28 02:02:46'),
(4, 1, 'niru', 'test@gmail.com', 'test4', 'test4', '2025-10-28 23:14:57', '2025-10-28 23:14:57'),
(5, 1, 'niru', 'niru123@gmail.com', 'salsas', 'ajajaj', '2025-11-17 03:37:58', '2025-11-17 03:37:58'),
(6, 1, 'niru', 'niru@gmail.com', 'test', 'test', '2025-11-19 10:49:55', '2025-11-19 10:49:55'),
(7, 4, 'niru', 'nirujan@gmail.com', 'summa', 'summa', '2025-11-23 20:59:59', '2025-11-23 20:59:59'),
(8, 1, 'test', 'test@gmail.com', 'test 2', 'test2', '2025-11-23 21:02:31', '2025-11-23 21:02:31'),
(9, 1, 'testing ad', 'testing@gmail.com', 'testing ad', 'testing ad', '2025-11-24 00:47:09', '2025-11-24 00:47:09'),
(10, 1, 'testing admin', 'testing@gmail.com', 'testing admin', 'testing admin', '2025-11-24 00:54:23', '2025-11-24 00:54:23'),
(11, 4, 'test 3', 'test@gmail.com', 'test3', 'test3', '2025-11-24 01:02:28', '2025-11-24 01:02:28'),
(12, 1, 'nirujan', 'nirujan@gmail.com', 'nirujan test', 'nirujan test', '2025-11-24 01:04:46', '2025-11-24 01:04:46'),
(13, 3, 'check 2', 'check2@gmail.com', 'check 2', 'check 2', '2025-11-24 01:31:55', '2025-11-24 01:31:55'),
(14, 1, 'check', 'check@gmail.com', 'check', 'check', '2025-11-30 14:37:43', '2025-11-30 14:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `role`, `company`, `duration`, `details`, `created_at`, `updated_at`) VALUES
(3, 1, 'Java Developer', 'Employee Management System', 'July 2024 - Nov 2024', 'Developed comprehensive employee management system using Java, JSP, and OOP principles', '2025-10-28 03:02:46', '2025-10-28 03:02:46'),
(4, 1, 'Full-Stack Developer & Team Lead', 'Arotac Food Ordering System', 'Feb 2025 - May 2025', 'Led team in developing a real-time food ordering system using MERN stack with Socket.IO and Maps API integration', '2025-10-28 03:03:32', '2025-10-28 03:03:32'),
(5, 1, 'Full-Stack Developer ', 'RevoMart', 'June 2025-October 2025', 'A second hand goods selling and swapping system', '2025-10-28 03:05:41', '2025-10-28 03:05:41'),
(6, 1, 'Software Engineering Intern', 'Detect Technologies', 'Present', 'Currently learning the Laravel and blade', '2025-10-28 03:06:43', '2025-11-17 00:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hero_contents`
--

CREATE TABLE `hero_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `greeting` varchar(255) NOT NULL DEFAULT 'Hi, I''m',
  `description` text DEFAULT NULL,
  `typing_texts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`typing_texts`)),
  `btn_contact_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `btn_contact_text` varchar(255) NOT NULL DEFAULT 'Get In Touch',
  `btn_projects_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `btn_projects_text` varchar(255) NOT NULL DEFAULT 'View My Work',
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `tech_stack_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `tech_stack_count` int(11) NOT NULL DEFAULT 4,
  `hero_image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_contents`
--

INSERT INTO `hero_contents` (`id`, `user_id`, `greeting`, `description`, `typing_texts`, `btn_contact_enabled`, `btn_contact_text`, `btn_projects_enabled`, `btn_projects_text`, `social_links`, `tech_stack_enabled`, `tech_stack_count`, `hero_image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hi I\'m  ', '<p>Innovative SLIIT undergraduate specializing in Software Engineering, with strong academics and full-stack experience. Seeking a software engineering internship to apply technical skills, build scalable solutions, and deliver impactful user experiences.</p>', '[{\"text\":\"MERN developer \"},{\"text\":\"Laravel Developer \"},{\"text\":\"Mobile app developer\"}]', 1, 'Hire Me ', 1, 'My Work', '[{\"name\":\"GitHub\",\"url\":\"https:\\/\\/github.com\\/niranjan0814\",\"icon\":\"https:\\/\\/logo.svgcdn.com\\/devicon\\/github-original-wordmark.png\",\"color\":\"#f55c3b\"},{\"name\":\"LinkedIn\",\"url\":\"https:\\/\\/www.linkedin.com\\/in\\/niranjan-sivarasa-56ba57366?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app\",\"icon\":\"https:\\/\\/logo.svgcdn.com\\/logos\\/linkedin-icon.png\",\"color\":\"#f5513b\"}]', 1, 10, NULL, NULL, '2025-12-01 07:05:21'),
(2, 3, 'Hi, I\'m', 'Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies', '[]', 1, 'Get In Touch', 1, 'View My Work', '[]', 1, 4, NULL, '2025-11-17 23:21:14', '2025-11-18 04:09:00'),
(3, 4, 'Hi, I\'m', 'Transforming ideas into elegant, scalable digital solutions', '\"[{\\\"text\\\":\\\"Full-Stack Developer\\\"},{\\\"text\\\":\\\"MERN Stack Enthusiast\\\"},{\\\"text\\\":\\\"Problem Solver\\\"}]\"', 1, 'Get In Touch', 1, 'View My Work', '[{\"name\":\"GitHub\",\"url\":\"https:\\/\\/github.com\\/niranjan0814\",\"icon\":\"https:\\/\\/logo.svgcdn.com\\/devicon\\/github-original-wordmark.png\",\"color\":\"#f55c3b\"},{\"name\":\"LinkedIn\",\"url\":\"https:\\/\\/www.linkedin.com\\/in\\/niranjan-sivarasa-56ba57366?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app\",\"icon\":\"https:\\/\\/logo.svgcdn.com\\/logos\\/linkedin-icon.png\",\"color\":\"#f5513b\"}]', 1, 4, NULL, '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(4, 5, 'Hi, I\'m', 'Transforming ideas into elegant, scalable digital solutions', '\"[{\\\"text\\\":\\\"Full-Stack Developer\\\"},{\\\"text\\\":\\\"MERN Stack Enthusiast\\\"},{\\\"text\\\":\\\"Problem Solver\\\"}]\"', 1, 'Get In Touch', 1, 'View My Work', '\"[]\"', 1, 4, NULL, '2025-11-25 03:31:49', '2025-11-25 03:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_contents`
--

CREATE TABLE `landing_page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_contents`
--

INSERT INTO `landing_page_contents` (`id`, `section`, `key`, `value`, `type`, `order`, `created_at`, `updated_at`) VALUES
(1, 'hero', 'hero_title', 'Showcase Your Extraordinary ', 'text', 1, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(2, 'hero', 'hero_subtitle', 'Create a stunning, professional portfolio in minutes. Impress clients, employers, and collaborators with a portfolio that truly represents your skills and achievements.', 'textarea', 2, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(3, 'hero', 'hero_cta_primary', 'Get Started', 'text', 3, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(4, 'hero', 'hero_cta_secondary', 'Learn More', 'text', 4, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(5, 'features', 'features_title', 'Why Choose Detech?', 'text', 1, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(6, 'features', 'features_subtitle', 'Everything you need to build and manage your professional portfolio', 'textarea', 2, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(7, 'features', 'feature_1_title', 'Lightning Fast', 'text', 3, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(8, 'features', 'feature_1_description', 'Optimized performance and instant loading times to keep your visitors engaged.', 'textarea', 4, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(9, 'features', 'feature_2_title', 'Fully Customizable', 'text', 5, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(10, 'features', 'feature_2_description', 'Multiple themes and layouts to match your personal style and brand identity.', 'textarea', 6, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(11, 'features', 'feature_3_title', 'Secure & Reliable', 'text', 7, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(12, 'features', 'feature_3_description', 'Enterprise-grade security and 99.9% uptime guarantee for peace of mind.', 'textarea', 8, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(13, 'themes', 'themes_title', 'Choose Your Theme', 'text', 1, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(14, 'themes', 'themes_subtitle', 'Select from beautifully designed themes to get started', 'textarea', 2, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(15, 'contact', 'contact_title', 'Get in Touch', 'text', 1, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(16, 'contact', 'contact_subtitle', 'Have questions about Detech? We\'re here to help! Send us a message and we\'ll respond as soon as possible.', 'textarea', 2, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(17, 'contact', 'contact_email', 'support@detech.com', 'text', 3, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(18, 'contact', 'contact_phone', '0771213145', 'text', 4, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(19, 'contact', 'contact_address', '123 Tech Street, Silicon Valley, CA', 'text', 5, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(20, 'footer', 'footer_company_name', 'Detech Digital Solutions', 'text', 1, '2025-11-20 22:43:01', '2025-11-21 04:10:24'),
(21, 'footer', 'footer_tagline', 'Build stunning portfolios effortlessly.', 'text', 2, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(22, 'footer', 'footer_copyright', '© 2025 Detech Company. All rights reserved.', 'text', 3, '2025-11-20 22:43:01', '2025-11-21 01:47:14'),
(24, 'hero', 'stat_1_value', '500+', 'text', 1, '2025-11-21 06:42:56', '2025-11-24 05:38:42'),
(25, 'hero', 'stat_1_label', 'Portfolios Created', 'text', 2, '2025-11-21 06:42:56', '2025-11-24 05:38:42'),
(26, 'hero', 'stat_2_value', '50K+', 'text', 3, '2025-11-21 06:42:56', '2025-11-24 05:38:42'),
(27, 'hero', 'stat_2_label', 'Active Users', 'text', 4, '2025-11-21 06:42:56', '2025-11-24 05:38:42'),
(28, 'hero', 'stat_3_value', '99.9%', 'text', 5, '2025-11-21 06:42:56', '2025-11-24 05:38:42'),
(29, 'hero', 'stat_3_label', 'Uptime', 'text', 6, '2025-11-21 06:42:56', '2025-11-24 05:38:42'),
(30, 'hero', 'visual_type', 'portfolio_preview', 'text', 0, '2025-11-21 06:53:46', '2025-11-24 05:01:56'),
(31, 'hero', 'preview_name', 'Niranjan Sivarasa', 'text', 2, '2025-11-21 06:53:46', '2025-11-24 05:38:42'),
(32, 'hero', 'preview_title', ' Undergraduate at SLIIT specializing in Software Engineering. check', 'text', 3, '2025-11-21 06:53:46', '2025-11-24 05:48:42'),
(33, 'hero', 'preview_bio', ' Software Engineering undergraduate at SLIIT.', 'textarea', 4, '2025-11-21 06:53:46', '2025-11-24 05:38:42'),
(34, 'hero', 'preview_projects_count', '5', 'text', 5, '2025-11-21 06:53:46', '2025-11-24 05:38:42'),
(35, 'hero', 'preview_clients_count', '10+', 'text', 6, '2025-11-21 06:53:46', '2025-11-24 05:38:42'),
(36, 'hero', 'preview_awards_count', '5', 'text', 7, '2025-11-21 06:53:46', '2025-11-24 05:38:42'),
(44, 'hero', 'hero_title_line2', 'Work', 'text', 2, '2025-11-21 07:18:03', '2025-11-21 07:18:03'),
(45, 'hero', 'preview_user_id', '1', 'text', 0, '2025-11-21 02:02:15', '2025-11-23 20:58:29'),
(46, 'hero', 'preview_portfolio_url', 'http://localhost:8000/portfolio/niranjan-sivarasa', 'text', 0, '2025-11-24 05:38:42', '2025-11-24 05:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_27_071407_create_projects_table', 1),
(5, '2025_10_27_071504_create_skills_table', 1),
(6, '2025_10_27_071510_create_experiences_table', 1),
(7, '2025_10_27_071518_create_education_table', 1),
(8, '2025_10_27_071602_create_enquiries_table', 1),
(9, '2025_10_28_095341_add_category_to_skills_table', 2),
(10, '2025_10_28_104828_create_page_contents_table', 2),
(11, '2025_10_29_082054_add_url_to_skills_table', 3),
(12, '2025_10_29_084224_add_depurl_to_projects_table', 4),
(13, '2025_10_30_102944_add_user_id_to_page_contents_table', 5),
(14, '2025_10_31_004633_add_profile_details_to_users_table', 6),
(15, '2025_10_31_014203_add_icon_url_to_educations_table', 7),
(16, '2025_10_31_020341_add_profile_image_to_users_table', 8),
(17, '2025_10_31_020552_create_abouts_table', 9),
(18, '2025_10_31_051641_create_project_overviews_table', 10),
(19, '2025_10_31_083538_create_hero_contents_table', 11),
(20, '2025_10_31_094401_create_hero_contents_table', 12),
(21, '2025_10_31_100150_create_hero_contents_table', 13),
(22, '2025_10_31_101801_create_hero_contents_table', 14),
(23, '2025_11_01_201523_add_cv_path_to_users_table', 15),
(24, '2025_11_18_051133_add_user_id_to_portfolio_tables', 16),
(25, '2025_11_18_063026_add_slug_to_users_table', 17),
(26, '2025_11_19_035748_add_theme_to_users_table', 18),
(27, '2025_11_21_023842_create_permission_tables', 19),
(28, '2025_11_21_024230_create_themes_table', 20),
(29, '2025_11_21_024630_create_theme_user_table', 21),
(30, '2025_11_21_024631_create_landing_page_contents_table', 21),
(31, '2025_11_21_073138_add_preview_user_to_landing_page_contents', 22),
(32, '2025_11_24_115159_add_favicon_path_to_users_table', 23),
(33, '2025_11_25_100627_create_theme_comments_table', 24),
(34, '2025_11_26_054923_rename_and_enhance_comments_table', 25),
(35, '2025_11_26_075918_add_category_to_theme_comments_table', 26),
(36, '2025_11_26_083700_add_parent_id_to_theme_comments_table', 27),
(37, '2025_11_26_120000_create_blogs_table', 28),
(38, '2025_11_27_113211_add_blog_id_to_theme_comments_table', 29),
(39, '2025_11_27_114429_create_comment_likes_table', 30),
(40, '2025_11_28_114128_add_clean_profile_image_to_users_table', 30),
(41, '2025_12_03_093753_add_component_path_to_themes_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `section` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `user_id`, `key`, `value`, `type`, `section`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'about_heading', 'About Me', 'text', 'about', 'Main heading for about section', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(2, 1, 'about_greeting', 'Hi, I\'m Niranjan!', 'text', 'about', 'Greeting text in about section', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(3, 1, 'about_description', 'Driven and innovative undergraduate at <span class=\"font-semibold text-blue-600\">SLIIT</span> specializing in <span class=\"font-semibold text-purple-600\">Software Engineering</span>, with a strong academic record and hands-on experience in full-stack development.', 'html', 'about', 'Main description text in about section', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(4, 1, 'profile_image', '/images/profile.png', 'image', 'about', 'Profile image path', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(5, 1, 'profile_name', 'Niranjan Sivarasa', 'text', 'about', 'Profile name for alt text', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(6, 1, 'profile_gpa_badge', 'GPA 3.6', 'text', 'about', 'GPA badge text', '2025-10-28 05:56:28', '2025-10-28 23:38:54'),
(7, 1, 'profile_degree_badge', 'BSc(Hons)SE', 'text', 'about', 'Degree badge text', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(8, 1, 'stat_projects_count', '5+', 'text', 'about', 'Projects completed count', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(9, 1, 'stat_projects_label', 'Projects Completed', 'text', 'about', 'Projects stat label', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(10, 1, 'stat_technologies_count', '10+', 'text', 'about', 'Technologies count', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(11, 1, 'stat_technologies_label', 'Technologies', 'text', 'about', 'Technologies stat label', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(12, 1, 'stat_team_count', 'Team', 'text', 'about', 'Team stat count', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(13, 1, 'stat_team_label', 'Leadership Skills', 'text', 'about', 'Team stat label', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(14, 1, 'stat_problem_count', 'Problem', 'text', 'about', 'Problem solving stat count', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(15, 1, 'stat_problem_label', 'Solving Expert', 'text', 'about', 'Problem solving stat label', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(16, 1, 'cta_button_text', 'Let\'s Work Together', 'text', 'about', 'CTA button text in about section', '2025-10-28 05:56:28', '2025-10-28 05:56:28'),
(17, 1, 'hero_greeting', 'Hello, I\'m', 'text', 'hero', 'Nirujan', '2025-10-30 05:04:53', '2025-10-31 02:51:00'),
(18, 1, 'hero_name', 'Niranjan Sivarasa', 'text', 'hero', 'Your full name', '2025-10-30 05:04:53', '2025-10-30 12:49:12'),
(19, 1, 'hero_typing_texts', 'Full-Stack Developer,MERN Stack Enthusiast,Software Engineering Student,Problem Solver,Team Leader', 'text', 'hero', 'Comma-separated list of typing animation texts', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(20, 1, 'hero_description', 'Transforming ideas into elegant, scalable digital solutions with the power of modern web technologies', 'textarea', 'hero', 'Hero section description/tagline', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(21, 1, 'hero_primary_button_text', 'Get In Touch', 'text', 'hero', 'Primary button text', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(22, 1, 'hero_primary_button_link', '#contact', 'text', 'hero', 'Primary button link (use # for same page)', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(23, 1, 'hero_secondary_button_text', 'View My Work', 'text', 'hero', 'Secondary button text', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(24, 1, 'hero_secondary_button_link', '#projects', 'text', 'hero', 'Secondary button link', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(25, 1, 'hero_github_url', 'https://github.com/niranjan0814', 'text', 'hero', 'GitHub profile URL', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(26, 1, 'hero_linkedin_url', 'https://linkedin.com/in/niranjan-sivarasa-56ba57366', 'text', 'hero', 'LinkedIn profile URL', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(27, 1, 'hero_email', 'niranjansivarajah35@gmail.com', 'text', 'hero', 'Email address', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(28, 1, 'hero_tech_stack_label', 'Tech Stack:', 'text', 'hero', 'Tech stack label text', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(29, 1, 'hero_tech_stack_icons', 'React|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg,Node.js|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg,MongoDB|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg,JavaScript|https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg', 'textarea', 'hero', 'Tech stack icons (format: Name|URL,Name|URL)', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(30, 1, 'hero_scroll_text', 'Scroll to explore', 'text', 'hero', 'Scroll indicator text', '2025-10-30 05:04:53', '2025-10-30 05:04:53'),
(31, 1, 'test', 'test', 'text', 'hero', 'test', '2025-10-30 12:47:40', '2025-10-30 12:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_all_users', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(2, 'manage_users', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(3, 'delete_users', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(4, 'assign_roles', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(5, 'view_all_themes', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(6, 'create_themes', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(7, 'edit_themes', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(8, 'delete_themes', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(9, 'upload_themes', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(10, 'access_premium_themes', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(11, 'edit_landing_page', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(12, 'publish_landing_page', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(13, 'manage_own_portfolio', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(14, 'view_analytics', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(15, 'manage_subscriptions', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(16, 'view_payments', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(17, 'manage_system_settings', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(18, 'view_logs', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `depurl` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `title`, `description`, `link`, `depurl`, `image`, `tags`, `created_at`, `updated_at`) VALUES
(3, 1, 'Employee Management System ', 'The office system with manager , employe side management system ', 'https://github.com/niranjan0814/EmployeeManagementSystem', NULL, '01K8N4J0BYBXMEQBF6YPZC908N.webp', NULL, '2025-10-28 03:27:47', '2025-10-28 04:52:58'),
(4, 1, 'Online Voting System ', 'A voting system for reality show voting for contents by people ', 'https://github.com/niranjan0814/OnlineVotingSystem', NULL, '01K8N1CAPPWTWQ2C61EMW8NX9F.jpg', NULL, '2025-10-28 03:28:54', '2025-10-28 04:53:07'),
(5, 1, 'RevoMart', 'A second hand good selling and swapping system with realtime chat', 'https://github.com/IT23276628Shiv/SPM-Project-NU.git', 'https://github.com/IT23276628Shiv/SPM-Project-NU.git', '01K8N152EK721511QZYY8R7QVF.png', NULL, '2025-10-28 03:36:24', '2025-10-29 03:16:37'),
(6, 1, 'HealthCareSystem', 'A healthcare system for the patient , doctor and receptionist health card scanning and identify the details ', 'https://github.com/IT23276628Shiv/CSSE-Project-NU.git', NULL, '01K8N1APBXVKMDHDMFN16KEEFH.jpg', NULL, '2025-10-28 03:40:33', '2025-10-28 03:40:33'),
(8, 1, 'Online Food Ordering System - Arotac', 'Online food ordering system with restaurant manager side system, delivery person side system, in-restaurant & home customer side system ', ' https://github.com/niranjan0814/ArotacFoodOrderingSystem', NULL, '01K8N5KEA8QMQZ7W7MEDQ7WCVX.jpg', NULL, '2025-10-28 04:55:14', '2025-10-28 04:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `project_overviews`
--

CREATE TABLE `project_overviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `overview_description` text DEFAULT NULL,
  `key_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`key_features`)),
  `gallery_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery_images`)),
  `tech_stack` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tech_stack`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_overviews`
--

INSERT INTO `project_overviews` (`id`, `user_id`, `project_id`, `overview_description`, `key_features`, `gallery_images`, `tech_stack`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '<p><strong>testing&nbsp;</strong></p><p><span style=\"text-decoration: underline;\">break testing&nbsp;</span></p>', '{\"realtime chat\":\"The messaging system with realtime chatting \"}', '[\"https:\\/\\/avatars.githubusercontent.com\\/u\\/189257640?v=4\",\"https:\\/\\/avatars.githubusercontent.com\\/u\\/189257640?v=4\",\"https:\\/\\/avatars.githubusercontent.com\\/u\\/189257640?v=4\",\"https:\\/\\/avatars.githubusercontent.com\\/u\\/189257640?v=4\"]', '[\"12\",\"5\",\"11\",\"4\",\"13\",\"18\",\"8\"]', NULL, '2025-11-28 09:28:19'),
(2, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(2, 'premium_user', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01'),
(3, 'free_user', 'web', '2025-11-20 22:43:01', '2025-11-20 22:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AEYL1YdaM1H0QsFa1wMhb72H98fTAUBwWEDwZ2Py', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibXkxZjYwUGswY0xSdW1uUWZKY0ZiZXZoYldQNnlBWHFkUUt6c1FORSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi91c2Vycy9uaXJhbmphbi1zaXZhcmFzYS9lZGl0IjtzOjU6InJvdXRlIjtzOjM1OiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMudXNlcnMuZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRNMlAzTFlwM0duRkNsWUpQQ2Z6dnNlYU9rTk9jRGZIb3VsQ0cwMmNzSUk1aTdRZkxSR2pzQyI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1764748983),
('QkYfpxjmT54XICJ2NUl5nGYOdD8mM4nrS6AMvdjs', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSHZ0MmhVQ0YxMXdPd1FPVFgzcGVadFJXQzQxU2xRVHVaWkZIbnk0VSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3VzZXJzIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2Vycy9uaXJhbmphbi1zaXZhcmFzYS9lZGl0IjtzOjU6InJvdXRlIjtzOjM1OiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMudXNlcnMuZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRNMlAzTFlwM0duRkNsWUpQQ2Z6dnNlYU9rTk9jRGZIb3VsQ0cwMmNzSUk1aTdRZkxSR2pzQyI7fQ==', 1764751745),
('U53YXZ5fqLlyA3MS1dIgN68pUD82M62TIIfNJ4It', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSUkydFNkUFNjUUJQMDFKME1xa3ZqZEszYTJTUjJzaHExU1Q3TXQxUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2Vycy9uaXJhbmphbi1zaXZhcmFzYS9lZGl0IjtzOjU6InJvdXRlIjtzOjM1OiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMudXNlcnMuZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRNMlAzTFlwM0duRkNsWUpQQ2Z6dnNlYU9rTk9jRGZIb3VsQ0cwMmNzSUk1aTdRZkxSR2pzQyI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1764753104);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `category` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `name`, `url`, `level`, `category`, `created_at`, `updated_at`) VALUES
(3, 1, 'React', 'https://logo.svgcdn.com/logos/react.png', '90%', 'frontend', '2025-10-28 02:51:21', '2025-10-29 22:54:31'),
(4, 1, 'Node.js', 'https://logo.svgcdn.com/logos/nodejs.png', '80%', 'backend', '2025-10-28 02:51:43', '2025-10-29 22:52:39'),
(5, 1, 'MongoDB', 'https://logo.svgcdn.com/devicon/mongodb-original.png', '70%', 'database', '2025-10-28 02:51:56', '2025-10-29 22:53:53'),
(6, 1, 'JavaScript', 'https://logo.svgcdn.com/logos/jss.png', '90%', 'frontend', '2025-10-28 02:52:10', '2025-10-29 22:54:49'),
(7, 1, 'MySQL', 'https://logo.svgcdn.com/devicon/mysql-original-wordmark.png', '80%', 'database', '2025-10-28 02:52:26', '2025-10-29 22:54:11'),
(8, 1, 'GIT', 'https://logo.svgcdn.com/devicon/git-original-wordmark.png', '70%', 'tools', '2025-10-28 02:53:12', '2025-10-29 22:56:35'),
(9, 1, 'HTML5', 'https://logo.svgcdn.com/devicon/html5-original-wordmark.png', '90%', 'frontend', '2025-10-28 02:53:50', '2025-10-29 22:55:08'),
(10, 1, 'CSS3', 'https://logo.svgcdn.com/devicon/css3-original-wordmark.png', '80%', 'frontend', '2025-10-28 02:54:05', '2025-10-29 22:55:26'),
(11, 1, 'Tailwind', 'https://logo.svgcdn.com/devicon/tailwindcss-original.png', '60%', 'frontend', '2025-10-28 02:54:23', '2025-10-29 22:55:49'),
(12, 1, 'Reactnative', 'https://logo.svgcdn.com/devicon/reactnative-original-wordmark.png', '80%', 'frontend', '2025-10-28 04:42:29', '2025-10-29 22:56:10'),
(13, 1, 'ExpressJS', 'https://logo.svgcdn.com/simple-icons/express-dark.png', '80%', 'backend', '2025-10-28 04:44:42', '2025-10-29 22:53:02'),
(14, 1, 'Java', 'https://logo.svgcdn.com/logos/java.png', '90%', 'backend', '2025-10-28 04:45:51', '2025-10-29 22:53:16'),
(15, 1, 'PHP', 'https://logo.svgcdn.com/logos/php.png', '80%', 'backend', '2025-10-28 04:46:15', '2025-10-29 22:53:34'),
(17, 1, 'Mapbox', 'https://logo.svgcdn.com/devicon/mapbox-original.png', 'Experienced ', 'tools', '2025-10-28 04:47:45', '2025-10-29 22:56:55'),
(18, 1, 'Socketio', 'https://logo.svgcdn.com/cib/socket-io-dark.png', 'Experienced ', 'tools', '2025-10-28 04:49:48', '2025-10-29 22:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `component_path` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `version` varchar(255) NOT NULL DEFAULT '1.0.0',
  `author` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `zip_file_path` varchar(255) DEFAULT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`colors`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `slug`, `component_path`, `description`, `version`, `author`, `thumbnail_path`, `zip_file_path`, `is_premium`, `is_active`, `sort_order`, `created_by`, `features`, `colors`, `created_at`, `updated_at`) VALUES
(1, 'Modern Professional', 'theme1', 'theme1', 'Clean, contemporary design with glassmorphism effects and smooth animations', '1.0.0', 'Detech Team', 'themes/thumbnails/01KBH580M9AE3M9QJ676ESEA6E.png', NULL, 0, 1, 1, NULL, '[\"Dark Mode Support\",\"Glassmorphism Effects\",\"Mobile Responsive\",\"SEO Optimized\",\"Fast Loading\"]', '{\"primary\":\"#3B82F6\",\"secondary\":\"#8B5CF6\",\"accent\":\"#F59E0B\",\"background\":\"#F9FAFB\"}', '2025-11-20 22:43:01', '2025-12-03 03:49:07'),
(2, 'Golde', 'golde', 'theme2', 'Professional business layout with minimal design principles', '1.0.0', 'Detech Team', 'themes/thumbnails/01KBH590SN1ZVNH8F78D5E3H4H.png', NULL, 1, 1, 2, NULL, '[\"Minimal Design\",\"Typography Focused\",\"Business Ready\",\"Fast Performance\"]', '{\"primary\":\"#059669\",\"secondary\":\"#10B981\",\"accent\":\"#34D399\",\"background\":\"#FFFFFF\"}', '2025-11-20 22:43:01', '2025-12-03 05:47:51'),
(3, 'Creative Blod', 'creative-blod', 'theme3', 'Vibrant and artistic design for creative professionals', '1.0.0', 'Detech Team', 'themes/thumbnails/01KBH59M994CKCF3JK6XVV7C7P.png', NULL, 1, 1, 3, NULL, '[\"Bold Colors\",\"Dynamic Animations\",\"check\"]', '{\"primary\":\"#F59E0B\",\"secondary\":\"#D97706\",\"accent\":\"#B45309\",\"background\":\"#1F2937\"}', '2025-11-20 22:43:01', '2025-12-03 05:34:48'),
(9, 'GoldenCheckcheck', 'goldencheckcheck', 'theme4', 'checking purpose', '1.0.0', 'Super Administrator', 'themes/thumbnails/01KBHB26NMF71NDW88J5TNDWJH.png', 'themes/zips/01KBHB26NKAM2GYCVXR322T42G.zip', 1, 1, 4, 4, '[\"SEO Optimized\",\"Mobile Responsive\",\"Glassmorphism Effects\"]', '{\"primary\":\"#3B82F6\",\"secondary\":\"#8B5CF6\",\"accent\":\"#F59E0B\"}', '2025-12-03 05:30:48', '2025-12-03 06:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `theme_comments`
--

CREATE TABLE `theme_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_id` bigint(20) UNSIGNED DEFAULT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'theme',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `rating` tinyint(3) UNSIGNED DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_comments`
--

INSERT INTO `theme_comments` (`id`, `theme_id`, `blog_id`, `category`, `user_id`, `parent_id`, `comment`, `rating`, `is_approved`, `created_at`, `updated_at`) VALUES
(13, NULL, 2, 'blog', 1, NULL, 'check', NULL, 1, '2025-11-27 06:12:34', '2025-11-27 06:12:34'),
(14, NULL, 2, 'blog', 1, 13, 'check reply', NULL, 1, '2025-11-27 06:12:44', '2025-11-27 06:12:44'),
(18, NULL, 2, 'blog', 5, NULL, 'checking 1', NULL, 1, '2025-12-02 04:07:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theme_user`
--

CREATE TABLE `theme_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `theme_id` bigint(20) UNSIGNED NOT NULL,
  `purchased_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_user`
--

INSERT INTO `theme_user` (`id`, `user_id`, `theme_id`, `purchased_at`, `expires_at`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 1, NULL, NULL),
(2, 1, 3, NULL, NULL, 1, NULL, NULL),
(9, 5, 1, '2025-11-25 03:31:49', NULL, 1, '2025-11-25 03:31:49', '2025-11-25 03:31:49'),
(11, 1, 9, '2025-12-03 05:31:01', NULL, 1, '2025-12-03 05:31:01', '2025-12-03 05:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `github_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `clean_profile_image` varchar(255) DEFAULT NULL,
  `favicon_path` varchar(255) DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `active_theme` varchar(255) NOT NULL DEFAULT 'theme1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `full_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `description`, `phone`, `address`, `location`, `github_url`, `linkedin_url`, `profile_image`, `clean_profile_image`, `favicon_path`, `cv_path`, `active_theme`) VALUES
(1, 'Nirujan', 'niranjan-sivarasa', 'Niranjan Sivarasa', 'nirujan@gmail.com', NULL, '$2y$12$M2P3LYp3GnFClYJPCfzvseaOkNOcDfHoulCG02csII5i7QfLRGjsC', NULL, '2025-10-28 00:40:28', '2025-12-03 09:01:51', 'Driven and innovative undergraduate at SLIIT specializing in Software Engineering, with a strong\nacademic record and hands-on experience in full-stack development. Seeking a software\nengineering internship to leverage technical expertise and leadership skills. Passionate about\nbuilding scalable web applications and delivering impactful user experiences.', '+94 776 23 139', '424/11 KKS road Jaffna', 'Jaffna,Srilanka', 'https://github.com/niranjan0814/', 'https://www.linkedin.com/in/niranjan-sivarasa-56ba57366?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app', 'https://avatars.githubusercontent.com/u/189257640?v=4', NULL, 'favicons/01KAWTMR7QZ6E64H2B6Z9RDX6H.png', 'cvs/01K90HTBS6JSY4SGV3TNWSR02V.pdf', 'theme1'),
(3, 'Nirujan2', 'nirujan2', NULL, 'nirujan2@gmail.com', NULL, '$2y$12$M2P3LYp3GnFClYJPCfzvseaOkNOcDfHoulCG02csII5i7QfLRGjsC', NULL, '2025-11-17 23:21:14', '2025-11-17 23:21:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'favicons/01KAWTMR7QZ6E64H2B6Z9RDX6H.png', NULL, 'theme1'),
(4, 'Menakan Vijayanathan', 'super-administrator', 'Super Administrator', 'hello@detech.live', NULL, '$2y$12$L1qsQM5LZYxB8gKAi0W9aOFy1BZE55.ydERJ6i5EJjfa8/FBfwMmy', 'westakGdc5Ey60BG1LNRb8Ik8QVK7AZWYk8Ldfa8BPEBQ62tqI4LPw0NDd0Z', '2025-11-20 22:43:01', '2025-12-03 06:17:18', 'System Administrator', '+94 71 5718 361', 'No. 5, Vishaladchi Lane,Mallakam,\r\nJaffna, Sri Lanka', 'Jaffna, Sri Lanka', NULL, 'https://www.linkedin.com/company/detechlive/', 'https://www.detech.live/images/ourTeam/menon.png', NULL, '', NULL, 'golde'),
(5, 'nirucheck', 'nirucheck', NULL, 'nirucheck@gmail.com', NULL, '$2y$12$VuqR5s4R/oDfin9iyQq00utWAtOEsNqOi1oHoPV0CnmCOk9Gg/1oi', NULL, '2025-11-25 03:31:49', '2025-11-25 03:31:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'theme1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abouts_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_comments_user_id_foreign` (`user_id`),
  ADD KEY `theme_comments_theme_id_created_at_index` (`theme_id`,`created_at`),
  ADD KEY `comments_category_is_approved_index` (`category`,`is_approved`),
  ADD KEY `comments_parent_id_index` (`parent_id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_likes_user_id_theme_comment_id_unique` (`user_id`,`theme_comment_id`),
  ADD KEY `comment_likes_theme_comment_id_foreign` (`theme_comment_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_user_id_index` (`user_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_contents`
--
ALTER TABLE `hero_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hero_contents_user_id_unique` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page_contents`
--
ALTER TABLE `landing_page_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `landing_page_contents_section_key_unique` (`section`,`key`),
  ADD KEY `landing_page_contents_section_index` (`section`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_contents_key_unique` (`key`),
  ADD KEY `page_contents_user_id_section_index` (`user_id`,`section`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_overviews`
--
ALTER TABLE `project_overviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_overviews_project_id_foreign` (`project_id`),
  ADD KEY `project_overviews_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `themes_slug_unique` (`slug`),
  ADD KEY `themes_created_by_foreign` (`created_by`),
  ADD KEY `themes_is_active_is_premium_index` (`is_active`,`is_premium`);

--
-- Indexes for table `theme_comments`
--
ALTER TABLE `theme_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theme_comments_theme_id_created_at_index` (`theme_id`,`created_at`),
  ADD KEY `fk_themecomments_userid` (`user_id`),
  ADD KEY `theme_comments_theme_id_category_index` (`theme_id`,`category`),
  ADD KEY `theme_comments_parent_id_foreign` (`parent_id`),
  ADD KEY `theme_comments_theme_id_parent_id_index` (`theme_id`,`parent_id`),
  ADD KEY `theme_comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `theme_user`
--
ALTER TABLE `theme_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theme_user_user_id_theme_id_unique` (`user_id`,`theme_id`),
  ADD KEY `theme_user_theme_id_foreign` (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_contents`
--
ALTER TABLE `hero_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_page_contents`
--
ALTER TABLE `landing_page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_overviews`
--
ALTER TABLE `project_overviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theme_comments`
--
ALTER TABLE `theme_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `theme_user`
--
ALTER TABLE `theme_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theme_comments_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theme_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_theme_comment_id_foreign` FOREIGN KEY (`theme_comment_id`) REFERENCES `theme_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hero_contents`
--
ALTER TABLE `hero_contents`
  ADD CONSTRAINT `hero_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD CONSTRAINT `page_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_overviews`
--
ALTER TABLE `project_overviews`
  ADD CONSTRAINT `project_overviews_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_overviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `theme_comments`
--
ALTER TABLE `theme_comments`
  ADD CONSTRAINT `fk_themecomments_themeid` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_themecomments_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theme_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theme_comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `theme_comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `theme_user`
--
ALTER TABLE `theme_user`
  ADD CONSTRAINT `theme_user_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theme_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
