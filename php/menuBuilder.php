<?php
/**
 *  Author:Kung Fu Themes Copyright 2013
 *
 *  Description: Utility class to dynamically build menus 
 *               given the follow structure
 *	              
 *               Name, parent, child
 * 
 **/


class My_items
{
    private $name = "";
    private $parent = "";
    private $child = "";
    
   
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


}//End class declaration

/**
 *  @Description: To dynamically build a php menu
 *                using recursion.
 *
 **/

function buildNavigation($items, $parent = "0")
{
    $hasChildren = false;
    $outputHtml = '<ul>%s</ul>';
    $childrenHtml = '';

       
    foreach($items as $item)
    {
        if ($item->getParent() == $parent) 
        {
            $hasChildren = true;
            $childrenHtml .= '<li>'. $item->getName();         
            $childrenHtml .= buildNavigation($items, $item->getChild());         
            $childrenHtml .= '</li>';  
                     
        }
    }

    // Without children, we do not need the <ul> tag.
    if (!$hasChildren) 
    {
        $outputHtml = '';
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
$object1->setName("compnents");
$object1->setParent("2");
$object1->setChild("19");

$object2 = new My_items();
$object2->setName("compndsdsents");
$object2->setParent("19");
$object2->setChild("20");


$metas[0] = $object;
$metas[1] = $object1;
$metas[2] = $object2;


print(buildNavigation($metas));






?>