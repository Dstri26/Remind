<?php
    include('simple_html_dom.php');
    $link = $_POST['link'];
    $response = array();

    try{
        $html = file_get_html($link);
        $response['success']=true;
        $response['title']=$html->find('title',0)->plaintext;
        $response['shortdesc'] = $html->find('meta[name=description]',0)->getAttribute('content');
        $response['link']=$link;
    }
    catch (Exception $e) {
        $response['success']=true;
        $response['title']="Couldn't Fetch";
        $response['shortdesc'] = "Couldn't Fetch";
        $response['link']=$link;
    }

    echo json_encode($response);


?>