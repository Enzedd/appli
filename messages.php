<?php

    if($msgs = MessageService::getMessages("error")){
        echo "<ul id='errors'>";
        foreach($msgs as $msg){
            echo "<li>", $msg, "</li>";
        }
        echo "</ul>";
    }
    if($msgs = MessageService::getMessages("success")){
        echo "<ul id='success'>";
        foreach($msgs as $msg){
            echo "<li>", $msg, "</li>";
        }
        echo "</ul>";
    }
?>