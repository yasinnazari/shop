<?

	function br($return = false)
    {
		if ($return){
		return "<br>\n";
	 }	else {
			echo "<br>\n";
	  }
	}

	function hr($return = false)
    {
	    if ($return){
		    return "<hr>\n";
        }	else {
		    	echo "<hr>\n";
	    }
	}

    function dump($var, $return = false)
    {
		if (is_array($var)){
		$out = print_r ($var, true);
	 }	else if (is_object($var)){
			$out = var_export($var, true);
	 }	else {
		$out = $var;
	}

	if ($return){
		return "<pre>$out</pre>";
	 }	else {
			echo "<pre>$out</pre>";
	 }
	}

	function getUserId()
    {
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else {
            return 0;
        }
    }

	function getCurrentDateTime()
    {
		return date("Y-m-d H:i:s");
	}

	function encryptPassword($password)
    {
		global $config;
		return md5($password . $config['salt']);
	}

	function getFullUrl()
    {
		return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	function getRequestUri()
    {
		return $_SERVER['REQUEST_URI'];
	}

	function baseUrl()
    {
		global $config;
		return $config['base'];
	}

	function strhas($string, $search, $caseSensitive = false)
    {
		if ($caseSensitive){
			return strpos($string, $search) !== false;
		} else {
			return strpos(strtolower($string), strtolower($search)) !== false;
		}
	}

	function message($type, $message, $mustExit = false)
    {
		$data['message'] = $message;
		View::render("/message/$type.php", $data);
		if ($mustExit){
			exit;
		}
	}

	function twoDigitNumber($number)
    {
        return ($number < 10) ? $number = "0" . $number : $number;
	}

	function jdate($date, $format="Y d M")
    {
        $timestamp = strtotime($date);
        $seconddsInOneDay = 24*60*60 ;
        $daysPassed = floor($timestamp / $seconddsInOneDay) + 1 ;

        $days = $daysPassed;
        $month = 11;
        $year = 1348;

        $days -= 19;

        $daysInMonths = array( 31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29 );
        $monthName = array(
            _jan,
            _feb,
            _mar,
            _apr,
            _may,
            _jun,
            _jul,
            _aug,
            _sep,
            _oct,
            _nov,
            _dec,
        );

        while (true){
            if ($days > $daysInMonths[$month-1]){
                $days -= $daysInMonths[$month-1];
                $month++;
                if ($month == 13) {
                    $year++;
                    if (($year - 1347) % 4 == 0) {
                        $days--;
                    }
                    $month = 1;
                }
            } else {
                break;
            }
        }

        $month = twoDigitNumber($month);
        $days = twoDigitNumber($days);

		$monthName = $monthName[$month-1];

		$output = $format;
		$output = str_replace("Y", $year, $output);
		$output = str_replace("m", $month, $output);
		$output = str_replace("d", $days, $output);
		$output = str_replace("M", $monthName, $output);

        return $output;

	}

    function pegination($url, $showCount, $activeClass, $currentPageIndex)
    {
	    ob_start();
	?>
            <a href="<?=$url?>/1" class="<?=$activeClass?>"><?=_next?></a>
            <span> ... </span>
            <? for ($i=$currentPageIndex-$showCount; $i<=$currentPageIndex+$showCount; $i++) { ?>
            <? if ($i <= 0 ) { continue; } ?>
                <a href="<?=$url?>/<?=$i?>" class="<?=$activeClass?>"><?=$i?></a>
            <? } ?>

            <?
        $output = ob_get_clean();
        return $output;
	}

	function initializeSettings()
    {
	    if (!isset($_SESSION['viewType'])) {
	        $_SESSION['viewType'] = 'grid';
        }
    }

    function session_get($field, $default){
	    if (isset($_SESSION[$field])){
	        return $_SESSION[$field];
        }

	    return $default;
    }

    function session_set($field, $value)
    {
        $_SESSION[$field] = $value;
    }

    function post($field, $default = null){
	    if (isset($_POST[$field])){
	        return $_POST[$field];
        }

	    return $default;
    }
