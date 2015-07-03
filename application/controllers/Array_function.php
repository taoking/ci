<?php

class Array_function extends CI_Controller{

	public function index(){

	}

	public function sscanf(){
		$auth = "24\tLewis Carroll";
		$n = sscanf($auth, "%d\t%s %s", $id, $first, $last);
		echo "<author id='$id'>
			    <firstname>$first</firstname>
			    <surname>$last</surname>
			</author>\n";
			
		$n = sscanf("172.123.3123.423", "%d.%d.%d.%d",$a,$b,$c,$d);
		echo $a.$b.$c.$d."<br>";
	}

	public function sprintf(){
		$num = 5;
		$location = 'tree';
			
		$format = 'There are %d monkeys in the %s';
		echo sprintf($format, $num, $location)."<br>";
		$format = 'The %s contains %d monkeys';
		echo sprintf($format, $num, $location)."<br>";
		$format = 'The %2$s contains %1$d monkeys.
			           That\'s a nice %2$s full of %1$d monkeys.';
		echo sprintf($format, $num, $location);
	}


	public function preg_replace(){
		$string = 'The quick brown fox jumped over the lazy dog.';
		$patterns = array();
		$patterns[0] = '/quick/';
		$patterns[1] = '/brown/';
		$patterns[2] = '/fox/';
		$replacements = array();
		$replacements[2] = 'bear';
		$replacements[1] = 'black';
		$replacements[0] = 'slow';
		echo preg_replace($patterns, $replacements, $string)."<br>";
	}


	public function str_replace(){
		echo str_replace("aa", "bbbb", "aacdfg");


		echo str_ireplace("%body%", "black", "<body text=%BODY%>");
	}


	public function explode(){
		//字符串分割字符串
		$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
		$pieces = explode(" ", $pizza);
		echo $pieces[0]; // piece1
		echo $pieces[1]; // piece2
	}

	public function preg_split(){
		//使用逗号或空格(包含" ", \r, \t, \n, \f)分隔短语         正则分割字符串
		$keywords = preg_split("/[\s,]+/", "hypertext language, programming");
		print_r($keywords);
	}

	public function str_split(){
		//长度分割字符串
		$str = "Hello Friend";

		$arr1 = str_split($str);
		$arr2 = str_split($str, 3);

		print_r($arr1);
		print_r($arr2);
	}

	public function split(){
		//没  preg_split强
		$date = "04/30/1973";
		list($month, $day, $year) = split ('[/.-]', $date);
		echo "Month: $month; Day: $day; Year: $year<br />\n";
	}

	public function str_word_count(){
		/*
		 * string
		 字符串。

		 format
		 指定函数的返回值。当前支持的值如下：

		 0 - 返回单词数量
		 1 - 返回一个包含 string 中全部单词的数组
		 2 - 返回关联数组。数组的键是单词在 string 中出现的数值位置，数组的值是这个单词
		 charlist
		 附加的字符串列表，其中的字符将被视为单词的一部分。*/
		$str = "Hello fri3nd, you're
       looking          good today!";

		print_r(str_word_count($str, 1));
		print_r(str_word_count($str, 2));
		print_r(str_word_count($str, 1, 'àáãç3'));

		echo str_word_count($str);
	}

	public function count_chars(){
		/*
		 * mixed count_chars ( string $string [, int $mode = 0 ] )
		 string
		 需要统计的字符串。

		 mode
		 参见返回的值。

		 返回值 ¶

		 根据不同的 mode，count_chars() 返回下列不同的结果：

		 0 - 以所有的每个字节值作为键名，出现次数作为值的数组。
		 1 - 与 0 相同，但只列出出现次数大于零的字节值。
		 2 - 与 0 相同，但只列出出现次数等于零的字节值。
		 3 - 返回由所有使用了的字节值组成的字符串。
		 4 - 返回由所有未使用的字节值组成的字符串。
		 */
		$data = "Two Ts and one F.";

		foreach (count_chars($data, 1) as $i => $val) {
			echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
		}
	}

	public function htmlspecialchars(){
		$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
		echo htmlspecialchars_decode($new);
		echo $new."<br>";

		echo strip_tags("<nav id=head-nav class=navbar navbar-fixed-top><dt><a href='/manual/en/getting-started.php'>Getting Started</a></dt><dd><a href='/manual/en/introduction.php'>Introduction</a></dd><dd><a href='/manual/en/tutorial.php'>A simple tutorial</a></dd><dt><a href='/manual/en/langref.php'>Language Reference</a></dt><dd><a href='/manual/en/language.basic-syntax.php'>Basic syntax</a></dd>");

	}

	public function ucfirst(){
		$foo = 'hello world!';
		$foo = ucfirst($foo);             // Hello world!首字母大写
		$foo = ucwords($foo);
	}

	public function substr_count(){
		//strtoupper() - 将字符串转化为大写
		//strtolower() - 将字符串转化为小写


		$text = 'This is a test';
		echo strlen($text); // 14

		echo substr_count($text, 'is'); // 2
	}

	public function substr_compare(){
		/**
		 * int substr_compare ( string $main_str , string $str , int $offset [, int $length [, bool $case_insensitivity = false ]] )
		 * main_str
		 待比较的第一个字符串。

		 str
		 待比较的第二个字符串。

		 offset
		 比较开始的位置。如果为负数，则从字符串结尾处开始算起。

		 length
		 比较的长度。默认值为 str 的长度与 main_str 的长度减去位置偏移量 offset 后二者中的较大者。

		 case_insensitivity
		 如果 case_insensitivity 为 TRUE，比较将不区分大小写。
		 */
		echo substr_compare("abcde", "bc", 1, 2); // 0
		echo substr_compare("abcde", "de", -2, 2); // 0
		echo substr_compare("abcde", "bcg", 1, 2); // 0
		echo substr_compare("abcde", "BC", 1, 2, true); // 0
		echo substr_compare("abcde", "bc", 1, 3); // 1
		echo substr_compare("abcde", "cd", 1, 2); // -1
		echo substr_compare("abcde", "abc", 5, 1); // warning
	}

	public function strtr(){
		/**
		 * string strtr ( string $str , string $from , string $to )
		 string strtr ( string $str , array $replace_pairs )
		 str
		 待转换的字符串。

		 from
		 字符串中与将要被转换的目的字符 to 相对应的源字符。

		 to
		 字符串中与将要被转换的字符 from 相对应的目的字符。

		 replace_pairs
		 参数 replace_pairs 可以用来取代 to 和 from 参数，因为它是以 array('from' => 'to', ...) 格式出现的数组。
		 */
		$trans = array("hello" => "hi", "hi" => "hello");
		echo strtr("hi all, I said hello", $trans);//hello all, I said hi
	}


	public function strpos(){
		//strpos — 查找字符串首次出现的位置



		//in_array($type, array('best', 'new', 'hot')   lib_goods.php   line 184   AND (g.is_best = 1 OR g.is_new =1 OR g.is_hot = 1)'      if ($data['is_best'] == 1)取出按某个属性排序的、



		//array_slice(array,offset,length,preserve)
	}


	public function array_unique(){
		/**
		 * array	必需。规定输入的数组。
		 offset
		 必需。数值。规定取出元素的开始位置。
		 如果是正数，则从前往后开始取，如果是负值，从后向前取 offset 绝对值。
		 length
		 可选。数值。规定被返回数组的长度。
		 如果 length 为正，则返回该数量的元素。
		 如果 length 为负，则序列将终止在距离数组末端这么远的地方。
		 如果省略，则序列将从 offset 开始直到 array 的末端。
		 preserve
		 可选。可能的值：
		 true - 保留键
		 false - 默认 - 重置键*/


		//array_merge    array_unique
		//unserialize serialize序列化，反序列化
		//krsort ksort



		// 逗号  str_replace('，',',',$file);

		//$a = array (1, 2, array ("a", "b", "c"));
		//var_export ($a);

		/* 输出：
		 array (
		 0 => 1,
		 1 => 2,
		 2 =>
		 array (
		 0 => 'a',
		 1 => 'b',
		 2 => 'c',
		 ),
		 )
		 */

	}

	public function xxx(){
		/**
		 * 得到数组变量的UTF-8编码
		 *
		 * @param array $key GBK编码数组
		 * @return array 数组类型的返回结果
		 */
		//	public static function getUTF8($key){
		//		/**
		//		 * 转码
		//		 */
		//		if (!empty($key)){
		//			if (is_array($key)){
		//				$result = var_export($key, true);//变为字符串
		//				$result = iconv('GBK','UTF-8',$result);
		//				eval("\$result = $result;");//转换回数组
		//			}else {
		//				$result = iconv('GBK','UTF-8',$key);
		//			}
		//		}
		//		return $result;
		//	}
		//	@header("location: index.php?act=login&ref_url=".urlencode($ref_url));
		//  get_included_files();  返回所有被 include、 include_once、 require 和 require_once 的文件名。
		//　array_merge_recursive() 函数与 array_merge()不同的是，当有重复的键名时，值不会被覆盖，而是将多个相同键名的值递归组成一个数组。
		//realpath($a) — 返回规范化的绝对路径名
		//class_exists($class_name)  method_exists($main,'indexOp')


		//array_map() 函数返回用户自定义函数作用后的数组
	}

	public function array_map(){
		//array_map() 函数返回用户自定义函数作用后的数组

		$a=array("Horse","Dog","Cat");
		print_r(array_map("myfunction",$a));
	}
	public function strposstrpos(){
		//strposstrpos() 函数返回字符串在另一个字符串中第一次出现的位置。 如果没有找到该字符串,则返回 false。 语法 strpos(string,find,start) 参数 描述 string必需。
		//array_merge
	}
	function myfunction($v)
	{
		if ($v==="Dog")
		{
			return "Fido";
		}
		return $v;
	}
	public function session_register(){
		/**
		 * bool is_scalar ( mixed $var ) 标量变量是指那些包含了 integer、float、string 或 boolean的变量，而 array、object 和 resource 则不是标量。
		 * array_keys — 返回数组中所有的键名
		 */
		/**
		 * memory_get_usage
		 * function get_included_files () {}
		 * function get_required_files () {}
		 * str_replace('，',',',$file);替换中文逗号。
		 * mb_substr() - 获取字符串的部分

		 mb_strcut() - 获取字符的一部分mb_strcut() 和 mb_substr() 类似，都是从一个字符串中提取子字符串，但是按字节数来执行，而不是字符个数。 如果截断位置位于多字节字符两个字节的中间，将于该字符的第一个字节开始执行。 这也是和 substr() 函数的不同之处，后者简单地将字符串在字节之间截断，这将导致一个畸形的字节序列。

		 token_get_all — 将提供的源码按 PHP 标记进行分割
		 token_name —  获取提供的 PHP 解析器代号的符号名称

		 public function getTotal($tax)
		 {
		 $total = 0.00;

		 $callback =
		 function ($quantity, $product) use ($tax, &$total)
		 {
		 $pricePerItem = constant(__CLASS__ . "::PRICE_" .
		 strtoupper($product));
		 $total += ($pricePerItem * $quantity) * ($tax + 1.0);
		 };

		 array_walk($this->products, $callback);
		 return round($total, 2);;
		 }
		 use 的作用是将上一级作用范围中的变量导入进匿名函数中，使其在匿名函数中可用，但不是参数。

		 const CONST_VALUE = 'A constant value';

		 ini_get — 获取一个配置选项的值

		 session_register(‘varname’)，而不是session_register($varname)    session_unset()仅在session生命周期能够操作$_SESSION数组，而unset()则在整个页面(page)生命周期都能操作$_SESSION数组
		 */
	}




}