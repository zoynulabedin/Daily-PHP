<?php 
require_once "inc/functions.php";
$info = '';
$task = $_GET['task'] ?? 'report';
if('seed' == $task){
    seeds();
    $info = "Sending is complete";
}
if(isset($_POST['submit'])){
    $cn = filter_input(INPUT_POST,'cn',FILTER_SANITIZE_STRING);
    $pn = filter_input(INPUT_POST,'pn',FILTER_SANITIZE_STRING);
    $pu = filter_input(INPUT_POST,'pu',FILTER_SANITIZE_URL);
    $id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_URL);
    if($id){
        // update the existing data
        if($cn !='' && $pn !='' && $pu !=''){
            updateProject($id,$cn,$pn,$pu);
            header('location: /practice/crud/index.php?task=report');
        }
    }else{
        // add data
        if($cn !='' && $pn !='' && $pu !=''){
            addProject($cn, $pn, $pu);
            header('location: /practice/crud/index.php?task=report');
        }
    }
   
}
if('delete'==$task){
    $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_URL);
    if($id>0){
        deteteProject($id);
        header('location: /practice/crud/index.php?task=report');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>crud project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="client-management">
        <div class="container">
            <div class="row">
                <div class="column column-60 column-offset-20">
                <div class="cm-head">
                    <h2>Project Management</h2>
                        <p>A simple project to perform crud operation using plain files and php</p>
                        <?php include_once("inc/template/nav.php"); ?>
                        <?php 
                        if($info !=''){
                            echo "<p style='color:green;'>{$info}</p>";
                        }
                        ?>
                </div>
                        
                </div>
            </div>
            <?php if('report'==$task): ?>
            <div class="row">
                <div class="column column-80 column-offset-20">
                 <?php generatReport(); ?>
                </div>
            
            </div>
            <?php endif; ?>

            <?php if('add'==$task): ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <form action="/practice/crud/index.php?report" method="POST">
                            <label for="cn">Client Name</label>
                            <input type="text" id="cn" name="cn">
                            <label for="pn">Project Name</label>
                            <input type="text" id="pn" name="pn">
                            <label for="pu">Project Url</label>
                            <input type="text" id="pu" name="pu">
                            <input type="submit" name="submit" value="Add Project">
                    </form>
                </div>
            
            </div>
            <?php endif; ?>

            <?php
             if('edit'==$task):
             $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
             $project = getProject($id);
            
             if($project):
             ?>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <form action="/practice/crud/index.php?task=edit " method="POST">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <label for="cn">Client Name</label>
                            <input type="text" id="cn" name="cn" value="<?php echo $project['name']; ?>">
                            <label for="pn">Project Name</label>
                            <input type="text" id="pn" name="pn" value="<?php echo $project['pname']; ?>">
                            <label for="pu">Project Url</label>
                            <input type="text" id="pu" name="pu" value="<?php echo $project['purl']?>">
                            <input type="submit" name="submit" value="Update">
                    </form>
                </div>
            
            </div>
            <?php 
                endif;
            endif; 
            
            ?>
        </div>
    </div>
</body>
</html>