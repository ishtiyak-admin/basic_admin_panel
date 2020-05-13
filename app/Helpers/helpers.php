<?php

/** Formatted Print Function **/
function pr($data){ echo "<pre>"; print_r($data); echo "</pre>"; }

/** Formatted Print Function With Die **/
function prd($data){ echo "<pre>"; print_r($data); echo "</pre>"; die(); }

/** GEt Global Settings By Slug **/
function getSettings($slug=null){
    $settings   =   null;
    if(!empty($slug)){
        $settingContent     =   \App\Models\GlobalSetting::where('slug',$slug)->first();
        if(!empty($settingContent)) $settings   =   $settingContent->value;
    }
    return $settings;
}

/** Get User Name By ID **/
function get_user_name($id){
	$result = \App\Models\Users::where('id', $id)->first();
	if(!empty($result)){
    	return title_case($result->name);
    }else{
    	return "NA";		
	}
}

/** Generate Random OTP and return **/
function getOtp($digit = 4){
    if($digit==6){
        // return rand(111111,999999);
        return 123456;
    }else{
        // return rand(1111,9999);
        return 1234;
    }
}

/** Emoji Check in string start **/
function has_emojis_old( $string ) {
    preg_match( '/[\x{1F600}-\x{1F64F}]/u', $string, $matches_emo );
    return !empty( $matches_emo[0] ) ? true : false;
}
/** Emoji Check in string end **/

/* International Mobile Number Script Start */
function mobileIntlNumberScript(){ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo url('public/common/intl_input_new/build/css/intlTelInput.css') ?>">
    <script type="text/javascript" src="<?php echo url('public/common/intl_input_new/build/js/intlTelInput-jquery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo url('public/common/intl_input_new/build/js/intlTelInput.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(() => {
                $(".intl_mobile_number").intlTelInput({
                    autoHideDialCode: true,
                    // numberType: "MOBILE",
                    allowDropdown: true,
                    // autoPlaceholder: "off",
                    separateDialCode: true,
                    responsiveDropdown: true,
                    nationalMode: true,
                    formatOnDisplay: false,
                    hiddenInput: "mobile_number",
                    // defaultCountry: "ca",
                    defaultCountry: "auto",
                    geoIpLookup: function(success, failure) {
                        $.get("//ipinfo.io", function() {}, "jsonp").always(function(resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "";
                            // success(countryCode);
                            console.log(countryCode);
                        });
                    },
                    utilsScript: "<?php echo url('public/common/intl_input_new/build/js/utils.js') ?>",
                });
            }, 1000);
            /*
            $(".intl_mobile_number").on("countrychange",function(e){
                var dialCode = $(".intl_mobile_number").intlTelInput("getSelectedCountryData").dialCode;
                var number = $(".intl_mobile_number").intlTelInput("getNumber");
                console.log(dialCode);
                console.log(number);
            });
            */
            $("#mobile_number").on("blur",function(e){
                var dialCode = $(".intl_mobile_number").intlTelInput("getSelectedCountryData").dialCode;
                var number = $(".intl_mobile_number").intlTelInput("getNumber");
                $("input[type='hidden'][name='mobile_number']").val(number);
                // $("input[type='hidden'][name='mobile_number']").val("+"+dialCode+""+number);
            });
        });

    </script> <?php
}
/* International Mobile Number Script End */

/** Custom Pagination Functions Start **/
function getUrlParams(){
    $requestParams  =   request()->query();
    $queryParams    = "";
    // $requestParams  =   request()->except('page','order','orderBy');
    // $queryParams    =   "?order=";
    // $queryParams    .=  (request()->order && request()->order == 'asc')? 'desc' : 'asc';
    if(!empty($requestParams)){ 
        $queryParams .= "?".http_build_query($requestParams,'','&'); 
        $queryParams = urldecode($queryParams);
        return $queryParams;
    }else{
        return "";
    }
}
function sortableColumn($base_url,$column_key,$column_name,$sorting=true){
    if($sorting){
        $requestParams  =   request()->except('page','order','orderBy');
        $queryParams    =   "?order=";
        $queryParams    .=  (request()->order)? ((request()->order && request()->order == 'asc')? 'desc' : 'asc') : 'asc';
        if(!empty($requestParams)){ $queryParams .= "&".http_build_query($requestParams,'','&'); }
        $queryParams    .=  (request()->page)? '&page='.request()->page : '';
        if(!request()->orderBy){
            $orderFa        =   ($column_key == "id")? 'fa-sort-desc' : 'fa-sort';
        }else{
            $orderFa        =   (request()->orderBy && request()->orderBy == $column_key)? ( (request()->order && request()->order == 'asc')? 'fa-sort-asc' : 'fa-sort-desc' ) : 'fa-sort';
        }
        $orderFa        =   ' <i class="fa '.$orderFa.'"></i>';
        $url            =   url($base_url.$queryParams.'&orderBy='.$column_key);
    }else{
        $url            =   'javascript:void(0);';
        $orderFa        =   '';
    }
    $anchor         =   '<a href="'.$url.'" title="'.$column_name.'" class="sortable_anchor">'.$column_name.$orderFa.'</a>';
    return $anchor;
}
/** Custom Pagination Functions End **/