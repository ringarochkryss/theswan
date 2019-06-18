<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("books.xml");

$x=$xmlDoc->getElementsByTagName('book');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all description from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('author');
    $w=$x->item($i)->getElementsByTagName('description');
    $p=$x->item($i)->getElementsByTagName('price');
    
    if ($y->item(0)->nodeType==1) 
    {
        
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") 
        {
          $hint="<div class='findings'> <dl class='bookInfo'>
        <dd class='info'><strong>".$y->item(0)->childNodes->item(0)->nodeValue." </strong></dd>
        <dd class='info'><em>" . $z->item(0)->childNodes->item(0)->nodeValue . "</em></dd>
        <dd class='info desc'>". $w->item(0)->childNodes->item(0)->nodeValue . "</dd>
        <dd class='info'>"  . $p->item(0)->childNodes->item(0)->nodeValue . "$</dd>
        <dd class='bookImage'><img src='/data/svan.JPG' style='height:45px' /></dd>
        </dl></div>";
        }
      else
        {
         $hint=$hint ."<div class='findings'> <dl class='bookInfo'>
        <dd class='info'><strong>".$y->item(0)->childNodes->item(0)->nodeValue." </strong></dd>
        <dd class='info'><em>" . $z->item(0)->childNodes->item(0)->nodeValue . "</em></dd>
        <dd class='info desc'>". $w->item(0)->childNodes->item(0)->nodeValue . "</dd>
        <dd class='info'>"  . $p->item(0)->childNodes->item(0)->nodeValue . "$</dd>
        <dd class='bookImage'><img src='/data/svan.JPG' style='height:45px' /></dd>
        </dl></div>";
        }
      }
    }
  }
}
if ($hint=="")
  {
  $response="Sorry the book was not found.";
  }
else
  {
  $response=$hint;
  }
echo $response;
?>