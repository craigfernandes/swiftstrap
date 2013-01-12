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

include('readFile.php');

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



function getHtml()
{
	$metas = array();
	$test = array();
	$test = parsefile(); //call function from other file



	for($i=0; $i<count($test); $i++) 
	{
		$pieces = explode(",", $test[$i]);
	
		
		$object = new My_items();
		
		$object->setName(htmlentities($pieces[0]));
		$object->setParent($pieces[1]);
		$object->setChild($pieces[2]);
		
		$metas[$i] = $object;
	  	
	}
	return buildNavigation($metas);

}



?>