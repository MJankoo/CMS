<?php

function parseUrl() {
    if(isset($_GET['url'])){
        return $url = explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
    }
}

function convertDate($date) {
    $monthArray = [
        "01" => "styczeń",
        "02" => "luty",
        "03" => "marzec",
        "04" => "kwiecień",
        "05" => "maj",
        "06" => "czerwiec",
        "07" => "lipiec",
        "08" => "sierpień",
        "09" => "wrzesień",
        "10" => "październik",
        "11" => "listopad",
        "12" => "grudzień",
    ];

    $day = date("d",strtotime($date));
    $month = date("m",strtotime($date));
    $year = date("Y",strtotime($date));

    if(!isset($monthArray[$month]))
        $month = "01";

    $textDate = $day." ".$monthArray[$month].", ".$year;

    return $textDate;
}