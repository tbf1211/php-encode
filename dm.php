<?php

interface IFilter
{
	function filter($info);
}

class StringFilter implements IFilter
{
	public function filter($info)
	{
		return is_string($info) && !is_numeric($info);
	}
}


class NumFilter implements IFilter
{
	public function filter($info)
	{
		return is_numeric($info);
	}
}

class GetArr
{
	private $arr = array();
	public function __construct($arr)
	{
		$this->arr = $arr;
	}

	public function filterArr($filter)
	{
		$retArr = array();
		if(is_array($this->arr))
		{
			foreach ($this->arr as $key => $item)
			{
				if($filter->filter($item))
				{
					if(is_numeric($key))
					{
						$retArr[] = $item;
					}else{
						$retArr[$key] = $item;
					}
					
				}
			}
		}

		return $retArr;
	}
}

header("Content-type: text/html; charset=utf-8");

$arr = array(
	't001'=>'dffdf', 
	't002'=>43443,
	't003'=>'tt3443',
	't004'=>'trtrt',
	't005'=>'螳螂',
	't006'=>'5454'
);

$filterObj = new GetArr($arr);
$filterArr = $filterObj->filterArr(new StringFilter());

var_dump($arr, $filterArr);