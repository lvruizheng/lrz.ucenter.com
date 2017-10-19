@extends('layouts.web')
@extends('layouts.parallax')

@section('title','用户资料')

@section('content')

<style>
	.loading{display:none;background:url("http://f7-preview.awardspace.com/zjmainstay.co.cc/jQueryExample/jquery_upload_image/files/ui-anim_basic_16x16.gif") no-repeat scroll 0 0 transparent;float: left;padding:8px;margin:18px 0 0 18px;}
</style>

    <div class="container">

    <div class="page-section">
      <div class="row">

        <div class="col-md-9">

          <!-- Tabbable Widget -->
          <div class="tabbable paper-shadow relative" data-z="0.5">

            <!-- Tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#account" data-toggle="tab"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">账户管理</span></a></li>
              <li><a href="#billing" data-toggle="tab"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">账单明细</span></a></li>
            </ul>
            <!-- // END Tabs -->

            <!-- Panes -->
            <div class="tab-content">

              <div id="account" class=" tab-pane fade in active">
              
                <form id="inputfileForm" action="{{ url('profile/inputfile') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                </form>
              
                <form class="form-horizontal" method="POST" action="{{ url('/profile/eidt') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">头像</label>
                    <div class="col-md-6">
                      <div class="media v-middle">
                        <div class="media-left">
                          <div class="icon-block width-100 bg-grey-100" id="imagediv">
                          
                            @if (!$user->avatar)
                                <i class="fa fa-photo text-light"></i>
                            @else
                                <img class="img-responsive" id="imageview" src="{{asset('/storage/app/uploads/'.$user->avatar)}}">
                            @endif
                            
                          </div>
                        </div>
                        <div class="media-body">
                            <a href="javascript:void(0);" onclick="getElementById('inputfile').click()" class="btn btn-white btn-sm paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated> 添加头像<i class="fa fa-upl"></i></a>
                            <input type="file" multiple="multiple" id="inputfile" name="avatar" style="height:0;width:0;z-index: -1; position: absolute;left: 10px;top: 5px;"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">名称</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <input type="test" name="name" class="form-control used" id="exampleInputFirstName" placeholder="你的名称" value="{{ $user->name }}">
                        <label for="exampleInputFirstName">
                            @if ($errors->has('name'))
                                <strong style="color:#fd8888">{{ $errors->first('name') }}</strong>
                            @else 名称
                            @endif
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">邮箱</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                          <input type="email" name="email" class="form-control used" id="inputEmail3" placeholder="邮箱" value="{{ $user->email }}">
                          <label for="inputEmail3">
                            @if ($errors->has('email'))
                                <strong style="color:#fd8888">{{ $errors->first('email') }}</strong>
                            @else 邮箱地址
                            @endif
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">手机号</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                          <input type="text" name="mobile" class="form-control used" id="website" placeholder="手机号" value="{{ $user->mobile }}">
                          <label for="website">
                            @if ($errors->has('mobile'))
                                <strong style="color:#fd8888">{{ $errors->first('mobile') }}</strong>
                            @else 手机号
                            @endif
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- 
                  <div class="form-group">
                    <label for="inputPassword3" class="col-md-2 control-label">修改密码</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="密码">
                        <label for="inputPassword3">密码</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-offset-2 col-md-6">
                      <div class="checkbox checkbox-success">
                        <input id="checkbox3" type="checkbox" checked="">
                        <label for="checkbox3">Subscribe to our Newsletter</label>
                      </div>
                    </div>
                  </div>
                  -->
                  <div class="form-group margin-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>保存更改</button>
                    </div>
                  </div>
                </form>
              </div>

              <div id="billing" class="tab-pane fade active">
                <form action="#" class="form-horizontal">
                  <div class="form-group">
                    <label for="name" class="col-md-2 control-label">Name on Invoice</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <input type="text" class="form-control used" id="name" value="Adrian Demian">
                        <label for="name">Name on Invoice</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-md-2 control-label">Address</label>
                    <div class="col-md-6">
                      <div class="form-control-material">
                        <textarea class="form-control used" id="address">Sunny Street 21, MI</textarea>
                        <label for="address">Address</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="country" class="col-md-2 control-label">Country</label>
                    <div class="col-md-6">
                      <select id="country" data-toggle="select2" class="width-100">
                        <option value="1" selected>USA</option>
                        <option value="2">Country</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group margin-bottom-none">
                    <div class="col-md-offset-2 col-md-10">
                      <button type="submit" class="btn btn-success paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Update Billing</button>
                    </div>
                  </div>
                </form>
                <hr/>

                <div class="media v-middle s-container">
                  <div class="media-body">
                    <h5 class="text-subhead">Payment details</h5>
                  </div>
                  <div class="media-right">
                    <a href="#modal-update-credit-card" data-toggle="modal" class="btn btn-white paper-shadow relative" data-animated data-z="0.5" data-hover-z="1" href="">Add Credit Card</a>
                  </div>
                </div>
                <div class="list-group margin-none">
                  <div class="list-group-item media v-middle">
                    <div class="media-left">
                      <div class="icon-block half img-circle bg-primary">
                        <i class="fa fa-credit-card"></i>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="text-title media-heading">
                        <a href="#modal-update-credit-card" data-toggle="modal" class="link-text-color">**** **** **** 2422</a>
                      </h4>
                      <div class="text-caption">updated 1 month ago</div>
                    </div>
                    <div class="media-right">
                      <a href="#modal-update-credit-card" data-toggle="modal" class="btn btn-white btn-flat"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                    </div>
                  </div>
                  <div class="list-group-item media v-middle">
                    <div class="media-left">
                      <div class="icon-block half img-circle bg-grey-100 text-light">
                        <i class="fa fa-credit-card"></i>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="text-title media-heading">
                        <a href="#modal-update-credit-card" data-toggle="modal" class="link-text-color">**** **** **** 3365</a>
                      </h4>
                      <div class="text-caption">updated 1 year ago</div>
                    </div>
                    <div class="media-right">
                      <a href="#modal-update-credit-card" data-toggle="modal" class="btn btn-white btn-flat"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- // END Panes -->

            
          </div>
          <!-- // END Tabbable Widget -->

          <br/>
          <br/>

        </div>
        <div class="col-md-3">

          <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
              <h4 class="panel-title">我的账户</h4>
            </div>
            <div class="panel-body list-group">
              <ul class="list-group list-group-menu">
                <li class="list-group-item"><a class="link-text-color" href="website-student-dashboard.html">Dashboard</a></li>
                <li class="list-group-item"><a class="link-text-color" href="website-student-courses.html">My Courses</a></li>
                <li class="list-group-item {{ isset($active['profile']) ? $active['profile'] : '' }}"><a class="link-text-color" href="website-student-profile.html">个人资料</a></li>
                <li class="list-group-item"><a class="link-text-color" href="website-student-messages.html">Messages</a></li>
                <li class="list-group-item"><a class="link-text-color" href="login.html"><span>退出</span></a></li>
              </ul>
            </div>
          </div>

          <h4>精选</h4>
          <div class="slick-basic slick-slider" data-items="1" data-items-lg="1" data-items-md="1" data-items-sm="1" data-items-xs="1">
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-default"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                        <span class="v-center">
                            <i class="fa fa-github"></i>
                        </span>
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Github Webhooks for Beginners</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-primary"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-primary">
                        <span class="v-center">
                            <i class="fa fa-css3"></i>
                        </span>
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-primary btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Awesome CSS with LESS Processing</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-lightred"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-lightred">
                        <span class="v-center">
                            <i class="fa fa-windows"></i>
                        </span>
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-red-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Portable Environments with Vagrant</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-brown"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-brown">
                        <span class="v-center">
                            <i class="fa fa-wordpress"></i>
                        </span>
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">WordPress Theme Development</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-purple"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-purple">
                        <span class="v-center">
                            <i class="fa fa-jsfiddle"></i>
                        </span>
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-purple-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Modular JavaScript with Browserify</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                <div class="panel-body">
                  <div class="media media-clearfix-xs">
                    <div class="media-left">
                      <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                        <span class="img icon-block s90 bg-default"></span>
                        <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                        <span class="v-center">
                            <i class="fa fa-cc-visa"></i>
                        </span>
                        </span>
                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                          <span class="v-center">
                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Easy Online Payments with Stripe</a></h4>
                      <p class="small margin-none">
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
@endsection

@section('js')
<script>
    /*
    $("#inputfile").change(function(){
        $("#inputfileForm").submit();
    });

    $("#inputfileForm").on('submit', function() {

    	$(this).ajaxSubmit({
        	dataType:'json',
        	success: function(data) {
            	console.log(data);
            	
            }
        });
        
        return false;
    });
    */

    //*原理是把本地图片路径："D(盘符):/image/..."转为"http://..."格式路径来进行显示图片*/  
    $("#inputfile").change(function(){
    	var $file = $(this);  
        var objUrl = $file[0].files[0];  
        //获得一个http格式的url路径:mozilla(firefox)||webkit or chrome  
        var windowURL = window.URL || window.webkitURL;  
        //createObjectURL创建一个指向该参数对象(图片)的URL  
        var dataURL;  
        dataURL = windowURL.createObjectURL(objUrl);
          
        $("#imageview").attr("src",dataURL);
        $("#imagediv i").hide();
    });
    
</script>
@endsection


