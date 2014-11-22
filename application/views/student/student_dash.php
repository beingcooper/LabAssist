
<div class="container">

 
 <br><br>
 
 <table align="center" class="table table-striped tab_fixed">
   <thead><tr><th style="width: 6%">S.No</th><th style="width: 94%">Question</th></tr></thead>
   <tbody>
     <?php
     $s_no=1;
     foreach($q_sql->result() as $row)
     {
      echo '<tr><td>'.$s_no++.'</td>';
      if($row->if_img==1){
        echo '<td><img src="/dbms/uploads/'.$row->image.'"/></td></tr><tr><td>&nbsp;</td>';
      }
      
      echo '<td><pre>'.$row->qs.'</pre></td></tr>';
    }
    
    ?>
  </tbody>
</table>
<table align="center" class="table table-striped tab_fixed">
 <thead><tr><th style="width: 6%">S.No</th><th style="width: 94%">Solution</th></tr></thead>
 <tbody class="sol">
   <?php
   $s_no=1;
   foreach($s_sql->result() as $row)
   {
    echo '<tr><td>'.$s_no++.'</td>';
    if($row->if_img==1){
      echo '<td><img src="/dbms/uploads/'.$row->image.'"/></td></tr><tr><td>&nbsp;</td>';
    }
    
    echo '<td><pre>'.$row->sol.'</pre></td></tr>';
  }
  
  ?>
  <tr>
    <table class="table table-striped">
      <tr>	
        
        
        <td align="center"><a href="/dbms/index.php/student" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </td>
        
      </tr>
    </table>
  </tr>
</tbody>

</table>
<img class="bad"src="/dbms/img/BB.png">
<p class="foot">Powered by <strong>Heisenburg</strong></p>


</div>
</body>
</html>