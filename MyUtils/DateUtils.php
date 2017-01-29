<?php

// DateUtils.php

namespace MyUtils;

class DateUtils {
    public static function getAgoString($time) {
        if(!$time instanceof int) {
            throw new RuntimeException('Invalid timestamp');
        }
        $diffMillis = time() - $time;
        $diffSeconds = $diffMillis / 1000;
        $diffMinutes = $diffSeconds / (60 * 1000);
        $diffHours = $diffMillis / (60 * 60 * 1000);
        $diffDays = $diffMillis / (24 * 60 * 60 * 1000);
        $diffWeeks = $diffMillis / (7 * 24 * 60 * 60 * 1000);
        $diffMonths = ($diffMillis / (30.41666666 * 24 * 60 * 60 * 1000));
        $diffYears = $diffMillis / (365 * 24 * 60 * 60 * 1000);

        if($diffSeconds < 1) {
            return "1 second ago";
        } else if($diffMinutes < 1) {
            return "$diffSeconds seconds ago";
        } else if($diffHours < 1) {
            return "$diffMinutes minutes ago";
        } else if($diffDays < 1) {
            return "$diffHours hours ago";
        } else if($diffWeeks < 1) {
            return "$diffDays days ago";
        } else if($diffMonths < 1) {
            return "$diffWeeks weeks ago";
        } else if($diffYears < 1) {
            return "$diffMonths months ago";
        } else {
            return "$diffYears years ago";
        }
    }
}