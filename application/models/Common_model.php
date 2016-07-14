<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Common_model extends CI_Model {

    function dateformatter($range_string, $formate = 'Mysql') {
        $date = explode(' - ', $range_string);
        $date[0] = explode('/', $date[0]);
        $date[1] = explode('/', $date[1]);

        if ($formate == 'Mysql') {
            return "'{$date[0][2]}-{$date[0][0]}-{$date[0][1]}' and '{$date[1][2]}-{$date[1][0]}-{$date[1][1]}'";
        } else if ($formate == "2_string") {
            $date = explode(' - ', $range_string);
            $from_date = date('Y-m-d', strtotime($date[0]));
            $to_date = date('Y-m-d', strtotime($date[1]));
            return compact(array('from_date', 'to_date'));
        } else {
            return $date;
        }
    }

    function convert_date_range_to_mysql_between($data_picker_date_range) {
        $dates = explode(' - ', $data_picker_date_range);
        $from = date('Y-m-d', strtotime($dates[0]));
        $to = date('Y-m-d', strtotime($dates[1]));
        return " '$from' and '$to' ";
    }

}
