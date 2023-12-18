<html>

<head>
    <title>Add User</title>
</head>

<body>
    <?php
    //default value for the form
    $action_value = "create";
    $first_name = "";
    $last_name = "";
    $submit_button = "Add User";
    $h_id = 0;
    $action_label = "Add User";

    //in case of edit override the default values
    if($action == "edit"){
        $action="update";
        $first_name = $user_data['first_name'];
        $last_name = $user_data['last_name'];
        $h_id = $user_data['id'];

        $action_value = "update";
        $submit_button = "Update User";
        $action_label = "Update User";
     }
    
    ?>
    <div id="container">
        <div id="main" style="text-align: center;">
            
            <div style="background: grey; padding:10px"><b><?=$action_label?></b></div>

            <div style="border: 1px solid grey;">
            <form action="/" method="post">
                <input type="hidden" name="action" value="<?=$action_value?>">
                <input type="hidden" name="h_id" value="<?=$h_id?>" >

               <div class="form_field"> 
                    <label>First Name: </label> <input type="text" name="first_name" value="<?=$first_name?>"> 
                </div>

               <div class="form_field">
                    <label>Last Name: </label> <input type="text" name="last_name" value="<?=$last_name?>">
               </div>

               <div class="form_field">
               <input type="submit" value="<?=$submit_button?>"> 
               <input type="button" onclick="location.href = '/';" value="Cancel">
               </div> 
                
            </form>
            </div> 
        
        </div>
    </div>
</body>

</html>