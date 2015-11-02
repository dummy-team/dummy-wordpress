<?php
add_filter( 'get_twig', 'add_timberdate_to_twig' );

function add_timberdate_to_twig( $twig ) {
    $twig->addFilter('timberdate', new Twig_Filter_Function(function($timestamp, $format) {
        $dt = new DateTime();
        $year = (int)date('Y', $timestamp);

        if ($year < 1900 || $year > 3000) {
            $timestamp = $timestamp / 1000;
        }

        $dt->setTimestamp($timestamp);
        $dt->setTimezone(new DateTimeZone(
            $this->wp_get_timezone_string()
        ));
        return $dt->format($format);
    }));

    return $twig;
 }

function wp_get_timezone_string() {
    // if site timezone string exists, return it
    if ($timezone = get_option('timezone_string'))
        return $timezone;

    // get UTC offset, if it isn't set then return UTC
    if (0 === ($utc_offset = get_option('gmt_offset', 0)))
        return 'UTC';

    // adjust UTC offset from hours to seconds
    $utc_offset *= 3600;

    // attempt to guess the timezone string from the UTC offset
    if ($timezone = timezone_name_from_abbr('', $utc_offset, 0)) {
        return $timezone;
    }

    // last try, guess timezone string manually
    $is_dst = date('I');

    foreach (timezone_abbreviations_list() as $abbr) {
        foreach ($abbr as $city) {
            if ($city['dst'] == $is_dst && $city['offset'] == $utc_offset)
                return $city['timezone_id'];
        }
    }

    // fallback to UTC
    return 'UTC';
 }
