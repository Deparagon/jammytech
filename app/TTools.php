<?php

/*
Collection of various function into collection class


*/

/**
 * 
 */

namespace app;

class TTools
{
    public static function redirect($url, $permanent = false)
    {
        ob_start();
        ob_get_clean();
        if (headers_sent() === false) {
            header('Location: '.$url, true, ($permanent === true) ? 301 : 302);
        }

        exit();
    }

    public static function relax()
    {
        return;
    }

    public static function getValue($var)
    {
        if (isset($_GET)) {
            if (isset($_GET[$var])) {
                return trim(htmlentities($_GET[$var]));
            }
        }

        if (isset($_POST)) {
            if (isset($_POST[$var])) {
                return trim(htmlentities($_POST[$var]));
            }
        }

        return '';
    }

    public static function validSite($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            return true;
        } else {
            return false;
        }
    }
    public static function displayPrice($price)
    {
        if ((float) $price < 0) {
            return;
        }
        echo '₦'.number_format($price, 2);
    }

    public static function showPrice($price)
    {
        if ((float) $price < 0) {
            return;
        }

        return '₦'.number_format($price, 2);
    }

    public static function displayNumber($num)
    {
        if ($num == '') {
            echo  0;

            return;
        }
        echo number_format($num, 0);
    }

    public static function showNumber($num)
    {
        if ($num == '') {
            return 0;
        }

        return number_format($num, 0);
    }

    public static function codeGenerator($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = strlen($chars);

        for ($i = 0, $token = ''; $i < $length; ++$i) {
            $index = rand(0, $count - 1);
            $token .= substr($chars, $index, 1);
        }

        return $token;
    }
    public static function generateCodex($length = 8)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()_+{}":.,/|][';
        $count = strlen($chars);

        for ($i = 0, $token = ''; $i < $length; ++$i) {
            $index = rand(0, $count - 1);
            $token .= substr($chars, $index, 1);
        }

        return $token;
    }

    public static function generateRandomNumber($length = '7')
    {
        $chars = '0123456789';
        $count = strlen($chars);

        for ($i = 0, $token = ''; $i < $length; ++$i) {
            $index = rand(0, $count - 1);
            $token .= substr($chars, $index, 1);
        }

        return $token;
    }
    public static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validURL($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);

        return filter_var($url, FILTER_VALIDATE_URL);
    }

    public static function getIP()
    {
        return filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
    }

    public static function obuObject($var)
    {
        if (is_object($var)) {
            return true;
        } else {
            return false;
        }
    }

    public static function displayDate($date)
    {
        $tdate = strtotime($date);
        echo date('F j, Y, g:i a', $tdate);
    }

    public static function displayODate($date)
    {
        $tdate = strtotime($date);
        echo date('F j, Y ', $tdate);
    }
    public static function showDate($date)
    {
        $tdate = strtotime($date);

        return date('F j, Y, g:i a', $tdate);
    }

    public static function naError($e)
    {
        ?>
     <div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><?php echo $e;
        ?> </div>
<?php

    }

    public static function naSuccess($s)
    {
        ?>
        <div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><?php echo $s;
        ?> </div> <?php

    }

    public static function naInfo($s)
    {
        ?>
    <div class="alert alert-info" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><?php echo $s;
        ?> </div>
<?php

    }
}
