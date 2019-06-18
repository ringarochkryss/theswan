<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("books.xml");


$result = xmlDoc_query($connect, xml);
if(xmlDoc_num_rows($result) > 0)
{
      $output .= '<h4 align "center" >Search Result</h4>';
      $output .= '<div  class="table-responsive">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>description</th>
                        <tr>'; 
    while ($row = myxml_fetch_array($result))
  {
            $output .= '
    
                        <tr>
                            <td>' .$row["title"].'</td>
                            <td>' .$row["description"].'</td>
                        <tr>';
        }
        echo $output;
    }
  else
  { 
      echo 'Data not found';
}
?>
