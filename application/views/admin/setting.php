
<div class="container">

    <div align="center">


        <form  role="form" action="/dbms/index.php/admin/setting" method="post" autocomplete="off">
            <input style="display:none">
            <input type="password" style="display:none">

            <table>
                <tr>
                    <td><h3 align="center" >Change Password</h3>
                    </td>
                </tr>
                <tr>
                    <td><input class="form-control" type="text" name="old_pass" placeholder="Enter Current password" >
                    </td>
                </tr>

                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><input class="form-control" type="password" name="new_pass" placeholder="Enter New Password">
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><input class="form-control" type="password" name="re_new_pass" placeholder="Re-enter New Password">
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td align="center"><input class="btn btn-success" type="Submit" value="Submit">
                    </td>
                </tr>

            </table>
            <?php

            if($res==1 || $res==3){
                echo '<p style="color: red">Password fields do not match!</p>';
                
            }

            elseif( $res==2){
                echo '<p style="color: green">Password changed!</p>';
            }
            ?>
        </form>

    </div>
    
</div>

</body>


</html>



