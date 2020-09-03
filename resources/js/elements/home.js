current_slide = 1 //initial slide position

//listen to click events on slide arrow and trigger the next slide
$(document).on("click", ".block__section4__cont__slider .left_arrow", function(){
	minusSlides();
});
//listen to click events on slide arrow and trigger the next slide
$(document).on("click", ".block__section4__cont__slider .right_arrow", function(){
	plusSlides();
})
//calls the next slide 
const plusSlides = () =>{
	if (current_slide < 5 && current_slide > 0){
		document.querySelector(`.slider${current_slide}`).style.right = "100%";
		document.querySelector(`.slider${current_slide+1}`).style.right = "0%";
        
		let present_slide = document.querySelector(`.slide_icon${current_slide}`)
		let prev_slide = document.querySelector(`.slide_icon${current_slide-1}`);
		let next_slide = document.querySelector(`.slide_icon${current_slide+1}`);
		document.querySelector('.block__section4 ul').style.textAlign  = 'left';
		next_slide.style.display = 'none';
		present_slide.style.background = '#6626EE';
		present_slide.style.display = 'inline-block';
		present_slide.style.width = '32px';
		prev_slide.style.background = '#fff';
		setTimeout(function(){ 
			document.querySelector('.block__section4 ul').style.textAlign = 'right';
			present_slide.style.width = '10px';
			}, 200);
		setTimeout(function(){ 
			prev_slide.style.display = 'inline-block';
			present_slide.style.display = 'none';
			next_slide.style.display = 'inline-block';
			next_slide.style.background = '#6626EE'
			}, 300);
		current_slide +=1; 
	}
}
//calls the previous slide
const minusSlides = () =>{
	if (current_slide <= 5 && current_slide > 1){
		document.querySelector(`.slider${current_slide}`).style.right = "-100%";
		document.querySelector(`.slider${current_slide-1}`).style.right = "0%";

		let present_slide = document.querySelector(`.slide_icon${current_slide}`);
		let prev_slide = document.querySelector(`.slide_icon${current_slide-1}`);
		let next_slide = document.querySelector(`.slide_icon${current_slide+1}`);
		let x_prev_slide = document.querySelector(`.slide_icon${current_slide-2}`);
		document.querySelector('.block__section4 ul').style.textAlign  = 'right';
		document.querySelector(`.slide_icon${current_slide-2}`).style.display='none';
		present_slide.style.width = '32px';

		setTimeout(function(){ 
			document.querySelector('.block__section4 ul').style.textAlign = 'left';
			present_slide.style.width = '10px';
			prev_slide.style.background = '#6626EE';
			x_prev_slide.style.background = '#6626EE';
			}, 200);
		setTimeout(function(){ 
			x_prev_slide.style.display = 'none';
			prev_slide.style.display = 'inline-block';
			present_slide.style.background = '#fff';
			}, 300);
		current_slide -=1;
	}	
}

function swipedetect(el, callback){
  
    let touchsurface = el,
    swipedir,
    startX,
    startY,
    distX,
    distY,
    threshold = 50, //required min distance traveled to be considered swipe
    restraint = 50, // maximum distance allowed at the same time in perpendicular direction
    allowedTime = 500, // maximum time allowed to travel that distance
    elapsedTime,
    startTime,
    handleswipe = callback || function(swipedir){}

    touchsurface.addEventListener('touchstart', function(e){
        let touchobj = e.changedTouches[0]
        swipedir = 'none'
        dist = 0
        startX = touchobj.pageX
        startY = touchobj.pageY
        startTime = new Date().getTime() // record time when finger first makes contact with surface
        e.preventDefault()
	}, false)
	
    touchsurface.addEventListener('touchmove', function(e){
        // prevent scrolling when inside DIV
	}, false)
	
    touchsurface.addEventListener('touchend', function(e){
        let touchobj = e.changedTouches[0]
        distX = touchobj.pageX - startX // get horizontal dist traveled by finger while in contact with surface
        distY = touchobj.pageY - startY // get vertical dist traveled by finger while in contact with surface
        elapsedTime = new Date().getTime() - startTime // get time elapsed
        if (elapsedTime <= allowedTime){ // first condition for awipe met
            if (Math.abs(distX) >= threshold && Math.abs(distY) <= restraint){ // 2nd condition for horizontal swipe met
                swipedir = (distX < 0)? 'left' : 'right' // if dist traveled is negative, it indicates left swipe
            }
        }
        handleswipe(swipedir)
        e.preventDefault()
    }, false)
}
  
//USAGE:
let el = document.querySelector('.block__section4__cont__slider .slider_cont');
swipedetect(el, function(swipedir){
	if (swipedir == 'left'){
		plusSlides();
	}
	else if (swipedir == 'right'){
		minusSlides();
	}
});