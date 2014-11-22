

<div class="container">
  <form  role="form" action="/dbms/index.php/admin/panel_sol" enctype="multipart/form-data" method="post">
    <input style="display:none">
    <input type="password" style="display:none">

    <table align="center">
        <tr>
            <td><h4 align="center">Add Solution</h4>
            </td>
        </tr>

        <tr>
            <td> 
                <label for="q_id">Select Question No</label>
                <select class="form-control" name="q_id">
                    <?php 
                    $s_no=0;
                    foreach($sql->result() as $s) {
                        $s_no++;
                        if($s->if_ans==0){
                            echo '<option value="' . $s->id . '">' . $s_no. '</option>';
                        }
                    }
                    ?>
                </select>&nbsp;

            </td>
        </tr>
        <tr>
            <td><textarea class="form-control" name="sol" rows="5" cols="80" placeholder="Enter Solution Here...." ></textarea>
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
<form role="form" action="/dbms/index.php/admin/solution" method="post">
    <table class="table table-striped tab_fixed">
        <thead><tr><th style="width: 6%">S.No</th><th style="width: 94%">Solution</th></tr></thead>
        <tbody>
            <?php
            $s_no=1;
            foreach($s_sql->result() as $row)
            {
                echo '<tr><td><input type="checkbox" name="sol_no[]" value="'.$row->id.'"/> '.$s_no++.'</td>';
                if($row->if_img==1){
                    echo '<td><img src="/dbms/uploads/'.$row->image.'"/></td></tr><tr><td>&nbsp;</td>';
                }
                
                echo '<td><pre>'.$row->sol.'</pre></td></tr>';
            }
            ?>
            <tr>
                <table class="table table-striped">
                    <tr>    
                        <td align="center"><input class="btn btn-success" type="Submit" name="But" value="Upload" >
                        </td>
                        
                        <td align="center"><input class="btn btn-success" type="Submit" name="But" value="Delete"> 
                        </td>
                        <td align="center"><a href="/dbms/index.php/admin/sol_del_all" class="btn btn-success">Delete All</a>
                        </td>
                        <td align="center"><a href="/dbms/index.php/admin/panel_sol" class="btn btn-success">Refresh</a>
                        </td>
                        <td align="center"><a href="/dbms/index.php/admin/panel" class="btn btn-success">Return</a>
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