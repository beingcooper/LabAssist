
<div class="container">

 
 <br><br>
 <form role="form" action="/dbms/index.php/admin/dash_delete" method="post">
  <table align="center" class="table table-striped tab_fixed">
   <thead><tr><th style="width: 6%">S.No</th><th style="width: 94%">Question</th></tr></thead>
   <tbody>
     <?php
     $s_no=1;
     foreach($sql->result() as $row)
     {
      echo '<tr><td><input type="checkbox" name="q_no_del[]" value="'.$row->id.'"/> '.$s_no++.'</td>';
      if($row->if_img==1){
        echo '<td><img src="/dbms/uploads/'.$row->image.'"/></td></tr><tr><td>&nbsp;</td>';
      }
      
      echo '<td><pre>'.$row->qs.'</pre></td></tr>';
    }
    
    ?>
    <tr>
      <table class="table table-striped">
        <tr>	
          <td align="center"><input class="btn btn-success" type="Submit" value="Delete" >
          </td>
          
          <td align="center"><a href="/dbms/index.php/admin/" class="btn btn-success">Refresh</a>
          </td>
          <td align="center"><a href="/dbms/index.php/admin/dash_delete_all" class="btn btn-success">Delete All</a>
          </td>
        </tr>
      </table>
    </tr>
  </tbody>

</table>


</form>
<br><br>
<form role="form" action="/dbms/index.php/admin/s_dash_delete" method="post">
  <table align="center" class="table table-stripped tab_fixed">
   <thead><tr><th style="width: 6%">S.No</th><th style="width: 94%">Solutions</th></tr></thead>
   <tbody>
     <?php
     $s_no=1;
     foreach($s_sql->result() as $row)
     {
      echo '<tr><td><input type="checkbox" name="s_no_del[]" value="'.$row->id.'"/> '.$s_no++.'</td>';
      if($row->if_img==1){
        echo '<td><img src="/dbms/uploads/'.$row->image.'"/></td></tr><tr><td>&nbsp;</td>';
      }
      
      echo '<td><pre>'.$row->sol.'</pre></td></tr>';
    }
    
    ?>
    <tr>
      <table class="table table-striped">
        <tr>  
          <td align="center"><input class="btn btn-success" type="Submit" value="Delete" >
          </td>
          
          <td align="center"><a href="/dbms/index.php/admin/" class="btn btn-success">Refresh</a>
          </td>
          <td align="center"><a href="/dbms/index.php/admin/s_dash_delete_all" class="btn btn-success">Delete All</a>
          </td>
        </tr>
      </table>
    </tr>
  </tbody>

</table>


</form>
</div>
</body>
</html>