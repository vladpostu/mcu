<?php 
    function alert($status, $message) {
        if(isset($status)) {
            echo '<div class="alert ' . $status .'" role="alert">';
                echo '
                    <form action="./control/unset_alarm.php" method="GET">
                        <button type="submit" class="btn-close" aria-label="Close"></button>
                    </form>
                ';
                if(isset($message)) {
                    echo '<span>'.$message.'</span>';
                }
            echo "</div>";
        }
    }
?>