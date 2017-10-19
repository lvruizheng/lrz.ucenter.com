//1.同步到laravel的jsonp请求
function json_Sync(){
	var _secret = '';
    var details = '';
    var redirectURL = '';
    var url1 = '';
    var url2 = '';
    var url_logout1 = '';
    var url_logout2 = '';
    
    //同步jsonp 1
    this.jsonp1 = function(){
    	$.ajax({  
            url: json_Sync.url1,  
            type: 'get',
            dataType: "jsonp",  
            jsonp: "callback",
            data: {_secret:json_Sync._secret,details:json_Sync.details},
            success: function(data){
            	
            },  
            error:function(err){  
            	
            },
            complete:function(data){
            	json_Sync.jsonp2();
            }
        });
    }
    
    this.jsonp2 = function(){
    	//同步到第二个网站
    	$.ajax({  
            url: json_Sync.url2,
            type: 'get',
            dataType: "jsonp",  
            jsonp: "callback",
            data: {_secret:json_Sync._secret,details:json_Sync.details},
            success: function(data){
            	
            },  
            error:function(){  

            },
            complete:function(data){
            	//跳转到跳转前页面
            	json_Sync.Goto(json_Sync.redirectURL);
            }
        });
    }
    
    this.Goto = function(url){
    	window.location.href = url;
    }
    
    //登出第一个网站
    this.jsonp_logout1 = function(){
    	$.ajax({  
            url: json_Sync.url_logout1,
            type: 'get',
            dataType: "jsonp",  
            jsonp: "callback",
            success: function(data){
            	
            },  
            error:function(){  

            },
            complete:function(data){
            	json_Sync.jsonp_logout2();
            }
        });
    }
    
    //登出第二个网站
    this.jsonp_logout2 = function(){
    	$.ajax({  
            url: json_Sync.url_logout2,
            type: 'get',
            dataType: "jsonp",  
            jsonp: "callback",
            success: function(data){
            	
            },  
            error:function(){  

            },
            complete:function(data){
            	
            }
        });
    }
}