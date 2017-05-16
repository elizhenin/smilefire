function viewbox_init(){
var element = document.createElement('div');
  element.innerHTML = '<table id="image_viewer_nav" style="border:0px;padding:0px;"><tbody><tr><td id="left_td"></td><td id="right_td"></td></tr></tbody></table><div id="image_viewer" style="display:none;position:fixed;z-index:100;"><table><tbody><tr><td colspan="3" style="text-align:center;" id="top_td"></td></tr><tr><td>&nbsp;</td><td><a id="image_link" onclick=""><div id="image_td"><img id="image_viewer_target" style="max-height:10px;max-width:10px" src= ""/></div></a></td><td>&nbsp;</td></tr><tr><td id="bottom_td"colspan="3"></td></tr></tbody></table></div>';
document.body.appendChild(element);
  	var screen_height=Math.ceil(screen.availHeight);
    var screen_halfwidth=Math.ceil(screen.availWidth/2);
document.getElementById ('left_td').style.width=screen_halfwidth+'px';
document.getElementById ('right_td').style.width=screen_halfwidth+'px';
document.getElementById ('left_td').style.height=screen_height+'px';
document.getElementById ('right_td').style.height=screen_height+'px';
  document.getElementById('right_td').innerHTML='<div onclick="image_viewer_hide()" style="height:100%;width:100%;cursor:pointer;background: url(css/images/cell.png);"></div>';
};
  
function image_viewer_show ($image_source) { //showing viewbox with image '$image_source'
    //maximum image size is 2/3 of screen
    var image_max_height=Math.ceil((screen.availHeight/3)*2);
    var image_max_width=Math.ceil((screen.availWidth/3)*2);
 
  document.getElementById('image_td').innerHTML='<img id="image_viewer_target" style="display:none;max-height:'+image_max_height+'px; max-width:'+image_max_width+'px'+'" src= ""/>';
  
    //init vars for image and box
    var image=document.getElementById('image_viewer_target');
    var div_image=document.getElementById ('image_viewer');
    //set image to show
    image.src=$image_source;
  
    //when complete, ajusting image size and coordinates where to show
    image.onload=function(){        
  //enable viewbox
  document.getElementById ('image_viewer_nav').style.display='block';
  div_image.style.display='block';
      $("#image_viewer_target").fadeIn(300, function(){});
  //calculating vertical scroll offset
  var div_offset_X=Math.abs($("#image_viewer_target").offset().left-$("#image_viewer").offset().left);
  var div_offset_Y=Math.abs($("#image_viewer_target").offset().top-$("#image_viewer").offset().top);
  //calculations to set left and top to ajust viewbox position. it must be at center of screen
  var image_viewer_X=image.width;
  var image_viewer_Y=image.height;
  if(image_viewer_X>image_max_width){image_viewer_X=image_max_width;}
  if(image_viewer_Y>image_max_height){image_viewer_Y=image_max_height;}
  image_viewer_X=Math.ceil(image_viewer_X/2);
  image_viewer_X=Math.ceil(screen.availWidth/2)-image_viewer_X-div_offset_X;
  image_viewer_Y=Math.ceil(image_viewer_Y/2);
  image_viewer_Y=Math.ceil(screen.availHeight/2)-image_viewer_Y-div_offset_Y;
  div_image.style.left=image_viewer_X+'px';
  div_image.style.top=image_viewer_Y+'px';//+$(window).scrollTop()
  };
}
function image_viewer_hide() { //reaction on 'close' button
  $("#image_viewer").fadeOut(300, function(){
    $("#image_viewer_nav").fadeOut(300,function(){
      document.getElementById('image_td').innerHTML='';
    });
  });
  //document.getElementById ('image_viewer_nav').style.display='none';
    //document.getElementById ('image_viewer').style.display='none';
  //document.getElementById('image_td').innerHTML='';
}

function image_viewer_youtube($yt_id)
  {
    //enable viewbox
    var div_image=document.getElementById ('image_viewer');
         document.getElementById ('image_viewer_nav').style.display='block';
  div_image.style.display='block';
        //maximum video size is 1/2 of screen
    var image_max_height=Math.ceil((screen.availHeight/2)*1);
    var image_max_width=Math.ceil((screen.availWidth/2)*1);
    document.getElementById('image_td').innerHTML='<iframe id="image_viewer_target" width="'+image_max_width+'" height="'+image_max_height+'" src="http://www.youtube.com/embed/'+$yt_id+'?rel=0" frameborder="0" allowfullscreen></iframe>';
    var div_offset_X=Math.abs($("#image_viewer_target").offset().left-$("#image_viewer").offset().left);
  	var div_offset_Y=Math.abs($("#image_viewer_target").offset().top-$("#image_viewer").offset().top);
  image_max_width=Math.ceil(image_max_width/2);
  image_max_width=Math.ceil(screen.availWidth/2)-image_max_width-div_offset_X;
  image_max_height=Math.ceil(image_max_height/2);
  image_max_height=Math.ceil(screen.availHeight/2)-image_max_height-div_offset_Y;
    
  div_image.style.left=image_max_width+'px';
  div_image.style.top=image_max_height+'px';
  
  }
  
  
//showing gallery by classname and number of image
function image_gallery_show($imagelist_class,$count) 
    {
        //getting list of <a> tags with this class and href to images
        var ImageList = document.getElementsByClassName($imagelist_class);
        //generating navigation bullets above image
        var $ImageHeader = '';
        for(i=0;i<ImageList.length;i++){if (i==$count){$ImageHeader=$ImageHeader+'<a onclick="image_gallery_show('+"'"+$imagelist_class+"',"+i+');" style="color:#fff"><b>&bull;</b></a><a> </a>';}else{$ImageHeader=$ImageHeader+'<a onclick="image_gallery_show('+"'"+$imagelist_class+"',"+i+');">&bull;</a><a> </a>';}};
       
        document.getElementById('top_td').innerHTML=$ImageHeader;
        //generating back and next nav buttons (left-right)
        if ($count > 0) {
          document.getElementById('left_td').innerHTML='<div onclick="image_gallery_show('+"'"+$imagelist_class+"',"+($count-1)+');" style="height:100%;width:100%;cursor:pointer;text-align:center;background: url(css/images/cell.png);"></div>';
            }            else{document.getElementById('left_td').innerHTML='<div onclick="image_gallery_show('+"'"+$imagelist_class+"',"+(ImageList.length-1)+');" style="height:100%;width:100%;cursor:pointer;text-align:center;background: url(css/images/cell.png);"></div>';}
        if ($count < (ImageList.length-1)) 
        {
            document.getElementById('image_link').onclick=function(){image_gallery_show($imagelist_class,($count+1));};
        }           
      else{
              document.getElementById('image_link').onclick=function(){image_gallery_show($imagelist_class,0);};
          }
        
        //showing image
        //image_viewer_show('css/images/loading.gif');
        var _tmpImg = new Image();
        _tmpImg.src=ImageList[$count].href;
        _tmpImg.onload=function(){
                                    image_viewer_show (ImageList[$count].href);
                                    _tmpImg.src='';
                                    }
    }

//showing youtube video gallery by classname and number of image
function image_gallery_youtube($imagelist_class,$count) 
    {
        //getting list of <a> tags with this class and href to images
        var ImageList = document.getElementsByClassName($imagelist_class);
        //generating navigation bullets above image
        var $ImageHeader = '';
      for(i=0;i<ImageList.length;i++){if (i==$count){$ImageHeader=$ImageHeader+'<a onclick="image_gallery_youtube('+"'"+$imagelist_class+"',"+i+');" style="color:#fff;font-size:32pt;"><b>&bull;</b></a><a> </a>';}else{$ImageHeader=$ImageHeader+'<a onclick="image_gallery_youtube('+"'"+$imagelist_class+"',"+i+');" style="font-size:32pt;">&bull;</a><a> </a>';}};
       
        document.getElementById('top_td').innerHTML=$ImageHeader;
        //generating back and next nav buttons (left-right)
        if ($count > 0) {
            document.getElementById('left_td').innerHTML='<div onclick="image_gallery_youtube('+"'"+$imagelist_class+"',"+($count-1)+');" style="height:100%;width:100%;cursor:pointer;background: url(css/images/cell.png);"></div>';
            }            else{document.getElementById('left_td').innerHTML='<div onclick="image_gallery_youtube('+"'"+$imagelist_class+"',"+(ImageList.length-1)+');" style="height:100%;width:100%;cursor:pointer;background: url(css/images/cell.png);"></div>';}
        if ($count < (ImageList.length-1)) {
            
            document.getElementById('image_link').onclick=function(){};
            }            else{document.getElementById('image_link').onclick=function(){image_gallery_youtube($imagelist_class,0);};}
        
        //showing image
        image_viewer_youtube (ImageList[$count].innerHTML);
    }

$(document).ready(function(){viewbox_init();});