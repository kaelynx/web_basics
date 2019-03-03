<?php

class Subject extends DomainObject
{  

   static function getFieldNames() {
      return array('SubjectID', 'SubjectName');
   }

   public function __construct(array $data, $generateExc)
   {
      parent::__construct($data, $generateExc);
   }


}

?>