<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_customer");
    date_default_timezone_set('Asia/Manila');

    echo '<div class="notification-header"><h1>Notifications</h1></div>';

    usort($result, function($a, $b) {
        return strtotime($b["date"]) - strtotime($a["date"]);
    });

    function getNotificationTime($time) {
        $difference = abs(strtotime($time) - strtotime(date("d-m-Y h:i:s")));
        $hours = floor($difference / 3600);
        $minutes = date("i", $difference);
        $seconds = date("s", $difference);
        $days = floor($hours / 24);
		
      
        if($days >= 365) return "a year ago";
        if($days >= 30) return "a month ago";
        if($days >= 14) return "weeks ago";
        if($days >= 7) return "a week ago";
        if($days > 1) return $days . " days ago";
        if($days == 1) return "a day ago";
        if($hours > 1) return intval($hours) . " hours ago";
        if($hours == 1) return "about an hour ago";
        if($hours == 0 && $minutes > 1) return intval($minutes) . " minutes ago";
        if($hours == 0 && $minutes == 1) return "a minute ago";
        if($minutes == 0) return "just now";
    }

    forEach($result as $database => $row){
        if(strcmp($row['supplier name'], $_SESSION["store name"]) == 0) {
            echo '
                <hr>
                <div class="individual_notification">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="container_message">
                        <p class="message">New order from ' . $row["customer name"] . '</p>
                        <p class="time"> ' . getNotificationTime($row["date"]) . '</p>
                    </div>
                </div>
            ';
        }
    }
?>

<script>
    $(document).ready(function(){
        $(".individual_notification").click(function() {
            window.location.href = "supplier.php?page=supplier-order_status";
        });
    });
</script>