<?php
// ini_set("display_errors",1);
//error_reporting(0);


//$cid=$_POST['cid'];

$con=mysqli_connect("localhost","root","","farming_ass");
$data=$_POST;
$type=$data['type'];


//  print_r($_POST);
if($type==1){
    
$sql="SELECT * from farmer_question where del is NULL";
$result=$con-> query($sql);
$data=array();
 foreach($result as $row)
 {
	 $data1['f_product']=$row['f_product'];
	 $data1['message']="sucess";
	 //$data="sucess";
	 
	 $data[]=$data1;
	
 }
	 
    echo json_encode($data);  
 
}


if($type==2){
    // product detailview
    $id=$_POST['id'];
    // $id=1;
    

						 $qu = $db1->sql("SELECT a.pro_id,a.pro_desc,a.img_loc,a.pro_feat,a.pro_spec,b.id,b.pro_name,b.pro_code, MIN(pro_price) as pro_min,MAX(pro_price) as pro_max FROM sm_main_form_1504 as b INNER JOIN sm_main_form_1500 as c ON c.pro_name=$id  INNER JOIN sm_main_form_1505 as a ON a.pro_id = $id GROUP BY c.pro_name")->many();
			

    foreach($qu as $res)
    {
        $data1['pro_id']= $res["pro_id"] ; 
        $data1["pro_desc"] = $res['pro_desc'];
        $data1["img_loc"]= $res['img_loc'];
        $data1["pro_feat"] = $res['pro_feat'];
        $data1["pro_spec"] = $res['pro_spec'];
        $data1["id"] =$res['id'];
        $data1["pro_name"] = $res['pro_name'];
        $data1["pro_code"] = $res['pro_code'];
        $data1["pro_min"] = $res['pro_min'];
        $data1["pro_max"] = $res['pro_max'];
        
    }

  
   
 echo json_encode($data1);  
}
if($type==3){
    // product Size
    $id=$_POST['id'];
    // $id=1;
    

						 $qu = $db1->sql("SELECT a.pro_name,a.pro_size,b.id,b.size_name FROM sm_main_form_1500 as a INNER JOIN sm_main_form_1531 as b ON b.id=a.pro_size where b.del is null and a.del is null and a.pro_name=$id")->many();
			

    

  
   
 echo json_encode($qu);  
}


if($type==4){
    // product Size
    // print_r($_POST);
    $id=$_POST['id'];
    $size=$_POST['size'];
    // $id=1;
    

						 $qu = $db1->sql("SELECT pro_name,pro_size,pro_price FROM sm_main_form_1500 where pro_name=$id and pro_size=$size and del is null")->many();
			

    foreach($qu as $resqu)
    {
    $data1['pro_price']=$resqu['pro_price'];
   
   
 echo json_encode($data1);  
}
 }
 //Cart Add
 if($type==5){
    //print_r($_POST);
     $mobile_number=$_POST['mobile_number'];
     $pro_id=$_POST['pro_id'];
     $size_id=$_POST['pro_size'];
     $qnty=$_POST['pro_qnty'];
     $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
     $userid=$id['id'];
     $price=$db1->sql("SELECT * FROM sm_main_form_1500 WHERE del IS NULL and pro_name=$pro_id and pro_size=$size_id")->one();
    $pro_price=$price['pro_price'] * $qnty;
      
    $price=$db1->sql("SELECT * FROM sm_main_form_1500 WHERE del IS NULL and pro_name=$pro_id and pro_size=$size_id")->one();
    $pro_price=$price['pro_price'] * $qnty;
    $pro_mrp=$price['pro_mrp'];
    $cart_date=date("Y-m-d");
    $cart_status=1;
    
     $product =$db1->sql("SELECT * from sm_main_form_1504 where id=$pro_id and del is null")->one();
     $pro_name=$product['pro_name'];
     $pro_gst=$product['pro_gst'];
     $pro_qnty=$qnty;
     $data1 = array('cid' => $cid,'user_id' => $userid,'pro_id' => $pro_id,'pro_size' => $size_id,'pro_name' => $pro_name,'pro_price' => $pro_price,'pro_mrp' => $pro_mrp,'pro_gst' => $pro_gst,'pro_qnty' => $pro_qnty,'cart_date' => $cart_date,'cart_status' => $cart_status);
    $qury1=$db1->from('sm_main_form_3057_m')->insert($data1)->sql();
  // echo $qury1;
    $result1=$db1->sql($qury1)->execute();
    $cart_count =$db1->sql("SELECT count(id) as cart_count from sm_main_form_3057_m where user_id='$userid'and cart_status='1' and del is null")->one();
    $response['error']=FALSE;
    $response['error_mgs']="cartadd Sucessfully";
    
    echo json_encode($response);

 
 }
 //cart view
 if($type==6){
  
    $mobile_number=$_POST['mobile_number'];
    $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
    $userid=$id['id'];
  $view=$db1->sql("SELECT * from sm_main_form_3057_m where  del is null and user_id=$userid")->many();
  $data=array();
    foreach($view as $result)
    {
        $id=$result['pro_id'];
        $size=$result['pro_size'];
      
      $qu = $db1->sql("SELECT a.id,a.pro_name,a.pro_code,b.pro_name,b.pro_price,b.pro_disc,b.shipping_charge FROM sm_main_form_1504 as a INNER JOIN sm_main_form_1500 as b ON b.pro_name=$id and a.id=$id and b.pro_size=$size")->one();
      $img_id=$db1->sql("SELECT pro_id,img_loc FROM sm_main_form_1505 WHERE del IS NULL and pro_id=$id")->one();
      $size_id=$db1->sql("SELECT id,size_name FROM sm_main_form_1531 WHERE del IS NULL and id=$size")->one();
        $data1["img_loc"]= $img_id['img_loc'];
        $data1["pro_name"] = $result['pro_name'];
        $data1["pro_code"] = $qu['pro_code'];
        $data1["pro_size"] = $size_id['size_name'];
        $data1["pro_price"] = $qu['pro_price'];
        $data1["pro_disc"] = $qu['pro_disc'];
        $data1["shipping_charge"] = $qu['shipping_charge'];
        $data1['id']=$result['id'];
        $data1['pro_id']=$id;
        
       $data[]=$data1;
        
    }
   
    echo json_encode(($data));

 
 }
 //whislist Add
 if($type==7){
    //print_r($_POST);
     $mobile_number=$_POST['mobile_number'];
     $pro_id=$_POST['pro_id'];
     $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
     $userid=$id['id'];
     $wishlist_date=date("Y-m-d");
     $data1 = array('cid' => $cid,'user_id' => $userid,'pro_id' => $pro_id,'wishlist_date ' => $wishlist_date );
    $qury1=$db1->from('sm_main_form_3054_m')->insert($data1)->sql();
  // echo $qury1;
    $result1=$db1->sql($qury1)->execute();
    $cart_count =$db1->sql("SELECT count(id) as cart_count from sm_main_form_3054_m where user_id='$userid'and del is null")->one();
    $response['error']=FALSE;
    $response['error_mgs']="Whislist Added Sucessfully";
    
    echo json_encode($response);

 
 }
 //Whislist Remove
 if($type==8){
   // print_r($_POST);
     $mobile_number=$_POST['mobile_number'];
     $pro_id=$_POST['pro_id'];
     $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
     $userid=$id['id'];
    
     $wish =$db1->sql("SELECT count(id) as cart_count from sm_main_form_3054_m where user_id='$userid'and pro_id='$pro_id' and del is null")->one();
     
     if($wish['cart_count']>0)
     {
         $data=array('del'=>1);
        $wishdel=$db1->from('sm_main_form_3054_m')->where('cid',$cid)->where('pro_id',$pro_id)->where('user_id',$userid)->update($data)->execute();
        $response['error']=FALSE;
        $response['error_mgs']="Whislist Removed Sucessfully";
        echo json_encode($response);
     }
   

 
 }
 //Whislist Show
 if($type==9){
    // print_r($_POST);
     $mobile_number=$_POST['mobile_number'];
     $pro_id=$_POST['pro_id'];
     $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
     $userid=$id['id'];
    
     $wish =$db1->sql("SELECT count(id) as cart_count from sm_main_form_3054_m where user_id='$userid'and pro_id='$pro_id' and del is null")->one();
     
     if($wish['cart_count']>0)
     {
         $response['pro_id']=$_POST['pro_id'];
        $response['error']=FALSE;
        $response['error_mgs']="Whislist Sucessfully";
        echo json_encode($response);
     }
   

 
 }
  //cart delete view
 if($type==10){
    $pro_id=$_POST["pro_id"];
    $size_id=$_POST["size_id"];
    $mobile_number=$_POST['mobile_number'];
    $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
    $userid=$id['id'];
    $cart =$db1->sql("SELECT count(id) as cart_count from sm_main_form_3057_m where user_id='$userid' and pro_id='$pro_id' and pro_size='$size_id' and del is null")->one();
    if($cart['cart_count']>0){
         $data=array('del'=>1);
        $wishdel=$db1->from('sm_main_form_3057_m')->where('cid',$cid)->where('pro_id',$pro_id)->where('pro_size',$size_id)->where('user_id',$userid)->update($data)->execute();
         $response['error']=FALSE;
        $response['error_mgs']="Cart Item Removed Sucessfully";
        echo json_encode($response);
   
     }
   
    

 
 }
  //Category View
 if($type==11){
    
    $view=$db1->sql("SELECT cat_name from sm_main_form_1502 where  del is null Order By id ASC")->many();
    echo json_encode(($view));
 }
 
 //Whislist Page view
 if($type==12){
  
    $mobile_number=$_POST['mobile_number'];
    $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
    $userid=$id['id'];
  $view=$db1->sql("SELECT * from sm_main_form_3054_m where  del is null and user_id=$userid")->many();
  $data=array();
    foreach($view as &$result)
    {
        $pro_id=$result['pro_id'];
      
        $qu = $db1->sql("SELECT a.id,a.pro_name as product_name,a.pro_code,b.pro_name FROM sm_main_form_1504 as a INNER JOIN sm_main_form_1500 as b ON b.pro_name=$pro_id and a.id=$pro_id")->one();
       $img_id=$db1->sql("SELECT pro_id,img_loc FROM sm_main_form_1505 WHERE del IS NULL and pro_id=$pro_id")->one();
       $pro_price=$db1->sql("SELECT MIN(pro_price) as pro_min,MAX(pro_price) as pro_max,id,pro_name  FROM sm_main_form_1500 WHERE del IS NULL and pro_name=$pro_id")->one();
       $data1["img_loc"]= $img_id['img_loc'];
        $data1["pro_name"] = $qu['product_name'];
        $data1["pro_code"] = $qu['pro_code'];
        $data1["pro_price"] = $pro_price['pro_min']."-&#8377;".$pro_price['pro_max'];
        $data[]=$data1;
        
    }
   
    echo json_encode(($data));

 
 }
  if($type==13){
    print_r($_POST);
     $mobile_number=$_POST['mobile_number'];
     $pro_id=$_POST['pro_id'];
     $id=$db1->sql("SELECT * FROM sm_main_form_1560 WHERE del IS NULL and mobile=$mobile_number")->one();
     $userid=$id['id'];
    
     $wish =$db1->sql("SELECT count(id) as cart_count from sm_main_form_3054_m where user_id='$userid'and pro_id='$pro_id' and del is null")->one();
     
     if($wish['cart_count']>0)
     {
         $response['pro_id']=$_POST['pro_id'];
        $response['error']=FALSE;
        $response['error_mgs']="Whislist Sucessfully";
        echo json_encode($response);
     }
   

 
 }
 
?>