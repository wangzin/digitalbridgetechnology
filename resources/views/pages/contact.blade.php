<section class="bg-gray-dark page-title-wrap">
    <div class="container">
        <div class="page-title">
        <h2>Contact Us</h2>
        </div>
    </div>
</section>
<section class="section-60 section-md-top-90 section-md-bottom-100">
<div class="container">
    <div class="row row-50 justify-content-lg-between">
    <div class="col-lg-5 col-xl-4">
        <div class="inset-lg-right-15 inset-xl-right-0">
            <div class="row row-30 row-md-40">
                <div class="col-md-10 col-lg-12">
                <h3>How to Find Us</h3>
                <p class="text-secondary">
                    If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit to our offices.
                </p>
                </div>
                <div class="col-md-6 col-lg-12">
                    <address class="contact-info">
                        <p class="text-uppercase">Changzamtog, Thimphu, Bhutan.</p>
                        <dl class="list-terms-inline">
                            <dt>Telephone</dt>
                            <dd><a class="link-secondary" href="tel:#">+975 17503377</a></dd>
                        </dl>
                        <dl class="list-terms-inline">
                            <dt>E-mail</dt>
                            <dd>info.digitalbridgebhutan@gmail.com</dd>
                        </dl>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-xl-6">
        <h3>Get in Touch</h3>
        <form name="contact_form" action="/digitalbridgesolution/savecontact" method="post" enctype="multipart/form-data" id="submit_contact">
            @csrf    
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 form-group">
                    <input class="form-control" placeholder="Subject" onchange="remove_err('subject')" type="text" name="subject" id="subject">
                    <span style="color: red;" id="subject_err"></span>
                </div> 
                <div class="col-12 col-sm-12 col-md-6 form-group">
                    <input class="form-control" placeholder="Name" onchange="remove_err('name')" type="text" name="name" id="name">
                    <span style="color: red;" id="name_err"></span>
                </div>  
                <div class="col-12 col-sm-12 col-md-6 form-group">
                    <input class="form-control" placeholder="Contact No." onchange="remove_err('contact')" type="text" name="contact" id="contact">
                    <span style="color: red;" id="contact_err"></span>
                </div>                                      
                <div class="col-12 col-sm-12 col-md-6 form-group">
                    <input class="form-control" placeholder="Email" type="text" name="email" id="email">
                </div>
                <div class="col-12 col-lg-12 col-md-12 col-lg-12 form-group">
                    <textarea name="details" placeholder="Message/Details" class="form-control" id="details" onchange="remove_err('details')"></textarea>
                    <span style="color: red;" id="details_err"></span>
                </div>
            </div>
            <div class="form-group">
                <label>Captcha</label>
                <br>
                <div class="col-lg-8 col-md-8">
                    <div id="captcha"></div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <button class="regenerateCaptcha" type="button" style="width: 5rem;" onclick="createCaptcha()">
                        <i class="fa fa-refresh"></i>
                    </button>
                </div>
                <br><br>
                <input type="text" id="captchaText" onchange="remove_err('captchaText')" name="captchaText" class="form-control" placeholder="Captcha Text">
                <span style="color: red;" id="captchaText_err"></span>
            </div>
            <div class="form-group">
                <input name="form_botcheck" class="form-control" type="hidden" value="">
                <button type="button" onclick="submit_contact()" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
            </div>
        </form>
    </div>
    </div>
</div>
</section>

<script>
    createCaptcha();
    var code;
	function createCaptcha() {
		document.getElementById('captcha').innerHTML = "";
		var charsArray =
		"0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
		var lengthOtp = 6;
		var captcha = [];
		for (var i = 0; i < lengthOtp; i++) {
			//below code will not allow Repetition of Characters
			var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
			if (captcha.indexOf(charsArray[index]) == -1)
				captcha.push(charsArray[index]);
			else i--;
		}
		var canvas = document.createElement("canvas");
		canvas.id = "captcha";
		canvas.width = 200;
		canvas.height = 50;
		var ctx = canvas.getContext("2d");
		ctx.font = "35px Georgia";
		ctx.padding ="12px"
		ctx.strokeText(captcha.join(""), 0, 30);
		canvas.style.letterSpacing = 5 + 'px';
		//storing captcha so that can validate you can save it somewhere else according to your specific requirements
		code = captcha.join("");
		document.getElementById("captcha").appendChild(canvas);
	}

	function validateCaptcha(e) {
		if (document.getElementById("captchaText").value == code) {
			alert("Valid Captcha")
			document.getElementById("captchaText").value =""
		} else {
			alert("Invalid Captcha. try Again");
			createCaptcha();
		}
	}

    function submit_contact(){
        if(validate_form()){
            $('#submit_contact').submit();
        }
    }
    function validate_form(){
        let ret=true;
        if($('#subject').val()==""){
            $('#subject_err').html('Please enter subject of your complain');
            ret=false;
        }
        if($('#contact').val()==""){
            $('#contact_err').html('Please enter your contact');
            ret=false;
        }
        if($('#name').val()==""){
            $('#name_err').html('Please enter name');
            ret=false;
        }
        
        if($('#details').val()==""){
            $('#details_err').html('Please enter details of the complain');
            ret=false;
        }
        if($('#captchaText').val()==""){
            $('#captchaText_err').html('Please enter Captcha text');
            ret=false;
        }
        if ($('#captchaText').val() != code) {
            $('#captchaText_err').html('Captcha text is not valid');
        } 
        
        return ret;
    }

    function remove_err(id){
        if($('#'+id).val()!=""){
            $('#'+id+'_err').html('');
        }
    }
</script>