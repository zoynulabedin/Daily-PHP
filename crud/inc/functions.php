<style>
.btn-succ {
    /* border: 1px solid; */
    color: #000;
    background: #9b4dca;
    color: #fff;
    padding: 10px 20px;
}

.btn-succ:hover {
    color: #fff;
}
</style>
<?php 
define("DB_NAME","F:\\xampp\\htdocs\\practice\\crud\\data\\filedata.txt");

function seeds(){
    $data = array(
                array(
                    'id'    =>1,
                    'name'  =>'kevin',
                    'pname' =>'bellakitchenandclosets',
                    'purl'  =>'bellakitchenandclosets.com'
                ),
                array(
                    'id'    =>2,
                    'name'  =>'kele',
                    'pname' =>'bellakitchenandclosets',
                    'purl'  =>'bellakitchenandclosets.com'
                ),
                array(
                    'id'    =>3,
                    'name'  =>'jef',
                    'pname' =>'bellakitchenandclosets',
                    'purl'  =>'bellakitchenandclosets.com'
                ),
            );
       
    $seriallizeData = serialize($data);

   file_put_contents(DB_NAME,$seriallizeData,LOCK_EX);
    
    
}


function generatReport(){

    $serilizeData = file_get_contents( DB_NAME );
    $projects = unserialize( $serilizeData );
    ?>
        <table>
            <tr>
               
                <th>SL</th>
                <th>Client Name</th>
                <th>project Name</th>
                <th>Project url</th>
            </tr>
            <?php
            $sl = 0;
            foreach($projects as $project){ 
                

                ?>
                <tr>
                   
                   <td><?php echo ++$sl;?></td>
                   <td> <?php printf('%s',$project['name']);?></td>
                   <td> <?php printf('%s',$project['pname']);?></td>
                   <td><?php printf('<a class="btn-succ" href="%s"> View Project</a> <a href="/practice/crud/index.php?task=edit&id=%s">Edit</a> |  <a href="/practice/crud/index.php?task=delete&id=%s">Delete</a>',$project['purl'],$project['id'],$project['id']); ?></td>
                </tr>
            <?php }?>
        </table>
    <?php
}

function addProject($cn, $pn, $pu){
    $serilizeData = file_get_contents(DB_NAME);
    $projects = unserialize($serilizeData);
    $newID = count($projects)+1;
    $newProject = array(
        'id'  =>$newID,
        'name' =>$cn,
        'pname' =>$pn,
        'purl'  =>$pu

    );
    array_push($projects,$newProject);

    $seriallizeData = serialize($projects);

    file_put_contents(DB_NAME, $seriallizeData,LOCK_EX);
}


function getProject($id){
    $serilizeData = file_get_contents(DB_NAME);
    $projects = unserialize($serilizeData);
    foreach($projects as $singpr){
        if($singpr['id']==$id){
            return $singpr;
        }
    }
    return false;
}

function updateProject($id,$cn,$pn,$pu){
    $serilizeData = file_get_contents(DB_NAME);
    $projects = unserialize($serilizeData);
    $project[$id-1]['cn'] = 'name';
    $project[$id-1]['pn'] = 'pname';
    $project[$id-1]['pu'] = 'purl';

    $seriallizeData = serialize($projects);

    file_put_contents(DB_NAME, $seriallizeData,LOCK_EX);

}

function deteteProject($id){
    $serilizeData = file_get_contents(DB_NAME);
    $projects = unserialize($serilizeData);
    unset($projects[$id-1]);
    $seriallizeData = serialize($projects);

    file_put_contents(DB_NAME, $seriallizeData,LOCK_EX);

}