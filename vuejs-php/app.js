
    var app = new Vue({
        el: '#app',
        data: {
            users:"",
            message: 'PHP Version 8.0.11 & Vuejs (Ookbee demo) & git',
            form:{
                id:"",
                fname:"",
                lname:"",           
                gender:"",
                brithday:"",
                email:"",
                address:"",
                tel:"",
                isEdit:false,
                status:"บันทึก"
            }
        },
        methods:{

            submitData(e){
                e.preventDefault();

                //เก็บข้อข้อมูลใว้ใน check
                check =(this.form.fname != "" &&
                this.form.lname !="" &&
                this.form.gender !="" &&
                this.form.brithday !="" &&
                this.form.email !="" &&
                this.form.address !="" &&
                this.form.tel !=""                     
                );

                if(check && !this.form.isEdit 
                ){
                    //save data
                    axios.post("action.php",{                      
                        fname:this.form.fname,
                        lname:this.form.lname,
                        gender:this.form.gender,
                        brithday:this.form.brithday,
                        email:this.form.email,
                        address:this.form.address,
                        tel:this.form.tel,
                        action:"insert"
                    }
                    ).then(function(res){
                        //console.log(res);
                        //บันทึกข้อมูลเสร็จทำการtext ให้เป็นค่าว่าง
                        app.resetData();
                        //หลังจาก reset text ให้เป็นค่าว่าง และเรียกข้อมูลอีกครั้ง
                        app.getAllUsers();
                    })
                }
     
             //   console.log("Save Suscess");
             if(check && this.form.isEdit ){
                    //update data   
                   // console.log("update");
                    // ส่ง paramete เพื่อทำการแก้ไข 
                    axios.post("action.php",{  
                        id:this.form.id,                    
                        fname:this.form.fname,
                        lname:this.form.lname,
                        gender:this.form.gender,
                        brithday:this.form.brithday,
                        email:this.form.email,
                        address:this.form.address,
                        tel:this.form.tel,
                        action:"update"
                    }
                    ).then(function(res){
                        app.resetData();
                        app.getAllUsers();
                    })
                                
                }

            },
            resetData(e){
                this.form.id="";
                this.form.fname=""; 
                this.form.lname="";
                this.form.gender="";
                this.form.brithday="";
                this.form.email="";
                this.form.address="";
                this.form.tel="";
                this.form.status="บันทึก";
                this.form.isEdit=false;
              //  console.log("delete Suscess");
            },           
            getAllUsers(){
                axios.post("action.php",{                                       
                    action:"getAll"
                }
                ).then(function(res){
                    app.users = res.data
                    //console.log(res);
                  //  console.log(app.users);

                })
            },
            editUser(id){
              //  console.log(id);
                this.form.status="อัพเดท";
                this.form.isEdit=true;
                axios.post("action.php",{                                       
                    action:"getEditUser",
                    //ส่งพารามิเตอร์ id
                    id:id
                }
                ).then(function(res){          
                    app.form.id= res.data.id;         
                    app.form.fname= res.data.fname; 
                    app.form.lname=res.data.lname;
                    app.form.gender=res.data.gender;
                    app.form.brithday=res.data.brithday;
                    app.form.email=res.data.email;
                    app.form.address=res.data.address;
                    app.form.tel=res.data.tel;
                   // console.log(res.data);         
                })   

            },
            deleteUser(id){
                if(confirm("ต้องการลบรหัสที่ " + id + " หรือไม่ ?")){
                   // console.log(id)
                        axios.post("action.php",{                                       
                        action:"delete",
                        //ส่งพารามิเตอร์ id
                        id:id
                    }
                    ).then(function(res){          
    
                       app.resetData();
                       app.getAllUsers();      
                    })

                }
            
            }

        },

        //// created คือ check ว่าเราสร้าง object ของ vue ขึ้นมาหรือยัง
        created(){
            //query จากฐานข้อมูล
            this.getAllUsers();
        }

    })



