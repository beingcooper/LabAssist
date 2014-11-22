
<div class="container">
  <form  role="form" action="/dbms/index.php/admin/panel" enctype="multipart/form-data" method="post">
    <input style="display:none">
    <input type="password" style="display:none">

    <table align="center">
      <tr>
        <td><h4 align="center">Add Question</h4>
        </td>
      </tr>
      <tr>
        <td><textarea class="form-control" name="ques" rows="5" cols="80" placeholder="Enter Question Here...." ></textarea>
        </td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td><input type="file" name="userfile"/></td>
        
      </tr>
      
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td width=100% align="center"><input class="btn btn-success" type="Submit" value="Post" >
        </td>
      </tr>

    </table>
  </form>
  <br><br>
  <form role="form" action="/dbms/index.php/admin/" method="post">
    <table class="table table-striped tab_fixed">
     <thead><tr><th style="width: 6%">S.No</th><th style="width: 94>Question</th><th style="width: 6%">&nbsp;</th></tr></thead>
     <tbody>
      <form role="form" action="/dbms/index.php/admin/ed">
       <?php
       $s_no=1;
       foreach($sql->result() as $row)
       {
        echo '<tr><td><input type="checkbox" name="q_no[]" value="'.$row->id.'"/> '.$s_no++.'</td>';
        if($row->if_img==1){
          echo '<td><img src="/dbms/uploads/'.$row->image.'"/></td><td>&nbsp;</td></tr><tr><td>&nbsp;</td>';
        }
        
        echo '<td><pre>'.$row->qs.'</pre></td></tr>';

      }
      ?>
      <form>

      <tr>
        <table class="table table-striped">
          <tr>	
            <td align="center"><input class="btn btn-success" type="Submit" name="Buton" value="Upload" >
            </td>
            
            <td align="center"><input class="btn btn-danger" type="Submit" name="Buton" value="Delete"> 
            </td>

            <td align="center"><a href="/dbms/index.php/admin/panel" class="btn btn-success">Refresh</a>
            </td>
             <td align="center"><input class="btn btn-danger" type="Submit" name="Buton" value="Edit">
            </td>
            
            <td align="center"><a href="/dbms/index.php/admin/panel_sol" class="btn btn-success">Add Solution</a>
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

