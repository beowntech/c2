<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
<style>@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap');</style>
<div style="background-color:#fff4ee;padding: 0 20px;max-width: 800px;font-family: 'Open Sans', sans-serif; color:#151617;">
    <div style="background-color:#fff;border-right: 5px solid #023793;border-left: 5px solid #023793; text-align:center;">
        <div style="padding-top: 40px; padding-left: 10px; padding-bottom: 15px; padding-right: 10px;">
            <img src="{{env('APP_URL')}}/assets/images/admission-jockey-logo1.png" alt="">
            <p style="font-size: 14px;"><u>Indias most trusted & reliable personal admission assistance platform</u></p>
            <h2 style="font-weight: 600;font-size: 26px;">Welcome {{$data['name']}}!</h2>
            <p style="margin-top: -20px">We are delighted to have you on board with Admission Jockey and promise to assist you at each step of your career decision/journey.</p>
            <h4 style="font-weight: 600;font-size: 20px;">WHY ADMISSION JOCKEY?</h4>
            <p>Admission Jockey is a one stop destination that will help you from exam preparation to College admissions.</p>
            <p style="color:#003593;line-height: 1.7;">✓ Find India's best colleges in one place <br>
                ✓ Free Educational Counselling by Experts <br>
                ✓ Get hassle fee Education Loans <br>
                ✓ Discover affordable Hostel /Accomodation <br>
                ✓ Get opportunity to study in Abroad</p>
            <br>
            <p>Our experts will be in touch in the coming days to help make sure to answer your all questions/queries. <br>
                We are rooting for you and are always here to help.</p>

            <p>Team <br> Admission Jockey</p>
            <img src="{{env('APP_URL')}}/assets/images/maskot.png" alt="">
            <br>
            <p style="color:#003593;line-height: 1.7;">connect with us</p>
            <ul style="list-style-type: none;">
                <li style="display: inline-block;">+91 7060243009,</li>
                <li style="display: inline-block;">9997740264</li>
            </ul>
            <ul style="list-style-type: none;">
                <li style="display: inline-block;"><a href="https://www.facebook.com/admissionjockey"
                                                      target="_blank"><img
                            src="{{env('APP_URL')}}/assets/images/icon/fb.png" width="30px" alt=""></a></li>
                <li style="display: inline-block;"><a href="https://www.linkedin.com/company/admission-jockey/"
                                                      target="_blank"><img
                            src="{{env('APP_URL')}}/assets/images/icon/linked.png" width="30px" alt=""></a></li>
                <li style="display: inline-block;"><a href="https://twitter.com/admissionjockey" target="_blank"><img
                            src="{{env('APP_URL')}}/assets/images/icon/twitter.png" width="30px" alt=""></a></li>
                <li style="display: inline-block;"><a href="https://www.instagram.com/admissionjockeyofficial/"
                                                      target="_blank"><img
                            src="{{env('APP_URL')}}/assets/images/icon/instag.png" width="30px" alt=""></a></li>
                <li style="display: inline-block;"><a href="https://wa.me/917060243009" target="_blank"><img
                            src="{{env('APP_URL')}}/assets/images/icon/whatsapp.png" width="30px" alt=""></a></li>
            </ul>
            <table border="0" width="100%">
                <td style="display: -webkit-inline-box;"><img src="{{env('APP_URL')}}/assets/images/aj-icon.png" alt="" width="20px" style="margin-right: 7px;"> <div style="padding: 2px 0;">Copyright © 2021. Admission Jockey</div></td>
            </table>
{{--            <p style="color:#003593;line-height: 1.7;">--}}
{{--                --}}
{{--            </p>--}}

        </div>
    </div>
</div>
</body>
</html>
