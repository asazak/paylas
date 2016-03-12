// JavaScript Document
$(function(){
	
	var sure=7000;
	var toplamli=$(".slider ul li").size();
	var liWidth=610;
	var toplamWidth=toplamli * liWidth;
	var lideger=0;
	$(".slider ul").css("width" , toplamWidth + "px" );
	$("a.sonraki").click(function(){
		if(lideger < toplamli -1)
		 {
			 lideger++;
			 yeniWidth=liWidth * lideger;
			 $(".slider ul").animate({marginLeft: "-" + yeniWidth + "px"},500);
		 }
		 else
		 { 
		   lideger=0;
		   $(".slider ul").animate({marginLeft: "0"},500);
		 }
		 return false;
	})
	$("a.onceki").click(function(){
		if(lideger > 0)
		 {
			 lideger--;
			 yeniWidth=liWidth * lideger;
			 $(".slider ul").animate({marginLeft: "-" + yeniWidth + "px"},500);
		 }
		 return false;
	})
	$.Slider=function(){
		if(lideger < toplamli - 1)
		{
			lideger++;
			yeniWidth=liWidth * lideger;
			$(".slider ul").animate({marginLeft: "-" + yeniWidth + "px"},500);
		}
		else
		{			
		   lideger=0;
		   $(".slider ul").animate({marginLeft: "0"},500);
		}
	}
	var don=setInterval("$.Slider()",sure);
    $("#slider").hover(function(){
		clearInterval(don);
	},function(){		
	  don=setInterval("$.Slider()",sure);
	})
});