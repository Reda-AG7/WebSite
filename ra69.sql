-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: May 01, 2022 at 01:28 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ra69`
--

-- --------------------------------------------------------

--
-- Table structure for table `casesanswer`
--

CREATE TABLE IF NOT EXISTS `casesanswer` (
  `testID` int(11) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `questionID` int(11) NOT NULL,
  `caseID` varchar(250) NOT NULL,
  `caseAnswer` varchar(250) NOT NULL,
  `casePts` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `casesanswer`
--

INSERT INTO `casesanswer` (`testID`, `studentID`, `questionID`, `caseID`, `caseAnswer`, `casePts`) VALUES
(55, 's111', 5, 'doubleIt(100)', '200', 7.5),
(65, 's111', 5, 'doubleIt(100)', '200', 7.5),
(55, 's222', 5, 'doubleIt(100)', '200', 7.5),
(65, 's222', 5, 'doubleIt(100)', '200', 7.5),
(55, 's111', 5, 'doubleIt(13)', '26', 7.5),
(65, 's111', 5, 'doubleIt(13)', '26', 7.5),
(55, 's222', 5, 'doubleIt(13)', '26', 7.5),
(65, 's222', 5, 'doubleIt(13)', '26', 7.5),
(55, 's111', 5, 'doubleIt(2)', '4', 9.5),
(65, 's111', 5, 'doubleIt(2)', '4', 8.5),
(55, 's222', 5, 'doubleIt(2)', '4', 7.5),
(65, 's222', 5, 'doubleIt(2)', '4', 7.5),
(55, 's111', 10, 'factorial(-1)', '', 0),
(59, 's111', 10, 'factorial(-1)', '0', 8),
(60, 's111', 10, 'factorial(-1)', '0', 8),
(55, 's222', 10, 'factorial(-1)', '0', 10),
(59, 's222', 10, 'factorial(-1)', '0', 8),
(55, 's111', 10, 'factorial(0)', '1', 10),
(59, 's111', 10, 'factorial(0)', '1', 8),
(60, 's111', 10, 'factorial(0)', '1', 8),
(55, 's222', 10, 'factorial(0)', '1', 10),
(59, 's222', 10, 'factorial(0)', '1', 8),
(55, 's111', 10, 'factorial(3)', '6', 10),
(59, 's111', 10, 'factorial(3)', '6', 8),
(60, 's111', 10, 'factorial(3)', '6', 8),
(55, 's222', 10, 'factorial(3)', '6', 10),
(59, 's222', 10, 'factorial(3)', '6', 8),
(55, 's111', 10, 'factorial(4)', '24', 10),
(59, 's111', 10, 'factorial(4)', '24', 8),
(60, 's111', 10, 'factorial(4)', '24', 8),
(55, 's222', 10, 'factorial(4)', '24', 10),
(59, 's222', 10, 'factorial(4)', '24', 8),
(56, 's111', 9, 'fibonacci(3)', '2', 13.3),
(56, 's222', 9, 'fibonacci(3)', '2', 13.3),
(56, 's111', 9, 'fibonacci(5)', '5', 13.3),
(56, 's222', 9, 'fibonacci(5)', '5', 13.3),
(56, 's111', 9, 'fibonacci(6)', '8', 13.3),
(56, 's222', 9, 'fibonacci(6)', '8', 13.3),
(57, 's111', 28, 'frequency(''aaaaabb'',''a'')', '5', 7),
(57, 's222', 28, 'frequency(''aaaaabb'',''a'')', '5', 7),
(57, 's111', 28, 'frequency(''aaaaabb'',''b'')', '2', 7),
(57, 's222', 28, 'frequency(''aaaaabb'',''b'')', '2', 7),
(57, 's111', 28, 'frequency(''aaaaabb'',''x'')', '0', 7),
(57, 's222', 28, 'frequency(''aaaaabb'',''x'')', '0', 7),
(57, 's111', 28, 'frequency(''aaaaabbcccccc'',''c'')', '6', 7),
(57, 's222', 28, 'frequency(''aaaaabbcccccc'',''c'')', '6', 7),
(67, 's111', 16, 'halveIt(2)', '1', 7.5),
(67, 's111', 16, 'halveIt(6)', '3', 7.5),
(67, 's111', 16, 'halveIt(8)', '4', 0),
(56, 's111', 13, 'isEven(15)', '0', 4.5),
(65, 's111', 13, 'isEven(15)', '0', 4.5),
(56, 's222', 13, 'isEven(15)', '0', 4.5),
(65, 's222', 13, 'isEven(15)', '0', 4.5),
(56, 's111', 13, 'isEven(2)', '1', 4.5),
(65, 's111', 13, 'isEven(2)', '1', 4.5),
(56, 's222', 13, 'isEven(2)', '1', 6),
(65, 's222', 13, 'isEven(2)', '1', 4.5),
(56, 's111', 13, 'isEven(26)', '1', 4.5),
(65, 's111', 13, 'isEven(26)', '1', 4.5),
(56, 's222', 13, 'isEven(26)', '1', 4.5),
(65, 's222', 13, 'isEven(26)', '1', 4.5),
(56, 's111', 13, 'isEven(87)', '0', 4.5),
(65, 's111', 13, 'isEven(87)', '0', 4.5),
(56, 's222', 13, 'isEven(87)', '0', 4.5),
(65, 's222', 13, 'isEven(87)', '0', 4.5),
(56, 's111', 13, 'isEven(99)', '0', 4.5),
(65, 's111', 13, 'isEven(99)', '0', 4.5),
(56, 's222', 13, 'isEven(99)', '0', 4.5),
(65, 's222', 13, 'isEven(99)', '0', 4.5),
(55, 's111', 14, 'isOdd(2)', '0', 5.6),
(55, 's222', 14, 'isOdd(2)', '0', 5.6),
(55, 's111', 14, 'isOdd(3)', '1', 5.6),
(55, 's222', 14, 'isOdd(3)', '1', 5.6),
(55, 's111', 14, 'isOdd(7)', '1', 5.6),
(55, 's222', 14, 'isOdd(7)', '1', 5.6),
(55, 's111', 14, 'isOdd(9)', '1', 5.6),
(55, 's222', 14, 'isOdd(9)', '1', 5.6),
(57, 's111', 8, 'isPalindrome(''aabbaa'')', '1', 8),
(63, 's111', 8, 'isPalindrome(''aabbaa'')', '1', 13.3),
(57, 's222', 8, 'isPalindrome(''aabbaa'')', '1', 8),
(57, 's111', 8, 'isPalindrome(''madam'')', '1', 8),
(63, 's111', 8, 'isPalindrome(''madam'')', '1', 13.3),
(57, 's222', 8, 'isPalindrome(''madam'')', '1', 8),
(57, 's111', 8, 'isPalindrome(''test'')', '0', 8),
(63, 's111', 8, 'isPalindrome(''test'')', '0', 13.3),
(57, 's222', 8, 'isPalindrome(''test'')', '0', 8),
(64, 's111', 29, 'isPerfect(28)', '', 0),
(64, 's111', 29, 'isPerfect(496)', '', 0),
(64, 's111', 29, 'isPerfect(7)', '', 0),
(54, 's111', 6, 'length(''cs490'')', '5', 15),
(60, 's111', 6, 'length(''cs490'')', '5', 3),
(54, 's222', 6, 'length(''cs490'')', '5', 15),
(54, 's111', 6, 'length(''njit'')', '4', 15),
(60, 's111', 6, 'length(''njit'')', '4', 3),
(54, 's222', 6, 'length(''njit'')', '4', 15),
(54, 's111', 6, 'length(''test'')', '4', 15),
(60, 's111', 6, 'length(''test'')', '4', 3),
(54, 's222', 6, 'length(''test'')', '4', 15),
(57, 's111', 15, 'op(''-'',8,10)', '', 0),
(57, 's111', 15, 'op(''*'',8,10)', '', 0),
(57, 's111', 15, 'op(''/'',16,4)', '', 0),
(57, 's111', 15, 'op(''+'',3,4)', '', 0),
(58, 's111', 15, 'operation(''-'',8,10)', '-2', 22.5),
(59, 's111', 15, 'operation(''-'',8,10)', '-2', 11.3),
(60, 's111', 15, 'operation(''-'',8,10)', '-2', 11.3),
(65, 's111', 15, 'operation(''-'',8,10)', '', 0),
(66, 's111', 15, 'operation(''-'',8,10)', '-2', 5.6),
(67, 's111', 15, 'operation(''-'',8,10)', '-2', 11.3),
(57, 's222', 15, 'operation(''-'',8,10)', '-2', 7.9),
(58, 's222', 15, 'operation(''-'',8,10)', '-2', 22.5),
(59, 's222', 15, 'operation(''-'',8,10)', '-2', 11.3),
(65, 's222', 15, 'operation(''-'',8,10)', '-2', 11.3),
(58, 's111', 15, 'operation(''*'',8,10)', '80', 22.5),
(59, 's111', 15, 'operation(''*'',8,10)', '80', 11.3),
(60, 's111', 15, 'operation(''*'',8,10)', '80', 11.3),
(65, 's111', 15, 'operation(''*'',8,10)', '', 0),
(66, 's111', 15, 'operation(''*'',8,10)', '80', 5.6),
(67, 's111', 15, 'operation(''*'',8,10)', '80', 11.3),
(57, 's222', 15, 'operation(''*'',8,10)', '80', 7.9),
(58, 's222', 15, 'operation(''*'',8,10)', '80', 22.5),
(59, 's222', 15, 'operation(''*'',8,10)', '80', 11.3),
(65, 's222', 15, 'operation(''*'',8,10)', '80', 11.3),
(58, 's111', 15, 'operation(''/'',16,4)', '4.0', 22.5),
(59, 's111', 15, 'operation(''/'',16,4)', '4', 11.3),
(60, 's111', 15, 'operation(''/'',16,4)', '4', 11.3),
(65, 's111', 15, 'operation(''/'',16,4)', '', 0),
(66, 's111', 15, 'operation(''/'',16,4)', '4', 5.6),
(67, 's111', 15, 'operation(''/'',16,4)', 'None', 0),
(57, 's222', 15, 'operation(''/'',16,4)', '4', 7.9),
(58, 's222', 15, 'operation(''/'',16,4)', '4', 22.5),
(59, 's222', 15, 'operation(''/'',16,4)', '4', 11.3),
(65, 's222', 15, 'operation(''/'',16,4)', '4', 11.3),
(58, 's111', 15, 'operation(''+'',3,4)', '7', 22.5),
(59, 's111', 15, 'operation(''+'',3,4)', '7', 11.3),
(60, 's111', 15, 'operation(''+'',3,4)', '7', 11.3),
(65, 's111', 15, 'operation(''+'',3,4)', '', 7),
(66, 's111', 15, 'operation(''+'',3,4)', '7', 5.6),
(67, 's111', 15, 'operation(''+'',3,4)', '7', 11.3),
(57, 's222', 15, 'operation(''+'',3,4)', '7', 7.9),
(58, 's222', 15, 'operation(''+'',3,4)', '7', 22.5),
(59, 's222', 15, 'operation(''+'',3,4)', '7', 11.3),
(65, 's222', 15, 'operation(''+'',3,4)', '7', 11.3),
(56, 's111', 23, 'power(2,5)', '32', 5),
(56, 's222', 23, 'power(2,5)', '32', 5),
(56, 's111', 23, 'power(2,8)', '256', 5),
(56, 's222', 23, 'power(2,8)', '256', 5),
(56, 's111', 23, 'power(3,3)', '27', 5),
(56, 's222', 23, 'power(3,3)', '27', 5),
(56, 's111', 23, 'power(5,0)', '5', 0),
(56, 's222', 23, 'power(5,0)', '5', 0),
(64, 's111', 31, 'sqareRoot(16)', '', 0),
(64, 's111', 31, 'sqareRoot(4)', '', 0),
(64, 's111', 31, 'sqareRoot(9)', '', 0),
(63, 's111', 7, 'sum(10)', '55.0', 13.3),
(67, 's111', 7, 'sum(10)', '55', 6.7),
(63, 's111', 7, 'sum(6)', '21.0', 13.3),
(67, 's111', 7, 'sum(6)', '21', 6.7),
(63, 's111', 7, 'sum(8)', '36.0', 13.3),
(67, 's111', 7, 'sum(8)', '36', 6.7),
(54, 's111', 17, 'totalVowels(''cwm'')', '0', 10),
(54, 's222', 17, 'totalVowels(''cwm'')', '0', 10),
(54, 's111', 17, 'totalVowels(''guacamole'')', '4', 0),
(54, 's222', 17, 'totalVowels(''guacamole'')', '5', 10),
(54, 's111', 17, 'totalVowels(''hello'')', '2', 10),
(54, 's222', 17, 'totalVowels(''hello'')', '2', 10),
(54, 's111', 17, 'totalVowels(''njit'')', '1', 10),
(54, 's222', 17, 'totalVowels(''njit'')', '1', 10),
(59, 's111', 11, 'tripleIt(-8)', '-24', 3),
(66, 's111', 11, 'tripleIt(-8)', '-24', 22.5),
(59, 's222', 11, 'tripleIt(-8)', '-24', 3),
(59, 's111', 11, 'tripleIt(10)', '30', 3),
(66, 's111', 11, 'tripleIt(10)', '30', 22.5),
(59, 's222', 11, 'tripleIt(10)', '30', 3),
(59, 's111', 11, 'tripleIt(5)', '15', 3),
(66, 's111', 11, 'tripleIt(5)', '15', 30),
(59, 's222', 11, 'tripleIt(5)', '15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`classID` int(11) NOT NULL,
  `className` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `className`) VALUES
(1, 'PYTH100'),
(2, 'PYTH200');

-- --------------------------------------------------------

--
-- Table structure for table `classstudent`
--

CREATE TABLE IF NOT EXISTS `classstudent` (
  `classID` int(11) NOT NULL,
  `studentID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classstudent`
--

INSERT INTO `classstudent` (`classID`, `studentID`) VALUES
(1, 's111'),
(1, 's222'),
(1, 't111');

-- --------------------------------------------------------

--
-- Table structure for table `constraint`
--

CREATE TABLE IF NOT EXISTS `constraint` (
`constraintID` int(11) NOT NULL,
  `questionID` int(20) NOT NULL,
  `for` tinyint(1) NOT NULL,
  `while` tinyint(1) NOT NULL,
  `recursion` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `constraint`
--

INSERT INTO `constraint` (`constraintID`, `questionID`, `for`, `while`, `recursion`) VALUES
(5, 5, 0, 0, 0),
(6, 6, 0, 0, 0),
(7, 7, 1, 0, 0),
(8, 8, 0, 0, 1),
(9, 9, 0, 0, 1),
(10, 10, 1, 0, 0),
(11, 11, 0, 0, 0),
(13, 13, 0, 0, 0),
(14, 14, 0, 0, 0),
(15, 15, 0, 0, 0),
(16, 16, 0, 0, 0),
(17, 17, 1, 0, 0),
(22, 22, 0, 0, 0),
(23, 23, 1, 0, 0),
(27, 27, 0, 0, 0),
(28, 28, 0, 1, 0),
(29, 29, 0, 0, 0),
(31, 31, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`questionID` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `difficulty` varchar(15) NOT NULL,
  `functionName` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questionID`, `question`, `category`, `difficulty`, `functionName`) VALUES
(5, 'Create a function named doubleIt that takes an Integer and return its double', 'Functions', 'easy', 'doubleIt'),
(6, 'Create a function named length that takes a string and return its length', 'Strings', 'easy', 'length'),
(7, 'Create a function named sum that takes a positive integer and return the sum of all whole numbers less or equal to itself', 'Functions', 'medium', 'sum'),
(8, 'Create a function named isPalindrome that takes a String and return true if it is a palindrome otherwise false', 'Strings', 'medium', 'isPalindrome'),
(9, 'Create a function named fibonacci that takes an int and return its fibonacci value', 'Functions', 'medium', 'fibonacci'),
(10, 'Create a function name factorial that takes an Integer and returns its factorial.(if n<0 return 0)', 'Functions', 'medium', 'factorial'),
(11, 'Create a function called tripleIt that takes an int and return its value *3', 'Functions', 'easy', 'tripleIt'),
(13, 'Create a function named isEven that takes an intger and return true if it is even otherwise returns false', 'Functions', 'easy', 'isEven'),
(14, 'Create a function named isOdd that takes an intger and return true if it is odd otherwise returns false', 'Functions', 'easy', 'isOdd'),
(15, 'Create a function named operation that takes three parameter; op, a and b and return the result of the requested operation', 'arithmetics', 'easy', 'operation'),
(16, 'create a function named halveIt that helves the argument', 'Functions', 'easy', 'halveIt'),
(17, 'Create a function named totalVowels that takes a string and return the number of vowels', 'Strings', 'easy', 'totalVowels'),
(18, 'Create a function named totalConsonants that takes a string and return number of all consonants in the string.', 'Strings', 'easy', 'totalConsonants'),
(22, 'Create a function named isIn that takes two string arguments s and n and returns true if n is part of s otherwise it returns false', 'Strings', 'hard', 'isIn'),
(23, 'Create a function named power that takes two int arguments x and n, and return the x power n ', 'Functions', 'easy', 'power'),
(27, 'Create a function named isPrime that takes an int and returns true if it is a prime number, otherwise it returns false', 'arithmetics', 'medium', 'isPrime'),
(28, 'Create a function named frequency that takes a string s and a char c, and returns the frequency of c in s', 'Strings', 'easy', 'frequency'),
(29, 'Create a function named isPerfect that takes an int and returns true if the input is a perfect number otherwise it returns false', 'arithmetics', 'medium', 'isPerfect'),
(31, 'Create a function named sqareRoot that takes an integer and return its square root', 'arithmetics', 'easy', 'sqareRoot');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
`testID` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `ucid` varchar(10) NOT NULL,
  `difficulty` varchar(15) NOT NULL,
  `isPublished` tinyint(1) NOT NULL,
  `dueDate` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testID`, `title`, `ucid`, `difficulty`, `isPublished`, `dueDate`) VALUES
(54, 'Test string 1', 't111', 'easy', 1, '2022-04-27 06:50:00'),
(55, 'Test Numbers 1', 't111', 'easy', 1, '2022-04-28 06:30:00'),
(56, 'Test Numbers 2', 't111', 'medium', 1, '2022-04-26 08:20:00'),
(57, 'Test String 2', 't111', 'medium', 1, '2022-04-28 08:25:00'),
(58, 'Test String 3', 't111', 'easy', 1, '2022-04-27 08:33:00'),
(59, 'Final Spring 2022', 't111', 'medium', 1, '2022-04-27 11:07:00'),
(60, 'Midterm Spring 2022', 't111', 'medium', 1, '2022-04-28 15:12:00'),
(61, 'Test 18', 't111', 'easy', 1, '2022-05-04 10:07:00'),
(62, 'Test 19', 't111', 'easy', 1, '2022-05-05 10:07:00'),
(63, 'Test 12', 't111', 'medium', 1, '2022-04-28 12:59:00'),
(64, 'Test 22', 't111', 'easy', 1, '2022-04-28 16:11:00'),
(65, 'quiz', 't111', 'easy', 1, '2022-04-25 21:25:00'),
(66, 'quiz 2', 't111', 'medium', 1, '2022-05-06 12:51:00'),
(67, 'Test final', 't111', 'easy', 1, '2022-04-30 15:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `testanswers`
--

CREATE TABLE IF NOT EXISTS `testanswers` (
  `testID` int(11) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `questionID` int(11) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `studentFname` varchar(30) DEFAULT NULL,
  `functionNamePts` float DEFAULT NULL,
  `for` float DEFAULT NULL,
  `while` float DEFAULT NULL,
  `recursion` float DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `score` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testanswers`
--

INSERT INTO `testanswers` (`testID`, `studentID`, `questionID`, `answer`, `studentFname`, `functionNamePts`, `for`, `while`, `recursion`, `comment`, `score`) VALUES
(54, 's111', 6, 'def leng(x):\r\n    return len(x)', 'leng', 0, 0, 0, 0, 'function Name incorrect\r\n+ 2pts extra', 45),
(54, 's222', 6, 'def length(s):\r\n    return len(s)', 'length', 5, 0, 0, 0, '', 50),
(54, 's111', 17, 'def totalV(s):\r\n     a = ''aouie''\r\n     t = 0\r\n     for i in a:\r\n          if i in s:\r\n               t+=1\r\n     return t', 'totalV', 0, 5, 0, 0, 'function Name incorrect\r\nyou should loop through s not a', 35),
(54, 's222', 17, 'def totalV(s):\r\n     a = ''aouie''\r\n     t = 0\r\n     for i in s:\r\n          if i in a:\r\n               t+=1\r\n     return t', 'totalV', 0, 5, 0, 0, 'function Name incorrect\n', 45),
(55, 's111', 5, 'def doub(x):\r\n     return 2*x', 'doub', 0, 0, 0, 0, 'function Name incorrect good job\r\n', 24.5),
(55, 's222', 5, 'def doubleIt(x):\r\n     return 2*x', 'doubleIt', 2.5, 0, 0, 0, '', 25),
(55, 's111', 10, 'def fact(x):\r\n   if x == 0:\r\n     return 1\r\n   return x*fact(x-1)', 'fact', 0, 0, 0, 0, 'function Name incorrect\r\n', 30),
(55, 's222', 10, 'def fact(x):\r\n   if x<0:\r\n     return 0\r\n   if x == 0:\r\n     return 1\r\n   t = 1\r\n   for i in range(1,x+1):\r\n     t*=i\r\n   return t', 'fact', 0, 5, 0, 0, 'function Name incorrect\n', 45),
(55, 's111', 14, 'def isOdd(s):\r\n    return s%2 == 1', 'isOdd', 2.5, 0, 0, 0, 'perfect', 24.9),
(55, 's222', 14, 'def isOdd(x):\r\n    return x%2 == 1', 'isOdd', 2.5, 0, 0, 0, '', 25),
(56, 's111', 9, 'def fib(x):\r\n  if x == 0:\r\n     return 0\r\n  if x <= 2:\r\n     return 1\r\n  return fib(x-2) + fib(x-1)', 'fib', 0, 0, 0, 5, 'function Name incorrect\n', 45),
(56, 's222', 9, 'def fib(x):\r\n    if x==0:\r\n       return 0\r\n    if x<=2:\r\n       return 1\r\n    return fib(x-2) + fib(x-1)', 'fib', 0, 0, 0, 5, 'function Name incorrect\r\n', 44.9),
(56, 's111', 13, 'def isEv(x):\r\n     return x%2 == 0', 'isEv', 0, 0, 0, 0, 'function Name incorrect\n', 23),
(56, 's222', 13, 'def isEv(x):\r\n    return x%2 ==0', 'isEv', 0, 0, 0, 0, 'function Name incorrect\r\n', 24),
(56, 's111', 23, 'def power(x,n):\r\n     y = x\r\n     for i in range(1,n):\r\n          y*=x\r\n     return y', 'power', 2.5, 2.5, 0, 0, '', 20),
(56, 's222', 23, 'def powe(x,n):\r\n       y=x\r\n       for i in range(1,n):\r\n              y*=x\r\n       return y', 'powe', 0, 2.5, 0, 0, 'function Name incorrect\r\noverall good job\r\n', 17.5),
(57, 's111', 8, 'def isPalindrome(s):\r\n     i = 0\r\n     j = len(s)-1\r\n     while i < j:\r\n         if s[i] != s[j]:\r\n             return False\r\n         i+=1\r\n         j-=1\r\n     return True', 'isPalindrome', 3, 0, 0, 0, '', 27),
(57, 's222', 8, 'def isPalindrome(s):\r\n     i = 0\r\n     j = len(s)-1\r\n     while i < j:\r\n         if s[i] != s[j]:\r\n             return False\r\n         i+=1\r\n         j-=1\r\n     return True', 'isPalindrome', 3, 0, 0, 0, '', 27),
(57, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 3.5, 0, 0, 0, '', 4),
(57, 's222', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 3.5, 0, 0, 0, '', 35),
(57, 's111', 28, 'def freq(s,c):\r\n    t = 0\r\n    i = 0\r\n    while i<len(s):\r\n       if s[i] == c:\r\n           t+=1\r\n       i+=1\r\n    return t ', 'freq', 0, 0, 3.5, 0, 'function Name incorrect\n', 32),
(57, 's222', 28, 'def freq(s,c):\r\n    t = 0\r\n    i = 0\r\n    while i<len(s):\r\n       if s[i] == c:\r\n           t+=1\r\n       i+=1\r\n    return t', 'freq', 0, 0, 3.5, 0, 'function Name incorrect\n', 32),
(58, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 10, 0, 0, 0, 'Perfect\r\ngood job', 100),
(58, 's222', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 10, 0, 0, 0, '', 100),
(59, 's111', 10, 'def factorial(n):\r\n    if n<0:\r\n        return 0\r\n    if n == 0:\r\n        return 1\r\n    t = 1\r\n    for i in range(1,n+1):\r\n        t*=i\r\n    return t ', 'factorial', 4, 4, 0, 0, 'perfect', 40),
(59, 's222', 10, 'def factorial(n):\r\n    if n<0:\r\n        return 0\r\n    if n == 0:\r\n        return 1\r\n    t = 1\r\n    for i in range(1,n+1):\r\n        t*=i\r\n    return t', 'factorial', 4, 4, 0, 0, 'Perfect', 40),
(59, 's111', 11, 'def tripl(x):\r\n    return 3*x', 'tripl', 0, 0, 0, 0, 'function Name incorrect\r\n', 9),
(59, 's222', 11, 'def tripleIt(x):\r\n   return x*3', 'tripleIt', 1, 0, 0, 0, 'well done', 10),
(59, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 5, 0, 0, 0, '', 50.2),
(59, 's222', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 5, 0, 0, 0, 'amazing', 50.2),
(60, 's111', 6, 'def length(x):\r\n   return len(x)', 'length', 1, 0, 0, 0, 'Well  done', 10),
(60, 's111', 10, 'def factorial(n):\r\n    if n<0:\r\n        return 0\r\n    if n == 0:\r\n        return 1\r\n    t = 1\r\n    for i in range(1,n+1):\r\n        t*=i\r\n    return t', 'factorial', 4, 4, 0, 0, 'perfect', 40),
(60, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 5, 0, 0, 0, 'amazing', 50.2),
(63, 's111', 7, 'def sum(x):\r\n     return x*(x+1)/2', 'sum', 5, 0, 0, 0, '', 45),
(63, 's111', 8, 'def isPali(s):\r\n     i =0\r\n     j = len(s)-1\r\n     while i< j:\r\n        if s[i] != s[j]:\r\n            return False\r\n        i+=1\r\n        j-=1\r\n     return True', 'isPali', 0, 0, 0, 0, 'function Name incorrect\n', 40),
(64, 's111', 29, '', '', 0, 0, 0, 0, 'function Name incorrect\n', 0),
(64, 's111', 31, 'import math\r\n\r\ndef sqroot(x):\r\n     return math.sqrt(x)', 'math\r\n\r\ndef', 0, 0, 0, 0, 'function Name incorrect\n', 0),
(65, 's111', 5, 'def double(n):\r\n    return n*2', 'double', 0, 0, 0, 0, 'function Name incorrect\r\n', 23.5),
(65, 's222', 5, 'def doub(x):\r\n     return 2*x', 'doub', 0, 0, 0, 0, 'function Name incorrect\n', 23),
(65, 's111', 13, 'def isEven(n):\r\n     return n%2==0', 'isEven', 2.5, 0, 0, 0, '', 25),
(65, 's222', 13, 'def isEven(x):\r\n    return x%2 == 0', 'isEven', 2.5, 0, 0, 0, '', 25),
(65, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+''\r\n          return a+b\r\n     elif op == ''-''\r\n          return a-b\r\n     elif op == ''*''\r\n          return a*b\r\n     else \r\n          return 0', 'operation', 5, 0, 0, 0, 'forgot colons', 12),
(65, 's222', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b\r\n', 'operation', 5, 0, 0, 0, '', 50),
(66, 's111', 11, 'def tri(x):\r\n    return 3*x', 'tri', 0, 0, 0, 0, 'function Name incorrect\r\n', 75),
(66, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b\r\n     if op == ''/'':\r\n          return a/b', 'operation', 2.5, 0, 0, 0, 'perfect', 24.9),
(67, 's111', 7, 'def sum(x):\r\n    return x*(x+1)/2', 'sum', 2.5, 0, 0, 0, '', 22.6),
(67, 's111', 15, 'def operation(op,a,b):\r\n     if op == ''+'':\r\n          return a+b\r\n     if op == ''-'':\r\n          return a-b\r\n     if op == ''*'':\r\n          return a*b', 'operation', 5, 0, 0, 0, '', 38.9),
(67, 's111', 16, 'def halv(x):\r\n    return x/2', 'halv', 0, 0, 0, 0, 'function Name incorrect\r\none question per page', 15);

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE IF NOT EXISTS `testcases` (
`testCaseID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `case` varchar(255) NOT NULL,
  `answer` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`testCaseID`, `questionID`, `case`, `answer`) VALUES
(7, 5, 'doubleIt(2)', '4'),
(8, 5, 'doubleIt(13)', '26'),
(9, 5, 'doubleIt(100)', '200'),
(10, 6, 'length(''test'')', '4'),
(11, 6, 'length(''njit'')', '4'),
(12, 6, 'length(''cs490'')', '5'),
(13, 7, 'sum(10)', '55'),
(14, 7, 'sum(6)', '21'),
(15, 7, 'sum(8)', '36'),
(16, 8, 'isPalindrome(''madam'')', '1'),
(17, 8, 'isPalindrome(''test'')', '0'),
(18, 8, 'isPalindrome(''aabbaa'')', '1'),
(19, 9, 'fibonacci(3)', '2'),
(20, 9, 'fibonacci(5)', '5'),
(21, 9, 'fibonacci(6)', '8'),
(22, 10, 'factorial(3)', '6'),
(23, 10, 'factorial(4)', '24'),
(24, 10, 'factorial(0)', '1'),
(25, 10, 'factorial(-1)', '0'),
(26, 11, 'tripleIt(5)', '15'),
(27, 11, 'tripleIt(10)', '30'),
(28, 11, 'tripleIt(-8)', '-24'),
(32, 13, 'isEven(2)', '1'),
(33, 13, 'isEven(15)', '0'),
(34, 13, 'isEven(26)', '1'),
(35, 13, 'isEven(99)', '0'),
(36, 13, 'isEven(87)', '0'),
(37, 14, 'isOdd(3)', '1'),
(38, 14, 'isOdd(2)', '0'),
(39, 14, 'isOdd(9)', '1'),
(40, 14, 'isOdd(7)', '1'),
(41, 15, 'operation(''+'',3,4)', '7'),
(42, 15, 'operation(''-'',8,10)', '-2'),
(43, 15, 'operation(''*'',8,10)', '80'),
(44, 15, 'operation(''/'',16,4)', '4'),
(45, 16, 'halveIt(2)', '1'),
(46, 16, 'halveIt(6)', '3'),
(47, 16, 'halveIt(8)', '4'),
(48, 17, 'totalVowels(''hello'')', '2'),
(49, 17, 'totalVowels(''njit'')', '1'),
(50, 17, 'totalVowels(''guacamole'')', '5'),
(51, 17, 'totalVowels(''cwm'')', '0'),
(52, 22, 'isIn(''aAAbbbb'',''aAA'')', '1'),
(53, 22, 'isIn(''aAAbbbb'',''xx'')', '0'),
(54, 23, 'power(2,5)', '32'),
(55, 23, 'power(2,8)', '256'),
(56, 23, 'power(3,3)', '27'),
(57, 23, 'power(5,0)', '1'),
(58, 27, 'isPrime(13)', '1'),
(59, 27, 'isPrime(8)', '0'),
(60, 27, 'isPrime(7)', '1'),
(61, 28, 'frequency(''aaaaabb'',''a'')', '5'),
(62, 28, 'frequency(''aaaaabb'',''b'')', '2'),
(63, 28, 'frequency(''aaaaabb'',''x'')', '0'),
(64, 28, 'frequency(''aaaaabbcccccc'',''c'')', '6'),
(65, 29, 'isPerfect(496)', '1'),
(66, 29, 'isPerfect(28)', '1'),
(67, 29, 'isPerfect(7)', '0'),
(71, 31, 'sqareRoot(4)', '2'),
(72, 31, 'sqareRoot(16)', '4'),
(73, 31, 'sqareRoot(9)', '3');

-- --------------------------------------------------------

--
-- Table structure for table `testquestions`
--

CREATE TABLE IF NOT EXISTS `testquestions` (
`testQuestionID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `testID` int(11) NOT NULL,
  `score` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=131 ;

--
-- Dumping data for table `testquestions`
--

INSERT INTO `testquestions` (`testQuestionID`, `questionID`, `testID`, `score`) VALUES
(97, 17, 54, 50),
(98, 6, 54, 50),
(99, 5, 55, 25),
(100, 10, 55, 50),
(101, 14, 55, 25),
(102, 23, 56, 25),
(103, 13, 56, 25),
(104, 9, 56, 50),
(105, 15, 57, 35),
(106, 28, 57, 35),
(107, 8, 57, 30),
(108, 15, 58, 100),
(109, 15, 59, 50),
(110, 10, 59, 40),
(111, 11, 59, 10),
(112, 15, 60, 50),
(113, 10, 60, 40),
(114, 6, 60, 10),
(115, 15, 61, 50),
(116, 29, 61, 50),
(117, 10, 62, 50),
(118, 9, 62, 50),
(119, 7, 63, 50),
(120, 8, 63, 50),
(121, 31, 64, 50),
(122, 29, 64, 50),
(123, 15, 65, 50),
(124, 5, 65, 25),
(125, 13, 65, 25),
(126, 15, 66, 25),
(127, 11, 66, 75),
(128, 7, 67, 25),
(129, 15, 67, 50),
(130, 16, 67, 25);

-- --------------------------------------------------------

--
-- Table structure for table `testtobetaken`
--

CREATE TABLE IF NOT EXISTS `testtobetaken` (
  `testID` int(11) NOT NULL,
  `ucid` varchar(10) NOT NULL,
  `isSubmitted` tinyint(1) NOT NULL,
  `isCorrected` tinyint(1) NOT NULL,
  `autoGrade` tinyint(1) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testtobetaken`
--

INSERT INTO `testtobetaken` (`testID`, `ucid`, `isSubmitted`, `isCorrected`, `autoGrade`, `grade`) VALUES
(54, 's111', 1, 1, 1, 80),
(54, 's222', 1, 1, 1, 95),
(55, 's111', 1, 1, 1, 79),
(55, 's222', 1, 1, 1, 95),
(56, 's111', 1, 1, 1, 88),
(56, 's222', 1, 1, 1, 86),
(57, 's111', 1, 1, 1, 63),
(57, 's222', 1, 1, 1, 94),
(58, 's111', 1, 1, 1, 100),
(58, 's222', 1, 1, 1, 100),
(59, 's111', 1, 1, 1, 99),
(59, 's222', 1, 1, 1, 100),
(60, 's111', 1, 1, 1, 100),
(60, 's222', 0, 0, 1, NULL),
(61, 's111', 0, 0, 1, NULL),
(61, 's222', 0, 0, 1, NULL),
(62, 's111', 0, 0, 1, NULL),
(62, 's222', 0, 0, 1, NULL),
(63, 's111', 1, 1, 1, 85),
(63, 's222', 0, 0, 1, NULL),
(64, 's111', 1, 1, 1, 0),
(64, 's222', 0, 0, 1, NULL),
(65, 's111', 1, 1, 1, 61),
(65, 's222', 1, 1, 1, 98),
(66, 's111', 1, 1, 1, 100),
(66, 's222', 0, 0, 1, NULL),
(67, 's111', 1, 1, 1, 77),
(67, 's222', 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ucid` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `isTeacher` tinyint(1) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ucid`, `password`, `isTeacher`, `firstname`, `lastname`) VALUES
('s111', '1234', 0, 'Jerimmy', 'Lincon'),
('s222', '1234', 0, 'Veronica', 'Soriano'),
('t111', '1234', 1, 'Max', 'Lingard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casesanswer`
--
ALTER TABLE `casesanswer`
 ADD PRIMARY KEY (`caseID`,`studentID`,`testID`,`questionID`), ADD KEY `casesanswer_ibfk_2` (`testID`), ADD KEY `casesanswer_ibfk_3` (`questionID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `classstudent`
--
ALTER TABLE `classstudent`
 ADD PRIMARY KEY (`classID`,`studentID`), ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `constraint`
--
ALTER TABLE `constraint`
 ADD PRIMARY KEY (`constraintID`), ADD KEY `constraint_fk0` (`questionID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`testID`), ADD KEY `test_fk0` (`ucid`);

--
-- Indexes for table `testanswers`
--
ALTER TABLE `testanswers`
 ADD PRIMARY KEY (`testID`,`questionID`,`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `questionID` (`questionID`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
 ADD PRIMARY KEY (`testCaseID`), ADD KEY `testCases_fk0` (`questionID`);

--
-- Indexes for table `testquestions`
--
ALTER TABLE `testquestions`
 ADD PRIMARY KEY (`testQuestionID`), ADD KEY `testQuestions_fk0` (`questionID`), ADD KEY `testQuestions_fk1` (`testID`);

--
-- Indexes for table `testtobetaken`
--
ALTER TABLE `testtobetaken`
 ADD PRIMARY KEY (`testID`,`ucid`), ADD KEY `testToBeTaken_fk1` (`ucid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ucid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `constraint`
--
ALTER TABLE `constraint`
MODIFY `constraintID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
MODIFY `testID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
MODIFY `testCaseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `testquestions`
--
ALTER TABLE `testquestions`
MODIFY `testQuestionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `casesanswer`
--
ALTER TABLE `casesanswer`
ADD CONSTRAINT `casesanswer_ibfk_2` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`),
ADD CONSTRAINT `casesanswer_ibfk_3` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`);

--
-- Constraints for table `classstudent`
--
ALTER TABLE `classstudent`
ADD CONSTRAINT `classstudent_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`),
ADD CONSTRAINT `classstudent_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `user` (`ucid`);

--
-- Constraints for table `constraint`
--
ALTER TABLE `constraint`
ADD CONSTRAINT `constraint_fk0` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
ADD CONSTRAINT `test_fk0` FOREIGN KEY (`ucid`) REFERENCES `user` (`ucid`);

--
-- Constraints for table `testanswers`
--
ALTER TABLE `testanswers`
ADD CONSTRAINT `testanswers_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `user` (`ucid`),
ADD CONSTRAINT `testanswers_ibfk_2` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`),
ADD CONSTRAINT `testanswers_ibfk_3` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`);

--
-- Constraints for table `testcases`
--
ALTER TABLE `testcases`
ADD CONSTRAINT `testCases_fk0` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`);

--
-- Constraints for table `testquestions`
--
ALTER TABLE `testquestions`
ADD CONSTRAINT `testQuestions_fk0` FOREIGN KEY (`questionID`) REFERENCES `question` (`questionID`),
ADD CONSTRAINT `testQuestions_fk1` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`);

--
-- Constraints for table `testtobetaken`
--
ALTER TABLE `testtobetaken`
ADD CONSTRAINT `testToBeTaken_fk0` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`),
ADD CONSTRAINT `testToBeTaken_fk1` FOREIGN KEY (`ucid`) REFERENCES `user` (`ucid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
