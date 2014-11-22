

    <div class="container">
          <form  role="form" action="/dbms/index.php/admin/edit_done" method="post" enctype="multipart/form-data">
    

    <table align="center">
        
        
        
         <tr>
                    <td><h3 align="center" >Edit Question</h3>
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
        <?php
        foreach($s_sql->result() as $s_one)
        {
        echo '<tr><td>Question ID (not to be changed)</td></tr>
        <tr><td><textarea class="form-control" name="q_val" id="id" rows="1" cols="10">'.$s_one->id.'</textarea></td></tr>
        <br>
        <tr><td>Edit Question Here</td></tr>
        <tr>
            <td><textarea class="form-control" name="n_qs" id="ques" rows="5" cols="80" >'.$s_one->qs.'</textarea>
            </td>
        </tr><br>
        <tr><td>&nbsp;</td></tr>
      <tr>
        <td><input type="file" name="userfile"/>'.$s_one->image.'</td>
        
      </tr>
        <br>';
        }
    
        ?>
        
        
        <tr><td>&nbsp;</td></tr>
        
        
        <tr>
            <td width=100% align="center"><input class="btn btn-success" type="Submit" value="Update" >
            </td>
        </tr>

    </table>
</form>
<br><br>


    </div>  


</body>
</html>