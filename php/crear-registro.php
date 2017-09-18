<?php
$url = "http://localhost:8069";
$db ="db";       
$username = "admin";                                  
$password = "pass";



require_once('assets/ripcord-master/ripcord.php');
$models = ripcord::client("$url/xmlrpc/2/common");

//Authenticate the credentials
$uid = $models->authenticate($db, $username, $password, array());
$models = ripcord::client("$url/xmlrpc/2/object");

$partner_name = "Marlon Falcón";
     

$new_partner_id = $models->execute_kw($db, $uid, $password,
    'res.partner',
    'create', // Function name
    array( // Values-array
        array( // First record
            'name'=>$partner_name,
            'phone'=> '56942994534',
        )
    )
);

if(is_int($new_partner_id)){
    echo "Partner '${partner_name}' creado con id '${new_partner_id}'";
}
else{
   echo "Error";
}     


?>