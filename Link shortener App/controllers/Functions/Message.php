<?php 

namespace Controllers\Functions;


class Message{

   public function sessionMessage($type, $message)
   {
      $_SESSION[$type] = $message;
   }

}