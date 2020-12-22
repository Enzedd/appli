<?php
    if($msgs = App\Service\MessageService::getMessages("error")){
        echo "<ul id='errors'>";
        foreach($msgs as $msg){
            echo "<li>", $msg, "</li>";
        }
        echo "</ul>";
    }
    if($msgs = App\Service\MessageService::getMessages("success")){
        echo "<ul id='success'>";
        foreach($msgs as $msg){
            echo "<li>", $msg, "</li>";
        }
        echo "</ul>";
    }
?>