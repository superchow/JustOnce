//轮播
$(function() {
			$('#SlideshowPic').vmcSlider({
				width: 1100,
				height: 300,
				gridCol: 10,
				gridRow: 5,
				gridVertical: 20,
				gridHorizontal: 10,
				autoPlay: true,
				ascending: true,
				effects: [
					'fade', 'fadeLeft', 'fadeRight', 'fadeTop', 'fadeBottom', 'fadeTopLeft', 'fadeBottomRight',
					'blindsLeft', 'blindsRight', 'blindsTop', 'blindsBottom', 'blindsTopLeft', 'blindsBottomRight',
					'curtainLeft', 'curtainRight', 'interlaceLeft', 'interlaceRight', 'mosaic', 'bomb', 'fumes'
				],
				ie6Tidy: false,
				random: false,
				duration: 2000,
				speed: 900
			});
		});

/*******************侧边栏导航    ***************************************/
       $("#sidebar>ul li").click(function  (e) {
				e.preventDefault();
		        var scroll=$(this).children().attr("href");
		        $("#sidebar>ul li").removeClass('active');
				$(this).addClass('active');
				offsetTop=$(scroll).offset().top-50;
				$('html,body').animate({
					scrollTop:offsetTop
				},500);
			})

			$(window).scroll(function  () {
				if($(window).scrollTop()>=$("#bg").offset().top-50){
					$("#sidebar>ul li").slideDown(750);
				}else{
					$("#sidebar>ul li").slideUp(750);
				};
				$("#sidebar>ul li").each(function(){
					var scroll=$(this).children().attr("href");
					offsetTop=$(scroll).offset().top-51;
					if($(window).scrollTop()>offsetTop){
						$("#sidebar>ul li").removeClass('active');
						$(this).addClass('active');
						return;
					}
				});
			})
			window.onscroll = function () {
			
				var top = document.body.scrollTop || document.documentElement.scrollTop;
				if(top >= 100){
					document.getElementById('toTop').style.display = "block";
				}else{
					document.getElementById('toTop').style.display = "none";
				}

			}
			function mouseover(cover) {
				cover.style.display = "block";
				cover.previousElementSibling.style.display = "block";
			}
			function mouseout(cover) {
				cover.style.display = "none";
				cover.previousElementSibling.style.display = "none";
			}

			function  detailed(id) {
				       p=id.nextElementSibling;
                        if (p.style.display=="block") {
                        	p.style.display="none";
                        }else{
                        	p.style.display="block";
                        }
					}
		    function  exit(id) {
							id.parentNode.parentNode.style.display="none";
							}
			
			