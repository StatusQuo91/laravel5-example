<?php
define("MIN_YEAR", 13);
define("MAX_YEAR", 63);
define("MAX_INPUTABLE_YEAR", 99);
$arrInYear = [13];
$arrOutYear = [99];
print_r(vietISMaxEmployeeYear($arrInYear, $arrOutYear));
function vietISMaxEmployeeYear($inYearArr, $outYearArr) {
    $arrInput = array();
    for ($i = 0; $i < count($inYearArr); $i++){
        $objRecord = new stdClass;
        $objRecord->inYear = $inYearArr[$i];
        $objRecord->outYear = $outYearArr[$i];
        $arrInput[] = $objRecord;
    };
    
    //Call quicksort
    $arrSorted = quick_sort($arrInput);
    //Initialize result array
    $arrResult = array_fill(MIN_YEAR, MAX_YEAR, 0);
    $resultYear = $arrSorted[0]->inYear;
    $resultNum = 0;
    //Check if 
    //Loop sorted array above to calculate 
    for ($i = 0 ; $i < count($inYearArr); $i++){
		for ($j = $arrSorted[$i]->inYear + 1; $j < MAX_YEAR; $j++){
			$arrResult[$j]++;
    	}
        $arrResult[$arrSorted[$i]->inYear]++;
        if ( $arrSorted[$i]->outYear <> MAX_INPUTABLE_YEAR ){
        	for ($j = $arrSorted[$i]->outYear + 1; $j < MAX_YEAR; $j++){
        		$arrResult[$j]--;
        	}
        }
        if ( $arrResult[$arrSorted[$i]->inYear] > $resultNum ){
        	$resultNum = $arrResult[$arrSorted[$i]->inYear];
        	$resultYear = $arrSorted[$i]->inYear;
        }
    }
    return array(
    	$resultNum,
    	$resultYear,
    	);
}
function quick_sort($array)
{
	// find array size
	$length = count($array);
	
	// base case test, if array of length 0 then just return array to caller
	if($length <= 1){
		return $array;
	}
	else{
		// select an item to act as our pivot point, since list is unsorted first position is easiest
		$pivot = $array[0];
		// declare our two arrays to act as partitions
		$left = $right = array();
		
		// loop and compare each item in the array to the pivot value, place item in appropriate partition
		for($i = 1; $i < count($array); $i++)
		{
			if($array[$i]->inYear < $pivot->inYear){
				$left[] = $array[$i];
			}
			else{
				$right[] = $array[$i];
			}
		}
		// use recursion to now sort the left and right lists
		return array_merge(quick_sort($left), array($pivot), quick_sort($right));
	}
}


?>