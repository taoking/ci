<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sort_function extends CI_Controller{

	public function __construct(){
		parent::__construct();

	}

	public function make_number($min = 1,$max = 9999,$count= 1000,$filename = 'rand_number'){
		if (intval($max)<intval($min)){
			$a;
		};
		$str = '';
		for ($i = 0; $i < $count; $i++) {
			$str.=empty($str)?rand($min, $max):"_".rand($min, $max);
		}
		$this->putContent('rand_number',$str);
		echo 'success';
		//		file_put_contents(APPPATH.'cache/'.$filename, $str);
	}

	public function getContent($filename = 'rand_number'){
		$str = file_get_contents(APPPATH.'cache/'.$filename.'.txt');
		if (empty($str)) return false;
		$return_array = explode('_', $str);
		return $return_array;
	}

	public function putContent($filename = 'rand_number',$str){
		file_put_contents(APPPATH.'cache/'.$filename.'.txt', $str);
	}

	public function maopaoSort(){
		$number_array = $this->getContent();
		for ($i = 0; $i < count($number_array); $i++) {
			for ($j = 0; $j < count($number_array); $j++) {
				if ($number_array[$i]<=$number_array[$j]){
					$num = $number_array[$j];
					$number_array[$j] = $number_array[$i];
					$number_array[$i] = $num;
				}
			}
		}
		$str = implode('_', $number_array);
		//		print_r($str);
		$this->putContent(__FUNCTION__, $str);
		echo "maopao write success";
	}

	public function insertSort(){
		set_time_limit(0);
		$number_array = $this->getContent();
		for ($i = 1; $i < count($number_array); $i++) {
			if ($number_array[$i]<$number_array[$i-1]){
				$tem =$number_array[$i];
				$number_array[$i] = $number_array[$i-1];
				$j = $i-1;
				while ($j>0 && $tem < $number_array[$j-1]){
					$number_array[$j] = $number_array[$j-1];
					$j--;
				}
				$number_array[$j] = $tem;
			}
		}
		$str = implode('_', $number_array);
		$this->putContent(__FUNCTION__, $str);
		echo __FUNCTION__." write success";

	}


	public function selectSort(){
		set_time_limit(0);
		$number_array = $this->getContent();
		for ($i = 0; $i < count($number_array); $i++) {
			$min = $i;
			for ($j = $i; $j < count($number_array); $j++) {
				if ($number_array[$j]<$number_array[$min]){
					$min = $j;
				}
			}
			$tem = $number_array[$i];
			$number_array[$i] = $number_array[$min];
			$number_array[$min] = $tem;
		}
		$str = implode('_', $number_array);
		$this->putContent(__FUNCTION__, $str);
		echo __FUNCTION__." write success";

	}

	public function quickSort(){
		set_time_limit(0);
		$number_array = $this->getContent();
		$this->quick_sort($number_array,0,count($number_array)-1);
		print_r($number_array);

	}

	#快速排序
	#@param $arr    待排序数组
	#@param $start    排序的开始坐标
	#@param $end    排序数组的结束坐标
	function quick_sort(&$arr, $start, $end) {
		$low = $start;
		$high = $end;

		//        #同时移动low和high,low找比$arr[$start]大的元素,high找比$arr[$start]小的元素
		//        #交换大小元素位置,知道low=high
		while($low != $high) {
			while($arr[$low] <= $arr[$start] && $low != $high) {
				$low++;
			}
			while($arr[$high] >= $arr[$start] && $low != $high) {
				$high--;
			}
			$temp = $arr[$low];
			$arr[$low] = $arr[$high];
			$arr[$high] = $temp;
		}

		//    #如果low和high指向的元素小于$arr[$start],交换$arr[$start]和这个元素
		//   #否则交换$arr[$start]和low指向的前一个元素,然后进入递归
		if($low != $start && $arr[$low] > $arr[$start]) $low--;
		$temp = $arr[$low];
		$arr[$low] = $arr[$start];
		$arr[$start] = $temp;

		//   #递归中止条件是切分后的部分只剩下一个元素
		if($low - 1 > $start) $this->quick_sort($arr, $start, $low - 1);
		if($low + 1 < $end) $this->quick_sort($arr, $low + 1, $end);

	}

//不太好
	function quick_sort2($array){
		if (count($array) <= 1) return $array;

		$key = $array[0];
		$left_arr = array();
		$right_arr = array();
		for ($i=1; $i<count($array); $i++){
			if ($array[$i] <= $key)
			$left_arr[] = $array[$i];
			else
			$right_arr[] = $array[$i];
		}
		$left_arr = quick_sort($left_arr);
		$right_arr = quick_sort($right_arr);

		return array_merge($left_arr, array($key), $right_arr);
	}


	public function index(){
		$i = 1;
		while ($i<=10){
			echo $i;
			$i++;
			echo $i;
		}
	}
}