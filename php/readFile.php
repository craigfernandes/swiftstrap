<?php
  
  /**
   *  @Description: Read the contents of the dat.txt file
   *         		  and build the menu.
   *
   *
   *
   **/
   
class Read_file
{
    private $name = "";
    private $xcoord = "";
    private $ycoord = "";
    private $id = "";
    
    public $metas = array();
   
    public function setName($fo)
    {
      $this->name = $fo;
    }
   
    public function setX($id)
    {
       $this->xcoord = $id;
    }

    public function setY($na)
    {
       $this->ycoord= $na;
    }
    
    public function setId($li)
    {
       $this->id = $li;	
    }
    
    public function getName()
    {
       return $this->name;
    }
    
    public function getX()
    {
       return $this->xcoord;
    }
    
    public function getY()
    {
       return $this->ycoord;
    }
    
    public function getId()
    {
       return $this->id;	
    }   

}

function parseFile()
{
 //read in text file and build menu
 $file = fopen('dat.txt','r');
 
 //$metas = array();
 $i = 0;
 $hold = array();    
 while(!feof($file)) 
 { 
     $name = fgets($file);
     if (strlen($name) > 1)
     {
     	 $tmp = new Read_file();
     	 
       $pieces = explode(",", $name);
       $hold[$i] = $pieces[1];
       
       $tmp->setName($pieces[3]);
       $tmp->setX($pieces[0]);
       $tmp->setY($pieces[1]);
       $tmp->setId($pieces[2]);
       
       $metas[$i] = $tmp;
       $i++;          
     }
 }
 fclose($file); 
	
 //walk up the menu
 for($a = $i-1; $a >= 0; $a--)
 {	
	findParent($a,$metas);
 }
}
 
 
/**
545,229,1,Menu
545,236,2,Portfolio
545,308,3,Gallery
575,349,4,facebook pics
575,381,5,twitter pics
545,411,6,contact



Menu 0 1
Portfolio 0 2
Gallery 0 3
facebook 3 4
twitter 3 5
contact 0 6

**/
 
function findParent($ind,$metas)
{
 	if($metas[$ind]->getX() == 545)
 	{
 	  echo($metas[$ind]->getName());
 	  echo(' 0 ');	
 	  echo($metas[$ind]->getId());
 	  echo('<br>');
 	}
 	
 	/**Walk up the menu and find parent**/
 	else 
 	{
 		echo($metas[$ind]->getName());
 		
 		$tmp = $metas[$ind]->getX();
 		
      for( $a = $ind-1; $a >= 0; $a-- )
      {
         if($metas[$a]->getX() < $tmp) 
         {      	     	  
      	  $tmp = $metas[$a]->getX();
      	  echo($metas[$a]->getId());
      	  break;  
      	}
      }
      echo(" ");
      echo($metas[$ind]->getId());
      echo('<br>');  
 		
 	}	
}





parseFile();

?>