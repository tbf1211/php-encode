<?php

function swap(&$arr, $i, $j)
{
	/*$tmp = $arr[$i];
	$arr[$i] = $arr[$j];
	$arr[$j] = $tmp;*/
	$arr[$i] = $arr[$i]^$arr[$j];
	$arr[$j] = $arr[$i]^$arr[$j];
	$arr[$i] = $arr[$i]^$arr[$j];
}

//选择排序
function selectionSort(&$arr)
{
	if(is_array($arr))
	{
		$len = count($arr);
		for($i = 1; $i < $len; $i++)
		{
			$min = $i - 1;
			for($j = $i; $j < $len; $j++)
			{
				if($arr[$min] > $arr[$j])
				{
					$min = $j;
				}
			}

			if(($i - 1) != $min)
				swap($arr, $i - 1, $min);
		}
	}
}

//冒泡排序
function bubbleSort(&$arr)
{
	if(is_array($arr))
	{
		$len = count($arr);
		$flag = true;
		for($i = 0; $i < $len -1 && $flag; $i++)		
		{
			$flag = false;
			for($j = 0; $j < $len - $i - 1; $j++)	
			{
				if($arr[$j] > $arr[$j + 1])
				{
					swap($arr, $j, $j + 1);
					$flag = true;
					// var_dump($j,$j-1,$arr);
				}
			}
		}
	}		
}

//插入排序
function insertionSort(&$arr)
{
	if(is_array($arr))
	{
		$len = count($arr);
		for($i = 1; $i < $len; $i++)
		{
			$k = $i;
			$tmp = $arr[$i];

			for($j = $i; $j > 0 && $tmp < $arr[$j - 1]; $j--)
			{
				$arr[$j] = $arr[$j - 1];
				$k = $j - 1;
			}

			$arr[$k] = $tmp;
		}
	}
}

//约瑟夫问题
function king($arr, $n)
{
	$i = 1;
	$retArr = array();

	while(count($arr) > 1)
	{
		$tmp = array_shift($arr);
		if(0 != $i%$n)
		{
			array_push($arr, $tmp);
		}

		$i ++;
	}
	$retArr['count'] = $i;
	$retArr['num'] = $arr[0];

	return $retArr;
}

header("Content-type: text/html; charset=utf-8");

$arr = array(433, 545, 56, 2, 567345553);
/*$arrTmp = range(45,100000);
$arr = array_merge($arr, $arrTmp);*/
var_dump($arr);
echo '<br/>';
$stime = microtime(true);
bubbleSort($arr);
$etime = microtime(true);
var_dump("运行时间：".($etime-$stime));
var_dump($arr);
