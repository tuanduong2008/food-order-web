<?php require 'partials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php

        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_admin WHERE id = $id"; 
        $res = mysqli_query($conn, $sql);
        
        if ($res == TRUE) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $fullname = $row['full_name'];
                $username = $row['username'];
            }
            else{
                header('loaction'.SITEURL.'admin/manage-admin.php');
            }
        }
        ?>

        <form action="" method="post">
            <table class="tbn-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $fullname; ?>"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'
        ";
        
        $res = mysqli_query($conn, $sql);
        if($res==TRUE){
            $_SESSION['update'] = "<div class ='success'>Admin Updated Successfully</div>";
            header('location: '.SITEURL.'admin/manage-admin.php'); // Correct the header function
            exit(); // Add exit to stop further execution
        }
        else{
            $_SESSION['update'] = "<div class ='error'>Fail to Update Admin</div>";
            header('location: '.SITEURL.'admin/manage-admin.php'); // Correct the header function
            exit(); // Add exit to stop further execution
        }
    }
?>


<?php require 'partials/footer.php' ?>
