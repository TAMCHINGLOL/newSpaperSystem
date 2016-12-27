// // 检查注册用户输入的用户名格式是否正确，
// function is_usernameregistered(username){
//   // alert(username);
//   var rule = /^[a-zA-z_]\w{3,15}$/; //用户名匹配规则
//   if(username == ''){  //用户名为空时
//     $("#usernameCheck").css({
//       "display": 'block'
//     });
//     $("#usernameCheck").text("用户名不能为空");
//   }else if(username.length<6){
//     $("#usernameCheck").css({
//       "display": 'block'
//     });
//     $("#usernameCheck").text("用户名长度应大于六位");
//   }else if(!rule.test(username)){ //匹配用户输入的用户名是否符合规则
//         $("#usernameCheck").css({
//           "display": 'block'
//         });
//         $("#usernameCheck").text("用户名格式错误,请以字母或下划线开头");
//   }else{
//     // alert("hello");
//       $.ajax({
//           url: admin_usernameregister_url, //管理员用户名检测地址
//           type: 'post',
//           dataType: 'json',
//           data:{username:username},
//           success:function(result){
//             if(result.exist=="yes"){ //用户名存在时
//             $("#usernameCheck").css({
//                 "display": 'block'
//               });
//               $("#usernameCheck").text("对不起，该用户名已被注册");
//             }else if(result.exist=="no"){ //用户名不存在时
//               $("#usernameCheck").css({
//                 "display": 'block'
//               });
//               $("#usernameCheck").text("该用户名可以注册");
//              }
//           }
//       })
//   }
  
// }


// 检查旧密码否正确，
function is_usernameregistered(oldpassword){
  if(oldpassword == ''){  //旧密码为空时
    $("#usernameCheck").css({
      "display": 'block'
    });
    $("#usernameCheck").text("旧密码不能为空");
  }else{
    // alert("hello");
      $.ajax({
          url: admin_oldpassword_url, //管理员旧密码检测地址
          type: 'post',
          dataType: 'json',
          data:{oldpassword:oldpassword},
          success:function(result){
            if(result.exist=="yes"){ //用户名存在时
            $("#usernameCheck").css({
                "display": 'block'
              });
              $("#usernameCheck").text("对不起，该用户名已被注册");
            }else if(result.exist=="no"){ //用户名不存在时
              $("#usernameCheck").css({
                "display": 'block'
              });
              $("#usernameCheck").text("该用户名可以注册");
             }
          }
      })
  }
  
}

//聚焦时清空用户名表单中的数据
function emptyusername(){
  $("#usernameCheck").css({
      "display": 'none'
    });
}


//获取注册密码
function passwordchecked(password){
  // alert(password);
  if(password == ''){
    $("#passwordCheck").css({
      "display": 'block'
    });
    $("#passwordCheck").text("密码不能为空");
  }else if(password.length<6){
    $("#passwordCheck").css({
      "display": 'block'
    });
    $("#passwordCheck").text("密码不能低于6位数");
  }
}

//获取注册时确认密码
function againpasswordchecked(againpassword){
  var password=$("#password").val();
  if(againpassword == ''){
    $("#againpasswordcheck").css({
      "display": 'block'
    });
    $("#againpasswordcheck").text("密码不能为空");
  }else if(againpassword!=password){
    $("#againpasswordcheck").css({
      "display": 'block'
    });
    $("#againpasswordcheck").text("前后密码不匹配");
  }else if(againpassword.length<6){
    $("#againpasswordcheck").css({
      "display": 'block'
    });
    $("#againpasswordcheck").text("密码不能低于6位数");
  }
}

//聚焦时清空密码表单中的数据
function emptypassword(){
  $("#passwordCheck").css({
      "display": 'none'
    });
}

//聚焦时清空确认密码表单中的数据
function againemptypassword(){
  $("#againpasswordcheck").css({
      "display": 'none'
    });
}

// 当点击注册按钮时,将数据提交上去
function register_username(){
  // alert("hello");
  var username = $("#username").val(); //用户名
  var password = $("#password").val(); //密码
  var comfirmPasssword = $("#comfirmPasssword").val(); //确认密码
  if(username==""||password==""||comfirmPasssword==""){
    layer.confirm('注册名或密码不能为空', {
              btn: ['确定'] //按钮
            });
    return false;
  }
  if($('input[name="accept"]').prop("checked")){ //如果接受注册协议，ajax发送数据到后台处理.
      $.ajax({
          url: admin_addUsername_url, //管理员用户名添加地址
          type: 'post',
          dataType: 'json',
          data:{username:username,password:password,comfirmPasssword:comfirmPasssword},
          success:function(result){
            if(result.success=="yes"){  //当密码和确认密码正确时;
              layer.confirm('注册成功,是否前往登录页面', {
              btn: ['是的','取消'] //按钮
            }, function(){
              window.location.href='/SWShop/index.php/sadmin/login/login';
            });
            }else if(result.success=="no"){ //当密码和确认密码不正确时;弹窗提示用户
              layer.confirm('填写信息不正确,请重新填写', {
              btn: ['确定'] //按钮
              });
              return false;
            }
          }
      })
    }else{
      layer.confirm('请先同意协议', {
              btn: ['确定'] //按钮
            });
      return false;
    }  
}

// 当点击登录按钮时触发该方法
function submit_login(){
    var loginUsername = $("#loginUsername").val();
    var loginPassword = $("#loginPassword").val();
    if(loginUsername==""||loginPassword==""){   //当用户名或密码为空时，提醒用户
        layer.confirm('用户名或密码不能为空', {
                btn: ['确定'] //按钮
            });
        return false;
    }else{
        $.ajax({//不为空，到后台去验证用户名和密码是否正确
              url: loginIndex_url, //管理员用户名检测地址
              type: 'post',
              dataType: 'json',
              data:{name:loginUsername,password: hex_md5(loginPassword)},
              success:function(result){
                if(result.status == 1){ //用户名存在时
                    layer.msg(result.info,{time: 3000},function(){
                        window.location.href= index_url;
                    });
                }else if(result.status == 0){ //用户名不存在时
                    layer.confirm(result.info, {
                     btn: ['确定'] //按钮
                    });
                    return false;
                }else if(result.existed=="isLock"){
                    layer.confirm('用户名不存在或账户已被停用', {
                     btn: ['确定'] //按钮
                    });
                    return false;
                }
              }
          })
    }

}
