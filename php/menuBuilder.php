<?php
/**
 *  Author:Kung Fu Themes Copyright 2013
 *
 *  Description: Utility class to dynamically build menus 
 *               given the follow structure
 *	              
 *               Name, parent, child
 *
 * -Added bootstrap styling classes
 * -IMPORTANT Only works with one drop down menu
 * -Need to convert htmlentities to prevent bad output
 *   
 **/


class My_items
{
    private $name = "";
    private $parent = "";
    private $child = "";
    private $link = "#";
    
   
    public function setName($fo)
    {
      $this->name = $fo;
    }
   
    public function setParent($id)
    {
       $this->parent = $id;
    }

    public function setChild($na)
    {
       $this->child= $na;
    }
    
    public function setLink($li)
    {
       $this->link = $li;	
    }
    
    public function getName()
    {
       return $this->name;
    }
    
    public function getParent()
    {
       return $this->parent;
    }
    
    public function getChild()
    {
       return $this->child;
    }
    
    public function getLink()
    {
       return $this->link;	
    }


}//End class declaration

/**
 *  @Description: To dynamically build a php menu
 *                using recursion.
 *
 **/

function buildNavigation($items, $parent = "0", $level = 0)
{
    $hasChildren = false;
    $outputHtml = '<ul class="nav">%s</ul>';
    $childrenHtml = '';
    
    if($level == 1)
    {
       $outputHtml = '<ul class="dropdown-menu">%s</ul>';    	
    }
    if($level == 2)
    {
       $outputHtml = '<ul>%s</ul>';    	
    }

      
    foreach($items as $item)
    {
    	  
        if ($item->getParent() == $parent) 
        {           
				/*Special case for first drop down menu*/           
            if($level == 0) 
            { 
	            $hasChildren = true;
	            $childrenHtml .= '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">'
	                             . $item->getName(). '<b class="caret"></b></a>';         
	            $childrenHtml .= buildNavigation($items, $item->getChild(), $level+1);                  
	            $childrenHtml .= '</li>'; 	
            }
            else
            {	
	            $hasChildren = true;
	            $childrenHtml .= '<li><a href="'.$item->getLink().'">'. $item->getName();         
	            $childrenHtml .= buildNavigation($items, $item->getChild(), $level+1);                  
	            $childrenHtml .= '</a></li>';  
            }          
        }        
    }
 
    // Without children, we do not need the <ul> tag.
    if (!$hasChildren) 
    {
        $outputHtml = '';
        $level--;
    }

    // Returns the HTML
    return sprintf($outputHtml, $childrenHtml);
    
}



//declare an array of class objects
$metas = array();


$object = new My_items();
$object->setName("reloading");
$object->setParent("0");
$object->setChild("2");

$object1 = new My_items();
$object1->setName("sublevel");
$object1->setParent("2");
$object1->setChild("19");

$object2 = new My_items();
$object2->setName("sublevel");
$object2->setParent("2");
$object2->setChild("22");




$metas[0] = $object;
$metas[1] = $object1;
$metas[2] = $object2;



print(buildNavigation($metas));


?>