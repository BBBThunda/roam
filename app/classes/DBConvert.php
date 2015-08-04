<?php namespace Helpers;
/**
 * DBConvert Helper Class
 *
 * A single place for converting values to formats that play nice with the DB
 *
 */

class DBConvert {

    /**
     * Converts provided date and time in the provided formats into a
     * MySQL-friendly dateTime string
     *
     * @param string $inputDate  Date string as input by the user
     * @param string $inputTime  Time string as input by the user
     * @param string $dateFormat Date format expected from the user
     * @param string $timeFormat Time format expected from the user
     *
     * @return DateTime
     */
    public static function dateToDB($inputDate, $inputTime,
        $dateFormat = null, $timeFormat = null) {
        if (empty($dateFormat)) {
            $dateFormat = 'm/d/Y';
        }
        if (empty($timeFormat)) {
            $timeFormat = 'h:i a';
        }

        // Join time and date
        $input = $inputDate . ' ' . $inputTime;
        $format = $dateFormat . ' ' . $timeFormat;

        // Create DateTime value from parameters
        $dateTimeForDB = \DateTime::createFromFormat($format, $input);

        // Convert to MySQL-friendly format
        return $dateTimeForDB->format('Y-m-d H:i:s');
    } 

};
