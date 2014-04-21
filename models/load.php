<?php

class Load_Model {
   function view( $file_name, $data = null ) 
   {
      if( is_array($data) ) {
         extract($data);
      }

      include_once(SERVER_ROOT . '/views/' . $file_name);
   }
}



