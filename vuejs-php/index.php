<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS Boostrap ver 4.5   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- cdn vue js   -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
 <!-- cdn Axios labary  ตัวกลางในการรับส่งข้อมูล -->   
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 <!-- cdn jquery    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
--> 
    <title>php & vuejs</title>
</head>
<body>
    <div class="container" id ="app">
        <h2 align="center"> {{message}}</h2>
        <div class="row">
                <div class="col-md-12">
                    <form @submit="submitData" @reset="resetData" method="post" >                                                               
                            <div class="form-group" >
                                <label for="">ชื่อ</label>
                                <input type="text" v-model="form.fname" class="form-control" maxlength="40" id="" placeholder="ชื่อ" required>
                              
                            </div>
                            <div class="form-group">
                                <label for="">นามสกุล</label>
                                <input type="text" v-model="form.lname" class="form-control" maxlength="40" id="" placeholder="นามสกุล" required>
                            </div>
                            <div class="form-group">
                                <label for="">เพศ</label>                               
                                <select class="form-control" v-model="form.gender" id="" required>
                                    <option>Man</option>
                                    <option>Woman</option>
                                </select>
                            </div>
                     
                            <div class="form-group">     
                            <label for="birthday">วันเกิด</label>
                            <input type="date" v-model="form.brithday" id="birthday" name="birthday" >
                            
                            <!--
                                <label for="">วันเกิด</label>
                                <input type="text" v-model="form.gender" class="form-control" id="" placeholder="วันเกิด">
                            -->
                            </div>
                            <div class="form-group">
                                <label for="">อีเมล์</label>
                                <input type="email" v-model="form.email" class="form-control"  id="" placeholder="อีเมล์" required>
                            </div>
                            <div class="form-group">
                                <label for="">ที่อยู่</label>
                                <textarea  type="text" v-model="form.address" class="form-control" maxlength="150" id="" placeholder="ที่อยู่" required></textarea>
                            </div>
                            <div class="form-group ">
                                <label for="">เบอร์โทร</label>
                                <input type="text" v-model="form.tel" autocomplete="off" class="form-control" maxlength="10"  id="" placeholder="เบอร์โทร" required>

                            </div>
                            <input type="submit" v-model="form.status" class="btn btn-success">
                            <input type="reset" value="ยกเลิก" class="btn btn-danger">
                    </form>    
                </div>
        </div>
        <br>
    <!--    เอาไว้Debug
        <div class="py-2">
            {{form}}           
        </div> 
    -->
        <table class="table">
        <thead>
            <tr>
            <th scope="col">รหัส</th>
            <th scope="col">ชื่อ</th>
            <th scope="col">นามสกุล</th>
            <th scope="col">เพศ</th>
            <th scope="col">วันเกิด</th>
            <th scope="col">อีเมล์</th>
            <th scope="col">ที่อยู่</th>
            <th scope="col">เบอร์โทรศัพท์</th>
            <th scope="col">แก้ไข</th>
            <th scope="col">ลบ</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="row in users">
            <th scope="row">{{row.id}}</th>
            <td>{{row.fname}}</td>
            <td>{{row.lname}}</td>
            <td>{{row.gender}}</td>
            <td>{{row.brithday}}</td>
            <td>{{row.email}}</td>
            <td>{{row.address}}</td>
            <td>0{{row.tel}}</td>
            <td>
                <button class="btn btn-primary" @click="editUser(row.id)">แก้ไข</button>
            </td>
            <td>
                <button class="btn btn-warning" @click="deleteUser(row.id)">ลบ</button>
            </td>
            </tr>
            <tr>
        </tbody>
        </table>


</div>

</div>

    
</body>

<script src="app.js"></script>

</html>