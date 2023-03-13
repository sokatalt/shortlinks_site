<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Lead2;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myleads =Lead::where('compain_user_id',auth()->user()->id)->paginate(40);
        // dd($myleads);

        
        
    $countryList = array(
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "BQ" => "British Antarctic Territory",
        "IO" => "British Indian Ocean Territory",
        "VG" => "British Virgin Islands",
        "BN" => "Brunei",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CT" => "Canton and Enderbury Islands",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos [Keeling] Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo - Brazzaville",
        "CD" => "Congo - Kinshasa",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "CI" => "Côte d’Ivoire",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "NQ" => "Dronning Maud Land",
        "DD" => "East Germany",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "FQ" => "French Southern and Antarctic Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and McDonald Islands",
        "HN" => "Honduras",
        "HK" => "Hong Kong SAR China",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JT" => "Johnston Island",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Laos",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macau SAR China",
        "MK" => "Macedonia",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "FX" => "Metropolitan France",
        "MX" => "Mexico",
        "FM" => "Micronesia",
        "MI" => "Midway Islands",
        "MD" => "Moldova",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar [Burma]",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NT" => "Neutral Zone",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "KP" => "North Korea",
        "VD" => "North Vietnam",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PC" => "Pacific Islands Trust Territory",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territories",
        "PA" => "Panama",
        "PZ" => "Panama Canal Zone",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "YD" => "People's Democratic Republic of Yemen",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn Islands",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RO" => "Romania",
        "RU" => "Russia",
        "RW" => "Rwanda",
        "RE" => "Réunion",
        "BL" => "Saint Barthélemy",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "MF" => "Saint Martin",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "KR" => "South Korea",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syria",
        "ST" => "São Tomé and Príncipe",
        "TW" => "Taiwan",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UM" => "U.S. Minor Outlying Islands",
        "PU" => "U.S. Miscellaneous Pacific Islands",
        "VI" => "U.S. Virgin Islands",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "SU" => "Union of Soviet Socialist Republics",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "ZZ" => "Unknown or Invalid Region",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VA" => "Vatican City",
        "VE" => "Venezuela",
        "VN" => "Vietnam",
        "WK" => "Wake Island",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe",
        "AX" => "Åland Islands",
        );
        
        $countryList = array(
        "AW" => "آروبا",
        "AZ" => "أذربيجان",
        "AM" => "أرمينيا",
        "ES" => "أسبانيا",
        "AU" => "أستراليا",
        "AF" => "أفغانستان",
        "AL" => "ألبانيا",
        "DE" => "ألمانيا",
        "AG" => "أنتيجوا وبربودا",
        "AO" => "أنجولا",
        "AI" => "أنجويلا",
        "AD" => "أندورا",
        "UY" => "أورجواي",
        "UZ" => "أوزبكستان",
        "UG" => "أوغندا",
        "UA" => "أوكرانيا",
        "IE" => "أيرلندا",
        "IS" => "أيسلندا",
        "ET" => "اثيوبيا",
        "ER" => "اريتريا",
        "EE" => "استونيا",
        "IL" => "اسرائيل",
        "AR" => "الأرجنتين",
        "JO" => "الأردن",
        "EC" => "الاكوادور",
        "AE" => "الامارات العربية المتحدة",
        "BS" => "الباهاما",
        "BH" => "البحرين",
        "BR" => "البرازيل",
        "PT" => "البرتغال",
        "BA" => "البوسنة والهرسك",
        "GA" => "الجابون",
        "ME" => "الجبل الأسود",
        "DZ" => "الجزائر",
        "DK" => "الدانمرك",
        "CV" => "الرأس الأخضر",
        "SV" => "السلفادور",
        "SN" => "السنغال",
        "SD" => "السودان",
        "SE" => "السويد",
        "EH" => "الصحراء الغربية",
        "SO" => "الصومال",
        "CN" => "الصين",
        "IQ" => "العراق",
        "VA" => "الفاتيكان",
        "PH" => "الفيلبين",
        "AQ" => "القطب الجنوبي",
        "CM" => "الكاميرون",
        "CG" => "الكونغو - برازافيل",
        "KW" => "الكويت",
        "HU" => "المجر",
        "IO" => "المحيط الهندي البريطاني",
        "MA" => "المغرب",
        "TF" => "المقاطعات الجنوبية الفرنسية",
        "MX" => "المكسيك",
        "SA" => "المملكة العربية السعودية",
        "GB" => "المملكة المتحدة",
        "NO" => "النرويج",
        "AT" => "النمسا",
        "NE" => "النيجر",
        "IN" => "الهند",
        "US" => "الولايات المتحدة الأمريكية",
        "JP" => "اليابان",
        "YE" => "اليمن",
        "GR" => "اليونان",
        "ID" => "اندونيسيا",
        "IR" => "ايران",
        "IT" => "ايطاليا",
        "PG" => "بابوا غينيا الجديدة",
        "PY" => "باراجواي",
        "PK" => "باكستان",
        "PW" => "بالاو",
        "BW" => "بتسوانا",
        "PN" => "بتكايرن",
        "BB" => "بربادوس",
        "BM" => "برمودا",
        "BN" => "بروناي",
        "BE" => "بلجيكا",
        "BG" => "بلغاريا",
        "BZ" => "بليز",
        "BD" => "بنجلاديش",
        "PA" => "بنما",
        "BJ" => "بنين",
        "BT" => "بوتان",
        "PR" => "بورتوريكو",
        "BF" => "بوركينا فاسو",
        "BI" => "بوروندي",
        "PL" => "بولندا",
        "BO" => "بوليفيا",
        "PF" => "بولينيزيا الفرنسية",
        "PE" => "بيرو",
        "TZ" => "تانزانيا",
        "TH" => "تايلند",
        "TW" => "تايوان",
        "TM" => "تركمانستان",
        "TR" => "تركيا",
        "TT" => "ترينيداد وتوباغو",
        "TD" => "تشاد",
        "TG" => "توجو",
        "TV" => "توفالو",
        "TK" => "توكيلو",
        "TO" => "تونجا",
        "TN" => "تونس",
        "TL" => "تيمور الشرقية",
        "JM" => "جامايكا",
        "GI" => "جبل طارق",
        "GD" => "جرينادا",
        "GL" => "جرينلاند",
        "AX" => "جزر أولان",
        "AN" => "جزر الأنتيل الهولندية",
        "TC" => "جزر الترك وجايكوس",
        "KM" => "جزر القمر",
        "KY" => "جزر الكايمن",
        "MH" => "جزر المارشال",
        "MV" => "جزر الملديف",
        "UM" => "جزر الولايات المتحدة البعيدة الصغيرة",
        "SB" => "جزر سليمان",
        "FO" => "جزر فارو",
        "VI" => "جزر فرجين الأمريكية",
        "VG" => "جزر فرجين البريطانية",
        "FK" => "جزر فوكلاند",
        "CK" => "جزر كوك",
        "CC" => "جزر كوكوس",
        "MP" => "جزر ماريانا الشمالية",
        "WF" => "جزر والس وفوتونا",
        "CX" => "جزيرة الكريسماس",
        "BV" => "جزيرة بوفيه",
        "IM" => "جزيرة مان",
        "NF" => "جزيرة نورفوك",
        "HM" => "جزيرة هيرد وماكدونالد",
        "CF" => "جمهورية افريقيا الوسطى",
        "CZ" => "جمهورية التشيك",
        "DO" => "جمهورية الدومينيك",
        "CD" => "جمهورية الكونغو الديمقراطية",
        "ZA" => "جمهورية جنوب افريقيا",
        "GT" => "جواتيمالا",
        "GP" => "جوادلوب",
        "GU" => "جوام",
        "GE" => "جورجيا",
        "GS" => "جورجيا الجنوبية وجزر ساندويتش الجنوبية",
        "DJ" => "جيبوتي",
        "JE" => "جيرسي",
        "DM" => "دومينيكا",
        "RW" => "رواندا",
        "RU" => "روسيا",
        "BY" => "روسيا البيضاء",
        "RO" => "رومانيا",
        "RE" => "روينيون",
        "ZM" => "زامبيا",
        "ZW" => "زيمبابوي",
        "CI" => "ساحل العاج",
        "WS" => "ساموا",
        "AS" => "ساموا الأمريكية",
        "SM" => "سان مارينو",
        "PM" => "سانت بيير وميكولون",
        "VC" => "سانت فنسنت وغرنادين",
        "KN" => "سانت كيتس ونيفيس",
        "LC" => "سانت لوسيا",
        "MF" => "سانت مارتين",
        "SH" => "سانت هيلنا",
        "ST" => "ساو تومي وبرينسيبي",
        "LK" => "سريلانكا",
        "SJ" => "سفالبارد وجان مايان",
        "SK" => "سلوفاكيا",
        "SI" => "سلوفينيا",
        "SG" => "سنغافورة",
        "SZ" => "سوازيلاند",
        "SY" => "سوريا",
        "SR" => "سورينام",
        "CH" => "سويسرا",
        "SL" => "سيراليون",
        "SC" => "سيشل",
        "CL" => "شيلي",
        "RS" => "صربيا",
        "CS" => "صربيا والجبل الأسود",
        "TJ" => "طاجكستان",
        "OM" => "عمان",
        "GM" => "غامبيا",
        "GH" => "غانا",
        "GF" => "غويانا",
        "GY" => "غيانا",
        "GN" => "غينيا",
        "GQ" => "غينيا الاستوائية",
        "GW" => "غينيا بيساو",
        "VU" => "فانواتو",
        "FR" => "فرنسا",
        "PS" => "فلسطين",
        "VE" => "فنزويلا",
        "FI" => "فنلندا",
        "VN" => "فيتنام",
        "FJ" => "فيجي",
        "CY" => "قبرص",
        "KG" => "قرغيزستان",
        "QA" => "قطر",
        "KZ" => "كازاخستان",
        "NC" => "كاليدونيا الجديدة",
        "HR" => "كرواتيا",
        "KH" => "كمبوديا",
        "CA" => "كندا",
        "CU" => "كوبا",
        "KR" => "كوريا الجنوبية",
        "KP" => "كوريا الشمالية",
        "CR" => "كوستاريكا",
        "CO" => "كولومبيا",
        "KI" => "كيريباتي",
        "KE" => "كينيا",
        "LV" => "لاتفيا",
        "LA" => "لاوس",
        "LB" => "لبنان",
        "LU" => "لوكسمبورج",
        "LY" => "ليبيا",
        "LR" => "ليبيريا",
        "LT" => "ليتوانيا",
        "LI" => "ليختنشتاين",
        "LS" => "ليسوتو",
        "MQ" => "مارتينيك",
        "MO" => "ماكاو الصينية",
        "MT" => "مالطا",
        "ML" => "مالي",
        "MY" => "ماليزيا",
        "YT" => "مايوت",
        "MG" => "مدغشقر",
        "EG" => "مصر",
        "MK" => "مقدونيا",
        "MW" => "ملاوي",
        "ZZ" => "منطقة غير معرفة",
        "MN" => "منغوليا",
        "MR" => "موريتانيا",
        "MU" => "موريشيوس",
        "MZ" => "موزمبيق",
        "MD" => "مولدافيا",
        "MC" => "موناكو",
        "MS" => "مونتسرات",
        "MM" => "ميانمار",
        "FM" => "ميكرونيزيا",
        "NA" => "ناميبيا",
        "NR" => "نورو",
        "NP" => "نيبال",
        "NG" => "نيجيريا",
        "NI" => "نيكاراجوا",
        "NZ" => "نيوزيلاندا",
        "NU" => "نيوي",
        "HT" => "هايتي",
        "HN" => "هندوراس",
        "NL" => "هولندا",
        "HK" => "هونج كونج الصينية",
        );
//         foreach($myleads as $lead){
//     $ip_data = file_get_contents('https://ipapi.co/185.16.38.34/json');   
//  dd($ip_data);
//         $result['country'] = $ip_data->geoplugin_countryCode;
//         $result['city'] = $ip_data->geoplugin_city;
//     $ip =$countryList[$result['country']];
//     }

        return view('myleads',get_defined_vars());
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      Lead::create($request->all());
      Lead2::create($request->all());

       return redirect()->to($request->url2);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function deleteleads()
    {
        Lead::truncate();
//        $allleads= Lead::get();
// foreach($allleads as$ $lead){
// $lead->delete();
// }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}