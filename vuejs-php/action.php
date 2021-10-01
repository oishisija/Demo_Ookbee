<?php
$connect = new PDO("mysql:host=localhost;dbname=mydb","root","");


//รับค่าที่ส่งมา จัดรูปแบบ json string ให้เป็นตัวแปรของ php
$request_data= json_decode(file_get_contents("php://input"));

//ดูข้อมูล ที่เป็น array
//var_dump($request_data);

//if($connect){
//    echo "connect sescess";
//}

    if($request_data->action =="insert"){
        $data=array(":fname"=>$request_data->fname,
        ":lname"=>$request_data->lname ,
        ":gender"=>$request_data->gender ,
        ":brithday"=>$request_data->brithday ,
        ":email"=>$request_data->email ,
        ":address"=>$request_data->address ,
        ":tel"=>$request_data->tel ,);  
        $query="INSERT INTO users (fname,lname,gender,brithday,email,address,tel) VALUE (:fname ,:lname ,:gender , :brithday , :email , :address , :tel )" ; 
        $statement=$connect->prepare($query);
        $statement->execute($data); 
        //ในส่วนนี้ทำงานฟังเชิพเวอร์ 
        $output=array("message" =>"insert sescuss");
        //ส่งกลับไปทำงานที่ไคเอน ส่ง output กลับไป เป็นการเอาตัวแปรของ php กลับไปทำงาน javascript
        echo json_encode($output);
    }


    if($request_data->action =="getAll"){

        $query="SELECT * FROM users" ;
        $statement=$connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data[] = $row;
        }      
       // var_dump($data);
       // echo $data;
       echo json_encode($data);
    }

    if($request_data->action =="getEditUser"){

        $query="SELECT * FROM users where id = $request_data->id" ;
        $statement=$connect->prepare($query);
        $statement->execute();
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $data['id'] = $row['id'];
            $data['fname'] = $row['fname'];
            $data['lname'] = $row['lname'];
            $data['gender'] = $row['gender'];
            $data['brithday'] = $row['brithday'];
            $data['email'] = $row['email'];
            $data['address'] = $row['address'];
            $data['tel'] = $row['tel'];
        }      
       // var_dump($data);
       // echo $data;
       echo json_encode($data);
    }
    if($request_data->action =="update"){
        $data=array(
        ":fname"=>$request_data->fname,
        ":lname"=>$request_data->lname ,
        ":gender"=>$request_data->gender ,
        ":brithday"=>$request_data->brithday ,
        ":email"=>$request_data->email ,
        ":address"=>$request_data->address ,
        ":tel"=>$request_data->tel,
        ":id"=>$request_data->id );  
        $query="UPDATE users SET fname=:fname , lname=:lname, gender=:gender , brithday=:brithday , email=:email , address=:address , tel=:tel WHERE id=:id" ; 
        $statement=$connect->prepare($query);
        $statement->execute($data); 
        $output=array("message" =>"update successful");
        echo json_encode($output);
        
    }

    if($request_data->action =="delete"){
        $data=array(":id"=>$request_data->id );  
        $query="DELETE FROM users WHERE id=:id" ; 
        $statement=$connect->prepare($query);
        $statement->execute($data); 
        $output=array("message" =>"delete successful");
        echo json_encode($output);
        
    }


?>