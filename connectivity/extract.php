<?php

function extractKeyWords($string) {
    $connection = mysqli_connect("localhost","root","");
    if (!$connection){
        die("Database Connection Failed" . mysqli_error($connection));
    }
    $select_db = mysqli_select_db($connection, 'drd');
    if (!$select_db){
        die("Database Selection Failed" . mysqli_error($connection));
    }

    $query = "select * from sub_cat";
    $result = mysqli_query($connection,$query);
    $tag = array();
    $new = array();
    while ($tags = mysqli_fetch_array($result)){
        $t = $tags['sub_cat_name'];
        $t = preg_replace('/[\pP]/u', '', strtolower($t));
        array_push($tag,array_filter(explode(' ',$t),function ($t){ return !($t == '&' || $t == ' '|| $t == '' || strlen($t) <=2);}));
    }
    foreach   ($tag as $key => $val)
    {
        sort($val );
        $new = array_merge($val, $new);
    }
    $query = "select * from category";
    $result = mysqli_query($connection,$query);
    $tag = array();
    while ($tags = mysqli_fetch_array($result)){
        $t = $tags['main_cat'];
        $t = preg_replace('/[\pP]/u', '', strtolower($t));
        array_push($tag,array_filter(explode(' ',$t),function ($t){ return !($t == '&' || $t == ' '|| strlen($t) <=2);}));
    }

    foreach   ($tag as $key => $val)
    {
        sort($val );
        $new = array_merge($val, $new);
    }
    $stopwords = $new;
    mb_internal_encoding('UTF-8');
    $stopwords = array_merge(array('deals','offers','off','cashback'), $stopwords);
    $string = preg_replace('/\d+/u', '', preg_replace('/[\pP]/u', '', trim(preg_replace('/\s\s+/iu', '', mb_strtolower($string)))));
    $matchWords = array_filter(explode(' ',$string) , function ($item) use ($stopwords) { return (in_array($item, $stopwords));});
    $wordCountArr = array_count_values($matchWords);
    arsort($wordCountArr);
    return array_keys(array_slice($wordCountArr, 0, 10));
}
?>